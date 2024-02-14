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
