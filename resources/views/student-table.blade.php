@extends('layouts.app11')

@section('content')

<div class="container">
          <h1 class="title">Table of Contents</h1>
                <div class="about-us-section table-content">
                 <div class="aboutus">                                  
                     <h3 class="about-title">Chapter One. HEALTH AND DRIVING PERFORMANCE</h3>
                     <p class="about-description terms">1.1. VISION LOSS AND OTHER EYE DISEASES</p>
                     <p class="about-description terms"> 1.2. EYE PHYSIOLOGY</p>
                     <p class="about-description terms">1.3. DEGENERATIVE EYE CONDITIONS</p>

                     <h3 class="about-title">Chapter Two. ALCOHOL AND OTHER DRUGS</h3>
                     <p class="about-description terms"> 2.1. MEDICAL PROBLEMS AFFECTING DRIVING</p>
                     <p class="about-description terms"> 2.2. THE DRUG ALCOHOL</p>
                     <p class="about-description terms">2.3. STAGES OF ALCOHOL INFLUENCE</p>
                     <p class="about-description terms">2.4. THE EFFECTS OF ALCOHOL</p>
                     <p class="about-description terms"> 2.5. HOW TO AVOID AND IDENTIFY DRUNK DRIVERS</p>
                     <p class="about-description terms"> 2.6. ALTERNATIVES TO DRINKING AND DRIVING</p>

                     <h3 class="about-title">Chapter Three. DEFENSIVE DRIVING</h3>
                     <p class="about-description terms"> 3.1. ADJUSTING OT THE DRIVING ENVIRONMENT</p>
                     <p class="about-description terms"> 3.2. HAZARDOUS WEATHER CONDITIONS</p>
                     <p class="about-description terms"> 3.3. DRIVING DISTRACTIONS</p>
                     <p class="about-description terms"> 3.4. ACCIDENT CAUSATION</p>
                     <p class="about-description terms"> 3.5. ACCIDENT TYPES</p>

                     <h3 class="about-title">Chapter Four. GENERAL DRIVING TIPS</h3>
                     <p class="about-description terms"> 4.1. GENERAL DRIVING TIPS</p>
                     <p class="about-description terms"> 4.2. DRIVING COURTESY AND ATTITUDE</p>
                
                     <h3 class="about-title">Chapter Five. INTERSECTIONS</h3>
                     <p class="about-description terms">  5.1. CONTROLLED AND UNCONTROLLED INTERSECTIONS</p>
                     <p class="about-description terms"> 5.2. SIGNALING DISTANCE</p>
                     <p class="about-description terms"> 5.3. RIGHT TURNS (PROTECTED & UNPROTECTED)</p>
                     <p class="about-description terms">5.4. LEFT TURNS AT AN INTERSECTION</p>
                     <p class="about-description terms"> 5.5. U-TURNS</p>

                     <h3 class="about-title">Chapter Six. SPEEDING AND PASSING</h3>
                     <p class="about-description terms">6.1. SPEED LAWS (BASIC AND ADVISORY)</p>
                     <p class="about-description terms">  6.2. PASSING AND LANE CHANGES</p>
                     <p class="about-description terms">  6.3. WHEN PASSING IS PROHIBITED</p>
                     <p class="about-description terms">6.4. DEFENSIVE DRIVING</p>
                     <p class="about-description terms"> 6.5. DEFENSIVE DRIVING</p>

                     <h3 class="about-title">Chapter Seven. TRAFFIC SIGNS, SIGNALS AND CONTROLS</h3>
                     <p class="about-description terms"> 7.1. RECOGNIZING TRAFFIC CONTROL SIGNALS</p>
                     <p class="about-description terms"> 7.2. SIGNS</p>
                     <p class="about-description terms">  7.3. PAVEMENT MARKINGS</p>
                     <p class="about-description terms">7.4. CURB MARKINGS</p>
                     <p class="about-description terms"> 7.5. QUALIFYING FOR A DISABLED PLACARD</p>
                     
                     <h3 class="about-title">Chapter Eight. THE VEHICLE</h3>
                     <p class="about-description terms">  8.1. LIGHTS</p>
                     <p class="about-description terms">  8.2. BRAKES</p>
                     <p class="about-description terms">   8.3. WINDSHIELD AND MIRRORS</p>
                     
                    <h3 class="about-title">Chapter Nine. THE DRIVING ENVIRONMENT</h3>
                     <p class="about-description terms"> 9.1. CITY DRIVING</p>
                     <p class="about-description terms">9.2. CITY PASSING</p>
                     <p class="about-description terms">  9.3. FREEWAY DRIVING</p>
                     <p class="about-description terms">9.4. CHOOSING LANES OF TRAVEL</p>
                     
                     <h3 class="about-title">Chapter Ten. DRIVER RESPONSIBILITY</h3>
                     <p class="about-description terms">10.1. PEDESTRIAN SAFETY</p>
                     <p class="about-description terms"> 10.2. MOTORCYCLE SAFETY</p>
                     <p class="about-description terms"> 10.3. BICYCLE SAFETY</p>
                     <p class="about-description terms">10.4. EMERGENCY VEHICLES & CONSTRUCTION AREAS</p>
                     <p class="about-description terms"> 10.5. PROCEDURES WHEN INVOLVED IN AN ACCIDENT</p>
                     <p class="about-description terms">  10.6. REPORTING REQUIREMENTS</p>

                     <h3 class="about-title">Chapter Eleven. GETTING READY FOR RENEWAL</h3>
                     <p class="about-description terms"> 11.1. GETTING READY FOR RENEWAL</p>
                     <p class="about-description terms">11.2. WRITTEN TEST TIPS</p>
                     <p class="about-description terms"> 11.3. VISION TESTS</p>
                     <p class="about-description terms">11.4. DRIVING TESTS</p>
                     <p class="about-description terms"> 11.5. MEDICAL CONDITIONS EVALUATIONS</p>
                     <p class="about-description terms"> 11.6. THE RE-EXAMINATION PROCESS</p>
                     <p class="about-description terms"> 11.7. DMV RE-EXAMINATION DECISIONS</p>

                     <h3 class="about-title">Chapter Twelve. DECIDING WHEN NOT TO DRIVE</h3>
                     <p class="about-description terms"> 12.1. THE WARNING SIGNS OF POTENTIAL DANGER</p>
                     <p class="about-description terms">12.2. WHEN YOU ARE CONCERNED ABOUT A DRIVER</p>
                     <p class="about-description terms"> 12.3. GETTING AROUND WITHOUT DRIVING</p>
                     <p class="about-description terms">Final Test</p>
                     
                 </div>
                 <div class="dashboard-tabs">
                    <a href="#"> Exit The Course</a>
                    <a href="{{route('contact.index') }}"> Contact Us</a>
                    <a href="{{route('dashboard.index') }}"> Student Home</a>
                 </div>   
               </div>
         </div>   



@endsection 