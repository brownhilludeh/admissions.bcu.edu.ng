<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = ClassModel::orderBy('id', 'DESC')->get();
        return view('backend.classes.index', compact('classes'));
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
            'class_name' => 'required|string|max:191|unique:classes',
            'slogan' => 'nullable',
            'divide_id' => 'numeric'
        ]);

        $class = new ClassModel();
        $class->class_name = $request->class_name;
        $class->slogan = $request->slogan;
        $class->divide_id = $request->divide_id;
        $class->save();

        return redirect('classes')->with('success', __('Saved successfully'));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        if (!$request->ajax()) {
            $data = [
                'class' => ClassModel::findOrFail($id),
                'classes' => ClassModel::orderBy('id', 'DESC')->get(),
            ];
            return view('backend.classes.edit', $data);
        } else {
            $data = [
                'class' => ClassModel::findOrFail($id),
                'classes' => ClassModel::orderBy('id', 'DESC')->get(),
            ];
            return view('backend.classes.modal.edit', $data);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'class_name' => [
                'required', 'string', 'max:191',
                Rule::unique('classes')->ignore($id),
            ],
            'divide_id' => 'numeric',
            'slogan' => 'nullable|string|max:191',
        ]);

        $class = ClassModel::findOrFail($id);
        $class->class_name = $request->class_name;
        $class->divide_id = $request->divide_id;
        $class->slogan = $request->slogan;
        $class->save();

        return redirect('classes')->with('success', __('Updated successfully '));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
