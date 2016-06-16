<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Clinic;
use App\ClinicConstants;
use App\WorkingHour;
use App\Reservation;
use Carbon\Carbon;
//use App\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

//use App\Http\Controllers;

class WorkingHourController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $working_hours = WorkingHour::orderBy('id', 'asc')->paginate(10);
        return view('working_hours.index', compact('working_hours'), ['day' => ClinicConstants::$day]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($id)
    {
        $clinic = Clinic::all();
        $date = Carbon::now(new \DateTimeZone('Africa/Cairo'));
        $time = $date->toTimeString();
        return view('working_hours.create', ['day' => ClinicConstants::$day],['clinic_id'=>$id])->with('name', $clinic)->with('time', $time);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'fromTime' => 'required|date_format:H:i:s',
            'toTime' => 'required|date_format:H:i:s|after:fromTime',
            'day' => 'required|string',

        ]);
        $working_hour = new WorkingHour();
        $working_hour->fromTime = $request->input("fromTime");
        $working_hour->toTime = $request->input("toTime");
        $working_hour->day = $request->input("day");
        $working_hour->clinic_id = $request->input("clinic_id");
        $working_hour->save();

        return redirect('working_hours/'.$request->input("clinic_id").'')->with('message', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $working_hour = WorkingHour::where('clinic_id', $id)->get();
        return view('working_hours.show', compact('working_hour'), ['day' => ClinicConstants::$day,'clinic_id'=>$id ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function addClinicWorkingHours($id)
    {
        $working_hour = WorkingHour::findOrFail($id);

        return view('working_hours.edit', compact('working_hour'), ['day' => ClinicConstants::$day]);
    }

    public function edit($id)
    {
        $working_hour = WorkingHour::findOrFail($id);

        return view('working_hours.edit', compact('working_hour'), ['day' => ClinicConstants::$day]);
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
//
//        die($request);
        $working_hour = WorkingHour::findOrFail($id);

        $working_hour->fromTime = $request->input("fromTime");

        $working_hour->toTime = $request->input("toTime");

        $working_hour->day = $request->input("day");

        $diff="";
        $selected_day=WorkingHour::where('day',$request->input("day"))->get();
        foreach ($selected_day as $key => $value) {
            $diff=date('h:i:s',strtotime($request->input("fromTime"))-strtotime($value->fromTime));
        }
        // $reservations = Reservation::;

        // var_dump($diff);
        // die();


        if (!empty($request->input("clinic_id"))) {

            $working_hour->clinic_id = $request->input("clinic_id");
            $working_hour->save();
            return Redirect('working_hours/'.$request->input("clinic_id").'');
        } else {
            $name = $request->input("clinic_id");
            $clinic = Clinic::where('name', $name)->first();
            $working_hour->clinic_id = $clinic->id;
            $working_hour->save();
            return redirect()->route('working_hours.index')->with('message', 'Item updated successfully.');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $working_hour = WorkingHour::findOrFail($id);
        $working_hour->delete();

        return redirect()->route('working_hours.index')->with('message', 'Item deleted successfully.');
    }

    public function retreve($id)
    {
        $working_hour = WorkingHour::where('clinic_id', $id)->get();
        return $working_hour;
    }

    public function valid()
    {
        die('iam in function');
    }


}
