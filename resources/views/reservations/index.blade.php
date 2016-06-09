@extends('homeViewLayout')

@section('header')
<div class="page-header clearfix">
    <h2>
        <i class="glyphicon glyphicon-align-justify"></i> All Reservations
        <a class="btn btn-success pull-right" href="{{ route('reservations.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
    </h2>

</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">

        @if($reservations->count())
       <div><p> message ::{{$message}} </p></div>
        <table class="table table-condensed table-striped">
            <thead>
                <tr>
                    @if($userRole == 0)
                    <th>Patient_Name</th>
                    <th>RESERVATION_TYPE</th>
                    <th class="text-right">OPTIONS</th>
                    
                    @else
                    <th>Patient_Name</th>
                    <th>CLINIC_Name</th>
                    <th>Appointment</th>
                    <th>RESERVATION_TYPE</th>
                     <th>Previous RESERVATION</th>
                    <th>STATUS</th>
                    @endif
                </tr>
            </thead>

            <tbody>
                @foreach($reservations as $reservation)
                <tr>
                @if($userRole == 0)
                     <td><a href='#'>{{$reservation->user->username}}</a></td>
                     <td>{{$reserveType[$reservation->reservation_type_id]}}</td>
                    <td class="text-right">
                        <a class="btn btn-xs btn-primary" href='/reservation/{{$reservation->user_id}}'><i class="glyphicon glyphicon-eye-open"></i> View History</a>

                    </td>
                    @else
                    
                    <td><a href='#'>{{$reservation->user->username}}</a></td>
                    <td>{{$reservation->clinic->name}}</td>
                    <td>{{$reservation->appointment}}</td>
                    <td>{{$reserveType[$reservation->reservation_type_id]}}</td>
                    <td>
                    @if($reservation->reservation_type_id-1 >=0 )
                    {{$reserveType[$reservation->reservation_type_id-1]}}
                    @else
                    this is first reservation
                    @endif
                    
                    </td>
                    <td>{{$status[$reservation->status]}}</td>
                    @endif
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
