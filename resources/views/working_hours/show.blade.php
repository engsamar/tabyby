@extends('layout')
@section('header')
<div class="page-header">
        <h1>WorkingHours / Show #{{$working_hour->id}}</h1>
        <form action="{{ route('working_hours.destroy', $working_hour->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('working_hours.edit', $working_hour->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                {{--<div class="form-group">--}}
                    {{--<label for="nome">ID</label>--}}
                    {{--<p class="form-control-static"></p>--}}
                {{--</div>--}}
                <div class="form-group">
                     <label for="fromTime">FROM</label>
                     <p class="form-control-static">{{$working_hour->fromTime}}</p>
                </div>
                    <div class="form-group">
                     <label for="toTime">TO</label>
                     <p class="form-control-static">{{$working_hour->toTime}}</p>
                </div>
                    <div class="form-group">
                     <label for="day">DAY</label>
                     <p class="form-control-static">{{$working_hour->day}}</p>
                </div>
                    <div class="form-group">
                     <label for="clinic_id">CLINIC_NAME</label>
                        <?php
//                            die($working_hour->clinic->name);
                        ?>
                        {{--@foreach($working_hour->clinic as $key=>$clinic)--}}
                            {{--{{$key}}--}}
                            {{--{{$clinic}}--}}
                        {{--@endforeach--}}
                     <p class="form-control-static">{{$working_hour->clinic->name}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('working_hours.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection