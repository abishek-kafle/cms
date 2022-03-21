<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BioController extends Controller
{
    //View Bio
    public function index(){
        Session::put('admin_page', 'bio');
        $bio = Bio::orderBy('id','desc')->first();
        return view('admin.bio.bio', compact('bio'));
    }

    public function update(Request $request, $id){
        $data = $request->all();
        //dd($data);
        $rules = [
            'title' => 'required',
        ];
        $custom_message = [
            'title.required' => 'Title field is required'
        ];
        $this->validate($request,$rules,$custom_message);
        $bio = Bio::findOrFail($id);
        $bio->title = $data['title'];
        $bio->description = $data['description'];
        $bio->save();
        Session::flash('success_message', 'Bio updated successfully !');
        return redirect()->back();
    }
}
