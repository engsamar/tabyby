<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ClinicConstants;
use App\MedicalHistory;
use Illuminate\Http\Request;
use App\MedicalHistoryDetail;
use Illuminate\Support\Facades\Redirect;

class MedicalHistoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $medical_histories = MedicalHistory::orderBy('id', 'asc')->paginate(10);

        return view('medical_histories.index', compact('medical_histories'),['medicalHistoryType' => ClinicConstants::$medicalHistoryType]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($res_id,$patient_id)
    {
        return view('medical_histories.create',['patient_id'=>$patient_id,'res_id'=>$res_id,'medicalHistoryType' => ClinicConstants::$medicalHistoryType]);
    }
  
    public function store(Request $request)
    {
        $medical_history = new MedicalHistory();
        $medical_history->type = $request->input("type");
        $medical_history->begin_at = $request->input("begin_at");
        $medical_history->user_id = $request->input("patient_id");
        $medical_history->save();

        $medical_history_detail = new MedicalHistoryDetail();
        $medical_history_detail->description = $request->input("description");
        $medical_history_detail->medical_history_id=$medical_history->id;
        $medical_history_detail->save();

        return redirect()->action('ReservationController@getReservations',[$medical_history->reservation->user["id"]]);    
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $medical_history = MedicalHistory::findOrFail($id);

        return view('medical_histories.show', compact('medical_history'),['medicalHistoryType' => ClinicConstants::$medicalHistoryType]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $medical_history = MedicalHistory::findOrFail($id);

        return view('medical_histories.edit', compact('medical_history'),['medicalHistoryType' => ClinicConstants::$medicalHistoryType]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
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
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $medical_history = MedicalHistory::findOrFail($id);
        $medical_history->delete();

        return redirect()->route('medical_histories.index')->with('message', 'Item deleted successfully.');
    }

}
