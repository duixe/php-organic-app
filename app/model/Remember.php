<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use App\Classes\CSRFToken;


class Remember extends Model{
  use SoftDeletes;

  public $timestamp = true;
  protected $fillable = ['token_hash', 'user_id', 'expires_at'];
  protected $dates = ['expires_at'];

}
