<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Programme;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProgrammeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index($college = "")
    {
        $programmes = [];
        if ($college != "") {
            $programmes = Programme::with('colleges')
                ->where('programmes.college_id', $college)
                ->orderBy('programme_name', 'ASC')->get();
        }
        return view('backend.programme.index', compact('programmes', 'college'));
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
        $this->validate($request, [
            'programme_name' => 'required|string|max:191|unique:programmes',
            'college_id' => 'string',
            'hod' => 'nullable|numeric|unique:programmes',
            'capacity' => 'numeric',
        ]);
        $programme = new Programme();
        $programme->programme_name = $request->programme_name;
        $programme->college_id = $request->college_id;
        $programme->hod = $request->hod;
        $programme->capacity = $request->capacity;
        $programme->save();

        return back()->with('success', __('Saved successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Programme $programme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Programme $programme)
    {
        $programmes = Programme::with('colleges')->orderBy('programme_name', 'ASC')->get();
        return view('backend.programme.edit', compact('programme', 'programmes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Programme $programme)
    {
        $this->validate($request, [
            'programme_name' => [
                'required', 'string', 'max:191',
                Rule::unique('programmes')->ignore($programme->id)
            ],
            'college_id' => 'required|numeric',
            'hod' =>
            [
                'nullable', 'string', 'max:191',
                Rule::unique('programmes')->ignore($programme->id)
            ],
            'capacity' => 'numeric',
        ]);
        $programme->programme_name = $request->programme_name;
        $programme->college_id = $request->college_id;
        $programme->hod = $request->hod;
        $programme->capacity = $request->capacity;
        $programme->save();

        return back()->with('success', __('Saved successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Programme $programme)
    {
        //
    }
}
