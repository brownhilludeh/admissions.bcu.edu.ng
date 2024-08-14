<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $method = Auth::user()->user_type . '_dashboard';
        return $this->$method();
    }

    private function SuperAdmin_dashboard()
    {
        $user = User::find(Auth::User()->id);
        return view('backend.dashboards.' . Auth::user()->user_type, compact('user'));
    }
    private function Admin_dashboard()
    {
        return view('backend.dashboards.' . Auth::user()->user_type);
    }
    private function Teacher_dashboard()
    {
        return view('backend.dashboards.' . Auth::user()->user_type);
    }
    private function Parent_dashboard()
    {
    }
    private function Student_dashboard()
    {
        return view('backend.dashboards.' . Auth::user()->user_type);
    }
    private function Applicant_dashboard()
    {
        $user = User::find(Auth::User()->id);
        $apply = Applicant::where('applicants.session_id',  get_option('academic_year'))
            ->where('applicants.user_id', Auth::User()->id)
            ->first();
        // $applicants = Applicant::where('applicants.user_id', '=', Auth::User()->id)
        //     ->where('applicants.session_id', '=',  get_option('academic_year'))
        //     ->get();
        $applicant = Applicant::where('applicants.user_id', '=', Auth::User()->id)
            ->where('applicants.session_id', '=',  get_option('academic_year'))
            ->first();

        $app = User::find(Auth::User()->id)->applicants()
            ->where('applicants.session_id', '=',  get_option('academic_year'))
            ->first();
        return view('backend.dashboards.' . Auth::user()->user_type, compact('applicant', 'apply', 'user', 'app'));
    }
    private function User_dashboard()
    {
        return view('backend.dashboards.' . Auth::user()->user_type);
    }
    private function Librarian_dashboard()
    {
        return view('backend.dashboards.' . Auth::user()->user_type);
    }
    private function Accountant_dashboard()
    {
        return view('backend.dashboards.' . Auth::user()->user_type);
    }
    private function Employee_dashboard()
    {
        return view('backend.dashboards.' . Auth::user()->user_type);
    }
}
