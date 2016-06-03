@extends('layout')
@section('content')

    <div class="row">
        {{--/////////////////////--}}
        <table>
            <tr>
                <td style="width: 48%;">
                    <div id="clinicInfo" class="col-sm-4" style="width:48%;height:40%;border-color: black">
                        <h1>clinicInfo</h1>
                        <form>
                            <select onchange="selectVal(this.value)" id="clinic_id-field" name="clinic_id"
                                    class="form-control">
                                @foreach($clinics as $clinic)
                                    <option value={{ $clinic->id }}>{{ $clinic->name }}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </td>
                <td style="width: 70%;">
                    <div id="recentPost" class="col-sm-6">
                        <h1>recentPost</h1>
                    </div>
                </td>
                <td>
                    <div id="searchPatient" class="col-sm-4" style="width:22%;height:40%">
                        <h1>searchPatient</h1>
                        <input type="search">
                        <div>
                            b55
                        </div>
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
                <td>
                    <div id="writePost" class="col-sm-6">
                        <h1>writePost</h1>
                    </div>
                </td>
                {{--<td></td>--}}
            </tr>
        </table>

        {{--////////////////////--}}
        {{--<div id="clinicInfo" class="col-sm-4" style="width:22%;height:40%">--}}
        {{--<h1>clinicInfo</h1>--}}
        {{--<form>--}}
        {{--<select onchange="selectVal(this.value)" id="clinic_id-field" name="clinic_id" class="form-control">--}}
        {{--@foreach($clinics as $clinic)--}}
        {{--<option value={{ $clinic->id }}>{{ $clinic->name }}</option>--}}
        {{--@endforeach--}}
        {{--</select>--}}
        {{--</form>--}}
        {{--<form action="{{ route('working_hours.update', $working_hour->id) }}" method="POST">--}}
        {{--<input type="hidden" name="_method" value="PUT">--}}
        {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}

        {{--<div class="form-group @if($errors->has('from')) has-error @endif">--}}
        {{--<label for="from-field">From</label>--}}
        {{--<input type="text" id="from-field" name="from" class="form-control"--}}
        {{--value="{{ $working_hour->from }}"/>--}}
        {{--@if($errors->has("from"))--}}
        {{--<span class="help-block">{{ $errors->first("from") }}</span>--}}
        {{--@endif--}}
        {{--</div>--}}
        {{--<div class="form-group @if($errors->has('to')) has-error @endif">--}}
        {{--<label for="to-field">To</label>--}}
        {{--<input type="text" id="to-field" name="to" class="form-control" value="{{ $working_hour->to }}"/>--}}
        {{--@if($errors->has("to"))--}}
        {{--<span class="help-block">{{ $errors->first("to") }}</span>--}}
        {{--@endif--}}
        {{--</div>--}}
        {{--<div class="form-group @if($errors->has('day')) has-error @endif">--}}
        {{--<label for="day-field">Day</label>--}}
        {{--<input type="date" id="day-field" name="day" class="form-control" value="{{ $working_hour->day }}"/>--}}
        {{--<select multiple id="type-field" name="type" class="form-control">--}}
        {{--@foreach($day as $key=>$types)--}}
        {{--@if($working_hour->day==$key)--}}
        {{--<option selected value={{ $types[$working_hour->day] }}>{{ $types }}</option>--}}
        {{--@else--}}
        {{--<option value={{ $key }}>{{ $types }}</option>--}}
        {{--@endif--}}

        {{--@endforeach--}}
        {{--</select>--}}
        {{--@if($errors->has("day"))--}}
        {{--<span class="help-block">{{ $errors->first("day") }}</span>--}}
        {{--@endif--}}
        {{--</div>--}}
        {{--<div class="form-group @if($errors->has('clinic_id')) has-error @endif">--}}
        {{--<label for="clinic_id-field">Clinic_id</label>--}}
        {{--<input type="text" id="clinic_id-field" name="clinic_id" class="form-control"--}}
        {{--value="{{ $working_hour->clinic_id }}"/>--}}
        {{--@if($errors->has("clinic_id"))--}}
        {{--<span class="help-block">{{ $errors->first("clinic_id") }}</span>--}}
        {{--@endif--}}
        {{--</div>--}}
        {{--<div class="well well-sm">--}}
        {{--<button type="submit" class="btn btn-primary">Save</button>--}}
        {{--<a class="btn btn-link pull-right" href="{{ route('working_hours.index') }}"><i--}}
        {{--class="glyphicon glyphicon-backward"></i> Back</a>--}}
        {{--</div>--}}
        {{--</form>--}}
        {{--***********************************--}}
        {{--<form action="{{ route('working_hours.store') }}" method="POST">--}}
        {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}

        {{--<div class="form-group @if($errors->has('from')) has-error @endif">--}}
        {{--<label for="from-field">From</label>--}}
        {{--<input type="text" id="from-field" name="from" class="form-control" value="{{ old("from") }}"/>--}}
        {{--@if($errors->has("from"))--}}
        {{--<span class="help-block">{{ $errors->first("from") }}</span>--}}
        {{--@endif--}}
        {{--</div>--}}
        {{--<div class="form-group @if($errors->has('to')) has-error @endif">--}}
        {{--<label for="to-field">To</label>--}}
        {{--<input type="text" id="to-field" name="to" class="form-control" value="{{ old("to") }}"/>--}}
        {{--@if($errors->has("to"))--}}
        {{--<span class="help-block">{{ $errors->first("to") }}</span>--}}
        {{--@endif--}}
        {{--</div>--}}
        {{--<div class="form-group @if($errors->has('day')) has-error @endif">--}}
        {{--<label for="day-field">Day</label>--}}
        {{--<input type="date" id="day-field" name="day" class="form-control" value="{{ old("day") }}"/>--}}
        {{--@if($errors->has("day"))--}}
        {{--<span class="help-block">{{ $errors->first("day") }}</span>--}}
        {{--@endif--}}
        {{--</div>--}}
        {{--<div class="form-group @if($errors->has('clinic_id')) has-error @endif">--}}
        {{--<label for="clinic_id-field">Clinic_name</label>--}}
        {{--<input type="text" id="clinic_id-field" name="clinic_id" class="form-control" value="{{ old("clinic_id") }}"/>--}}
        {{--<select id="clinic_id-field" name="clinic_id" class="form-control">--}}
        {{--@foreach($clinics as $clinic)--}}
        {{--<option value={{ $clinic->name }}>{{ $clinic->name }}</option>--}}
        {{--@endforeach--}}
        {{--</select>--}}
        {{--@if($errors->has("clinic_id"))--}}
        {{--<span class="help-block">{{ $errors->first("clinic_id") }}</span>--}}
        {{--@endif--}}
        {{--</div>--}}
        {{--<div class="well well-sm">--}}
        {{--<button type="submit" class="btn btn-primary">Create</button>--}}
        {{--<a class="btn btn-link pull-right" href="{{ route('working_hours.index') }}"><i--}}
        {{--class="glyphicon glyphicon-backward"></i> Back</a>--}}
        {{--</div>--}}
        {{--</form>--}}
        {{--********************************--}}
        {{--</div>--}}
        {{--<div id="recentPost" class="col-sm-6" style="width:60%;height:40%">--}}
        {{--recentPost--}}
        {{--</div>--}}
        {{--<div id="searchPatient" class="col-sm-4" style="width:22%;height:40%">--}}
        {{--searchPatient--}}
        {{--</div>--}}
        <br>
        {{--Doctor Information--}}
        {{--<div id="doctorBio" class="col-sm-4" style="width:22%;height:40%">--}}
        {{--<h1>Doctor Bio</h1>--}}
        {{--<table>--}}
        {{--<tr>--}}
        {{--<td><h4>DoctorName</h4></td>--}}
        {{--<td><h4>:</h4></td>--}}
        {{--<td><b>{{ $userRole->user->username }}</b></td>--}}
        {{--</tr>--}}
        {{--@foreach($userRole->degrees as $data)--}}
        {{--<tr>--}}
        {{--<td>Degree</td>--}}
        {{--<td>:</td>--}}
        {{--<td>{{$data->degree}}</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
        {{--<td>Description</td>--}}
        {{--<td>:</td>--}}
        {{--<td>{{$data->description}}</td>--}}
        {{--</tr>--}}
        {{--@endforeach--}}
        {{--</table>--}}
        {{--</div>--}}
        {{--<div id="writePost" class="col-sm-6">--}}
        {{--writePost--}}
        {{--</div>--}}
    </div>

@stop