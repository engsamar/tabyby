@extends('layout')
@section('header')
<div class="page-header">
        <h1>PreceptionDetails / Show #{{$preception_detail->id}}</h1>
        <form action="{{ route('preception_details.destroy', $preception_detail->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('preception_details.edit', $preception_detail->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                     <label for="medicine_name">MEDICINE_NAME</label>
                     <p class="form-control-static">{{$preception_detail->medicine_name}}</p>
                </div>
                    <div class="form-group">
                     <label for="no_times">NO_TIMES</label>
                     <p class="form-control-static">{{$preception_detail->no_times}}</p>
                </div>
                    <div class="form-group">
                     <label for="quantity">QUANTITY</label>
                     <p class="form-control-static">{{$preception_detail->quantity}}</p>
                </div>
                    <div class="form-group">
                     <label for="duaration">DUARATION</label>
                     <p class="form-control-static">{{$preception_detail->duaration}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('preception_details.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection