@extends('layout')
@section('content')
    <div class="row">
        <div id="clinicInfo" class="col-sm-4">
            <h1>clinicInfo</h1>

        </div>
        <div id="recentPost" class="col-sm-6">
            recentPost
        </div>
        <div id="searchPatient">
            searchPatient
        </div>
        <br>
        {{--Doctor Information--}}
        <div id="doctorBio" class="col-sm-4">
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
        <div id="writePost" class="col-sm-6">
            writePost
        </div>
    </div>

@stop