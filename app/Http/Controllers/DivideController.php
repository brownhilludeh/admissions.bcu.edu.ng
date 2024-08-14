<?php

namespace App\Http\Controllers;

use App\Models\Divide;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DivideController extends Controller
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
        $divides = Divide::orderBy('id', 'Desc')->get();
        return view('backend.divides.index', compact('divides'));
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
        $request->validate([
            'divide_name' => 'string|required|max:100|unique:divides',
            'divide_rank' => 'numeric|required|unique:divides',
        ]);

        $divide = new Divide();
        $divide->divide_name = $request->divide_name;
        $divide->divide_rank = $request->divide_rank;
        $divide->save();

        return back()->with('success', __('Saved successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Divide $divide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Divide $divide, Request $request)
    {
        $divides = Divide::orderBy('updated_at', 'DESC')->get();

        if ($request->ajax()) {
            return view('backend.divides.modal.edit', compact('divide'));
        }

        return view('backend.divides.edit', compact('divide', 'divides'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Divide $divide)
    {
        $request->validate([
            'divide_name' => ['string', 'required', 'unique:divides', 'max:100', Rule::unique('divides')->ignore($divide)],
            'divide_rank' => ['numeric', 'required'],
        ]);

        $divide->divide_name = $request->divide_name;
        $divide->divide_rank = $request->divide_rank;
        $divide->save();

        return redirect(route('divides.index'))->with('success', __('Update successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Divide $divide)
    {
        $divide->delete();
        return redirect()->back()->with('info', __('Archived successfully!'));
    }

    public function archived()
    {
        $divides = Divide::onlyTrashed()->orderBy('id', 'DESC')->get();
        return view('backend.divides.archived', compact('divides'));
    }

    public function restore(Divide $divide, string $id)
    {
        $divide = Divide::onlyTrashed()->findOrFail($id);
        $divide->restore();
        return back()->with('info', __('Restored successfully'));
    }

    public function delete(Divide $divide, string $id)
    {
        $divide = Divide::withTrashed()->findOrFail($id);
        $divide->forceDelete();
        return redirect('divides')->with('info', __('Deleted permanently'));
    }
}
