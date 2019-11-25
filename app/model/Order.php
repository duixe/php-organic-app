<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Order extends Model{
  use SoftDeletes;

  public $timestamp = true;
  protected $fillable = ['user_id', 'order_num', 'quantity', 'product_id', 'unit_price', 'status', 'total'];
  protected $dates = ['deleted_at'];

}
