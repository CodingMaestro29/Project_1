@extends('layouts.app')

@section('content')

<div class="container">
          <h1 class="title">Contact Us</h1>
          @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @elseif(Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif
                <div class="contact -us-section">
                 <div class="contact">                                  
                    <p class="email">E-mail: <a href="mailto:terryhaggin@gmail.com">terryhaggin@gmail.com</a></p>
                    <p class="email">Primary Phone: <a href="tel:800-574-5643">800-574-5643</a></p>
                    <p class="con-des">You can call us anytime, night or day. We will either be live on the phone, or you can leave a message, and I, Terry, or one of our assistants, will call you back as soon as possible within an hour. We are open every day except <span style="font-weight:700;">Christmas</span> and <span style="font-weight:700;">Easter</span>, but you can call us or email on those days, and we will probably still answer you.</p>
                 </div>

                 <div class="sign-up">
                    <a href="{{route('auth.register_view') }}"><img class="arrow" src="{{ asset('asset/images/arrow.png') }}" /> sign up</a>
                 </div>   
               </div>
         </div> 
         
         
         <!--contact form         -->
      <div class="container contact-form">
          <div class="form-image">
            <img class="form-image11" src="{{ asset('asset/images/email.jpg') }}" />  
          </div>
          <div class = "form-right">
          <form action="{{ route('send.email') }}" method="post">
                @csrf
      <div class="row">
			<h1 class="form">Get in touch</h1>
	</div>
	<div class="row">
			<h4 class="form-text" style="text-align:center">We'd love to hear from you!</h4>
	</div>
	<div class="row input-container">
			<div class="col-xs-12">
				<div class="styled-input form22 wide">
					<input type="text" name="name"   />
					<label for="name">Name</label>
                    <span class = "text-danger">
                        @error('name')
                        {{$message}}
                         @enderror
                        </span>
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="styled-input form22">
					<input type="text" name="email"  />
					<label for="email">Email</label>
                    <span class = "text-danger">
                        @error('email')
                        {{$message}}
                         @enderror
                        </span>
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="styled-input form22" style="float:right;">
					<input type="text"  name="phone"  />
					<label for="phone">Phone Number</label>
                    <span class = "text-danger">
                        @error('phone')
                        {{$message}}
                         @enderror
                        </span>
				</div>
			</div>
			<div class="col-xs-12">
				<div class="styled-input form22 wide">
					<input type="text"  name="subject"  />
					<label for="subject">Subject</label> 
                    <span class = "text-danger">
                        @error('subject')
                        {{$message}}
                         @enderror
                        </span>
				</div>
			</div>
			<div class="col-xs-12">
				<div class="styled-input form22 wide">
					<textarea name="message"  id="messageTextarea" ></textarea>
					<label for="message" id="messageLabel">Message</label>
                    <span class = "text-danger">
                        @error('message')
                        {{$message}}
                         @enderror
                        </span>
				</div>
			</div>
			<div class="col-xs-12">
				<!-- <div class="btn-lrg submit-btn">Send Message</div> -->
                <button class="btn-lrg submit-btn" type="submit" name="submit" >
                    Send Message</button>
			</div>
	</div>
</form>
	</div>
	</div>
               
               
   <style>

/*body {*/
/*    background-color: #444442;*/
/*    padding-top: 85px;*/
/*}*/

.contact-form {
  overflow: hidden; /* or overflow: auto */
}

.form-right{
    float:right;
}

.form-image{
   float:left; 
}

img.form-image11 {
    width: 400px;
    margin-top: 280px;
}

h1.form {
    font-family:'Poppins', sans-serif, 'arial';
    font-weight: 600;
    font-size: 42px;
    color: rgba(51, 153, 255, 1);
    text-align: center;
}

h4.form-text {
    font-family: 'Roboto', sans-serif, 'arial';
    font-weight: 400;
    font-size: 25px;
    color: #9b9b9b;
    line-height: 1.5;
    margin-top:-20px;
}

/* ///// inputs /////*/

input:focus ~ label, textarea:focus ~ label, input ~ label, textarea ~ label {
    font-size: 0.75em;
    color: #999;
   top: -5px;
    -webkit-transition: all 0.225s ease;
    transition: all 0.225s ease;
}

.styled-input.form22 {
    float: left;
    width: 293px;
    margin: 1rem 0;
    position: relative;
    border-radius: 4px;
}

@media only screen and (max-width: 768px){
    .styled-input {
        width:100%;
    }
}

.styled-input label {
    color: #999;
    font-size:20px;
    padding: 0.5rem 20px 1rem 20px;
    position: absolute;
    top: 10px;
    left: 0;
    -webkit-transition: all 0.25s ease;
    transition: all 0.25s ease;
    pointer-events: none;
}

.styled-input.wide { 
    width: 650px;
    max-width: 100%;
}

input,
textarea {
    padding: 20px;
    border: 0;
    width: 100%;
    font-size: 1rem;
    background-color: #e6e6e6;;
    color: black;
    border-radius: 4px;
}

input:focus,
textarea:focus { outline: 0; }

input:focus ~ span,
textarea:focus ~ span {
    width: 100%;
    -webkit-transition: all 0.075s ease;
    transition: all 0.075s ease;
}

textarea {
    width: 100%;
    min-height: 15em;
}

.input-container {
    width: 650px;
    max-width: 100%;
    margin: 20px auto 25px auto;
}

.submit-btn {
    float: right;
    border:none;
    padding: 20px 35px;
    border-radius: 60px;
    display: inline-block;
    background-color:rgba(51, 153, 255, 1);
    color: white;
    font-size: 23px;
    cursor: pointer;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.06),
              0 2px 10px 0 rgba(0,0,0,0.07);
    -webkit-transition: all 300ms ease;
    transition: all 300ms ease;
}

.submit-btn:hover {
    transform: translateY(1px);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,0.10),
              0 1px 1px 0 rgba(0,0,0,0.09);
}

@media (max-width: 768px) {
    .submit-btn {
        width:100%;
        float: none;
        text-align:center;
    }
}

input[type=checkbox] + label {
  color: #ccc;
  font-style: italic;
} 

input[type=checkbox]:checked + label {
  color: #f00;
  font-style: normal;
}

</style>



<script>
    
    const inputs = document.querySelectorAll('input');

    inputs.forEach(input => {
        input.addEventListener('input', () => {
            if (input.value.trim() !== '') {
                const label = input.parentNode.querySelector('label');
                label.style.display = 'none';
            }
        });
    });
    
    

        $('#messageTextarea').on('input', function() {
            if ($(this).val().trim() !== '') {
                $('#messageLabel').hide();
            } else {
                $('#messageLabel').show();
            }
        });
    



    



</script>
           
               
               
               



@endsection 