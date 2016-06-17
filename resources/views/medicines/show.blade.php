@extends('adminLayout')
@section('header')
<div class="page-header">
        <h1>Medicines / Show #{{$medicine->id}}</h1>
        <form action="{{ route('medicines.destroy', $medicine->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('medicines.edit', $medicine->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                     <label for="name">NAME</label>
                     <p class="form-control-static">{{$medicine->name}}</p>
                </div>
                    <div class="form-group">
                     <label for="type">TYPE</label>
                     <p class="form-control-static">{{$medicineType[$medicine->type]}}</p>
                </div>
                    <div class="form-group">
                     <label for="company">COMPANY</label>
                     <p class="form-control-static">{{$medicine->company}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('medicines.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection