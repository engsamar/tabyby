@extends('layout')
@section('css')
<link rel="stylesheet" href="/css/tab.css">
@endsection

@section('header')
<div class="page-header">
    <h4>Reservation No.{{$reservation->id}}</h4>
    <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="btn-group pull-right" role="group" aria-label="...">
            <a class="btn btn-warning btn-group" role="group" href="{{ route('reservations.edit', $reservation->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
            <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
        </div>
    </form>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">

        <form action="#">
         <div class="form-group">
          <p class="form-control-static">Day : {{$reservation->day}}</p>
          <p class="form-control-static">Time : {{$reservation->time}}</p>
          <p class="form-control-static">Appoinment : {{$reservation->appoinment}}</p>
          <p class="form-control-static">Status : {{$reservation->status}}</p>
          <p class="form-control-static">Patient : {{$reservation->user->username}}</p>
          <p class="form-control-static">Clinic: {{ $reservation->clinic->name}} -- {{ $reservation->clinic->address}}</p>
          <p class="form-control-static">R.T : {{$reservation->reservation_type_id}}</p>
      </div>
  </form>
</div>
</div>


<div id="container">
    <!--Pestaña 1 activa por defecto-->
    <input id="tab-1" type="radio" name="tab-group" checked="checked" />
    <label for="tab-1">Patient Information</label>
    <!--Pestaña 2 inactiva por defecto-->
    <input id="tab-2" type="radio" name="tab-group" />
    <label for="tab-2">Medical History</label>
    <!--Pestaña 3 inactiva por defecto-->
    <input id="tab-3" type="radio" name="tab-group" />
    <label for="tab-3">Complains</label>

    <input id="tab-4" type="radio" name="tab-group" />
    <label for="tab-4">Examinatoins</label>

    <input id="tab-5" type="radio" name="tab-group" />
    <label for="tab-5">Prescriptions</label>
    <!--Contenido a mostrar/ocultar-->
    <div id="content">
        <div id="content-1">
            <table class="table">
                @foreach($userInfo as $user)
                <tr><td>username</td><td>{{$user->username}}</td></tr>
                <tr><td>Email</td><td>{{$user->email}}</td></tr>
                <tr><td>Telephone</td><td>{{$user->telephone}}</td></tr>
                <tr><td>Mobile</td><td>{{$user->mobile}}</td></tr>
                <tr><td>BirthDate</td><td>{{$user->birthdate}}</td></tr>
                @endforeach
            </table>
        </div>

        <div id="content-2">
        <a class="btn btn-xs btn-primary" href='/newMedicalHistory/{{$reservation->id}}/{{$reservation->user_id}}'><i class="glyphicon glyphicon-eye-open"></i> New Medical History</a>
            <table class="table">
                @foreach($histories as $history)
                <tr><td>{{$medicalHistoryType[$history->type]}}</td><td>{{$history->type}}</td></tr>
                <tr><td>Beginned at</td><td>{{$history->begin_at}}</td></tr>
                <tr><td>Description</td><td>{{$history->description}}</td></tr>
                @endforeach

                </table>
            </div>
            <div id="content-3">

            <a class="btn btn-xs btn-primary" href='/newComplain/{{$reservation->id}}/{{$reservation->user_id}}'><i class="glyphicon glyphicon-eye-open"></i> New Complain</a>

                <table class="table">

                    @foreach($complains as $complain)
                    <tr><td>Complain</td><td>{{$complain->complain}}</td></tr>
                    <tr><td>History of Complain</td><td>{{$complain->h_of_complain}}</td></tr>
                    <tr><td>Diagnose</td><td>{{$complain->diagnose}}</td></tr>
                    <tr><td>Plan</td><td>{{$complain->plan}}</td></tr>
                    <tr><td>BirthDate</td><td>{{$complain->birthdate}}</td></tr>
                    @endforeach
                </table>
            </div>
            <div id="content-4">

                <table class="table" >
                    @foreach($examinations as $exam) 
                    <tr><td>Eye</td><td>{{$exam->eye_type}}</td></tr>
                    <tr><td>vision</td><td>{{$exam->vision}}</td></tr>
                    <tr><td>Lid</td><td>{{$exam->lid}}</td></tr>
                    <tr><td>Conjunctiva</td><td>{{$exam->conjunctiva}}</td></tr>
                    <tr><td>Pupil</td><td>{{$exam->pupil}}</td></tr>
                    <tr><td>A/C</td><td>{{$exam->a_c}}</td></tr>
                    <tr><td>Lens</td><td>{{$exam->lens}}</td></tr>
                    <tr><td>Fundus</td><td>{{$exam->fundus}}</td></tr>
                    <tr><td>I.O>P</td><td>{{$exam->i_o_p}}</td></tr>
                    @endforeach
                </table>

            </div>

            <div id="content-5">
                <table class="table">
                    @foreach($medicines as $medicine)
                    <tr><td>Medicine</td><td>{{$medicine->medicine_name}}</td></tr>
                    <tr><td>No. of times</td><td>{{$medicine->no_times}}</td></tr>
                    <tr><td>Quantity</td><td>{{$medicine->quantity}}</td></tr>
                    <tr><td>Duration</td><td>{{$medicine->duaration}}</td></tr>
                    @endforeach
                </table>
            </div>

        </div>
    </div>





    <a class="btn btn-link" href="{{ route('reservations.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
    @endsection