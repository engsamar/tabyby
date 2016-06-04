@extends('layout')
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css"
          rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> ExamGlasses / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('exam_glasses.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('from')) has-error @endif">
                    @if($errors->has("from"))
                        <span class="help-block">{{ $errors->first("from") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('exam_glass_type')) has-error @endif">
                    <select id="exam_glass_type-field" name="exam_glass_type" class="form-control">
                        @foreach($examGlassType as $key=>$type)
                            <option value="{{ $key }}"> {{ $type }} </option>
                        @endforeach
                    </select>
                    @if($errors->has("exam_glass_type"))
                        <span class="help-block">{{ $errors->first("exam_glass_type") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('spl')) has-error @endif">
                    <label for="spl-field">Spl</label>
                    <input type="text" id="spl-field" name="spl" class="form-control" value="{{ old("spl") }}"/>
                    @if($errors->has("spl"))
                        <span class="help-block">{{ $errors->first("spl") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('cyl')) has-error @endif">
                    <label for="cyl-field">Cyl</label>
                    <input type="text" id="cyl-field" name="cyl" class="form-control" value="{{ old("cyl") }}"/>
                    @if($errors->has("cyl"))
                        <span class="help-block">{{ $errors->first("cyl") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('axis')) has-error @endif">
                    <label for="axis-field">Axis</label>
                    <input type="text" id="axis-field" name="axis" class="form-control" value="{{ old("axis") }}"/>
                    @if($errors->has("axis"))
                        <span class="help-block">{{ $errors->first("axis") }}</span>
                    @endif
                </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('exam_glasses.index') }}"><i
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
    </script>
@endsection
