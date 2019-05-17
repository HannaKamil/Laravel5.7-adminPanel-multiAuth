<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Request;

class AdminAuth extends Controller
{
    public function login(){
        return view('admin.login');
    }


    public function dologin(){
       $remember = request('remember') ==1?true:false;
       if (auth()->guard('admin')->attempt(['email'=>request('email'), 'password'=>request('password')],$remember)){
           return redirect('admin');
       }else{
           session()->flash('error',trans('admin.incoorect_info_login'));
       }
    }

    //logout
    public function logout(){
        auth()->guard('admin')->logout();
        return redirect('admin/login');
    }



}
