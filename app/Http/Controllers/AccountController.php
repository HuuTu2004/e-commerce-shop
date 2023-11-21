<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AccountController extends Controller
{
    public function login(){
        return view('admin.login');
    }
    public function check_login(Request $req) {
        $req -> validate([
            'email'=>'required|email',
            'password'=>'required|min:6'         
        ]);
        $data = $req->only('email', 'password');
        $check = auth()->attempt($data);
        if($check){
            return redirect()->route('admin.home');
        }
        return redirect()->back()->with('error','Đăng nhập không thành công');
    }
    public function register (){
        return view('admin.register');
    }
    public function post_register(Request $req) {
        $req -> validate([
            'name'=> 'required',
            'email'=>'required|email',
            'password'=>'required|min:6'         
        ]);
        $data = $req->only('name', 'email', 'password');
        if(User::create($data)){
            return redirect()->route('admin.login');
        }
        return redirect()->back()->with('error','Đăng ký không thành công');
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('admin.login');
    }
}
