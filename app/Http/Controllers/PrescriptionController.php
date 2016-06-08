<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Prescription;
use App\PrescriptionDetail;
use Illuminate\Http\Request;

class PrescriptionController extends Controller {

	public function index()
	{
		$prescriptions = Prescription::orderBy('id', 'desc')->paginate(10);

		return view('prescriptions.index', compact('prescriptions'));

	}

	public function create()
	{
		return view('prescription_details.create');
	}


	public function store(Request $request)
	{
		$prescription = new Prescription();
		$prescription->save();


        return redirect()->route('prescription_details.index')->with('message', 'Item created successfully.');
	}

	public function show($id)
	{
		$prescription = Prescription::findOrFail($id);
		return view('prescriptions.show', compact('prescription'));
	}

	public function edit($id)
	{
		$prescription = Prescription::findOrFail($id);

		return view('prescriptions.edit', compact('prescription'));
	}

	public function update(Request $request, $id)
	{
		$prescription = Prescription::findOrFail($id);
		$prescription->save();

		return redirect()->route('prescriptions.index')->with('message', 'Item updated successfully.');
	}

	public function destroy($id)
	{
		$prescription = Prescription::findOrFail($id);
		$prescription->delete();

		return redirect()->route('prescriptions.index')->with('message', 'Item deleted successfully.');
	}

}
