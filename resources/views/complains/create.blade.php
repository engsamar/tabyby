@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Complains / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('complains.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="patient_id" value="{{ $patient_id }}">
                <input type="hidden" name="res_id" value="{{ $res_id }}">


                <div class="form-group @if($errors->has('complain')) has-error @endif">
                       <label for="complain-field">Complain</label>
                    <input type="text" id="complain-field" name="complain" class="form-control" value="{{ old("complain") }}"/>
                       @if($errors->has("complain"))
                        <span class="help-block">{{ $errors->first("complain") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('h_of_complain')) has-error @endif">
                       <label for="h_of_complain-field">H_of_complain</label>
                    <textarea id="h_of_complain-field" name="h_of_complain" class="form-control" value="{{ old("h_of_complain") }}"></textarea>
                       @if($errors->has("h_of_complain"))
                        <span class="help-block">{{ $errors->first("h_of_complain") }}</span>
                       @endif
                  </div>

                   <div class="form-group @if($errors->has('diagnose')) has-error @endif">
                       <label for="diagnose-field">Diagnose</label>
                    <input type="text" id="diagnose-field" name="diagnose" class="form-control" value="{{ old("diagnose") }}"/>
                       @if($errors->has("diagnose"))
                        <span class="help-block">{{ $errors->first("diagnose") }}</span>
                       @endif
                    </div>

                    <div class="form-group @if($errors->has('plan')) has-error @endif">
                       <label for="plan-field">Plan</label>
                    <input type="text" id="plan-field" name="plan" class="form-control" value="{{ old("plan") }}"/>
                       @if($errors->has("plan"))
                        <span class="help-block">{{ $errors->first("plan") }}</span>
                       @endif
                    </div>

                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('complains.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
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
