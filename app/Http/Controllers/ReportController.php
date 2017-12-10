<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function month()
    {
        $user = Auth::user();
        return view("pages.reports-dash", compact('user'));
    }
}
