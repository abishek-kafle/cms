<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    // Index
    public function index(){
        Session::put('admin_page', 'blogs');
        $blogs = Blog::all();
        return view('admin.blogs.index', compact('blogs'));
    }

    // Add
    public function add(){
        return view('admin.blogs.add');
    }

    // Store
    public function store(Request $request){
        $data = $request->all();
        $rules = [
            'title' => 'required',
            'link' => 'required',
            'description' => 'required',
            'image' => 'required'
        ];
        $custom_message = [
            'title.required' => 'Title field is required',
            'link.required' => 'Link field is required',
            'description.required' => 'Description field is required',
            'image.required' => 'Image field is required',
        ];
        $this->validate($request, $rules, $custom_message);

        $blog = new Blog();
        $blog->title = $data['title'];
        $blog->link = $data['link'];
        $blog->description = $data['description'];

        $random = Str::random(10);
        if($request->hasFile('image')){
            $img_temp = $request->file('image');
            if($img_temp->isValid()){
                $extension = $img_temp->getClientOriginalExtension();
                $filename = $random.".".$extension;
                $image_path = 'public/uploads/blog/'.$filename;
                Image::make($img_temp)->save($image_path);
                $blog->image = $filename;
            }
        }

        $blog->save();
        Session::flash('success_message', 'Blog Added successfully !');
        return redirect()->back();
    }

    // Edit
    public function edit($id){
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    //Update
    public function update(Request $request, $id){
        $data = $request->all();
        $rules = [
            'title' => 'required',
            'link' => 'required',
            'description' => 'required',
        ];
        $custom_message = [
            'title.required' => 'Title field is required',
            'link.required' => 'Link field is required',
            'description.required' => 'Description field is required',
        ];
        $this->validate($request, $rules, $custom_message);

        $blog = Blog::findOrFail($id);
        $blog->title = $data['title'];
        $blog->link = $data['link'];
        $blog->description = $data['description'];

        $random = Str::random(10);
        if($request->hasFile('image')){
            $img_temp = $request->file('image');
            if($img_temp->isValid()){
                $extension = $img_temp->getClientOriginalExtension();
                $filename = $random.".".$extension;
                $image_path = 'public/uploads/blog/'.$filename;
                Image::make($img_temp)->save($image_path);
                $blog->image = $filename;
            }
        }else{
            $blog->image = $data['old'];
        }

        $blog->save();
        Session::flash('success_message', 'Blog Added successfully !');
        return redirect()->back();
    }

    // Delete
    public function delete($id){
        $blog = Blog::findOrFail($id);
        $image_path = 'public/uploads/blog/';
        if(!empty($blog->image)){
            if(file_exists($image_path.$blog->image)){
                unlink($image_path.$blog->image);
            }
        }
        $blog->delete();
        Session::flash('info_message', 'Blog has been Deleted successfully');
        return redirect()->back();
    }
}
