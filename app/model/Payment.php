<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Carbon\Carbon;

class Payment extends Model{
  use SoftDeletes;

  public $timestamp = true;
  protected $fillable = ['user_id', 'order_num', 'amount', 'status'];
  protected $dates = ['deleted_at'];


  public function transform(array $data) {
    $payments = [];

    foreach ($data as $item) {
      $added = new Carbon($item->created_at);
      array_push($payments, [
        'id' => $item->id,
        'customer' => User::find($item->user_id),
        'amount' => $item->amount / 100,
        'order_num' => $item->order_num,
        'item_count' => OrderDetail::where('order_num', $item->order_num)->count() ?? 0,
        'status' => $item->status,
        'added' => $added->toFormattedDateString()
      ]);
    }

    return $payments;
  }
}
