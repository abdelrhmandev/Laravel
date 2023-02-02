<?php
namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

    

class PermissionController extends Controller

{
    protected $model;
    protected $resource;
    protected $trans_file;


    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    function __construct(Permission $model)

    {
        $this->model = $model;
        $this->resource = 'permissions';
        $this->trans_file = 'permission';
        
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
            'rows' => $this->model::select('id','name','display')->with('permissions')->withCount(['users','permissions'])->latest()->get(), 
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
            'rows' => $this->model::select('id','name','display')->with('permissions')->withCount(['users','permissions'])->latest()->get(), 
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

        $this->validate($request, [

            'name' => 'required|unique:roles,name',

            'permission' => 'required',

        ]);

    

        $role = Role::create(['name' => $request->input('name')]);

        $role->syncPermissions($request->input('permission'));

    

        return redirect()->route('roles.index')

                        ->with('success','Role created successfully');

    }

    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        $role = Role::find($id);

        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")

            ->where("role_has_permissions.role_id",$id)

            ->get();

    

        return view('roles.show',compact('role','rolePermissions'));

    }

    

    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        $role = Role::find($id);

        $permission = Permission::get();

        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)

            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')

            ->all();

    

        return view('roles.edit',compact('role','permission','rolePermissions'));

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

    

        $role = Role::find($id);

        $role->name = $request->input('name');

        $role->save();

    

        $role->syncPermissions($request->input('permission'));

    

        return redirect()->route('roles.index')

                        ->with('success','Role updated successfully');

    }

    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        DB::table("roles")->where('id',$id)->delete();

        return redirect()->route('roles.index')

                        ->with('success','Role deleted successfully');

    }

}