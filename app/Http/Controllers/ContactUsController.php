<?php

namespace App\Http\Controllers;
use App\Mail\ContactUsMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function send() {
        request()->validate([
          'name'=>'required|max:24',
          'email'=>'required|email',
          'subject'=>'required',
          'message'=>'required|max:255',
        ]);
    
        $details = [
          'name' => request('name'),
          'email' => request('email'),
          'subject' => request('subject'),
          'message' => request('message')
        ];
    
        Mail::to('hichamhaddadi04@gmail.com')->send(new ContactUsMail($details));
    
          return back()->with('success', __('We have successfully received your mail'));
    
      }
}
