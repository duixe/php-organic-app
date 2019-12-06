<?php

namespace App\Classes;

use PHPMailer\PHPMailer\PHPMailer;;

class Mail{
  protected $mail;

  public function __construct() {
    $this->mail = new PHPMailer;
    $this->mailSetUp();

  }

  public function mailSetUp() {
    $this->mail->isSMTP();
    $this->mail->Mailer = 'smtp';
    $this->mail->SMTPAuth = true;
    $this->mail->SMTPSecure = 'ssl';
    $this->mail->AuthType = 'XOAUTH2';

    $this->mail->Host = getenv('SMTP_HOST');
    $this->mail->Port = getenv('SMTP_PORT');

    $environment = getenv('APP_ENV');

    if($environment === 'local') {
      $this->mail->SMTPOptions = [
        'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true,
        )
      ];
      $this->mail->SMTPDebug = 4;
    }

    //send auth info
      $this->mail->Username = getenv('EMAIL_USERNAME');
      $this->mail->Password = getenv('EMAIL_PASS');

      $this->mail->isHTML(true);
      $this->mail->SingleTo = true;

      //sender info
      $this->mail->setFrom(getenv('ADMIN_EMAIL'));
      $this->mail->fromName = getenv('APP_NAME');
  }

  public function mailSend($data) {

    $this->mail->addAddress($data['to'], $data['name']);
    $this->mail->Subject = $data['subject'];
    $this->mail->Body = make($data['view'], array('data' => $data['body']));

    return $this->mail->send();
  }
}
