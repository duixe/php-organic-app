<?php

  /* start session if not started*/
  if(!isset($_SESSION)) session_start();


  #load environment variables
  require_once __DIR__.'/../app/config/_env.php';

  new \App\Classes\Database;

  \App\Classes\Auth::getUser();

  #set custom error Handler
  set_error_handler([new App\Classes\ErrorHandler(), 'handleErrs']);

  require_once __DIR__.'/../app/routing/routes.php';

  new App\RouteDispatcher($router);
