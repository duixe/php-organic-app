<?php

//cart router
$router->map('POST', '/cart', 'App\Controllers\CartController@addItem', 'add_cart_item');
$router->map('GET', '/cart', 'App\Controllers\CartController@show', 'view_cart');
$router->map('GET', '/cart/items', 'App\Controllers\CartController@getCartItems', 'get_cart_items');

//update quantity
$router->map('POST', '/cart/update-qty', 'App\Controllers\CartController@updateQuantity', 'update_cart_qty');
$router->map('POST', '/cart/remove-item', 'App\Controllers\CartController@removeItem', 'remove_cart_item');
$router->map('POST', '/cart/payment', 'App\Controllers\CartController@checkout', 'handle_payment');
$router->map('POST', '/cart/empty', 'App\Controllers\CartController@emptyCart', 'Empty_cart');
