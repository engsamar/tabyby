<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\MedicalHistoryDetail;
use Illuminate\Http\Request;

class MedicalHistoryDetailController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$medical_history_details = MedicalHistoryDetail::orderBy('id', 'desc')->paginate(10);

		return view('medical_history_details.index', compact('medical_history_details'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('medical_history_details.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$medical_history_detail = new MedicalHistoryDetail();

		$medical_history_detail->description = $request->input("description");

		$medical_history_detail->save();

		return redirect()->route('medical_history_details.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$medical_history_detail = MedicalHistoryDetail::findOrFail($id);

		return view('medical_history_details.show', compact('medical_history_detail'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$medical_history_detail = MedicalHistoryDetail::findOrFail($id);

		return view('medical_history_details.edit', compact('medical_history_detail'));
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
		$medical_history_detail = MedicalHistoryDetail::findOrFail($id);

		$medical_history_detail->description = $request->input("description");

		$medical_history_detail->save();

		return redirect()->route('medical_history_details.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$medical_history_detail = MedicalHistoryDetail::findOrFail($id);
		$medical_history_detail->delete();

		return redirect()->route('medical_history_details.index')->with('message', 'Item deleted successfully.');
	}

}
