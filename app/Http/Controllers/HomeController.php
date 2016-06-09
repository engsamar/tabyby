<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Cornford\Googlmapper\Mapper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('home');
    }

    public function logout()
    {
        Auth::logout(); // log the user out of our application
        return Redirect::to('/'); // redirect the user to the login screen
    }
}

