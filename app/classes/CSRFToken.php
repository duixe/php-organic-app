<?php

namespace App\Classes;

class CSRFToken{

  public static function _token() {


    #👇if session has no key called token generate a token and add it
    if (!Session::has('token')) {
      $randomToken = base64_encode(openssl_random_pseudo_bytes(32));
      Session::add('token', $randomToken);
    }

    return Session::get('token');


  }

  public static function verifyCSRFToken($reqToken, $regenerate = true) {
    if (Session::has('token') && Session::get('token') === $reqToken) {
      //if statement is true remove token in order to generate a fresh token
      if ($regenerate) {
        Session::remove('token');
      }

      return true;
    }else {
      return false;
    }
  }

  public static function getHashToken($reqToken) {
    if (Session::has('token') && Session::get('token') === $reqToken) {
      return hash_hmac('sha256', $reqToken, 'GtXcY4C1ye8542KtYGoBEVa4XJXu8Ah1');
    }
  }
}
