<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class adminController extends Controller
{
    // Admin Dashboard
    public function adminProfile(){
        $admin = Admin::where('email', Auth::guard('admin')->user()->email)->first();
        return view('admin.profile.profile', compact('admin'));
    }
    public function changePassword(){
        return view('admin.profile.changePassword');
    }
    public function adminProfileUpdate(Request $request, $id){
        $data = $request->all();
        $rules = [
            'name' => 'required',
            'email' => 'required|email|max:255',
        ];
        $custom_message = [
            'name.required' => 'Username is required',
            'email.required' => 'Email field is required',
            'email.email' => 'Email field should contain valid email address',
            'email.max' => 'Character length exceeded',
        ];
        $this->validate($request, $rules, $custom_message);
        $admin = Admin::findOrFail($id);
        $admin->username = $data['name'];
        $admin->email = $data['email'];
        $admin->address = $data['address'];
        $admin->phone = $data['phone'];

        $random = Str::random(10);
        if($request->hasFile('image')){
            $img_temp = $request->file('image');
            if($img_temp->isValid()){
                $extension = $img_temp->getClientOriginalExtension();
                $filename = $random.".".$extension;
                $image_path = 'public/uploads/admin/'.$filename;
                Image::make($img_temp)->save($image_path);
                $admin->image = $filename;
            }
        }
    }
}
