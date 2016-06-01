<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Clinic;
use App\User;
use App\MedicalHistory;
use App\Examination;
use DB;


class UserProfileController extends Controller
{
    public function index($id)
	{	
		// $users = User::find(1);

        $userInfo = DB::table('users')->where('users.id', $id)->get();

        $histories = DB::table('users')
            ->join('medical_histories', 'users.id', '=', 'medical_histories.user_id')
            ->join('medical_history_details', 'medicalHistory_id', '=', 'medical_histories.id')
            ->select('users.*', 'medical_histories.*','medical_history_details.*')
            ->where('users.id', $id)
            ->get();


        $examinations = DB::table('users')
            ->join('reservations', 'users.id', '=', 'reservations.user_id')
            ->join('examinations', 'reservation_id', '=', 'reservations.id')
            ->select('examinations.*','reservations.*')
            ->where('users.id', $id)
            ->get();
  
     return view('user_profiles.index', compact('histories', 'examinations', 'userInfo'));


	}
}
