<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Consistitue;
use Illuminate\Http\Request;

class ConsistitueController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$consistitues = Consistitue::orderBy('id', 'asc')->paginate(10);

		return view('consistitues.index', compact('consistitues'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('consistitues.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$consistitue = new Consistitue();

		$consistitue->active_consistitue = $request->input("active_consistitue");

		$consistitue->save();

		return redirect()->route('consistitues.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$consistitue = Consistitue::findOrFail($id);

		return view('consistitues.show', compact('consistitue'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$consistitue = Consistitue::findOrFail($id);

		return view('consistitues.edit', compact('consistitue'));
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
		$consistitue = Consistitue::findOrFail($id);

		$consistitue->active_consistitue = $request->input("active_consistitue");

		$consistitue->save();

		return redirect()->route('consistitues.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$consistitue = Consistitue::findOrFail($id);
		$consistitue->delete();

		return redirect()->route('consistitues.index')->with('message', 'Item deleted successfully.');
	}
	public function find(Request $request)
	{
//		echo "<pre>";
//		var_dump($request->input("name"));
//		var_dump($request->input("action"));
//		echo "</pre>";
//		die('end');
		$name=$request->input("name");
		$medicine=Consistitue::where('active_consistitue','LIKE',"%$name%")->get();
//		echo "<pre>";
//		var_dump($medicine);
//		echo "</pre>";
//		die('end');
		return $medicine;
	}

}
