@extends('layout')
@section('css')
    <link href="/css/bootstrap-datepicker.css"
          rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> MedicalHistories / Edit #{{$medical_history->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('medical_histories.update', $medical_history->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('type')) has-error @endif">
                    <label for="type-field">Type</label>
                    <select id="type-field" name="type" class="form-control">
                        @foreach($medicalHistoryType as $key=>$types)
                            @if($medical_history->type==$key)
                                <option selected value={{ $types[$medical_history->type] }}>{{ $types }}</option>
                            @else
                                <option value={{ $key }}>{{ $types }}</option>
                            @endif

                        @endforeach
                    </select>
                    @if($errors->has("type"))
                        <span class="help-block">{{ $errors->first("type") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('begin_at')) has-error @endif">
                    <label for="begin_at-field">Begin_at</label>
                    <input type="date" id="begin_at-field" name="begin_at" class="form-control"
                           value="{{ $medical_history->begin_at }}"/>
                    @if($errors->has("begin_at"))
                        <span class="help-block">{{ $errors->first("begin_at") }}</span>
                    @endif
                </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
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
