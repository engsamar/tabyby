<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\DoctorDegree;
use Illuminate\Http\Request;

class DoctorDegreeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$doctor_degrees = DoctorDegree::orderBy('id', 'asc')->paginate(10);

		return view('doctor_degrees.index', compact('doctor_degrees'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('doctor_degrees.create');
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
        $doctor_degree->user_role_id = $request->input("user_role_id");

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
		$doctor_degree = DoctorDegree::findOrFail($id);

		return view('doctor_degrees.show', compact('doctor_degree'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$doctor_degree = DoctorDegree::findOrFail($id);

		return view('doctor_degrees.edit', compact('doctor_degree'));
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
        $doctor_degree->user_role_id = $request->input("user_role_id");

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
