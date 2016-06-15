@extends('layout')
@section('css')
    <link href="/css/bootstrap-datepicker.css"
          rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> UserRoles / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">


            <form action="{{ route('user_roles.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group @if($errors->has('name')) has-error @endif">
                <label for="name-field">Patient Name</label>
                <input list="searchResult" type="text" id="name-field" name="name" class="form-control" value="{{ old("name") }}"/>
                <datalist id="searchResult">
                    
                </datalist>
               
                @if($errors->has("name"))
                <span class="help-block">{{ $errors->first("name") }}</span>
                @endif
            </div>
                <div class="form-group @if($errors->has('type')) has-error @endif">
                    <label for="type-field">Type</label>
                    {{--<input type="text" id="type-field" name="type" class="form-control" value="{{ old("type") }}"/>--}}
                    <select id="type-field" name="type" class="form-control">
                        @foreach($role as $key=>$value)
                            <option value={{ $key }}>{{ $value }}</option>
                        @endforeach
                    </select>
                    @if($errors->has("type"))
                        <span class="help-block">{{ $errors->first("type") }}</span>
                    @endif
                </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('user_roles.index') }}"><i
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
    </script>
@endsection
