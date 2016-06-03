<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\RoleType;
use Illuminate\Http\Request;

class RoleTypeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$role_types = RoleType::orderBy('id', 'asc')->paginate(10);

		return view('role_types.index', compact('role_types'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('role_types.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$role_type = new RoleType();

		$role_type->roleType = $request->input("roleType");

		$role_type->save();

		return redirect()->route('role_types.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$role_type = RoleType::findOrFail($id);

		return view('role_types.show', compact('role_type'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$role_type = RoleType::findOrFail($id);

		return view('role_types.edit', compact('role_type'));
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
		$role_type = RoleType::findOrFail($id);

		$role_type->roleType = $request->input("roleType");

		$role_type->save();

		return redirect()->route('role_types.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$role_type = RoleType::findOrFail($id);
		$role_type->delete();

		return redirect()->route('role_types.index')->with('message', 'Item deleted successfully.');
	}

}
