<?php namespace App\Http\Controllers;

use App\Consistitue;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ClinicConstants;
use App\Medicine;
use App\UserRole;
use Illuminate\Http\Request;

class MedicineController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $medicines = Medicine::orderBy('id', 'asc')->paginate(10);
        $doctorRole = UserRole::where('type', '=', 0)->firstOrFail();

        return view('medicines.index', compact('medicines','doctorRole'), ['medicineType' => ClinicConstants::$medicineType]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $doctorRole = UserRole::where('type', '=', 0)->firstOrFail();

        return view('medicines.create',compact('doctorRole'), ['medicineType' => ClinicConstants::$medicineType,'constituent' => Consistitue::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'string|required|unique:medicines',
            'type' => 'required|numeric',
            'company' => 'required|string',
            'consistitue_id' => 'required|numeric',
        ]);
        $medicine = new Medicine();

        $medicine->name = $request->input("name");
        $medicine->type = $request->input("type");
        $medicine->company = $request->input("company");
        $medicine->consistitue_id = $request->input("constituent");

        $medicine->save();
        $doctorRole = UserRole::where('type', '=', 0)->firstOrFail();

        return redirect()->route('medicines.index')->with('message', 'Item created successfully.')->with('doctorRole',$doctorRole);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $medicine = Medicine::findOrFail($id);
        $doctorRole = UserRole::where('type', '=', 0)->firstOrFail();

        return view('medicines.show', compact('doctorRole','medicine'), ['medicineType' => ClinicConstants::$medicineType]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $medicine = Medicine::findOrFail($id);
        $constituent = Consistitue::all();
        $doctorRole = UserRole::where('type', '=', 0)->firstOrFail();

        return view('medicines.edit', compact('doctorRole','medicine', 'constituent'), ['medicineType' => ClinicConstants::$medicineType]);
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
        $this->validate($request, [
            'name' => 'required|string|unique:medicines',
            'type' => 'required|numeric',
            'company' => 'required|string',
            'consistitue_id' => 'required|numeric',
        ]);
        $medicine = Medicine::findOrFail($id);

        $medicine->name = $request->input("name");
        $medicine->type = $request->input("type");
        $medicine->company = $request->input("company");
        $medicine->consistitue_id = $request->input("constituent");

        $medicine->save();
        $doctorRole = UserRole::where('type', '=', 0)->firstOrFail();

        return redirect()->route('medicines.index')->with('doctorRole',$doctorRole)->with('message', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $medicine = Medicine::findOrFail($id);
        $medicine->delete();
        $doctorRole = UserRole::where('type', '=', 0)->firstOrFail();

        return redirect()->route('medicines.index')->with('doctorRole',$doctorRole)->with('message', 'Item deleted successfully.');
    }

    public function find(Request $request)
    {
        if ($request->method() == "POST") {
            switch ($request->input("with")) {
                case "name":
                    if ($request->input("has")) {

                        $name = $request->input("name");
                        $type = $request->input("id");
                        $medicine = Medicine::where('type', '=', "$type")->where('name', 'LIKE', "%$name%")->get();
                        return $medicine;
                    } else {
                        $name = $request->input("name");
                        $medicine = Medicine::where('name', 'LIKE', "%$name%")->get();
                        return $medicine;
                    }

                    break;
                case "active":
                    if ($request->input("has")) {
                        $name = $request->input("name");
                        $type = $request->input("id");
                        $active = Consistitue::where("active_consistitue", '=', "$name")->first();
                        $medicine = Medicine::where('type', '=', "$type")->where('consistitue_id', '=', "$active->id")->get();
                        return $medicine;
                    } else {
                        $name = $request->input("name");
                        $active = Consistitue::where("active_consistitue", '=', "$name")->first();
                        $medicine = Medicine::where('consistitue_id', '=', "$active->id")->get();
                        return $medicine;
                    }
                    break;
            }
        } else {
            $name = $request->input("name");
            $medicine = Medicine::where('name', '=', $name)->get();
            if (count($medicine)!=0){
                return "no";
            }else{
                return "yes";
            }
        }

    }

}
