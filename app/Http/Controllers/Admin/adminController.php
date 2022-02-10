<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminController extends Controller
{
    // Admin Dashboard
    public function adminProfile(){
        return view('admin.profile.profile');
    }
    public function changePassword(){
        return view('admin.profile.changePassword');
    }
}
