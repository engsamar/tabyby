<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Clinic;
use Auth;
use App\UserRole;
use App\Secertary;
use Illuminate\Http\Request;

class ClinicController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function chooseClinic()
    {
        $clinics = Clinic::all();
        return view('clinics.chooseClinic',['clinics'=>$clinics]);
    }
    public function index()
    {
        $id=Auth::user()->id;
        $user_role = UserRole::where('user_id',$id)->value('id');
        $secertary = Secertary::where('userRole_id',$user_role)->value('clinic_id');

        $clinics = Clinic::orderBy('id', 'asc')->paginate(10);

        return view('clinics.index', compact('clinics','secertary'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('clinics.create');
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
            'name' => 'required|string',
            'telephone' => 'required|string|min:10|max:10',
            'address' => 'required|string',
        ]);
        $clinic = new Clinic();

        $clinic->name = $request->input("name");
        $clinic->telephone = $request->input("telephone");
        $clinic->address = $request->input("address");

        $clinic->save();

        return redirect()->route('clinics.index')->with('message', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $clinic = Clinic::findOrFail($id);

        return view('clinics.show', compact('clinic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $clinic = Clinic::findOrFail($id);

        return view('clinics.edit', compact('clinic'));
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
            'name' => 'required|string',
            'telephone' => 'required|string|min:10|max:10',
            'address' => 'required|string',
        ]);
        $clinic = Clinic::findOrFail($id);

        $clinic->name = $request->input("name");
        $clinic->telephone = $request->input("telephone");
        $clinic->address = $request->input("address");

        $clinic->save();

        return redirect()->route('clinics.index')->with('message', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $clinic = Clinic::findOrFail($id);
        $clinic->delete();

        return redirect()->route('clinics.index')->with('message', 'Item deleted successfully.');
    }

}
