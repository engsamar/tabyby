<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\DoctorDegree;
use App\User;
use App\UserRole;


use Illuminate\Http\Request;
use DB;

class DoctorDegreeController extends Controller {

	public function index()
	{
		$doctor_degrees = DoctorDegree::orderBy('id', 'desc')->paginate(10);

		return view('doctor_degrees.index', compact('doctor_degrees'));
	}

	public function create()
	{
		return view('doctor_degrees.create');
	}

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

	public function show($id)
	{
       	$userInfo = DB::table('users')->where('users.id', $id)
       	    ->join('user_roles', 'users.id', '=', 'user_roles.user_id')
            ->where('user_roles.type', 0)
			->get();

		$doc_info = DB::table('users')
            ->join('user_roles', 'users.id', '=', 'user_roles.user_id')
            ->join('doctor_degrees', 'user_role_id', '=', 'user_roles.id')
            ->select('doctor_degrees.*')
            ->where('users.id', $id)
            ->where('user_roles.type', 0)
            ->get();
		return view('doctor_degrees.show', compact('userInfo','doc_info'));
	}

	public function edit($id)
	{
		$doctor_degree = DoctorDegree::findOrFail($id);

		return view('doctor_degrees.edit', compact('doctor_degree'));
	}

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

	public function destroy($id)
	{
		$doctor_degree = DoctorDegree::findOrFail($id);
		$doctor_degree->delete();

		return redirect()->route('doctor_degrees.index')->with('message', 'Item deleted successfully.');
	}

}
