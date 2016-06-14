@extends('adminLayout')
@section('header')
<div class="page-header">
        <h1>Vacations / Show #{{$vacation->id}}</h1>
        <form action="{{ route('vacations.destroy', $vacation->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                {{--<a class="btn btn-warning btn-group" role="group" href="{{ route('vacations.edit', $vacation->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>--}}
                {{--<button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>--}}
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
                     <label for="from_day">FROM_DAY</label>
                     <p class="form-control-static">{{$vacation->from_day}}</p>
                </div>
                    <div class="form-group">
                     <label for="to_day">TO_DAY</label>
                     <p class="form-control-static">{{$vacation->to_day}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('vacations.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection