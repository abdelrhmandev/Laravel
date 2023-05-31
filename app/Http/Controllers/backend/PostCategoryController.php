<?php
namespace App\Http\Controllers\backend;
use App\Http\Requests\backend\PostCategoryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelLocalization;
use App\Models\PostCategory;
use App\Models\PostCategoryTranslation;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
 



class PostCategoryController extends Controller
{
    use UploadAble,Functions;

 


    public function store(PostCategoryRequest $request){

        
        $validated = $request->validated();
        $validated['image'] = (!empty($request->image)) ? $this->uploadOne($request->image, 'post_categories') : NULL;    
        $query = PostCategory::create($validated);
 
       
      
        DB::beginTransaction();   
        try{


            // HandleMultiLangdatabase(['title','slug','description']);

            foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties){

          
            $translatable_data[] = [
                'title'            =>$request->input('title_'.substr($properties['regional'],0,2)),
                'slug'             =>Str::slug($request->input('title_'.substr($properties['regional'],0,2))),            
                'description'      =>$request->input('description_'.substr($properties['regional'],0,2)),
                'lang'             =>substr($properties['regional'],0,2),
                'post_category_id' =>$query->id,
                ];                
            }
            PostCategoryTranslation::insert($translatable_data);
            
            $arr = array('msg' => __('site.mission_completed'), 'status' => true);
            DB::commit();
    

 
        } catch (\Exception $e) {
            DB::rollback();
            $arr = array('msg' => $e->getMessage(), 'status' => 'error');
         }
          

        
         return response()->json($arr);
     
}

    public function index(){
        if (view()->exists('backend.post_categories.index')) {
            // $post_categories = District::with(['district_info','area.area_info','area.city.city_info','area.city.country'])->get(); 
            $compact = [
                'storeUrl'   => route('admin.post-category.store'), 
                'redirectUrl'    => route('admin.post_category.index'),
                // 'trans_file'  => $this->trans_file,
                ''    
            ];            
            return view('backend.post_categories.index',$compact);
        }
    }
        public function create(){
        if (view()->exists('backend.post_categories.create')) {
            $compact = [
                'storeUrl'   => route('admin.post-category.store'), 
                'redirectUrl'    => route('admin.post-category.create'),
                // 'trans_file'  => $this->trans_file,
                ''
    
            ];            
            return view('backend.post_categories.create',$compact);
        }
    }
     public function edit(){
        if (view()->exists('backend.post_categories.index')) {
            return view('backend.post_categories.edit');
        }
    }


    public function destroy(){
        dd('delete');
    }


    public function multi_delete(){
        dd('multi_delete');
    }


}
