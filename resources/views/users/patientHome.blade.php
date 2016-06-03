@extends('layout')
@section('content')

    <div class="row">
        {{--/////////////////////--}}
        <table>
            <tr>
                <td style="width: 48%;">
                    <div id="clinicInfo" class="col-sm-4" style="width:93%;height:40%;border-color: black">
                        <h1>clinicInfo</h1>
                    </div>
                </td>
                <td style="width: 70%;">
                    <div id="recentPost" class="col-sm-6">
                        <h1>recentPost</h1>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div id="doctorBio" class="col-sm-4" style="width:22%;height:40%">
                        <h3>Doctor Bio</h3>
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

                </td>
                {{--<td></td>--}}
            </tr>
        </table>

    </div>

@stop