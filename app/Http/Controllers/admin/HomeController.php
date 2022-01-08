<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
class HomeController extends Controller
{

    public function index(){
//        dd(Auth::user());
        return view('admin.dashboard');
    }
    public function login(){
        return view('admin.login');
    }

    public function loginPost(Request $request){
//        dd($request->all());
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
//        dd(Auth);
//        dd($credentials);

//        dd(Auth::attempt($request->only('email','password')));
        if (Auth::attempt($request->only('email','password'))){
            return redirect()->route('admin.dashboard')->with('success','Đăng nhập thành công');
        }
        else{
            return redirect()->back();
        }
    }

    public function logout(){
//        dd('abc');
        Auth::logout();
        return redirect()->route('admin.login');
    }
    public function register(){
        return view('admin.register');
    }

    public function registerPost(Request $request){
//        dd($request->all());
        $request->merge(['password'=>Hash::make($request->password)]);
//        dd($request->all());
        User::create($request->all());
        return redirect()->route('admin.login')->with('success','Đăng ký thành công');

    }
}
