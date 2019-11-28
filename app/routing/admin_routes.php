<?php

  //admin routes
  $router->map('GET', '/admin', 'App\Controllers\Admin\DashBoardController@show', 'Admin_dashboard');
  $router->map('GET', '/admin/charts', 'App\Controllers\Admin\DashBoardController@getChartData', 'Admin_dashboard_chart');
  // $router->map('POST', '/admin', 'App\Controllers\Admin\DashBoardController@get', 'admin_form');

  //product management
  $router->map('GET', '/admin/products/categories', 'App\Controllers\Admin\ProductCategoryController@show', 'product_category');
  $router->map('POST', '/admin/products/categories', 'App\Controllers\Admin\ProductCategoryController@createStore', 'create_product_category');

  //Edit category router
  $router->map('POST', '/admin/products/categories/[i:id]/edit', 'App\Controllers\Admin\ProductCategoryController@edit', 'edit_product_category');

  //Delete category router
  $router->map('POST', '/admin/products/categories/[i:id]/delete', 'App\Controllers\Admin\ProductCategoryController@delete', 'delete_product_category');

  //subcategory
  $router->map('POST', '/admin/products/category/create', 'App\Controllers\Admin\SubCategoryController@createStore', 'create_subcategory');

  //Edit subcategory router
  $router->map('POST', '/admin/products/subcategories/[i:id]/edit', 'App\Controllers\Admin\SubCategoryController@edit', 'edit_subcategory');

  //Delete subcategory router
  $router->map('POST', '/admin/products/subcategory/[i:id]/delete', 'App\Controllers\Admin\SubCategoryController@delete', 'delete_subcategory');

  //create product
  $router->map('GET', '/admin/category/[i:id]/selected', 'App\Controllers\Admin\ProductController@getSubCategories', 'selected_category');
  $router->map('POST', '/admin/products/create', 'App\Controllers\Admin\ProductController@createStore', 'create_product');


  //create product Get route in order to show the form
  $router->map('GET', '/admin/products/create', 'App\Controllers\Admin\ProductController@ShowCreateProductForm', 'create_product_form');
  $router->map('GET', '/admin/products', 'App\Controllers\Admin\ProductController@show', 'show_product');

  //create product Get route in order to show the form
  $router->map('GET', '/admin/products/[i:id]/edit', 'App\Controllers\Admin\ProductController@ShowEditProductForm', 'edit_product_form');
  $router->map('POST', '/admin/products/edit', 'App\Controllers\Admin\ProductController@edit', 'edit_product');

  //
  $router->map('POST', '/admin/products/[i:id]/delete', 'App\Controllers\Admin\ProductController@delete', 'delete_product');




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
