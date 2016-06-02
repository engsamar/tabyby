@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> PrescriptionDetails / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('prescription_details.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('medicine_name')) has-error @endif">
                       <label for="medicine_name-field">Medicine_name</label>
                    <input type="text" id="medicine_name-field" name="medicine_name" class="form-control" value="{{ old("medicine_name") }}"/>
                       @if($errors->has("medicine_name"))
                        <span class="help-block">{{ $errors->first("medicine_name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('no_times')) has-error @endif">
                       <label for="no_times-field">No_times</label>
                    <input type="text" id="no_times-field" name="no_times" class="form-control" value="{{ old("no_times") }}"/>
                       @if($errors->has("no_times"))
                        <span class="help-block">{{ $errors->first("no_times") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('quantity')) has-error @endif">
                       <label for="quantity-field">Quantity</label>
                    <input type="text" id="quantity-field" name="quantity" class="form-control" value="{{ old("quantity") }}"/>
                       @if($errors->has("quantity"))
                        <span class="help-block">{{ $errors->first("quantity") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('duration')) has-error @endif">
                       <label for="duration-field">Duration</label>
                    <input type="text" id="duration-field" name="duration" class="form-control" value="{{ old("duration") }}"/>
                       @if($errors->has("duration"))
                        <span class="help-block">{{ $errors->first("duration") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('preception_id')) has-error @endif">
                       <label for="preception_id-field">Preception_id</label>
                    <input type="text" id="preception_id-field" name="preception_id" class="form-control" value="{{ old("preception_id") }}"/>
                       @if($errors->has("preception_id"))
                        <span class="help-block">{{ $errors->first("preception_id") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('prescription_details.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
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
