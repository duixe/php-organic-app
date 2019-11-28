<?php

namespace App\Controllers\Admin;

use App\Models\Payment;
use App\Classes\Role;
use App\Controllers\BaseController;
use App\Classes\Redirect;



class PaymentController extends BaseController{
  private $table_name = 'payments';


  public function __construct() {

    if (!Role::middleware('admin')) {
      Redirect::redirectTo("/login");
    }


    // list($this->subcategories, $this->subcategories_links) = paginate(5, $sub_total, 'sub_categories', new SubCategory);

  }

  public function show() {

    $total = Payment::all()->count();
    list($payments, $links) = paginate(7, $total, $this->table_name, new Payment);
    return view('admin/transactions/payment', compact('payments', 'links'));
  }
















}
