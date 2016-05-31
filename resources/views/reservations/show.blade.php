@extends('layout')
@section('header')
<div class="page-header">
        <h1>Reservations / Show #{{$reservation->id}}</h1>
        <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('reservations.edit', $reservation->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                     <label for="time">TIME</label>
                     <p class="form-control-static">{{$reservation->time}}</p>
                </div>
                    <div class="form-group">
                     <label for="status">STATUS</label>
                     <p class="form-control-static">{{$reservation->status}}</p>
                </div>
                    <div class="form-group">
                     <label for="user_id">USER_ID</label>
                     <p class="form-control-static">{{$reservation->user_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="clinic_id">CLINIC_ID</label>
                     <p class="form-control-static">{{$reservation->clinic_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="reservation_type_id">RESERVATION_TYPE_ID</label>
                     <p class="form-control-static">{{$reservation->reservation_type_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="parent_reservation_id">PARENT_RESERVATION_ID</label>
                     <p class="form-control-static">{{$reservation->parent_reservation_id}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('reservations.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection