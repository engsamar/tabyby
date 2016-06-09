<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
    <title>Eyes' Clinic</title>
    <link href="/css/bootstrap.css" rel='stylesheet' type='text/css'/>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/js/jquery.min.js"></script>
    <!-- Custom Theme files -->
    <script type="text/javascript"  src="/js/bootstrap.min.js"></script>
    <link href="/css/homes.css" rel='stylesheet' type='text/css'/>
    <link href="/css/style.css" rel='stylesheet' type='text/css'/>
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!---- start-smoth-scrolling---->
    <script type="text/javascript" src="/js/move-top.js"></script>
    <script type="text/javascript" src="/js/app.js"></script>
    <script type="text/javascript" src="/js/easing.js"></script>
    <script
            src="http://maps.googleapis.com/maps/api/js?key=AIzaSyD31ckr4GKqf6WcWU8WfIqwTj8zS3BtZZo">
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
            });
        });
    </script>
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
            <!----//End-top-nav-script---->
        </head>
        <body>
            <!----- start-header---->
            <div id="home" class="header">
                <div class="top-header">
                    <div class="container">
                        <div class="logo">
                            <a href="#"><img src="/images/logo.png" title="doctor"/></a>
                        </div>
                        <!----start-top-nav---->
                        <nav class="top-nav">
                            <ul class="top-nav">
                                <li><a href="#about" class="scroll"> @lang('validation.About us')</a></li>
                                <li><a href="#services" class="scroll">@lang('validation.our services')</a></li>
                                <li><a href="#team" class="scroll">@lang('validation.our team')</a></li>
                                <li><a href="#contact" class="scroll">@lang('validation.contact')</a></li>
                                @if(!Auth::user())
                                <li><a href="/register" >@lang('validation.register')</a></li>
                                <li><a href="/login" >@lang('validation.login')</a></li>
                                @else
                                @if($userRoleType==0)
                                <li><a href="/doctorHome" >@lang('validation.home')</a></li>

                                @elseif ($userRoleType==1) 
                                <li><a href="/secretaryHome" >@lang('validation.home')</a></li>
                                @else  
                                <li><a href="/patientHome" >@lang('validation.home')</a></li>

                                @endif
                                <li><a href="/logout" >@lang('validation.logout')</a></li>
                                @endif

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        {{ Config::get('languages')[App::getLocale()] }}
                                    
                                    <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        @foreach (Config::get('languages') as $lang => $language)
                                        @if ($lang != App::getLocale())
                                        <li>
                                            <a href="{{ route('lang.switch', $lang) }}">{{$language}}</a>
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </li>

                            </ul>
                            <a href="#" id="pull"><img src="/images/menu-icon.png" title="menu"/></a>
                        </nav>
                        <div class="clearfix"></div>
                    </div>
                </div>

</div>
<!----- //End-header---->
<!----start-slider-script---->
<script src="js/responsiveslides.min.js"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
        // Slideshow 4
        $("#slider4").responsiveSlides({
            auto: true,
            pager: true,
            nav: true,
            speed: 500,
            namespace: "callbacks",
            before: function () {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function () {
                $('.events').append("<li>after event fired.</li>");
            }
        });

    });
</script>
<!----//End-slider-script---->
<!-- Slideshow 4 -->
<div id="top" class="callbacks_container">
    <ul class="rslides" id="slider4">
        <li>
            <img src="images/slide1.jpg" alt="">
            <div class="caption">
                <div class="slide-text-info">
                    <h1>providing</h1>
                    <label>highquality service for men & women</label>
                    <a class="slide-btn" href="#">learn more</a>
                </div>
            </div>
        </li>
        <li>
            <img src="images/slide1.jpg" alt="">
            <div class="caption">
                <div class="slide-text-info">
                    <h1>providing</h1>
                    <label>highquality service for men & women</label>
                    <a class="slide-btn" href="#">learn more</a>
                </div>
            </div>
        </li>
        <li>
            <img src="images/slide1.jpg" alt="">
            <div class="caption">
                <div class="slide-text-info">
                    <h1>providing</h1>
                    <label>highquality service for men & women</label>
                    <a class="slide-btn" href="#">learn more</a>
                </div>
            </div>
        </li>
    </ul>
</div>
<div class="clearfix"></div>
<!----- //End-slider---->
<!---- about ---->
<div id="about" class="about">
    <div class="container">
        <div class="header about-header text-center">
            <h2>about us</h2>
            <p></p>
        </div>
        <!---- About-grids ---->
        <div class="about-grids">
            <div class="col-md-4">
                <div class="about-grid">
                    <img src="images/img1.jpg" title="name"/>
                    <span class="t-icon1"> </span>
                    <div class="about-grid-info text-center">
                        <h3><a href="#">Children's specialist</a></h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="about-grid n-about-grid n-about-grid1">
                    <img src="images/img2.jpg" title="name"/>
                    <span class="t-icon1"> </span>
                    <div class="about-grid-info text-center">
                        <h3><a href="#">Women's specialist</a></h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="about-grid n-about-grid n-about-grid2">
                    <img src="images/img3.jpg" title="name"/>
                    <span class="t-icon2"> </span>
                    <div class="about-grid-info text-center">
                        <h3><a href="#">men's specialist</a></h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer.</p>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!---- About-grids ---->
    </div>

</div>
        <!--- teammember-grids ---->
        <div class="team-member-grids">
            <div class="team-member-grid">
                <img src="images/t1.jpg" title="name"/>
                <div class="team-member-info bottom-t-info">
                    <span> </span>
                    <h3><a href="#">Dr. Keith M. Weiner, M.D.</a></h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry. when an unknown
                        printer took a galley of type Lorem Ipsum is simply dummy text.is
                        simply dummy text..is simply
                        dummy text.</p>
                </div>
            </div>
            <div class="team-member-grid">
                <div class="team-member-info bottom-t-info bottom-t-info-b">
                    <span> </span>
                    <h3><a href="#">Dr. Danielle, M.D.</a></h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry. when an unknown
                        printer took a galley of type Lorem Ipsum is simply dummy text.is
                        simply dummy text..is simply
                        dummy text..is simply dummy text.</p>
                </div>
                <img src="images/t2.jpg" title="name"/>
            </div>
            <div class="team-member-grid">
                <img src="images/t3.jpg" title="name"/>
                <div class="team-member-info bottom-t-info">
                    <span> </span>
                    <h3><a href="#">Dr. Joseph, M.D.</a></h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry. when an unknown
                        printer took a galley of type Lorem Ipsum is simply dummy text.is
                        simply dummy text..is simply
                        dummy text.</p>
                </div>
            </div>
            <div class="team-member-grid">
                <div class="team-member-info bottom-t-info bottom-t-info-b">
                    <span> </span>
                    <h3><a href="#">Dr. Caitlin, M.D.</a></h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry. when an unknown
                        printer took a galley of type Lorem Ipsum is simply dummy text.is
                        simply dummy text..is simply
                        dummy text..is simply dummy text.</p>
                </div>
                <img src="images/t4.jpg" title="name"/>
            </div>
            <div class="team-member-grid">
                <img src="images/t5.jpg" title="name"/>
                <div class="team-member-info bottom-t-info">
                    <span> </span>
                    <h3><a href="#">Dr. Michael, M.D.</a></h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry. when an unknown
                        printer took a galley of type Lorem Ipsum is simply dummy text.is
                        simply dummy text..is simply
                        dummy text.</p>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!---//teammember-grids ---->
    </div>
</div>
<!--- team --->
<div class="container ">
    <div id="googleMap" style="width:700px;height:400px;"></div>
</div>
<!---- contact ---->
<div id="contact" class="contact">
    <div class="map">
        <div class="contact-info">
            <div class="container">
                <!---- contact-grids ---->
                <div class="contact-grids">
                    <h3>contact us</h3>
                    <div class="col-md-5 contact-grid-left">
                        <h4>contact information</h4>
                        <ul>
                            <select id="clinic_id" name="clinic_id" class="form-control">
                                <option>Select Clinic Name</option>
                                @foreach($clinics as $clinic)
                                    <option value={{ $clinic->id }}>{{ $clinic->name }}</option>
                                @endforeach
                            </select>
                            <li><span class="cal"> </span><label id="day"
                                                                 name="day"></label>
                                <small id="fromTime" name="fromTime">00:00</small>
                                to
                                <small id="toTime" name="toTime">00:00</small>
                            </li>
                            </select>
                            <li><span class="pin"> </span><label>Address :</label>
                                <small>{{ $userRole->user->address }}</small>
                            </li>
                            <li><span class="phone"> </span><label>Phone :</label>
                                <small>{{ $userRole->user->telephone }}</small>
                            </li>
                            <li><span class="mail"> </span><label>Email :</label>
                                <small>{{ $userRole->user->email }}</small>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-7 contact-grid-right">
                        <h4>leave us a message</h4>
                        <form>
                            <input type="text" value="Name:" onfocus="this.value = '';"
                                   onblur="if (this.value == '') {this.value = 'Name:';}">
                            <input type="text" value="Email:" onfocus="this.value = '';"
                                   onblur="if (this.value == '') {this.value = 'Email:';}">
                            <input type="text" value="Phone No:" onfocus="this.value = '';"
                                   onblur="if (this.value == '') {this.value = 'Phone No:';}">
                        <textarea rows="2" cols="70" onfocus="if(this.value == 'Message:') this.value='';"
                                  onblur="if(this.value == '') this.value='Message:';">Message:</textarea>
                            <input type="submit" value="SEND MESSAGE"/>
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!---- contact-grids ---->
            </div>
        </div>
    </div>
</div>
<!---- contact ---->
<div class="clearfix"></div>
<!--- copy-right ---->
<div class="copy-right">
    <div class="container">
        <div class="copy-right-left">
            <p>Template by <a href="http://w3layouts.com/">W3layouts</a></p>
            <script type="text/javascript">
                $(document).ready(function () {
                    /*
                     var defaults = {
                     containerID: 'toTop', // fading element id
                     containerHoverID: 'toTopHover', // fading element hover id
                     scrollSpeed: 1200,
                     easingType: 'linear'
                     };
                     */

                    $().UItoTop({easingType: 'easeOutQuart'});

                });
            </script>
            <a href="#" id="toTop" style="display: block;"> <span id="toTopHover"
                                                                  style="opacity: 1;"> </span></a>
        </div>
        <div class="copy-right-right">
            <ul>
                <li><a class="facebook" href="#"><span> </span></a></li>
                <li><a class="twitter" href="#"><span> </span></a></li>
                <li><a class="skype" href="#"><span> </span></a></li>
                <div class="clearfix"></div>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!--- copy-right ---->
</body>
</html>

