@extends('layouts.app11')

@section('content')




<div class="container">
          <h1 class="title">Student Dashboard</h1>
                <div class="student-dashboard-section">
                 <div class="contact">       
                    <p class="refund-policy">The Student Page of {{ Auth::user()->fname ." ".Auth::user()->lname }}</p>                           
                    <p class="privacy-policy">You can go to our course or you can make changes if you need to. Whatever you want to do, it's up to you.</p>   
                    <p class="privacy-policy">Take a look around and see what's up before you start.</p> 
                    <p class="privacy-policy">You will be glad that you did ...</p> 
                    <a class="get-certificate" href="#">Get class completion certificate</a>
                 </div>
 
                 <div class="dashboard-tabs">
                    <a href="#"> Go to My Course</a>
                    <a href="{{route('student.table') }}"> My Table of Contents</a>
                    <a href="{{route('student.registration') }}"> My Registration Information</a>
                 </div>   
               </div>
         </div>   
     </div>



     @endsection 