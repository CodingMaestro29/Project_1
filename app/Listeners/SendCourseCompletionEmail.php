<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\CourseCompleted;
use Illuminate\Support\Facades\Mail;
use App\Mail\CompletionNotifyEmail;

class SendCourseCompletionEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CourseCompleted $event)
    {
        $completed = $event->completed;


        $firstname = $completed->fname;
        $lastname = $completed->lname;
        $dob = $completed->DOB;
        $email = $completed->email;
        $license_number = $completed->license_number;
        $complete_time = $completed->complete_time;
        $address = $completed->address;
        $state = $completed->state;
        $zipcode = $completed->zipcode;


        $formData = [
            'firstname' =>  $firstname ,
            'lastname' => $lastname,
            'dob' => $dob,
            'email' => $email,
            'license_number' =>  $license_number,
            'complete_time' =>  $complete_time,
            'address' => $address,
            'state' => $state,
            'zipcode' =>$zipcode ,
            'mailSubject' => 'You have requested to reset your password'
        ];


        Mail::to($email)->send(new CompletionNotifyEmail($formData));


    }
}
