<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\MedicalHistory;
use Illuminate\Http\Request;

class MedicalHistoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$medical_histories = MedicalHistory::orderBy('id', 'desc')->paginate(10);

		return view('medical_histories.index', compact('medical_histories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('medical_histories.create',['medicalHistoryType'=>ClinicConstants::$medicalHistoryType]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$medical_history = new MedicalHistory();

		$medical_history->type = $request->input("type");
        $medical_history->begin_at = $request->input("begin_at");
		$medical_history->user_id=1;
		$medical_history->save();

		return redirect()->route('medical_histories.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$medical_history = MedicalHistory::findOrFail($id);

		return view('medical_histories.show', compact('medical_history'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$medical_history = MedicalHistory::findOrFail($id);

		return view('medical_histories.edit', compact('medical_history'));
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
		$medical_history = MedicalHistory::findOrFail($id);

		$medical_history->type = $request->input("type");
        $medical_history->begin_at = $request->input("begin_at");

		$medical_history->save();

		return redirect()->route('medical_histories.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$medical_history = MedicalHistory::findOrFail($id);
		$medical_history->delete();

		return redirect()->route('medical_histories.index')->with('message', 'Item deleted successfully.');
	}

}
