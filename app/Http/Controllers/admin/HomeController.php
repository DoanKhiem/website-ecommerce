<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{

    public function index(){
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
//        dd($credentials);

        dd(Auth::attempt($request->only('email','password')));
//        if (Auth::attempt($request->only('email','password')))
    }

    public function register(){
        return view('admin.register');
    }

    public function registerPost(Request $request){
//        dd($request->all());
        $request->merge(['password'=>bcrypt($request->pasword)]);
//        dd($request->all());
        User::create($request->all());
        return redirect()->route('admin.index')->with('success','Thêm mới thành công');

    }
}
