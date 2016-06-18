<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ClinicConstants;
use App\Http\Requests;
use App\Secertary;
use App\UserRole;
use App\Clinic;
use App\User;
use Auth;

class SecertaryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $secertaries = Secertary::all();

        $userRole = UserRole::where('type', '=',1)->get();
        $users = User::all();
        return view('secertaries.index', compact('secertaries'), ['userRole' => $userRole, 'users' => $users]);
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
        return view('secertaries.create')->with('address', $clinic)->with('userRoleType', $userRole);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
       // $user_role = new UserRole();
        $user_id = User::where('username', $request->input("name"))->value('id');
        $user_role = UserRole::where('user_id',$user_id)->first();
        // $user_name = $request->input("name");
        $user_role->type = 1;       
        $user_role->save();

        $secertary = new Secertary();
        $secertary->degree = $request->input("degree");
        $secertary->userRole_id = $user_role->id;
        $secertary->national_id = $request->input("national_id");
        $secertary->clinic_id = $request->input("address");
        $secertary->save();

        return redirect()->route('secertaries.index')->with('message', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
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
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $secertary = Secertary::findOrFail($id);
        $userRole = UserRole::findOrFail($secertary->userRole_id);
        $user = User::findOrFail($userRole->user_id);
        return view('secertaries.edit', compact('secertary'), ['user' => $user]);
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
        //for update Secretary information as a user
        if (!empty($request->input("userId"))) {
            $user = User::findOrFail($request->input("userId"));
            $user->username = $request->input("username");
            $user->email = $request->input("email");
            $user->address = $request->input("address");
            $user->telephone = $request->input("telephone");
            $user->mobile = $request->input("mobile");
            $user->birthdate = $request->input("birthdate");
            $user->save();
        }
        //for update secretary
        $secertary = Secertary::findOrFail($id);

        $secertary->degree = $request->input("degree");
        $secertary->national_id = $request->input("national_id");

        $secertary->save();

        return redirect()->route('secertaries.index')->with('message', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $secertary = Secertary::findOrFail($id);
        $user_role = UserRole::where('id',$secertary->userRole_id)->first();
        $user_role->type = 2;       
        $user_role->save();

        $secertary->delete();

        return redirect()->route('secertaries.index')->with('message', 'Item deleted successfully.');
    }

    public function find($name)
    {
        $user_role = null;
        $user = User::where("username", "=", $name)->get();
        if (count($user) != 0) {
            foreach ($user as $value) {
                foreach ($value->userRoles as $role) {
                    if ($role["type"] == 1) {
                        $user_role = $role["id"];
                        break;
                    }

                }
            }
            if ($user_role != null) {
                $secretary = Secertary::where("userRole_id", "=", $user_role)->get();
                if (count($secretary) == 0) {
                    return "yes";
                } else {
                    return "no";
                }
            }
        }
    }
}
