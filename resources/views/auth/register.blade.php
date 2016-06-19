@extends('homeViewLayout')
@section('css')
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/form-elements.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/css/jquery-ui.css">  <!--date-->
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
    <script src="/js/jquery-ui.min.js"></script> <!--date-->
    {{--<script src="/js/bootstrap-datepicker.js"></script>--}}
    <script src="/js/user_validation.js"></script>
@endsection
@section('content')

    <div class="container">
        <div class="col-sm-6" style="left:25%">

            <div class="form-box">
                <div class="form-top">
                    <div class="form-top-left">
                        <h3>@lang('validation.Sign up')</h3>
                        <p>@lang('validation.Fill in the form below to get instant access:')</p>
                    </div>
                    <div class="form-top-right">
                        <i class="fa fa-pencil"></i>
                    </div>
                </div>
                <div class="form-bottom">
                    <form role="form" action="{{ url('/register') }}" method="POST" class="registration-form">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="sr-only" for="username">@lang('validation.Full Name')</label>
                            <input type="text" id="name" name="username" value="{{ old('username') }}"
                                   required="required" placeholder="@lang('validation.Full Name')..."
                                   class="form-first-name form-control">
                            <span class="help-block"></span>
                            @if ($errors->has('username'))
                                <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="sr-only" for="email">@lang('validation.E-Mail Address')</label>
                            <input type="email" name="email" placeholder="@lang('validation.E-Mail Address')..."
                                   class="form-email form-control" id="email" required="required">
                            <span class="help-block"></span>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="sr-only" for="password">@lang('validation.Password')</label>
                            <input type="password" id="password" placeholder="@lang('validation.Password')" required="required" name="password"/>
                            <span class="help-block"></span>
                            @if ($errors->has('password'))
                                <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="sr-only" for="password-confirm">@lang('validation.Confirm Password')</label>
                            <input type="password" id="password-confirm" required="required" placeholder="@lang('validation.Confirm Password')"
                                   name="password_confirmation"/>
                            <span class="help-block"></span>
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group @if($errors->has('address')) has-error @endif">
                            <label class="sr-only" for="address-field">@lang('validation.Address')</label>
                            <input type="text" id="address-field" placeholder="@lang('validation.Address')" name="address"
                                   value="{{ old("address") }}"/>
                            <span class="help-block"></span>
                            @if($errors->has("address"))
                                <span class="help-block"><strong>
                                        {{ $errors->first("address") }}
                                    </strong>
                            </span>
                            @endif
                        </div>


                        <div id="rdio" class="form-group radio_buttons @if($errors->has('gender')) has-error @endif">
                            <label class="control-label" for="gender-field">@lang('validation.Gender')</label>
                            <label class="radio-inline">
                                <input type="radio" class="radio_buttons required inline" id="gender_field"
                                       required="required" name="gender" value="0"/>@lang('validation.Male')</label>
                            <label class="radio-inline">
                                <input type="radio" class="radio_buttons required inline" id="gender_field"
                                       required="required" name="gender" value="1"/>@lang('validation.Female')</label>
                        </div>

                        <div class="form-group @if($errors->has('telephone')) has-error @endif">
                            <label class="sr-only" for="telephone-field">@lang('validation.Telephone')</label>
                            <input type="text" id="telephone-field" placeholder="@lang('validation.Telephone')" name="telephone"
                                   value="{{ old("telephone") }}"/>
                            <span class="help-block"></span>
                            @if($errors->has("telephone"))
                                <span class="help-block"><strong>{{ $errors->first("telephone") }}</strong></span>
                            @endif
                        </div>


                        <div class="form-group @if($errors->has('mobile')) has-error @endif">
                            <label class="sr-only" for="mobile-field">@lang('validation.Mobile')</label>
                            <input type="text" id="mobile-field" placeholder="@lang('validation.Mobile')" name="mobile" value="{{ old("mobile") }}"/>
                            <span class="help-block"></span>
                            @if($errors->has("mobile"))
                                <span class="help-block"><strong>{{ $errors->first("mobile") }}</strong></span>
                            @endif
                        </div>
                {{--/       ////////////////--}}
                        <div class=" form-group @if($errors->has('birthdate')) has-error @endif">
                            <label class="sr-only" for="birthdate-field">@lang('validation.Birthdate')</label>
                            <input  type="text" id="birthdate-field" placeholder="@lang('validation.Birthdate')" required="required" name="birthdate"
                                   value="{{ old("birthdate") }}" />
                            <span class="help-block"></span>
                            @if($errors->has("birthdate"))
                                <span class="help-block"><strong>{{ $errors->first("birthdate") }}</strong></span>
                            @endif
                        </div>

                        <button type="submit" class="btn">@lang('validation.Sign up')</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection