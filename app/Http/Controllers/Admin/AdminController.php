<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function test()
    {
        // return Role::pluck('name','name')->all();
        // return Auth::user()->hasRole('superadmin'); 
        // dd(Auth::user()->getRoleNames());
    }

    public function settings(Request $request)
    {
        if($request->isMethod('post')){
            $this->validate($request, [
                'name' => 'required|unique:users,name,' . Auth::id(),
                'email' => 'required|email|unique:users,email,' . Auth::id(),
            ]);

           $user = User::find(Auth::id());
           $user->update($request->except('_token'));
           return redirect()->back()->with('success', 'User data updated!');
        }

        return view('admin.setting.edit');
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|confirmed|min:5',
            'old_password' => 'required',
            'password_confirmation' => 'required',
        ]);

        $user = User::findOrFail(Auth::id());

        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->back()->with('success', 'Password Successfully Updated!!');
        }

        return redirect()->back()->with('old_password', 'Old Password is not correct!');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();
        return redirect('/admin/login');
    }
}
