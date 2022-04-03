<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    // Index
    public function index(){
        Session::put('admin_page', 'contact');
        $contact = Contact::orderBy('id', 'desc')->first();
        return view('admin.contact.contact', compact('contact'));
    }
}
