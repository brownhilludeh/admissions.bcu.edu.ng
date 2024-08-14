<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;

class UserController extends Controller
{
    public function index($user_type = "")
    {
        $users = [];
        if ($user_type != "") {
            $users = User::where('users.user_type', $user_type)
                ->orderBy('users.id', 'DESC')
                ->get();
        }
        return view('backend.users.index', compact('users'));
    }

    public function create(Request $request)
    {
        if ($request->ajax()) {
            return view('backend.users.modal.create');
        }
        return view('backend.users.create');
    }

    public function show(User $user, Request $request)
    {
        if ($request->ajax()) {
            return view('backend.profiles.modal.show', compact('user'));
        }
        return view('backend.profiles.show', compact('user'));
    }

    public function edit(User $user, Request $request)
    {
        if ($request->ajax()) {
            return view('backend.users.modal.edit', compact('user'));
        }
        return view('backend.users.edit', compact('user'));
    }


    public function update(User $user, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'other_name' => 'nullable|string',
            'country' => 'required|string',
            'lga' => 'required|string',
            'state' => 'required|string',
            'birthday' => 'required|date',
            'religion' => 'required|string',
            'marital_status' => 'required|string',
            'qualification' => 'nullable|string',
            'permanent_address' => 'required',
            'current_address' => '',
            'contract_type' => 'required',
            'about' => 'nullable',
            'portfolio_url' => 'nullable|url',
            'skills' => 'nullable|string',
            'facebook_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'image' => 'nullable|mimes:jpg,jpeg,png|max:1024',

        ]);

        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json(['result' => 'error', 'message' => $validator->error()->all()]);
            }
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $user->random_code = uniqid(12);
        $user->other_name =  $request->other_name;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $manager = ImageManager::gd();
            $ImageName = Auth::user()->first_name . '_' . Auth::user()->last_name . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image = $manager->read($image)->resize(420, 540);
            $image->save(base_path('public/uploads/images/' . Auth::user()->user_type . "/") . $ImageName);
            $user->image =  Auth::user()->user_type . '/' . $ImageName;
        }
        $user->save();

        $profile = Profile::findOrFail($user->profile->user_id);
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
            return response()->json(['result' => 'success', 'action' => 'update', 'message' => __('Updated successfully'), 'data' => $user]);
        }
    }


    public function get_users($user_type = "")
    {
        if ($user_type != "") {
            $users = User::where("user_type", $user_type)->get();
            return json_encode($users);
        }
    }

    public function status($id)
    {
        $user = User::find($id);
        if ($user) {
            if ($user->is_active) {
                $user->is_active = 0;
            } else {
                $user->is_active = 1;
            }
            $user->save();
        }
        return redirect()->back()->with('success', "User status was updated successfully");
    }
}
