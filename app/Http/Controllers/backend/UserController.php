<?php
namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\Controller;
use LaravelLocalization;
use App\Models\User;
use App\Traits\UploadAble;
use App\Traits\Functions;
// use App\Traits\DatatableLang;
 
use DataTables;
use DB; 
use Illuminate\Support\Str;


class UserController extends Controller
{
    use UploadAble,Functions;
    protected $model;
    protected $resource;
    protected $trans_file;

    public function __construct(User $model){
        $this->model = $model;
        $this->resource = 'users';
        $this->trans_file = 'user';
    }

 
    public function index(Request $request){    
         
 
             $query = $this->model;
            if ($request->ajax()) {
                      

                 return Datatables::of($query->latest())    
                            ->addIndexColumn()
                  
                            
                            ->editColumn('name', function ($row) {
                             $route = route('admin.'.$this->resource.'.edit',$row->id);   
                            $div = "<div class=\"d-flex align-items-center\">";                            
                            if($row->image){
                                $div.= "<a href=".$route." title='".$row->name."' class=\"symbol symbol-50px\">
                                            <span class=\"symbol-label\" style=\"background-image:url(".asset("storage/".$row->image).")\" />
                                            </span>
                                        </a>";                                                                
                            }else{
                                $div.="<a href=".$route." class=\"symbol symbol-50px\" title='".$row->name."'>
                                                <div class=\"symbol-label fs-3 bg-light-primary text-primary\">".$this->str_split($row->name,1)."</div>
                                       </a>";  
                            } 
                      

                            $div.= "</div>";
                            return $div;
                        
                        })

                                                             
        
 
 

                        ->editColumn('actions', function ($row) {      
                                                         
                        return view('backend.partials.btns.edit-delete', ['edit_route'=>route('admin.'.$this->resource.'.edit',$row->id),'destroy_route'=> route('admin.'.$this->resource.'.destroy',$row->id)]);
                        })        
                        
                        
                        ->editColumn('role', function ($row) {      
                                                         
                            return 'sdsadsa';
                            })    

                        ->rawColumns(['name','role','created_at','actions'])    
                        ->make(true);    
            }    

         


            $compact                          = [
            'resource'                        => $this->resource,
            'trans_file'                      => $this->trans_file,
            'page_title'                      => trans('orphan.interventions_menu'),
            'header_title'                    => trans('orphan.interventions_menu')
            ];
            //
            
            return view('backend.'.$this->resource.'.index', $compact);
        


    
        }
        

      
        
 
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create(){             

            $compact                          = [
                'resource'                        => $this->resource,
                'trans_file'                      => $this->trans_file,
                'categories'                      => RecipeCategory::select('id'),
                'page_title'                      => trans('orphan.interventions_menu'),
                'header_title'                    => trans('orphan.interventions_menu')
                ];

            // $this->recipe->create(['pulished'=>1,'featured'=>1]);            
            // $users =  Input::get('posts');
            // $users->tags()->sync($request->tags, false);
            //
            return view('backend.'.$this->resource.'.create', $compact);
        }
    
 
        public function store(Request $request)
        {
            // Product::whereId($request -> product_id) -> update($request -> only(['price','special_price','special_price_type','special_price_start','special_price_end']));

        }
    
   
 
 
        public function edit($id){
            
         
            // $nutritions = nutrition::get()->map(function($nutrition) use ($recipe) {
            //     $nutrition->value = data_get($recipe->nutritions->firstWhere('id', $nutrition->id), 'pivot.amount') ?? null;
            //     return $nutrition;
            // });
        
         
          

       
            
            
            $row = $this->model::withCount(                
                'likes',
                'dislikes',              
            )
            ->with('category')
            ->with(['likes.owner','dislikes.owner' => function ($query) {
                $query->select('id','name');
            }])
            
            ->find($id);






            


          
              
 
            
            
            $recipe_nutritions = $row->nutritions;
            $nutritions = Nutrition::get()->map(function($nutrition) use ($recipe_nutritions) {
                $nutrition->value = data_get($recipe_nutritions->firstWhere('id', $nutrition->id), 'pivot.value') ?? null;
                return $nutrition;
            });


            


     
            $compact                               = [
            'row'                                => $row,
            // 'comments'                           => $row->getThreadedComments(),   
            // 'media'                           => $row->media,
            // 'tags'                            => Tag::select('id')->with('item')->latest()->get(),
            // 'nutritions'                      => $nutritions,
            // 'categories'                      => RecipeCategory::select('id')->with('item')->get(),
            'page_title'                      => trans('orphan.interventions_menu'),
            'header_title'                    => trans('orphan.interventions_menu')
            ];
            return view('backend.users.edit', $compact);
            //
        }
    
 
        public function update(Request $request, $id)
        {


            $row = $this->model::findOrFail($id);
            // Product::whereId($request -> product_id) -> update($request -> only(['price','special_price','special_price_type','special_price_start','special_price_end']));


            // tags update         
            $row->tag()->sync((array)$request->input('tag'));           
            $row->nutritions()->sync($this->mapnutritions($request->input('nutritions')));
         
            return redirect()->back();
            //
        }
    
 
        public function destroy($id){

            $deleteMessageSuccess = __('admin.deleteMessageSuccess:Recipe');
            $deleteMessageError = __('admin.deleteMessageError:Recipe');
            // DB::table('settings')->where('id',$id)->delete();

            if($id == 100)
            {
                return response()->json([
                    'status'=>"error",
                    'msg'=>$deleteMessageError.$id
                ]); // Bad Request


            }else{

                return response()->json([
                    'status'=>"success",
                    'msg'=>$deleteMessageSuccess.$id
                ]); // 
    
            }

 


            return $id;

            // return redirect()->route('users.index')->with(['success' => 'تم  الحذف بنجاح']);
            // try {
            //     //get specific categories and its translations
            //     $recipe = $this->model::find($id);
    
            //     if (!$recipe)
            //         return redirect()->route('admin.users')->with(['error' => 'هذا الماركة غير موجود ']);
    
            //     $recipe->delete();
    
            //     return redirect()->route('admin.users')->with(['success' => 'تم  الحذف بنجاح']);
    
            // } catch (\Exception $ex) {
            //     return redirect()->route('admin.users')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
            // }
        }

        /*
            public function deleteAll(Request $request)

    {

        $ids = $request->ids;

        DB::table("products")->whereIn('id',explode(",",$ids))->delete();

        return response()->json(['success'=>"Products Deleted successfully."]);

    }
     */
        public function destroyMultiple(Request $request){
            // if (is_array(request('ids'))) {
               
 

                // return $ids;

                $ids = $request->ids;

                $deleteMessageSuccess = __('admin.deleteMessageSuccess');
                // $deleteMessageError = __('admin.deleteMessageError:Recipe');
    

                    //  return response()->json([
                    //     'status'=>"error",
                    //     'msg'=>$deleteMessageError
                    // ]); // Bad Request
    
     
                    return response()->json([
                        'status'=>"success",
                        'msg'=>$deleteMessageSuccess
                    ]); // 
        
     


                // $ids = [];
                // foreach (request('item') as $id) {
                //    $ids = $id;
                // }
                // return $ids;
            // } 
    /*
         try {

            Post::destroy($request->ids);
            return response()->json([
                'message'=>"Posts Deleted successfully."
            ],200);

        } catch(\Exception $e) {
            report($e);
        }*/
    
        }
 

    }

