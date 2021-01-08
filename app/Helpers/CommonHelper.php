<?php

class CommonHelper {
  public static function formatDateTime($date) {
    return date('d M Y, h:i a', strtotime($date));
  }

  public static function formatDate($date) {
    return date('d M Y', strtotime($date));
  }

  public static function getImageDir() {
    if (App::environment('local')) {
      return $_SERVER['DOCUMENT_ROOT'] . "/adoptadog/images/";
    } else if (App::environment('production')) {
      return $_SERVER['DOCUMENT_ROOT'] . "/images/";
    }
  }

  public static function getFileName($name, $file) {
    $fileName = trim($name);
    $fileName = str_slug($fileName);
    $fileName = $fileName.'.'.$file->getClientOriginalExtension();
    return $fileName;
  }

  public static function formatVetTime($time) {
    if ($time == "") {
      return "";
    }
    $time_arr = explode("-", $time);
    return date('g:ia', strtotime($time_arr[0])). " - ". date('g:ia', strtotime($time_arr[1]));
  }
}
