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
		$reservation = new Reservation();
		$dateTime1 = DateTime::createFromFormat('m/d/Y', $request->input("from"));
		$from = $dateTime1->format('Y-m-d');
		$dateTime2 = DateTime::createFromFormat('m/d/Y', $request->input("to"));
		$to = $dateTime2->format('Y-m-d');
		$no_of_days=date_diff(date_create($from),date_create($to))->format('%a');
		$date = strtotime($from);
		// vacation days array
		$date_array=[];
		// count number of reservations array
		$reserve_array=[];
		for($i=0;$i<=$no_of_days;$i++){
			$dateAdd = strtotime("+".$i."days", $date);
			array_push($date_array,date('Y-m-d', $dateAdd));
			array_push($reserve_array,Reservation::where('date', $date_array[$i])->where('status','>',0)->count());
				if($reserve_array[$i]!=0)
				{
					echo '<html><body><table class="table table-bordered"><thead><tr>
        					<th>no of patients </th><th> day date</th><th>Move all</th>
        					<th>Move some</th></tr></thead>';
					echo "<tbody><tr><td>".$reserve_array[$i]."</td><td>".$date_array[$i]."</td><td>
						<a href='#'>Move all</a></td><td><a href='#'>Move some</a></td>";
					echo "</tr></tbody></table></body></html>";					
				}

		}
		die();
		$vacation->from_day = $from;
        $vacation->to_day = $to;

		$vacation->save();

		return redirect()->route('vacations.index')->with('message', 'Item created successfully.');
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
