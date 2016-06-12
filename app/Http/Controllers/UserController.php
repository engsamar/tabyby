<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ClinicConstants;
use App\User;
use App\UserRole;
use App\Clinic;
use App\WorkingHour;
//use App\Working
use Auth;
use App\Reservation;
use Illuminate\Http\Request;
use League\Flysystem\Adapter\NullAdapter;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function homePage()
    {
        $userRole = UserRole::where('type', '=', 0)->firstOrFail();
        //select all clinics address
//        $w =WorkingHour::class
        $clinics = Clinic::orderBy('id', 'asc')->paginate(10);
//        die($clinics[0]->workingHours);

        $user=Auth::user();
        if($user){
        $userRoleType=UserRole::where('user_id', '=', $user->id)->value('type');
        }else{
            $userRoleType=null;
        }
        return view('users.HomePage',compact('userRole','userRoleType'),['clinics' => $clinics, 'day' => ClinicConstants::$day]);
    }

    public function patientHome()
    {
        $userRole = UserRole::where('type', '=', 0)->firstOrFail();
        //select all clinics address
        $clinics = Clinic::orderBy('id', 'asc')->paginate(10);
        //clinic appointments
        $user=Auth::user();
        if($user){
        $userRoleType=UserRole::where('user_id', '=', $user->id)->value('type');
        }else{
            $userRoleType=null;
        }
        $reservation = Reservation::where('user_id', $user->id)->get();
//        $clinic_name=Clinic::where
        return view('users.patientHome', compact('userRole','userRoleType'), ['clinics' => $clinics, 'reservation' => $reservation, 'reservationType' => ClinicConstants::$reservationType, 'day' => ClinicConstants::$day]);
    }

    public function secretaryHome()
    {
        $userRole = UserRole::where('type', '=', 0)->firstOrFail();
        //select all clinics address
        $clinics = Clinic::orderBy('id', 'asc')->paginate(10);
        //clinic appointments
        $user=Auth::user();
        if($user){
        $userRoleType=UserRole::where('user_id', '=', $user->id)->value('type');
        }else{
            $userRoleType=null;
        }

        return view('users.secretaryHome', compact('userRole','userRoleType'), ['clinics' => $clinics, 'day' => ClinicConstants::$day]);
    }

    public function doctorHome()
    {
        // clinic Info
        $userRole = UserRole::where('type', '=', 0)->firstOrFail();
        //select all clinics address
        $clinics = Clinic::orderBy('id', 'asc')->paginate(10);
        //clinic appointments
        $user=Auth::user();
        if($user){
        $userRoleType=UserRole::where('user_id', '=', $user->id)->value('type');
        }else{
            $userRoleType=null;
        }

        return view('users.doctorHome', compact('userRole','userRoleType'), ['clinics' => $clinics, 'day' => ClinicConstants::$day]);
    }

    public function index()
    {
        $users = User::orderBy('id', 'asc')->paginate(10);

        return view('users.index', compact('users'));
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
        $user->password = $request->input("password");
        $user->save();
        $user_role = new UserRole();
        $user_role->type = 2;
        $user_role->user_id=$user->id;
        $user_role->save();

        return redirect()->route('reservations.index')->with('message', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
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
     * @param  int $id
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
     * @param  int $id
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
        $user->birthdate = $request->input("birthdate");

        $user->save();

        return redirect('/')->with('message', 'Item updated successfully.');
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

    public function valid(Request $request)
    {
        switch ($request->input("action")) {
            case "username":
                $name = User::where('username', $request->input("username"))->first();
                if ($name) {
                    return "yes";
                } else {
                    return "no";
                }
                break;
            case "email":
                $email = User::where('email', $request->input("email"))->first();
                if ($email) {
                    return "yes";
                } else {
                    return "no";
                }
                break;
        }
    }


}
