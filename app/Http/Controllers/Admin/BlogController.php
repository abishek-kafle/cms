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

        $blog = new Blog();
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
    }

    // Edit
    public function edit($id){
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    //Update
    public function update(Request $request, $id){
        $data = $request->all();
    }

    // Delete
    public function delete($id){
        $blog = Blog::findOrFail($id);
    }
}
