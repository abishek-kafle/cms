<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    // Index
    public function index(){
        Session::put('admin_page', 'about');
        $about = About::orderBy('id','desc')->first();
        return view('admin.about.about', compact('about'));
    }

    // Update
    public function update(Request $request, $id){
        $data = $request->all();
        //dd($data);
        $rules = [
            'description' => 'required',
        ];
        $custom_message = [
            'description.required' => 'Description field is required'
        ];
        $this->validate($request,$rules,$custom_message);
        $about = About::findOrFail($id);
        $about->description = $data['description'];
        $about->projects = $data['project'];
        $about->experience = $data['experience'];
        $about->clients = $data['client'];
        $about->reviews = $data['review'];
        $about->save();
        Session::flash('success_message', 'About updated successfully !');
        return redirect()->back();
    }
}
