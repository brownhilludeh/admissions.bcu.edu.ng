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
}
