<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function settings()
    {
        return view('backend.general_settings.settings');
    }
    public function general_settings(Request $request)
    {
        foreach ($_POST as $key => $value) {
            if ($key == "_token") {
                continue;
            }

            $data = array();
            $data['value'] = $value;
            $data['updated_at'] = Carbon::now();
            if (Setting::where('name', $key)->exists()) {
                Setting::where('name', '=', $key)->update($data);
            } else {
                $data['name'] = $key;
                $data['created_at'] = Carbon::now();
                Setting::insert($data);
            }
        }
        //End Loop
        if (!$request->ajax()) {
            return redirect('general_settings')->with('success', __('Record has been saved successfully'));
        } else {
            return response()->json(['result' => 'success', 'action' => 'update', 'message' => __('Record has been saved successfully')]);
        }
    }
    public function logo(Request $request)
    {
        $this->validate($request, [
            'logo' => 'required|image|mimes:jpeg,png,jpg,svg|max:251',
        ]);

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $name = 'logo.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('images/');
            $image->move($destinationPath, $name);

            $data = array();
            $data['value'] = $name;
            $data['updated_at'] = Carbon::now();

            if (Setting::where('name', "logo")->exists()) {
                Setting::where('name', '=', "logo")->update($data);
            } else {
                $data['name'] = "logo";
                $data['created_at'] = Carbon::now();
                Setting::insert($data);
            }

            if (!$request->ajax()) {
                return redirect('general_settings')->with('success', __('Logo has been uploaded successfully'));
            } else {
                return response()->json(['result' => 'success', 'action' => 'update', 'message' => __('Logo has been uploaded successfully')]);
            }
        }
    }
}
