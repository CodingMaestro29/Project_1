@extends('layouts.app')

@section('content')

<div class="container">
          <h1 class="title">What will happen in our course</h1>
                <div class="how-it-works-section">
                 <div class="course-happen">
                      <div class="steps">
                         <p class="step">1 <span>Step</span></p>
                         <p class="stepdescription">Go to the Sign Up page and fill out your student registration.</p>
                      </div>
                      <div class="steps">
                         <p class="step">2 <span>Step</span></p>
                         <p class="stepdescription">Watch out short intro video</p>
                      </div>
                      <div class="steps">
                         <p class="step">3 <span>Step</span></p>
                         <p class="stepdescription">Pay for the Course.</p>
                      </div>
                      <div class="steps">
                         <p class="step">4 <span>Step</span></p>
                         <p class="stepdescription">Watch short course explanation video.</p>
                      </div>
                      <div class="steps">
                         <p class="step">5 <span>Step</span></p>
                         <p class="stepdescription">Start Course</p>
                      </div>
                      <div class="steps">
                         <p class="step">6 <span>Step</span></p>
                         <p class="stepdescription">Finish course and pass final.</p>
                      </div>
                        <div class="steps">
                         <p class="step">7 <span>Step</span></p>
                         <p class="stepdescription">Watch final short exit video. Go to ending page, read instructions and log out. That is it, You are finished.</p>
                      </div>
                 </div>

                 <div class="sign-up">
                    <a href="#"><img class="arrow" src="{{ asset('asset/images/arrow.png') }}" /> sign up</a>
                 </div>   
               </div>
         </div>   



@endsection 