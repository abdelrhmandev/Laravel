<?php
namespace App\Http\Controllers\backend;
use DataTables;
use Carbon\Carbon;
use LaravelLocalization;
use Illuminate\Support\Str;
use App\Traits\Functions; 
use Illuminate\Http\Request;
use App\Models\Faq as MainModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\FaqTranslation as TransModel;
use App\Http\Requests\backend\FaqRequest as ModuleRequest;


class FaqController extends Controller
{
    use Functions;
    public function __construct() {        
        $this->TblForignKey         = 'faq_id';
        $this->ROUTE_PREFIX         = config('custom.route_prefix').'.faqs'; 
        $this->TRANSLATECOLUMNS     = ['question','answer']; // Columns To be Trsanslated
        $this->TRANS                = 'faq';
        $this->Tbl                  = 'faqs';
    }
    public function store(ModuleRequest $request){

        try {
            DB::beginTransaction();        
            $validated               = $request->validated();            
            $id = DB::table($this->Tbl)->insertGetId([
                'id' => NULL,
            ]);                                  
            $translatedArr = $this->HandleMultiLangdatabase($this->TRANSLATECOLUMNS,[$this->TblForignKey=>$id]);                                           
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
                ->editColumn('translate.question', function (MainModel $row) {
                    $div =  "<a href=".route($this->ROUTE_PREFIX.'.edit',$row->id)." class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-item-filter".$row->id."=\"item\">".Str::words($row->translate->question, '20')."</a>";
                    $div.=  "<p>".Str::words($row->translate->answer, '20')."</p>";                  
                    return $div;   
                })                                                              
             
                ->editColumn('actions', function ($row) {                                                       
                    return view('backend.partials.btns.edit-delete', [
                        'trans'         =>$this->TRANS,                       
                        'editRoute'     =>route($this->ROUTE_PREFIX.'.edit',$row->id),
                        'destroyRoute'  =>route($this->ROUTE_PREFIX.'.destroy',$row->id),
                        'id'            =>$row->id
                        ]);
                })            
                ->rawColumns(['translate.question','actions','created_at','created_at.display'])                  
                ->make(true);    
    }  
        if (view()->exists('backend.faqs.index')) {
            $compact = [
                'trans'                 => $this->TRANS,
                'createRoute'           => route($this->ROUTE_PREFIX.'.create'),                
                'storeRoute'            => route($this->ROUTE_PREFIX.'.store'),
                'destroyMultipleRoute'  => route($this->ROUTE_PREFIX.'.destroyMultiple'), 
                'redirectRoute'         => route($this->ROUTE_PREFIX.'.index'),    
                'allrecords'            => MainModel::count(),
            ];                       
            return view('backend.faqs.index',$compact);
        }
}
        public function create(){
            if (view()->exists('backend.faqs.create')) {
                $compact = [
                    'trans'              => $this->TRANS,
                    'listingRoute'       => route($this->ROUTE_PREFIX.'.index'),
                    'storeRoute'         => route($this->ROUTE_PREFIX.'.store'), 
                ];            
                return view('backend.faqs.create',$compact);
            }
        }
     public function edit(Request $request,MainModel $faq){ 
        if (view()->exists('backend.faqs.edit')) {         
            $compact = [                
                'updateRoute'             => route($this->ROUTE_PREFIX.'.update',$faq->id), 
                'row'                     => $faq,
                'TrsanslatedColumnValues' => $this->getItemtranslatedllangs($faq,$this->TRANSLATECOLUMNS,$this->TblForignKey),
                'destroyRoute'            => route($this->ROUTE_PREFIX.'.destroy',$faq->id),
                'trans'                   => $this->TRANS,
                'redirect_after_destroy'  => route($this->ROUTE_PREFIX.'.index'),
            ];                
             return view('backend.faqs.edit',$compact);                    
            }
    }

    public function update(ModuleRequest $request, MainModel $faq){        
         try {
            DB::beginTransaction();        
            $validated = $request->validated();
            $image = $faq->image; 
            if(!empty($request->file('image'))) {
                $faq->image && File::exists(public_path($faq->image)) ? $this->unlinkFile($faq->image): '';
                $image =  $this->uploadFile($request->file('image'),$this->UPLOADFOLDER);
             }    
            if(isset($request->drop_image_checkBox)  && $request->drop_image_checkBox == 1) {                
                $this->unlinkFile($faq->image);
                $image = NULL;
            }
 

            $validated['status']           = isset($request->status) ? '1' : '0'; 
            $validated['image']            = $image;



            MainModel::findOrFail($faq->id)->update($validated);

            $arr = array('msg' => __($this->TRANS.'.'.'updateMessageSuccess'), 'status' => true);            
            DB::commit();
            $this->UpdateMultiLangsQuery($this->TRANSLATECOLUMNS,$this->TRANS."_translations",[$this->TblForignKey=>$faq->id]);            
            $arr = array('msg' => __($this->TRANS.'.updateMessageSuccess'), 'status' => true);
        } catch (\Exception $e) {
            DB::rollback();            
            $arr = array('msg' => __($this->TRANS.'.'.'updateMessageError'), 'status' => false);
        }
         return response()->json($arr);
    }
    public function destroy(MainModel $faq){              
        $faq->image ? $this->unlinkFile($faq->image) : ''; // Unlink Image           
        if($faq->delete()){
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
    


}
