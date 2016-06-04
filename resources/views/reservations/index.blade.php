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
    <div class="row">
        <div class="col-md-12">
            @if($reservations->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                        <th>STATUS</th>
                        <th>USER_Name</th>
                        <th>CLINIC_Name</th>
                        <th>Appointment</th>
                        <th>RESERVATION_TYPE_ID</th>
                        <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($reservations as $reservation)
                    <tr>
                    <td>{{$reservation->status}}</td>
                    <td><a href='/patient/{{$reservation->user_id}}'>{{$reservation->user->username}}</a></td>
                    <td>{{$reservation->clinic->name}}</td>
                    <td>{{$reservation->appointment}}</td>
                    <td>{{$reservation->parent_id}}</td>
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