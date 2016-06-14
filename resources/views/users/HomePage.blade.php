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
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
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
                <a href="/"><img src="/images/logooo.png" title="doctor"/></a>
            </div>
            <!----start-top-nav---->
            <nav class="top-nav">
                <ul class="top-nav">
                    <li class="dropdown">
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
                            <a class="dropdown-toggle" data-toggle="dropdown">@lang('validation.register')
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
                        @if($userRoleType==0)
                            <li class="dropdown">
                                <a href="/chooseClinic">@lang('validation.Control Panel')
                                    </a>
                            </li>
                        @elseif ($userRoleType==1)
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown">@lang('validation.Reservation')
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/reservations/create">@lang('validation.Add Reservation')</a></li>
                                    <li><a href="/reservations">@lang('validation.View Reservation')</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown">@lang('validation.Control Panel')
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/clinics">@lang('validation.Clinic')</a></li>
                                    <li><a href="/vacations">@lang('validation.Vacations')</a></li>
                                    <li><a href="/reservations">@lang('validation.Reservation')</a></li>

                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown">
                                    @lang('validation.Medical History')
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/user_profiles/{{Auth::user()->id}}">
                                            @lang('validation.Medical History')
                                        </a></li>
                                </ul>
                            </li>
                        @else
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown">
                                    hhh@lang('validation.Medical History')
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/user_profiles/{{Auth::user()->id}}">
                                            @lang('validation.Medical History')
                                        </a></li>
                                </ul>
                            </li>
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
            <img src="images/slider2.jpg" alt="">
            <div class="caption">
            </div>
        </li>
        <li>
            <img src="images/slider2.jpg" alt="">
            <div class="caption">

            </div>
        </li>
        <li>
            <img src="images/slider2.jpg" alt="">
            <div class="caption">
                <div class="slide-text-info">
                    {{--<h1>providing</h1>--}}
                    {{--<label>highquality service for men & women</label>--}}
                    {{--<a class="slide-btn" href="#">learn more</a>--}}
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
            <h2>Clinics</h2>
            <p></p>
        </div>
        <!---- About-grids ---->
        <div class="about-grids">
            @foreach($clinics as $clinic)
                <div class="col-md-6">
                    <div class="about-grid">
                        <img src="images/img1.jpg" title="name"/>
                        <span class="t-icon1"></span>
                        <div class="about-grid-info text-center">
                            <h3><a href="#">{{ $clinic->name }}</a></h3>
                            <h3>{{ $clinic->telephone }}</h3>
                            <h3>{{ $clinic->address }}</h3>
                            <?php
                            //                        die($clinic->workingHours[0]->id);
                            ?>

                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s,
                                when an unknown printer.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    {{--<div class="container ">--}}
                        <div id="googleMap" style="width:700px;height:400px;"></div>
                    {{--</div>--}}
                </div>
            @endforeach

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

                            {{--</select>--}}
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


<script src="{{ asset('/js/all.js') }}" type="text/javascript"></script>
@if(Auth::check())
    <script src="//js.pusher.com/2.2/pusher.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        var pusher = new Pusher('{{Config::get('pusher.appKey')}}');
        var channel = pusher.subscribe('for_user_{{Auth::id()}}');
        channel.bind('new_message', function (data) {
            var thread = $('#' + data.div_id);
            var thread_id = data.thread_id;
            var thread_plain_text = data.text;

            if (thread.length) {
                // add new message to thread
                thread.append(data.html);

                // make sure the thread is set to read
                $.ajax({
                    url: "/messages/" + thread_id + "/read"
                });
            } else {
                var message = '<p>' + data.sender_name + ' said: ' + data.text + '</p><p><a href="' + data.thread_url + '">View Message</a></p>';

                // notify the user
                $.growl.notice({title: data.thread_subject, message: message});

                // set unread count
                $.ajax({
                    url: "{{route('messages.unread')}}"
                }).success(function (data) {
                    var div = $('#unread_messages');

                    var count = data.msg_count;
                    if (count == 0) {
                        $(div).addClass('hidden');
                    } else {
                        $(div).text(count).removeClass('hidden');

                        // if on messages.index - add alert class and update latest message
                        $('#thread_list_' + thread_id).addClass('alert-info');
                        $('#thread_list_' + thread_id + '_text').html(thread_plain_text);
                    }
                });
            }
        });
    </script>
@endif

</body>
</html>

