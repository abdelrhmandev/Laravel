<?php
namespace App\Http\Controllers\backend;
use App\Http\Requests\backend\CategoryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelLocalization;
use App\Models\Category;
use App\Models\CategoryTranslation;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Traits\UploadAble;
use App\Traits\Functions; 



class CategoryController extends Controller
{
    use UploadAble,Functions;

    public function store(CategoryRequest $request){

        try {
            DB::beginTransaction();        
            $validated = $request->validated();
            $validated['published'] = isset($request->published) ? '1' : '0';       
            $validated['image'] = (!empty($request->file('image'))) ? $this->uploadFile($request->file('image'),'categories') : NULL;    
            $validated['parent_id'] = isset($request->parent_id) ? $request->parent_id : NULL;
            $query = Category::create($validated);
            DB::commit();                
            $translatedArr = $this->HandleMultiLangdatabase(['title_','slug_','description_'],['category_id'=>$query->id]);                      
            
       
            if(CategoryTranslation::insert($translatedArr)){              
                     $arr = array('msg' => __('category.storeMessageSuccess'), 'status' => true);
              
                }
        
        } catch (\Exception $e) {
            DB::rollback();            
            $arr = array('msg' => __('category.storeMessageError'), 'status' => false);
        }
        return response()->json($arr);
        
}

    public function index(){
        if (view()->exists('backend.categories.index')) {
            $compact = [
                'storeUrl'   => route('admin.categories.store'), 
                'redirectUrl'    => route('admin.categories.index'),
            ];            
            return view('backend.categories.index',$compact);
        }
    }
        public function create(){
        if (view()->exists('backend.categories.create')) {
            $compact = [
                'storeUrl'   => route('admin.categories.store'), 
                'categories' =>  Category::tree()  
            ];            
             return view('backend.categories.create',$compact);
        }
    }
     public function edit(Category $category){ 
        if (view()->exists('backend.categories.edit')) {         



            $kk = CategoryTranslation::where('category_id',$category->id)->get();
            
            $TrsanslatedColumnValues = $this->getItemtranslatedllangs($kk,['title','slug','description']);
            $compact = [                
                'updateUrl'               => route('admin.categories.update',$category->id), 
                'categories'              =>  Category::tree($category),
                'row'                     => $category,
                'TrsanslatedColumnValues' => $TrsanslatedColumnValues,
                'destroy_route'           =>route('admin.categories.destroy',$category->id),
            ];            



             return view('backend.categories.edit',$compact);                    
            }
    }

    public function update(CategoryRequest $request, Category $category)
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


            $data = [
                'published'     =>isset($request->published) ? '1' : '0',
                'image'         => $image,
                'parent_id'     => isset($request->parent_id) ? $request->parent_id : NULL,
            ];

            Category::findOrFail($category->id)->update($data);
            $arr = array('msg' => __('category.updateMessageSuccess'), 'status' => true);
            
            DB::commit();
            
            
            $this->UpdateMultiLangsQuery(['title_','description_','slug_'],'category_translations',['category_id'=>$category->id]);

        } catch (\Exception $e) {
            DB::rollback();            
            $arr = array('msg' => __('category.updateMessageError'), 'status' => false);
        }
        return response()->json($arr);

            
           

    }
    public function destroy(Category $category){
        

        // SET ALL childs to NULL 
        $childs = $category->where('parent_id', $category->id);     
        foreach ($childs->get() as $child) {
            $child->id ? Category::where('id',$child->id)->update(['parent_id' => NULL]) : '';
        }
        
        $category->image ? $this->unlinkFile($category->image) : '';
        $item = Category::findOrFail($category->id);
        $item ? $item->delete() : '';
        

    }


    public function multi_delete(){
        dd('multi_delete');
    }


}
