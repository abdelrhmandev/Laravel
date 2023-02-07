<?php
namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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
            'rows' => $this->model::select('id','name','trans')->with('permissions')->withCount(['users','permissions'])->latest()->paginate(9), 
            'resource'                        => $this->resource,
            'trans_file'                      => $this->trans_file,

        ];
        return view('backend.'.$this->resource.'.index', $compact);
    }

    

    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

 
        $compact = [
            'rows' => $this->model::select('id','name','trans')->with('permissions')->withCount(['users','permissions'])->latest()->get(), 
            'resource'                        => $this->resource,
            'trans_file'                      => $this->trans_file,

        ];
        return view('backend.'.$this->resource.'.create', $compact);


    }

    

    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        $ids = $request->ids;


                $deleteMessageSuccess = __('admin.deleteMessageSuccess');
                // $deleteMessageError = __('admin.deleteMessageError:Recipe');
    

                    //  return response()->json([
                    //     'status'=>"error",
                    //     'msg'=>$deleteMessageError
                    // ]); // Bad Request
    
                    $arry = [
                        'name' => $request->input('title'),
                        'trans'=> '{"ar" : "الsdasdasdمدير العام", "en" : "SupersadsadasAdmin"}',
                        'guard_name'=>'web'
                    ]; 
     
                    if(Role::create($arry)){
                    return response()->json([
                        'status'=>"success",
                        'msg'=>$deleteMessageSuccess
                    ]); // 
                }


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

    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

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

    public function edit($id)

    {

        $row = $this->model::find($id);

        $permission = Permission::get();

        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)

            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')

            ->all();

    

        return view($this->$resource.'.edit',compact('row','permission','rolePermissions'));

    }

    

    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, $id)

    {

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

    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        // $this->modelwhere('id',$id)->delete();

        return redirect()->route($this->$resource.'.index')

                        ->with('success',$this->trans_file.'.deleteMessageSuccess');

    }

}