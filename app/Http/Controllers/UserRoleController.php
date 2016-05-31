<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ClinicConstants;
use App\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user_roles = UserRole::orderBy('id', 'asc')->paginate(10);

		return view('user_roles.index', compact('user_roles'),['role' => ClinicConstants::$role]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('user_roles.create',['role' => ClinicConstants::$role]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$user_role = new UserRole();

		$user_role->type = $request->input("type");
		$user_role->user_id=1;
		$user_role->save();

		return redirect()->route('user_roles.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user_role = UserRole::findOrFail($id);

		return view('user_roles.show', compact('user_role'),['role' => ClinicConstants::$role]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user_role = UserRole::findOrFail($id);

		return view('user_roles.edit', compact('user_role'),['role' => ClinicConstants::$role]);
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
		$user_role = UserRole::findOrFail($id);

		$user_role->type = $request->input("type");

		$user_role->save();

		return redirect()->route('user_roles.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user_role = UserRole::findOrFail($id);
		$user_role->delete();

		return redirect()->route('user_roles.index')->with('message', 'Item deleted successfully.');
	}

}
