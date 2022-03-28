<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skills;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    // Index Page
    public function index(){
        Session::put('admin_page', 'skills');
        $skills = Skills::all();
        return view('admin.skills.index', compact('skills'));
    }
}
