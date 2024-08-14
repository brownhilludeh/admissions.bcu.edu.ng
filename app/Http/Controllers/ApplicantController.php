<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\User;
use App\Notifications\AdmissionStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($year = "")
    {
        $applicants = [];
        if ($year != "") {
            $applicants = Applicant::select('*', 'applicants.id AS id')
                ->join('users', 'users.id', '=', 'applicants.user_id')
                ->where('users.user_type', 'Applicant')
                ->where('applicants.session_id', $year)
                ->where('users.deleted_at', NULL)
                ->orderBy('applicants.id', 'ASC')
                ->get();
        }
        return view('backend.applicants.index', compact('applicants', 'year'));
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
    public function show(Applicant $applicant, Request $request)
    {
        if ($request->ajax()) {
            return view('backend.applicants.modal.view', compact('applicant'));
        }
        return view('backend.applicants.view', compact('applicant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Applicant $applicant, Request $request)
    {
        if ($request->ajax()) {
            return view('backend.applicants.modal.edit', compact('applicant'));
        }
        return view('backend.applicants.edit', compact('applicant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Applicant $applicant)
    {

        $validator = Validator::make($request->all(), [
            'decision' => 'required|string|max:100',
            'comment' => 'nullable',
        ]);

        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json(['result' => 'error', 'message' => $validator->error()->all()]);
            }
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $applicant->comment = $request->comment;
        $applicant->decision = $request->decision;
        $applicant->save();

        if (!$request->ajax()) {
            return redirect()->back()->with('success', __('Update successfully'));
        } else {
            return response()->json(['result' => 'success', 'action' => 'update', 'message' => __('Updated successfully'), 'data' => $applicant]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Applicant $applicant)
    {
        $applicant->delete();
        return redirect()->back()->with('info', __('Archived successfully!'));
    }

    public function archived()
    {
        $applicants = Applicant::onlyTrashed()->orderBy('id', 'DESC')->get();
        return view('backend.applicants.archived', compact('applicants'));
    }

    public function restore(applicant $applicant, string $id)
    {
        $applicant = Applicant::onlyTrashed()->findOrFail($id);
        $applicant->restore();
        return back()->with('info', __('Restored successfully'));
    }

    public function delete(applicant $applicant, string $id)
    {
        $applicant = Applicant::withTrashed()->findOrFail($id);
        $applicant->forceDelete();
        return redirect('applicants')->with('info', __('Deleted permanently'));
    }
}
