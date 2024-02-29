<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicantController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::first(Auth::User()->id);
        // $applicant = Applicant::join('users', 'users.id', '=', 'applicants.user_id');
        // ->where('users.*', 'users.id', Auth::user()->id)
        // ->where('users.id', Auth::user()->id);
        // dd($applicant);

        //     ->orderBy('students.last_name', 'ASC')
        //     ->find(Auth::User()->id);
        return view('backend.applicants.index', compact('applicant', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Applicant $applicant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Applicant $applicant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Applicant $applicant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Applicant $applicant)
    {
        //
    }
}
