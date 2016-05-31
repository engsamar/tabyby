@extends('layout')
@section('header')
<div class="page-header">
        <h1>MedicalHistories / Show #{{$medical_history->id}}</h1>
        <form action="{{ route('medical_histories.destroy', $medical_history->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('medical_histories.edit', $medical_history->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                     <label for="type">TYPE</label>
                     <p class="form-control-static">{{ $medicalHistoryType[$medical_history->type] }}</p>
                </div>
                    <div class="form-group">
                     <label for="begin_at">BEGIN_AT</label>
                     <p class="form-control-static">{{$medical_history->begin_at}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('medical_histories.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection