<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;


class User extends Model{
  use SoftDeletes;

  public $timestamp = true;
  protected $fillable = ['username', 'fullname', 'email', 'password', 'address', 'role', 'password_reset_hash', 'password_reset_exp'];
  protected $dates = ['deleted_at'];

}
