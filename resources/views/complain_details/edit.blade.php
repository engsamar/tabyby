@extends('homeViewLayout')
@section('css')
  <link href="/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> ComplainDetails / Edit #{{$complain_detail->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('complain_details.update', $complain_detail->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('diagnose')) has-error @endif">
                       <label for="diagnose-field">Diagnose</label>
                    <input type="text" id="diagnose-field" name="diagnose" class="form-control" value="{{ $complain_detail->diagnose }}"/>
                       @if($errors->has("diagnose"))
                        <span class="help-block">{{ $errors->first("diagnose") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('plan')) has-error @endif">
                       <label for="plan-field">Plan</label>
                    <input type="text" id="plan-field" name="plan" class="form-control" value="{{ $complain_detail->plan }}"/>
                       @if($errors->has("plan"))
                        <span class="help-block">{{ $errors->first("plan") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('complain_details.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
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
