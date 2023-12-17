<?php
namespace App\Http\Controllers\backend\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\AdminPasswordResetNotification;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;
    public function __construct(){
        $this->middleware('guest');
    }
    public function showLinkRequestForm() {
        return view('backend.auth.passwords.email');
    }
    public function sendResetLinkEmail(Request $request) {

        $request->validate(['email' => 'required|email|exists:users,email']); 
        // $status = Password::sendResetLink($request->only('email'));             
        // return $status === Password::RESET_LINK_SENT
        //             ? back()->with(['status' => __($status)])
        //             : back()->withErrors(['email' => __($status)]);        


        $token = Str::random(64);

  

        DB::table('password_resets')->insert([

            'email' => $request->email, 

            'token' => $token, 

            'created_at' => Carbon::now()

          ]);



        \Mail::send('emails.AdminResetPassword', ['token' => $token], function($message) use($request){

            $message->to($request->email);

            $message->subject('Reset Password');

        });



        return back()->with('message', 'We have e-mailed your password reset link!');

    }



    
}
