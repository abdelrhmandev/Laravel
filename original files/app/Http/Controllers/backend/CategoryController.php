<?php
namespace App\Http\Controllers\backend;
use App\Http\Requests\backend\CategoryRequest as ModuleRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelLocalization;
use App\Models\Category as MainModel;
use App\Models\CategoryTranslation as TransModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Traits\UploadAble;
use Illuminate\Support\Facades\File; 
use Carbon\Carbon;
use App\Traits\Functions; 
use DataTables;


class CategoryController extends Controller
{
    use UploadAble,Functions;

    public function __construct() {        
        $this->TblForignKey         = 'category_id';
        $this->ROUTE_PREFIX         = config('custom.route_prefix').'.categories'; 
        $this->TRANSLATECOLUMNS     = ['title','slug','description']; // Columns To be Trsanslated
        $this->TRANS                = 'category';
        $this->UPLOADFOLDER         = 'categories';
        $this->Tbl                  = 'categories';    
    }


    
    public function store(ModuleRequest $request){
        try {
            DB::beginTransaction();        
            $validated               = $request->validated();
            $validated['image']      = (!empty($request->file('image'))) ? $this->uploadFile($request->file('image'),$this->UPLOADFOLDER) : NULL;    
            $validated['parent_id']  = isset($request->parent_id) ? $request->parent_id : NULL;
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
    $model = MainModel::with(['parent','posts'])->withCount('posts');
    if ($request->ajax()) {              
         return Datatables::of($model)
                ->addIndexColumn()                 
                ->editColumn('translate.title', function (MainModel $row) {
                    return "<a href=".route($this->ROUTE_PREFIX.'.edit',$row->id)." class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-item-filter".$row->id."=\"item\">".Str::words($row->translate->title, '5')."</a>";                     
                })                                                              
                ->editColumn('image', function ($row) {
                    return $this->dataTableGetImage($row,$this->ROUTE_PREFIX.'.edit');
                })         
                 ->editColumn('parent_id', function (MainModel $row) {
                    return $row->parent->translate->title ?? "<span aria-hidden=\"true\">—</span>";
                })
                ->AddColumn('count', function (MainModel $row) {                    
                    return  "<a href=".route(config('custom.route_prefix').'.posts.SortBycategory',['category_id'=>$row->id]).">
                                <span class=\"badge badge-circle badge-primary\">".$row->posts_count ?? '0' ."</span>
                                </a>";                   
                })
            ->editColumn('created_at', function (MainModel $row) {
                return $this->dataTableGetCreatedat($row->created_at);
             })
             ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%d/%m/%Y') LIKE ?", ["%$keyword%"]);
             })             
                ->editColumn('actions', function ($row) {                                                       
                    return $this->dataTableEditRecordAction($row,$this->ROUTE_PREFIX);
                })                            
                ->rawColumns(['image','translate.title','parent_id','count','actions','created_at','created_at.display'])                  
                ->make(true);    
    }  
        if (view()->exists('backend.categories.index')) {
            $compact = [
                'trans'                 => $this->TRANS,
                'createRoute'           => route($this->ROUTE_PREFIX.'.create'),                
                'storeRoute'            => route($this->ROUTE_PREFIX.'.store'),
                'destroyMultipleRoute'  => route($this->ROUTE_PREFIX.'.destroyMultiple'), 
                'listingRoute'          => route($this->ROUTE_PREFIX.'.index'),
                'categories'            => MainModel::tree(),                  
            ];            
            return view('backend.categories.index',$compact);
        }
}
        public function create(){
            if (view()->exists('backend.categories.create')) {
                $compact = [
                    'trans'              => $this->TRANS,
                    'listingRoute'       => route($this->ROUTE_PREFIX.'.index'),
                    'storeRoute'         => route($this->ROUTE_PREFIX.'.store'), 
                    'categories'         => MainModel::tree()  
                ];            
                return view('backend.categories.create',$compact);
            }
        }

     public function edit(MainModel $category){ 
        if (view()->exists('backend.categories.edit')) {         
            $compact = [                
                'updateRoute'             => route($this->ROUTE_PREFIX.'.update',$category->id), 
                'categories'              => MainModel::tree($category),
                'row'                     => $category,
                'TrsanslatedColumnValues' => $this->getItemtranslatedllangs($category,$this->TRANSLATECOLUMNS,$this->TblForignKey),
                'destroyRoute'            => route($this->ROUTE_PREFIX.'.destroy',$category->id),
                'redirect_after_destroy'  => route($this->ROUTE_PREFIX.'.index'),
                'trans'                   => $this->TRANS,
            ];            
             return view('backend.categories.edit',$compact);                    
            }
    }

    public function update(ModuleRequest $request, MainModel $category){        
         try {
            DB::beginTransaction();        
            $validated = $request->validated();
            $image = $category->image; 
            if(!empty($request->file('image'))) {
                $category->image && File::exists(public_path($category->image)) ? $this->unlinkFile($category->image): '';
                $image =  $this->uploadFile($request->file('image'),$this->UPLOADFOLDER);
             }               
            if(isset($request->drop_image_checkBox)  && $request->drop_image_checkBox == 1) {                
                $this->unlinkFile($category->image);
                $image = NULL;
            }                 
            $validated['image']      = $image;
            $validated['parent_id']  = isset($request->parent_id) ? $request->parent_id : NULL;
            $validated['']   = 'posts';
            MainModel::findOrFail($category->id)->update($validated);
           
            $arr = array('msg' => __($this->TRANS.'.'.'updateMessageSuccess'), 'status' => true);            
            DB::commit();
            $this->UpdateMultiLangsQuery($this->TRANSLATECOLUMNS,$this->TRANS."_translations",[$this->TblForignKey=>$category->id]);            
            $arr = array('msg' => __($this->TRANS.'.updateMessageSuccess'), 'status' => true);
        } catch (\Exception $e) {
            DB::rollback();            
            $arr = array('msg' => __($this->TRANS.'.'.'updateMessageError'), 'status' => false);
        }
         return response()->json($arr);
    }
    public function destroy(MainModel $category){        
        //SET ALL childs to NULL 
        $childs = $category->where('parent_id', $category->id);     
        foreach ($childs->get() as $child) {
            $child->id ? MainModel::where('id',$child->id)->update(['parent_id' => NULL]) : '';
        }        
        $category->image ? $this->unlinkFile($category->image) : ''; // Unlink Image        
        if($category->delete()){
            $arr = array('msg' => __($this->TRANS.'.'.'deleteMessageSuccess'), 'status' => true);
        }else{
            $arr = array('msg' => __($this->TRANS.'.'.'deleteMessageError'), 'status' => false);
        }        
        return response()->json($arr);

    }

    public function destroyMultiple(Request $request){  
        $ids = explode(',', $request->ids);
        $childs = MainModel::whereIn('parent_id',$ids);     
        foreach ($childs->get() as $child) {
            $child->id ? MainModel::where('id',$child->id)->update(['parent_id' => NULL]) : '';
            $child->image ? $this->unlinkFile($child->image) : ''; // Unlink Image 
        }
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
