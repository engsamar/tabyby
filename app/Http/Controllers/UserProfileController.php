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
        $doctorRole = UserRole::where('type', '=', 0)->firstOrFail();
        $userInfo = DB::table('users')->where('users.id', $id)->get();

        $histories = DB::table('users')
            ->join('medical_histories', 'users.id', '=', 'medical_histories.user_id')
            ->join('medical_history_details', 'medical_history_id', '=', 'medical_histories.id')
            ->select('users.*', 'medical_histories.*','medical_history_details.*')
            ->where('users.id', $id)
            ->get();


        $examinations = DB::table('users')
            ->join('reservations', 'users.id', '=', 'reservations.user_id')
            ->join('examinations', 'reservation_id', '=', 'reservations.id')
            ->select('examinations.*','reservations.*')
            ->where('users.id', $id)
            ->get();


        $complains = DB::table('users')
            ->join('reservations', 'users.id', '=', 'reservations.user_id')
            ->join('complains', 'reservation_id', '=', 'reservations.id')
            ->join('complain_details', 'complain_id', '=', 'complains.id')
            ->select('complains.*','reservations.*','complain_details.*')
            ->where('users.id', $id)
            ->get();

        $medicines = DB::table('users')
            ->join('reservations', 'users.id', '=', 'reservations.user_id')
            ->join('prescriptions', 'reservation_id', '=', 'prescriptions.id')
            ->join('prescription_details', 'preception_id', '=', 'prescription_details.id')
            ->select('prescriptions.*','prescription_details.*','reservations.*')
            ->where('users.id', $id)
            ->get();
        
         $glassExams = DB::table('users')
            ->join('reservations', 'users.id', '=', 'reservations.user_id')
            ->join('exam_glasses', 'reservation_id', '=', 'reservations.id')
            ->select('exam_glasses.*','reservations.date')
            ->where('users.id', $id)
            ->get();

        return view('user_profiles.index', compact('doctorRole','histories', 'examinations', 'userInfo','complains','medicines','glassExams'));
	}
}
