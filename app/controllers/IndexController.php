<?php

namespace App\Controllers;

use App\Classes\Mail;
use App\Models\Product;
use App\Classes\Request;
use App\Classes\CSRFToken;

class IndexController extends BaseController{

  public function show() {

    return view('home');
  }

  public function showShop() {
    $token = CSRFToken::_token();
    return view('shop', compact(token));
  }

  public function FeaturedProducts() {
    $product = Product::where('featured', 1)->inRandomOrder()->limit(6)->get();

    echo json_encode(['featured' => $product]);
  }

  public function getProducts() {
    $products = Product::where('featured', 0)->skip(0)->take(8)->get();
    echo json_encode(['products' => $products, 'count' => count($products)]);
  }

  public function loadMoreProducts() {
    $request = Request::get('post');
    if (CSRFToken::verifyCSRFToken($request->token, false)) {
      $count = $request->count;
      $item_per_page = $count + $request->next;

      $products = Product::where('featured', 0)->skip(0)->take($item_per_page)->get();
      echo json_encode(['products' => $products, 'count' => count($products)]);
    }
  }
}
