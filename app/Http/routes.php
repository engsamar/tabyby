<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::resource("medical_histories","MedicalHistoryController");
Route::resource("medical_history_details","MedicalHistoryDetailController");
Route::resource("clinics","ClinicController");
Route::resource("secertaries","SecertaryController");
Route::resource("doctor_degrees","DoctorDegreeController");
Route::resource("medicines","MedicineController");
Route::resource("consistitues","ConsistitueController");
Route::resource("complain_details","ComplainDetailController");
Route::resource("complains","ComplainController");
Route::resource("reserve_types","ReserveTypeController");
Route::resource("user_roles","UserRoleController");
Route::resource("users","UserController");
Route::resource("examinations","ExaminationController");
Route::resource("working_hours","WorkingHourController");
Route::resource("reservations","ReservationController");
Route::resource("role_types","RoleTypeController");
Route::resource("/doctorHome","UserController@doctorHome");
Route::resource("user_profiles","UserProfileController");
Route::resource("prescription_details","PrescriptionDetailController");
Route::resource("prescriptions","PrescriptionController");
Route::get("user_profiles/{id}","UserProfileController@index");
Route::auth();


Route::get('logout', array('uses' => 'HomeController@logout'));
Route::group(['middleware' => ['web']], function () {
    // Put all your routes inside here.
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');
});
Route::get('/ajax',function(){
//    console.log('sdfsdf');
    $id=Input::get('id');
    $workinghours=WorkingHour::where('id','=',$id)->get();
    return Response::json($workinghours);
});

Route::get("patient/{id}/{patient_id}","ReservationController@show");