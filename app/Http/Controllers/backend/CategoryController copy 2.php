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
            $compact = [
                'updateUrl'               => route('admin.categories.update',$category->id), 
                'categories'              =>  Category::tree(),
                'row'                     => $category,
                'TrsanslatedColumnValues' => $this->getItemtranslatedllangs($category->gg(),['id','title','slug','description']),
            ];            
             return view('backend.categories.edit',$compact);                    
            }
    }

    public function update(CategoryRequest $request, Category $category)
    {

        
        try {
            DB::beginTransaction();        
            $validated = $request->validated();
            $validated['published'] = isset($request->published) ? '1' : '0';       

            // if(isset($request->drop_image_checkBox)  && $request->drop_image_checkBox == 1) {
            //     $validated['image'] = NULL;
            // }else{
            //     $validated['image'] = $category->image;
            // }             
    
            $validated['image'] = 'ssssssssssss';    
            $validated['parent_id'] = isset($request->parent_id) ? $request->parent_id : NULL;

    
            Category::where('id', $category->id)->update($validated);
            DB::commit();                

            
            
       

            // $this->UpdateMultiLangsQuery(['title_','description_','slug_'],'category_translations');
            // $arr = array('msg' => __('category.updateMessageSuccess'), 'status' => true);
              
                
        
        } catch (\Exception $e) {
            DB::rollback();            
            $arr = array('msg' => __('category.updateMessageError'), 'status' => false);
        }
        return response()->json($arr);
           
           

    }
    public function destroy(){
        dd('delete');
    }


    public function multi_delete(){
        dd('multi_delete');
    }


}
