@extends('adminLayout')
@section('css')
  <link href="/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Vacations / Edit #{{$vacation->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('vacations.update', $vacation->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('from_day')) has-error @endif">
                       <label for="from_day-field">From_day</label>
                    <input type="text" id="from_day-field" name="from_day" class="form-control date-picker" value="{{ $vacation->from_day }}"/>
                       @if($errors->has("from_day"))
                        <span class="help-block">{{ $errors->first("from_day") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('to_day')) has-error @endif">
                       <label for="to_day-field">To_day</label>
                    <input type="text" id="to_day-field" name="to_day" class="form-control date-picker" value="{{ $vacation->to_day }}"/>
                       @if($errors->has("to_day"))
                        <span class="help-block">{{ $errors->first("to_day") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('vacations.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
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
    $("input[name='from_day'],input[name='to_day']").keypress(function (event) {
        event.preventDefault();
    });
  </script>
@endsection
