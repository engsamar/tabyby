@extends('layout')
@section('css')
<link rel="stylesheet" href="/css/tab.css">
@endsection

@section('header')
<div class="page-header">
    <h4>Reservation No.{{$reservation->complain->user_id}}</h4>
    {{die()}}
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

            <a class="btn btn-xs btn-primary" href='/newMedicalHistory/{{$reservation->id}}'><i class="glyphicon glyphicon-eye-open"></i> New Medical History</a>

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
            <a class="btn btn-xs btn-primary" href='/newComplain/{{$reservation->id}}}'><i class="glyphicon glyphicon-eye-open"></i> New Complain</a>
                <table class="table" border="1px">
                <tr><th>Complain</th><th>History of Complain</th><th>Diagnose</th><th>Plan</th></tr>
                    @foreach($complains as $complain)

                        <tr>
                            <td>{{$complain->complain}}</td>
                            <td>{{$complain->h_of_complain}}</td>
                            <td>{{$complain->diagnose}}</td>
                            <td>{{$complain->plan}}</td>
                        </tr>

                    @endforeach
                </table>
            </div>

            <div id="content-4">
            <a class="btn btn-xs btn-primary" href='/newExamination/{{$reservation->id}}'><i class="glyphicon glyphicon-eye-open"></i> New Examination</a>
                <table class="table" >
                <tr><th>Eye</th><th>vision</th><th>Lid</th><th>Conjunctiva</th><th>Pupil</th><th>A/C</th><th>Lens</th><th>Fundus</th><th>I.O.P</th>
                    <tr>
                    @foreach($examinations as $exam)
                        <td>{{$exam->eye_type}}  </td>
                        <td>{{$exam->vision}}</td>
                        <td>{{$exam->lid}}</td>
                        <td>{{$exam->conjunctiva}}</td>
                        <td>{{$exam->pupil}}</td>
                        <td>{{$exam->a_c}}</td>
                        <td>{{$exam->lens}}</td>
                        <td>{{$exam->fundus}}</td>
                        <td>{{$exam->i_o_p}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>

        <div id="content-5">
            <a class="btn btn-xs btn-primary" href='/newPrescriptionDetails/{{$reservation->id}}'><i class="glyphicon glyphicon-eye-open"></i> New PRESCRIPTION</a>
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

    <a class="btn btn-link" href="{{ route('reservations.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

</div>



<form id="test" action="{{ route('reservations.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <h2>Next Visit</h2>
                <input type="text" name="res_id" value='{{$reservation->id}}' hidden>
                <input type="text" name="user_id" value='{{$reservation->user_id}}' hidden>
                <input type="text" name="clinic_id" value='{{$reservation->clinic_id}}' hidden>
                <input type="text" name="res_type_id" value='{{$reservation->reservation_type_id}}' hidden>
                <div class="form-group @if($errors->has('date')) has-error @endif">
                    <label for="date-field">Visit after </label>
                    <input type="number" id="date-field" name="date"  class="form-control"
                    value="{{ old("date") }}"/>
                    @if($errors->has("date"))
                    <span class="help-block">{{ $errors->first("date") }}</span>
                    @endif
                </div>

                <div >
                    <button type="submit" class="btn btn-primary">Create</button>
        
                    </div>
            </form>
<div><a class="btn btn-link" href="{{ route('reservations.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
</div>
@endsection