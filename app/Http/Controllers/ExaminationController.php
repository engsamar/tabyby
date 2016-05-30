<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Examination;
use Illuminate\Http\Request;

class ExaminationController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$examinations = Examination::orderBy('id', 'desc')->paginate(10);

		return view('examinations.index', compact('examinations'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('examinations.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$examination = new Examination();

		$examination->eye_type = $request->input("eye_type");
        $examination->vision = $request->input("vision");
        $examination->lid = $request->input("lid");
        $examination->conjunctiva = $request->input("conjunctiva");
        $examination->cornea = $request->input("cornea");
        $examination->a_c = $request->input("a_c");
        $examination->pupil = $request->input("pupil");
        $examination->lens = $request->input("lens");
        $examination->fundus = $request->input("fundus");
        $examination->i_o_p = $request->input("i_o_p");
        $examination->angle = $request->input("angle");
        $examination->reservation_id = 1;

		$examination->save();

		return redirect()->route('examinations.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$examination = Examination::findOrFail($id);

		return view('examinations.show', compact('examination'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$examination = Examination::findOrFail($id);

		return view('examinations.edit', compact('examination'));
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
		$examination = Examination::findOrFail($id);

		$examination->eye_type = $request->input("eye_type");
        $examination->vision = $request->input("vision");
        $examination->lid = $request->input("lid");
        $examination->conjunctiva = $request->input("conjunctiva");
        $examination->cornea = $request->input("cornea");
        $examination->a_c = $request->input("a_c");
        $examination->pupil = $request->input("pupil");
        $examination->lens = $request->input("lens");
        $examination->fundus = $request->input("fundus");
        $examination->i_o_p = $request->input("i_o_p");
        $examination->angle = $request->input("angle");
        $examination->reservation_id = $request->input("reservation_id");

		$examination->save();

		return redirect()->route('examinations.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$examination = Examination::findOrFail($id);
		$examination->delete();

		return redirect()->route('examinations.index')->with('message', 'Item deleted successfully.');
	}

}
