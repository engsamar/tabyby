@extends('layout')
@section('content')

    <div class="row">
        {{--/////////////////////--}}
        <table>
            <tr>
                <td style="width: 72%;">
                    <div id="clinicInfo" class="col-sm-4" style="width:48%;height:40%;border-color: black">
                        <h1>clinicInfo</h1>
                        {{--<form>--}}
                            {{--<select onchange="selectVal(this.value)" id="clinic_id-field" name="clinic_id"--}}
                                    {{--class="form-control">--}}
                                {{--@foreach($clinics as $clinic)--}}
                                    {{--<option value={{ $clinic->id }}>{{ $clinic->name }}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                        {{--</form>--}}

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

                {{--<td></td>--}}
            </tr>
        </table>
    </div>

@stop