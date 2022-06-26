@extends('layout.siteLayout')

@section('title')
@endsection

@section('css')
@endsection

@section('content')



    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__items set-bg" data-setbg="{{ url('sitefolder/img/hero/slide1.jpeg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>Join Us <strong>March 24-26   2022</strong></h6>
                                <h2>BIGGEST CUSTOM CARS & BIKE SHOW</h2>
                                <h6>IN <strong> THE MIDDLE EAST</strong></h6>
                                <p><i class="fa fa-map-marker" style="padding: 0.5em;"></i>Dubai World Trade Centre</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="categories__deal__countdown">
                                        <div class="categories__deal__countdown__timer" id="countdown">
                                            <div class="cd-item">
                                            <span class="day" id="day">3</span>
                                            <p>Days</p>
                                        </div>
                                        <div class="cd-item">
                                            <span class="hour" id="hour">1</span>
                                            <p>Hours</p>
                                        </div>
                                        <div class="cd-item">
                                            <span class="minutes" id="minutes">50</span>
                                            <p>Minutes</p>
                                        </div>
                                        <div class="cd-item">
                                            <span class="secound" id="secound">18</span>
                                            <p>Seconds</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         
                         
                        <div class="col-md-6 video-icon">
                            <a href="https://www.youtube.com/watch?v=8PJ3_p7VqHw&list=RD8PJ3_p7VqHw&start_radio=1" class="video-popup">
                                <img src="{{ url('sitefolder/img/vedio.gif') }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                    </div>
                </div>
            </div>
    
    
            <div class="hero__items set-bg" data-setbg="{{ url('sitefolder/img/hero/hero-2.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>Join Us <strong>March 24-26   2022</strong></h6>
                                <h2>BIGGEST CUSTOM CARS & BIKE SHOW</h2>
                                <h6>IN <strong> THE MIDDLE EAST</strong></h6>
                                <p><i class="fa fa-map-marker" style="padding: 0.5em;"></i>Dubai World Trade Centre</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="categories__deal__countdown">
                                        <div class="categories__deal__countdown__timer" id="countdown1">
                                            <div class="cd-item">
                                                <span class="day" id="day1">3</span>
                                                <p>Days</p>
                                            </div>
                                            <div class="cd-item">
                                                <span class="hour" id="hour1">1</span>
                                                <p>Hours</p>
                                            </div>
                                            <div class="cd-item">
                                                <span class="minutes" id="minutes1">50</span>
                                                <p>Minutes</p>
                                            </div>
                                            <div class="cd-item">
                                                <span class="secound" id="secound1">18</span>
                                                <p>Seconds</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="col-md-6 video-icon">
                                    <a href="https://www.youtube.com/watch?v=8PJ3_p7VqHw&list=RD8PJ3_p7VqHw&start_radio=1" class="video-popup">
                                        <img src={{ url('sitefolder/img/vedio.gif') }}" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
      
      
            <div title="WhatsApp us" class="WhatsApp" style="display:flex;justify-content:right;align-items:center;flex-direction:row-reverse; ">
           
                <p class="ht-ctc-cta" style="padding: 0px 16px; line-height: 1.6; ; background-color: #25d366; color: #ffffff; border-radius:10px; margin:0 10px; display: none;">
                    WhatsApp us
                </p>
                
                <a href="">
                    <svg style="pointer-events:none; display:block; height:50px; width:50px;" width="50px" height="50px" viewBox="0 0 1219.547 1225.016">
        
                        <path fill="#E0E0E0" d="M1041.858 178.02C927.206 63.289 774.753.07 612.325 0 277.617 0 5.232 272.298 5.098 606.991c-.039 106.986 27.915 211.42 81.048 303.476L0 1225.016l321.898-84.406c88.689 48.368 188.547 73.855 290.166 73.896h.258.003c334.654 0 607.08-272.346 607.222-607.023.056-162.208-63.052-314.724-177.689-429.463zm-429.533 933.963h-.197c-90.578-.048-179.402-24.366-256.878-70.339l-18.438-10.93-191.021 50.083 51-186.176-12.013-19.087c-50.525-80.336-77.198-173.175-77.16-268.504.111-278.186 226.507-504.503 504.898-504.503 134.812.056 261.519 52.604 356.814 147.965 95.289 95.36 147.728 222.128 147.688 356.948-.118 278.195-226.522 504.543-504.693 504.543z"></path>
                        <linearGradient id="htwaicona-chat" gradientUnits="userSpaceOnUse" x1="609.77" y1="1190.114" x2="609.77" y2="21.084">
                            <stop offset="0" stop-color="#20b038"></stop>
                            <stop offset="1" stop-color="#60d66a"></stop>
                        </linearGradient>
        
                        <path fill="url(#htwaicona-chat)" d="M27.875 1190.114l82.211-300.18c-50.719-87.852-77.391-187.523-77.359-289.602.133-319.398 260.078-579.25 579.469-579.25 155.016.07 300.508 60.398 409.898 169.891 109.414 109.492 169.633 255.031 169.57 409.812-.133 319.406-260.094 579.281-579.445 579.281-.023 0 .016 0 0 0h-.258c-96.977-.031-192.266-24.375-276.898-70.5l-307.188 80.548z"></path>
                        <image overflow="visible" opacity=".08" width="682" height="639" transform="translate(270.984 291.372)"></image>
                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFF" d="M462.273 349.294c-11.234-24.977-23.062-25.477-33.75-25.914-8.742-.375-18.75-.352-28.742-.352-10 0-26.25 3.758-39.992 18.766-13.75 15.008-52.5 51.289-52.5 125.078 0 73.797 53.75 145.102 61.242 155.117 7.5 10 103.758 166.266 256.203 226.383 126.695 49.961 152.477 40.023 179.977 37.523s88.734-36.273 101.234-71.297c12.5-35.016 12.5-65.031 8.75-71.305-3.75-6.25-13.75-10-28.75-17.5s-88.734-43.789-102.484-48.789-23.75-7.5-33.75 7.516c-10 15-38.727 48.773-47.477 58.773-8.75 10.023-17.5 11.273-32.5 3.773-15-7.523-63.305-23.344-120.609-74.438-44.586-39.75-74.688-88.844-83.438-103.859-8.75-15-.938-23.125 6.586-30.602 6.734-6.719 15-17.508 22.5-26.266 7.484-8.758 9.984-15.008 14.984-25.008 5-10.016 2.5-18.773-1.25-26.273s-32.898-81.67-46.234-111.326z"></path>
                        <path fill="#FFF" d="M1036.898 176.091C923.562 62.677 772.859.185 612.297.114 281.43.114 12.172 269.286 12.039 600.137 12 705.896 39.633 809.13 92.156 900.13L7 1211.067l318.203-83.438c87.672 47.812 186.383 73.008 286.836 73.047h.255.003c330.812 0 600.109-269.219 600.25-600.055.055-160.343-62.328-311.108-175.649-424.53zm-424.601 923.242h-.195c-89.539-.047-177.344-24.086-253.93-69.531l-18.227-10.805-188.828 49.508 50.414-184.039-11.875-18.867c-49.945-79.414-76.312-171.188-76.273-265.422.109-274.992 223.906-498.711 499.102-498.711 133.266.055 258.516 52 352.719 146.266 94.195 94.266 146.031 219.578 145.992 352.852-.118 274.999-223.923 498.749-498.899 498.749z"></path>
                    </svg>
                </a>
            </div>


            <div onclick="openForm()" title="chat" class="chat" style="display:flex;justify-content:right;align-items:center;flex-direction:row-reverse; ">
                <p class="ht-ctc-cta " style="padding: 0px 16px; line-height: 1.6; ; background-color: black; color: #ffffff; border-radius:10px; margin:0 10px; display: none;">
                    Chat
                </p>
            <span>
            
            <!-- Generator: Adobe Illustrator 18.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
            <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
            <svg style="pointer-events:none; display:block; height:50px; width:50px;" width="50px" height="50px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	        viewBox="0 0 60 60" style="enable-background:new 0 0 60 60;" xml:space="preserve">
            <path d="M30,1.5c-16.542,0-30,12.112-30,27c0,5.205,1.647,10.246,4.768,14.604c-0.591,6.537-2.175,11.39-4.475,13.689
	        c-0.304,0.304-0.38,0.769-0.188,1.153C0.276,58.289,0.625,58.5,1,58.5c0.046,0,0.093-0.003,0.14-0.01
	        c0.405-0.057,9.813-1.412,16.617-5.338C21.622,54.711,25.738,55.5,30,55.5c16.542,0,30-12.112,30-27S46.542,1.5,30,1.5z"/>
                <g></g>
                <g></g>
                <g></g>
                <g></g>
                <g></g>
                <g></g>
                <g></g>
                <g></g>
                <g></g>
                <g></g>
                <g></g>
                <g></g>
                <g></g>
                <g></g>
                <g></g>
                </svg>
            </span>
        </div>

      

        <div class="chat-popup" id="myForm">
            <form action="/action_page.php" class="form-container">
                <h1>Chat</h1>
                <label for="msg"><b>Message</b></label>
                <textarea placeholder="Type message.." name="msg" required></textarea>
                <button type="submit" class="btn">Send</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
            </form>
        </div>
    </section>
    <!-- Hero Section End -->





    <!-- VISITOR INFORMATION Section Begin -->
    <section>
        <div class="vistiore">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center vistore-icon"><img src="{{ url('sitefolder/img/arrow-down.gif') }}" width="150px" alt=""></div>
                    <div class="col-md-12 text-center visitor-title">VISITOR INFORMATION</div>
                    <div class="col-md-6 vistor-text">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>
                                    The show not only provides premium automotive entertainment to its visitors but also serves as a B2B and B2C platform that connects suppliers and retailers of tuning and after-market products, directly with buyers and end consumers. The show is also a strategic partner of SEMA Show, USA
                                </h4>
                            </div>
                            <div class="col-md-12">
                                <div class="row icons">
                                    <div class="col-md-6">
                                        <div class="border_bottom vistore-icon-text">  <i class="fa fa-ticket icon-vistore"></i> Tickets Information</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="border_bottom vistore-icon-text">
                                            <i class="fa fa-ticket icon-vistore"></i> 
                                            Tickets Information
                                        </div>
                                    </div>
                                    <div class="col-md-6 vistore-icon-text"><i class="fa fa-street-view icon-vistore"></i> Dubai</div>
                                    <div class="col-md-6 vistore-icon-text"><i class="fa fa-calendar-check-o icon-vistore"></i> Tickets Information</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="col-md-6 vistor-carousal-background">
                        <div class="owl-carousel owl-theme vistor_carousal">
                            <div class="item"><img src="{{ url('sitefolder/img/vistor1.jpg') }}" alt=""></div>
                            <div class="item"><img src="{{ url('sitefolder/img/vistor3.jpg') }}" alt=""></div>
                            <div class="item"><img src="{{ url('sitefolder/img/vistor2.jpg') }}" alt=""></div>
                 
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="_11 text-center">
                <a href="./about.html" class="primary-btn hvr-pulse-grow hvr-icon-wobble-horizontal text-center">
                    View Community <i class="fa fa-arrow-right hvr-icon"></i>
                </a>
            </div>
        </div>
    </section>
    <!-- VISITOR INFORMATION Section end -->

    
    
    <section class="Eventt spad">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center vistore-icon"><img src="{{ url('sitefolder/img/arrow-down.gif') }}" width="150px" alt=""></div>
                <p class="col-md-12 text-center book-note ">Schedule for Event</p>
                <div class="col-md-12 text-center visitor-title ">Event Schedule</div>
                <div class="col-md-12 text-center visitor-title">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-md-6 col-sm-6">
                            <div class="Eventt-btn1 ">
                                <button class="btn hvr-wobble-horizontal"><i class="fa fa-cloud-download"></i> SPONSORSHIP</button>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-md-6 col-sm-6 t">
                            <div class="Eventt-btn2">
                                <button class="btn hvr-wobble-horizontal"><i class="fa fa-cloud-download"></i>POST SHOW REPORT 2021</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="event-body">
                <div class="row">
                    <div class="col-lg-2 col-md-4 col-sm-4">
                        <div class="row">
                            <div class="col-12-lg col-md-8 col-sm-2">
                                <div class="Eventt-btn1 ">
                                    <button class="btn1 hvr-wobble-horizontal">Day 1</button>
                                </div>
                            </div>
                            <div class="col-12-lg col-md-8 col-sm-2">
                                <div class="Eventt-btn1 ">
                                    <button class="btn2 hvr-wobble-horizontal">Day 2</button>
                                </div>
                            </div>
                            <div class="col-12-lg col-md-8 col-sm-2">
                                <div class="Eventt-btn1">
                                    <button class="btn3 hvr-wobble-horizontal">Day 3</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="col-lg-10 col-md-4 col-sm-4 col-md-4 col-sm-4">
                        <div class="box-event">
                            <div class="row">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="_p">
                                                <p class="_a">THU. 24 MARCH</p>
                                                <p class="_b">10:00 am - 10:00 pm</p>
                                                <p class="_c">to be allocated</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="padd">
                                                <div class="border-left">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-6">
                                    <p class="_d">
                                        SCHEDULE FOR EVENTEVENT SCHEDULE SCHEDULE FOR EVENT EVENT SCHEDULE SCHEDULE FOR EVEN TEVENT SCHEDULE
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section Begin -->
    
    
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center vistore-icon">
                    <img src="{{ url('sitefolder/img/arrow-down.gif') }}" width="150px" alt="">
                </div>
                <p class="col-md-12 text-center book-note ">
                    STANDARD RATE CARD
                </p>
                <div class="col-md-12 text-center visitor-title">
                    BOOK NOW
                </div>
                <div class="col-lg-12">
                    <ul class="filter__controls">
                        <li class="active mixitup-control-active hvr-grow-shadow" data-filter=".bar">
                            <span>BARE SPACE</span>
                            <p class="d-block product-nav-paragraph">BARE SPACE (36 sqm) 3 Sides Open</p>
                        </li>
                        <li data-filter=".shell" class="hvr-grow-shadow">
                            <span>SHELL SCHEME</span>
                            <p class="d-block product-nav-paragraph">BARE SPACE (36 sqm) 3 Sides Open</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row product__filter">
                <div class="hover col-lg-6 col-md-6 col-sm-6 col-md-6 col-sm-6 mix shell">
                    <div class="product__item">
                        <div class="product__item__pic set-bg hvr-book" data-setbg="{{ url('sitefolder/img/vistor1.jpg') }}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-md-6 col-sm-6 mix shell">
                    <div class="product__item">
                        <div class="product__item__pic set-bg hvr-book" data-setbg="{{ url('sitefolder/img/vistor1.jpg') }}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-md-6 col-sm-6 mix bar">
                    <div class="product__item">
                        <div class="product__item__pic set-bg hvr-book" data-setbg="{{ url('sitefolder/img/vistor2.jpg') }}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-md-6 col-sm-6 mix bar">
                    <div class="product__item">
                        <div class="product__item__pic set-bg hvr-book" data-setbg="{{ url('sitefolder/img/vistor2.jpg') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->


   <!--start Pricing-Table-->
   <div class="pricing-tabel text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center vistore-icon">
                    <img src="{{ url('sitefolder/img/arrow-down.gif') }}" width="150px" alt="">
                </div>
                <div class="col-md-12">
                    <h1 class="pricing-title" >
                        GET YOUR TICKET
                    </h1>
                </div>
            </div>
      
            <p class=" section-description ">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Ut enim veniam.
            </p>
            <div class="row">
                <div class="col-sm-6 col-md-4 hvr-float">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Small Business</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Lorem ipsum </h6>
                            <p class="card-text">$99/<span>Year</span></p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Lorem ipsum</li>
                                <li class="list-group-item">Lorem ipsum</li>
                                <li class="list-group-item">Lorem ipsum</li>
                                <li class="list-group-item">Lorem ipsum</li>
                                <li class="list-group-item">Lorem ipsum</li>
                            </ul>
                            <a href="#" class="card-link hvr-grow-shadow">buy now</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-6 col-md-4 hvr-float">
                    <div class="card corparet">
                        <div class="card-body">
                            <h5 class="card-title">Corporate</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Lorem ipsum </h6>
                            <p class="card-text">$199/<span>Year</span></p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Lorem ipsum</li>
                                <li class="list-group-item">Lorem ipsum</li>
                                <li class="list-group-item">Lorem ipsum</li>
                                <li class="list-group-item">Lorem ipsum</li>
                                <li class="list-group-item">Lorem ipsum</li>
                            </ul>
                            <a href="#" class="card-link hvr-grow-shadow">buy now</a>
                        </div>
                    </div>
                </div>
                <div class=" col-sm-6 col-md-4 hvr-float">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Enterprices</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Lorem ipsum</h6>
                            <p class="card-text">$299/<span>Year</span></p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Lorem ipsum</li>
                                <li class="list-group-item">Lorem ipsum</li>
                                <li class="list-group-item">Lorem ipsum</li>
                                <li class="list-group-item">Lorem ipsum</li>
                                <li class="list-group-item">Lorem ipsum</li>
                            </ul>
                            <a href="#" class="card-link hvr-grow-shadow">buy now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end pricing table -->

    
    <!-- Latest Blog Section Begin -->
    <section class="latest spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <div class="col-md-12 text-center vistore-icon"><img src="{{ url('sitefolder/img/arrow-down.gif') }}" width="150px" alt=""></div>                       
                        <h2 class="col-md-12 text-center latest-title">BIGGEST FESTIVALS  </h2>
                    </div>
                </div>
            </div>
            <div class="row">
            
            
                @isset($events)
                @foreach($events as $one)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item hvr-grow">
                        <div class="blog__item__pic set-bg" data-setbg="{{ $one->image }}">
                            <ul class="product__hover">
                            </ul>
                        </div>
                        <div class="blog__item__text">
                            <span><img src="{{ url('sitefolder/img/icon/calendar.png') }}" alt=""> {{ $one->created_at->format('Y/m/d h:i') }} </span>
                            <h5> {{ $one->title }} </h5>
                            <a href="{{ route('eventDetails', $one->id) }}">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach
                @endisset
       
            
            
            
            </div>
            <div class="_11 text-center">
                <a href="{{ route('events') }}" class="primary-btn hvr-pulse-grow hvr-icon-wobble-horizontal text-center">
                    View All Events  <i class="fa fa-arrow-right hvr-icon"></i>
                </a>
            </div>
        </div>
    </section>
    <!-- Latest Blog Section End -->


    <!-- Categories Section Begin -->
    <section class="categories spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="categories__hot__deal">
                        <img src="img/product-sale.png" alt="">
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1">
                    <div class="categories__deal__countdown">
                        <h2>PLATINUM Sponsor</h2>
                        <p>Rv Bin Lahej is an expert Rv maintenance and RV parts Motor home and Travel trailer dealer with a personal touch and years of experience.</p>
                        <a href="#" class="primary-btn hvr-icon-wobble-horizontal hvr-grow-shadow">
                            Take A Look  <i class="fa fa-arrow-right hvr-icon"></i>
                        </a>
                        <div class="row download_app">
                            <div class="col-md-6">
                                <a href=""><img src="{{ url('sitefolder/img/GetItOnGooglePlay.png') }}" width="186px" height="51px" alt=""></a>
                            </div>
                            <div class="col-md-6">
                                <a href=""><img src="{{ url('sitefolder/img/apple.png') }}" width="185px" height="49px" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->


    <!-- Instagram Section Begin -->
    <section class="instagram spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="instagram__pic">
                        @isset($latestPhotos)
                        @foreach($latestPhotos as $one)
                            <!--<div class="instagram__pic__item set-bg hvr-grow" data-setbg="{{ url('sitefolder/img/vistor1.jpg') }}"></div>-->
                        @endforeach
                        @endisset
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="instagram__text">
                        <h2>Gallery</h2>
                        <p class="Gallery-Text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua 2022.</p>
                        <a href="{{ route('galleries') }}" class="primary-btn hvr-grow-shadow">Show more</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Instagram Section End -->

 
 
    <!-- start why choos us -->
    <div class="choose-us">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 registeration">
                    <div class="container">
                        <h1 class="registration-title ">Registeration</h1>
                    </div>
                    <form class="form_for_regesteration">
                        <div class="container">   
                            <div class="row">
                                <div class=" col-md-4 col-sm-12">
                                    <input type="text" class="form-control" placeholder="First name">
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <input type="text" class="form-control" placeholder="Last name">
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <button type="submit" class="hvr-grow-shadow">Subsecribe</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end why chose us -->

 
    <!-- start slider blog -->
    <section class="recentNews">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center vistore-icon"><img src="{{ url('sitefolder/img/arrow-down.gif') }}" width="150px" alt=""></div>
                <p class="col-md-12 text-center recent-note ">Read The News</p>
                <div class="col-md-12 text-center recent-title">Recent Articles</div>
            </div>
            <div class="owl-carousel owl-theme blog-carousal">
            
            
                @isset($articles)
                @foreach($articles as $one)
                <div class="item">  
                    <div class="ct-blog">
                        <div class="inner">
                            <div class="fauxcrop">
                                <a href="{{ route('articleDetails', $one->id) }}"><img alt="News Entry" class="hvr-grow" src="{{ $one->image }}"></a>
                            </div>
                            <div class="ct-blog-content">
                                <div class="ct-blog-date">
                                    <span> {{ @$one->created_at->format('M') }} </span><strong> {{ @$one->created_at->format('d') }} </strong>
                                </div>
                                <h3 class="ct-blog-header">
                                    {{ @$one->title }}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endisset
            

        

            
                </div>
              </div>
          
            </div>
          </section>
        <!-- end blog slider -->





 <!-- company Section Begin -->

<!-- company Section Begin -->
<section>
    <div class="vistiore">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme company_carousal owl-loaded owl-drag ">
                        
                        @isset($ourPartners)
                        @foreach($ourPartners as $one)
                            <div class="item"><img src="{{ $one->image }}" alt=""></div>
                        @endforeach
                        @endisset


                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- company Section end -->

<!-- company Section end -->



@endsection
  