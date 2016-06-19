<?php namespace App\Http\Controllers;

use App\DoctorDegree;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ClinicConstants;
use App\Post;
use App\User;
use App\UserRole;
use App\WorkingHour;
use App\Clinic;
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
    public function contact()
    {
        $doctorRole = UserRole::where('type', '=', 0)->firstOrFail();
        $clinics = Clinic::all();
        if (count($clinics)!=0){
            $address=[];
            foreach ($clinics as $clinic){

                $prepAddr = str_replace(' ','+',$clinic->address);
                $geocode=file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
                $output= json_decode($geocode);
                $latitude = $output->results[0]->geometry->location->lat;
                $longitude = $output->results[0]->geometry->location->lng;
                array_push($address,$latitude,$longitude);
            }

            return view('users.contact', compact('doctorRole'),['addresses'=>$address]);
        }else{
            return view('users.contact', compact('doctorRole'));
        }


    }

    public function homePage()
    {
        $posts = Post::all();
        $doctorRole = UserRole::where('type', '=', 0)->firstOrFail();
        $doctorDegree = DoctorDegree::all();
        $clinics = Clinic::all();
        $workHours = WorkingHour::all();
        $user = Auth::user();
        if ($user) {
            $userRoleType = UserRole::where('user_id', '=', $user->id)->value('type');
        } else {
            $userRoleType = null;
        }
        return view('users.HomePage', compact('doctorRole', 'userRoleType', 'doctorDegree', 'posts'), ['clinics' => $clinics, 'day' => ClinicConstants::$day, 'workingHours' => $workHours]);
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
        $doctorRole = UserRole::where('type', '=', 0)->firstOrFail();

        return view('users.create',compact('doctorRole'));
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
        $user->gender = $request->input("gender");
        $user->save();
        $user_role = new UserRole();
        $user_role->type = 2;
        $user_role->user_id = $user->id;
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
        $doctorRole = UserRole::where('type', '=', 0)->firstOrFail();
        $reservations = Reservation::where('user_id', $id)->get();

        $reserveType = ClinicConstants::$reservationType;
        $user = User::findOrFail($id);
        $userRoleType = \App\UserRole::where('user_id', '=', $user->id)->value('type');


        return view('users.show', compact('doctorRole','user', 'userRoleType', 'reservations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $doctorRole = UserRole::where('type', '=', 0)->firstOrFail();
        $user = User::findOrFail($id);

        return view('users.edit', compact('doctorRole','user'));
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
