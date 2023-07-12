<?php
namespace App\Http\Controllers\backend;
use App\Http\Requests\backend\CategoryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelLocalization;
use App\Models\Category as MainModel;
use App\Models\CategoryTranslation as TransModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Traits\UploadAble;
use App\Traits\Functions; 
use DataTables;


class CategoryController extends Controller
{
    use UploadAble,Functions;

    public function __construct() {

        $this->TblForignKey = 'category_id';
        $this->ROUTE_PREFIX = 'categories'; 
        $this->TRANSLATECOLUMNS = ['title','slug','description'];
        $this->TRANS = 'category';


    }
    public function store(CategoryRequest $request){

        try {
            DB::beginTransaction();        
            $validated               = $request->validated();
            $validated['published']  = isset($request->published) ? '1' : '0';       
            $validated['image']      = (!empty($request->file('image'))) ? $this->uploadFile($request->file('image'),'categories') : NULL;    
            $validated['parent_id']  = isset($request->parent_id) ? $request->parent_id : NULL;
            $query                   = MainModel::create($validated);
            DB::commit();                
            $translatedArr           = $this->HandleMultiLangdatabase($this->TRANSLATECOLUMNS,[$this->TblForignKey=>$query->id]);                      
           
            if(TransModel::insert($translatedArr)){              
                     $arr = array('msg' => __($this->TRANS.'.'.'storeMessageSuccess'), 'status' => true);
              
            }
        
        } catch (\Exception $e) {
            DB::rollback();            
            $arr = array('msg' => __($this->TRANS.'.'.'storeMessageError'), 'status' => false);
        }
        return response()->json($arr);
        
}

public function index(Request $request){    
    $query = MainModel::where('id','>',0);
    if ($request->ajax()) {
  
            

         return Datatables::of($query->latest())    
                    ->addIndexColumn()
 
                    
                    ->editColumn('translate.title', function ($row) {
                     $route = route('admin.categories.edit',$row->id);   
                    $div = "<div class=\"d-flex align-items-center\">";                            
                    if($row->image){
                        $div.= "<a href=".$route." title='".$row->translate->title."' class=\"symbol symbol-50px\">
                                    <span class=\"symbol-label\" style=\"background-image:url(".asset("storage/".$row->image).")\" />
                                    </span>
                                </a>";                                                                
                    }else{
                        $div.="<a href=".$route." class=\"symbol symbol-50px\" title='".$row->translate->title."'>
                                        <div class=\"symbol-label fs-3 bg-light-primary text-primary\">".$this->str_split($row->translate->title,1)."</div>
                               </a>";  
                    } 
                    $description = '';//"<div class=\"text-muted fs-7 fw-bold\">".Str::of($row->translate->description)->words(8,'...')."</div>";
                    $div.="<div class=\"ms-5\">
                                <a href=".$route." class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-item-filter".$row->id."=\"item\">".$row->translate->title."</a>
                            ".$description."</div>"; 

                    $div.= "</div>";
                    return $div;
                
                })

 
                                                             
  
         
                  ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('d/m/Y');
                })
                
        

                ->editColumn('actions', function ($row) {      
                                                 
                return view('backend.partials.btns.edit-delete', [
                    'trans'=>$this->TRANS,
                    'edit_route'=>route('admin.categories.edit',$row->id),
                    'destroy_route'=>route('admin.categories.destroy',$row->id),
                    'id'=>$row->id]);
                })                           
                ->rawColumns(['translate.title','created_at','actions'])    
                ->make(true);    
    }  
        if (view()->exists('backend.categories.index')) {
            $compact = [
                'trans'          => $this->TRANS,
                'storeUrl'       => route('admin.categories.store'), 
                'redirectUrl'    => route('admin.categories.index'),
            ];            
            return view('backend.categories.index',$compact);
        }
}
        public function create(){
            if (view()->exists('backend.categories.create')) {
                $compact = [
                    'storeUrl'   => route('admin.categories.store'), 
                    'categories' => MainModel::tree()  
                ];            
                return view('backend.categories.create',$compact);
            }
        }

     public function edit(MainModel $category){ 
        if (view()->exists('backend.categories.edit')) {         

          



            $compact = [                
                'updateUrl'               => route('admin.categories.update',$category->id), 
                'categories'              => MainModel::tree($category),
                'row'                     => $category,
                'TrsanslatedColumnValues' => $this->getItemtranslatedllangs($category,$this->TRANSLATECOLUMNS,$this->TblForignKey),
                'destroy_route'           => route('admin.categories.destroy',$category->id),
                'redirect_after_destroy'  => route('admin.categories.index'),
                'trans'                   => $this->TRANS,
            ];            



             return view('backend.categories.edit',$compact);                    
            }
    }

    public function update(CategoryRequest $request, MainModel $category)
    {


        

        
        try {
            DB::beginTransaction();        
            $validated = $request->validated();


            $image = $category->image;

            if(!empty($request->file('image'))) {
               $image =  $this->uploadFile($request->file('image'),'categories');
               $this->unlinkFile($category->image);
             }

            if(isset($request->drop_image_checkBox)  && $request->drop_image_checkBox == 1) {                
                $this->unlinkFile($category->image);
                $image = NULL;
            }

            dd($image);
           

            $data = [
                'published'     =>isset($request->published) ? '1' : '0',
                'image'         => $image,
                'parent_id'     => isset($request->parent_id) ? $request->parent_id : NULL,
            ];

            MainModel::findOrFail($category->id)->update($data);

            $arr = array('msg' => __($this->TRANS.'.'.'updateMessageSuccess'), 'status' => true);            
            DB::commit();
            $this->UpdateMultiLangsQuery($this->TRANSLATECOLUMNS,'category_translations',[$this->TblForignKey=>$category->id]);

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
            $selectedItems->image ? $this->unlinkFile($selectedItems->image) : ''; // Unlink Image            
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
