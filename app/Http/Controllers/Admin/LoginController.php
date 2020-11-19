<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('backend.login');
    }
    public function postLogin(Request $request)
    {
        $arr = ['email' => $request->email, 'password' => $request->password];
        if($request->remember = 'Remember Me'){
            $remember = true;
        }else{
            $request = false;
        }
      if(Auth::attempt($arr,$remember)){
          return redirect()->intended('admin/home');
      }else{
          return back()->withInput()->with('error','Tài Khoản Hoặc Mật Khẩu Không Đúng');
      }
    }
    
}