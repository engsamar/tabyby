@extends('layout')
@section('css')
    <link href="/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Examinations / Create </h1>
    </div>
@endsection
@section('content')
    @include('error')
    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('examinations.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" name="res_id" value="{{ $res_id }}">
                <div class="form-group @if($errors->has('eye_type')) has-error @endif">
                    <label for="eye_type-field">Eye_type</label>
                    <select id="eye_type-field" name="eye_type" class="form-control">
                        @foreach($eyeType as $key=>$value)
                            <option value={{ $key }}>{{ $value }}</option>
                        @endforeach
                    </select>
                    @if($errors->has("eye_type"))
                        <span class="help-block">{{ $errors->first("eye_type") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('vision')) has-error @endif">
                    <label for="vision-field">Vision</label>
                    <select id="vision-field" name="vision" class="form-control">
                        @foreach($vision as $key=>$value)
                            <option value={{ $key }}>{{ $value }}</option>
                        @endforeach
                    </select>
                    @if($errors->has("vision"))
                        <span class="help-block">{{ $errors->first("vision") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('lid')) has-error @endif">
                    <label for="lid-field">Lid</label>
                    <input type="text" id="lid-field" name="lid" class="form-control" value="{{ old("lid") }}"/>
                    @if($errors->has("lid"))
                        <span class="help-block">{{ $errors->first("lid") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('conjunctiva')) has-error @endif">
                    <label for="conjunctiva-field">Conjunctiva</label>
                    <input type="text" id="conjunctiva-field" name="conjunctiva" class="form-control"
                           value="{{ old("conjunctiva") }}"/>
                    @if($errors->has("conjunctiva"))
                        <span class="help-block">{{ $errors->first("conjunctiva") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('cornea')) has-error @endif">
                    <label for="cornea-field">Cornea</label>
                    <input type="text" id="cornea-field" name="cornea" class="form-control"
                           value="{{ old("cornea") }}"/>
                    @if($errors->has("cornea"))
                        <span class="help-block">{{ $errors->first("cornea") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('a_c')) has-error @endif">
                    <label for="a_c-field">A_c</label>
                    <input type="text" id="a_c-field" name="a_c" class="form-control" value="{{ old("a_c") }}"/>
                    @if($errors->has("a_c"))
                        <span class="help-block">{{ $errors->first("a_c") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('pupil')) has-error @endif">
                    <label for="pupil-field">Pupil</label>
                    <input type="text" id="pupil-field" name="pupil" class="form-control" value="{{ old("pupil") }}"/>
                    @if($errors->has("pupil"))
                        <span class="help-block">{{ $errors->first("pupil") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('lens')) has-error @endif">
                    <label for="lens-field">Lens</label>
                    <input type="text" id="lens-field" name="lens" class="form-control" value="{{ old("lens") }}"/>
                    @if($errors->has("lens"))
                        <span class="help-block">{{ $errors->first("lens") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('fundus')) has-error @endif">
                    <label for="fundus-field">Fundus</label>
                    <input type="text" id="fundus-field" name="fundus" class="form-control"
                           value="{{ old("fundus") }}"/>
                    @if($errors->has("fundus"))
                        <span class="help-block">{{ $errors->first("fundus") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('i_o_p')) has-error @endif">
                    <label for="i_o_p-field">I_o_p</label>
                    <input type="text" id="i_o_p-field" name="i_o_p" class="form-control" value="{{ old("i_o_p") }}"/>
                    @if($errors->has("i_o_p"))
                        <span class="help-block">{{ $errors->first("i_o_p") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('angle')) has-error @endif">
                    <label for="angle-field">Angle</label>
                    <input type="text" id="angle-field" name="angle" class="form-control" value="{{ old("angle") }}"/>
                    @if($errors->has("angle"))
                        <span class="help-block">{{ $errors->first("angle") }}</span>
                    @endif
                </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('examinations.index') }}"><i
                                class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        <script src="/js/jquery.min.js"></script>

        $('.date-picker').datepicker({});
        console.log('5656560');
    </script>
    
@endsection
