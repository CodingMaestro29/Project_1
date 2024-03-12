@extends('layouts.app')

@section('content')

<div class="container">
          <h1 class="title">Secure Login - 100% Secure</h1>
                <div class="student-login-section">
                       
                    <p class="refund-policy">Login To The Course</p>  
                    <div class="student-login">  
                    <p class="login-title">Student Login</p>
                    <p class="login-text">Continue your course where you stopped</p>                         
                    <form class="login-form">
                          <div class="login-input">
                              <label>Login User Name</label>
                              <input type="text" id="loginuser" name="loginuser">
                          </div>

                          <div class="login-input ps">
                              <label>Password</label>
                              <input type="Password" id="Password" name="Password">
                          </div>
                          <div class="main-div-user">
                            <div class="users">
                               <a href="#" class="lost-password">Lost Password?</a>
                               <a href="#" class="forget-user-name">Forgot User Name?</a>
                            </div>
                            <div class="submit-btn">
                              <!-- <input type="submit"  value="SECURE LOGIN "> -->
                              <button type="submit">SECURE LOGIN</button>
                              <p class="subtitle">CLICK HERE TO RE-ENTER</p>
                            </div>
                          </div>
                          
                  </form> 
                  <img class="loginform" src="{{ asset('asset/images/loginform.png') }}" />
                 </div>   
               </div>
         </div>   



@endsection 