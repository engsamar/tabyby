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
        <a href="/"><img src="/images/logooo.png" title="doctor"/></a>
    </div>
    <!----start-top-nav---->
                        <nav class="top-nav">
        <ul class="top-nav">
        <li class="dropdown">
        <ul class="dropdown-menu">
            <li><a href="#about" class="scroll" >@lang('validation.About us')
            </a></li>
            <li><a href="#team" class="scroll" >@lang('validation.our team')
            </a></li>
            <li><a href="#services" class="scroll" >@lang('validation.our services')
            </a></li>
            <li><a href="#contact" class="scroll" >
                @lang('validation.contact')
            </a></li>
        </ul>
    </li>
    @if(!Auth::user())
    
    <li class="dropdown">
    <a class="dropdown-toggle"  data-toggle="dropdown">@lang('validation.login')
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
        <a class="dropdown-toggle"  data-toggle="dropdown">@lang('validation.Messages')
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
            <a href="/reservations">@lang('validation.Control Panel')
          </a>
        </li> 
        @else     
        <li class="dropdown">
        <a class="dropdown-toggle"  data-toggle="dropdown">@lang('validation.Reservation')
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="/reservations/create">@lang('validation.Add Reservation')</a></li>
                <li><a href="/patientReservation">@lang('validation.View Reservation')</a></li>
            </ul>
        </li>
        @endif
        <li class="dropdown">
            <a class="dropdown-toggle"  data-toggle="dropdown">{{ Auth::user()->username }}
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                <li><a href="/users/{{Auth::user()->id}}" >
                    @lang('validation.Profile')
                </a></li>
                <li><a href="/users/{{Auth::user()->id}}/edit" >
                    @lang('validation.Edit Profile')
                </a></li>

                <li><a href="/logout" >
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
         <script src="{{ asset('/js/all.js') }}" type="text/javascript"></script>
    @if(Auth::check())
        <script src="//js.pusher.com/2.2/pusher.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            var pusher = new Pusher('{{Config::get('pusher.appKey')}}');
            var channel = pusher.subscribe('for_user_{{Auth::id()}}');
            channel.bind('new_message', function(data) {
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
                    $.growl.notice({ title: data.thread_subject, message: message });

                    // set unread count
                    $.ajax({
                        url: "{{route('messages.unread')}}"
                    }).success(function( data ) {
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