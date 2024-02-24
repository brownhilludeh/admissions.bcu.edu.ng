<?php

namespace App\Http\Controllers;

use App\Models\College;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colleges = College::orderBy('college_name', 'ASC')->get();
        return view('backend.college.index', compact('colleges'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'college_name' => 'required|string|max:191|unique:colleges',
            'dean' => 'required|max:191|unique:colleges',
        ]);

        $colleges = new College();
        $colleges->college_name = $request->college_name;
        $colleges->dean = $request->dean;
        $colleges->save();

        return redirect('colleges')->with('success', __('Saved successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(College $college)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(College $college)
    {
        $colleges = College::orderBy('college_name', 'ASC')->get();

        return view('backend.college.edit', compact('college', 'colleges'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, College $college)
    {
        $this->validate($request, [
            'college_name' => [
                'required', 'string', 'max:191',
                Rule::unique('colleges')->ignore($college->id),
            ],
            'dean' =>
            [
                'required', 'string', 'max:191',
                Rule::unique('colleges')->ignore($college->id),
            ],
        ]);

        $college->college_name = $request->college_name;
        $college->dean = $request->dean;
        $college->save();

        return back()->with('success', 'Updated successfully', compact('college'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(College $college)
    {
        $college->delete();
        return back()->with('success', 'Deleted successfully');
    }
}
