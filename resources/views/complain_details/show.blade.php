@extends('homeViewLayout')
@section('header')
<div class="page-header">
        <h1>ComplainDetails / Show #{{$complain_detail->id}}</h1>
        <form action="{{ route('complain_details.destroy', $complain_detail->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('complain_details.edit', $complain_detail->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                     <label for="diagnose">DIAGNOSE</label>
                     <p class="form-control-static">{{$complain_detail->diagnose}}</p>
                </div>
                    <div class="form-group">
                     <label for="plan">PLAN</label>
                     <p class="form-control-static">{{$complain_detail->plan}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('complain_details.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection