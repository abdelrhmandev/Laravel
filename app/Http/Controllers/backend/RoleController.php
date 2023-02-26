<?php
namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Response;
use Spatie\Permission\Models\Permission;
use Validator;
use DB;

    

class RoleController extends Controller

{
    protected $model;
    protected $resource;
    protected $trans_file;


    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    function __construct(Role $model)

    {
        $this->model = $model;
        $this->resource = 'roles';
        $this->trans_file = 'role';
        
        //  $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);

        //  $this->middleware('permission:role-create', ['only' => ['create','store']]);

        //  $this->middleware('permission:role-edit', ['only' => ['edit','update']]);

        //  $this->middleware('permission:role-delete', ['only' => ['destroy']]);

    

    }

    

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(){
        $compact = [
            'rows'        => $this->model::select('id','name','trans')->with('permissions')->withCount(['users','permissions'])->latest()->paginate(9), 
            'resource'    => $this->resource,
            'trans_file'  => $this->trans_file,

        ];
        return view('backend.'.$this->resource.'.index', $compact);
    }

    

    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create(){
        $compact = [
            'rows'       => $this->model::select('id','name','trans')->with('permissions')->withCount(['users','permissions'])->latest()->get(), 
            'resource'   => $this->resource,
            'trans_file' => $this->trans_file,
            'permission' => Permission::get(),
        ];
        return view('backend.'.$this->resource.'.create', $compact);
    }

    

    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request){


        // Setup the validator
        $rules = array(
        'title'      =>'required|unique:roles,name');
        $validator = Validator::make($request->all(),$rules);

       

        // Validate the input and return correct response
        // return $validator->errors()->all();
        if ($validator->fails()){
            $msg = $validator->errors()->all(); 
            // $msg = $validator->getMessageBag()->toArray(); 
            $arr = array('msg' => $msg,'status' => false);
        }else{
            $arr = array('msg' => __($this->trans_file.'.storeMessageSuccess'), 'status' => true);
        }        
        return response()->json($arr); // 400 being the HTTP code for an invalid request.



        // ,200); in success
        
                    /*$arry = [
                        'name'          => $request->input('title'),
                        'trans'         => '{"ar" : "الsdasdasdمدير العام", "en" : "SupersadsadasAdmin"}',
                        'guard_name'    =>'web'
                    ];                   
                    $result = $this->model::create($arry);
                    if($result){ 
                        $arr = array('msg' => __($this->trans_file.'.storeMessageSuccess'), 'status' => 'success');
                    }else{
                        $arr = array('msg' => __($this->trans_file.'.storeMessageError'), 'status' => 'error');
                    }
                    return Response()->json($arr);
                    */
                                         
                  
            
                


        /*
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
        $role = $this->model::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
        return redirect()->route($this->$resource.'.index')
                        ->with('success',$this->trans_file.'.storeMessageSuccess');
                        */

    }

    public function show($id){
        $row = $this->model::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();
        return view($this->$resource.'.show',compact('row','rolePermissions'));

    }

    

    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id){
        $row = $this->model::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        return view($this->$resource.'.edit',compact('row','permission','rolePermissions'));

    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',

        ]);
        $row = $this->model::find($id);
        $row->name = $request->input('name');
        $row->save();
        $row->syncPermissions($request->input('permission'));
        return redirect()->route($this->$resource.'.index')
        >with('success',$this->trans_file.'.updateMessageSuccess');
    }

    public function destroy($id){
        // $this->modelwhere('id',$id)->delete();
            return redirect()->route($this->$resource.'.index')->with('success',$this->trans_file.'.deleteMessageSuccess');
    }

}