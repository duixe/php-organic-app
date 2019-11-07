<?php

namespace App\Classes;

class ErrorHandler{

  public function handleErrs($err_num, $err_msg, $err_file, $err_line) {
    $error = "[{$err_num}] An error occured in {$err_file} on line $err_line: $err_msg";

    $environment = getenv('APP_ENV');

    if($environment === 'local') {
      $whoops = new \Whoops\Run;
      $whoops->prependHandler(new \Whoops\Handler\PrettyPageHandler);
      $whoops->register();
    }else {
      $data = [
        'to' => getenv('ADMIN_EMAIL'),
        'subject' => 'System error',
        'view' => 'errors',
        'name' => 'Admin',
        'body' => $error
      ];

      ErrorHandler::emailAdmin($data)->outputFriendlyErr();

    }
  }

  public function outputFriendlyErr() {
    ob_end_clean();
    view('errors/generic');
    exit;
  }

  public static function emailAdmin($data) {
    $mail = new Mail;
    $mail->mailSend($data);

    return new static;
  }
}
