@extends('layout')
@section('css')
  <link href="/css/bootstrap-datepicker.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/jquery-ui.css">
@endsection
@section('content')

    @include('error')

    <div class="row">
        <div class="col-md-12">
            <h1><i class="glyphicon glyphicon-edit"></i> Users / Edit #{{$user->id}}</h1>
            <hr>
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('username')) has-error @endif">
                       <label for="username-field">Username</label>
                    <input type="text" id="username-field" name="username" class="form-control" value="{{ $user->username }}" required/>
                    <span id="error" class="help-block"></span>
                       @if($errors->has("username"))
                        <span class="help-block">{{ $errors->first("username") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('email')) has-error @endif">
                       <label for="email-field">Email</label>
                    <input type="text" id="email-field" name="email" class="form-control" value="{{ $user->email }}" required/>
                        <span id="error" class="help-block"></span>
                       @if($errors->has("email"))
                        <span class="help-block">{{ $errors->first("email") }}</span>
                       @endif
                    </div>

                    <div hidden class="form-group @if($errors->has('password')) has-error @endif">
                       <label for="password-field">Password</label>
                    <input type="text" id="password-field" name="password" class="form-control" value="{{ $user->password }}"/>
                       @if($errors->has("password"))
                        <span class="help-block">{{ $errors->first("password") }}</span>
                       @endif
                    </div>


                    <div class="form-group @if($errors->has('address')) has-error @endif">
                       <label for="address-field">Address</label>
                    <input type="text" id="address-field" name="address" class="form-control" value="{{ $user->address }}"/>
                       @if($errors->has("address"))
                        <span class="help-block">{{ $errors->first("address") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('telephone')) has-error @endif">
                       <label for="telephone-field">Telephone</label>
                    <input type="text" id="telephone-field" name="telephone" class="form-control" value="{{ $user->telephone }}"/>
                       @if($errors->has("telephone"))
                        <span class="help-block">{{ $errors->first("telephone") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('mobile')) has-error @endif">
                       <label for="mobile-field">Mobile</label>
                    <input type="text" id="mobile-field" name="mobile" class="form-control" value="{{ $user->mobile }}"/>
                       @if($errors->has("mobile"))
                        <span class="help-block">{{ $errors->first("mobile") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('birthdate')) has-error @endif">
                       <label for="birthdate-field">Birthdate</label>
                    <input type="text" id="birthdate-field" name="birthdate" class="form-control datepicker" value="{{ $user->birthdate }}" required/>
                       @if($errors->has("birthdate"))
                        <span class="help-block">{{ $errors->first("birthdate") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('users.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
  {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>--}}
  <script src="/js/user_validation.js"></script>
  <script src="/js/jquery-ui.min.js"></script>
@endsection
