@extends('adminLayout')
@section('header')
    <div class="page-header">
        <h1>PrescriptionDetails / Show #{{$prescription_detail->id}}</h1>
        <form action="{{ route('prescription_details.destroy', $prescription_detail->id) }}" method="POST"
              style="display: inline;"
              onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group"
                   href="{{ route('prescription_details.edit', $prescription_detail->id) }}"><i
                            class="glyphicon glyphicon-edit"></i> Edit</a>
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
                    <p class="form-control-static">{{$prescription_detail->medicine_name}}</p>
                </div>
                <div class="form-group">
                    <label for="no_times">NO_TIMES</label>
                    <p class="form-control-static">{{$prescription_detail->no_times}}</p>
                </div>
                <div class="form-group">
                    <label for="quantity">QUANTITY</label>
                    <p class="form-control-static">{{$prescription_detail->quantity}}</p>
                </div>
                <div class="form-group">
                    <label for="duration">DURATION</label>
                    <p class="form-control-static">{{$prescription_detail->duration}}</p>
                </div>
                {{--<div class="form-group">--}}
                    {{--<label for="preception_id">PRECEPTION_ID</label>--}}
                    {{--<p class="form-control-static">{{$prescription_detail->preception_id}}</p>--}}
                {{--</div>--}}
            </form>

            <a class="btn btn-link" href="{{ route('prescription_details.index') }}"><i
                        class="glyphicon glyphicon-backward"></i> Back</a>

        </div>
    </div>

@endsection