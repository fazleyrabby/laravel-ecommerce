<?php

namespace App\Http\Controllers\Vendor;

use App\Models\Usermeta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    public function update(Request $request){
        $vendor_data = Usermeta::where([['user_id', Auth::id()],['key', 'vendor_data']])->first() ?? new Usermeta();
       
        $data = [
            'shop_name' => $request->shop_name,
            'shop_address' => $request->shop_address,
            'shop_city' => $request->shop_city,
            'shop_state' => $request->shop_state,
            'shop_country' => $request->shop_country,
            'shop_pincode' => $request->shop_pincode,
            'shop_mobile' => $request->shop_mobile,
            'shop_website' => $request->shop_website,
            'shop_email' => $request->shop_email,
            // 'address_proof' => $request->address_proof,
            // 'address_proof_image' => $request->address_proof_image,
            'license_number' => $request->license_number,
            // 'gst_number' => $request->gst_number,
            // 'pan_number' => $request->pan_number,
        ];
        
        $vendor_data->key = 'vendor_data';
        $vendor_data->value = json_encode($data);
        $vendor_data->status = 1;
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
