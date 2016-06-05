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
                    <input type="button" id="name-field" name="search" class="btn" value="Search" />
                    @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                    @endif
                </div>


<!--                               <div class="form-group @if($errors->has('time')) has-error @endif">
                       <label for="time-field">Time</label>
                    <input type="time" id="birth-field" name="time" class="form-control" value="{{ old("birth") }}"/>
                       @if($errors->has("birth"))
                        <span class="help-block">{{ $errors->first("time") }}</span>
                       @endif
                        </div> -->
       

                <div  class="form-group @if($errors->has('address')) has-error @endif">
                    <label for="address-field">Address</label>
                    <select id="type-field" name="address" class="form-control">
                    <option value="0">Choose Clinic</option>}
                    option
                        @foreach($address as $key=>$value)

                                <option value={{ $value->id }}>{{ $value->name }} :: {{ $value->address }}</option>
                                @endforeach
                    </select>
                    @if($errors->has("address"))
                        <span class="help-block">{{ $errors->first("address") }}</span>
                    @endif
                </div>

    
                <div class="form-group @if($errors->has('date')) has-error @endif">
                    <label for="date-field">date</label>
                    <input type="date" id="date-field" name="date" class="form-control"
                           value="{{ old("date") }}"/>
                    @if($errors->has("date"))
                        <span class="help-block">{{ $errors->first("date") }}</span>
                    @endif
                </div>

                
                <div  class="form-group @if($errors->has('examination')) has-error @endif">
                    <label for="examination-field">Examination Type</label>
                    <select id="type-field" name="examination" class="form-control">
                    <option value="0">Choose Examination</option>}
                        <option value="1"> examination</option>
                        <option value="5">glasses prescription</option>
                    </select>
                    @if($errors->has("examination"))
                        <span class="help-block">{{ $errors->first("examination") }}</span>
                    @endif
                </div>

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
//             $("select[name='address']").change(function(){
// //                alert("Handler for .change() called.");
// //                console.log(this.value);
//                 $.get("/working_hours/date/"+this.value).done(function (data, status) {
// //                    alert("Data: " + data + "\nStatus: " + status);
// //                    console.log("Data: " + data + "\nStatus: " + status);
// //                    console.log(data);


//                     {{--<option value={{ $value->id }}>{{ $value->date }}</option>--}}
//                     {{--@endforeach--}}
//                     {{--</select>--}}
//                     if (data.length>0){
//                     // var appointment1 =$("<select></select>").attr("name", "time").attr("class", "form-control");
//                     // var appointment2 =$("<select></select>").attr("name", "day").attr("class", "form-control");
//                     var appointment =$("<select></select>").attr("name", "day").attr("class", "form-control");

//                     $.each(data, function (i, content) {

//                         // appointment1.append("<option> from " +content.fromTime + ", to " + content.toTime + "</option>");
//                         // appointment2.append("<option>" + content.day +"</option>");
//                         appointment.append("<option>" + content.day +" from "+ content.fromTime + " ,to " + content.toTime +  "</option>");
//                     });
//                     $("#contain").html(appointment);
//                     // $("#contain1").html(appointment1);
//                     // $("#contain2").html(appointment2);
//                     }
//                     else {
//                         $("#contain").text("there is no data");
//                     }
//                 });
//             });

        });

    </script>
@endsection
