<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Payment extends Model{
  use SoftDeletes;

  public $timestamp = true;
  protected $fillable = ['user_id', 'order_num', 'amount', 'status'];
  protected $dates = ['deleted_at'];

}
