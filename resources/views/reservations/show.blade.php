@extends('layout')
@section('header')
<div class="page-header">
        <h1>Reservations / Show #{{$reservation->id}}</h1>
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
                    <label for="nome">ID</label>
                    <p class="form-control-static"></p>
                </div>
                <div class="form-group">
                     <label for="time">TIME</label>
                     <p class="form-control-static">{{$reservation->time}}</p>
                </div>
                    <div class="form-group">
                     <label for="status">STATUS</label>
                     <p class="form-control-static">{{$reservation->status}}</p>
                </div>
                    <div class="form-group">
                     <label for="user_id">USER_ID</label>
                     <p class="form-control-static">{{$reservation->user_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="clinic_id">CLINIC_ID</label>
                     <p class="form-control-static">{{$reservation->clinic_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="reservation_type_id">RESERVATION_TYPE_ID</label>
                     <p class="form-control-static">{{$reservation->reservation_type_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="parent_reservation_id">PARENT_RESERVATION_ID</label>
                     <p class="form-control-static">{{$reservation->parent_reservation_id}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('reservations.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

<?php

    echo "<b>UserInfo: </b><br />";
    foreach ($userInfo as $user) {
        echo "username: ".($user->username)."<br />";
        echo "email: ".($user->email)."<br />";
        echo "adress: ".($user->address)."<br />";
        echo "tel: ".($user->telephone)."<br />";
        echo "mobile".($user->mobile)."<br />";
        echo "\n";
    }

    echo "<br />";
    echo "<b>Medical History: </b><br />";
    foreach ($histories as $history) {
        echo "Medical History Type: ";
        if($history->type == 0){
            echo "surgery <br />";
        }elseif($history->type == 1){
            echo "disease <br />";
        }elseif($history->type == 2){
            echo "medicines <br />";
        }
        echo "Beginned at: ". $history->begin_at;
        echo "Description: ". $history->description;

    }

    //-------------------------------------------

    echo "<br /><b>Examinatoins: </b><br />";
    foreach ($examinations as $exam) {
        echo "Time of reservation: ".($exam->time)."<br />";
        echo "Eye: ";
        if(($exam->eye_type) == 0) echo 'left'; else echo 'right'; echo "<br />";
        echo "vision: ".($exam->vision)."<br />";
        echo "lid: ".($exam->lid)."<br />";
        echo "conjunctiva: ".($exam->conjunctiva)."<br />";
        echo "pupil: ".($exam->pupil)."<br />";
        echo "a_c: ".($exam->a_c)."<br />";
        echo "lens: ".($exam->lens)."<br />";
        echo "fundus: ".($exam->fundus)."<br />";
        echo "i_o_p: ".($exam->i_o_p)."<br />";
        echo "------------------------------------<br />";
    }

    echo "<br /><b>Complains: </b><br />";
    foreach ($complains as $complain) {
        echo "Complain: ".($complain->complain)."<br />";
        echo "History Of Complain: ".($complain->h_of_complain)."<br />";
        echo "Diagnose: ".($complain->diagnose)."<br />";
        echo "Plan: ".($complain->plan)."<br />";
        echo "------------------------------------<br />";
    }

    echo "<br /><b>Medicines: </b><br />";
    var_dump($medicines);
    foreach ($medicines as $medicine) {
        echo "Name: ".($medicine->medicine_name)."<br />";
        echo "History Of medicine: ".($medicine->no_times)."<br />";
        echo "Diagnose: ".($medicine->quantity)."<br />";
        echo "Plan: ".($medicine->duaration)."<br />";
        echo "------------------------------------<br />";
    }

    ?>
@endsection