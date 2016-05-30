<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ComplainDetail;
use Illuminate\Http\Request;

class ComplainDetailController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$complain_details = ComplainDetail::orderBy('id', 'desc')->paginate(10);

		return view('complain_details.index', compact('complain_details'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('complain_details.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$complain_detail = new ComplainDetail();

		$complain_detail->diagnose = $request->input("diagnose");
        $complain_detail->plan = $request->input("plan");
		$complain_detail->save();

		return redirect()->route('complain_details.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$complain_detail = ComplainDetail::findOrFail($id);

		return view('complain_details.show', compact('complain_detail'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$complain_detail = ComplainDetail::findOrFail($id);

		return view('complain_details.edit', compact('complain_detail'));
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
		$complain_detail = ComplainDetail::findOrFail($id);

		$complain_detail->diagnose = $request->input("diagnose");
        $complain_detail->plan = $request->input("plan");

		$complain_detail->save();

		return redirect()->route('complain_details.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$complain_detail = ComplainDetail::findOrFail($id);
		$complain_detail->delete();

		return redirect()->route('complain_details.index')->with('message', 'Item deleted successfully.');
	}

}
