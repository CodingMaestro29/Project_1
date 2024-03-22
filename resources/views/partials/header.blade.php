<!DOCTYPE html>
<html>
<head>
    <title>Course</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> 
    
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
   
   
   
    
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('asset/js/mainjquery.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <script src= 
        "https://www.google.com/recaptcha/api.js" async defer> 
    </script> 
    
    
    </head>
<body>
     <div class="header-section">
        <div class="container">
          <div class="main-header-section">
            <div class="top-bar">
                <div class="logo">
                    <img src="{{ asset('asset/images/logo.png') }}" />
                </div>
                <div class="rating">
                    <img src="{{ asset('asset/images/rating.png') }}" />
                    <p>15,000 plus 5 star reviews</p>   
                </div>
                <div class="number">
                    <h3><a href="tel:800-574-5643">800-574-5643</a></h3>
                     <img class="number-img" src="{{ asset('asset/images/num.png') }}" />
                      <img class="number-img" src="{{ asset('asset/images/num2.png') }}" />
                     <p>Questions? Call our Insurance Discount experts</p>
                </div>
                <div class="top-right-image">
                    <img src="{{ asset('asset/images/right-image.png') }}" />
                </div>
            </div>
       
                    <div class="navigation">
                            <nav class="navbar">
                              <div class="navbar-toggle" id="navbar-toggle">
                                  <span></span>
                                  <span></span>
                                  <span></span>
                              </div>
                               <i class="fas fa-times"></i> <!-- Cross icon -->
                                <ul class="navbar-menu" id="navbar-menu">
                                  <li><a href="{{route('home') }}">Home</a></li>
                                  <li class="active" ><a href="{{route('auth.register_view') }}">START COURSE</a></li>
                                  <li><a href="{{route('testimonials.index') }}">testimonials</a></li>
                                  <li><a href="{{route('works.index') }}">HOW IT WORKS</a></li>
                                  <li><a href="{{route('faq.index') }}">faq</a></li>
                                  <li><a href="{{route('about.index') }}">about us</a></li>
                                  <li><a href="{{route('contact.index') }}">Contact us</a></li>
                                  <li class="star"><a href="{{route('login') }}"><img class="star" src="{{ asset('asset/images/star.png') }}" /> student login</a></li>
                              </ul> 
                            </nav> 
                   </div> 
              </div>
            </div>  
    </div>


    <script>
      
        $(document).ready(function(){
            
          //  alert('test');
            
    var Localhost = window.location.hostname.includes('localhost');
        
         var hostName = window.location.hostname;
         // alert(hostName);

        var currentPagePath = window.location.pathname;

        var protocol = Localhost ? 'http://' : 'https://';

         if(hostName == 'localhost'){
        var redirectUrl = protocol  + 'localhost:8000'+ currentPagePath;
         }else{
          var redirectUrl = protocol  + hostName + currentPagePath;
        }
        console.log( redirectUrl);

        $("#navbar-menu li").each(function () {
              var anchor = $(this).find('a');
              var url = anchor.attr('href');
          
              console.log(url);
        if(redirectUrl===url){
        $("#navbar-menu li").removeClass("active");
          $(this).addClass("active");

        }

        });

        });


</script>