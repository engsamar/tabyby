<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PrescriptionDetail;
use Illuminate\Http\Request;

class PrescriptionDetailController extends Controller {

	public function index()
	{
		$prescription_details = PrescriptionDetail::orderBy('id', 'desc')->paginate(10);

		return view('prescription_details.index', compact('prescription_details'));
	}

	public function create()
	{
		return view('prescription_details.create');
	}

	public function store(Request $request)
	{
		$prescription_detail = new PrescriptionDetail();

		$prescription_detail->medicine_name = $request->input("medicine_name");
        $prescription_detail->no_times = $request->input("no_times");
        $prescription_detail->quantity = $request->input("quantity");
        $prescription_detail->duration = $request->input("duration");
        $prescription_detail->preception_id = $request->input("preception_id");

		$prescription_detail->save();

		return redirect()->route('prescription_details.index')->with('message', 'Item created successfully.');
	}

	public function show($id)
	{
		$prescription_detail = PrescriptionDetail::findOrFail($id);

		return view('prescription_details.show', compact('prescription_detail'));
	}

	public function edit($id)
	{
		$prescription_detail = PrescriptionDetail::findOrFail($id);

		return view('prescription_details.edit', compact('prescription_detail'));
	}

	public function update(Request $request, $id)
	{
		$prescription_detail = PrescriptionDetail::findOrFail($id);
		$prescription_detail->medicine_name = $request->input("medicine_name");
        $prescription_detail->no_times = $request->input("no_times");
        $prescription_detail->quantity = $request->input("quantity");
        $prescription_detail->duration = $request->input("duration");
        $prescription_detail->preception_id = $request->input("preception_id");

		$prescription_detail->save();

		return redirect()->route('prescription_details.index')->with('message', 'Item updated successfully.');
	}

	public function destroy($id)
	{
		$prescription_detail = PrescriptionDetail::findOrFail($id);
		$prescription_detail->delete();

		return redirect()->route('prescription_details.index')->with('message', 'Item deleted successfully.');
	}

}
