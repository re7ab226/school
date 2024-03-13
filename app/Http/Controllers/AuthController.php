<?php

namespace App\Http\Controllers;

use App\Models\User;
// use Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ForgetPasswordMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class AuthController extends Controller
{
    public function login(){
        // dd(Hash::make(123456));

        if(!empty(Auth::check()))
        {
            if (Auth::user()->user_type == 1){
                return redirect('/admin/dashboard');

                }
                else if (Auth::user()->user_type == 2){
                    return redirect('/teacher/dashboard');

                }
                else if (Auth::user()->user_type == 3){
                    return redirect('/student/dashboard');

                }
                else if (Auth::user()->user_type == 4){
                    return redirect('/parent/dashboard');

                }
        }

        return view("auth.login");
    }
    public function Authlogin(Request $request)
    {
        $remember=!empty($request->remember)? true:false;
        if(Auth::attempt(["email"=> $request->email,'password'=> $request->password],$remember))
        {
            if (Auth::user()->user_type == 1){
            return redirect('/admin/dashboard');
            }
            elseif (Auth::user()->user_type == 2){
                return redirect('/teacher/dashboard');
            }
            elseif (Auth::user()->user_type == 3){
                return redirect('/student/dashboard');
            }
            elseif (Auth::user()->user_type == 4){
                return redirect('/parent/dashboard');
           }
    }
    else{
        return redirect()->back()->with('error','please enter correct required');
    }
}

public function ForgotPassword(){
    return view("auth.forgetPass");
}
public function ResetForgotPassword(Request $request){
        // dd($request->all());
        $user = User::getEmailSingle($request->email);
        // dd($user);
        if(!empty($user))
        {
            $user->remember_token = Str::random(30);
            $user->save();
            Mail::to($user->email)->send(new ForgetPasswordMail($user));
            return redirect()->back()->with("success","This Email Is send");
        }
        else{
            return redirect()->back()->with("error","This Email Is Wrong");
        }
}
public function ResetPassword( $remember_token)
{
// dd($token);
$user = User::getTokenSingle($remember_token);
if(!empty($user))
{
$data['user']=$user;
    return view("auth.reset",$data);
}
else{
    abort(404);
}
}

public function postResetPassword($remember_token ,Request $request){

        if($request->password == $request->password)
{
    $user = User::getTokenSingle($remember_token);

    $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(30);

        $user->save();
        return redirect()->back()->with("success","password and password confirmation must be match");

}

else{
    return redirect()->back()->with("error","password and password confirmation must be match");
}

}

public function logout(){
    Auth::logout();
    return redirect(url(''));
}

}




