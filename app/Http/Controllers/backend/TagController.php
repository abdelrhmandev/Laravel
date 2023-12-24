<?php
namespace App\Http\Controllers\backend;
use App\Http\Requests\backend\TagRequest as ModuleRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelLocalization;
use App\Models\Tag as MainModel;
use App\Models\TagTranslation as TransModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Traits\Functions;
use DataTables;
class TagController extends Controller
{
    use Functions;
    public function __construct()
    {
        $this->TblForignKey = 'tag_id';
        $this->ROUTE_PREFIX = config('custom.route_prefix') . '.tags';
        $this->TRANSLATECOLUMNS = ['title', 'slug','description']; // Columns To be Trsanslated
        $this->TRANS = 'tag';  
        $this->Tbl = 'tags';
    }

    public function index(Request $request)
    {
        $model = MainModel::with(['posts'])->withCount('posts');
        if ($request->ajax()) {
            return Datatables::of($model)
                ->addIndexColumn()
                ->editColumn('translate.title', function (MainModel $row) {
                    return '<a href=' . route($this->ROUTE_PREFIX . '.edit', $row->id) . " class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-item-filter" . $row->id . "=\"item\">" . Str::words($row->translate->title, '5') . '</a>';
                })
                ->AddColumn('count', function (MainModel $row) {                                        
                    $count = '<span aria-hidden="true">—</span>'; 
                    if($row->posts_count >0){    
                    $count = "<a href=".route(config('custom.route_prefix').'.posts.SortBytag',['tag_id'=>$row->id]).">
                                <span class=\"badge badge-circle badge-info\">".$row->posts_count ?? '0' ."</span>
                                </a>"; 
                    }
                    return $count;
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
                ->rawColumns(['image','translate.title','count','actions','created_at','created_at.display'])                  
                ->make(true);
        }
        if (view()->exists('backend.tags.index')) {
            $compact = [
                'trans' => $this->TRANS,
                'createRoute' => route($this->ROUTE_PREFIX . '.create'),
                'storeRoute' => route($this->ROUTE_PREFIX . '.store'),
                'destroyMultipleRoute' => route($this->ROUTE_PREFIX . '.destroyMultiple'),
                'listingRoute' => route($this->ROUTE_PREFIX . '.index'),
                'allrecords' => MainModel::with('posts')->count(),
            ];
            return view('backend.tags.index', $compact);
        }
    }
    public function create()
    {
        if (view()->exists('backend.tags.create')) {
            $compact = [
                'trans'         => $this->TRANS,
                'listingRoute'  => route($this->ROUTE_PREFIX . '.index'),
                'storeRoute'    => route($this->ROUTE_PREFIX . '.store'),
                'tags'          => MainModel::with('posts'),
            ];
            return view('backend.tags.create', $compact);
        }
    }
    public function store(ModuleRequest $request){
        try {
            DB::beginTransaction();        
            $validated               = $request->validated();
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


    public function edit(MainModel $tag)
    {
        if (view()->exists('backend.tags.edit')) {
            $compact = [
                'updateRoute'             => route($this->ROUTE_PREFIX . '.update', $tag->id),
                'row'                     => $tag,
                'TrsanslatedColumnValues' => $this->getItemtranslatedllangs($tag, $this->TRANSLATECOLUMNS, $this->TblForignKey),
                'destroyRoute'            => route($this->ROUTE_PREFIX . '.destroy', $tag->id),
                'redirect_after_destroy'  => route($this->ROUTE_PREFIX . '.index'),
                'trans'                   => $this->TRANS,
            ];
            return view('backend.tags.edit', $compact);
        }
    }

    /////////////
    public function update(ModuleRequest $request, MainModel $tag){
        if($this->UpdateMultiLangsQuery($this->TRANSLATECOLUMNS, $this->TRANS . '_translations', [$this->TblForignKey => $tag->id])){
            $arr = ['msg' => __($this->TRANS.'.updateMessageSuccess'), 'status' => true];
        }else{
            $arr = ['msg' => __($this->TRANS . '.' . 'updateMessageError'), 'status' => false];
        }
        return response()->json($arr);
    }
    public function destroy(MainModel $tag){        
        //SET ALL childs to NULL 
        if($tag->delete()){
            $arr = array('msg' => __($this->TRANS.'.'.'deleteMessageSuccess'), 'status' => true);
        }else{
            $arr = array('msg' => __($this->TRANS.'.'.'deleteMessageError'), 'status' => false);
        }        
        return response()->json($arr);
    }
    public function destroyMultiple(Request $request){  
        $ids = explode(',', $request->ids);
        $items = MainModel::whereIn('id',$ids); // Check          
        if($items->delete()){
            $arr = array('msg' => __($this->TRANS.'.'.'MulideleteMessageSuccess'), 'status' => true);
        }else{
            $arr = array('msg' => __($this->TRANS.'.'.'MiltideleteMessageError'), 'status' => false);
        }        
        return response()->json($arr);
    }
}
