<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact-us');
    }


    public function view()
    {
        return view('contact-us-login');
    }


    public function send(Request $request)
    {
        $request->validate(
            [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required|min:4',
            'message' => 'required|min:4',
            ]); 

            try {
                $mailData = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'subject' => $request->subject,
                    'message' => $request->message,
                ];
        
                Mail::to('nishima@yopmail.com')->send(new ContactUs($mailData));
                
                return redirect()->back()->with('success', 'Email sent successfully!');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Failed to send email. Please try again later.');
            }

    }


}
