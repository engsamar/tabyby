@extends('layout')
@section('header')
<div class="page-header">
        <h1>DoctorDegrees / Show #{{$doctor_degree->id}}</h1>
        <form action="{{ route('doctor_degrees.destroy', $doctor_degree->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('doctor_degrees.edit', $doctor_degree->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static"></p>
                </div>
                <div class="form-group">
                     <label for="degree">DEGREE</label>
                     <p class="form-control-static">{{$doctor_degree->degree}}</p>
                </div>
                    <div class="form-group">
                     <label for="university">UNIVERSITY</label>
                     <p class="form-control-static">{{$doctor_degree->university}}</p>
                </div>
                    <div class="form-group">
                     <label for="description">DESCRIPTION</label>
                     <p class="form-control-static">{{$doctor_degree->description}}</p>
                </div>
                    <div class="form-group">
                     <label for="graduate_date">GRADUATE_DATE</label>
                     <p class="form-control-static">{{$doctor_degree->graduate_date}}</p>
                </div>
                    <div class="form-group">
                     <label for="userrole_id">USERROLE_ID</label>
                     <p class="form-control-static">{{$doctor_degree->userrole_id}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('doctor_degrees.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection