@extends('layout')
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css"
          rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Reservations / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('reservations.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">


                <div class="form-group @if($errors->has('name')) has-error @endif">
                    <label for="name-field">Patient Name</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ old("name") }}"/>
                    @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                    @endif
                </div>


                <!--               <div class="form-group @if($errors->has('birth')) has-error @endif">
                       <label for="birth-field">Birth Date</label>
                    <input type="date" id="birth-field" name="birth" class="form-control" value="{{ old("birth") }}"/>
                       @if($errors->has("birth"))
                        <span class="help-block">{{ $errors->first("birth") }}</span>
                       @endif
                        </div> -->
       

                <div  class="form-group @if($errors->has('address')) has-error @endif">
                    <label for="address-field">Address</label>
                    <select id="type-field" name="address" class="form-control">
                        @foreach($address as $key=>$value)

                                <option value={{ $value->id }}>{{ $value->name }} :: {{ $value->address }}</option>
                                @endforeach
                    </select>
                    @if($errors->has("address"))
                        <span class="help-block">{{ $errors->first("address") }}</span>
                    @endif
                </div>

                <div id="contain" class="form-group @if($errors->has('day')) has-error @endif">
                    <label for="day-field">Day</label>


                    @if($errors->has("day"))
                        <span class="help-block">{{ $errors->first("day") }}</span>
                    @endif
                </div>

                <div class="form-group @if($errors->has('reserveType')) has-error @endif">
                    <label for="reserveType-field">Reservation Type</label>
                    <select id="type-field" name="reserveType" class="form-control">
                        @foreach($reserveType as $key=>$value)
                            <option value={{ $key+1 }}>{{ $value }}</option>
                        @endforeach
                    </select>
                    @if($errors->has("reserveType"))
                        <span class="help-block">{{ $errors->first("reserveType") }}</span>
                    @endif
                </div>


                {{--<div class="form-group @if($errors->has('time')) has-error @endif">--}}
                {{--<label for="time-field">Appoinment</label>--}}
                {{--<input type="datetime-local" id="time-field" name="time" class="form-control"--}}
                {{--value="{{ old("time") }}"/>--}}
                {{--@if($errors->has("time"))--}}
                {{--<span class="help-block">{{ $errors->first("time") }}</span>--}}
                {{--@endif--}}
                {{--</div>--}}

                        <!--                    <div class="form-group @if($errors->has('user_id')) has-error @endif">
                       <label for="user_id-field">User_id</label>
                    <input type="text" id="user_id-field" name="user_id" class="form-control" value="{{ old("user_id") }}"/>
                       @if($errors->has("user_id"))
                        <span class="help-block">{{ $errors->first("user_id") }}</span>
                       @endif
                        </div> -->


                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <button type="button" class="btn btn-primary"><a href="{{ route('users.create') }}"
                                                                     style="color:white">New User</a></button>
                    <a class="btn btn-link pull-right" href="{{ route('reservations.index') }}"><i
                                class="glyphicon glyphicon-backward"></i> Back</a>
                </div>

            </form>

        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
    <script>
//        console.log("hiii");


        $('.date-picker').datepicker({});

        $(document).ready(function () {

            console.log("hiii in ready");
            $("select[name='address']").change(function(){
//                alert("Handler for .change() called.");
//                console.log(this.value);
                $.get("/working_hours/date/"+this.value).done(function (data, status) {
//                    alert("Data: " + data + "\nStatus: " + status);
//                    console.log("Data: " + data + "\nStatus: " + status);
//                    console.log(data);

                            if (data.length>0){
                    var appointment =$("<select></select>").attr("id", "type-field").attr("name", "day").attr("class", "form-control");
                    $.each(data, function (i, content) {
//                        console.log(content.from);
//                        console.log(content.to);
//                        console.log(content.day);
//                        console.log(i);
                        var appointments=(((content.to-content.from)*60)/20);
                        if (content.reservations_number>appointments){return true;}
                        appointment.append("<option>" + content.day +", from " +content.from + ", to" + content.to + "</option>");
                    });
                    $("#contain").html(appointment);
                    }else {
                        $("#contain").text("there is no data");
                    }
                });
            });

        });

    </script>
@endsection
