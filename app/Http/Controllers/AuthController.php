<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister(){
        return view('auth.register');
    }

    public function register(){
        if($file = request()->file('image')){
            $file_name = uniqid() . $file->getClientOriginalName();
            $file->move(public_path('/image'),$file_name);
        }else{
            $file_name = null;
        }

        $user = User::create([
            'name'=> request()->name,
            'email'=> request()->email,
            'password'=>Hash::make(request()->password),
            'image'=> $file_name
        ]);
        auth()->login($user);
        return redirect('/');
    }

    public function showLogin(){
        return view('auth.login');
    }

    public function login(){
        $email = request()->email;
        $password = request()->password;
        $checkUser = User::where('email',$email)->first();
        if(!$checkUser){
            return redirect()->back();
        }
        $checkPassword = Hash::check($password,$checkUser->password);
        if(!$checkPassword) {
            return redirect()->back();
        }
        auth()->login($checkUser);
        return redirect('/');
    }

    public function logout(){
        auth()->logout();
        return redirect('/login');
    }
}
