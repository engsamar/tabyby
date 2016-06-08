<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ExamGlassNote;
use Illuminate\Http\Request;

class ExamGlassNoteController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$exam_glass_notes = ExamGlassNote::orderBy('id', 'desc')->paginate(10);

		return view('exam_glass_notes.index', compact('exam_glass_notes'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('exam_glass_notes.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$exam_glass_note = new ExamGlassNote();

		$exam_glass_note->note = $request->input("note");
        $exam_glass_note->examGlass_id = $request->input("examGlass_id");

		$exam_glass_note->save();

		return redirect()->route('exam_glass_notes.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$exam_glass_note = ExamGlassNote::findOrFail($id);

		return view('exam_glass_notes.show', compact('exam_glass_note'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$exam_glass_note = ExamGlassNote::findOrFail($id);

		return view('exam_glass_notes.edit', compact('exam_glass_note'));
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
		$exam_glass_note = ExamGlassNote::findOrFail($id);

		$exam_glass_note->note = $request->input("note");
        $exam_glass_note->examGlass_id = $request->input("examGlass_id");

		$exam_glass_note->save();

		return redirect()->route('exam_glass_notes.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$exam_glass_note = ExamGlassNote::findOrFail($id);
		$exam_glass_note->delete();

		return redirect()->route('exam_glass_notes.index')->with('message', 'Item deleted successfully.');
	}

}
