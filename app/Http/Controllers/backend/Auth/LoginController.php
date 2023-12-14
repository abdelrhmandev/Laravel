<?php
namespace App\Http\Controllers\backend\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\backend\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller{



    use AuthenticatesUsers;

    protected $redirectTo = '/admin';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('guest:admin')->except('logout');
       
	}

    public function showLoginForm(){
        return view('backend.auth.login');
    }

    public function do_login(LoginRequest $request) {

        dd(request('password'));
        if (Auth::guard('admin')->attempt(['email' => request('email'),'status'=>'1','password' => request('password')],request('rememberme') == 1 ? true:false)) {            
			return redirect()->intended(route('backend.dashboard'));
        } 
        return $this->sendFailedLoginResponse($request);
    }


    public function sendFailedLoginResponse(Request $request){
        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors([
                $this->username() => trans('auth.failed'),
            ]);
    }


    public function logout(Request $request){
		Auth::guard('admin')->logout();
		return redirect()->route('admin.auth.login')->with('info',trans('user.logout'));  // redirect to backend login page

	}

    public function username(){
        $login = request()->input('email');
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$field => $login]);
        return $field;
    }

    protected function guard(){
    	return Auth::guard('admin');
    }
}