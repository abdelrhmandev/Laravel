<?php
namespace App\Http\Controllers\backend\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use App\Http\Requests\backend\LoginRequest;
class LoginController extends Controller{
    use AuthenticatesUsers, ThrottlesLogins;
    

    protected $maxAttempts = 5;
    protected $decayMinutes = 1;
    
    
     public function __construct(){
        $this->middleware('guest:admin', ['except' => ['logout']]);      
      }

    public function showLoginForm(){
        return view('backend.auth.login');
    }
    public function login(LoginRequest $request) {
       
        $throttles = $this->isUsingThrottlesLoginsTrait();


        if ($throttles && $lockedOut = $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            $key = $this->getThrottleKey($request).':lockout';
            return $this->sendLockoutResponse($request);
        }


        
        if (Auth::guard('admin')->attempt(['email' => request('email'),'status'=>'1','password' => request('password')],request('rememberme') == 1 ? true:false)) {            
            // return $this->handleUserWasAuthenticated($request, $throttles);


            $request->session()->regenerate();
            $this->clearLoginAttempts($request);
            return redirect()->intended(route(config('custom.route_prefix').'.dashboard')); // get redirect to backend dashboard 

        } 



        $this->incrementLoginAttempts($request);
         return $this->sendFailedLoginResponse($request);
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

    public function logout(Request $request){
		if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();

            $request->session()->flush();
            $request->session()->regenerate();

		    return redirect()->route(config('custom.route_prefix').'.auth.login')->with('logout',trans('login.logout'));  // redirect to backend login page
        }
	}
    public function sendFailedLoginResponse(Request $request){
        $this->incrementLoginAttempts($request);
        return redirect()->route(config('custom.route_prefix').'.auth.login')->withInput()->with(['error' => trans('auth.failed')]);   // redirect to backend login page          

    }

 

    protected function isUsingThrottlesLoginsTrait(){
        return in_array(
            ThrottlesLogins::class, class_uses_recursive(get_class($this))
        );

    }
    public function getThrottleKey()
    {
        return \Str::lower(request('email')) . '|' . request()->ip();
    }
 
}