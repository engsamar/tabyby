@extends('homeViewLayout')
@section('content')
    <div class="container-fluid">
        <!-- /.row -->
        <div class="row margin-b-2">
            <div class="col-sm-3" id="divHome">
                <div class="caption">
                    <div>
                        <h3>clinicInfo</h3>

                        <table>
                            @foreach($reservation as $data)
                                <tr>
                                    <td>Clinic</td>
                                    <td>:</td>
                                    <td>{{ $data->clinic->name }}</td>
                                </tr>
                                <tr>
                                    <td>Reservation</td>
                                    <td>:</td>
                                    <td>{{ $reservationType[$data->reservation_type_id] }}</td>
                                </tr>
                                <tr>
                                    <td>Appointment</td>
                                    <td>:</td>
                                    <td>{{ $data->day }}</td>
                                </tr>

                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
            <div class="col-sm-6" id="divHome">
                <!-- <img class="img-responsive thumbnail" src="http://placehold.it/700x350" alt=""> -->
                <div class="caption">
                    <div id="recentPost" class="col-sm-4">
                        <h3>recentPost</h3>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.row -->
        <div class="row margin-b-2" >
            <div class="col-sm-3" id="divHome">
                <!-- <img class="img-responsive thumbnail" src="http://placehold.it/700x350" alt=""> -->
                <div class="caption">
                    <div id="doctorBio" >
                        <h4>DoctorBio</h4>
                        <table>
                            <tr>
                                <td><h4>DoctorName</h4></td>
                                <td><h4>:</h4></td>
                                <td><b>{{ $userRole->user->username }}</b></td>
                            </tr>
                            @foreach($userRole->degrees as $data)
                                <tr>
                                    <td>Degree</td>
                                    <td>:</td>
                                    <td>{{$data->degree}}</td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td>:</td>
                                    <td>{{$data->description}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row">

        </table>

    </div>
@stop
