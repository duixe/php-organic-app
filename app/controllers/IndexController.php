<?php

namespace App\Controllers;

use App\Classes\Mail;

class IndexController extends BaseController{

  public function show() {
    return view('home');
  }
}
