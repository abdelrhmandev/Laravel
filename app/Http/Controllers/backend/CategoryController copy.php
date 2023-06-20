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
            $compact = [
                'updateUrl'               => route('admin.categories.update',$id), 
                'redirectUrl'             => route('admin.categories.index'),
                'redirectUrlAdd'          => route('admin.categories.create'),
                'categories'              =>  Category::tree(),
                'row'                     => $row,
                'TrsanslatedColumnValues' => $this->getItemtranslatedllangs($row->gg(),['title','slug','description']),
  
            ];            
 
            
             

             return view('backend.categories.edit',$compact);


        }
    }

    public function update(CategoryRequest $request, $id)
    {

        $query = Category::findOrFail($id);
        $validated = $request->validated();




 
        (isset($request->drop_image_checkBox)  && $request->drop_image_checkBox == 1) ? $image_db = NULL : $image_db = $query->image;             
          


        (isset($request->drop_image_checkBox)  && $request->drop_image_checkBox == 1) ? $image_db = NULL : $image_db = $query->image;             
  

        if(!empty($request->file('image'))) {

            $image_db =  $this->uploadFile($request->file('image'),'categories'); 
        }
        dd($image_db);


        Category::where('id', $id)->update(['image' => $image_db]);

    }
    public function destroy(){
        dd('delete');
    }


    public function multi_delete(){
        dd('multi_delete');
    }


}
