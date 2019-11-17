<?php

namespace App\Controllers;

use App\Classes\Mail;
use App\Models\Product;

class IndexController extends BaseController{

  public function show() {
    return view('home');
  }

  public function showShop() {
    return view('shop');
  }

  public function FeaturedProducts() {
    $product = Product::where('featured', 1)->inRandomOrder()->limit(6)->get();

    echo json_encode(['featured' => $product]);
  }

  public function getProducts() {
    $products = Product::where('featured', 0)->skip(0)->take(8)->get();
    echo json_encode(['products' => $products]);
  }
}
