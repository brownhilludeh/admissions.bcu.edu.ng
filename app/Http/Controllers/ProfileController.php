<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function myProfile()
    {
        $profile = User::find(Auth::User()->id);
        return view('backend.profile.index', compact('profile'));
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'oldPassword' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::findOrFail(Auth::user()->id);
        if (Hash::check($request->oldPassword, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();
            Session::flush();
        } else {
            return redirect(url("profile/password/change"))->with('error', __('Your old password does not match our record. Link your email for password reset link.'));
        }

        return redirect(route("myProfile"))->with('success', __('Updated successfully'));
    }
}
