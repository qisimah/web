<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$user = Auth::user()->toArray();
		return view('pages.index', compact('user'));
	}
}
