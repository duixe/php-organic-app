<?php

  $router = new AltoRouter();
  $router->map('GET', '/', 'App\Controllers\IndexController@show', 'Home');
  $router->map('GET', '/shop', 'App\Controllers\IndexController@showShop', 'Shop');
  $router->map('GET', '/featured', 'App\Controllers\IndexController@FeaturedProducts', 'featured_product');
  $router->map('GET', '/get-products', 'App\Controllers\IndexController@getProducts', 'get_product');
    $router->map('POST', '/load-more', 'App\Controllers\IndexController@loadMoreProduct', 'load_more_product'); 


  require_once __DIR__.'/admin_routes.php';









  // $match = $router->match();
  // if($match) {
  //   list($controller, $method) = explode('@', $match['target']);
  //
  //
  //   require_once __DIR__.'/../controllers/BaseController.php';
  //   require_once __DIR__.'/../controllers/IndexController.php';
  //
  //   if(is_callable(array(new $controller, $method))) {
  //     call_user_func_array(array(new $controller, $method), array($match['params']));
  //   }else {
  //     echo "The Method {$method} is not defined in {$controller}";
  //   }
  // }else {
  //   header($_SERVER['SERVER_PROTOCOL']. "404 Not found");
  //   echo "page not found";
  // }
