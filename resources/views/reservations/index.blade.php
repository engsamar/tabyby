@extends('homeViewLayout')
@section('header')
<div class="page-header clearfix">
    <h2>
    <i class="glyphicon glyphicon-align-justify"></i>Reservations
    <a class="btn btn-success pull-right" href="{{ route('reservations.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
    </h2>
</div>
<div class="form-group @if($errors->has('searchRes')) has-error @endif">
    <select id="searchRes-field" name="searchRes" class="form-control">
    <option selected value="0">Search By</option>
        <option selected value="0">Name</option>
        <option value="1">Date</option>
        <option value="2">Duration</option>
    </select>
    <div id="name-search" hidden>
        <div class="form-group @if($errors->has('name')) has-error @endif">
            <label for="name-field">Patient Name</label>
            <input list="searchResult" type="text" id="name-field" name="name" class="form-control" value="{{ old("name") }}"/>
            <datalist id="searchResult">
            
            </datalist>
            
            @if($errors->has("name"))
            <span class="help-block">{{ $errors->first("name") }}</span>
            @endif
        </div>
    </div>
    <div id="date-search" hidden>
        date
    </div>
    <div id="duration-search" hidden>
        <div class="form-group @if($errors->has('fromTime')) has-error @endif">
       <label for="fromTime-field">From</label>
       <input type="text" id="fromTime-field" name="fromTime" class="form-control date-picker" value="{{ $fromTime}}"/>
       @if($errors->has("fromTime"))
       <span  class="help-block">{{ $errors->first("fromTime") }}</span>
       @endif
     </div>
     <div class="form-group @if($errors->has('toTime')) has-error @endif">
       <label for="toTime-field">To</label>
       <input type="text" id="toTime-field" name="toTime" class="form-control date-picker" value="{{ $toTime }}"/>
       <span id="error" class="help-block"></span>
       @if($errors->has("toTime"))
       <span class="help-block">{{ $errors->first("toTime") }}</span>
       @endif
     </div>
    </div>
    
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
@section('scripts')
<script>

$(document).ready()
{
    $("#name-search").hide();
    $("#date-search").hide();
    $("#duration-search").hide();
    $("select[name='searchRes']").change(function () {
    if (this.value == 1) {
    $("#name-search").show();
    $("#date-search").hide();
    $("#duration-search").hide();
    } 
    if(this.value == 2) {
    $("#date-search").show();
    $("#name-search").hide();
    $("#duration-search").hide();
    }
    if(this.value == 3){
    $("#date-search").hide();
    $("#name-search").hide();
    $("#duration-search").show();
    }
});
};
</script>
@endsection