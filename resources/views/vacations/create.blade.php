@extends('adminLayout')
@section('css')
  <link href="/css/bootstrap-datepicker.css" rel="stylesheet">
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

                  <div id="movePatients" class="form-group" hidden></div>
                  <div id="moveAll" class="form-group" hidden>
                    <label>enter date</label>
                    <input type="text" id="move" class="form-control date-picker">
                  </div>
                  <div id="moveSome" class="form-group"></div>

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
    $("#from , #to , #move").datepicker({
      startDate: dateToday,
    });
    $("input[name='from'],input[name='to']").keypress(function (event) {
        event.preventDefault();
    });
  </script>
    <script type="text/javascript"  src="/js/vacations.js"></script>

@endsection
