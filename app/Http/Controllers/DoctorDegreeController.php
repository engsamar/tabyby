<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//use App\Http\Controllers\UserRole;
use App\DoctorDegree;
use App\UserRole;
use Illuminate\Http\Request;
use Auth;

class DoctorDegreeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$doctorRole = UserRole::where('type', '=', 0)->firstOrFail();
		$doctor_degrees = DoctorDegree::orderBy('id', 'asc')->paginate(10);

		return view('doctor_degrees.index', compact('doctor_degrees'),['doctorRole'=>$doctorRole]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$doctorRole = UserRole::where('type', '=', 0)->firstOrFail();
		$user = Auth::user();
		$user_role = UserRole::where('user_id',$user->id)->get();
		return view('doctor_degrees.create',['userRole'=>$user_role,'doctorRole'=>$doctorRole]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$doctor_degree = new DoctorDegree();

		$doctor_degree->degree = $request->input("degree");
        $doctor_degree->university = $request->input("university");
        $doctor_degree->description = $request->input("description");
        $doctor_degree->graduate_date = $request->input("graduate_date");
        $doctor_degree->userrole_id = $request->input("userrole_id");

		$doctor_degree->save();

		return redirect()->route('doctor_degrees.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$doctorRole = UserRole::where('type', '=', 0)->firstOrFail();
		$doctor_degree = DoctorDegree::findOrFail($id);

		return view('doctor_degrees.show', compact('doctor_degree'),['doctorRole'=>$doctorRole]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$doctorRole = UserRole::where('type', '=', 0)->firstOrFail();
		$doctor_degree = DoctorDegree::findOrFail($id);

		return view('doctor_degrees.edit', compact('doctor_degree'),['doctorRole'=>$doctorRole]);
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
		$doctor_degree = DoctorDegree::findOrFail($id);

		$doctor_degree->degree = $request->input("degree");
        $doctor_degree->university = $request->input("university");
        $doctor_degree->description = $request->input("description");
        $doctor_degree->graduate_date = $request->input("graduate_date");
        $doctor_degree->userrole_id = $request->input("userrole_id");

		$doctor_degree->save();

		return redirect()->route('doctor_degrees.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$doctor_degree = DoctorDegree::findOrFail($id);
		$doctor_degree->delete();

		return redirect()->route('doctor_degrees.index')->with('message', 'Item deleted successfully.');
	}

}
