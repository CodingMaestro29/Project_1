@extends('layouts.app')

@section('content')

<div class="main-page-section home">
        <div class="container"> 
         <!--  <h1 class="title">Home</h1> -->
                <div class="banner-section">
                      <h2><b><span style="color:#04385c;">Are You Over 55?</span></b><br>Over <b><span style="color:#04385c;">7,000,000</span></b> students since 1998. <br>
                          You Can Lower Your Car Insurance. 
                           <br> We Teach You Important Defensive Tips for <b><span style="color:#04385c;">Safe Driving.</span></b></h2>
                      
                       <div class="main-banner">
                             <div class="banner-img"><img class="" src="{{ asset('asset/images11/home-banner-img.png') }}" />
                             </div>
                             <div class="banner-content">
                               <ul class="">
                                  <li> <img class="" src="{{ asset('asset/images11/checktick.png') }}" /> Mandatory Insurance Discount for 3 Years by State law.</li>
                                  <li> <img class="" src="{{ asset('asset/images11/checktick.png') }}" /> State Approved Online Mature Driver Course for Drivers Over 55.</li>
                                  <li> <img class="" src="{{ asset('asset/images11/checktick.png') }}" /> We Teach You Important Defensive Driving Tips for Safe Driving.</li>
                                  <li> <img class="" src="{{ asset('asset/images11/checktick.png') }}" /> We have Great Customer Service and We Want to Help You plus No Hidden Fees. Secure Website Too.</li>
                                  <li> <img class="" src="{{ asset('asset/images11/checktick.png') }}" /> Easy. Cheap. Fast. Convenient. Sign up today like so many others have and start saving money on your car insurance.</li>
                              </ul>
                             </div>
                       </div>


                </div>                 
         </div>   

    </div>

<div class="banner-bootm-section">
   <div class="container">

                       <div class="price-corse">
                            <div class="Course">
                              <p>Take the Initial Course</p>
                              <h4>$19.99</h4>
                                <div class="sign-up">
                                  <a href="#"><img class="arrow" src="{{ asset('asset/images11/arrow.png') }}" /> Register</a>                     
                               </div>
                            </div>
                             <div class="Course">
                              <p>Take the Refresher Course</p>
                              <h4>$19.99</h4>
                                <div class="sign-up">
                                  <a href="#"><img class="arrow" src="{{ asset('asset/images11/arrow.png') }}" /> Register</a>                     
                               </div>
                            </div>
                       </div> 

                      <div class="home-bottom">
                            <div class="bottom">
                              <div class="imgs-home"><img class="" src="{{ asset('asset/images11/doller-icon.png') }}" /></div>
                              <h4>Affordable</h4>
                              <p>We have a lowest price matching guarantee. Our initial course guarantees that you will earn a great insurance discount for THREE YEARS. This will make up for much more than the price of our course.</p>
                            </div>
                            <div class="bottom">
                               <div class="imgs-home"><img class="" src="{{ asset('asset/images11/led-icon.png') }}" /></div>
                              <h4>Easy</h4>
                              <p>Our easy, fast, cheap course is all online. You can login and out whenever you want. No classrooms. No tests. Everyone passes.</p>
                            </div>
                            <div class="bottom">
                               <div class="imgs-home"><img class="" src="{{ asset('asset/images11/check-icon.png') }}" /></div>
                              <h4>  Friendly</h4>
                              <p>We offer anytime / anywhere customer support. And because you can take our easy course anytime, it is stress-free and fun. We are here to help you with any questions that you may have. Call us now at 800-574-5643.</p>
                            </div>
                       </div>



   </div>
</div>

<div class="banner-last-section">
   <div class="container">
  <p class="con">Our family of traffic-related companies have been providing easy, simple, approved driving information since 1998. Our schools are state approved and licensed with a complete guarantee. Sign up today. Let us know if there is anything that you need anytime.</p>  
  </div>  
</div>



@endsection