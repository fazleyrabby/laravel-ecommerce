<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Usermeta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
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

    public function update(Request $request){
        $validated = $this->validate($request, [
            'name' => 'required|regex:/^[\pL\s\-]+$/u|unique:users,name,' . Auth::id(),
            'email' => 'required|email|unique:users,email,' . Auth::id(),
        ]);

        $user = User::find(Auth::id());
        $user->update($validated);

        $meta = Usermeta::where([['user_id' , Auth::id()],['key', 'user_data']])->first() ?? new Usermeta();

        //check existing photo
        $existingPhoto = isset($meta->value) ? (isset(json_decode($meta->value)->photo) ? json_decode($meta->value)->photo : '') : '';

        // upload photo 
        $profile_photo = $existingPhoto;

        if ($request->hasFile('photo')) {
            $photo  = $request->file('photo');
            if ($photo->isValid()) {
                $photo_name = hexdec(uniqid()) . '.' . $photo->getClientOriginalExtension();
                $photo_path = 'admin/images/uploads/' . $photo_name;

                // if file exists than delete 
                if (file_exists($existingPhoto)) {
                    unlink($existingPhoto);
                }
                
                //Upload new photo
                Image::make($photo)->save($photo_path);
                $profile_photo = $photo_path;
            }
        }

        $data = [
            'contact' => $request->contact,
            'photo' => $profile_photo ?? '',
        ];

        //Vendor Specific data
        if($request->country) $data['country'] = $request->country;
        if($request->city) $data['city'] = $request->city;
        if($request->state) $data['state'] = $request->state;
        if($request->address) $data['address'] = $request->address;
        
        $meta->key = 'user_data';
        $meta->user_id = $user->id;
        $meta->value = json_encode($data);
        $meta->save();

        return redirect()->back()->with('success', 'User data updated!');
    }


    public function edit()
    {
        $data = '';
        $meta = Auth::user()->meta;
        if ($meta) {
            $data = json_decode($meta->value);
        }

        return view('admin.setting.edit', compact('data'));
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

        return redirect()->back()->with('old_password', 'Old Password is not correct!')->withInput();
    }


    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();
        return redirect('/admin/login');
    }
}
