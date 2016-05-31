@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Reservations
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
                            <th>ID</th>
                            <th>TIME</th>
                        <th>STATUS</th>
                        <th>USER_ID</th>
                        <th>CLINIC_ID</th>
                        <th>RESERVATION_TYPE_ID</th>
                        <th>PARENT_RESERVATION_ID</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($reservations as $reservation)
                            <tr>
                                <td>{{$reservation->id}}</td>
                                <td>{{$reservation->time}}</td>
                    <td>{{$reservation->status}}</td>
                    <td>{{$reservation->user_id}}</td>
                    <td>{{$reservation->clinic_id}}</td>
                    <td>{{$reservation->reservation_type_id}}</td>
                    <td>{{$reservation->parent_reservation_id}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('reservations.show', $reservation->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('reservations.edit', $reservation->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
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