<?php 
namespace App\Http\Controllers;
use App\WorkingHour;
use Carbon\Carbon;
use \DateTime;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\ClinicConstants;
use App\Secertary;
use App\Vacation;
use App\Reservation;
use App\Clinic;
use App\UserRole;
use App\User;
use App\MedicalHistory;
use App\Examination;
use DB;
use Auth;
use Illuminate\Http\Request;
use App\ComplainDetail;
class ReservationController extends Controller {

	public function index()
	{
		$doctorRole = UserRole::where('type', '=', 0)->firstOrFail();
		$reservations = Reservation::where('status','>=',2)->orderBy('status', 'asc')->paginate(10);
		$user = Auth::user();
		$userRole = UserRole::where('user_id', '=', $user->id)->value('type');
		$examPatients = Reservation::where('date', '=',Carbon::today()->toDateString())->where('status','>=',2)->where('status','<=',3)->orderBy('appointment', 'asc')->first();
		$reserveType =ClinicConstants::$reservationType;
		$status= ClinicConstants::$status;
		$clinic = Clinic::all();

		return view('reservations.index', compact('reservations','examPatients','status','reserveType','userRole','doctorRole','clinic'))->with('message',"")->with('userRoleType',$userRole);
	}

	public function patientReservations()
	{
		$doctorRole = UserRole::where('type', '=', 0)->firstOrFail();
		$reservations = Reservation::where('user_id', '=',Auth::user()->id)->where('status', '>',0)->paginate(3);
		$cancel_reservations = Reservation::where('user_id', '=',Auth::user()->id)->where('status', '=',0)->paginate(3);

		$user = Auth::user();
		$userRole = UserRole::where('user_id', '=', $user->id)->value('type');

		$reserveType =ClinicConstants::$reservationType;
		$status= ClinicConstants::$status;
		$doctorRole = UserRole::where('type', '=', 0)->firstOrFail();

		return view('reservations.patient_reservations', compact('reservations','cancel_reservations','status','reserveType','userRole'),['doctorRole'=>$doctorRole])->with('message',"")->with('userRoleType',$userRole);


	}

	public function create()
	{
		$doctorRole = UserRole::where('type', '=', 0)->firstOrFail();
		$clinic = Clinic::all();
		$appointments=WorkingHour::all();
		$user = Auth::user();
		$userRole = UserRole::where('user_id', '=', $user->id)->value('type');
		$doctorRole = UserRole::where('type', '=', 0)->firstOrFail();

		return view('reservations.create',['status' => ClinicConstants::$status],['reserveType' => ClinicConstants::$reservationType,'doctorRole'=>$doctorRole])->with('userRole',$userRole)->with('address', $clinic)->with('appointment', $appointments)->with('message',"error")->with('userRoleType',$userRole);
	}


	public function store(Request $request)
	{
		$this->validate($request, [
          // 'name' => 'required|string',
            'date' => 'required|date',
        ]);
		$reservation = new Reservation();
		$no_of_patient=0 ;
		$no_of_reserve=0;
		$from_time="";
		$message="";
		$user = Auth::user();
		$userRole = UserRole::where('user_id', '=', $user->id)->value('type');
		$userRoleID = UserRole::where('user_id', '=', $user->id)->value('id');
		$dateCheck=$request->input("date");
		#to clinic id 
		if ($userRole == 0){
			$clinic_id=$request->input("clinic_id");
		}elseif ($userRole == 1) {
			# code...
			$clinic_id=Secertary::where('userRole_id', '=', $userRoleID)->value('clinic_id');
		}
		else{
			
			$clinic_id = $request->input("address");
		}

		if ($userRole == 0) {
			$now=Carbon::today();
			$dateCheck= $now->addDays($request->input("date"))->toDateString();
		}
		else{
			
			$dateTime = DateTime::createFromFormat('m/d/Y', $dateCheck);
			$dateCheck = $dateTime->format('Y-m-d');
		}
		#status waiting
		$reservation->status = 3;
		$reservation->date=$dateCheck;

		$vacations=Vacation::where('from_day','<=',$dateCheck)->where('to_day','>=',$dateCheck)->count();
		if($vacations){
			return Redirect::back()->withErrors(['msg', 'this date is not available, it is vacation, try with aother date']);

			//return redirect()->route('reservations.create')->with('message',$message);
			
		}else{
			$working_hs = WorkingHour::where('clinic_id',$clinic_id)->where('day',date('l',strtotime($dateCheck)))->count();
			if ($working_hs>1) {
				# code...$workingHour
			$workingHour = $request->input("workingHour");
			$working_hours = WorkingHour::where('id',$workingHour)->get();
			
			foreach ($working_hours as $working_hour) {
				$from_time=$working_hour->fromTime;
				$no_of_patient=(strtotime($working_hour->toTime)-strtotime($working_hour->fromTime))/(15*60);
				}		
			}else{
				$working_hours = WorkingHour::where('clinic_id',$clinic_id)->where('day',date('l',strtotime($dateCheck)))->get();
				foreach ($working_hours as $working_hour) {
				$from_time=$working_hour->fromTime;
				$no_of_patient=(strtotime($working_hour->toTime)-strtotime($working_hour->fromTime))/(15*60);
				}			
			
			}
			
			$no_of_reserve = Reservation::where('date', $dateCheck)->where('clinic_id',$clinic_id)->where('status','>',0)->count();
			if ($no_of_reserve < $no_of_patient) {
				
				$reservation->date = $dateCheck;
				//doctor reservation
				if($userRole==0)
				{
					$reservation->user_id=$request->input("user_id");
					$reservation->clinic_id=$request->input("clinic_id");
					$reservation->parent_id=$request->input("res_id");
					if ($request->input("res_type_id")<4 && $request->input("res_type_id")>=0) 
					{
						$reservation->reservation_type_id=$request->input("res_type_id")+1;
					}else{

						return Redirect::back()->withErrors(['msg', 'this patient take three Consultation, try to reserve new examination']);
					}
					


				}

 		// secertary reservation
				elseif($userRole==1) {
					$secertary_clinic=Secertary::where('userRole_id', '=', $userRoleID)->value('clinic_id');
					$reservation->clinic_id=$secertary_clinic;					
					$reservation->reservation_type_id =$request->input("examination");
					$reservation->parent_id =null;
					$user_name  = $request->input("name");
					$reservation->user_id  = User::where('username',$request->input("name"))->value('id');
				}
 		// patient reservation
				else
				{
					$reservation->clinic_id = $request->input("address");
					$reservation->reservation_type_id =$request->input("examination");
					$reservation->parent_id =null;
					$reservation->user_id =$user->id;
				}
				$reserveTime = strtotime("+".(($no_of_reserve)*15)." minutes", strtotime($from_time));

				/*if ($no_of_reserve != 0) {
					//$no_of_reserve=$no_of_reserve+1;
					$reserveTime = strtotime("+".(($no_of_reserve)*15)." minutes", strtotime($from_time));
				}else{
					$reserveTime = strtotime($from_time);

				}*/
				
				$reservation->appointment=date('h:i:s', $reserveTime);

				$reservationCheck = Reservation::where('date',$dateCheck)->where('user_id',$reservation->user_id)->count();
				if (!$reservationCheck){
					$reservationCh = Reservation::where('user_id',$reservation->user_id)->orderBy('user_id','desc')->first();
					if ($reservationCh!=NULL){
						$status= $reservationCh->status;
						if($status==3){
						return Redirect::back()->withErrors(['msg', 'you have another reservation that doesn\'t attend your appointment at '.$reservationCh->appointment.' -- '.$reservationCh->date]);


						}else{
							$reservation->save();
							$message="The reservation is saved";
						}
					}else{
						$reservation->save();
						echo "save";

						$message="The reservation is saved";
					}

				}else{
					$message="this reservation already exist in this date";
					return Redirect::back()->withErrors(['msg', 'this reservation already exist in this date']);
					//return redirect('reservations/create')->with('message',$message);
				}


			}
			else{
				$message="this date is fully completed , please try with another one ";
				return Redirect::back()->withErrors(['msg', 'this date is fully completed , please try with another one']);
			}
		}
		if (Auth::user()->userRoles[0]->type==2) {
			# code...

			return redirect('/patientReservation')->with('message',$message);

		}else{
			return redirect()->route('reservations.index')->with('message',$message);

		}
	}

	public function show($id)
	{
		$doctorRole = UserRole::where('type', '=', 0)->firstOrFail();
		$usery = DB::table('users')
		->join('reservations', 'users.id', '=', $id)
		->get(); 

		$user_id = $usery->id;
		$reservation = Reservation::findOrFail($id);
		$userInfo = DB::table('users')->where('users.id', $user_id)->get();

		$histories = DB::table('users')
		->join('medical_histories', 'users.id', '=', 'medical_histories.user_id')
		->join('medical_history_details', 'medical_history_id', '=', 'medical_histories.id')
		->select('users.*', 'medical_histories.*','medical_history_details.*')
		->where('medical_histories.user_id', $user_id)
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
		
		$user = Auth::user();
		$userRoleType = UserRole::where('user_id', '=', $user->id)->value('type');
		return view('reservations.show', compact('doctorRole','userRoleType','reservation','histories', 'examinations', 'userInfo','complains','medicines','status','reserveType','medicalHistoryType'));
	}

	public function edit($id)
	{
		$doctorRole = UserRole::where('type', '=', 0)->firstOrFail();
		$reservation = Reservation::findOrFail($id);

		return view('reservations.edit', compact('reservation','doctorRole'));
	}

	public function update(Request $request, $id)
	{
		$this->validate($request, [
            'date' => 'required|date',
        ]);
		$doctorRole = UserRole::where('type', '=', 0)->firstOrFail();
		$reservation = Reservation::findOrFail($id);

		$reservations = Reservation::where('date','=',$reservation->date)->where('id','>',$id)->get();

		$no_of_patient=0 ;
		$no_of_reserve=0;
		$from_time="";
		$message="";
		$user = Auth::user();
		$userRole = UserRole::where('user_id', '=', $user->id)->value('type');
		$userRoleID = UserRole::where('user_id', '=', $user->id)->value('id');
		$dateCheck=$request->input("date");
		#to clinic id foreach
		$clinic_id=$request->input("clinic_id");

		$dateTime = DateTime::createFromFormat('m/d/Y', $dateCheck);
		$dateCheck = $dateTime->format('Y-m-d');
		#status waiting
		$reservation->status = 3;
		$reservation->date=$dateCheck;

		$vacations=Vacation::where('from_day','<=',$dateCheck)->where('to_day','>=',$dateCheck)->count();
		if($vacations){
			return Redirect::back()->withErrors(['msg', 'this date is not available, it is vacation, try with aother date']);
			
		}else{
			
			$working_hours = WorkingHour::where('clinic_id',$clinic_id)->where('day',date('l',strtotime($dateCheck)))->get();
			foreach ($working_hours as $working_hour) {
				$from_time=$working_hour->fromTime;
				$no_of_patient=(strtotime($working_hour->toTime)-strtotime($working_hour->fromTime))/(15*60);
			}
			
			$no_of_reserve = Reservation::where('date', $dateCheck)->where('clinic_id',$clinic_id)->where('status','>',0)->count();

			if ($no_of_reserve < $no_of_patient) {
				
				$reservation->date = $dateCheck;
				$reserveTime = strtotime("+".(($no_of_reserve)*15)." minutes", strtotime($from_time));

				$reservation->appointment=date('h:i:s', $reserveTime);
				$reservation->date = $dateCheck;
				$reservation->status = $request->input("status");
				$reservation->user_id = $request->input("user_id");
				$reservation->clinic_id = $request->input("clinic_id");
				$reservation->reservation_type_id = $request->input("reservation_type_id");
				$reservation->parent_id = $request->input("parent_id");
				$reservation->save();
				foreach ($reservations as $value) {
					$value->appointment=date('h:i:s', strtotime("- 15 minutes", strtotime($value->appointment)));
					$value->save();
				}

				//$reservations->update(array('appointment' => 'asdasd'));
				echo "save";

				$message="The reservation is saved";


			}
			else{
				$message="this date is fully completed , please try with another one ";
				echo $message;
				die();
				return redirect()->route('reservations.create')->with('message',$message);
			}
		}

		if (Auth::user()->userRoles[0]->type==2) {
			# code...
			return redirect('/patientReservation')->with('message',$message);

		}else{
			return redirect()->route('reservations.index')->with('message',$message);
			
		}
	}

	public function destroy($id)
	{
		$reservation = Reservation::findOrFail($id);
		$reservations = Reservation::where('date','=',$reservation->date)->where('status','>',0)->where('id','>',$id)->get();

		//$reservation->delete();
		$reservation->status=0;

		$reservation->save();
		foreach ($reservations as $value) {
			$value->appointment=date('h:i:s', strtotime("- 15 minutes", strtotime($value->appointment)));
			$value->save();
		}
		if (Auth::user()->userRoles[0]->type==2) {
			# code...
			return redirect('/patientReservation')->with('message','Item cancelled successfully.');

		}else{
			return redirect()->route('reservations.index')->with('message','Item cancelled successfully.');
			
		}
	}

	public function existed($id)
	{
		$reservation = Reservation::findOrFail($id);
		$reservation->status=2;

		$reservation->save();

		//return redirect()->route('reservations.index')->with('message', 'Item cancelled successfully.');
		return Redirect::back()->withErrors(['msg', 'this date is not available, it is vacation, try with aother date']);
	}

	public function latest()
	{
		$user = Auth::user();
		$userRole = UserRole::where('user_id', '=', $user->id)->value('type');
		$reservations = Reservation::where('status','>',0)->where('date', '=',Carbon::today()->toDateString())->where('status','>=',2)->where('status','<=',3)->orderBy('appointment', 'asc')->paginate(10);
		$reserveType =ClinicConstants::$reservationType;
		$status= ClinicConstants::$status;
		$message="";
		$clinic = Clinic::all();

		$examPatients = Reservation::where('date', '=',Carbon::today()->toDateString())->where('status','>=',2)->where('status','<=',3)->orderBy('appointment', 'asc')->first();

		return view('reservations.index', compact('clinic','message','reservations','status','reserveType','userRole','examPatients'))->with('userRoleType',$userRole );
	}

	public function cancel()
	{
		$user = Auth::user();
		$userRole = UserRole::where('user_id', '=', $user->id)->value('type');
		$reservations = Reservation::where('status','=',0)->paginate(10);
		$reserveType =ClinicConstants::$reservationType;
		$status= ClinicConstants::$status;
	//	return redirect()->route('reservations.index')->with('message', '');
		$message="";
		$examPatients = Reservation::where('date', '=',Carbon::today()->toDateString())->where('status','>=',2)->where('status','<=',3)->orderBy('appointment', 'asc')->first();

		return view('reservations.index', compact('message','examPatients','reservations','status','reserveType','userRole'))->with('userRoleType',$userRole );
		
	}
	public function exitReserv($id)
	{
		$reservation = Reservation::findOrFail($id);
		$reservation->status=4;
		$reservation->save();
		return redirect()->route('reservations.index')->with('message', 'Examination Done');
	}
	public function nextReserv($id)
	{
		$reservation = Reservation::findOrFail($id);
		$reservation->status=4;
		$reservation->save();

		$examPatients = Reservation::where('date', '=',Carbon::today()->toDateString())->where('status','>=',2)->where('status','<=',3)->orderBy('appointment', 'asc')->first();
		$examPatientNo = Reservation::where('status','>=',2)->where('status','<=',3)->orderBy('appointment', 'asc')->count();
		if ($examPatientNo>0) {
		return redirect('/all_reservation/'.$examPatients->user_id)->with('examPatients','examPatients')->with('examPatientNo','examPatientNo');
			# code...
		}else{
			$examPatients = Reservation::where('date', '=',Carbon::today()->toDateString())->where('status','=',4)->orderBy('appointment', 'desc')->first();
		return redirect('/all_reservation/'.$examPatients->user_id)->with('examPatients','examPatients')->with('examPatientNo','examPatientNo');

		}
		    
		/*if ($examPatientNo>0) {
			return redirect('/all_reservation/'.$examPatients->user_id,compact('examPatientNo'));
			
		}else{
			return Redirect::back()->withErrors(['msg', 'This is no other reservation ,Exit if you want']);

		}*/

	}

	public function getReservations($id)
	{

		$reservations = Reservation::where('user_id', $id)->get();
		$reserveType =ClinicConstants::$reservationType;
		$status= ClinicConstants::$status;
		$medicalHistoryType=ClinicConstants::$medicalHistoryType;
		$user = Auth::user();
		$examPatients = Reservation::where('date', '=',Carbon::today()->toDateString())->where('status','>=',2)->where('status','<=',3)->orderBy('appointment', 'asc')->first();
		
		$examPatientNo = Reservation::where('status','>=',2)->where('status','<=',3)->orderBy('appointment', 'asc')->count();

		$userRoleType = UserRole::where('user_id', '=', $user->id)->value('type');

		return view('reservations.all_reservations', compact('examPatients','userRoleType','reservations','status','reserveType','medicalHistoryType'),['examGlassType' => ClinicConstants::$examGlassType])->with('examPatientNo',$examPatientNo);
		   
	}

	public function info($id)
	{
		$reservations = Reservation::where('user_id', $id)->get();
		$personal_info = [];
		foreach ($reservations as $reservation) {
			$personal_info = $reservation->user;
			print_r($personal_info);
			die();
		}
		
		return view('users.profile', compact('userRoleType','reservations', 'personal_info','status','reserveType','medicalHistoryType'));	

	}

	public function patientInfo($id)
	{

		$reservations = Reservation::where('user_id', $id)->get();
		print_r($reservations->user);
		die();

		$usery = DB::table('users')
		->join('reservations', 'users.id', '=','reservations.user_id')
		->where('reservations.user_id',$id)
		->get();

		$user_id = null;
		foreach ($usery as $value) {
			$user_id = $value->id;
		}

		$reservation = Reservation::findOrFail($id);
		$userInfo = DB::table('users')->where('users.id', $user_id)->get();

		$histories = DB::table('users')
		->join('medical_histories', 'users.id', '=', 'medical_histories.user_id')
		->join('medical_history_details', 'medical_history_id', '=', 'medical_histories.id')
		->select('users.*', 'medical_histories.*','medical_history_details.*')
		->where('users.id', $user_id)
		->get();


		$examinations = DB::table('users')
		->join('reservations', 'users.id', '=', 'reservations.user_id')
		->join('examinations', 'reservation_id', '=', 'reservations.id')
		->select('examinations.*','reservations.*')
		->where('examinations.reservation_id', $id)
		->where('users.id',$user_id)
		->get();


		$complains = DB::table('users')
		->join('reservations', 'users.id', '=', 'reservations.user_id')
		->join('complains', 'reservation_id', '=', 'reservations.id')
		->join('complain_details', 'complain_id', '=', 'complains.id')
		->select('complains.*','reservations.*','complain_details.*')
		->where('complains.reservation_id', $id)
		->where('users.id',$user_id)
		->get();

		$medicines = DB::table('users')
		->join('reservations', 'users.id', '=', 'reservations.user_id')
		->join('prescriptions', 'reservation_id', '=', 'prescriptions.id')
		->join('prescription_details', 'preception_id', '=', 'prescription_details.id')
		->select('prescriptions.*','prescription_details.*','reservations.*')
		->where('prescriptions.reservation_id', $id)
		->where('users.id',$user_id)
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

	public function searchKey($key)
	{
		$query= User::where('username', 'like', $key.'%')->get();
		return $query;


	}

	public function getReservationByName(Request $request)
	{
		$name = $request->input("name");
		$userId = User::where('username', '=', $name)->value('id');
		$reservations = Reservation::where('user_id', '=',$userId)->paginate(10);;
		$user = Auth::user();
		$userRole = UserRole::where('user_id', '=', $user->id)->value('type');
		$reserveType =ClinicConstants::$reservationType;
		$status= ClinicConstants::$status;
		$message="";
		$examPatients = Reservation::where('date', '=',Carbon::today()->toDateString())->where('status','>=',2)->where('status','<=',3)->orderBy('appointment', 'asc')->first();

		return view('reservations.index', compact('examPatients','message','reservations','status','reserveType','userRole'))->with('userRoleType',$userRole );
	}
	public function getReservationByDate(Request $request)
	{
		$dateCheck = $request->input("date");
		$dateTime = DateTime::createFromFormat('m/d/Y', $dateCheck);
		$dateCheck = $dateTime->format('Y-m-d');
		$reservations = Reservation::where('date', '=',$dateCheck)->paginate(10);
		$reserveType =ClinicConstants::$reservationType;
		$status= ClinicConstants::$status;
		$message="";
		$user = Auth::user();
		$userRole = UserRole::where('user_id', '=', $user->id)->value('type');
		$examPatients = Reservation::where('date', '=',Carbon::today()->toDateString())->where('status','>=',2)->where('status','<=',3)->orderBy('appointment', 'asc')->first();

		return view('reservations.index', compact('examPatients','message','reservations','status','reserveType','userRole'))->with('userRoleType',$userRole );
	}
	public function getReservationByDateAndName(Request $request)
	{
		$dateCheck = $request->input("date");
		$name = $request->input("name");
		$userId = User::where('username', '=', $name)->value('id');
		$dateTime = DateTime::createFromFormat('m/d/Y', $dateCheck);
		$dateCheck = $dateTime->format('Y-m-d');
		$reservations = Reservation::where('date', '=',$dateCheck)->where('user_id', '=',$userId)->paginate(10);
		$reserveType =ClinicConstants::$reservationType;
		$status= ClinicConstants::$status;
		$message="";
		$user = Auth::user();
		$userRole = UserRole::where('user_id', '=', $user->id)->value('type');
		//return $reservations;
		$examPatients = Reservation::where('date', '=',Carbon::today()->toDateString())->where('status','>=',2)->where('status','<=',3)->orderBy('appointment', 'asc')->first();

		return view('reservations.index', compact('examPatients','message','reservations','status','reserveType','userRole'))->with('userRoleType',$userRole );
	}
	public function getReservationByDuration(Request $request)
	{
		$dateCheckFrom = $request->input("fromTime");
		$dateTime = DateTime::createFromFormat('m/d/Y', $dateCheckFrom);
		$dateCheckFrom = $dateTime->format('Y-m-d');

		$dateCheckTo = $request->input("toTime");
		$dateTime = DateTime::createFromFormat('m/d/Y', $dateCheckTo);
		$dateCheckTo = $dateTime->format('Y-m-d');

		$reservations = Reservation::where('date', '>=',$dateCheckFrom)->where('date', '<=',$dateCheckTo)->paginate(10);
		$reserveType =ClinicConstants::$reservationType;
		$status= ClinicConstants::$status;
		$user = Auth::user();
		$userRole = UserRole::where('user_id', '=', $user->id)->value('type');
		$message="";
		$examPatients = Reservation::where('date', '=',Carbon::today()->toDateString())->where('status','>=',2)->where('status','<=',3)->orderBy('appointment', 'asc')->first();

		return view('reservations.index', compact('examPatients','message','reservations','status','reserveType','userRole'))->with('userRoleType',$userRole );
	}
	public function checkReservDate($date,$clinic_id)
	{
		$vacations=Vacation::where('from_day','<=',$date)->where('to_day','>=',$date)->count();
		if($vacations){
			return "vacation";
		}
		else{
			$working_hours = WorkingHour::where('clinic_id',$clinic_id)->where('day',date('l',strtotime($date)))->count();
			if ($working_hours==0) {
				return 'noTime';
			}
			if($working_hours>1)
			{
				$working_hours = WorkingHour::where('clinic_id',$clinic_id)->where('day',date('l',strtotime($date)))->get();
				return $working_hours;
				
			}else{
				$working_hours = WorkingHour::where('clinic_id',$clinic_id)->where('day',date('l',strtotime($date)))->get();
				foreach ($working_hours as $working_hour) 
				{
					$no_of_patient=(strtotime($working_hour->toTime)-strtotime($working_hour->fromTime))/(15*60);
					$no_of_reserve = Reservation::where('date', $dateCheck)->where('clinic_id',$clinic_id)->where('status','>',0)->count();

					if ($no_of_reserve >= $no_of_patient) 
					{
						return "complete";
					}
				}
			}
		}
	}
}
