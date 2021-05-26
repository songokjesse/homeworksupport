<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsEmail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $email = 'info@homework-support.com';

        $mailData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ];

        Mail::to($email)->send(new ContactUsEmail($mailData));

        $contact = new Contact;
        $contact->name = $request->input('name');
        $contact->message = $request->input('message');
        $contact->email = $request->input('email');
        $contact->save();



        return back()->with('status', 'Thanks for contacting us, We will get back to you soon!');

    }
}
