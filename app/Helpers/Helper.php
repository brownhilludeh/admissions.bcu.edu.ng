<?php

use Illuminate\Support\Facades\DB;

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
