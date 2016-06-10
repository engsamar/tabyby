<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ClinicConstants;
use App\ReserveType;
use Illuminate\Http\Request;

class ReserveTypeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$reserve_types = ReserveType::orderBy('id', 'asc')->paginate(10);

		return view('reserve_types.index', compact('reserve_types'),['reservationType' => ClinicConstants::$reservationType]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('reserve_types.create',['reservationType' => ClinicConstants::$reservationType]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$reserve_type = new ReserveType();

		$reserve_type->type = $request->input("type");

		$reserve_type->save();

		return redirect()->route('reserve_types.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$reserve_type = ReserveType::findOrFail($id);

		return view('reserve_types.show', compact('reserve_type'),['reservationType' => ClinicConstants::$reservationType]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$reserve_type = ReserveType::findOrFail($id);

		return view('reserve_types.edit', compact('reserve_type'),['reservationType' => ClinicConstants::$reservationType]);
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
		$reserve_type = ReserveType::findOrFail($id);

		$reserve_type->type = $request->input("type");

		$reserve_type->save();

		return redirect()->route('reserve_types.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$reserve_type = ReserveType::findOrFail($id);
		$reserve_type->delete();

		return redirect()->route('reserve_types.index')->with('message', 'Item deleted successfully.');
	}

}
