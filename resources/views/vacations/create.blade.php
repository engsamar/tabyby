@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Vacations / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('vacations.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('from_day')) has-error @endif">
                       <label for="from_day-field">From_day</label>
                    <input type="text" id="from" name="from" class="form-control date-picker" value="{{ old("from_day") }}"/>
                       @if($errors->has("from_day"))
                        <span class="help-block">{{ $errors->first("from_day") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('to_day')) has-error @endif">
                       <label for="to_day-field">To_day</label>
                    <input type="text" id="to" name="to" class="form-control date-picker" value="{{ old("to_day") }}"/>
                       @if($errors->has("to_day"))
                        <span class="help-block">{{ $errors->first("to_day") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('vacations.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    var dateToday = new Date();
    var dates = $("#from , #to").datepicker({
      // defaultDate: "+1w",
      // changeMonth: true,
      // numberOfMonths: 3,
      startDate: dateToday,
      // onSelect: function(selectedDate) {
      //   var option = this.id == "from" ? "minDate" : "maxDate",
      //       instance = $(this).data("datepicker"),
      //       date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
      //   dates.not(this).datepicker("option", option, date);
      // }

    });

  </script>
@endsection
