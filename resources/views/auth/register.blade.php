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
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/js/user_validation.js"></script>
@endsection
@section('content')
    <div class="container">
        <div class="card"></div>
        <div class="card">
            <h1 class="title">Register</h1>

            <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                {{ csrf_field() }}

                <div class="input-container{{ $errors->has('name') ? ' has-error' : '' }}">
                    <input type="text" name="username" id="name" value="{{ old('username') }}" required="required"/>
                    <label for="name" class="help-block">@lang('validation.Full Name')</label>

                    <div class="bar"></div>
                    <span id="error" class="help-block"></span>
                    @if ($errors->has('username'))
                        <span class="help-block">
        <strong>{{ $errors->first('username') }}</strong>
    </span>
                    @endif
                </div>
                <div class="input-container{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" id="email" required="required" name="email"
                           value="{{ old('email') }}"/>
                    <label for="email">@lang('validation.E-Mail Address')</label>

                    <div class="bar"></div>
                    <span id="error" class="help-block"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
        <strong>{{ $errors->first('email') }}</strong>
    </span>
                    @endif
                </div>
                <div class="input-container{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" id="password" required="required" name="password"/>
                    <label for="password">@lang('validation.Password')</label>

                    <div class="bar"></div>
                    <span class="help-block"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
        <strong>{{ $errors->first('password') }}</strong>
    </span>
                    @endif
                </div>

                <div class="input-container{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <input type="password" id="password-confirm" required="required" name="password_confirmation"/>
                    <label for="password-confirm">@lang('validation.Confirm Password')</label>

                    <div class="bar"></div>
                    <span class="help-block"></span>
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
        <strong>{{ $errors->first('password_confirmation') }}</strong>
    </span>
                    @endif
                </div>

                <div class="input-container @if($errors->has('address')) has-error @endif">
                    <input type="text" id="address-field"  name="address"
                           value="{{ old("address") }}"/>
                    <label for="address-field">@lang('validation.Address')</label>

                    <div class="bar"></div>
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
                        <input type="radio" class="radio_buttons required inline" id="gender_field" required="required" name="gender" value="0" />@lang('validation.Male')</label>
                    <label class="radio-inline">
                        <input type="radio" class="radio_buttons required inline" id="gender_field" required="required" name="gender" value="1" />@lang('validation.Female')</label>
                </div>

                <div class="input-container @if($errors->has('telephone')) has-error @endif">
                    <input type="text" id="telephone-field"  name="telephone"
                           value="{{ old("telephone") }}"/>
                    <label for="telephone-field">@lang('validation.Telephone')</label>

                    <div class="bar"></div>
                    <span class="help-block"></span>
                    @if($errors->has("telephone"))
                        <span class="help-block"><strong>{{ $errors->first("telephone") }}</strong></span>
                    @endif
                </div>


                <div class="input-container @if($errors->has('mobile')) has-error @endif">
                    <input type="text" id="mobile-field"  name="mobile" value="{{ old("mobile") }}"/>
                    <label for="mobile-field">@lang('validation.Mobile')</label>

                    <div class="bar"></div>
                    <span class="help-block"></span>
                    @if($errors->has("mobile"))
                        <span class="help-block"><strong>{{ $errors->first("mobile") }}</strong></span>
                    @endif
                </div>

                <div class="input-container @if($errors->has('birthdate')) has-error @endif" >
                    <input type="text" id="birthdate-field" required="required" name="birthdate"
                           value="{{ old("birthdate") }}" />
                    <label for="birthdate-field">@lang('validation.Birthdate')</label>


                    <div class="bar"></div>
                    <span class="help-block"></span>
                    @if($errors->has("birthdate"))
                        <span class="help-block"><strong>{{ $errors->first("birthdate") }}</strong></span>
                    @endif
                </div>
                <div class="button-container">
                    <button type="submit" id="btn" class="btn btn-primary">
                        <i class="fa fa-btn fa-user"></i> @lang('validation.Register')
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection