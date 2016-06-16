@extends('layout')
@section('css')
  <link href="/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Consistitues / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('consistitues.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('active_consistitue')) has-error @endif">
                       <label for="active_consistitue-field">Active_consistitue</label>
                    <input type="text" id="active_consistitue-field" name="active_consistitue" class="form-control" value="{{ old("active_consistitue") }}"/>
                       @if($errors->has("active_consistitue"))
                        <span class="help-block">{{ $errors->first("active_consistitue") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('consistitues.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('.date-picker').datepicker({
    });
  </script>
@endsection
