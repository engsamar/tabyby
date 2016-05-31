<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ExamGlass;
use Illuminate\Http\Request;

class ExamGlassController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$exam_glasses = ExamGlass::orderBy('id', 'desc')->paginate(10);

		return view('exam_glasses.index', compact('exam_glasses'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('exam_glasses.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$exam_glass = new ExamGlass();

		$exam_glass->from = $request->input("from");
        $exam_glass->exam_glass_type = $request->input("exam_glass_type");
        $exam_glass->spl = $request->input("spl");
        $exam_glass->cyl = $request->input("cyl");
        $exam_glass->axis = $request->input("axis");

		$exam_glass->save();

		return redirect()->route('exam_glasses.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$exam_glass = ExamGlass::findOrFail($id);

		return view('exam_glasses.show', compact('exam_glass'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$exam_glass = ExamGlass::findOrFail($id);

		return view('exam_glasses.edit', compact('exam_glass'));
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
		$exam_glass = ExamGlass::findOrFail($id);

		$exam_glass->from = $request->input("from");
        $exam_glass->exam_glass_type = $request->input("exam_glass_type");
        $exam_glass->spl = $request->input("spl");
        $exam_glass->cyl = $request->input("cyl");
        $exam_glass->axis = $request->input("axis");

		$exam_glass->save();

		return redirect()->route('exam_glasses.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$exam_glass = ExamGlass::findOrFail($id);
		$exam_glass->delete();

		return redirect()->route('exam_glasses.index')->with('message', 'Item deleted successfully.');
	}

}
