@extends('adminLayout')
@section('css')
<link href="/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
<div class="page-header">
  <h1><i class="glyphicon glyphicon-plus"></i> WorkingHours / Create </h1>
</div>
<meta name="_token" content="{!! csrf_token() !!}"/>
@endsection

@section('content')
@include('error')

<div class="row">
  <div class="col-md-12">

    <form action="{{ route('working_hours.store') }}" method="POST">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <div class="form-group @if($errors->has('fromTime')) has-error @endif">
       <label for="fromTime-field">From</label>
       <input type="time" id="fromTime-field" name="fromTime" class="form-control" value="{{ $time}}"/>
       @if($errors->has("fromTime"))
       <span  class="help-block">{{ $errors->first("fromTime") }}</span>
       @endif
     </div>
     <div class="form-group @if($errors->has('toTime')) has-error @endif">
       <label for="toTime-field">To</label>
       <input type="time" id="toTime-field" name="toTime" class="form-control" value="{{ $time }}"/>
       <span id="error" class="help-block"></span>
       @if($errors->has("toTime"))
       <span class="help-block">{{ $errors->first("toTime") }}</span>
       @endif
     </div>
     <div class="form-group @if($errors->has('day')) has-error @endif">
       <label for="day-field">Day</label>
       {{--<input type="text" id="day-field" name="day" class="form-control" value="{{ old("day") }}"/>--}}
       <select id="day-field" name="day" class="form-control">
       @foreach($day as $key=>$value)
       <option value={{ $value }}>{{ $value }}</option>
       @endforeach
       </select>
       <span id="error" class="help-block"></span>
       @if($errors->has("day"))
       <span class="help-block">{{ $errors->first("day") }}</span>
       @endif
     </div>
     <div class="form-group @if($errors->has('clinic_id')) has-error @endif">
       <input type="hidden" id="clinic_id-field" name="clinic_id" class="form-control" value="{{ $clinic_id }}"/>
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
