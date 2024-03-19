@extends('layouts.app')

@section('content')

<div class="container">
@if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @elseif(Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif
          <h1 class="title">Reset your password here</h1>
                <div class="student-login-section">
                 <p class="refund-policy">Reset Password</p>  
                    <div class="student-login">  
                    <p class="login-title">Reset password Form</p>
                   <p class="login-text">Continue your course where you stopped</p>                         
                    <form class="login-form" action="{{route('process.reset') }}" method="post">
                    @csrf
                    <input type="hidden" name="token" value = "{{ $token }}">
                    <div class="login-input ps">
                              <label>Password</label>
                              <input type="Password" id="Password" name="password">
                              @error('password')
                              <div class="text-danger">{{ $message }}</div>
                               @enderror
                          </div>

                          <div class="login-input ps">
                              <label>Confirm</label>
                              <input type="Password" id="password_confirmation" name="password_confirmation">
                              @error('password_confirmation')
                              <div class="text-danger">{{ $message }}</div>
                               @enderror
                          </div>

                         
                          <div class="main-div-user">
                            <div class="users">
                               <!-- <a href="{{route('login') }}" class="lost-password" >LogIn</a> -->
                               <!-- <a href="#" class="forget-user-name">Forgot User Name?</a> -->
                            </div>
                            <div class="submit-btn">
                              <!-- <input type="submit" value="SECURE LOGIN "> -->
                              <button type="submit" style="padding-bottom:10px;width:200px;margin-right:40px;">UPDATE YOUR PASSWORD</button>
                              </div>
                          </div>
                          
                  </form> 
                  <img class="loginform" src="{{ asset('asset/images/loginform.png') }}" />
                 </div>   
               </div>
         </div>   



@endsection 