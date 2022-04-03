<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Index
    public function index(){
        Session::put('admin_page', 'project');
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    // Add
    public function add(){
        return view('admin.projects.add');
    }

    // Store
    public function store(Request $request){
        $data = $request->all();
        $rules = [
            'title' => 'required',
            'link' => 'required',
            'image' => 'required'
        ];
        $custom_message = [
            'title.required' => 'Title field is required',
            'link.required' => 'Link field is required',
            'image.required' => 'Image field is required',
        ];
        $this->validate($request, $rules, $custom_message);

        $project = new Project();
        $project->title = $data['title'];
        $project->link = $data['link'];

        $random = Str::random(10);
        if($request->hasFile('image')){
            $img_temp = $request->file('image');
            if($img_temp->isValid()){
                $extension = $img_temp->getClientOriginalExtension();
                $filename = $random.".".$extension;
                $image_path = 'public/uploads/project/'.$filename;
                Image::make($img_temp)->save($image_path);
                $project->image = $filename;
            }
        }

        $project->save();
        Session::flash('success_message', 'Project Added successfully !');
        return redirect()->back();
    }

    // Edit
    public function edit($id){
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    // Update
    public function update(Request $request, $id){
        $data = $request->all();
        $rules = [
            'title' => 'required',
            'link' => 'required',
        ];
        $custom_message = [
            'title.required' => 'Title field is required',
            'link.required' => 'Link field is required',
        ];
        $this->validate($request, $rules, $custom_message);

        $project = Project::findOrFail($id);
        $project->title = $data['title'];
        $project->link = $data['link'];

        $random = Str::random(10);
        if($request->hasFile('image')){
            $img_temp = $request->file('image');
            if($img_temp->isValid()){
                $extension = $img_temp->getClientOriginalExtension();
                $filename = $random.".".$extension;
                $image_path = 'public/uploads/project/'.$filename;
                Image::make($img_temp)->save($image_path);
                $project->image = $filename;
            }
        }else{
            $project->image = $data['old'];
        }

        $project->save();
        Session::flash('success_message', 'Project Updated successfully !');
        return redirect()->back();
    }

    // Delete
    public function delete($id){
        $project = Project::findOrFail($id);
        $image_path = 'public/uploads/project/';
        if(!empty($project->image)){
            if(file_exists($image_path.$project->image)){
                unlink($image_path.$project->image);
            }
        }
        $project->delete();
        Session::flash('info_message', 'Project has been Deleted successfully');
        return redirect()->back();
    }
}
