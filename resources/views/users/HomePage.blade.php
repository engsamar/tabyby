<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Eyes' Clinic</title>
    <!-- Stylesheets -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/rev-settings.css" rel="stylesheet">
    <link href="/css/stylee.css" rel="stylesheet">
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link href="/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <script>
        var myCenter = new google.maps.LatLng(30.740812, 31.256629);
        var marker;

        function initialize() {
            var mapProp = {
                center: myCenter,
                zoom: 10,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

            var marker = new google.maps.Marker({
                position: myCenter,
                animation: google.maps.Animation.BOUNCE
            });

            marker.setMap(map);
        }

        google.maps.event.addDomListener(window, 'load', initialize);
        $(function () {
            var pull = $('#pull');
            menu = $('nav ul');
            menuHeight = menu.height();
            $(pull).on('click', function (e) {
                e.preventDefault();
                menu.slideToggle();
            });
            $(window).resize(function () {
                var w = $(window).width();
                if (w > 320 && menu.is(':hidden')) {
                    menu.removeAttr('style');
                }
            });
        });
    </script>
</head>

<body>
<div class="page-wrapper">
    <!--Preloader Box-->
    <div class="preloader"></div>

    <!-- Header Start -->
    <header class="main-header">
        <!-- Top Bar -->
        <div class="top-bar">
            <div class="auto-box">
                <div class="row clearfix">

                    <div class="cont-info col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        Do You Have Any Questions? Call Us  <span>+49 123 456 789</span>  Or Send An Email <a href="mailto:support@email.com">support@email.com</a>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right">
                        Opening Hours : <span>Monday to Saturday - 8am to 9pm</span>   Contact : <span>+1-800-654-3210</span>
                    </div>

                </div>
            </div>
        </div>

        <!-- Nav Container -->
        <div class="nav-container">

            <div class="auto-box">
                <div class="row clearfix">
                    <!-- Logo -->
                    <div class="col-md-3 col-sm-3 col-xs-6 logo"><a href="#"><img class="img-responsive" src="/images/logo.png" alt=""></a></div>
                    <!-- Main Menu -->
                    <nav class="col-md-9 col-sm-9 col-xs-12 main-menu">
                        <ul>
                            <li class="current"><a href="#">Home</a></li>
                            <li>
                                <a class="dropdown-toggle" data-toggle="dropdown">@lang('validation.Details')
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#about" class="scroll">@lang('validation.About us')
                                        </a></li>
                                    <li><a href="#team" class="scroll">@lang('validation.our team')
                                        </a></li>
                                    <li><a href="#services" class="scroll">@lang('validation.our services')
                                        </a></li>
                                    <li><a href="#contact" class="scroll">
                                            @lang('validation.contact')
                                        </a></li>
                                </ul>
                            </li>
                            @if(!Auth::user())

                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown">@lang('validation.login')
                                        <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/register">
                                                @lang('validation.register')
                                            </a></li>
                                        <li><a href="/login">
                                                @lang('validation.login')
                                            </a></li>
                                    </ul>
                                </li>
                            @else
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown">@lang('validation.Messages')
                                        <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('messages') }}">
                                                @lang('validation.Messages')
                                            </a></li>
                                        <li><a href="{{ route('messages.create') }}">
                                                + @lang('validation.New Message')
                                            </a></li>
                                    </ul>
                                </li>
                                @if(Auth::user()->userRoles[0]->type==0 || Auth::user()->userRoles[0]->type==1)
                                    <li class="dropdown">
                                        <a href="/chooseClinic">@lang('validation.Control Panel')
                                        </a>
                                    </li>
                                @else
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown">@lang('validation.Reservation')
                                            <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="/reservations/create">@lang('validation.Add Reservation')</a></li>
                                            <li><a href="/patientReservation">@lang('validation.View Reservation')</a></li>
                                        </ul>
                                    </li>
                                @endif
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->username }}
                                        <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/users/{{Auth::user()->id}}">
                                                @lang('validation.Profile')
                                            </a></li>
                                        <li><a href="/users/{{Auth::user()->id}}/edit">
                                                @lang('validation.Edit Profile')
                                            </a></li>

                                        <li><a href="/logout">
                                                @lang('validation.logout')</a></li>
                                    </ul>
                                </li>
                                @endif
                                <li><a href="contact-us.html">Contact Us</a>
                                    <ul class="sub-menu">
                                        <li><a href="contact-us-2.html">Contact Us 2</a></li>
                                    </ul>
                                </li>
                        </ul>
                    </nav>

                    <!-- Toggle icon -->
                    <div class="toggle-icon"></div>

                    <!-- Mobile Menu -->
                    <nav class="mobile-menu" id="alter-nav">
                        <div class="nav-box">
                            <ul>
                                <li class="current"><a href="index-2.html">Home</a>
                                    <span class="toggle-icon"></span>
                                    <ul class="sub-menu">
                                        <li><a href="index-2.html">Home One</a></li>
                                        <li><a href="index-3.html">Home Two</a></li>
                                        <li><a href="index-4.html">Home Three</a></li>
                                    </ul>
                                </li>
                                <li><a href="features.html">Features</a></li>
                                <li><a href="about-us.html">About us</a>
                                    <span class="toggle-icon"></span>
                                    <ul class="sub-menu">
                                        <li><a href="our-team.html">Our Team</a></li>
                                        <li><a href="our-doctors.html">Our Doctors</a></li>
                                    </ul>
                                </li>
                                <li><a href="services.html">Services</a>
                                    <span class="toggle-icon"></span>
                                    <ul class="sub-menu">
                                        <li><a href="services.html">Dental Implants</a></li>
                                        <li><a href="services.html">Medical Research</a></li>
                                        <li><a href="services.html">Medical Counseling</a></li>
                                        <li><a href="services.html">Pharmaceutical Advice</a></li>
                                        <li><a href="services.html">Blood Bank</a></li>
                                    </ul>
                                </li>
                                <li><a href="blog.html">News</a>
                                    <span class="toggle-icon"></span>
                                    <ul class="sub-menu">
                                        <li><a href="blog-detail.html">Single News</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact-us.html">Contact Us</a>
                                    <span class="toggle-icon"></span>
                                    <ul class="sub-menu">
                                        <li><a href="contact-us-2.html">Contact Us 2</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>

                </div>
            </div>

        </div>
        <!-- Nav Container End -->
    </header>
    <!-- END Header -->

    <!-- Main Slider -->
    <section class="main-slider-wrapper">
        <div class="tp-banner-container">
            <div class="tp-banner">
                <ul>
                    <li data-transition="fade" data-slotamount="10" data-masterspeed="1500">
                        <img src="/resource/male-doctor-2.jpg" alt="slide 4">
                        <div class="caption lfb stb"
                             data-x="left"
                             data-y="top"
                             data-hoffset="15"
                             data-voffset="220"
                             data-speed="700"
                             data-start="600"
                             data-easing="easeOutExpo">
                            <h4>EXCELLENT HEALLTH CARE SERVICES</h4>
                        </div>
                        <div class="caption lfb stb"
                             data-x="left"
                             data-y="top"
                             data-hoffset="15"
                             data-voffset="270"
                             data-speed="700"
                             data-start="1100"
                             data-easing="easeOutExpo">
                            <h2>WE TOTALLY CARE ABOUT EVERYONE</h2>
                        </div>
                        <div class="caption lfl stl"
                             data-x="left"
                             data-y="top"
                             data-hoffset="15"
                             data-voffset="340"
                             data-speed="700"
                             data-start="1800"
                             data-easing="easeOutExpo">
                            <h5>We also work very closely with our Community Healthcare Team who <br>provide antenatal, postnatal and nursing services and other specialist provision<br> such as the Quitters scheme.</h5>
                        </div>
                        <div class="caption lfb stb"
                             data-x="left"
                             data-y="top"
                             data-hoffset="15"
                             data-voffset="460"
                             data-speed="700"
                             data-start="2500"
                             data-easing="easeOutExpo">
                            <a href="#" class="btn-theme"><span class="icon flaticon-angle2"></span> &ensp; GET IN TOUCH</a>
                        </div>
                    </li>

                    <li data-transition="fade" data-slotamount="10" data-masterspeed="1500"> <img src="/resource/doctor-patient.jpg" alt="slide 4">
                        <div class="caption lfb stb"
                             data-x="center"
                             data-y="top"
                             data-hoffset="0"
                             data-voffset="220"
                             data-speed="700"
                             data-start="600"
                             data-easing="easeOutExpo">
                            <h4>EXCELLENT HEALLTH CARE SERVICES</h4>
                        </div>
                        <div class="caption lfb stb"
                             data-x="center"
                             data-y="top"
                             data-hoffset="0"
                             data-voffset="270"
                             data-speed="700"
                             data-start="1100"
                             data-easing="easeOutExpo">
                            <h2>WE TOTALLY CARE ABOUT EVERYONE</h2>
                        </div>
                        <div class="caption lfb stb"
                             data-x="center"
                             data-y="top"
                             data-hoffset="0"
                             data-voffset="340"
                             data-speed="700"
                             data-start="1800"
                             data-easing="easeOutExpo">
                            <h5 class="text-center">We also work very closely with our Community Healthcare Team who provide antenatal, postnatal and nursing services <br>and other specialist provision such as the Quitters scheme.</h5>
                        </div>

                        <div class="caption lfl stl"
                             data-x="center"
                             data-y="top"
                             data-hoffset="-100"
                             data-voffset="460"
                             data-speed="700"
                             data-start="2500"
                             data-easing="easeOutExpo"><a href="#" class="btn-theme left"><span class="icon flaticon-angle2"></span> &ensp; GET IN TOUCH</a>
                        </div>

                        <div class="caption lfr str"
                             data-x="center"
                             data-y="top"
                             data-hoffset="100"
                             data-voffset="460"
                             data-speed="700"
                             data-start="2500"
                             data-easing="easeOutExpo"><a href="#" class="btn-theme right">MAKE APPOINTMENT</a>
                        </div>

                    </li>

                    <li data-transition="fade" data-slotamount="10" data-masterspeed="1500"> <img src="/resource/family-doctor-fm.jpg" alt="slide 4">
                        <div class="caption lfb stb"
                             data-x="right"
                             data-y="top"
                             data-hoffset="-15"
                             data-voffset="220"
                             data-speed="700"
                             data-start="600"
                             data-easing="easeOutExpo">
                            <h4>EXCELLENT HEALLTH CARE SERVICES</h4>
                        </div>
                        <div class="caption lfb stb"
                             data-x="right"
                             data-y="top"
                             data-hoffset="-15"
                             data-voffset="270"
                             data-speed="700"
                             data-start="1100"
                             data-easing="easeOutExpo">
                            <h2>WE TOTALLY CARE ABOUT EVERYONE</h2>
                        </div>
                        <div class="caption lfr str"
                             data-x="right"
                             data-y="top"
                             data-hoffset="-15"
                             data-voffset="340"
                             data-speed="700"
                             data-start="1800"
                             data-easing="easeOutExpo">
                            <h5 class="text-right">We also work very closely with our Community Healthcare Team who <br>provide antenatal, postnatal and nursing services and other specialist provision<br> such as the Quitters scheme.</h5>
                        </div>
                        <div class="caption lfb stb"
                             data-x="right"
                             data-y="top"
                             data-hoffset="-15"
                             data-voffset="460"
                             data-speed="700"
                             data-start="2500"
                             data-easing="easeOutExpo"><a href="#" class="btn-theme"><span class="icon flaticon-angle2"></span> &ensp; GET IN TOUCH</a> </div>
                    </li>
                </ul><!-- end ul -->
            </div><!-- end tp-banner -->
        </div><!-- end banner-container -->
    </section>

    <!-- Services -->
        <!-- How We Help -->
        <!-- Combo Section -->
    <section class="combo">
        <div class="auto-box">
            <div class="row clearfix">

                <!-- Departments -->
                <div class="departments col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <h2 class="border-line-left">Why choose us?</h2>
                    <!-- Accordion box / Style Two-->
                    <div class="accordion-box style-two">

                        <!-- Accordion -->
                        <article class="accordion animated out" data-delay="0" data-animation="fadeInUp">
                            <div class="acc-btn active"><span class="toggle-icon"></span> We work clean and try to help everyone </div>
                            <div class="acc-content clearfix collapsed">
                                <p>Our teams are up to date with the latest technologies, media trends and are keen to prove themselves in this industry and that’s what you want from an advertising agency.</p>
                            </div>
                        </article>
                        <!-- Accordion -->
                        <article class="accordion animated out" data-delay="0" data-animation="fadeInUp">
                            <div class="acc-btn"><span class="toggle-icon"></span> Our teams work together to heal people</div>
                            <div class="acc-content clearfix">
                                <p>Our teams are up to date with the latest technologies, media trends and are keen to prove themselves in this industry and that’s what you want from an advertising agency.</p>
                            </div>
                        </article>
                        <!-- Accordion -->
                        <article class="accordion animated out" data-delay="0" data-animation="fadeInUp">
                            <div class="acc-btn"><span class="toggle-icon"></span> We try to work for young, old and teens</div>
                            <div class="acc-content clearfix">
                                <p>Our teams are up to date with the latest technologies, media trends and are keen to prove themselves in this industry and that’s what you want from an advertising agency.</p>
                            </div>
                        </article>

                    </div>
                </div>

                <!-- Our Services -->
                <div class="our-services col-lg-4 col-md-4 col-sm-6 col-xs-12 animated out" data-delay="100" data-animation="fadeInUp">
                    <h2 class="border-line-left">Awesome Features</h2>
                    <!-- Square Listing -->
                    <ul class="square-listing anim-3-all">
                        <li><a href="#">Health &amp; Medical Care</a></li>
                        <li><a href="#">Medical Treatment</a></li>
                        <li><a href="#">Emergency Help</a></li>
                        <li><a href="#">Rehabilation Therapy</a></li>
                        <li><a href="#">Medical Counseling</a></li>
                    </ul>
                </div>

                <!-- Work Hours -->
                <div class="work-hours col-lg-4 col-md-4 col-sm-12 col-xs-12 animated out" data-delay="200" data-animation="fadeInUp">
                    <h2 class="border-line-left">Opening Hours</h2>
                    <div class="accordion-box style-two">
                    <article class="accordion animated out" data-delay="0" data-animation="fadeInUp">
                        <div class="acc-btn active"><span class="toggle-icon"></span> We work clean and try to help everyone </div>
                        <div class="acc-content clearfix collapsed">
                            <div class="day clearfix">
                                <span class="day-title pull-left">Monday</span><span class="day-timing pull-right">8:00 AM - 6:00 PM</span>
                            </div>
                            <div class="day clearfix">
                                <span class="day-title pull-left">Tuesday</span><span class="day-timing pull-right">8:00 AM - 6:30 PM</span>
                            </div>
                            <div class="day clearfix">
                                <span class="day-title pull-left">Wednesday</span><span class="day-timing pull-right">8:00 AM - 6:00 PM</span>
                            </div>
                            <div class="day clearfix">
                                <span class="day-title pull-left">Thursday</span><span class="day-timing pull-right">10:00 AM - 8:00 PM</span>
                            </div>
                            <div class="day clearfix">
                                <span class="day-title pull-left">Friday</span><span class="day-timing pull-right">8:00 AM - 12:00 AM</span>
                            </div>
                        </div>
                    </article>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- Client Testimonials -->
    <section class="client-testimonials margin-50">
        <div class="auto-box">
            <h1 class="border-line-center">What our patients said</h1>

            <div class="slider">
                <article class="slide">
                    <figure><img class="img-circle" src="/resource/testimonial-image-1.png" alt=""></figure>
                    <div class="text">"Our teams are up to date with the latest technologies, media trends and are keen to prove themselves in this industry and that’s what you want from an advertising agency, not someone who is relying on the same way of doing things."</div>
                </article>
                <article class="slide">
                    <figure><img class="img-circle" src="/resource/testimonial-image-2.png" alt=""></figure>
                    <div class="text">"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s."</div>
                </article>
                <article class="slide">
                    <figure><img class="img-circle" src="/resource/team-2.jpg" alt=""></figure>
                    <div class="text">"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters."</div>
                </article>
            </div>

        </div>
    </section>

    <!-- Meet The Team -->
    <section class="meet-the-team">
        <div class="auto-box">
            <h1 class="border-line-center text-center">Meet our doctor</h1>
            <div class="row clearfix">

                <!-- Member -->
                <article class="member col-lg-3 col-md-3 col-sm-6 col-xs-12 animated out" data-delay="0" data-animation="fadeInUp">
                    <figure><img src="/resource/team-1.jpg" alt=""><a class="overlay" href="about-us.html"></a></figure>
                    <div class="member-info">
                        <h4>Dr. Jack Johnson</h4>
                        <h5><a href="#">Rehabilitation Therapy</a></h5>
                    </div>
                    <ul class="social clearfix anim-3-all">
                        <li class="hvr-ripple-out"><a href="#"><span class="flaticon-facebook31"></span></a></li>
                        <li class="hvr-ripple-out"><a href="#"><span class="flaticon-twitter1"></span></a></li>
                        <li class="hvr-ripple-out"><a href="#"><span class="flaticon-google116"></span></a></li>
                        <li class="hvr-ripple-out"><a href="#"><span class="flaticon-instagram12"></span></a></li>
                    </ul>
                </article>

                <!-- Member -->
                <article class="member col-lg-3 col-md-3 col-sm-6 col-xs-12 animated out" data-delay="150" data-animation="fadeInUp">
                    <figure><img src="/resource/team-2.jpg" alt=""><a class="overlay" href="about-us.html"></a></figure>
                    <div class="member-info">
                        <h4>Dr. Vanessa Smouic</h4>
                        <h5><a href="#">Cardiac Clinic</a></h5>
                    </div>
                    <ul class="social clearfix anim-3-all">
                        <li class="hvr-ripple-out"><a href="#"><span class="flaticon-facebook31"></span></a></li>
                        <li class="hvr-ripple-out"><a href="#"><span class="flaticon-twitter1"></span></a></li>
                        <li class="hvr-ripple-out"><a href="#"><span class="flaticon-google116"></span></a></li>
                        <li class="hvr-ripple-out"><a href="#"><span class="flaticon-instagram12"></span></a></li>
                    </ul>
                </article>

                <!-- Member -->
                <article class="member col-lg-3 col-md-3 col-sm-6 col-xs-12 animated out" data-delay="300" data-animation="fadeInUp">
                    <figure><img src="/resource/team-3.jpg" alt=""><a class="overlay" href="about-us.html"></a></figure>
                    <div class="member-info">
                        <h4>Dr. Yvonne Cadiline</h4>
                        <h5><a href="#">Pediatric Clinic</a></h5>
                    </div>
                    <ul class="social clearfix anim-3-all">
                        <li class="hvr-ripple-out"><a href="#"><span class="flaticon-facebook31"></span></a></li>
                        <li class="hvr-ripple-out"><a href="#"><span class="flaticon-twitter1"></span></a></li>
                        <li class="hvr-ripple-out"><a href="#"><span class="flaticon-google116"></span></a></li>
                        <li class="hvr-ripple-out"><a href="#"><span class="flaticon-instagram12"></span></a></li>
                    </ul>
                </article>

                <!-- Member -->
                <article class="member col-lg-3 col-md-3 col-sm-6 col-xs-12 animated out" data-delay="450" data-animation="fadeInUp">
                    <figure><img src="/resource/team-4.jpg" alt=""><a class="overlay" href="about-us.html"></a></figure>
                    <div class="member-info">
                        <h4>Dr. David Gresshoff</h4>
                        <h5><a href="#">Laryngological Clinic</a></h5>
                    </div>
                    <ul class="social clearfix anim-3-all">
                        <li class="hvr-ripple-out"><a href="#"><span class="flaticon-facebook31"></span></a></li>
                        <li class="hvr-ripple-out"><a href="#"><span class="flaticon-twitter1"></span></a></li>
                        <li class="hvr-ripple-out"><a href="#"><span class="flaticon-google116"></span></a></li>
                        <li class="hvr-ripple-out"><a href="#"><span class="flaticon-instagram12"></span></a></li>
                    </ul>
                </article>

            </div>
        </div>
    </section>

    <!-- Latest Blog -->
    <section class="latest-blog">
        <div class="auto-box">
            <h1 class="border-line-center">Latest from the Blog</h1>
            <div class="row clearfix">

                <!-- Post -->
                <article class="blog-post col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="image">
                        <img class="img-responsive" src="/resource/blog-post-image-1.jpg" alt="">
                        <div class="caption">
                            <div class="date"><span class="day">18</span><span class="month">Jan</span></div>
                            <div class="comments"><span class="flaticon-speech18"></span> &ensp; 23</div>
                        </div>
                        <a href="blog-detail.html" class="overlay"></a>
                    </div>
                    <h2><a href="#">Experimental monitoring</a></h2>
                    <div class="desc"><p>We have the skills and resources to create professional films. Whether you want a corporate promotional film or a record of a conference we can provide the services you require.</p></div>
                    <div class="more text-right"><a href="blog-detail.html">READ MORE &ensp; <span class="glyphicon glyphicon-arrow-right"></span></a></div>
                </article>

                <!-- Post -->
                <article class="blog-post col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="image">
                        <img class="img-responsive" src="/resource/blog-post-image-2.jpg" alt="">
                        <div class="caption">
                            <div class="date"><span class="day">14</span><span class="month">Jan</span></div>
                            <div class="comments"><span class="flaticon-speech18"></span> &ensp; 42</div>
                        </div>
                        <a href="blog-detail.html" class="overlay"></a>
                    </div>
                    <h2><a href="#">Helping students and kids</a></h2>
                    <div class="desc"><p>We have a team of writers who specialise in writing end of year reports to highlight the successes of your business and the forecast for the next year, which both current and potential.</p></div>
                    <div class="more text-right"><a href="blog-detail.html">READ MORE &ensp; <span class="glyphicon glyphicon-arrow-right"></span></a></div>
                </article>

                <!-- Post -->
                <article class="blog-post col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="image">
                        <img class="img-responsive" src="/resource/blog-post-image-3.jpg" alt="">
                        <div class="caption">
                            <div class="date"><span class="day">12</span><span class="month">Jan</span></div>
                            <div class="comments"><span class="flaticon-speech18"></span> &ensp; 11</div>
                        </div>
                        <a href="blog-detail.html" class="overlay"></a>
                    </div>
                    <h2><a href="#">Medical health on patients</a></h2>
                    <div class="desc"><p>We have the skills and resources to create professional films. Whether you want a corporate promotional film or a record of a conference we can provide the services you require.</p></div>
                    <div class="more text-right"><a href="blog-detail.html">READ MORE &ensp; <span class="glyphicon glyphicon-arrow-right"></span></a></div>
                </article>

            </div>
        </div>
    </section>

    <!-- Visit Us -->
    <section class="visit-us">
        <div class="auto-box">
            <div class="row">

            </div>
        </div>
    </section>

    <!-- Client Logos -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- upper -->
        <div class="upper anim-3-all">

            <div class="auto-box">
                <div class="row clearfix">

                    <!-- About -->
                    <article class="foot-block about col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="widget widget-about">
                            <h2 class="border-line-left">About Medicon</h2>
                            <div class="text ">We work with clients big and small across a range of sectors and we utilise all forms of media to get your name out there in a way that’s right for you. We believe that analysis of your company.</div>
                        </div>
                    </article>

                    <!-- Services -->
                    <article class="foot-block col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="widget widget-services">
                            <h2 class="border-line-left">Our Services</h2>
                            <ul class="square-listing">
                                <li><a href="#">Health &amp; Medical Care</a></li>
                                <li><a href="#">Cardio Monitoring</a></li>
                                <li><a href="#">Medical Treatment</a></li>
                                <li><a href="#">Emergency Help</a></li>
                                <li><a href="#">Rehabilation Therapy</a></li>
                            </ul>
                        </div>
                    </article>

                    <!-- Twitter Feeds -->
                    <article class="foot-block twitter-feeds col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="widget widget-twitter-feeds">
                            <h2 class="border-line-left">Twitter Feeds</h2>
                            <div class="feed">
                                <p><a href="#">@medicon</a> We try to help all people, young, old...</p>
                                <span class="time"># 2 hours ago</span>
                            </div>
                            <div class="feed">
                                <p><a href="#">@medicon</a> Building up a new department for medical des...</p>
                                <span class="time"># 3 hours ago</span>
                            </div>
                        </div>
                    </article>

                    <!-- Contact Info -->
                    <article class="foot-block cont-info col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="widget widget-contact">
                            <h2 class="border-line-left">Contact Us</h2>
                            <ul>
                                <li class="location">47 Sixth Ave San Francisco, CA</li>
                                <li class="website"><a href="http://www.medicon.com/">http://www.medicon.com</a></li>
                                <li class="phone">+49 123 456 798</li>
                                <li class="mail"><a href="mailto:support@email.com">support@email.com</a></li>
                            </ul>
                        </div>
                    </article>

                </div>
            </div>

        </div>

        <!-- Bottom -->
        <div class="bottom"><div class="auto-box">Copyright 2015 by Medicon | All rights reserved</div></div>

    </footer>

</div>
<!--End pagewrapper-->

<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/bxslider.js"></script>
<script src="/js/revolution.min.js"></script>
<script src="/js/rev-slider.js"></script>
<script src="/js/jquery.appear.js"></script>
<script src="/js/script.js"></script>
</body>
</html>
