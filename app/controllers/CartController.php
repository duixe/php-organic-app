<?php

namespace App\Controllers;

use App\Classes\Cart;
use App\Classes\CSRFToken;
use App\Classes\Request;
use App\Classes\Session;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use Stripe\Charge;
use Stripe\Customer;
use App\Classes\Mail;

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
        Session::add('cartTotal', $cart_total);
        echo json_encode(['items' => $result,
        'cartTotal' => $cart_total,
        'itemTotal' => $itemTotal,
        'authenticated' => isAuthenticated(),
        'amountInCents' => convertToCent($cart_total)
      ]);
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



  public function checkout() {
    if (Request::has('post')) {

      $result['product'] = array();
      $result['order_num'] = array();
      $result['total'] = array();

      $request = Request::get('post');
      $token = $request->stripeToken;
      $email = $request->stripeEmail;

      try {

        $customer = Customer::create([
          'email' => $email,
          'source' => $token
        ]);

        $amount = \convertToCent(Session::get('cartTotal'));
        $charge = Charge::create([
          'customer' => $customer->id,
          'amount' => $amount,
          'description' => user()->fullname.'-organic produce purchase',
          'currency' => 'usd'
        ]);

        $order_id = strtoupper(uniqid());

        foreach($_SESSION['user_cart'] as $cart_items) {
          $productId = $cart_items['product_id'];
          $quantity = $cart_items['quantity'];
          $item = Product::where('id', $productId)->first();

          //if the item is not found skip and continue
          if(!$item){continue;}

          $totalPrice = $item->price * $quantity;
          $totalPrice = number_format($totalPrice, 2);

          //store info
          OrderDetail::create([
            'user_id' => user()->id,
            'product_id' => $productId,
            'unit_price' => $item->price,
            'status' => 'Pending...',
            'quantity' => $quantity,
            'total' => $totalPrice,
            'order_num' => $order_id
          ]);

          $item->quantity -= $quantity;
          $item->save();

          array_push($result['product'], [
            'name' => $item->name,
            'price' => $item->price,
            'total' => $totalPrice,
            'quantity' => $quantity,
          ]);

        }

        Order::create([
          'user_id' => user()->id,
          'order_num' => $order_id
        ]);

        Payment::create([
          'user_id' => user()->id,
          'amount' => $charge->amount,
          'status' => $charge->status,
          'order_num' => $order_id
        ]);

        $result['order_num'] = $order_id;
        $result['total'] = Session::get('cartTotal');

        $data = [
          'to' => user()->email,
          'subject' => 'Order Confirmation',
          'view' => 'purchase',
          'name' => user()->fullname,
          'body' => $result
        ];

        (new Mail())->mailSend($data);

      } catch (\Exception $e) {
        echo $e->getMessage();
      }

      Cart::clear();

      echo json_encode(['success' => 'Thank You, we have received your payment and now processing your order']);
    }
  }


  public function emptyCart() {
    Cart::clear();
    echo \json_encode(['success' => "Shopping Cart Emptied !!"]);
    exit;
  }
}
