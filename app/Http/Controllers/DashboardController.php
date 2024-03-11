<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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




}
