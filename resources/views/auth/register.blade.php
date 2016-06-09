@extends('homeViewLayout')
@section('scripts')

    <script src="/js/user_validation.js"></script>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="username"
                                           value="{{ old('username') }}" required>
                                    <span id="error" class="help-block"></span>
                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" required>
                                    <span id="error" class="help-block"></span>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                    <span class="help-block"></span>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required>
                                    <span class="help-block"></span>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group @if($errors->has('address')) has-error @endif">
                                <label for="address-field" class="col-md-4 control-label">Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="address-field" name="address" class="form-control"
                                           value="{{ old("address") }}"/>
                                    @if($errors->has("address"))
                                        <span class="help-block"><strong>
                                                {{ $errors->first("address") }}
                                            </strong>
                         </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group @if($errors->has('telephone')) has-error @endif">
                                <label for="telephone-field" class="col-md-4 control-label">Telephone</label>
                                <div class="col-md-6">
                                    <input type="text" id="telephone-field" name="telephone" class="form-control"
                                           value="{{ old("telephone") }}"/>
                                    @if($errors->has("telephone"))
                                        <span class="help-block"><strong>{{ $errors->first("telephone") }}</strong></span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group @if($errors->has('mobile')) has-error @endif">
                                <label for="mobile-field" class="col-md-4 control-label">Mobile</label>
                                <div class="col-md-6">
                                    <input type="text" id="mobile-field" name="mobile" class="form-control"
                                           value="{{ old("mobile") }}"/>
                                    @if($errors->has("mobile"))
                                        <span class="help-block"><strong>{{ $errors->first("mobile") }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group @if($errors->has('birthdate')) has-error @endif">
                                <label for="birthdate-field" class="col-md-4 control-label">Birthdate</label>
                                <div class="col-md-6">
                                    <input type="date" id="birthdate-field" name="birthdate" class="form-control"
                                           value="{{ old("birthdate") }}"/>
                                    <span class="help-block"></span>
                                    @if($errors->has("birthdate"))
                                        <span class="help-block"><strong>{{ $errors->first("birthdate") }}</strong></span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i> Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
