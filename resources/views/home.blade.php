@extends('layouts.app')

@section('content')

<div id="loader" class="loader"></div>
      <div class="container">
          <div class="main-banner-section">
                <div class="home-banner-left-section">
                  <div class="img"><img class="videoimg" src="{{ asset('asset/images/homemainimg.png') }}" />  <div class=""><a href="#"><img class="videoicon" src="{{ asset('asset/images/videoicon.png') }}" /></a></div></div>
                  
                </div>  
                <div class="home-banner-right-section">
                  <h2 class="banner-heading">Are you over 55? Take our fast and easy course<br> to save up to 15% on your insurance</h2>
                  <p class="sub-text">California Code Section 11628.3.</p>
                  <h2 class="insurance-heading">In over 25 years we have <span style="color:rgba(208, 0, 0, 1);">saved over 1,000,000 people</span><br> money on their insurance bills.</h2>
                  <h3 class="insu-sub-heading">Just by Taking this Official Licensed Course</h3>
                  <h3 class="headings-content">When you finish. You give your insurance agent your completion<br> certificate. So easy.</h3>

                      <div class="certificate-section">
                        <div class="certificate-details">
                           <h3> <img class="checkmark" src="{{ asset('asset/images/checkmark.png') }}" /> <span style="color:rgba(208, 0, 0, 1);">FREE</span> 1st Class Shipping</h3>
                           <p>Or Next Day FedEx Delivery</p>
                        </div>
                        <div class="certificate-details">
                           <h3><img class="checkmark" src="{{ asset('asset/images/checkmark.png') }}" /><span style="color:rgba(208, 0, 0, 1);">FREE</span>Completion Certificate</h3>
                           <p>100.00% Passing Rate</p>
                        </div>
                      </div>
                      <div class="certificate-section second">
                        <div class="certificate-details">
                           <h3> <img class="checkmark" src="{{ asset('asset/images/checkmark.png') }}" /> Unlimited Course Attempts</h3>
                           <p>Retake Until You Pass!</p>
                        </div>
                        <div class="certificate-details book-format">
                           <h3><img class="checkmark" src="{{ asset('asset/images/checkmark.png') }}" />Open Book Format</h3>
                           <p>Get Help When You Need</p>
                        </div>
                      </div>
                      <div class="banner-images-section">
                         <img class="business" src="{{ asset('asset/images/businesslogo.png') }}" />
                          <img class="sealstate" src="{{ asset('asset/images/seal-state 2.png') }}" />
                           <p><span style="font-size: 28px; padding-right: 6px;">Only </span> $<span style="font-size: 92px;"><sub>17</sub></span>.95</p>
                           <div class="signup-btn watch-video start"><a class="course-satrt-btn" href="{{ route('auth.register_view') }}"> <img class="" src="{{ asset('asset/images/startcourse.png') }}" />  Start Course<br><span>click here to start</span></a></div>
                      </div>

                </div> 
          </div>
               <p class="horizontal-text">100% California approved – DMV license number MDIP000034 – Approved since 1998</p>
       </div>
    
                  <div class="get-started-section">
                     <div class="container">
                         <div class="get-started">
                           <div class="started-content">
                             <h3>Get Started Now</h3>
                             <p>No timers. No quizzes. 100% pass final</p>
                            <div class="signup-btn"><a href="{{ route('auth.register_view') }}"> <img class="" src="{{ asset('asset/images/signup.png') }}" /> Sign-Up</a></div>
                           </div>
                            <div class="started-content">
                             <h3>100% AI technology</h3>
                             <p>Safe, modern, secure, organized, simple from start to finish.<br> Please click on below button to watch our short video.</p>
                            <div class="signup-btn watch-video"><a href="#"> <img class="" src="{{ asset('asset/images/video.png') }}" />  Watch Video</a></div>
                           </div>
                         </div>
                     </div>
                  </div>



                   <div class="testimonials-section">
                     <div class="container">
                         <div class="customer-testimonial">
                          <div class="main-content">
                            <h2>Customer Testimonials</h2>
                             <div class="testimonials-content">
                              <div class="text-des">
                                 <h3>“I finished just like <br>that.” It was great.”</h3>
                                 <p class="testimonials-title">Los Angeles,<br> CA</p>
                               </div>
                               <div class="testimonials-img"><img class="" src="{{ asset('asset/images/testimageone.png') }}" /></div>
                             </div>
                            </div>

                            <div class="main-content">
                            <h2>Customer Testimonials</h2>
                             <div class="testimonials-content">
                              <div class="text-des">
                                 <h3>“The best thing I <br>have ever signed<br> up for on the<br> internet.”</h3>
                                 <p class="testimonials-title">Los Angeles,<br> CA</p>
                               </div>
                               <div class="testimonials-img"><img class="" src="{{ asset('asset/images/testiimagetwo.png') }}" /></div>
                             </div>
                            </div>
                               <div class="student-login">  
                                      <p class="login-title">Student Login</p>
                                      <p class="login-text">Continue your course where you stopped</p>                         
                                      <form class="login-form" action="{{route('auth.login') }}" method="post">
                                      @csrf
                                            <div class="login-input">
                                                <label>Login User Name</label>
                                                <input type="text" id="loginuser"  name="email">
                                                @error('email')
                                               <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="login-input ps">
                                                <label>Password</label>
                                                <input type="Password" id="Password"  name="password">
                                                @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="main-div-user">
                                              <div class="users">
                                                 <a href="{{route('forgot.password') }}" class="lost-password">Lost Password?</a>
                                                 <a href="#" class="forget-user-name">Forgot User Name?</a>
                                              </div>
                                               <div class="submit-btn">  
                                                <!-- <input type="submit"  value="SECURE LOGIN "> -->
                                                <button id="secure-login-btn" class="secure-login-btn" type="submit">SECURE LOGIN</button>
                                                <p class="subtitle">CLICK HERE TO RE-ENTER</p>
                                              </div> 
                                            </div>                                           
                                    </form> 
                                    <img class="loginform" src="{{ asset('asset/images/loginform.png') }}">
                               </div>
                         </div>
                     </div>
                  </div>


                    <div class="bottom-home-page  ">
                     <div class="container">
                         <div class="botom-content">
                           <div class="allcontent">
                             <h2>We will take care of you from start to finish. Our<br> customers are family to us and if you need anything at<br> all, just let us know and we will do our best to make your<br> experience great.</h2>
                             <h3 class="all-head">Why we are here</h3>
                             <p class="allcon">The Mature Driver Improvement Course provides instruction on defensive driving and California<br> motor vehicle laws. During this course, information is provided on the effects that medication,<br> fatigue, alcohol, visual or auditory limitations have on a person's driving ability.</p>
                             <h3 class="all-head">Why should you sign up with us?</h3>
                             <p class="allcon">Mature drivers, 55 or older, who successfully complete an approved Driver Improvement Course<br> qualify for reduced motor vehicle insurance premiums. California law allows insurance companies<br> to determine the percentage of premium reduction.</p>
                             <h3 class="all-head">Our Price</h3>
                             <p class="allcon">Our price is $17.95. No hidden charges. We send you the certificate for free either by<br> mail or by email. Take that to your insurance company and they will give you a discount. The course is fast<br> and very easy. You can do it.</p>
                             <h3 class="all-head">ELIGIBLE AGE</h3>
                             <p class="allcon">The law says it is only for drivers over 55, we have found over the years that many companies<br> and agents accept our course from age 50 and up. Call them and ask them if they will take our<br> certificate. Most will at age 50.</p>
                           </div>

                            <div class="allcontent right">
                             <h2>Frequently Asked Questions</h2>
                             <h3> <span>.</span>Is this a California DMV licensed mature driver course?</h3>
                             <p>Yes! We are licensed through the DMV. Our license number is MDIP000034.</p>
                              <h3> <span>.</span>What is the Mature Driver Improvement Course?</h3>
                             <p>Any California resident over the age of 55 is eligible to receive a discount on your auto insurance premium if they complete the mature driver course. It consists of 10 chapters of reading material and answering questions, and there is a 25 question final exam at the end. Once you complete the course and the final, we will mail you a certificate of completion to present to your insurance company.</p>
                             <h3> <span>.</span>How much of a discount to I receive on my auto insurance if I complete the course?</h3>
                             <p>The discount percentage varies depending on your insurance company. Contact your provider for an exact amount, but typically, you will receive a discount of anywhere from 5 to 15 percent.</p>
                             <h3> <span>.</span>How much does the course cost?</h3>
                             <p>The cost of the course is only 17.95. The price includes ABSOLUTELY everything you need to lower your insurance rates. NO HIDDEN FEES!</p> 
                             <div class="morefaqs"><a href="{{ route('faq.index') }}" class="more-faq">More Faqs</a></div>
                           </div>
                             
                         </div>
                     </div>
                  </div>




          <div class="home-page-last-section">
             <div class="container">
            <p class="des-last">Online mature driver school for California</p>  
            <p class="bottom-menu"><a href="#">Privacy Policy</a> | <a href="#">Refund Policy</a> | <a href="{{ route('contact.index') }} ">Contact Us</a></p>
            </div>  
          </div> 




          <style>
          
          .secure-login-btn:hover {
              cursor: pointer; 
          }
        
        
          .loader {
              border: 20px solid #f3f3f3; /* Light grey */
              border-top: 20px solid #3498db; /* Blue */
              border-radius: 50%;
              width: 100px;
              height: 100px;
              animation: spin 1s linear infinite;
              position: fixed;
              top: 40%;
              left: 50%;
              transform: translate(-50%, -50%);
              z-index: 9999; /* Ensure the loader appears above other elements */
              display: none; /* Hide loader by default */
          }
        
          @keyframes spin {
              0% { transform: rotate(0deg); }
              100% { transform: rotate(360deg); }
          }
        
          </style>
        
        
          <script>
          $(document).ready(function () {
              $('#secure-login-btn').click(function () {
                  $('#loader').show();
              });
          });
        
          </script>















@endsection