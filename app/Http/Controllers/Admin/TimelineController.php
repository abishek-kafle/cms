<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Timeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TimelineController extends Controller
{
    // Index
    public function index(){
        Session::put('admin_page', 'timeline');
        $timelines = Timeline::all();
        return view('admin.timeline.index', compact('timelines'));
    }

    public function add(){
        return view('admin.timeline.add');
    }
}
