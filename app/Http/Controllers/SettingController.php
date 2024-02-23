<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function backup_database()
    {
        @ini_set('max_execution_time', 0);
        @set_time_limit(0);

        $return = "";
        $database = 'Tables_in_' . DB::getDatabaseName();
        $tables = array();
        $result = DB::select("SHOW TABLES");

        foreach ($result as $table) {
            $tables[] = $table->$database;
        }

        //loop through the tables
        foreach ($tables as $table) {
            $return .= "DROP TABLE IF EXISTS $table;";

            $result2 = DB::select("SHOW CREATE TABLE $table");
            $row2 = $result2[0]->{'Create Table'};

            $return .= "\n\n" . $row2 . ";\n\n";

            $result = DB::select("SELECT * FROM $table");

            foreach ($result as $row) {
                $return .= "INSERT INTO $table VALUES(";
                foreach ($row as $key => $val) {
                    $return .= "'" . addslashes($val) . "',";
                }
                $return = substr_replace($return, "", -1);
                $return .= ");\n";
            }
            $return .= "\n\n\n";
        }

        //save file
        $file = '../backup/DB-BACKUP-' . time() . '.sql';
        $handle = fopen($file, 'w+');
        fwrite($handle, $return);
        fclose($handle);

        // to download file on clients system
        return response()->download($file);
        return back()->with('success', __('Manual database backup on the server was successful'));
    }
}
