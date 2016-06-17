@extends('layout')
@section('css')
    <link href="/css/bootstrap-datepicker.css"
          rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> MedicalHistories / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('medical_histories.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="patient_id" value="{{ $patient_id }}">
                <input type="hidden" name="res_id" value="{{ $res_id }}">
                <div class="form-group @if($errors->has('type')) has-error @endif">
                    <label for="type-field">Type</label>
                    <select id="type-field" name="type" class="form-control">
                        @foreach($medicalHistoryType as $key=>$type)
                            <option value={{ $key }}>{{ $type }}</option>
                        @endforeach
                    </select>
                    @if($errors->has("type"))
                        <span class="help-block">{{ $errors->first("type") }}</span>
                    @endif
                </div>

                <div class="form-group @if($errors->has('description')) has-error @endif">
                       <label for="description-field">Description</label>
                    <input type="text" id="description-field" name="description" class="form-control" value="{{ old("description") }}"/>
                       @if($errors->has("description"))
                        <span class="help-block">{{ $errors->first("description") }}</span>
                       @endif
                    </div>

                
                <div class="form-group @if($errors->has('begin_at')) has-error @endif">
                    <label for="begin_at-field">Begin_at</label>
                    <input type="date" id="begin_at-field" name="begin_at" class="form-control"
                           value="{{ old("begin_at") }}"/>
                    @if($errors->has("begin_at"))
                        <span class="help-block">{{ $errors->first("begin_at") }}</span>
                    @endif
                </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('medical_histories.index') }}"><i
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
        $("input[name='begin_at']").keypress(function (event) {
            event.preventDefault();
        });
    </script>
@endsection
