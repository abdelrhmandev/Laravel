<?php

namespace App\Http\Controllers\backend\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;
class ResetPasswordController extends Controller
{

    use ResetsPasswords;

  

    public function __construct(){
        $this->middleware('guest:admin');
    }

    public function showResetForm(Request $request){
        $token = $request->route()->parameter('token');
        return view('backend.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
    public function reset(Request $request){
        $this->validate($request, $this->rules(), $this->validationErrorMessages());
        $response = $this->broker()->reset(
            $this->credentials($request), function ($user, $password) {
            $this->resetPassword($user, $password);
        }
        );


        if($response == Password::PASSWORD_RESET){
            $this->sendResetResponse($response);
            return redirect()->route(config('custom.route_prefix').'.dashboard');
        }else{
        
          return $this->sendResetFailedResponse($request, $response);
        }






            
    }

    protected function rules(){
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ];
    }

    protected function validationErrorMessages(){
        return [];
    }

    protected function credentials(Request $request){
        return $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );
    }

    protected function resetPassword($user, $password){
        $user->forceFill([
            'password' => bcrypt($password),
            'remember_token' => Str::random(60),
        ])->save();

        $this->guard()->login($user);
    }

    protected function sendResetResponse($response){
        return redirect($this->redirectPath())
            ->with('status', trans($response));
    }

    protected function sendResetFailedResponse(Request $request, $response){
        return redirect()->back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => trans($response)]);
    }

    public function broker(){
        return Password::broker();
    }

    protected function guard(){
    	return Auth::guard('admin');
    }





}
