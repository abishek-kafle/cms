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

    public function store(Request $request){
        $data = $request->all();
        $rules = [
            'title' => 'required',
            'date' => 'required',
            'organization' => 'required',
            'description' => 'required'
        ];
        $customMessage = [
            'title.required' => 'Title field is required',
            'date.required' => 'Date field is required',
            'organization.required' => 'Organization field is required',
            'description.required' => 'Description field is required'
        ];
        $this->validate($request, $rules, $customMessage);
        $timeline = new Timeline();
        $timeline->title = $data['title'];
        $timeline->date = $data['date'];
        $timeline->company = $data['organization'];
        $timeline->description = $data['description'];
        $timeline->save();

        Session::flash('success_message', 'Timeline Added Successfully !!');
        return redirect()->back();
    }

    public function edit($id){
        $timeline = Timeline::findOrFail($id);
        return view('admin.timeline.edit', compact('timeline'));
    }

    public function update(Request $request, $id){
        $data = $request->all();
        $rules = [
            'title' => 'required',
            'date' => 'required',
            'organization' => 'required',
            'description' => 'required'
        ];
        $customMessage = [
            'title.required' => 'Title field is required',
            'date.required' => 'Date field is required',
            'organization.required' => 'Organization field is required',
            'description.required' => 'Description field is required'
        ];
        $this->validate($request, $rules, $customMessage);
        $timeline = Timeline::findOrFail($id);
        $timeline->title = $data['title'];
        $timeline->date = $data['date'];
        $timeline->company = $data['organization'];
        $timeline->description = $data['description'];
        $timeline->save();

        Session::flash('success_message', 'Timeline Updated Successfully !!');
        return redirect()->back();
    }

    public function delete($id){
        $timeline = Timeline::findOrFail($id);
        $timeline->delete();
        Session::flash('success_message', 'Timeline Deleted Successfully !!');
        return redirect()->back();
    }
}
