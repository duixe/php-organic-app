<?php

  //admin routes
  $router->map('GET', '/admin', 'App\Controllers\Admin\DashBoardController@show', 'Admin_dashboard');
  $router->map('POST', '/admin', 'App\Controllers\Admin\DashBoardController@get', 'admin_form');

  //product management
  $router->map('GET', '/admin/products/categories', 'App\Controllers\Admin\ProductCategoryController@show', 'product_category');
  $router->map('POST', '/admin/products/categories', 'App\Controllers\Admin\ProductCategoryController@createStore', 'create_product_category');

  //Edit category router
  $router->map('POST', '/admin/products/categories/[i:id]/edit', 'App\Controllers\Admin\ProductCategoryController@edit', 'edit_product_category');

  //Delete category router
  $router->map('POST', '/admin/products/categories/[i:id]/delete', 'App\Controllers\Admin\ProductCategoryController@delete', 'delete_product_category');

  //subcategory
  $router->map('POST', '/admin/products/category/create', 'App\Controllers\Admin\SubCategoryController@createStore', 'create_subcategory');









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
