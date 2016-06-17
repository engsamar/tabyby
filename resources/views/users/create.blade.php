@extends('layout')
@section('css')
    <link href="/css/bootstrap-datepicker.css"
          rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Users / Create </h1>
    </div>
    <script src="/js/user_validation.js"></script>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('users.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('username')) has-error @endif">
                    <label for="username-field">Username</label>
                    <input type="text" id="username-field" name="username" class="form-control"
                           value="{{ old("username") }}"/>
                    <span id="error" class="help-block"></span>
                    @if($errors->has("username"))
                        <span class="help-block">{{ $errors->first("username") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('email')) has-error @endif">
                    <label for="email-field">Email</label>
                    <input type="text" id="email-field" name="email" class="form-control" value="{{ old("email") }}"/>
                    <span id="error" class="help-block"></span>
                    @if($errors->has("email"))
                        <span class="help-block">{{ $errors->first("email") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('address')) has-error @endif">
                    <label for="address-field">Address</label>
                    <input type="text" id="address-field" name="address" class="form-control"
                           value="{{ old("address") }}"/>
                    @if($errors->has("address"))
                        <span class="help-block">{{ $errors->first("address") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('telephone')) has-error @endif">
                    <label for="telephone-field">Telephone</label>
                    <input type="text" id="telephone-field" name="telephone" class="form-control"
                           value="{{ old("telephone") }}"/>
                    @if($errors->has("telephone"))
                        <span class="help-block">{{ $errors->first("telephone") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('mobile')) has-error @endif">
                    <label for="mobile-field">Mobile</label>
                    <input type="text" id="mobile-field" name="mobile" class="form-control"
                           value="{{ old("mobile") }}"/>
                    @if($errors->has("mobile"))
                        <span class="help-block">{{ $errors->first("mobile") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('password')) has-error @endif">
                    <label for="password-field">Password</label>
                    <input type="password" id="password-field" name="password" class="form-control"
                           value="{{ old("password") }}"/>
                    @if($errors->has("password"))
                        <span class="help-block">{{ $errors->first("password") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('birthdate')) has-error @endif">
                    <label for="birthdate-field">Birthdate</label>
                    <input type="date" id="birthdate-field" name="birthdate" class="form-control"
                           value="{{ old("birthdate") }}"/>
                    @if($errors->has("birthdate"))
                        <span class="help-block">{{ $errors->first("birthdate") }}</span>
                    @endif
                </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('users.index') }}"><i
                                class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>

    <script>
        $('.date-picker').datepicker({});
        console.log("hiii in ready");


    </script>
@endsection
