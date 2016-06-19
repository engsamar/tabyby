<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ClinicConstants;
use App\Examination;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Reservation;

class ExaminationController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function doctorExamination($id)
	{

	 	$user = Auth::user();
		$userRoleType = \App\UserRole::where('user_id', '=', $user->id)->value('type');

		return view('examinations.insertExam',['eyeType' => ClinicConstants::$eyeType,'vision' => ClinicConstants::$vision,'res_id'=>$id, 'userRoleType'=>$userRoleType]);
	}

	public function index()
	{
		$user = Auth::user();
		$userRoleType = \App\UserRole::where('user_id', '=', $user->id)->value('type');

		$examinations = Examination::orderBy('id', 'asc')->paginate(10);

		return view('examinations.index', compact('examinations'),['eyeType' => ClinicConstants::$eyeType,'vision' => ClinicConstants::$vision, 'userRoleType'=>$userRoleType]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($res_id)
	{

        $user = Auth::user();
		$userRoleType = \App\UserRole::where('user_id', '=', $user->id)->value('type');

		return view('examinations.insertExam',['res_id'=>$res_id,
			'eyeType' => ClinicConstants::$eyeType,'vision' => ClinicConstants::$vision,
			'userRoleType'=>$userRoleType]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		
 		$lastReservation = Reservation::all()->last()->id; 
        $examinations = Examination::where("reservation_id", "=", $lastReservation)->get();
        foreach ($examinations as $exam) {
           $exam->delete();
        }

		$examination = new Examination();
		$examination1 = new Examination();
		$examination->eye_type = 1;
        $examination->vision = $request->input("vision");
        $examination->lid = $request->input("lid");
        $examination->conjunctiva = $request->input("conjunctiva");
        $examination->cornea = $request->input("cornea");
        $examination->a_c = $request->input("a_c");
        $examination->pupil = $request->input("pupil");
        $examination->lens = $request->input("lens");
        $examination->fundus = $request->input("fundus");
        $examination->i_o_p = $request->input("i_o_p");
        $examination->angle = $request->input("angle");
        $examination->reservation_id = $request->input("res_id");;
		$examination->save();

		$examination1->eye_type = 0;
		$examination1->vision = $request->input("vision1");
		$examination1->lid = $request->input("lid1");
		$examination1->conjunctiva = $request->input("conjunctiva1");
		$examination1->cornea = $request->input("cornea1");
		$examination1->a_c = $request->input("a_c1");
		$examination1->pupil = $request->input("pupil1");
		$examination1->lens = $request->input("lens1");
		$examination1->fundus = $request->input("fundus1");
		$examination1->i_o_p = $request->input("i_o_p1");
		$examination1->angle = $request->input("angle1");
		$examination1->reservation_id = $request->input("res_id");;

		$examination1->save();
		$user_id = User::where('users.id', '=', $request->input("res_id"))->value('id');
		

 		return redirect()->action('ReservationController@getReservations',[$examination->reservation->user["id"]]);   	// 	return redirect()->route('examinations.index')->with('message', 'Item created successfully.');
	 }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$examination = Examination::findOrFail($id);

		return view('examinations.show', compact('examination'),['eyeType' => ClinicConstants::$eyeType],['vision' => ClinicConstants::$vision]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$examination = Examination::findOrFail($id);

		return view('examinations.edit', compact('examination'),['eyeType' => ClinicConstants::$eyeType],['vision' => ClinicConstants::$vision]);
	}

	public function update(Request $request, $id)
	{
		$examination = Examination::findOrFail($id);

		$examination->eye_type = $request->input("eye_type");
        $examination->vision = $request->input("vision");
        $examination->lid = $request->input("lid");
        $examination->conjunctiva = $request->input("conjunctiva");
        $examination->cornea = $request->input("cornea");
        $examination->a_c = $request->input("a_c");
        $examination->pupil = $request->input("pupil");
        $examination->lens = $request->input("lens");
        $examination->fundus = $request->input("fundus");
        $examination->i_o_p = $request->input("i_o_p");
        $examination->angle = $request->input("angle");
        $examination->reservation_id = $request->input("reservation_id");

		$examination->save();

 		return redirect()->action('ReservationController@getReservations',[$examination->reservation->user["id"]]);   	// 	return redirect()->route('examinations.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$examination = Examination::findOrFail($id);
		$examination->delete();

		return redirect()->route('examinations.index')->with('message', 'Item deleted successfully.');
	}

}
