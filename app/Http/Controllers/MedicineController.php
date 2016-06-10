<?php namespace App\Http\Controllers;

use App\Consistitue;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ClinicConstants;
use App\Medicine;
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

        return view('medicines.index', compact('medicines'), ['medicineType' => ClinicConstants::$medicineType]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('medicines.create', ['medicineType' => ClinicConstants::$medicineType]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $medicine = new Medicine();

        $medicine->name = $request->input("name");
        $medicine->type = $request->input("type");
        $medicine->company = $request->input("company");

        $medicine->save();

        return redirect()->route('medicines.index')->with('message', 'Item created successfully.');
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

        return view('medicines.show', compact('medicine'), ['medicineType' => ClinicConstants::$medicineType]);
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

        return view('medicines.edit', compact('medicine'), ['medicineType' => ClinicConstants::$medicineType]);
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
        $medicine = Medicine::findOrFail($id);

        $medicine->name = $request->input("name");
        $medicine->type = $request->input("type");
        $medicine->company = $request->input("company");

        $medicine->save();

        return redirect()->route('medicines.index')->with('message', 'Item updated successfully.');
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

        return redirect()->route('medicines.index')->with('message', 'Item deleted successfully.');
    }

    public function find(Request $request)
    {
//		echo "<pre>";
//		var_dump($request->input("name"));
//		var_dump($request->input("action"));
//		echo "</pre>";
//		die('end');
        switch ($request->input("with")) {
            case "name":
                if ($request->input("has")) {

                    $name = $request->input("name");
                    $type = $request->input("id");
                    $medicine = Medicine::where('type', '=', "$type")->where('name', 'LIKE', "%$name%")->get();
//		echo "<pre>";
//		var_dump($request->input("has"));
//		echo "</pre>";
//		die('end');
                    return $medicine;
                } else {
                    $name = $request->input("name");
                    $medicine = Medicine::where('name', 'LIKE', "%$name%")->get();
//		echo "<pre>";
//		var_dump($medicine);
//		echo "</pre>";
//		die('end');
                    return $medicine;
                }

                break;
            case "active":
                if ($request->input("has")) {
                    $name = $request->input("name");
                    $type = $request->input("id");
                    $active = Consistitue::where("active_consistitue", '=', "$name")->first();
                    $medicine = Medicine::where('type', '=', "$type")->where('consistitue_id', '=', "$active->id")->get();
//		echo "<pre>";
//		var_dump($medicine);
//		echo "</pre>";
//		die('end');
                    return $medicine;
                } else {
                    $name = $request->input("name");
                    $active = Consistitue::where("active_consistitue", '=', "$name")->first();
                    $medicine = Medicine::where('consistitue_id', '=', "$active->id")->get();
//		echo "<pre>";
//		var_dump($medicine);
//		echo "</pre>";
//		die('end');
                    return $medicine;
                }
                break;
        }

    }

}
