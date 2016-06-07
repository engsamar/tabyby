@extends('homeViewLayout')
@section('nav_bar')
    <li><a href="#" >Reservations</a></li>
    <li><a href="#" >AddClinic</a></li>
    <li><a href="#" >MedicalHistory</a></li>
@endsection
@section('content')

    <div class="row">
        {{--/////////////////////--}}
        <table>
            <tr>
                <td style="width: 67%;">
                    <div id="clinicInfo" class="col-sm-4" style="width:48%;height:40%;border-color: black">
                        <h1>clinicInfo</h1>

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
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>

                    </div>
                </td>
                <td style="width: 70%;">
                    <div id="recentPost" class="col-sm-6">
                        <h1>recentPost</h1>
                    </div>
                </td>
                <td>

                </td>
            </tr>
            <tr>
                <td>
                    <div id="doctorBio" class="col-sm-4" style="width:22%;height:40%">
                        <h1>Doctor Bio</h1>
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
                </td>
                <td>
                    <div id="writePost" class="col-sm-6">
                        <h1>writePost</h1>
                    </div>
                </td>
                {{--<td></td>--}}
            </tr>
        </table>

    </div>
@stop