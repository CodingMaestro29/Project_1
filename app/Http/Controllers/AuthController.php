<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;


use App\Models\Student;


class AuthController extends Controller
{


   public function index()
    {
        return view('auth.student-login');
    }


    public function login(Request $request)
    {
        $request->validate(
        [
        'email' => 'required|email',
          'password' => 'required',
        ]);

        if(Auth::guard('student')->attempt($request->only('email','password'))){
          //  dd('test1');
            return redirect('dashboard');
           }else{
         //   dd('test2');
         return redirect('login')->withErrors(['login' => 'Invalid login details']);
           }
    }



    public function getDays()
    {
        return range(1, 31);
    }

    public function getMonths()
    {
        $months = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December',
        ];
    
        return $months;
    }

    public function getYears()
    {
        return range(1930, 2080);
    }


    public function register_view()
    {
        $days = $this->getDays();
        $months = $this->getMonths();
        $years = $this->getYears();
        
        return view('auth.course',  compact('days', 'months', 'years'));
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
         $input = $request->all();

         $recaptcha =  $input['g-recaptcha-response']; 

         $secret_key = '6LfAb5gpAAAAALZdBqt9y1mKS8j438iqR89UEAb8'; 

         $url = 'https://www.google.com/recaptcha/api/siteverify?secret='
          . $secret_key . '&response=' . $recaptcha; 

          $response = file_get_contents($url); 

          $response = json_decode($response); 

        //  dd($response);

          if ($response->success == true) { 
            session(['success_message' => 'Google reCAPTCHA verified']);
        } else { 
             return redirect()->back()->withErrors(['g-token' => 'Error in Google reCAPTCHA']);
        } 


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
            'password' =>  bcrypt($request->password),
            'password_confirmation' =>bcrypt($request->password),
            'address' =>  $request->address,
            'city' =>  $request->city,
            'states' =>  $request->states,
            'zipcode' =>  $request->zipcode,
            'find' =>  $request->find,
         ]);


        // dd('test');
         if(Auth::guard('student')->attempt($request->only('email','password'))){
          //  dd('test1');
          return redirect('dashboard');
         }else{
          //  dd('test2');
            return redirect('register')->withError('Error');
         }

       
    }



    public function register_edit()
    {
        $days = $this->getDays();
        $months = $this->getMonths();
        $years = $this->getYears();
    
        $email = Auth::user()->email;
    
        $student = DB::table('students')->where('email', $email)->first();

        return view('auth.course-edit', compact('days', 'months', 'years', 'student'));
    }


    public function register_update( Request $request)
    {
        try {
        $days = $this->getDays();
        $months = $this->getMonths();
        $years = $this->getYears();
    
        $email = Auth::user()->email;
    
        $student = Student::where('email', $email)->first();

        $student->update([
            'fname' => $request->fname,
            'mname' => $request->mname,
            'lname' => $request->lname,
            'email' => $request->email,
            'date' => $request->date,
            'month' => $request->month,
            'years' => $request->years,
            'number11' => $request->number11,
            'number12' => $request->number12,
            'number13' => $request->number13,
            'licenseState' => $request->licenseState,
            'licensenumber' => $request->licensenumber,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'password_confirmation' => bcrypt($request->password),
            'address' => $request->address,
            'city' => $request->city,
            'states' => $request->states,
            'zipcode' => $request->zipcode,
            'find' => $request->find,
        ]);


        return redirect()->route('student.registration')->with('success','student 
        edited successfully');

    } catch (\Exception $e) {
        return redirect()->route('student.registration')->with('error', 'Failed to update student. Please try again.');
    }

        
        
    }


    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }



}
