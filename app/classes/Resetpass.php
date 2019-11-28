<?php

namespace App\Classes;

use App\Models\User;
use Carbon\Carbon;

class Resetpass{

  public static function startPassReset($user, $req) {
    $token_hash = hash_hmac('sha256', $req->token, 'GtXcY4C1ye8542KtYGoBEVa4XJXu8Ah1');
    $expire_timestamp = time() + 60 * 60 * 2; //2 hrs from now
    $dataExpires = date('Y-m-d H:i:s', $expire_timestamp);

    $updateUserPass = User::where('id', $user->id)->update([
      'password_reset_hash' => $token_hash,
      'password_reset_exp' => Carbon::createFromFormat('Y-m-d H:i:s', $dataExpires)
    ]);

    return $updateUserPass;
  }


  public static function findByPassReset($token) {
    $token_hash_find = hash_hmac('sha256', $token, 'GtXcY4C1ye8542KtYGoBEVa4XJXu8Ah1');


    $findReset = User::where('password_reset_hash', $token_hash_find)->first();

    if($findReset) {
      //check if password reset token has expired
      if (strtotime($findReset->password_reset_exp) > time()) {
        return $findReset;
      }
    }
  }
}
