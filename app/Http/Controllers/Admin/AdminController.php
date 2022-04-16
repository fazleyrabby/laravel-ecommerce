<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;


class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function login(){
        return view('admin.login');
    }

    public function test(){
        // return Role::pluck('name','name')->all();
        // return Auth::user()->hasRole('superadmin'); 
        // dd(Auth::user()->getRoleNames());
    }

    
    public function logout(Request $request) {
        Auth::logout();
        Session::flush();
        return redirect('/admin/login');
    }
}
