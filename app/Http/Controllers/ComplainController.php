<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Complain;
use Illuminate\Http\Request;

class ComplainController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$complains = Complain::orderBy('id', 'desc')->paginate(10);

		return view('complains.index', compact('complains'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('complains.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$complain = new Complain();

		$complain->complain = $request->input("complain");
        $complain->h_of_complain = $request->input("h_of_complain");

		$complain->save();

		return redirect()->route('complains.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$complain = Complain::findOrFail($id);

		return view('complains.show', compact('complain'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$complain = Complain::findOrFail($id);

		return view('complains.edit', compact('complain'));
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
		$complain = Complain::findOrFail($id);

		$complain->complain = $request->input("complain");
        $complain->h_of_complain = $request->input("h_of_complain");

		$complain->save();

		return redirect()->route('complains.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$complain = Complain::findOrFail($id);
		$complain->delete();

		return redirect()->route('complains.index')->with('message', 'Item deleted successfully.');
	}

}
