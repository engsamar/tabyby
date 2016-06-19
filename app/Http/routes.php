<?php
Route::get("/", "UserController@homePage");
Route::auth();

//Roles Doctor
Route::group(['middleware' => ['auth','roles']], function () {
    Route::resource("clinics", "ClinicController");
    Route::resource("medical_histories", "MedicalHistoryController");
    Route::resource("medical_history_details", "MedicalHistoryDetailController");
    Route::resource("secertaries", "SecertaryController");
    Route::resource("doctor_degrees", "DoctorDegreeController");
    Route::resource("medicines", "MedicineController");
    Route::resource("complain_details", "ComplainDetailController");
    Route::resource("complains", "ComplainController");
    Route::resource("user_roles", "UserRoleController");
    Route::resource("examinations", "ExaminationController");
 //   Route::resource("role_types", "RoleTypeController");
    Route::resource("/insertExamination", "ExaminationController@doctorExamination");
    Route::resource("prescription_details", "PrescriptionDetailController");
    Route::resource("prescriptions", "PrescriptionController");
    Route::resource("exam_glasses", "ExamGlassController");
    Route::resource("examGlassHome", "ExamGlassController@examGlass");
    Route::get("createExamGlassHome/{id}", "ExamGlassController@examGlass");
    Route::resource("posts","PostController");
    Route::get("/medicine/find","MedicineController@find");

    Route::get("/exitReserv/{id}", "ReservationController@exitReserv");
    Route::get("/nextReserv/{id}", "ReservationController@nextReserv");

});

//Roles Doctor and Secretary
Route::group(['middleware' => ['auth','clinicRoles']], function () {
    Route::resource("clinics", "ClinicController@index");
    Route::resource("working_hours", "WorkingHourController");
    Route::get("reservations/today", "ReservationController@latest");
    Route::resource("reservations", "ReservationController@index");
    Route::resource("exam_glass_notes", "ExamGlassNoteController");
    Route::get("newMedicalHistory/{id}", "MedicalHistoryController@create");
    Route::get("newComplain/{res_id}", "ComplainController@create");
    Route::get("insertExamination/{id}", "ExaminationController@doctorExamination");
    Route::resource("vacations", "VacationController");
    Route::get("/newPrescriptionDetails/{res_id}", "PrescriptionDetailController@create");
    Route::get("/cancelledReservation", "ReservationController@cancel");
    

});

//Roles user login
Route::group(['middleware' => ['auth']], function () {
    Route::get('logout', array('uses' => 'HomeController@logout'));
    Route::get('/home', 'HomeController@index');
    Route::resource("/doctorHome", "UserController@doctorHome");
    Route::resource("/patientHome", "UserController@patientHome");
    Route::resource("/secretaryHome", "UserController@secretaryHome");
    Route::get("/reservations/existed/{id}", "ReservationController@existed");
    Route::resource("consistitues", "ConsistitueController");
    Route::resource("reservations", "ReservationController");
    Route::resource("users", "UserController");
   
    Route::get("movePatients/{fromtim}/{totim}", "VacationController@movePatients");
    Route::get("/checkReservDate/{date}/{clinic_id}", "ReservationController@checkReservDate");

    Route::get("specificDate", "VacationController@specificDate");


    Route::get("/MoveAllPatients/{old_date}/{new_date}", "VacationController@MoveAllPatients");
    Route::get("/moveSome_Patients/{date}", "VacationController@moveSome_Patients");
    Route::get("/moveSome_store/{new_date}/{old_date}/{user_id}", "VacationController@moveSome_store");


    Route::get("user_profiles/{id}/", "UserProfileController@index");
    Route::get("patient/{id}", "ReservationController@patientReserv");
    ///
    Route::get("/chooseClinic", "ClinicController@chooseClinic");
    Route::get("/allReservations", "ReservationController@index");
    Route::get("patients/{id}", "ReservationController@patient");
    Route::get("/working_hours/date/{id}", "WorkingHourController@retreve");
    Route::get("/working_hours/{id}", "WorkingHourController@update");
    Route::get("/working_hours/create/{id}", "WorkingHourController@create");
    

    Route::get("/reservation/{res_id}", "ReservationController@getReservations");
    Route::get("/patientReservation", "ReservationController@patientReservations");


    Route::get('/home', 'HomeController@index');
    Route::post('/medicines/find/', 'MedicineController@find');
    Route::post('/consistitues/find', 'ConsistitueController@find');
    Route::get("reservations/searchKey/{key}", "ReservationController@searchKey");
    Route::get("/secretaries/find/{name}", "SecertaryController@find");
    Route::patch("reservcancel", "ReservationController@destroy");

    Route::get("reservations/testing/{key}", "ReservationController@getting");
//    Route::get("/create", "ReservationController@create");
    Route::get("/all_reservation/{id}", "ReservationController@getReservations");
    Route::post("/reserv/searchByName","ReservationController@getReservationByName");
    Route::post("/reserv/searchByDate","ReservationController@getReservationByDate");
    Route::post("/reserv/searchByDuration","ReservationController@getReservationByDuration");
    Route::post("/reserv/searchByNameAndDate","ReservationController@getReservationByDateAndName");
   // Route::post("/reserv/searchByNameAndDate/{name}/{date}","ReservationController@searchByNameAndDate");


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
    'as' => 'verification.verusersify',
]);
Route::group(['prefix' => 'messages', 'before' => 'auth'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::get('{id}/read', ['as' => 'messages.read', 'uses' => 'MessagesController@read']);
    Route::get('unread', ['as' => 'messages.unread', 'uses' => 'MessagesController@unread']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});
Route::get('/welcome', function()
{
   return view('welcome');
});

//ajax validation
Route::post("/users/checkdata/", "UserController@valid");

Route::get('movePatients', function()
{
   return view('vacations.movePatients');
});


Route::get('profile', function()
{
   return view('users.profile');
});
Route::get('/error', function()
{
   return view('errors');
});


Route::get('/blog', 'PostController@allPosts');
Route::get('/blog-detail/{id}', 'PostController@blogDetail');
Route::get('/contact', 'UserController@contact');
