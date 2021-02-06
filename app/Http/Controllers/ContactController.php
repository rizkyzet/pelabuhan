<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }


    public function send(Request $request)
    {

        $attr = $request->validate([
            'subject' => 'required',
            'message' => 'required',
            'email' => 'required|email'
        ]);

        Mail::to('pelindo@gmail.com')->send(new ContactMail($attr['email'], $attr['subject'], $attr['message']));

        return redirect()->route('contact.index')->with('success', 'Email berhasil dikirim!');
    }
}
