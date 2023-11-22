<?php
namespace App\Http\Controllers\backend;
use DataTables;
use Carbon\Carbon;
use LaravelLocalization;
use App\Traits\Functions; 
use App\Traits\UploadAble;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Slider as MainModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File; 
use App\Models\SliderTranslation as TransModel;
use App\Http\Requests\backend\SliderRequest as ModuleRequest;


class SliderController extends Controller
{
    use UploadAble,Functions;

    public function __construct() {

        
        $this->TblForignKey         = 'slider_id';
        $this->ROUTE_PREFIX         = config('custom.route_prefix').'.sliders'; 
        $this->TRANSLATECOLUMNS     = ['title','description']; // Columns To be Trsanslated
        $this->TRANS                = 'slider';
        $this->UPLOADFOLDER         = 'sliders';
        $this->Tbl                  = 'sliders';
    }


 

    public function store(ModuleRequest $request){

        try {
            DB::beginTransaction();        
            $validated                     = $request->validated(); 
            $validated['featured']         = isset($request->featured) ? '1' : '0';                          
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
    $model = MainModel::where('id','>=','0');

    
 
    
 
    return Datatables::of($model)
            ->addIndexColumn()   
            ->editColumn('translate.title', function (MainModel $row) {
                return "<a href=".route($this->ROUTE_PREFIX.'.edit',$row->id)." class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-item-filter".$row->id."=\"item\">".Str::words($row->translate->title, '5')."</a>";    

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
            //////////////Category Search Filter Original Code////////////////////////
       
            //////////////////////////////////////////////////////////            
 
 
 
            ->editColumn('created_at', function (MainModel $row) {
                // if($row->status == 1){
                //     $checked = "checked";
                //     $statusLabel  = "<span class=\"badge py-3 px-4 fs-7 badge-light-primary\">".__('site.published')."</span>";                                                   
                // }else{
                //     $checked = "";
                //     $statusLabel  ="<span class=\"badge py-3 px-4 fs-7 badge-light-danger\">".__('site.unpublished')."</span>";   
                // }                    
                // $status =   "<div class=\"form-check form-switch form-check-custom form-check-solid\"><input class=\"form-check-input h-20px w-30px UpdateStatus\" name=\"Updatetatus\" type=\"checkbox\" ".$checked." id=\"Status".$row->id."\" onclick=\"UpdateStatus($row->id,'".__($this->TRANS.'.plural')."','$this->Tbl','".route('admin.UpdateStatus')."')\" />&nbsp;".$statusLabel."</div>";                
                return [                    
                   'display'   => "<div class=\"font-weight-bolder text-primary mb-0\">". Carbon::parse($row->created_at)->format('d/m/Y')."</div>", 
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
            ->rawColumns(['image','translate.title','featured','actions','created_at','created_at.display'])                  
            ->make(true);    
    }  
        if (view()->exists('backend.sliders.index')) {
            $compact = [
                'trans'                 => $this->TRANS,
                'createRoute'           => route($this->ROUTE_PREFIX.'.create'),                
                'storeRoute'            => route($this->ROUTE_PREFIX.'.store'),
                'destroyMultipleRoute'  => route($this->ROUTE_PREFIX.'.destroyMultiple'), 
                'redirectRoute'         => route($this->ROUTE_PREFIX.'.index'),    
                'allrecords'            => MainModel::count(),
            ];                       
            return view('backend.sliders.index',$compact);
        }
}
        public function create(){
            if (view()->exists('backend.sliders.create')) {
                $compact = [
                    'trans'              => $this->TRANS,
                    'listingRoute'       => route($this->ROUTE_PREFIX.'.index'),
                    'storeRoute'         => route($this->ROUTE_PREFIX.'.store'), 
                ];            
                return view('backend.sliders.create',$compact);
            }
        }
     public function edit(Request $request,MainModel $slider){ 
       
        if (view()->exists('backend.sliders.edit')) {         
            $compact = [                
                'updateRoute'             => route($this->ROUTE_PREFIX.'.update',$slider->id), 
                'row'                     => $slider,
                'TrsanslatedColumnValues' => $this->getItemtranslatedllangs($slider,$this->TRANSLATECOLUMNS,$this->TblForignKey),
                'destroyRoute'            => route($this->ROUTE_PREFIX.'.destroy',$slider->id),
                'trans'                   => $this->TRANS,
                'redirect_after_destroy'  => route($this->ROUTE_PREFIX.'.index'),
            ];                
             return view('backend.sliders.edit',$compact);                    
            }
    }

    public function update(ModuleRequest $request, MainModel $slider){        
         try {
            DB::beginTransaction();        
            $validated = $request->validated();
            $image = $slider->image; 
            if(!empty($request->file('image'))) {
                $slider->image && File::exists(public_path($slider->image)) ? $this->unlinkFile($slider->image): '';
                $image =  $this->uploadFile($request->file('image'),$this->UPLOADFOLDER);
             }    
            if(isset($request->drop_image_checkBox)  && $request->drop_image_checkBox == 1) {                
                $this->unlinkFile($slider->image);
                $image = NULL;
            }
         


            $validated['featured']         = isset($request->featured) ? '1' : '0';   
            $validated['image']            = $image;


            MainModel::findOrFail($slider->id)->update($validated);


            $arr = array('msg' => __($this->TRANS.'.'.'updateMessageSuccess'), 'status' => true);            
            DB::commit();
            $this->UpdateMultiLangsQuery($this->TRANSLATECOLUMNS,$this->TRANS."_translations",[$this->TblForignKey=>$slider->id]);            
            $arr = array('msg' => __($this->TRANS.'.updateMessageSuccess'), 'status' => true);
        } catch (\Exception $e) {
            DB::rollback();            
            $arr = array('msg' => __($this->TRANS.'.'.'updateMessageError'), 'status' => false);
        }
         return response()->json($arr);
    }
    public function destroy(MainModel $slider){        
      


        if($slider->delete()){
            $arr = array('msg' => __($this->TRANS.'.'.'deleteMessageSuccess'), 'status' => true);
        }else{
            $arr = array('msg' => __($this->TRANS.'.'.'deleteMessageError'), 'status' => false);
        }        
        return response()->json($arr);
    }


    public function destroyMultiple(Request $request){  
        $ids = explode(',', $request->ids);

        foreach (MainModel::whereIn('id',$ids)->get() as $selectedItems) {
            $selectedItems->image ? $this->unlinkFile($selectedItems->image) : ''; // Unlink Images            
        }     
        $items = MainModel::whereIn('id',$ids); // Check          
        if($items->delete()){
            $arr = array('msg' => __($this->TRANS.'.'.'MulideleteMessageSuccess'), 'status' => true);
        }else{
            $arr = array('msg' => __($this->TRANS.'.'.'MiltideleteMessageError'), 'status' => false);
        }        
        return response()->json($arr);
    }



}
