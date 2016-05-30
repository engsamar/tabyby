<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$medicines = Medicine::orderBy('id', 'desc')->paginate(10);

		return view('medicines.index', compact('medicines'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('medicines.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$medicine = new Medicine();

		$medicine->name = $request->input("name");
        $medicine->type = $request->input("type");
        $medicine->company = $request->input("company");

		$medicine->save();

		return redirect()->route('medicines.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$medicine = Medicine::findOrFail($id);

		return view('medicines.show', compact('medicine'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$medicine = Medicine::findOrFail($id);

		return view('medicines.edit', compact('medicine'));
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
		$medicine = Medicine::findOrFail($id);

		$medicine->name = $request->input("name");
        $medicine->type = $request->input("type");
        $medicine->company = $request->input("company");

		$medicine->save();

		return redirect()->route('medicines.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$medicine = Medicine::findOrFail($id);
		$medicine->delete();

		return redirect()->route('medicines.index')->with('message', 'Item deleted successfully.');
	}

}
