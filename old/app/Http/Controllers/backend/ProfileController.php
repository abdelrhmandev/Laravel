<?php
namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\Functions; 
use App\Traits\UploadAble;
use App\Models\User as MainModel;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\backend\ProfileRequest as ModuleRequest;
class ProfileController extends Controller
{
    protected $model;
    protected $resource;
    protected $trans_file;

    use UploadAble,Functions;

    public function __construct()
    {
      $this->ROUTE_PREFIX         = config('custom.route_prefix').'.profile'; 
      $this->TRANS                = 'site';
      $this->UPLOADFOLDER         = 'avarats';
    }
    public function index()
    {
        if (view()->exists('backend.profile.edit')) {
            $compact = [
            'trans'              => $this->TRANS,
            'updateRoute'        => route($this->ROUTE_PREFIX.'.update'), 
            'editPasswordRoute'  => route($this->ROUTE_PREFIX.'.editpassword'), 
        ];  
            return view('backend.profile.edit',$compact);
        }
    }
    public function editpassword(){
        if (view()->exists('backend.profile.editpassword')) {
            $compact = [
            'trans'                => $this->TRANS,
            'updatePasswordRoute'  => route($this->ROUTE_PREFIX.'.updatepassword'), 
        ];  
            return view('backend.profile.editpassword',$compact);
        }
    }

    public function update(ModuleRequest $request){
        $avatar = \Auth::guard('admin')->user()->avatar;
        if(!empty($request->file('avatar'))) {
            $avatar && File::exists(public_path($avatar)) ? $this->unlinkFile($avatar): '';
            $avatar =  $this->uploadFile($request->file('avatar'),$this->UPLOADFOLDER);
         }   
        $arry = [
            'name'          => $request->input('name'),            
            'username'      => $request->input('username'),            
            'email'         => $request->input('email'),            
            'mobile'        => $request->input('mobile'),            
            'avatar'        => $avatar,            

        ];              
        if(MainModel::findOrFail(\Auth::guard('admin')->user()->id)->update($arry)){
            $arr = array('msg' => __($this->TRANS.'.'.'ProfileupdateMessageSuccess'), 'status' => true);   
        }else{
            $arr = array('msg' => __($this->TRANS.'.'.'ProfileupdateMessageError'), 'status' => false);
        }
        return response()->json($arr);
    }
    public function updatepassword(Request $request){
        $this->validate($request, [
            'current_password' => 'required|string',
            'new_password' => 'required|confirmed|min:8|string'
        ]);
        $auth = \Auth::guard('admin')->user(); 
        if (!Hash::check($request->get('current_password'), $auth->password)) {
            $arr = array('msg' => __('passwords.invalid_current'), 'status' => false);
        }
        if (Hash::check($request->get('current_password'), $auth->password)) {
            $user =  MainModel::find($auth->id);
            $user->password =  Hash::make($request->new_password);
            $user->save();
            $arr = array('msg' =>__('passwords.updated'), 'status' => true);
        }
        return response()->json($arr);
    }
}
