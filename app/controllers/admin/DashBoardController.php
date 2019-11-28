<?php

namespace App\Controllers\Admin;

use App\Classes\Session;
use App\Controllers\BaseController;
use App\Classes\Request;
use App\Classes\Redirect;
use App\Models\Order;
use App\Models\Product;
use App\Models\Payment;
use App\Models\User;
use App\Classes\Role;
//trying to import capsule in order to perform a raw query
use Illuminate\Database\Capsule\Manager as Capsule;

class DashBoardController extends BaseController{

  public function __construct() {
    if (!Role::middleware('admin')) {
      Redirect::redirectTo("/login");
    }
  }

  public function show() {

    // $orders = Capsule::table('orders')->count(Capsule::raw('DISTINCT order_num'));
    $orders = Order::all()->count();
    $products = Product::all()->count();
    $users = User::all()->count();
    $payments = Payment::all()->sum('amount') / 100;

    return view('admin/dashboard', \compact('orders', 'products', 'users', 'payments'));
  }

  public function getChartData() {

    $revenue = Capsule::table('payments')->select(
      Capsule::raw('sum(amount) / 100 as `amount`'),
      Capsule::raw("DATE_FORMAT(created_at, '%m-%Y') new_date"),
      Capsule::raw('YEAR(created_at) year, Month(created_at) month')
    )->groupBy('year', 'month')->get();

    $orders = Capsule::table('orders')->select(
      Capsule::raw('count(id) as `count`'),
      Capsule::raw("DATE_FORMAT(created_at, '%m-%Y') new_date"),
      Capsule::raw('YEAR(created_at) year, Month(created_at) month')
    )->groupBy('year', 'month')->get();

    echo \json_encode([
      'revenues' => $revenue,
      'orders' => $orders
    ]);

  }
}
