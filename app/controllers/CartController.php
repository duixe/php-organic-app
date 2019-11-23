<?php

namespace App\Controllers;

use App\Classes\Cart;
use App\Classes\CSRFToken;
use App\Classes\Request;
use App\Classes\Session;
use App\Models\Product;

class CartController extends BaseController{

  public function show() {
    return view('cart');
  }

  public function addItem() {

    if(Request::has('post')) {
      $request = Request::get('post');

      if(CSRFToken::verifyCSRFToken($request->token, false)) {
        if(!$request->product_id) {
          throw new \Exception("Malicious Activity", 1);
        }

        Cart::add($request);
        echo json_encode(['success' => 'Product added to basket successfully']);
        exit;
      }
    }
  }


  public function getCartItems() {
    try {

        $result = [];
        $cart_total = 0;

        if(!Session::has('user_cart') || count(Session::get('user_cart')) < 1) {
          echo json_encode(["failed" => "Basket is empty"]);
          exit;
        }

        $index = 0;
        foreach($_SESSION['user_cart'] as $cart_items) {
          $productId = $cart_items['product_id'];
          $quantity = $cart_items['quantity'];
          $item = Product::where('id', $productId)->first();

          //if the item is not found skip and continue
          if(!$item){continue;}

          $totalPrice = $item->price * $quantity;
          $cart_total = $totalPrice + $cart_total;
          $totalPrice = number_format($totalPrice, 2);

    //index key will be used later to find and delete any unwanted product
          array_push($result, [
            'id' => $item->id,
            'name' => $item->name,
            'image' => $item->image_path,
            'description' => $item->description,
            'price' => $item->price,
            'total' => $totalPrice,
            'quantity' => $quantity,
            'stock' => $item->quantity,
            'index' => $index
          ]);
          $index++;
        }

        $itemTotal = count($result);

        $cart_total = \number_format($cart_total, 2);
        echo json_encode(['items' => $result, 'cartTotal' => $cart_total, 'itemTotal' => $itemTotal]);
        exit;

      }catch (\Exception $e) {
        //log into database or email admin..later
      }

    }


  public function updateQuantity() {
    if(Request::has('post')) {
      $request = Request::get('post');

        if(!$request->product_id) {
          throw new \Exception("Malicious Activity", 1);
        }

        $index = 0;
        $quantity = "";

        foreach ($_SESSION['user_cart'] as $cart_items) {
          $index++;
          foreach ($cart_items as $key => $value) {
            if($key == 'product_id' && $value == $request->product_id) {
              switch($request->operator) {
                case '+':
                  $quantity = $cart_items['quantity'] + 1;
                  break;
                case '-':
                  $quantity = $cart_items['quantity'] - 1;
                  if ($quantity < 1) {
                    $quantity = 1;
                  }
                  break;
              }

              array_splice($_SESSION['user_cart'], $index - 1, 1, array(
                [
                  'product_id' => $request->product_id,
                  'quantity' => $quantity
                  ]
              ));
            }

          }
        }
    }
  }


  public function removeItem() {
    if(Request::has('post')) {
      $request = Request::get('post');


        if($request->item_index === '') {
          throw new \Exception("Malicious Activity", 1);
        }

        //remove item
        Cart::removeItem($request->item_index);
        echo json_encode(["success" => "product removed from basket"]);
        exit;
    }
  }
}
