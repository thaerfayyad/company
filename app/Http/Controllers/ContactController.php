<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view('contacts.create');
    }
    public function store()
    {
        $data = request()->validate([
           'name' =>'required',
           'email' =>'required|email',
           'message' =>'required',
        ]);

        //send to email
        Mail::to('thaer@test.com')->send(new ContactFormMail($data));

        return redirect('/contacts')->with('message','your message sent');

    }
}
