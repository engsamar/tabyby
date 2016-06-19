<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@lang('validation.EyeCareClinic')</title>
    <!-- Stylesheets -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/rev-settings.css" rel="stylesheet">
    <link href="/css/stylee.css" rel="stylesheet">
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link href="/css/responsive.css" rel="stylesheet">
    <!-- Date Picker -->
    {{--<link rel="stylesheet" href="/plugins/datepicker/datepicker3.css">--}}
    <!-- Daterange picker -->
    {{--<link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker-bs3.css">--}}
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    @yield('css')
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->


</head>

<body>
<div class="page-wrapper">
    <!--Preloader Box-->
    <div class="preloader"></div>

    <!-- Header Start -->
    <header class="main-header">
        <!-- Top Bar -->


        <!-- Nav Container -->
        <div class="nav-container">

            <div class="auto-box">
                <div class="row clearfix">
                    <!-- Logo -->
                    <div class="col-md-3 col-sm-3 col-xs-6 logo"><a href="/"><img class="img-responsive"
                                                                                  src="/images/logo.png" alt=""></a>
                    </div>
                    <!-- Main Menu -->
                    <nav class="col-md-9 col-sm-9 col-xs-12 main-menu">
                        <ul>
                            <li class="current"><a href="/">@lang('validation.Home')</a></li>
                            <li><a href="/blog">@lang('validation.Blog')</a></li>

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
                                        <a href="/reservations/today">@lang('validation.Control Panel')
                                        </a>
                                    </li>
                                @else
                                    <li class="dropdown">
                                        <a class="dropdown-toggle"
                                           data-toggle="dropdown">@lang('validation.Reservation')
                                            <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="/reservations/create">@lang('validation.Add Reservation')</a>
                                            </li>
                                            <li><a href="/patientReservation">@lang('validation.View Reservation')</a>
                                            </li>
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
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    @lang('validation.'. Config::get('languages')[App::getLocale()])

                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @foreach (Config::get('languages') as $lang => $language)
                                        @if ($lang != App::getLocale())
                                            <li>
                                                <a href="{{ route('lang.switch', $lang) }}">@lang('validation.'.$language)</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="/contact">@lang('validation.ContactUs')</a>
                            </li>
                        </ul>
                    </nav>

                    <!-- Toggle icon -->
                    <div class="toggle-icon"></div>

                    <!-- Mobile Menu -->
                    <nav class="mobile-menu" id="alter-nav">
                        <div class="nav-box">
                            <ul>
                                <li class="current"><a href="/">Home</a>
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
                                </li>
                            </ul>
                        </div>
                    </nav>

                </div>
            </div>

        </div>
        <!-- Nav Container End -->
    </header>
    @yield('header')
    @yield('content')
            <!-- Main Footer -->
    {{--<footer class="main-footer">--}}
    {{--<!-- Bottom -->--}}
    {{--<div class="bottom">--}}
    {{--<div class="auto-box">@lang('validation.Copyright') 2015 by EyeCareClinicITI | @lang('validation.All rights reserved')</div>--}}
    {{--</div>--}}

    {{--</footer>--}}

</div>
<!--End pagewrapper-->

<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/bxslider.js"></script>
<script src="/js/jquery.appear.js"></script>
<script src="/js/script.js"></script>
<script src="/js/jquery-ui.min.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- daterangepicker -->
<script src="/js/moment.min.js"></script>
@yield('scripts')
</body>
</html>
