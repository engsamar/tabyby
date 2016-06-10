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
Route::get("/", "UserController@homePage");


//Roles Patients
Route::auth();
Route::group(['middleware' => ['auth']], function () {
    Route::get('logout', array('uses' => 'HomeController@logout'));
    Route::get('/home', 'HomeController@index');
    Route::resource("/doctorHome", "UserController@doctorHome");
    Route::resource("/patientHome", "UserController@patientHome");
    Route::resource("/secretaryHome", "UserController@secretaryHome");
    Route::resource("medical_histories", "MedicalHistoryController");
    Route::resource("medical_history_details", "MedicalHistoryDetailController");
    Route::resource("clinics", "ClinicController");
    Route::resource("secertaries", "SecertaryController");
    Route::resource("doctor_degrees", "DoctorDegreeController");
    Route::resource("medicines", "MedicineController");
    Route::resource("consistitues", "ConsistitueController");
    Route::resource("complain_details", "ComplainDetailController");
    Route::resource("complains", "ComplainController");
    Route::resource("user_roles", "UserRoleController");
    Route::resource("users", "UserController");
    Route::resource("examinations", "ExaminationController");
    Route::resource("working_hours", "WorkingHourController");
    Route::resource("reservations", "ReservationController");
    Route::resource("role_types", "RoleTypeController");
    Route::resource("/insertExamination", "ExaminationController@doctorExamination");

    Route::resource("user_profiles", "UserProfileController");
    Route::resource("prescription_details", "PrescriptionDetailController");
    Route::resource("prescriptions", "PrescriptionController");
    Route::resource("vacations", "VacationController");

    Route::get("user_profiles/{id}", "UserProfileController@index");

    Route::resource("exam_glasses", "ExamGlassController");
    Route::resource("examGlassHome", "ExamGlassController@examGlass");
    Route::get("user_profiles/{id}/", "UserProfileController@index");
    Route::get("patient/{id}", "ReservationController@patientReserv");
    Route::get("/latest", "ReservationController@latest");
    Route::get("patients/{id}", "ReservationController@patient");
    Route::get("/working_hours/date/{id}", "WorkingHourController@retreve");
    Route::get("/working_hours/{id}", "WorkingHourController@update");
    Route::get("/working_hours/create/{id}", "WorkingHourController@create");

    Route::resource("exam_glass_notes", "ExamGlassNoteController");

    Route::get("newMedicalHistory/{id}", "MedicalHistoryController@create");
    Route::get("newComplain/{res_id}", "ComplainController@create");
    Route::get("newExamination/{id}", "ExaminationController@create");

    Route::get("/reservation/{res_id}", "ReservationController@getReservations");
    Route::post("/users/checkdata/", "UserController@valid");
    Route::get('/home', 'HomeController@index');
    Route::post('/medicines/find/', 'MedicineController@find');
    Route::post('/consistitues/find', 'ConsistitueController@find');
    Route::get("reservations/searchKey/{key}", "ReservationController@searchKey");

//    Route::get('/welcome', function () {
//        return view('welcome');
//    });
//});
////////////
    Route::get("reservations/searchKey/{key}", "ReservationController@searchKey");
    Route::get("/newPrescriptionDetails/{res_id}", "PrescriptionDetailController@create");

    Route::get("reservations/testing/{key}", "ReservationController@getting");

    Route::get("/all_reservation/{id}", "ReservationController@getReservations");
    Route::post("/reserv/searchByName", "ReservationController@getReservationByName");
    Route::post("/reserv/searchByDate", "ReservationController@getReservationByDate");
    Route::post("/reserv/searchByDuration", "ReservationController@getReservationByDuration");

});
Route::group(['middleware' => ['web']], function () {
    Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);

});

// verification token resend form
Route::get('verify/resend', [
    'uses' => 'Auth\VerifyController@showResendForm',
    'as' => 'verification.resend',
]);

// verification token resend action
Route::post('verify/resend', [
    'uses' => 'Auth\VerifyController@sendVerificationLinkEmail',
    'as' => 'verification.resend.post',
]);

// verification message / user verification
Route::get('verify/{token?}', [
    'uses' => 'Auth\VerifyController@verify',
    'as' => 'verification.verify',
]);
