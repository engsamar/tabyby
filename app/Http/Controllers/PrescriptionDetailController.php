<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ClinicConstants;

use App\Medicine;
use App\Prescription;
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
		$medicineType= ClinicConstants::$medicineType;
//		$prescription= Prescription::all();
		$exist=Prescription::where('reservation_id','=','2')->get();
		if (count($exist)==0){
//			echo "<pre>";
//			var_dump($exist);
//			echo "</pre>";
//			die("end");
		$prescription= new Prescription();
		$prescription->reservation_id=2;
		$prescription->save();
		}
		return view('prescription_details.create',compact('medicineType'));
	}

	public function store(Request $request)
	{
		$prescription_detail = new PrescriptionDetail();
		$prescription_detail->medicine_name = $request->input("medicine_name");
		$prescription_detail->no_times = $request->input("no_times");
		$prescription_detail->quantity = $request->input("quantity");
		$medicine= Medicine::where('name','=',$request->input("medicine_name"))->first();
//		echo "<pre>";
//		var_dump($medicine->id);
//		echo "</pre>";
//		die("end");
		$prescription_detail->medicine_id =$medicine->id;
		$prescription_detail->duaration = $request->input("duration");
		$prescription= Prescription::where('reservation_id','=','2')->first();
		$prescription_detail->preception_id =$prescription->id;
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
		$prescription= Prescription::where('reservation_id','=','1');
		$prescription_detail->preception_id =$prescription->id;

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
