<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $method = Auth::user()->user_type . '_dashboard';
        return $this->$method();
    }

    private function SuperAdmin_dashboard()
    {
        return view('backend.dashboards.' . Auth::user()->user_type);
    }
}
