<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ $settings->title }} </title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,900&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ url('sitefolder/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('sitefolder/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('sitefolder/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('sitefolder/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('sitefolder/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('sitefolder/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('sitefolder/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('sitefolder/css/screen.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('sitefolder/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('sitefolder/css/owl.css') }}">
    <link rel="stylesheet" href="{{ url('sitefolder/css/hover.css') }}">
    
    @yield('css')

</head>

<body>
    

    <button type="button" class="btn btn-danger btn-floating btn-lg" id="btn-back-to-top">
        <i class="fa fa-arrow-up"></i>
    </button>
    <!-- Page Preloder -->
    <div class="" id="preloder">
        <div class="text-center">
            <img src="{{ url('sitefolder/img/loderr.gif') }}" alt="" width="580px" height="300px" style="vertical-align: center;">
        </div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay">
    </div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option text-left">
            <div class="offcanvas__links">
                <a href="./book-stand.html">BOOK ASTAND NOW</a>
                <a href="./register.html"> REGISTERATION</a>
            </div>
            <div class="offcanvas__top__hover">
                <span> LANGUAGE <i class="arrow_carrot-down"></i></span>
                <ul>
                    <li>Arabic</li>
                    <li>English</li>
                </ul>
            </div>
        </div>
    
        <div id="mobile-menu-wrap"></div>
    </div>
    <!-- Offcanvas Menu End -->
    
    

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links">
                                <a href="./book-stand.html">Book AStand Now</a>
                            </div>
                            <div class="header__top__links">
                                <a href="./register.html">Registeration</a>
                            </div>
                        
                            <div class="header__top__hover">
                                <span>Language <i class="arrow_carrot-down"></i></span>
                                <ul>
                                    <li>Arabic</li>
                                    <li>English</li>
                                    <li>Fransh</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     
        
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="{{ route('homePage') }}"><img src="{{ $settings->logo }}" style="max-height: 70px;"></a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="{{ route('homePage') }}">Home</a></li>
                            <li><a href="{{ route('shop') }}">Shop</a></li>
                            <li><a href="{{ route('events') }}">Events</a></li>
                            <li><a href="{{ route('magazines') }}">Magazine</a></li>
                            <li><a href="{{ route('galleries') }}">Gallery</a></li>
                            <li><a href="{{ route('aboutUs') }}">About Us</a></li>
                            <li><a href="{{ route('contactUs') }}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->







    @yield('content')








    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="{{ route('homePage') }}"><img src="{{ $settings->logo }}" style="max-height: 70px;"></a>
                        </div>
                        <p>The customer is at the heart of our unique business model, which includes design.</p>
                        <!-- <div class="row">
                           <div class="col-12"> -->
                            <div class="social-links d-inline-flex">
                                <a class="facebook rounded-circle hvr-bounce-out"style="    background-color: #3b5999; text-align: center;    border-color: #3b5999;
                                " href="" title="Facebook" target="_blank"><i class="fa fa-facebook-f"></i></a>
                                <a class="twitter rounded-circle hvr-bounce-out"style="    background-color: #55acee; text-align: center;    border-color: #55acee;
                                " href="" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                                <a class="instagramm rounded-circle hvr-bounce-out"style="    background-color: #d80004; text-align: center;    border-color: #d80004;
                                " href="" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                                <a class="youtube rounded-circle hvr-bounce-out"style="    background-color: #cd201f; text-align: center;    border-color: #cd201f;
                                " href="" title="Youtube" target="_blank"><i class="fa fa-youtube"></i></a>
                            </div> 
                           <!-- </div>
                        </div> -->
                                           </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="{{ route('shop') }}">Shop</a></li>
                            <li><a href="{{ route('magazines') }}">Magazine</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Custom Show</h6>
                        <ul>
                            <li><a href="{{ route('contactUs') }}">Contact Us</a></li>
                            <li><a href="{{ route('events') }}"> Events </a></li>
                            <li><a href="./terms-and-conditions.html"> Terms and Conditions</a></li>
                            <li><a href="{{ route('aboutUs') }}">About Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>NewLetter</h6>
                        <div class="footer__newslatter">
                            <p>Be the first to know about new arrivals, look books, sales & promos!</p>
                            <form action="#">
                                <input type="text" placeholder="Your email">
                                <button type="submit"><span class="icon_mail_alt"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  <div class="container text-center" >
                    <p>Copyright ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>All Rights Reserved  <a href="" target="_blank"></a>
                    </p>
                  </div>
                 
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                      <p>Call Us Today +971 4 339 9916</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->


    <!-- Js Plugins -->
    <script src="{{ url('sitefolder/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ url('sitefolder/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('sitefolder/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ url('sitefolder/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ url('sitefolder/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ url('sitefolder/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ url('sitefolder/js/jquery.slicknav.js') }}"></script>
    <script src="{{ url('sitefolder/js/mixitup.min.js') }}"></script>
    <script src="{{ url('sitefolder/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('sitefolder/js/main.js') }}"></script>
    
    @php
        $counterTime = strtotime($setting->counter_time);
    @endphp
    
    <script>

    var counterMonth = '{{ date("M", $counterTime) }}';
    var counterDay = '{{ date("d", $counterTime) }}';
    var counterYear = '{{ date("Y", $counterTime) }}';
    var counterHour = '{{ date("h", $counterTime) }}';
    var counterMinute = '{{ date("i", $counterTime) }}';
    var counterSeconde = '{{ date("s", $counterTime) }}';
    
    var newdateToJs =  counterMonth + ' ' + counterDay  + ', ' + counterYear  + ' ' + counterHour + ':' + counterMinute + ':' + counterSeconde;
    
    

    var countDownDate = new Date(newdateToJs).getTime();



// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
 
    

  document.getElementById("day").innerHTML = days;
  document.getElementById("hour").innerHTML = hours;
  document.getElementById("minutes").innerHTML = minutes;
  document.getElementById("secound").innerHTML = seconds;

  
  document.getElementById("day1").innerHTML = days;
  document.getElementById("hour1").innerHTML = hours;
  document.getElementById("minutes1").innerHTML = minutes;
  document.getElementById("secound1").innerHTML = seconds;
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("countdown").innerHTML = "EXPIRED";
    document.getElementById("countdown1").innerHTML = "EXPIRED";
  }
}, 1000);

        
    </script>

</body>

</html>