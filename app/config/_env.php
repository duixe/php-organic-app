<?php
use Dotenv\Dotenv;

  define('BASE_PATH', realpath(__DIR__.'/../../'));

  #loading the autoload file from vendor dir
  require_once __DIR__.'/../../vendor/autoload.php';

  //instantiate .env file
  $dotenv = \Dotenv\Dotenv::create(BASE_PATH);

  //LOAD method ensures that any other env var aren't overwritten
  $dotenv->load();

  require_once __DIR__ .'/_stripe.php';
