<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\UserRole;
use App\Clinic;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function doctorHome()
    {
        // clinic Info
        $userRole = UserRole::where('type', '=', 0)->firstOrFail();
        //select all clinics address
        $clinics = Clinic::orderBy('id', 'asc')->paginate(10);
        //clinic appointments
        
        return view('users.doctorHome', compact('userRole'),['clinics'=>$clinics]);
    }

    public function index()
    {
        $users = User::orderBy('id', 'asc')->paginate(10);

        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $user = new User();

        $user->username = $request->input("username");
        $user->email = $request->input("email");
        $user->address = $request->input("address");
        $user->telephone = $request->input("telephone");
        $user->mobile = $request->input("mobile");
        $user->password = bcrypt($request->input("password"));
        $user->birthdate = $request->input("birthdate");

        $user->save();

        return redirect()->route('reservations.index')->with('message', 'Item created successfully.');
    }
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);

		return view('users.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::findOrFail($id);

		return view('users.edit', compact('user'));
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
		$user = User::findOrFail($id);

		$user->username = $request->input("username");
        $user->email = $request->input("email");
        $user->address = $request->input("address");
        $user->telephone = $request->input("telephone");
        $user->mobile = $request->input("mobile");
        $user->password = $request->input("password");
        $user->birthdate = $request->input("birthdate");

        $user->save();

        return redirect()->route('users.index')->with('message', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('message', 'Item deleted successfully.');
    }

}
