<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Secertary;
use Illuminate\Http\Request;

class SecertaryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$secertaries = Secertary::orderBy('id', 'desc')->paginate(10);

		return view('secertaries.index', compact('secertaries'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('secertaries.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$secertary = new Secertary();

		$secertary->degree = $request->input("degree");
        $secertary->national_id = $request->input("national_id");
		$secertary->clinic_id=1;
		$secertary->save();

		return redirect()->route('secertaries.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$secertary = Secertary::findOrFail($id);

		return view('secertaries.show', compact('secertary'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$secertary = Secertary::findOrFail($id);

		return view('secertaries.edit', compact('secertary'));
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
		$secertary = Secertary::findOrFail($id);

		$secertary->degree = $request->input("degree");
        $secertary->national_id = $request->input("national_id");

		$secertary->save();

		return redirect()->route('secertaries.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$secertary = Secertary::findOrFail($id);
		$secertary->delete();

		return redirect()->route('secertaries.index')->with('message', 'Item deleted successfully.');
	}

}
