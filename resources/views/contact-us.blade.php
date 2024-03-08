@extends('layouts.app')

@section('content')

<div class="container">
          <h1 class="title">Contact Us</h1>
                <div class="contact -us-section">
                 <div class="contact">                                  
                    <p class="email">E-mail: <a href="mailto:terryhaggin@gmail.com">terryhaggin@gmail.com</a></p>
                    <p class="email">Primary Phone: <a href="tel:800-574-5643">800-574-5643</a></p>
                    <p class="con-des">You can call us anytime, night or day. We will either be live on the phone, or you can leave a message, and I, Terry, or one of our assistants, will call you back as soon as possible within an hour. We are open every day except <span style="font-weight:700;">Christmas</span> and <span style="font-weight:700;">Easter</span>, but you can call us or email on those days, and we will probably still answer you.</p>
                 </div>

                 <div class="sign-up">
                    <a href="#"><img class="arrow" src="{{ asset('asset/images/arrow.png') }}" /> sign up</a>
                 </div>   
               </div>
         </div>   



@endsection 