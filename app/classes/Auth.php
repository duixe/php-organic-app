<?php
namespace App\Classes;

use App\Models\Remember;
use App\Models\User;
use Carbon\Carbon;
use App\Controllers\AuthController;

  class Auth{

    public $expire_timestamp;

    public function rememberLogin($req, $user) {
      $token_hash = hash_hmac('sha256', $req->token, 'GtXcY4C1ye8542KtYGoBEVa4XJXu8Ah1');
      $this->remember_token = $req->token;
      $this->expire_timestamp = time() + 60 * 60 * 24 * 30;
      $dataExpires = date('Y-m-d H:i:s', $this->expire_timestamp);


    $insertRemeber =  Remember::create([
        'token_hash' => $token_hash,
        'user_id' => $user->id,
        'expires_at' => Carbon::createFromFormat('Y-m-d H:i:s', $dataExpires)
      ]);

      return $insertRemeber;
    }


    public static function getUser() {
      if(!user()) {
       static::loginFromRememberCookie();
      }
    }

    protected static function loginFromRememberCookie() {

      $cookie = $_COOKIE['remember_me'] ?? false;

      //check if cookie can be found in the database then use it to login
      if ($cookie) {
        $cookie = hash_hmac('sha256', $cookie, 'GtXcY4C1ye8542KtYGoBEVa4XJXu8Ah1');
        $remembered_login = Remember::where('token_hash', $cookie)->first();
        $hasExpired = strtotime($remembered_login->expires_at) < time();

        if ($remembered_login && !$hasExpired) {
          $user = User::where('id', $remembered_login->user_id)->first();
          Session::add('SESSION_USER_ID', $user->id);
          Session::add('SESSION_USER_NAME', $user->username);
        }
      }
      return false;
    }

    public static function deleteRemeberMe() {
      $cookie = $_COOKIE['remember_me'] ?? false;

      if ($cookie) {
        $cookie = hash_hmac('sha256', $cookie, 'GtXcY4C1ye8542KtYGoBEVa4XJXu8Ah1');
        $remembered_login = Remember::where('token_hash', $cookie)->first();

        if ($remembered_login) {
          Remember::where('token_hash', $cookie)->delete();
        }

        \setcookie('remember_me', '', time() - 3600);
    }
  }
}
