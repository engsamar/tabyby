<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PerceptionDetail;
use Illuminate\Http\Request;

class PerceptionDetailController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$perception_details = PerceptionDetail::orderBy('id', 'desc')->paginate(10);

		return view('perception_details.index', compact('perception_details'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('perception_details.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$perception_detail = new PerceptionDetail();

		$perception_detail->medicine_name = $request->input("medicine_name");
        $perception_detail->no_times = $request->input("no_times");
        $perception_detail->quantity = $request->input("quantity");
        $perception_detail->duration = $request->input("duration");
        $perception_detail->preception_id = $request->input("preception_id");

		$perception_detail->save();

		return redirect()->route('perception_details.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$perception_detail = PerceptionDetail::findOrFail($id);

		return view('perception_details.show', compact('perception_detail'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$perception_detail = PerceptionDetail::findOrFail($id);

		return view('perception_details.edit', compact('perception_detail'));
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
		$perception_detail = PerceptionDetail::findOrFail($id);

		$perception_detail->medicine_name = $request->input("medicine_name");
        $perception_detail->no_times = $request->input("no_times");
        $perception_detail->quantity = $request->input("quantity");
        $perception_detail->duration = $request->input("duration");
        $perception_detail->preception_id = $request->input("preception_id");

		$perception_detail->save();

		return redirect()->route('perception_details.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$perception_detail = PerceptionDetail::findOrFail($id);
		$perception_detail->delete();

		return redirect()->route('perception_details.index')->with('message', 'Item deleted successfully.');
	}

}
