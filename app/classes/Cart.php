<?php

  namespace App\Classes;

  use App\Classes\Session;

  class Cart{

    protected static $isItemInCart = false;

    public static function add($request) {

      try {
        $index = 0;
        //check if cart already contain a product if not create one
        if(!Session::has('user_cart') || count(Session::get('user_cart')) < 1) {
          Session::add('user_cart', [
            0 => ['product_id' => $request->product_id, 'quantity' => 1]
          ]);
        }else {
          foreach ($_SESSION['user_cart'] as $cart_items) {
            $index++;
            foreach($cart_items as $key => $value) {
              if($key == 'product_id' && $value == $request->product_id) {
                array_splice($_SESSION['user_cart'], $index -1, 1,
                array([
                  'product_id' => $request->product_id,
                  'quantity' => $cart_items['quantity'] + 1
                ])
              );
                self::$isItemInCart = true;
              }
            }
          }

          if(!self::$isItemInCart) {
            array_push($_SESSION['user_cart'], [
              'product_id' => $request->product_id, 'quantity' => 1
            ]);
          }
        }
      } catch (\Exception $e) {
        echo $e->getMessage();
      }

    }

    public static function removeItem($index) {
      if (count(Session::get('user_cart')) <= 1) {
        //empty cart since it's already one
        self::clear();
      }else {
        unset($_SESSION['user_cart'][$index]);
        sort($_SESSION['user_cart']);
      }
    }

    public static function clear() {
      Session::remove('user_cart');
    }
  }
