<?php 
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ClinicConstants;
use App\Reservation;
use App\Clinic;
use App\User;
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
		$address=[];
		foreach ($clinic as $key => $value) {
			array_push($address, $value->address);
		}
		return view('reservations.create',['status' => ClinicConstants::$status],['reserveType' => ClinicConstants::$reservationType])->with('address', $address);
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
		$user_name  = $request->input("name");
		$user  = User::where('username',$user_name)->value('id');
		$reservation->time = $request->input("time");
        $reservation->status = $request->input("status");
        $reservation->user_id = $user;
        $reservation->clinic_id = 1;
        $reservation->reservation_type_id = 1;
        // $reservation->parent_reservation_id =1;
		$reservation->save();

		return redirect()->route('reservations.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$reservation = Reservation::findOrFail($id);

		return view('reservations.show', compact('reservation'));
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
        $reservation->parent_reservation_id = $request->input("parent_reservation_id");

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
