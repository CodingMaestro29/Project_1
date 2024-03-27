<?php

namespace App\Listeners;

use App\Events\NewRegistration;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationNotifyEmail;

class RegistrationEmailSent implements ShouldQueue
{
    /**
     * Create the event listener.
     */


     use InteractsWithQueue;

    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NewRegistration $event)
    {
        $student = $event->student; 


        $firstname =  $student->fname;
        $middlename =  $student->mname;
        $lastname =  $student->lname;
        $dob =  $student->date.'/'.$student->month .'/'.$student->years;
        $email =  $student->email;
        $phone = $student->number11.'-'.$student->number12.'-'.$student->number13;
        $licenseState = $student->licenseState;
        $license_number =  $student->licensenumber;
        $username =  $student->username;
        $address =  $student->address;
        $city =  $student->city;
        $state =  $student->states;
        $zipcode =  $student->zipcode;
        $find =  $student->find;
        
        



        $formData = [
            'firstname' =>  $firstname ,
            'middlename' =>  $middlename ,
            'lastname' => $lastname,
            'dob' => $dob,
            'email' => $email,
            'phone' => $phone,
            'licenseState' =>  $licenseState,
            'license_number' =>  $license_number,
            'username' =>  $username,
            'address' => $address,
            'city' => $city,
            'state' => $state,
            'zipcode' =>$zipcode ,
            'find' => $find
        ];

        


        Mail::to($email)->send(new RegistrationNotifyEmail($formData));

        Mail::to('companyuiux@gmail.com')->send(new RegistrationNotifyEmail($formData));


    }
}
