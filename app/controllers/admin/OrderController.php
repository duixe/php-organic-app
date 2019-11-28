<?php

namespace App\Controllers\Admin;

use App\Models\Order;
use App\Classes\Role;
use App\Controllers\BaseController;
use App\Classes\Redirect;


class OrderController extends BaseController{
  private $table_name = 'orders';


  public function __construct() {

    if (!Role::middleware('admin')) {
      Redirect::redirectTo("/login");
    }


    // list($this->subcategories, $this->subcategories_links) = paginate(5, $sub_total, 'sub_categories', new SubCategory);

  }

  public function show() {

    $total = Order::all()->count();
    list($orders, $links) = paginate(10, $total, $this->table_name, new Order);
    return view('admin/transactions/orders', compact('orders', 'links'));
  }
















}
