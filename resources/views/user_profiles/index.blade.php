@extends('layout')
@section('content')
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
	}

	//-------------------------------------------

	echo "<br /><b>Examinatoins: </b><br />";
	foreach ($examinations as $exam) {
		echo "Time of reservation: ".($exam->time)."<br />";
		echo "Eye: ";
		if(($exam->eyeType) == 0) echo 'left'; else echo 'right'; echo "<br />";
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

?>
@stop