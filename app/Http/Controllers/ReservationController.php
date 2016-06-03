<?php 
namespace App\Http\Controllers;
use App\WorkingHour;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ClinicConstants;
use App\Reservation;
use App\Clinic;
use App\User;
use App\MedicalHistory;
use App\Examination;
use DB;
use Illuminate\Http\Request;
class ReservationController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// $mytime = Carbon::now();
		// $reservations = Reservation::where('time',$mytime->toDateTimeString());
		$reservations = Reservation::orderBy('id', 'desc')->paginate(10);

		return view('reservations.index', compact('reservations'));
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
		// $address=[];
		// foreach ($clinic as $key => $value) {
		// 	array_push($address, $value->address);
		// }
//		echo "<pre>";
//		var_dump($appointments);
//		echo "</pre>";
//		die();
		return view('reservations.create',['status' => ClinicConstants::$status],['reserveType' => ClinicConstants::$reservationType])->with('address', $clinic)->with('appointment', $appointments);
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
		$reservation->time = $request->input("time");
        $reservation->status = "postponed";
        $reservation->clinic_id = $request->input("address");
		echo "<pre>";
		var_dump($request->input("day")	);
		echo "</pre>";
		die();
		DB::table('working_hours')->where('clinic_id', $request->input("address"))->increment('reservations_number');;
        $reservation->reservation_type_id = $request->input("reserveType");
        $user_name  = $request->input("name");
		$userID  = User::where('username',$user_name)->value('id');
        $reservation->user_id = $userID;
        // $count = Reservation::where('user_id',$userID)->count();
        // if($count==0)
        // {
        // 	$reservation->parent_id =null;
        // }
        // elseif ($count==1) {
        // 	$reservation->parent_id =;
        // }

        $count = Reservation::where('user_id',$userID)->count();
        if($count==0)
        {
        	$reservation->parent_id =null;
        }
        elseif ($count==1) {
        	$reservation->parent_id =Reservation::where('user_id',$userID)->value('id');
        }
        elseif ($count==2) {
        	$parent =Reservation::where('user_id',$userID)->skip(1)->take(1)->get();
        	foreach ($parent as $key => $value) {
        		$reservation->parent_id =$value->id;
        	}
        }
        elseif ($count==3) {
        	$parent =Reservation::where('user_id',$userID)->skip(2)->take(1)->get();
        	foreach ($parent as $key => $value) {
        		$reservation->parent_id =$value->id;
        	}
        }
		$reservation->save();

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
            ->where('users.id', $patient_id)
            ->get();


        $examinations = DB::table('users')
            ->join('reservations', 'users.id', '=', 'reservations.user_id')
            ->join('examinations', 'reservation_id', '=', 'reservations.id')
            ->select('examinations.*','reservations.*')
            ->where('users.id', $patient_id)
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
            ->where('users.id', $patient_id)
            ->get();

		return view('reservations.show', compact('reservation','histories', 'examinations', 'userInfo','complains','medicines'));
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

}
