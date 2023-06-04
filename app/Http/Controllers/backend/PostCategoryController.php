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
use App\Traits\UploadAble;
use App\Traits\Functions; 



class PostCategoryController extends Controller
{
    use UploadAble,Functions;

 


    public function store(PostCategoryRequest $request){

        
        $validated = $request->validated();
        $validated['published'] = isset($request->published) ? 1 : 0;
        $validated['image'] = (!empty($request->image)) ? $this->uploadOne($request->image, 'post_categories') : NULL;    
        $query = PostCategory::create($validated);
 
       
      
   

           $cc = $this->HandleMultiLangdatabase(['title_','slug_','description_'],['post_category_id'=>$query->id]);



        
         

                PostCategoryTranslation::insert($cc);

         
        //    $ccx = (array_values($cc));


            // dd($request);

        //    dd( $request->only($cc));

        //    $cc['post_category_id'] = 2;
            
        //    return response()->json($request->$cc);

        // PostCategoryTranslation::insert($cc);

            //   return response()->json($cc);
           
      

  

        
        
     
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
