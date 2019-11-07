<?php

namespace App\Classes;

class Redirect{

    #reirect to a specific page
    public static function redirectTo($page) {
      header("location: $page");
    }

    #redirect to same page
    public static function redirectBack() {
      $uri = $_SERVER['REQUEST_URI'];
      header("location: $uri");
    }
}
