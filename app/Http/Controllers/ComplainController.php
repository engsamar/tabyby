<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Complain;
use Illuminate\Http\Request;
use App\ComplainDetail;

use Illuminate\Support\Facades\Redirect;
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

	public function create($res_id)
	{
		return view('complains.create',['res_id'=>$res_id]);
	}

	// href="{!!route('route', ['key'=>'value'])!!}"
	public function store(Request $request)
	{
		$complain = new Complain();
		$complain->complain = $request->input("complain");
        $complain->h_of_complain = $request->input("h_of_complain");
        $complain->reservation_id = $request->input("res_id");

        $complain->save();

		$complain_details = new ComplainDetail();
        $complain_details->diagnose = $request->input("diagnose");
        $complain_details->plan = $request->input("plan");
        $complain_details->complain_id=$complain->id;
        $complain_details->save();

        return redirect('/patient/'.$request->input("res_id"));
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
