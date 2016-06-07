<?php namespace App\Http\Controllers;

use App\ExamGlassNote;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ClinicConstants;
use App\ExamGlass;
use Illuminate\Http\Request;

class ExamGlassController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function examGlass()
    {
        return view('exam_glasses.examGlassHome', ['examGlassType' => ClinicConstants::$examGlassType]);
    }

    public function index()
    {
        $exam_glasses = ExamGlass::orderBy('id', 'asc')->paginate(5);

        return view('exam_glasses.index', compact('exam_glasses'), ['examGlassType' => ClinicConstants::$examGlassType]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('exam_glasses.create', ['examGlassType' => ClinicConstants::$examGlassType]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        ///save notes in notes table
        $exam_glass_note = new ExamGlassNote();
        $exam_glass_note->reservations_id = $request->input("reservation_id");
        $exam_glass_note->note = $request->input("note");
        $exam_glass_note->save();
        ////////////////////////////

        for ($i = 0; $i < 6; $i++) {
            $exam_glass = new ExamGlass();
            $exam_glass->exam_glass_type = $i;
            $exam_glass->sphr = $request->input("sphr$i");
            $exam_glass->cylr = $request->input("cylr$i");
            $exam_glass->axisr = $request->input("axisr$i");
            $exam_glass->sphl = $request->input("sphl$i");
            $exam_glass->cyll = $request->input("cyll$i");
            $exam_glass->axisl = $request->input("axisl$i");
            $exam_glass->reservation_id = $request->input("reservation_id");
            $exam_glass->save();
        }


        return redirect()->route('exam_glasses.index')->with('message', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $exam_glass = ExamGlass::findOrFail($id);

        return view('exam_glasses.show', compact('exam_glass'), ['examGlassType' => ClinicConstants::$examGlassType]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $exam_glass = ExamGlass::findOrFail($id);

        return view('exam_glasses.edit', compact('exam_glass'), ['examGlassType' => ClinicConstants::$examGlassType]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $exam_glass = ExamGlass::findOrFail($id);

        $exam_glass->sphr = $request->input("sphr");
        $exam_glass->cylr = $request->input("cylr");
        $exam_glass->axisr = $request->input("axisr");
        $exam_glass->sphl = $request->input("sphl");
        $exam_glass->cyll = $request->input("cyll");
        $exam_glass->axisl = $request->input("axisl");
        $exam_glass->type = $request->input("type");
        $exam_glass->reservation_id = $request->input("reservation_id");

        $exam_glass->save();

        return redirect()->route('exam_glasses.index')->with('message', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $exam_glass = ExamGlass::findOrFail($id);
        $exam_glass->delete();

        return redirect()->route('exam_glasses.index')->with('message', 'Item deleted successfully.');
    }

}
