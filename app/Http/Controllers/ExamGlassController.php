<?php namespace App\Http\Controllers;

use App\ExamGlassNote;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ClinicConstants;
use App\ExamGlass;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Reservation;
class ExamGlassController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function examGlass($id)
    {
        $user = Auth::user();
        $userRoleType = \App\UserRole::where('user_id', '=', $user->id)->value('type');

        return view('exam_glasses.examGlassHome', ['examGlassType' => ClinicConstants::$examGlassType,'res_id'=>$id, 'userRoleType'=>$userRoleType]);
    }

    public function index()
    {
        $exam_glasses = ExamGlass::orderBy('id', 'asc')->paginate(5);

        // return view('exam_glasses.index', compact('exam_glasses'), ['examGlassType' => ClinicConstants::$examGlassType]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($id)
    {
        $user = Auth::user();
        $userRoleType = \App\UserRole::where('user_id', '=', $user->id)->value('type');

        return view('exam_glasses.create', ['examGlassType' => ClinicConstants::$examGlassType,
            'res_id'=>$id, 'userRoleType'=>$userRoleType]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $lastReservation = Reservation::all()->last()->id; 
        $exam_glass = ExamGlass::where("reservation_id", "=", $lastReservation)->get();
        foreach ($exam_glass as $exam) {
           $exam->delete();
        }

        // $lastReservation = $request->input("res_id"))->last()->value('id');
        $user = Auth::user();
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

        $user_id = User::where('users.id', '=', $request->input("res_id"))->value('id');

        return redirect()->action('ReservationController@getReservations',[$exam_glass->reservation->user["id"]]);    
    }

    public function updatey(Request $request, $id)
    {
        $exam_glass = ExamGlass::where("reservation_id", "=", $id)->get();
        foreach ($exam_glass as $exam) {
           $exam->delete();
        }
        
        $user = Auth::user();
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

        $user_id = User::where('users.id', '=', $request->input("res_id"))->value('id');

        return redirect()->action('ReservationController@getReservations',[$exam_glass->reservation->user["id"]]);    
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

        $exam_glass = ExamGlass::where("reservation_id", "=", $id);
        for ($i = 0; $i < 6; $i++) {
            $exam_glass[$i]->exam_glass_type = $i;
            $exam_glass[$i]->sphr = $request->input("sphr$i");
            $exam_glass[$i]->cylr = $request->input("cylr$i");
            $exam_glass[$i]->axisr = $request->input("axisr$i");
            $exam_glass[$i]->sphl = $request->input("sphl$i");
            $exam_glass[$i]->cyll = $request->input("cyll$i");
            $exam_glass[$i]->axisl = $request->input("axisl$i");
            $exam_glass[$i]->reservation_id = $request->input("reservation_id");
            $exam_glass[$i]->save();
        }
       

        return redirect()->action('ReservationController@getReservations',[$exam_glass->reservation->user["id"]]);     //  return redirect()->route('examinations.index')->with('message', 'Item created successfully.');
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

        // return redirect()->route('exam_glasses.index')->with('message', 'Item deleted successfully.');
    }

}
