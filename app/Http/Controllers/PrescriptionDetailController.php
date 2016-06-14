<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ClinicConstants;
use Illuminate\Support\Facades\Redirect;
use App\Medicine;
use App\Prescription;
use App\PrescriptionDetail;
use Illuminate\Http\Request;
use Auth;

class PrescriptionDetailController extends Controller
{

    public function index()
    {
        $prescription_details = PrescriptionDetail::orderBy('id', 'desc')->paginate(10);

        return view('prescription_details.index', compact('prescription_details'));
    }

    public function create($res_id)
    {
        $user = Auth::user();
        $userRoleType = \App\UserRole::where('user_id', '=', $user->id)->value('type');
        $medicineType = ClinicConstants::$medicineType;

        $exist = Prescription::where('reservation_id', '=', $res_id)->get();
        if (count($exist) == 0) {
            $prescription = new Prescription();
            $prescription->reservation_id = $res_id;
            $prescription->save();
        }
        return view('prescription_details.create', compact('medicineType', 'res_id', 'userRoleType'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'medicine_name' => 'required|string',
            'no_times' => 'required|numeric|min:1|max:100',
            'quantity' => 'required|numeric|min:1|max:100',
            'duration' => 'required|numeric|min:1|max:100',
            'no_times' => 'required|numeric|min:1|max:100',
        ]);
        $prescription_detail = new PrescriptionDetail();
        if ($request->input("search_by") == 1) {
            $prescription_detail->medicine_name = $request->input("medicine_name");
            $prescription_detail->no_times = $request->input("no_times");
            $prescription_detail->quantity = $request->input("quantity");
            $medicine = Medicine::where('name', '=', $request->input("medicine_name"))->first();
            $prescription_detail->medicine_id = $medicine->id;
            $prescription_detail->duaration = $request->input("duration");
            $prescription = Prescription::where('reservation_id', '=', $request->input("res_id"))->first();
            $prescription_detail->prescription_id = $prescription->id;
        } else {
            $prescription_detail->medicine_id = $request->input("medicines_name");
            $prescription_detail->no_times = $request->input("no_times");
            $prescription_detail->quantity = $request->input("quantity");
            $medicine = Medicine::where('id', '=', $request->input("medicines_name"))->first();
            $prescription_detail->medicine_name = $medicine->name;
            $prescription_detail->duaration = $request->input("duration");
            $prescription = Prescription::where('reservation_id', '=', $request->input("res_id"))->first();
            $prescription_detail->prescription_id = $prescription->id;
        }
        $prescription_detail->save();
        return redirect()->action('ReservationController@getReservations',[$prescription->reservation->user["id"]]);
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
        $this->validate($request, [
            'medicine_name' => 'required|string',
            'no_times' => 'required|numeric|min:1|max:100',
            'quantity' => 'required|numeric|min:1|max:100',
            'duaration' => 'required|numeric|min:1|max:100',
            'no_times' => 'required|numeric|min:1|max:100',
        ]);
        $prescription_detail = PrescriptionDetail::findOrFail($id);
        if ($request->input("search_by") == 1) {
            $prescription_detail->medicine_name = $request->input("medicine_name");
            $prescription_detail->no_times = $request->input("no_times");
            $prescription_detail->quantity = $request->input("quantity");
            $medicine = Medicine::where('name', '=', $request->input("medicine_name"))->first();
            $prescription_detail->medicine_id = $medicine->id;
            $prescription_detail->duaration = $request->input("duration");
            $prescription = Prescription::where('reservation_id', '=', '2')->first();
            $prescription_detail->prescription_id = $prescription->id;
        } else {
            $prescription_detail->medicine_id = $request->input("medicines_name");
            $prescription_detail->no_times = $request->input("no_times");
            $prescription_detail->quantity = $request->input("quantity");
            $medicine = Medicine::where('id', '=', $request->input("medicines_name"))->first();
            $prescription_detail->medicine_name = $medicine->name;
            $prescription_detail->duaration = $request->input("duration");
            $prescription = Prescription::where('reservation_id', '=', '2')->first();
            $prescription_detail->prescription_id = $prescription->id;
        }
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
