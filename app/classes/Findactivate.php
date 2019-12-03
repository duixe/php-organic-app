<?php

namespace App\Classes;

use App\Models\User;
use Carbon\Carbon;

class Findactivate{


  public static function findByActionToken($token) {
    $token_hash_find = hash_hmac('sha256', $token, 'GtXcY4C1ye8542KtYGoBEVa4XJXu8Ah1');


    $findActiveToken = User::where('activation_hash', $token_hash_find)->update([ 'is_active' => 1, 'activation_hash' => null]);

    return $findActiveToken;
  }
}
