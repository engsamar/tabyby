<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\WorkingHour;
use Illuminate\Http\Request;

class WorkingHourController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$working_hours = WorkingHour::orderBy('id', 'desc')->paginate(10);

		return view('working_hours.index', compact('working_hours'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('working_hours.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$working_hour = new WorkingHour();

		$working_hour->from = $request->input("from");
        $working_hour->to = $request->input("to");
        $working_hour->day = $request->input("day");
        $working_hour->clinic_id = 1;

		$working_hour->save();

		return redirect()->route('working_hours.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$working_hour = WorkingHour::findOrFail($id);

		return view('working_hours.show', compact('working_hour'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$working_hour = WorkingHour::findOrFail($id);

		return view('working_hours.edit', compact('working_hour'));
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
		$working_hour = WorkingHour::findOrFail($id);

		$working_hour->from = $request->input("from");
        $working_hour->to = $request->input("to");
        $working_hour->day = $request->input("day");
        $working_hour->clinic_id = $request->input("clinic_id");

		$working_hour->save();

		return redirect()->route('working_hours.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$working_hour = WorkingHour::findOrFail($id);
		$working_hour->delete();

		return redirect()->route('working_hours.index')->with('message', 'Item deleted successfully.');
	}

}
