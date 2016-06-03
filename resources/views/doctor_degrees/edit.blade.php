@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> DoctorDegrees / Edit #{{$doctor_degree->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('doctor_degrees.update', $doctor_degree->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('degree')) has-error @endif">
                       <label for="degree-field">Degree</label>
                    <input type="text" id="degree-field" name="degree" class="form-control" value="{{ $doctor_degree->degree }}"/>
                       @if($errors->has("degree"))
                        <span class="help-block">{{ $errors->first("degree") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('university')) has-error @endif">
                       <label for="university-field">University</label>
                    <input type="text" id="university-field" name="university" class="form-control" value="{{ $doctor_degree->university }}"/>
                       @if($errors->has("university"))
                        <span class="help-block">{{ $errors->first("university") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('description')) has-error @endif">
                       <label for="description-field">Description</label>
                    <input type="text" id="description-field" name="description" class="form-control" value="{{ $doctor_degree->description }}"/>
                       @if($errors->has("description"))
                        <span class="help-block">{{ $errors->first("description") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('graduate_date')) has-error @endif">
                       <label for="graduate_date-field">Graduate_date</label>
                    <input type="text" id="graduate_date-field" name="graduate_date" class="form-control date-picker" value="{{ $doctor_degree->graduate_date }}"/>
                       @if($errors->has("graduate_date"))
                        <span class="help-block">{{ $errors->first("graduate_date") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('user_role_id')) has-error @endif">
                       <label for="user_role_id-field">User_role_id</label>
                    <input type="text" id="user_role_id-field" name="user_role_id" class="form-control" value="{{ $doctor_degree->user_role_id }}"/>
                       @if($errors->has("user_role_id"))
                        <span class="help-block">{{ $errors->first("user_role_id") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('doctor_degrees.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
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
