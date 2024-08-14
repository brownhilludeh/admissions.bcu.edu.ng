<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;

class ApplicantController extends Controller
{
    public function index()
    {
        $applications = Applicant::join('academic_years', 'applicants.session_id', '=',  'academic_years.id')
            ->where('applicants.user_id', '=', Auth::User()->id)
            ->orderBy('applicants.id', 'Desc')
            ->get();
        return view('backend.private.applicant.index', compact('applications'));
    }
    public function form()
    {
        $applicant = Applicant::get();
        return view('backend.private.applicant.form', compact('applicant'));
    }

    public function edit($id)
    {
        $user = User::find(Auth::User()->id);
        return view('backend.private.applicant.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'college' => 'nullable',
            'programme' => 'required',
            'jamb_reg_no' => 'required|alpha_num|unique:applicants',
            'o_level_reg_1' => 'nullable',
            'o_level_reg_2' => 'nullable',
            'jamb_score' => 'string|required',
            'jamb_result' => 'nullable|mimes:jpg,jpeg,png,pdf|max:1024',
            'o_level_1' => 'nullable|mimes:jpg,jpeg,png,pdf|max:1024',
            'o_level_2' => 'nullable|mimes:jpg,jpeg,png,pdf|max:500',
            'birth_certificate' => 'nullable|mimes:jpg,jpeg,png,pdf|max:1024',
        ]);

        $apply = new Applicant();
        $apply->user_id = Auth::user()->id;
        $apply->session_id = get_option("academic_year");
        $apply->college = $request->college;
        $apply->programme = $request->programme;
        $apply->jamb_score = $request->jamb_score;
        $apply->jamb_reg_no = $request->jamb_reg_no;
        $apply->o_level_reg_1 = $request->o_level_reg_1;
        $apply->o_level_reg_2 = $request->o_level_reg_2;
        if ($request->hasFile('jamb_result')) {
            $file = $request->file('jamb_result');
            $file_name = Auth::user()->id . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(base_path('public/uploads/files/results/'), $file_name);
            $apply->jamb_result = $file_name;
        }
        if ($request->hasFile('o_level_1')) {
            $file1 = $request->file('o_level_1');
            $file_name1 = Auth::user()->id . uniqid() . '.' . $file1->getClientOriginalExtension();
            $file1->move(base_path('public/uploads/files/results/'), $file_name1);
            $apply->o_level_1 = $file_name1;
        }
        if ($request->hasFile('o_level_2')) {
            $file2 = $request->file('o_level_2');
            $file_name2 = Auth::user()->id . uniqid() . '.' . $file2->getClientOriginalExtension();
            $file2->move(base_path('public/uploads/files/results/'), $file_name2);
            $apply->o_level_2 = $file_name2;
        }
        if ($request->hasFile('birth_certificate')) {
            $file4 = $request->file('birth_certificate');
            $file_name4 = Auth::user()->id . uniqid() . '.' . $file->getClientOriginalExtension();
            $file4->move(base_path('public/uploads/files/birth_cert/'), $file_name4);
            $apply->birth_certificate = $file_name4;
        }
        $apply->save();

        // $profile = Profile::where('profiles.user_id', '=', )
        //     ->find($id);
        // $profile->country = $request->country;
        // $profile->state = $request->state;
        // $profile->lga = $request->lga;
        // $profile->birthday = $request->birthday;
        // $profile->save();


        return redirect(route('dashboard'))->with('success', __('Saved successfully'));
    }

    public function document_form()
    {
        return view('backend.private.applicant.document');
    }

    public function document_upload()
    {
    }
}
