<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::find(Auth::User()->id);
        // $profile = profile::where('profiles.user_id', '=', Auth::user()->id)
        //     ->first(Auth::User()->id);
        return view('backend.profiles.index', compact('user'));
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
    public function show(Profile $profile)
    {
        return $profile->id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile, Request $request)
    {
        if ($request->ajax()) {
            return view('backend.profiles.modal.edit', compact('profile'));
        }
        return view('backend.profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        $validator = Validator::make($request->all(), [
            'country' => 'required|string',
            'lga' => 'required',
            'state' => 'required',
            'birthday' => 'required',
            'religion' => 'required',
            'marital_status' => 'required',
            'qualification' => 'nullable',
            'permanent_address' => 'required',
            'current_address' => '',
            'contract_type' => 'required',
            'about' => 'nullable',
            'portfolio_url' => 'nullable',
            'skills' => 'nullable',
            'facebook_url' => 'nullable',
            'twitter_url' => 'nullable',
            'instagram_url' => 'nullable',
        ]);

        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json(['result' => 'error', 'message' => $validator->error()->all()]);
            }
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $profile->country = $request->input('country');
        $profile->lga = $request->input('lga');
        $profile->state = $request->input('state');
        $profile->birthday = $request->input('birthday');
        $profile->religion = $request->input('religion');
        $profile->marital_status = $request->input('marital_status');
        $profile->qualification = $request->input('qualification');
        $profile->current_address = $request->input('current_address');
        $profile->permanent_address = $request->input('permanent_address');
        $profile->contract_type = $request->input('contract_type');
        $profile->about = $request->input('about');
        $profile->portfolio_url = $request->input('portfolio_url');
        $profile->skills = $request->input('skills');
        $profile->facebook_url = $request->input('facebook_url');
        $profile->twitter_url = $request->input('twitter_url');
        $profile->instagram_url = $request->input('instagram_url');
        $profile->save();


        if (!$request->ajax()) {
            return redirect(route('dashboard'))->with('success', __('Updated successfully'));
        } else {
            return response()->json(['result' => 'success', 'action' => 'update', 'message' => __('Updated successfully'), 'data' => $profile]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
