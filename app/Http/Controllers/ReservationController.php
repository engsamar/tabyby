<?php 
namespace App\Http\Controllers;
use App\WorkingHour;
use Carbon\Carbon;
use \DateTime;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ClinicConstants;
use App\Secertary;
use App\Vacation;
use App\Reservation;
use App\Clinic;
use App\User;
use App\MedicalHistory;
use App\Examination;
use DB;
use Auth;
use Illuminate\Http\Request;
class ReservationController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$reservations = Reservation::orderBy('id', 'desc')->paginate(10);
		$user = Auth::user();
		$userRole = \App\UserRole::where('user_id', '=', $user->id)->value('type');

		$reserveType =ClinicConstants::$reservationType;
		$status= ClinicConstants::$status;
		return view('reservations.index', compact('reservations','status','reserveType','userRole'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$clinic = Clinic::all();
		$appointments=WorkingHour::all();
		$user = Auth::user();
		$userRole = \App\UserRole::where('user_id', '=', $user->id)->value('type');
		return view('reservations.create',['status' => ClinicConstants::$status],['reserveType' => ClinicConstants::$reservationType])->with('userRole',$userRole)->with('address', $clinic)->with('appointment', $appointments);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$reservation = new Reservation();
		$no_of_patient="" ;
		$no_of_reserve="";
		$from_time="";
		$user = Auth::user();
		$userRole = \App\UserRole::where('user_id', '=', $user->id)->value('type');
		$userRoleID = \App\UserRole::where('user_id', '=', $user->id)->value('id');
		$dateCheck=$request->input("date");
		if ($userRole == 0) {
			$now=Carbon::today();
			$dateCheck= $now->addDays($request->input("date"))->toDateString();
        	// echo $dateCheck;
        	// die();
		}
		else{
			
			$dateTime = DateTime::createFromFormat('m/d/Y', $dateCheck);
			$dateCheck = $dateTime->format('Y-m-d');
		}
		$reservation->status = 2;
		$reservation->date=$dateCheck;

		$vacations=Vacation::where('from_day','<=',$dateCheck)->where('to_day','>=',$dateCheck)->count();
		if($vacations){
			echo "not available";
			die();
		}else{
			
			$working_hours = WorkingHour::where('clinic_id',1)->where('day',date('l',strtotime($dateCheck)))->get();
			foreach ($working_hours as $working_hour) {
				$from_time=$working_hour->fromTime;
				$no_of_patient=(strtotime($working_hour->toTime)-strtotime($working_hour->fromTime))/(15*60);
			}
			
			$no_of_reserve = Reservation::where('date', $dateCheck)->where('clinic_id',1)->count();

			if ($no_of_reserve < $no_of_patient) {
				
				$reservation->date = $dateCheck;
				//doctor reservation
				if($userRole==0)
				{
					$reservation->user_id=$request->input("user_id");
					$reservation->clinic_id=$request->input("clinic_id");
					$reservation->parent_id=$request->input("res_id");
					////////////////////check////////////////
					if ($request->input("res_type_id")<4 && $request->input("res_type_id")>=0) {
						# code...
						$reservation->reservation_type_id=$request->input("res_type_id")+1;
					}else{
						echo "this patient take three Consultation ,, ";
					}
					


				}

 		// secertary reservation
				elseif($userRole==1) {
					$secertary_clinic=Secertary::where('userRole_id', '=', $userRoleID)->value('clinic_id');
					$reservation->clinic_id=$secertary_clinic;					
					$reservation->reservation_type_id =$request->input("examination");
					$reservation->parent_id =null;
					$user_name  = $request->input("name");
					$reservation->user_id  = User::where('username',$user_name)->value('id');
					

				}
 		// patient reservation
				else
				{
					$reservation->clinic_id = $request->input("address");
					$reservation->reservation_type_id =$request->input("examination");
					$reservation->parent_id =null;
					$reservation->user_id =$user->id;
				}
				if ($no_of_reserve != 0) {
					$no_of_reserve=$no_of_reserve+1;
				}
				$reserveTime = strtotime("+".(($no_of_reserve)*15)." minutes", strtotime($from_time));
				$reservation->appointment=date('h:i:s', $reserveTime);

				$reservationCheck = Reservation::where('date',$dateCheck)->where('user_id',$reservation->user_id)->count();
				if (!$reservationCheck){
					$reservation->save();
					echo "save";
				}else{
					echo "this reservation already exist";
				}




			}
			else{
				echo "notallow";
				echo $no_of_reserve;
			}


			die();
		}



		return redirect()->route('reservations.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id,$patient_id)
	{
		$reservation = Reservation::findOrFail($id);
		$userInfo = DB::table('users')->where('users.id', $patient_id)->get();

		$histories = DB::table('users')
		->join('medical_histories', 'users.id', '=', 'medical_histories.user_id')
		->join('medical_history_details', 'medical_history_id', '=', 'medical_histories.id')
		->select('users.*', 'medical_histories.*','medical_history_details.*')
		->where('medical_histories.user_id', $patient_id)
		->get();


		$examinations = DB::table('users')
		->join('reservations', 'users.id', '=', 'reservations.user_id')
		->join('examinations', 'reservation_id', '=', 'reservations.id')
		->select('examinations.*','reservations.*')
		->where('examinations.reservation_id', $id)
		->get();


		$complains = DB::table('users')
		->join('reservations', 'users.id', '=', 'reservations.user_id')
		->join('complains', 'reservation_id', '=', 'reservations.id')
		->join('complain_details', 'complain_id', '=', 'complains.id')
		->select('complains.*','reservations.*','complain_details.*')
		->where('complains.reservation_id', $id)
		->get();



		$medicines = DB::table('users')
		->join('reservations', 'users.id', '=', 'reservations.user_id')
		->join('prescriptions', 'reservation_id', '=', 'prescriptions.id')
		->join('prescription_details', 'preception_id', '=', 'prescription_details.id')
		->select('prescriptions.*','prescription_details.*','reservations.*')
		->where('prescriptions.reservation_id', $id)
		->get();

		$reserveType =ClinicConstants::$reservationType;
		$status= ClinicConstants::$status;
		$medicalHistoryType=ClinicConstants::$medicalHistoryType;
		return view('reservations.show', compact('reservation','histories', 'examinations', 'userInfo','complains','medicines','status','reserveType','medicalHistoryType'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$reservation = Reservation::findOrFail($id);

		return view('reservations.edit', compact('reservation'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$reservation = Reservation::findOrFail($id);

		$reservation->time = $request->input("time");
		$reservation->status = $request->input("status");
		$reservation->user_id = $request->input("user_id");
		$reservation->clinic_id = $request->input("clinic_id");
		$reservation->reservation_type_id = $request->input("reservation_type_id");
		$reservation->parent_id = $request->input("parent_id");

		$reservation->save();

		return redirect()->route('reservations.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$reservation = Reservation::findOrFail($id);
		$reservation->delete();

		return redirect()->route('reservations.index')->with('message', 'Item deleted successfully.');
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function latest()
	{

		$user = Auth::user();
		$userRole = \App\UserRole::where('user_id', '=', $user->id)->value('type');
		$reservations = Reservation::where('date', '=',Carbon::today()->toDateString())->paginate(10);
		$reserveType =ClinicConstants::$reservationType;
		$status= ClinicConstants::$status;
		return view('reservations.index', compact('reservations','status','reserveType','userRole'));
	}


	public function patient($id,$patient_id)
	{
		$reservation = Reservation::findOrFail($id);
		//echo $patient_id;
		//die();
		$userInfo = DB::table('users')->where('users.id', $patient_id)->get();

		$histories = DB::table('users')
		->join('medical_histories', 'users.id', '=', 'medical_histories.user_id')
		->join('medical_history_details', 'medical_history_id', '=', 'medical_histories.id')
		->select('users.*', 'medical_histories.*','medical_history_details.*')
		->where('medical_histories.user_id', $patient_id)
		->get();


		$examinations = DB::table('users')
		->join('reservations', 'users.id', '=', 'reservations.user_id')
		->join('examinations', 'reservation_id', '=', 'reservations.id')
		->select('examinations.*','reservations.*')
		->where('examinations.reservation_id', $id)
		->get();


		$complains = DB::table('users')
		->join('reservations', 'users.id', '=', 'reservations.user_id')
		->join('complains', 'reservation_id', '=', 'reservations.id')
		->join('complain_details', 'complain_id', '=', 'complains.id')
		->select('complains.*','reservations.*','complain_details.*')
		->where('complains.reservation_id', $id)
		->get();



		$medicines = DB::table('users')
		->join('reservations', 'users.id', '=', 'reservations.user_id')
		->join('prescriptions', 'reservation_id', '=', 'prescriptions.id')
		->join('prescription_details', 'preception_id', '=', 'prescription_details.id')
		->select('prescriptions.*','prescription_details.*','reservations.*')
		->where('prescriptions.reservation_id', $id)
		->get();

		$reserveType =ClinicConstants::$reservationType;
		$status= ClinicConstants::$status;
		$medicalHistoryType=ClinicConstants::$medicalHistoryType;

		return view('reservations.show', compact('reservation','histories', 'examinations', 'userInfo','complains','medicines','status','reserveType','medicalHistoryType'));
	}
	public function patientReserv($id)
	{
		$reserveType =ClinicConstants::$reservationType;
		$status= ClinicConstants::$status;
		$reservations = Reservation::where('user_id',$id)->paginate(10);
		return view('reservations.userReserv', compact('reservations','status','reserveType'));
	}


	public function newRserve($reservation,$request)
	{
		// Mautual Data
		$reservation->status = 3;
		$clinicID = $request->input("address");
		$reservation->clinic_id = $request->input("address");
		//$reservation->date = $dateCheck;
		$no_of_reserve = Reservation::where('date', $reservation->date)->where('clinic_id',$clinicID)->count();
        //$reserveTime = strtotime("+".(($no_of_reserve+1)*15)." minutes", strtotime($pieces[2]));
        //$reservation->appointment=date('h:i:s', $reserveTime);
	}

}
