<?php

namespace App\Controllers;

use App\Classes\Mail;
use App\Models\Product;
use App\Classes\Request;
use App\Classes\CSRFToken;
use App\Classes\ValidateRequest;

class IndexController extends BaseController{

  public function show() {

    $token = CSRFToken::_token();
    return view('home', compact(token));
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

  public function sendMessage() {

    if (Request::has('post')) {
      $request = Request::get('post');

      if (CSRFToken::verifyCSRFToken($request->token, false)) {
        $rules = [
          'name' => ['required' => true, 'maxLength' => 25, 'string' => true],
          'email' => ['required' => true, 'email' => true],
        ];

        $validate = new ValidateRequest;
        $validate->abide($_POST, $rules);

        if ($validate->hasError()) {
          $errors = $validate->getErrorMessages();
          // return view('home', ['errors' => $errors]);
          echo \json_encode(['errors' => $errors]);
        }else {
          $message = ['name' => $request->name, 'email' => $request->email, 'info' => $request->textArea];
          $data = [
            'to' => getenv('ADMIN_EMAIL'),
            'subject' => 'User Message',
            'view' => 'message',
            'name' => 'Admin',
            'body' => $message
          ];

          (new Mail())->mailSend($data);
          echo json_encode(["success" => "message received successfully !"]);
        }


      }
    }


  }
}
