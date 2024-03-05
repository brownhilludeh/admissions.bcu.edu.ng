<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($user_type = "")
    {
        $user_type = $user_type;
        if ($user_type != '') {
            $users = User::where('user_type', "!=", "super_admin")
                ->where("user_type", $user_type)
                ->orderBy('id', 'DESC')
                ->get();
            return view('backend.user.index', compact('user_type', 'users'));
        }
        $users = User::where('deleted_at', '!=', Null)->get();
        return view('backend.user.index', compact('user_type', 'users'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
