<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

use App\Models\Student;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.student-login');
    }


    public function login(Request $request)
    {
       // dd($request->all());
    }


    public function register_view()
    {
        return view('auth.course');
    }


    public function register(Request $request)
    {
        $request->validate(
            [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|unique:students,email|email',
          //  'licenseState' => 'required',
            'licensenumber' => 'required',
            'username' => 'required|min:4|max:36',
            'password' => 'required|min:6|max:18|confirmed',
            'password_confirmation' => 'required',
            
         ]);


         Student::create([
            'fname' =>  $request->fname,
            'mname' =>  $request->mname,
            'lname' =>  $request->lname,
            'email' =>  $request->email,
            'date' =>  $request->date,
            'month' =>  $request->month,
            'years' =>  $request->years,
            'number11' =>  $request->number11,
            'number12' =>  $request->number12,
            'number13' =>  $request->number13,
            'licenseState' =>  $request->licenseState,
            'licensenumber' =>  $request->licensenumber,
            'username' =>  $request->username,
            'password' =>  $request->password,
            'password_confirmation' =>  $request->password_confirmation,
            'address' =>  $request->address,
            'city' =>  $request->city,
            'states' =>  $request->states,
            'zipcode' =>  $request->zipcode,
            'find' =>  $request->find,
         ]);

       
    }



}
