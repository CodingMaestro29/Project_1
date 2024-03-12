@extends('layouts.app')

@section('content')

<div class="container">
          <h1 class="title">Testimonials</h1>
                <div class="testimonil-section">
                  <div class="testi-des">
                    <p class="tetimonial-content">Taking this course was one of the best things I have ever done on the internet. You make it easy for me to sign-up, the course information was well-done, and easy to follow. I passed the final on the first try and you sent me a picture of my completion certificate by email and I gave it to my agent. Could not have been easier.</p>
                      <p class="tetimonial-content">I am not a computer person but my insurance agent recommended you to me so I could get a discount. She uses your company for all her clients. I am very happy with your service. All I did was read the webpage, signup, pay, take the quick, easy class and completed my final. You verified me by phone, and registration, then emailed me a picture of my completion certificate that day and mailed me another copy in a few days. Will tell my friends about you and you have my email if you need me for anything.</p>
                        <p class="tetimonial-content">Loved your course. I learned a lot. Stopped halfway through and when I started again, you took me to where I left off. Your new AI technology is pretty amazing. I also used your free audio course reading to speed me along. The final exam was an easy pass, just like you said.</p>
                          <p class="tetimonial-content">Saved 5% on my insurance. Learned something along the way. Was not expecting it to be so painless, just followed the video and written instructions as I continued from beginning to end. Google recommended you by being at the top of my search. The California DMV approved a fine company when they selected you.</p>
                            <p class="tetimonial-content">Arizona AAA agent recommended you at Over55MatureDriverCourse. Apparently, he has had good luck with his clients. It is not often that an agent will risk his customers to an unknown company but I suppose he knows best and has had a positive experience. My time was well spent. I feel better now that I found you and took action to complete it. If you need a customer review for your website, you can use me.</p>
                              <p class="tetimonial-content">Farmers told me about this program and gave me a few approved sites. I looked at them all and chose yours. Not sure how the other ones do business but I liked how you did. Material with pictures and videos was good. The course was short. The final was so easy. You contacted me by email and phone to make sure I was the one taking the course, then sent me a picture of my DMV certificate to forward to Farmers. In a week, I got the paper one too. When I had questions I talked to you and also left a message and you called me right back.</p>
                                <p class="tetimonial-content">I had trouble with my payment as you were changing your PayPal price from 19.95 to 17.95. I called you and you gave me a bypass password so I could start. Later when I was finished, I tried to pay and you said, “No”, because you had payment issues the course was free. Who does this? I was shocked and plenty surprised. You have a happy customer for life. Thank you again for such great service and integrity.</p>
                                  <p class="tetimonial-content">I paid less than twenty dollars, took your easy class so quickly, sent my certificate to Geico and now I saved over one hundred dollars in two years. Super deal. </p>

                                    <p class="tetimonial-content">This is a great DMV program. So glad they and the insurance companies work together for our benefit. More people should know about it to learn about driving issues as seniors and also save money.</p>
                                      <p class="tetimonial-content">Love my experience with your company. It was easy to figure out and the only time I heard from you was when you called me to confirm my registration/certificate information at the end. Painless.</p>
                </div>

                 <div class="sign-up">
                    <a href="{{route('auth.register_view') }}"><img class="arrow" src="{{ asset('asset/images/arrow.png') }}" /> sign up</a>
                 </div>   
               </div>
         </div>   

@endsection 