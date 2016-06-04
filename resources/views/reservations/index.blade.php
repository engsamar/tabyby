@extends('layout')

@section('header')
<div class="page-header clearfix">
    <h1>
        <i class="glyphicon glyphicon-align-justify"></i> All Reservations
        <a class="btn btn-success pull-right" href="{{ route('reservations.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
    </h1>

</div>
@endsection

@section('content')
<<<<<<< HEAD
<div class="row">
    <div class="col-md-12">
        @if($reservations->count())
        <table class="table table-condensed table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TIME</th>
                    <th>STATUS</th>
                    <th>Patient_Name</th>
                    <th>CLINIC_Name</th>
                    <th>RESERVATION TYPE</th>
                    <th class="text-right">OPTIONS</th>
                </tr>
            </thead>

            <tbody>

                @foreach($reservations as $reservation)
                <tr>
                    <td>{{$reservation->id}}</td>
                    <td>{{$reservation->time}}</td>
                    <td>{{$status[$reservation->status]}}</td>
                    <td><a href='/patient/{{$reservation->user_id}}'>{{$reservation->user->username}}</a></td>
                    <td>{{$reservation->clinic->name}}</td>
                    <td>{{$reserveType[$reservation->reservation_type_id]}}</td>
                    <td class="text-right">
                        <a class="btn btn-xs btn-primary" href='/patient/{{$reservation->user_id}}'><i class="glyphicon glyphicon-eye-open"></i> View all Reservation</a>

                        <a class="btn btn-xs btn-info" href='/patient/{{$reservation->id}}/{{$reservation->user_id}}'><i class="glyphicon glyphicon-eye-open"></i> View this Reservation</a>


                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $reservations->render() !!}
    @else
    <h3 class="text-center alert alert-info">Empty!</h3>
    @endif

</div>
</div>

@endsection