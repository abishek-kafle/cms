<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminController extends Controller
{
    // Admin Dashboard
    public function adminDashboard(){
        return view('admin.dashboard');
    }
}
