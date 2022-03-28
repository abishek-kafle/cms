<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skills;
use Illuminate\Contracts\Validation\Validator;
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

    public function add(){
        return view('admin.skills.add');
    }

    public function store(Request $request){
        $data = $request->all();
        $rules = [
            'title' => 'required|max:255',
            'percentage' => 'required|numeric|max:255'
        ];
        $customMessage = [
            'title.required' => 'Title field is required',
            'title.max' => 'Title field must not exceed 255 characters',
            'percentage.required' => 'Percentage field is required',
            'percentage.numeric' => 'The percentage field should contain only numbers',
            'percentage.max' => 'The percentage field must not exceed 255 characters'
        ];
        $this->validate($request,$rules,$customMessage);
        $skill = new Skills();
        $skill->title = $data['title'];
        $skill->percentage = $data['percentage'];
        $skill->save();

        Session::flash('success_message', 'Skill saved successfully !');
        return redirect()->back();
    }

    public function edit($id){
        $skill = Skills::findOrFail($id);
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, $id){
        $data = $request->all();
        $rules = [
            'title' => 'required|max:255',
            'percentage' => 'required|numeric|max:255'
        ];
        $customMessage = [
            'title.required' => 'Title field is required',
            'title.max' => 'Title field must not exceed 255 characters',
            'percentage.required' => 'Percentage field is required',
            'percentage.numeric' => 'The percentage field should contain only numbers',
            'percentage.max' => 'The percentage field must not exceed 255 characters'
        ];
        $this->validate($request,$rules,$customMessage);
        $skill = Skills::findOrFail($id);
        $skill->title = $data['title'];
        $skill->percentage = $data['percentage'];
        $skill->save();

        Session::flash('success_message', 'Skill updated successfully !');
        return redirect()->back();
    }

    public function delete($id){
        $skill = Skills::findOrFail($id);
        $skill->delete();
        Session::flash('success_message', 'Skill Deleted successfully !');
        return redirect()->back();
    }
}
