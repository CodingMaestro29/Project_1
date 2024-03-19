<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\StudentCompletion;
use Illuminate\Support\Facades\Mail;
use App\Mail\CompletionNotifyEmail;

class DashboardController extends Controller
{

   public function index()
    {
        return view('dashboard');
    }


    public function registration_info()
    {
        $email = Auth::user()->email;

     $student = DB::table('students')->where('email', $email)->first();
        return view('registration-info' , ['student'=>$student]);
    }


    public function student_table()
    {
        return view('student-table');
    }


    public function getCertificate(Request $request)
    {
        // Retrieve the user's completion data from the database
        $completionData = StudentCompletion::where('email', Auth::guard('student')->user()->email)->first();

        // If completion data exists, send the completion notification email
        if ($completionData) {
            $formData = [
                'firstname' => $completionData->fname,
                'lastname' => $completionData->lname,
                'dob' => $completionData->DOB,
                'email' => $completionData->email,
                'license_number' => $completionData->license_number,
                'complete_time' => $completionData->complete_time,
                'address' => $completionData->address,
                'state' => $completionData->state,
                'zipcode' => $completionData->zipcode,
                'mailSubject' => 'Your class completion certificate'
            ];

            // Send the completion notification email
            Mail::to($completionData->email)->send(new CompletionNotifyEmail($formData));

            // Redirect back with success message or any other response
            return redirect()->back()->with('success', 'Certificate sent successfully!');
        } else {
            // Redirect back with error message if completion data not found
            return redirect()->back()->with('error', 'No completion data found.');
        }
    }




}
