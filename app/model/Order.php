<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;



class Order extends Model{
  use SoftDeletes;

  public $timestamp = true;
  protected $fillable = ['user_id', 'order_num'];
  protected $dates = ['deleted_at'];


  private function orderDetails($order_num) {
    return OrderDetail::where('order_num', $order_num)->get();
  }

  public function transform(array $data ) {
    $response = [];
    foreach ($data as $order) {
      $when = new Carbon( $order->created_at);

      foreach ($this->orderDetails($order->order_num) as $detail) {
        $response[$detail->order_num][] = [
          'product' => Product::find($detail->product_id),
          'quantity' => $detail->quantity,
          'status' => $detail->status,
          'unit_price' => $detail->unit_price,
          'total' => $detail->total
        ];
        $response[$detail->order_num]['customer'] = User::find($detail->user_id);
        $amount = Payment::where('order_num', $detail->order_num)->first()->amount / 100;
        $response[$detail->order_num]['total'] = $amount;
        $response[$detail->order_num]['when'] = $when->toFormattedDateString();
      }
    }

    return $response;
  }
}
