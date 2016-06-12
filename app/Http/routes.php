<?php

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
    Route::get("createExamGlassHome/{id}", "ExamGlassController@examGlass");
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
    Route::get("insertExamination/{id}", "ExaminationController@doctorExamination");

    Route::get("/reservation/{res_id}", "ReservationController@getReservations");
    Route::post("/users/checkdata/", "UserController@valid");
    Route::get('/home', 'HomeController@index');
    Route::post('/medicines/find/', 'MedicineController@find');
    Route::post('/consistitues/find', 'ConsistitueController@find');
    Route::get("reservations/searchKey/{key}", "ReservationController@searchKey");

    Route::get("reservations/searchKey/{key}", "ReservationController@searchKey");
    Route::get("/newPrescriptionDetails/{res_id}", "PrescriptionDetailController@create");

    Route::get("reservations/testing/{key}", "ReservationController@getting");

    Route::get("/all_reservation/{id}", "ReservationController@getReservations");
    Route::post("/reserv/searchByName","ReservationController@getReservationByName");
    Route::post("/reserv/searchByDate","ReservationController@getReservationByDate");
    Route::post("/reserv/searchByDuration","ReservationController@getReservationByDuration");
    Route::resource("posts","PostController");


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
