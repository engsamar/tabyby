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
                                <li><a href="/register" >Register</a></li>
                                <li><a href="/login" >LogIn</a></li>
                                @else
                                @if($userRoleType==0)
                                <li><a href="/doctorHome" >Home</a></li>
                                <li><a href="/reservations">Reservations</a></li>
                                <li><a href="#">secretary</a></li>

                                @elseif ($userRoleType==1) 
                                <li><a href="/secretaryHome" >Home</a></li>
                                <li><a href="/reservations" >Reservations</a></li>
                                <li><a href="#" >AddClinic</a></li>
                                <li><a href="#" >MedicalHistory</a></li>
                                @else 
                                <li><a href="/patientHome" >Home</a></li>
                                <li><a href="/reservation/{{Auth::user()->id}}" >Medical History</a></li>
                                <li><a href="{{ route('reservations.create') }}"> New Reservation</a></li>

                                @endif
                                <li><a href="#">Settings</a></li>
                                <li><a href="/logout" >Logout</a></li>
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