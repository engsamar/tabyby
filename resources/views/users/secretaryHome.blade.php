@extends('homeViewLayout')
@section('nav_bar')
    <li><a href="#" >Reservations</a></li>
    <li><a href="#" >AddClinic</a></li>
    <li><a href="#" >MedicalHistory</a></li>
@endsection
@section('content')
    <div class="container-fluid">
        <!-- /.row -->
        <div class="row margin-b-2">
            <div class="col-sm-3" id="divHome">
                <div class="caption">
                    <div>
                        <h3>clinicInfo</h3>

                        <form name="formN" id="formN" method="POST">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <select id="clinic_id_field" name="clinic_id_field" class="form-control">
                                <option>Select Clinic Name</option>
                                @foreach($clinics as $clinic)
                                    <option value={{ $clinic->id }}>{{ $clinic->name }}</option>
                                @endforeach
                            </select>
                            <label for="fromTime">From</label>
                            <input type="time" id="fromTime" name="fromTime" class="form-control"/>

                            <label for="toTime">To</label>
                            <input type="time" id="toTime" name="toTime" class="form-control"/>

                            <label for="day">Day</label>
                            <select id="day" name="day" class="form-control">
                                <option>Select Day</option>
                                @foreach($day as $type)
                                    <option value="{{ $type }}">{{ $type }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" id="clinic_id" name="clinic_id" class="form-control"/>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>

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