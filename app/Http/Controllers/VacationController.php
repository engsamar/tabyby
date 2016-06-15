<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \DateTime;
use App\Vacation;
use Illuminate\Http\Request;
use App\Reservation;


class VacationController extends Controller {


	public function checkExist($date){
		echo "<script>alert('cxcvb')</script>";
		$vacations=Vacation::where('from_day','>=',$date)->where('to_day','<=',$date)->count();
		if($vacations){
			return true;
		}else{
			return false;
		}
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$vacations = Vacation::orderBy('id', 'desc')->paginate(10);

		return view('vacations.index', compact('vacations'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('vacations.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$vacation = new Vacation();
		$dateTime1 = DateTime::createFromFormat('m/d/Y', $request->input("from"));
		$from = $dateTime1->format('Y-m-d');
		$dateTime2 = DateTime::createFromFormat('m/d/Y', $request->input("to"));
		$to = $dateTime2->format('Y-m-d');
			$vacation->from_day = $from;
	        $vacation->to_day = $to;
			$vacation->save();
			return redirect()->route('vacations.index')->with('message', 'Item created successfully.');
		
	}

	public function movePatients($fromtim,$totim)
	{
		$reservation = new Reservation();
		// $fromTime=strtotime("+1 days",$fromtim);
		// $toTime=strtotime("+1 days",$totim);
		$no_of_days=date_diff(date_create($fromtim),date_create($totim))->format('%a');
		$date = strtotime($fromtim);
		// vacation days array
		$date_array=[];
		// count number of reservations array
		$reserve_array=[];
		for($i=0;$i<=$no_of_days;$i++){
			$dateAdd = strtotime("+".$i."days", $date);
			array_push($date_array,date('Y-m-d', $dateAdd));
			array_push($reserve_array,Reservation::where('date', $date_array[$i])->where('status','>',0)->count());
		}
		if($reserve_array)
		{
			$data = json_encode(array(
		    'date_array' => $date_array,
		    'reserve_array' => $reserve_array
			));
			return $data;			

		}


	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$vacation = Vacation::findOrFail($id);

		return view('vacations.show', compact('vacation'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$vacation = Vacation::findOrFail($id);

		return view('vacations.edit', compact('vacation'));
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
		$vacation = Vacation::findOrFail($id);

		$vacation->from_day = $request->input("from_day");
        $vacation->to_day = $request->input("to_day");

		$vacation->save();

		return redirect()->route('vacations.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$vacation = Vacation::findOrFail($id);
		$vacation->delete();

		return redirect()->route('vacations.index')->with('message', 'Item deleted successfully.');
	}



}
