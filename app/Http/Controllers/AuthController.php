<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Sentinel;
use Reminder;
use Mail;

class AuthController extends Controller
{
    public function getLogin(){
        return view('auth.login');
    }

    public function postLogin(Request $request){
        $email = $request->email;
        $password = $request->password;
        if(\Auth::attempt(['email' => $request->email, 'password'=>$request->password])){
            if(\Auth::user()->type == "admin"){
                return redirect('/admin');
            }
            
            toast('Hi! Welcome to Latravel ! ','success');
            return redirect()->route('menu');
        }

        if(!\Auth::attempt(['email' => $request->email, 'password'=>$request->password])){
            alert()->error('Login Failed',' Please check and try again ');
            return redirect()->back();
        }
    }

    public function getRegister(){
        return view('auth.register');
    }

    public function postRegister(Request $request){
        $validator = Validator::make($request-> all(), [ 
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
            
        ]);

        if($validator->fails()) { 
            return redirect('/register')
             ->withInput() 
             ->withErrors($validator);
        }
        $type = "member";

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password'=> Hash::make($request->password),
            'gender' => $request->gender,
            'type' => $type
        ]);
        

        alert()->success('Register Success','Please Login.'); 
        return redirect()->route('login');
    }

    public function edit(){
        return view('user.editProfile');
    }

    public function update(Request $request){
        $this->validate($request, [
            'old_password' => 'required'
        ]);

        $old_email = $request->old_email;
        $user = User::where('email',$old_email)->first();
        $old_name = $user->name;
        $oldPass = $request->old_password;
        $check = $user->password;

        if(Hash::check($oldPass, $check)){
            $name = $request->name;
            $email = $request->email;
            $pass = $request->new_password;
            
            if($email != $old_email){
                $this->validate($request, [
                    'email' => 'email|unique:users'
                ]);
            }

            //khusus update password
            
            if($pass != null){
                $this->validate($request, [
                    'new_password' => 'required|min:6',
                    'password_confirmation' => 'required|same:new_password'
                ]);

                if(Hash::check($oldPass, $check)){
                    User::where('email',$old_email)->update(['password' => Hash::make($pass)]);
                }else{
                    return redirect("/edit")->with('failed',"old password input tidak sesuai password lama");
                }
            }
            
            //update name
            if($name != null){
                User::where('email',$old_email)->update(['name' => $name]);
            }
            //update email
            User::where('email',$old_email)->update(['email' => $email]);
            
            if($pass != null){
                return redirect("/logout")->with('success',"Data dan Password diupdate. Silahkan login ulang!");
            }

            if($name == $old_name && $email == $old_email){
                return redirect("/edit")->with('success',"Tidak ada perubahan");
            }
        
        }else{
            return redirect("/edit")->with('failed',"old password input tidak sesuai password lama");
        }

        return redirect("/edit")->with('success',"Data berhasil di update");
    }

    public function show(){
        return view('user.profile');
    }

    public function forgot(){
        return view('auth.passwords.reset');
    }

    //====================================On Development===================================
    public function forgot_password(Request $request){
        $user = User::where('email',$request->email)->first();

        if($user == null){
            return redirect()->back()->with('failed','Email tidak terdaftar');
        }

        $user = Sentinel::findById($user->id);
        $code = "1024";
        $this->sendEmail($user, $code);

        return redirect()->back()->with('success','Reset Code telah dikirim ke email Anda');
    }

    public function sendEmail($user, $code){
        Mail::send('auth.passwords.forgot_email', 
            ['user' => $user, 'code' => $code], 
            function ($message) use ($user){
                $message->to($user->email);
                $message->subject("Hello $user->name, reset your password.");
            }
        );
    }
    //=====================================================================================

    public function logout(){
        \Auth::logout();
        return redirect()->route('login');
    }

     
}
