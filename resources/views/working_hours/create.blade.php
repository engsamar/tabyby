@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> WorkingHours / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('working_hours.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('from')) has-error @endif">
                       <label for="from-field">From</label>
                    <input type="text" id="from-field" name="from" class="form-control" value="{{ old("from") }}"/>
                       @if($errors->has("from"))
                        <span class="help-block">{{ $errors->first("from") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('to')) has-error @endif">
                       <label for="to-field">To</label>
                    <input type="text" id="to-field" name="to" class="form-control" value="{{ old("to") }}"/>
                       @if($errors->has("to"))
                        <span class="help-block">{{ $errors->first("to") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('day')) has-error @endif">
                       <label for="day-field">Day</label>
                    <input type="date" id="day-field" name="day" class="form-control" value="{{ old("day") }}"/>
                        {{--<select multiple id="type-field" name="type" class="form-control">--}}
                            {{--@foreach($day as $key=>$value)--}}
                                {{--<option value={{ $key }}>{{ $value }}</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                        @if($errors->has("day"))
                        <span class="help-block">{{ $errors->first("day") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('clinic_id')) has-error @endif">
                       <label for="clinic_id-field">Clinic_name</label>
                    <input type="text" id="clinic_id-field" name="clinic_id" class="form-control" value="{{ old("clinic_id") }}"/>
                       @if($errors->has("clinic_id"))
                        <span class="help-block">{{ $errors->first("clinic_id") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('working_hours.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
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
