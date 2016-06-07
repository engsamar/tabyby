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
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css'/>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Custom Theme files -->
    <link href="css/style.css" rel='stylesheet' type='text/css'/>
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!---- start-smoth-scrolling---->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
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
</head>
<body>
<!----- start-header---->
<div id="home" class="header">
    <div class="top-header">
        <div class="container">
            <div class="logo">
                <a href="#"><img src="images/logo.png" title="doctor"/></a>
            </div>
            <!----start-top-nav---->
            <nav class="top-nav">

                <ul class="top-nav">
                    <li class="active"><a href="#home" class="scroll">Home </a></li>
                    <li><a href="#">Profile</a></li>
                    @yield('nav_bar')
                    <li><a href="#">Settings</a></li>
                    <li><a href="#contact" class="scroll">Contact</a></li>
                </ul>
                <a href="#" id="pull"><img src="images/menu-icon.png" title="menu"/></a>
            </nav>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="container">
    @yield('header')
    @yield('content')
</div>
<div id="contact" class="contact">
    <div class="map">
        {{--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1600186.2619317076!2d-102.69625001610805!3d38.43306521805143!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2sin!4v1404490159176" > </iframe>--}}
        <div class="contact-info">
            <div class="container">
                <!---- contact-grids ---->
                <div class="contact-grids">
                    <h3>contact us</h3>
                    <div class="col-md-5 contact-grid-left">
                        <h4>contact information</h4>
                        <ul>
                            <li><span class="cal"> </span><label>Monday - Friday :</label><small>9:30 AM to 6:30 PM</small></li>
                            <li><span class="pin"> </span><label>Address :</label><small>123 Some Street , London, UK, CP 123</small></li>
                            <li><span class="phone"> </span><label>Phone :</label><small>(032) 987-1235</small></li>
                            <li><span class="fax"> </span><label>Fax :</label><small>(123) 984-1234</small></li>
                            <li><span class="mail"> </span><label>Email :</label><small> info@doctor.com</small></li>
                        </ul>
                    </div>
                    <div class="col-md-7 contact-grid-right">
                        <h4>leave us a message</h4>
                        <form>
                            <input type="text" value="Name:" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name:';}">
                            <input type="text" value="Email:" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email:';}">
                            <input type="text" value="Phone No:" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Phone No:';}">
                            <textarea rows="2" cols="70" onfocus="if(this.value == 'Message:') this.value='';" onblur="if(this.value == '') this.value='Message:';">Message:</textarea>
                            <input type="submit" value="SEND MESSAGE" />
                        </form>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <!---- contact-grids ---->
            </div>
        </div>
    </div>
</div>
</body>
</html>