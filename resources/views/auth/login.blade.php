@extends('homeViewLayout')
@section('css')
    <link rel="stylesheet" href="css/loginRegisteration/reset.css">
    <link rel='stylesheet prefetch'
          href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="css/loginRegisteration/style.css">
@endsection
@section('scripts')
    <script src='js/loginRegisteration/jquery-1.11.2.min.js'></script>
    <script src="js/loginRegisteration/index.js"></script>
@endsection
@section('content')
    <div class="container">
        <div class="card"></div>
        <div class="card">
            <h1 class="title">Login</h1>
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <div class="input-container{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                           required="required">
                    <label for="email">@lang('validation.E-Mail Address')</label>
                    <div class="bar"></div>
                    <span class="help-block"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="input-container{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" type="password" class="form-control" name="password" required="required">
                    <label for="password">@lang('validation.Password')</label>
                    <div class="bar"></div>
                    <span class="help-block"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="button-container">
                    <button type="submit" id="btn">
                        <i class="fa fa-btn fa-sign-in" >@lang('validation.Login')</i></button>
                </div>
                <div class="footer"><a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your
                        Password?</a></div>
            </form>
        </div>
        <div class="card alt">
        </div>
    </div>
@endsection
