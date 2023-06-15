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
        $validated['parent_id'] = isset($request->parent_id) ? $request->parent_id : NULL;


        $query = Category::create($validated);
        DB::beginTransaction();
        try{
            $translatedArr = $this->HandleMultiLangdatabase(['title_','slug_','description_'],['category_id'=>$query->id]);
            if(CategoryTranslation::insert($translatedArr)){
                $arr = array('msg' => __('category.storeMessageSuccess'), 'status' => true);
            }
        DB::commit();
        }
        catch (\Exception $e) {
            DB::rollback();
            $arr = array('msg' => __('category.storeMessageError'), 'status' => false);
         }

        return response()->json($arr);
           
      

  

        
        
     
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


            // echo '<pre>';
     

 

    

            $compact = [
                'storeUrl'   => route('admin.categories.store'), 
                'redirectUrl'    => route('admin.categories.index'),
                'redirectUrlAdd'    => route('admin.categories.create'),
                'categories' =>  Category::tree()
  
            ];            


   
 
 
         


          

             return view('backend.categories.create',$compact);

        }
    }
     public function edit($id){


 
        if (view()->exists('backend.categories.edit')) {





            
 

            $row = Category::findOrFail($id);

            $e =  CategoryTranslation::where('category_id',$id)->get();
            $arr = [];
            foreach($e as $v){
                $arr[$v->lang] = ['title'=>$v->title , 'slug'=>$v->slug];
            } 
 

            $compact = [
                'updateUrl'         => route('admin.categories.update',$id), 
                'redirectUrl'       => route('admin.categories.index'),
                'redirectUrlAdd'    => route('admin.categories.create'),
                'categories'        =>  Category::tree(),
                'row'               => $row,
                'values'            => $arr,
  
            ];            
 
            
             

             return view('backend.categories.edit',$compact);


        }
    }


    public function destroy(){
        dd('delete');
    }


    public function multi_delete(){
        dd('multi_delete');
    }


}
