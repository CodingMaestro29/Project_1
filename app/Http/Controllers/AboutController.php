<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('about-us');
    }


    public function home()
    {
        return view('home');
    }


}
