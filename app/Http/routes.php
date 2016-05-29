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

Route::get('/', function () {
    return view('welcome');
});

Route::resource("medical_histories","MedicalHistoryController");
Route::resource("medical_history_details","MedicalHistoryDetailController");
Route::resource("clinics","ClinicController");
Route::resource("secertaries","SecertaryController");
Route::resource("doctor_degrees","DoctorDegreeController");