<?php

namespace App\Controllers;

use App\Classes\Mail;

class IndexController extends BaseController{

  public function show() {
    echo "inside Home page from controller class <br>";

    $mail = new Mail();

    $datas = [
      'to' => 'sundux7@gmail.com',
      'subject' => 'welcome to freddy organic store',
      'view' => 'welcome',
      'name' => 'Mary Lang',
      'body' => 'Testing email template'
    ];

    if ($mail->mailSend($data)) {
      echo "email sent successfully";
    }else {
      echo "sending failed";
    }

  }
}
