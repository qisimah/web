<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('/');
    }

    public function landing()
    {
        return view('kings-landing.index');
    }

    public function about()
    {
        return view('kings-landing.about');
    }

    public function contact()
    {
        return view('kings-landing.contact');
    }

    public function login()
    {
        return view('kings-landing.login');
    }
}
