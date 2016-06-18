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
		echo "gender".($user->gender)."<br />";
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
		echo "Date of reservation: ".($exam->date)."<br />";
		echo "Appointment of reservation: ".($exam->appointment)."<br />";
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
	echo "<br /><b>Glass Examinatoins: </b><br />";
	foreach ($glassExams as $exam) {
		echo "Eye Postion: ".($exam->eye_type)."<br />";
		echo "Examination Type: ".($exam->exam_glass_type)."<br />";
		echo "sql: ".($exam->spl)."<br />";
		echo "cyl: ".($exam->cyl)."<br />";
		echo "axis: ".($exam->axis)."<br />";
		echo "Time: ".($exam->time)."<br />";
		echo "------------------------------------<br />";
	}
?>
@stop