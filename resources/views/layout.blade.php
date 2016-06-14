<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/jquery-ui.css">

    <script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript"  src="/js/bootstrap.min.js"></script>
    <script type="text/javascript"  src="/js/jquery-ui.min.js"></script>
    <script type="text/javascript"  src="/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript"  src="/js/app.js"></script>
    <script type="text/javascript"  src="/js/site.js"></script>
    <script>
      $(function() {
        $( ".datepicker" ).datepicker();
    });
</script>

@yield('css')
</head>

<body>

    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/doctorHome">Home</a></li>
                <li><a href="/clinics">Cinic Info</a></li>
                <li><a href="/latest">latestReservation</a></li>
                <li><a href="/reservations">Reserved Patient</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->username }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                    </ul>
                </li>
                @endif


                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        {{ Config::get('languages')[App::getLocale()] }}
                    </a>
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
        </div><!--/.nav-collapse -->


    </div>
</nav>

<div class="container">
    @yield('header')
    @yield('content')
</div><!-- /.container -->
@yield('scripts')
<script>

</script>
</body>
</html>
