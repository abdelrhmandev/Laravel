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

        
        $validated = $request->validated();
        $validated['published'] = isset($request->published) ? '1' : '0';

       
        $validated['image'] = (!empty($request->image)) ? $this->uploadOne($request->image, 'categories') : NULL;    
        $query = Category::create($validated);
 
       
      
        

           $cc = $this->HandleMultiLangdatabase(['title_','slug_','description_'],['category_id'=>$query->id]);



        
         

                CategoryTranslation::insert($cc);

         
        //    $ccx = (array_values($cc));


            // dd($request);

        //    dd( $request->only($cc));

        //    $cc['post_category_id'] = 2;
            
        //    return response()->json($request->$cc);

        // CategoryTranslation::insert($cc);

            //   return response()->json($cc);
           
      

  

        
        
     
}

    public function index(){
        if (view()->exists('backend.categories.index')) {
            // $categories = District::with(['district_info','area.area_info','area.city.city_info','area.city.country'])->get(); 
            $compact = [
                'storeUrl'   => route('admin.categories.store'), 
                'redirectUrl'    => route('admin.categories.index'),
                // 'trans_file'  => $this->trans_file,
                ''    
            ];            
            return view('backend.categories.index',$compact);
        }
    }
        public function create(){
        if (view()->exists('backend.categories.create')) {
            $compact = [
                'storeUrl'   => route('admin.categories.store'), 
                'redirectUrl'    => route('admin.categories.create'),
                // 'trans_file'  => $this->trans_file,
                'categories' =>  Category::with('_children')->get(), 

    
            ];            


   
 ?>
       

<?php


             return view('backend.categories.create',$compact);
        }
    }
     public function edit(){
        if (view()->exists('backend.categories.index')) {
            return view('backend.categories.edit');
        }
    }


    public function destroy(){
        dd('delete');
    }


    public function multi_delete(){
        dd('multi_delete');
    }


}
