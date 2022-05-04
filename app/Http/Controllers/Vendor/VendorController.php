<?php

namespace App\Http\Controllers\Vendor;

use App\Models\Usermeta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class VendorController extends Controller
{
    public function update(Request $request){
       $vendor_data = Usermeta::where([['user_id', Auth::id()],['key', 'vendor_data']])->first() ?? new Usermeta();

        //check existing photo
        $existingPhoto = isset($vendor_data->value) ? (isset(json_decode($vendor_data->value)->nid_photo) ? json_decode($vendor_data->value)->nid_photo : '') : '';

        // upload photo 
        $nid_photo = $existingPhoto;

        if ($request->hasFile('nid_photo')) {
            $nid_photo = imageUpload($request->file('nid_photo'), $existingPhoto, 'nid_');
        }
        
        $data = [
            'shop_name' => $request->shop_name ?? '',
            'shop_address' => $request->shop_address ?? '',
            'shop_city' => $request->shop_city ?? '',
            'shop_state' => $request->shop_state ?? '',
            'shop_country' => $request->shop_country ?? '',
            'shop_pincode' => $request->shop_pincode ?? '',
            'shop_mobile' => $request->shop_mobile ?? '',
            'shop_website' => $request->shop_website ?? '',
            'shop_email' => $request->shop_email ?? '',
            'license_number' => $request->license_number ?? '',
            'nid_number' => $request->nid_number ?? '',
            'nid_photo' => $nid_photo ?? '',
            'account_holder_name' => $request->account_holder_name ?? '',
            'bank_name' => $request->bank_name ?? '',
            'account_number' => $request->account_number ?? '',
            'bank_code' => $request->bank_code ?? '',
        ];
        
        $vendor_data->key = 'vendor_data';
        $vendor_data->value = json_encode($data);
        $vendor_data->save();

        return redirect()->back()->with('success', 'Vendor data updated!');
    }

    public function edit(){
        $data = '';
        $vendor = Auth::user()->vendor;
        if ($vendor) {
            $data = json_decode($vendor->value);
        }

        return view('admin.setting.vendor', compact('data'));
    }
}
