@extends(( (isset(Auth::user()->id) and Auth::user()->userRoles[0]->type==1 )or ( isset(Auth::user()->id) and Auth::user()->userRoles[0]->type==0)) ? 'adminLayout' : 'layout')
@section('header')
<div class="page-header clearfix">
    <h2>
    <i class="glyphicon glyphicon-align-justify"></i>Reservations
    {{--<a class="btn btn-success pull-right" href="{{ route('reservations.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>--}}
     <a class="btn btn-primary pull-right" href="/allReservations"></i>All Reservations</a>
     @if(Auth::user()->userRoles[0]->type==1)
    <button type="button" class="btn btn-info pull-right"><a href="{{ route('users.create') }} "style="color:white">New Patient</a></button>
     @endif
     @if(Auth::user()->userRoles[0]->type==0 && $examPatients != null)

     <button type="button" class="btn btn-info pull-right"><a href='/all_reservation/{{$examPatients->user_id}}'style="color:white">Start Exam</a></button>
     @endif
    </h2>

</div>


<div class="form-group @if($errors->has('searchRes')) has-error @endif">
    <select id="searchRes-field" name="searchRes" class="form-control">
        <option  selected value="0">Search By</option>
        <option value="1">Name</option>
        <option value="2">Date</option>
        <option value="3">Duration</option>
        <option value="4">Name and Date</option>
</select>
    
<div id="name-search" hidden>
    <form action="/reserv/searchByName" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group @if($errors->has('name')) has-error @endif">
            <label for="name-field">Patient Name</label>
            <input list="searchResult" type="text" id="name-field" name="name" class="form-control" value="{{ old("name") }}"/>
            
            <datalist id="searchResult">
            </datalist>
            <button type="submit" class="btn btn-primary">Search</button>
            @if($errors->has("name"))
            <span class="help-block">{{ $errors->first("name") }}</span>
            @endif
        </div>
    </form>
</div>
<div id="name-date-search" hidden>
    <form action="/reserv/searchByNameAndDate" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group @if($errors->has('name')) has-error @endif">
            <label for="name-field">Patient Name</label>
            <input list="searchResult" type="text" id="nameField" name="name" class="form-control" value="{{ old("name") }}"/>
            
            <datalist id="searchResult">
            </datalist>
            @if($errors->has("name"))
            <span class="help-block">{{ $errors->first("name") }}</span>
            @endif
        </div>
        <div class="form-group @if($errors->has('date')) has-error @endif">
            <label for="date-field">date</label>
            <input type="text" id="date-field" name="date"  class="form-control date-picker"
            value="{{ old("date") }}"/>
            @if($errors->has("date"))
            <span class="help-block">{{ $errors->first("date") }}</span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>

<div id="date-search" hidden>
    <form action="/reserv/searchByDate" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group @if($errors->has('date')) has-error @endif">
            <label for="date-field">date</label>
            <input type="text" id="date-field" name="date"  class="form-control date-picker"
            value="{{ old("date") }}"/>
            @if($errors->has("date"))
            <span class="help-block">{{ $errors->first("date") }}</span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>
<div id="duration-search" hidden>
    <form action="/reserv/searchByDuration" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group @if($errors->has('fromTime')) has-error @endif">
            <label for="fromTime-field">From</label>
            <input type="text" id="fromTime-field" name="fromTime" class="form-control date-picker" />
            @if($errors->has("fromTime"))
            <span  class="help-block">{{ $errors->first("fromTime") }}</span>
            @endif
        </div>
        <div class="form-group @if($errors->has('toTime')) has-error @endif">
            <label for="toTime-field">To</label>
            <input type="text" id="toTime-field" name="toTime" class="form-control date-picker"/>
            <span id="error" class="help-block"></span>
            @if($errors->has("toTime"))
            <span class="help-block">{{ $errors->first("toTime") }}</span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
        
    </form>
</div>
@endsection
@section('content')
<div name="ssearch" id="ssearch">
    
</div>
<div class="row">
    <div class="col-md-12">
        @if($reservations->count())
        <table class="table table-condensed table-striped">
            <thead>
                <tr>
                    @if(Auth::user()->userRoles[0]->type==0)
                    <th>Patient_Name</th>
                    <th>Appointment</th>

                    <th>RESERVATION_TYPE</th>
                    <th class="text-right">OPTIONS</th>                    
                    @else
                    <th>Patient_Name</th>
                    <th>CLINIC_Name</th>
                    <th>Appointment</th>
                    <th>Date</th>
                    <th>RESERVATION_TYPE</th>
                    <th>STATUS</th>
                    <th class="text-right">OPTIONS</th>

                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($reservations as $reservation)
                <tr>
                    @if(Auth::user()->userRoles[0]->type==0)
                    <td><a href='/users/{{$reservation->user_id}}'>{{$reservation->user->username}}</a></td>
                    <td>{{$reservation->appointment}}</td>

                    <td>{{$reserveType[$reservation->reservation_type_id]}}</td>
                    <td class="text-right">
                        <a class="btn btn-xs btn-primary" href='/all_reservation/{{$reservation->user_id}}'><i class="glyphicon glyphicon-eye-open"></i> View History</a>
                    </td>
                    @else
                    
                    <td><a href='/users/{{$reservation->user_id}}'>{{$reservation->user->username}}</a></td>
                    <td>{{$reservation->clinic->name}}</td>
                    <td>{{$reservation->appointment}}</td>
                    <td>{{$reservation->date}}</td>
                    <td>{{$reserveType[$reservation->reservation_type_id]}}</td>
                    
                    <td>{{$status[$reservation->status]}}</td>
                    <td class="text-right">
                        @if( $reservation->status >2 && $reservation->status <4)
                      <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Cancel Reservation ? Are you sure?')) { return true } else {return false };">
                      <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         <a class="btn btn-xs btn-warning btn-group" role="group" href="{{ route('reservations.edit', $reservation->id) }}"><i class="glyphicon glyphicon-edit"></i>Postpone</a>
                     <button type="submit" class="btn btn-xs btn-danger">Cancel<i class="glyphicon glyphicon-trash"></i></button>

                     <a class="btn btn-xs btn-info btn-group" role="group" href="/reservations/existed/{{$reservation->id}}"<i class="glyphicon glyphicon-edit"></i>Existed</a>
                     </form>
                     @endif
                     </td>
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
<script src="/js/bootstrap-datepicker.js"></script>
<script>
$('.date-picker').datepicker({
dateFormate:'yyyy/mm/dd ',
});
</script>
<script>

$(document).ready()
{/*
    $('#date-field').change(function(e) {
        var date = new Date($('#date-field').val());
        var name = $('#nameField').val();
        date.setDate(date.getDate() + 1);
        var date= date.toISOString().substring(0, 10);
        var myDiv=document.getElementById('ssearch');

        $.ajax
        ({
            url: "/reserv/searchByNameAndDate/"+name+"/"+date,
            type: 'GET',
            data: {},
            success: function (data)
            {
                var HTMLtxt='<select name="workingHour" class="form-control">';
                HTMLtxt+='<option>choose suitable time</option>';
                $.each(data,function(index, el) {
                    HTMLtxt+='<option value='+el['id']+'> Name : '+ el['user_id']+ '</option>';
                });

                HTMLtxt += '</select>';
              
              
                myDiv.innerHTML = HTMLtxt;
            },
            error: function (data) {
                console.log(data);
            }
        });
    });*/
    $("#name-search").hide();
    $("#date-search").hide();
    $("#duration-search").hide();
    $('#name-date-search').hide();
    $("select[name='searchRes']").change(function () {
    if (this.value == 1) {
    $("#name-search").show();
    $("#date-search").hide();
    $("#duration-search").hide();
    $('#name-date-search').hide();

    } 
    if(this.value == 2) {
    $("#date-search").show();
    $("#name-search").hide();
    $("#duration-search").hide();
    $('#name-date-search').hide();

    }
    if(this.value == 3){
    $("#date-search").hide();
    $("#name-search").hide();
    $("#duration-search").show();
    $('#name-date-search').hide();

    }
    if(this.value == 4){
    $("#date-search").hide();
    $("#name-search").hide();
    $("#duration-search").hide();
    $('#name-date-search').show();

    }
});
};
</script>
@endsection