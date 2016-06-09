<?php namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ClinicConstants;
use App\Http\Requests;
use App\Secertary;
use \App\UserRole;
use App\Clinic;
use App\User;
use Auth;

class SecertaryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$secertaries = Secertary::orderBy('id', 'desc')->paginate(10);

		return view('secertaries.index', compact('secertaries'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$clinic = Clinic::all();
		$user = Auth::user();
		$userRole = UserRole::where('user_id', '=', $user->id)->value('type');
		return view('secertaries.create')->with('address', $clinic)->with('userRoleType',$userRole);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$user_role = new UserRole();
		$user_role->type = 1;
		$user_name  = $request->input("name");
		$user_role->user_id=User::where('username',$request->input("name"))->value('id');;
		$user_role->save();

		$secertary = new Secertary();
		$secertary->degree = $request->input("degree");
		$secertary->userRole_id=$user_role->id;
        $secertary->national_id = $request->input("national_id");
		$secertary->clinic_id= $request->input("address");
		$secertary->save();

		return redirect()->route('secertaries.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$secertary = Secertary::findOrFail($id);

		return view('secertaries.show', compact('secertary'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$secertary = Secertary::findOrFail($id);

		return view('secertaries.edit', compact('secertary'));
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
		$secertary = Secertary::findOrFail($id);

		$secertary->degree = $request->input("degree");
        $secertary->national_id = $request->input("national_id");

		$secertary->save();

		return redirect()->route('secertaries.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$secertary = Secertary::findOrFail($id);
		$secertary->delete();

		return redirect()->route('secertaries.index')->with('message', 'Item deleted successfully.');
	}

}
