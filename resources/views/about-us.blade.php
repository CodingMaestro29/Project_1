@extends('layouts.app')

@section('content')

<div class="container">
          <h1 class="title">About Us</h1>
                <div class="about-us-section">
                 <div class="aboutus">                                  
                     <h3 class="about-title">We are on your side!</h3>
                     <p class="about-description">We are America's largest senior insurance discount course. In each state, we are approved by the various governmental agencies that review, supervise, and maintain the integrity of driver safety.</p>
                     <p class="about-description">We have been in business for over 25 years now, starting in 1998. Most of our business comes directly from the insurance companies themselves, with agents from all over the United States recommending us to their customers and clients. Additionally, we have a strong presence on Google and Bing search engines.</p>
                     <p class="about-description">We pride ourselves on having happy, satisfied customers from all across the country, and if you have trouble of any kind, we want to help and make it right. If you are not satisfied with any of your interactions with us, we will refund your money and give you the course for free, no questions asked.</p>
                     <p class="about-description">Our phone number is nationwide at <a href="tel:800-574-5643">800-574-5643.</a> My name is Terry Haggin, and I am the builder, designer, and owner of Over 55 Mature Driver Course. If you need to contact me anytime, my personal email address is <a class="emails" href="mailto:terryhaggin@gmail.com">terryhaggin@gmail.com.</a> Please choose our company over the others; you will be glad that you did.</p>
                 </div>
                 <div class="sign-up">
                    <a href="{{route('auth.register_view') }}"><img class="arrow" src="{{ asset('asset/images/arrow.png') }}" /> sign up</a>
                 </div>   
               </div>
         </div>   



      
@endsection   