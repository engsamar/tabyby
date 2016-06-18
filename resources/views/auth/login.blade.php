@extends('homeViewLayout')
@section('css')
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/form-elements.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/assets/ico/apple-touch-icon-57-precomposed.png">
@endsection
@section('scripts')
    <script src="/assets/js/jquery-1.11.1.min.js"></script>
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/js/scripts.js"></script>
@endsection
@section('content')
    <div class="container">
        <div class="form-box col-sm-6" style="left:25%">
            <div class="form-top">
                <div class="form-top-left">
                    <h3>@lang('validation.login')</h3>
                    <p>@lang('validation.Enter email and password to log on:')</p>
                </div>
                <div class="form-top-right">
                    <i class="fa fa-key"></i>
                </div>
            </div>
            <div class="form-bottom">
                <form role="form" action="{{ url('/login') }}" method="POST" class="login-form">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="sr-only" for="email">@lang('validation.email')</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="@lang('validation.email')..." class="form-email form-control" required="required" id="form-email">
                        @if ($errors->has('email'))
                            <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="sr-only" for="password">@lang('validation.Password')</label>
                        <input type="password" name="password" placeholder="@lang('validation.Password')..." class="form-password form-control" id="form-password" required="required">
                        @if ($errors->has('password'))
                            <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <button type="submit" class="btn">@lang('validation.Login')</button>
                    <div class="footer"><a class="btn btn-link" href="{{ url('/password/reset') }}">@lang('validation.Forgot Your Password?')</a></div>
                </form>
            </div>
        </div>
    </div>
@endsection
