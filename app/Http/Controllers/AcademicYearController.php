<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AcademicYearController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $academicYears = AcademicYear::orderBy('id', 'DESC')->get();
        return view('backend.academic_year.index', compact('academicYears'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if ($request->ajax()) {
            return view('backend.academic_year.modal.create');
        }
        return view('backend.academic_year.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'session' => 'required|string|max:100',
            'year' => 'required',
            'starting_date' => 'required|date',
            'ending_date' => 'nullable|date',
            'active_status' => ''
        ]);

        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json(['result' => 'error', 'message' => $validator->error()->all()]);
            }
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // Store the Academic Year
        $academicYear = new AcademicYear();
        $academicYear->session = $request->input('session');
        $academicYear->year = $request->input('year');
        $academicYear->starting_date = $request->input('starting_date');
        $academicYear->ending_date = $request->input('ending_date');
        $academicYear->save();

        if (!$request->ajax()) {
            return redirect('academic_years')->with('success', __('Academic session was saved successfully'));
        } else {
            return response()->json(['result' => 'success', 'action' => 'store', 'message' => __('Academic session was saved successfully'), 'data' => $academicYear]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, AcademicYear $academicYear)
    {
        if ($request->ajax()) {
            return view('backend.academic_year.modal.view', compact('academicYear'));
        }
        return view('backend.academic_year.view', compact('academicYear'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, AcademicYear $academicYear)
    {
        if ($request->ajax()) {
            return view('backend.academic_year.modal.edit', compact('academicYear'));
        }
        return view('backend.academic_year.edit', compact('academicYear'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AcademicYear $academicYear)
    {
        $validator = Validator::make($request->all(), [
            'session' => 'required|string|max:100',
            'year' => 'required',
            'starting_date' => 'required|date',
            'ending_date' => 'required|date',
            'active_status' => ''
        ]);

        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json(['result' => 'error', 'message' => $validator->error()->all()]);
            }
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $academicYear->session = $request->input('session');
        $academicYear->year = $request->input('year');
        $academicYear->starting_date = $request->input('starting_date');
        $academicYear->ending_date = $request->input('ending_date');
        $academicYear->save();

        if (!$request->ajax()) {
            return redirect(route('academic_years.index'))->with('success', __('Academic session was updated successfully'));
        } else {
            return response()->json(['result' => 'success', 'action' => 'update', 'message' => __('Updated successfully'), 'data' => $academicYear]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AcademicYear $academicYear)
    {
        $current_year = get_option('academic_year');

        if ($current_year == $academicYear->id) {
            return back()->with('warning', __("Oops! Active academic year cannot be deleted! Kindly change the academic session and try again."));
        }
        $academicYear->delete();
        return redirect('academic_years')->with('success', __('Academic year was deleted permanently'));
    }
}
