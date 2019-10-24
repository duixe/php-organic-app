<?php

namespace App;

use AltoRouter;

class RouteDispatcher{

  protected $match;
  protected $controller;
  protected $method;

  public function __construct(AltoRouter $router) {
    $this->match = $router->match();

    if($this->match) {
      //list here equate var controller to the real controller and var method to the real method from match array
      list($controller, $method) = explode('@', $this->match['target']);

      $this->controller = $controller;
      $this->method = $method;

      //check whether the controller that is passed in is a valid class in the controller dir and the method that comes with it
      if(is_callable(array(new $this->controller, $this->method))) {
        call_user_func_array(array(new $this->controller, $this->method), array($this->match['params']));
      }else {
        echo "The Method {$this->method} is not defined in {$this->controller}";
      }
    }else {
      header($_SERVER['SERVER_PROTOCOL']. "404 Not found");
      view('errors/404');
    }
  }
}
