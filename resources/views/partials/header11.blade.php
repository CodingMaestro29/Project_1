<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="{{ asset('asset/js/mainjquery.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
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
                     <h3>800-574-5643</h3>
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
                                  <li class="active"><a href="#">Student Home</a></li>
                                  <li><a href="{{route('auth.logout') }}">Logout</a></li>
                              </ul>
                            </nav> 
                    </div> 
              </div>
            </div>  
    </div>