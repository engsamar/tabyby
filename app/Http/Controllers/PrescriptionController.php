<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$prescriptions = Prescription::orderBy('id', 'desc')->paginate(10);

		return view('prescriptions.index', compact('prescriptions'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('prescriptions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$prescription = new Prescription();

		

		$prescription->save();

		return redirect()->route('prescriptions.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$prescription = Prescription::findOrFail($id);

		return view('prescriptions.show', compact('prescription'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$prescription = Prescription::findOrFail($id);

		return view('prescriptions.edit', compact('prescription'));
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
		$prescription = Prescription::findOrFail($id);

		

		$prescription->save();

		return redirect()->route('prescriptions.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$prescription = Prescription::findOrFail($id);
		$prescription->delete();

		return redirect()->route('prescriptions.index')->with('message', 'Item deleted successfully.');
	}

}
