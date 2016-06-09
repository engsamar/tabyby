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
//        Mapper::map(50, 0, ['marker' => false]);
//
//         Add information window for each address
//        $collection = Address::all();
//
//        $collection->each(function($address)
//        {
//            $content = $address->user->fullname;
//
//            Mapper::informationWindow($address->latitude, $address->longitude, $content);
//        });
//        Mapper::render();
//        die();
        return view('home');
    }

    public function logout()
    {
        Auth::logout(); // log the user out of our application
        return Redirect::to('/login'); // redirect the user to the login screen
    }
}

