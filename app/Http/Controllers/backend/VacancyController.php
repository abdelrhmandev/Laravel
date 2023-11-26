<?php
namespace App\Http\Controllers\backend;
use DataTables;
use Carbon\Carbon;
use LaravelLocalization;
use App\Traits\Functions; 
use App\Traits\UploadAble;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Vacancy as MainModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File; 
use App\Models\VacancyTranslation as TransModel;
use App\Http\Requests\backend\VacancyRequest as ModuleRequest;


class VacancyController extends Controller
{
    use UploadAble,Functions;

    public function __construct() {

        
        $this->TblForignKey         = 'vacancy_id';
        $this->ROUTE_PREFIX         = config('custom.route_prefix').'.vacancies'; 
        $this->TRANSLATECOLUMNS     = ['title','slug','description']; // Columns To be Trsanslated
        $this->TRANS                = 'vacancy';
        $this->UPLOADFOLDER         = 'vacancies';
        $this->Tbl                  = 'vacancies';
    }


 

    public function store(ModuleRequest $request){

        try {
            DB::beginTransaction();        
            $validated                     = $request->validated();
            $validated['status']           = isset($request->status) ? '1' : '0'; 
            $validated['image']            = (!empty($request->file('image'))) ? $this->uploadFile($request->file('image'),$this->UPLOADFOLDER) : NULL;    



            $query                   = MainModel::create($validated);                    
            $translatedArr           = $this->HandleMultiLangdatabase($this->TRANSLATECOLUMNS,[$this->TblForignKey=>$query->id]);                                           
            if(TransModel::insert($translatedArr)){                   
                $arr = array('msg' => __($this->TRANS.'.'.'storeMessageSuccess'), 'status' => true);              
            }
            DB::commit();   
        
        } catch (\Exception $e) {
            DB::rollback();            
            $arr = array('msg' => __($this->TRANS.'.'.'storeMessageError'), 'status' => false);
        }
        return response()->json($arr);


    }
        


public function index(Request $request){     
if ($request->ajax()) {           
       
    $model = MainModel::where('id','>=',0);
    return Datatables::of($model)
                ->addIndexColumn()   
                ->editColumn('translate.title', function (MainModel $row) {
                    return "<a href=".route($this->ROUTE_PREFIX.'.edit',$row->id)." class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-item-filter".$row->id."=\"item\">".Str::words($row->translate->title, '20')."</a>";                     
                })                                                              
                ->editColumn('image', function ($row) {
                    $div = '<span aria-hidden="true">—</span>';
                    if($row->image && File::exists(public_path($row->image))) {
                        $imagePath = url(asset($row->image));
                        
                        $div = "<a href=".route($this->ROUTE_PREFIX.'.edit',$row->id)." title='".$row->translate->title."'>
                                <div class=\"symbol symbol-50px\"><img class=\"img-fluid\" src=".$imagePath."></div>     
                                </a>";                      
                    }
                    return $div;
                })         
      
        
 
               
                ->editColumn('status', function (MainModel $row) {                                                           
                if($row->status == 1){
                    $checked = "checked";
                    $statusLabel  = "<span class=\"text-success\">".__('site.published')."</span>";                                                   
                }else{
                    $checked = "";
                    $statusLabel  ="<span class=\"text-danger\">".__('site.unpublished')."</span>";   
                }                    
                return  "<div class=\"form-check form-switch form-check-custom form-check-solid\"><input class=\"form-check-input UpdateStatus\" name=\"Updatetatus\" type=\"checkbox\" ".$checked." id=\"Status".$row->id."\" onclick=\"UpdateStatus($row->id,'".__($this->TRANS.'.plural')."','$this->Tbl','".route('admin.UpdateStatus')."')\" />&nbsp;".$statusLabel."</div>";                
            }) 
            ->editColumn('created_at', function (MainModel $row) {
                return [                    
                   'display'   => "<div class=\"font-weight-bolder text-primary mb-0\">". Carbon::parse($row->created_at)->format('d/m/Y').'</div><div class=\"text-muted\">'.''."</div>", 
                   'timestamp' => $row->created_at->timestamp
                ];
             })
             ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%d/%m/%Y') LIKE ?", ["%$keyword%"]);
             })             
                ->editColumn('actions', function ($row) {                                                       
                    return view('backend.partials.btns.edit-delete', [
                        'trans'         =>$this->TRANS,                       
                        'editRoute'     =>route($this->ROUTE_PREFIX.'.edit',$row->id),
                        'destroyRoute'  =>route($this->ROUTE_PREFIX.'.destroy',$row->id),
                        'id'            =>$row->id
                        ]);
                })            
                ->rawColumns(['image','translate.title','status','actions','created_at','created_at.display'])                  
                ->make(true);    
    }  
        if (view()->exists('backend.vacancies.index')) {
            $compact = [
                'trans'                 => $this->TRANS,
                'createRoute'           => route($this->ROUTE_PREFIX.'.create'),                
                'storeRoute'            => route($this->ROUTE_PREFIX.'.store'),
                'destroyMultipleRoute'  => route($this->ROUTE_PREFIX.'.destroyMultiple'), 
                'redirectRoute'         => route($this->ROUTE_PREFIX.'.index'),    
                'allrecords'            => MainModel::count(),
                'publishedCounter'      => MainModel::Status('1')->count(),
                'unpublishedCounter'    => MainModel::Status('0')->count(),                
            ];                       
            return view('backend.vacancies.index',$compact);
        }
}
        public function create(){
            if (view()->exists('backend.vacancies.create')) {
                $compact = [
                    'trans'              => $this->TRANS,
                    'listingRoute'       => route($this->ROUTE_PREFIX.'.index'),
                    'storeRoute'         => route($this->ROUTE_PREFIX.'.store'), 
                ];            
                return view('backend.vacancies.create',$compact);
            }
        }
     public function edit(Request $request,MainModel $vacancy){ 
        if (view()->exists('backend.vacancies.edit')) {         
            $compact = [                
                'updateRoute'             => route($this->ROUTE_PREFIX.'.update',$vacancy->id), 
                'row'                     => $vacancy,
                'TrsanslatedColumnValues' => $this->getItemtranslatedllangs($vacancy,$this->TRANSLATECOLUMNS,$this->TblForignKey),
                'destroyRoute'            => route($this->ROUTE_PREFIX.'.destroy',$vacancy->id),
                'trans'                   => $this->TRANS,
                'redirect_after_destroy'  => route($this->ROUTE_PREFIX.'.index'),
            ];                
             return view('backend.vacancies.edit',$compact);                    
            }
    }

    public function update(ModuleRequest $request, MainModel $vacancy){        
         try {
            DB::beginTransaction();        
            $validated = $request->validated();
            $image = $vacancy->image; 
            if(!empty($request->file('image'))) {
                $vacancy->image && File::exists(public_path($vacancy->image)) ? $this->unlinkFile($vacancy->image): '';
                $image =  $this->uploadFile($request->file('image'),$this->UPLOADFOLDER);
             }    
            if(isset($request->drop_image_checkBox)  && $request->drop_image_checkBox == 1) {                
                $this->unlinkFile($vacancy->image);
                $image = NULL;
            }
 

            $validated['status']           = isset($request->status) ? '1' : '0'; 
            $validated['image']            = $image;



            MainModel::findOrFail($vacancy->id)->update($validated);

            $arr = array('msg' => __($this->TRANS.'.'.'updateMessageSuccess'), 'status' => true);            
            DB::commit();
            $this->UpdateMultiLangsQuery($this->TRANSLATECOLUMNS,$this->TRANS."_translations",[$this->TblForignKey=>$vacancy->id]);            
            $arr = array('msg' => __($this->TRANS.'.updateMessageSuccess'), 'status' => true);
        } catch (\Exception $e) {
            DB::rollback();            
            $arr = array('msg' => __($this->TRANS.'.'.'updateMessageError'), 'status' => false);
        }
         return response()->json($arr);
    }
    public function destroy(MainModel $vacancy){              
        $vacancy->image ? $this->unlinkFile($vacancy->image) : ''; // Unlink Image           
        if($vacancy->delete()){
            $arr = array('msg' => __($this->TRANS.'.'.'deleteMessageSuccess'), 'status' => true);
        }else{
            $arr = array('msg' => __($this->TRANS.'.'.'deleteMessageError'), 'status' => false);
        }        
        return response()->json($arr);
    }

    




    public function destroyMultiple(Request $request){  
        $ids = explode(',', $request->ids);             
        $items = MainModel::whereIn('id',$ids); // Check          
        if($items->delete()){
            $arr = array('msg' => __($this->TRANS.'.'.'MulideleteMessageSuccess'), 'status' => true);
        }else{
            $arr = array('msg' => __($this->TRANS.'.'.'MiltideleteMessageError'), 'status' => false);
        }        
        return response()->json($arr);
    }
    public function UpdateStatus(Request $request){               
        if(DB::table($request->table)->find($request->id)){
            if(DB::table($request->table)->where('id',$request->id)->update(['status'=>$request->status])){
                //$request->status == 1 ? $TRANS = 'site.been_status':$TRANS = 'site.been_unstatus';
                $arr = array('msg' => __('site.status_updated') , 'status' => true);
            }else{
                $arr = array('msg' => 'ERROR', 'status' => false);
            }       
            return response()->json($arr);
      }
    }


}
