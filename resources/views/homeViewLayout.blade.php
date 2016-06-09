<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
    <head>
        <title>Doctor Website Template | Home :: w3layouts</title>
        <link href="/css/bootstrap.css" rel='stylesheet' type='text/css'/>
        <link rel="stylesheet" href="/css/jquery-ui.css">
        <script src="/js/jquery.min.js"></script>
        <script src="/js/app.js"></script>
        <link href="/css/style.css" rel='stylesheet' type='text/css'/>
        <link href="/css/homes.css" rel='stylesheet' type='text/css'/>
        <script type="text/javascript"  src="/js/site.js"></script>
        <script type="text/javascript"  src="/js/bootstrap.min.js"></script>
        <script type="text/javascript"  src="/js/jquery-ui.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="application/x-javascript"> addEventListener("load", function () {
        setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
        window.scrollTo(0, 1);
        } </script>
        <!---- start-smoth-scrolling---->
        <script type="text/javascript" src="/js/move-top.js"></script>
        <script type="text/javascript" src="/js/easing.js"></script>
        <script type="text/javascript">
        jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
        event.preventDefault();
        $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
        });
        });
        </script>
        <!---- start-smoth-scrolling---->
        <!----webfonts--->
        {{--<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>--}}
        {{--<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>--}}
        <!---//webfonts--->
        <!----start-top-nav-script---->
        <script>
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
        <!----//End-top-nav-script---->
        @yield('css')
    </head>
    <body>
        <!----- start-header---->
        <div id="home" class="header">
            <div class="top-header">
                <div class="container">
                    <div class="logo">
                        <a href="/"><img src="/images/logo.png" title="doctor"/></a>
                    </div>
                    <!----start-top-nav---->
                    <nav class="top-nav">
                        <ul class="top-nav">
                            @if(!Auth::user())
                            <li><a href="/register" >@lang('validation.register')</a></li>
                            <li><a href="/login" >@lang('validation.login')</a></li>
                            @else
                            @if($userRoleType==0)
                            <li><a href="/doctorHome" >@lang('validation.home')</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle"  data-toggle="dropdown">@lang('validation.Reservation')
                                    <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/reservations/create">
                                            @lang('validation.Add Reservation')
                                        </a></li>
                                        <li><a href="/reservations">
                                            @lang('validation.View Reservation')
                                        </a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle"  data-toggle="dropdown">@lang('validation.Secretary')
                                        <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="/secertaries/create">
                                                
                                                @lang('validation.Add Secretary')
                                            </a></li>
                                            <li><a href="/secertaries">
                                                
                                                @lang('validation.View Secretary')
                                            </a></li>
                                        </ul>
                                    </li>
                                    @elseif ($userRoleType==1)
                                    <li><a href="/secretaryHome" >@lang('validation.home')</a></li>
                                    <li class="dropdown">
                                        <a class="dropdown-toggle"  data-toggle="dropdown">@lang('validation.Reservation')
                                            <span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="/reservations/create">@lang('validation.Add Reservation')</a></li>
                                                <li><a href="/reservations">@lang('validation.View Reservation')</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="/clinics/create" >@lang('validation.AddClinic')</a></li>
                                        <li><a href="#" >@lang('validation.MedicalHistory')</a></li>
                                        @else
                                        <li class="dropdown">
                                            <a class="dropdown-toggle"  data-toggle="dropdown">
                                            @lang('validation.Your Information')
                                                <span class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="/patientHome">@lang('validation.home')</a></li>
                                                    <li><a href="/reservation/{{Auth::user()->id}}" >
                                                        @lang('validation. Medical History')
                                                   </a></li>
                                                </ul>
                                            </li>
                                            
                                            <li class="dropdown">
                                                <a class="dropdown-toggle"  data-toggle="dropdown">@lang('validation.Reservation')
                                                    <span class="caret"></span></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="/reservations/create">@lang('validation.Add Reservation')</a></li>
                                                        <li><a href="/patient/{{Auth::user()->id}}">@lang('validation.View Reservation')</a></li>
                                                    </ul>
                                                </li>
                                                @endif
                                                <li class="dropdown">
                                                    <a class="dropdown-toggle"  data-toggle="dropdown">@lang('validation.Settings')
                                                        <span class="caret"></span></a>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="/users/{{Auth::user()->id}}/edit" >
                                                                @lang('validation.Edit Profile')
                                                            </a></li>
                                                            <li><a href="/logout" >
                                                             @lang('validation.logout')</a></li>
                                                        </ul>
                                                    </li>
                                                    @endif
                                                </ul>
                                                <a href="#" id="pull"><img src="/images/menu-icon.png" title="menu"/></a>
                                            </nav>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    @yield('header')
                                    <div class="container">
                                        <div id="wrapper">
                                            <div class="row">
                                                @yield('content')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @yield('scripts')
                            </div>
                        </div>
                    </body>
                </html>