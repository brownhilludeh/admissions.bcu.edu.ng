<?php

use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

if (!function_exists('get_table')) {
    function get_table($table, $where = NULL)
    {
        $condition = "";
        if ($where != NULL) {
            $condition .= "WHERE ";
            foreach ($where as $key => $v) {
                $condition .= $key . "'" . $v . "' ";
            }
        }
        $query = DB::select("SELECT * FROM $table $condition");
        return $query;
    }
}
if (!function_exists('get_favicon')) {
    function get_favicon()
    {
        $stamp = get_option("favicon");
        if ($stamp == "") {
            return asset("images/favicon.png");
        }
        return asset("$stamp");
    }
}
if (!function_exists('get_stamp')) {
    function get_stamp()
    {
        $stamp = get_option("stamp");
        if ($stamp == "") {
            return asset("images/stamp.png");
        }
        return asset("$stamp");
    }
}
if (!function_exists('get_logo')) {
    function get_logo()
    {
        $logo = get_option("logo");
        if ($logo == "") {
            return asset("images/logo.png");
        }
        return asset("$logo");
    }
}
if (!function_exists('get_option')) {
    function get_option($name)
    {
        $setting = DB::table('settings')->where('name', $name)->get();
        if (!$setting->isEmpty()) {
            return $setting[0]->value;
        }
        return "";
    }
}
if (!function_exists('get_academic_year')) {
    function get_academic_year($id = "")
    {
        if ($id == "") {
            $id = get_option("academic_year");
        }
        $query = DB::table('academic_years')->where('id', $id)->get();
        if (!$query->isEmpty()) {
            return $query[0]->year;
        }
        return "";
    }
}
if (!function_exists('create_option')) {
    function create_option($table, $value, $display, $selected = "", $where = NULL)
    {
        $options = "";
        $condition = "";
        if ($where != NULL) {
            $condition .= "WHERE ";
            foreach ($where as $key => $v) {
                $condition .= $key . "'" . $v . "' ";
            }
        }

        $query = DB::select("SELECT $value, $display FROM $table $condition");
        foreach ($query as $d) {
            if ($selected != "" && $selected == $d->$value) {
                $options .= "<option value='" . $d->$value . "' selected='true'>" . ucwords($d->$display) . "</option>";
            } else {
                $options .= "<option value='" . $d->$value . "'>" . ucwords($d->$display) . "</option>";
            }
        }

        echo $options;
    }
}

if (!function_exists('count_inbox')) {
    function count_inbox()
    {
        $user_id = Auth::user()->id;
        $inbox = DB::select("SELECT COUNT(id) as c FROM user_messages
		WHERE receiver_id='$user_id' AND user_messages.read='n'");
        return $inbox[0]->c;
    }
}

if (!function_exists('inbox_items')) {
    function inbox_items($limit = 5)
    {
        $messages = Message::join("user_messages", "messages.id", "=", "user_messages.message_id")
            ->join("users", "messages.sender_id", "=", "users.id")
            ->select('messages.*', 'users.email as sender', 'user_messages.read')
            ->where("receiver_id", Auth::user()->id)
            ->where("read", "n")
            ->limit($limit)
            ->orderBy("messages.id", "DESC")->get();

        return $messages;
    }
}
