<?php

namespace App\Controllers;

use App\Classes\Mail;
use App\Models\User;
use App\Classes\Request;
use App\Classes\CSRFToken;
use App\Classes\ValidateRequest;
use App\Classes\Session;
use App\Classes\Resetpass;

class PasswordResetController extends BaseController{

  public function show() {

    $token = CSRFToken::_token();
    return view('password/forget');
  }

  public function requestResetAction() {
    if(Request::has('post')) {
      $request = Request::get('post');

      if(CSRFToken::verifyCSRFToken($request->token)) {
        $rules = [
          'email' => ['required' => true, 'email' => true]
        ];

        $validate = new ValidateRequest;
        $validate->abide($_POST, $rules);

        if ($validate->hasError()) {
          $errors = $validate->getErrorMessages();
          return view('password/forget', ['errors' => $errors]);
        }

        try {
          $user = User::where('email', $request->email)->firstOrFail();

          if ($user) {
            $pass_token = $request->token;
            $url = 'http://'. $_SERVER['HTTP_HOST'] . '/password/reset/'. $pass_token;
            $info = ['url' => $url];
            if (Resetpass::startPassReset($user, $request)) {
              $data = [
                'to' => $user->email,
                'subject' => 'Request for password reset',
                'view' => 'password',
                'name' => $user->username,
                'body' => $info
              ];

              (new Mail())->mailSend($data);
            }
          }
          return view('password/reset_request');

        } catch (\Exception $e) {
          $errors = "sorry we couldn\'t find this email";
          Session::add('error', 'sorry we couldn\'t find this email');
          return view('password/forget');
          Session::remove('error');
        }


      }
    }
  }


  public function emailResetAction($token) {

    $getToken = $token['token'];

    $user = Resetpass::findByPassReset($getToken);

    if ($user) {
      return view('password/resetpass', \compact(getToken));
    }else {
      return \view('password/token_expired');
      exit;
    }

  }


  public function resetPassAction() {
    if (Request::has('post')) {
      $request = Request::get('post');
      $getToken = $request->token;

      $user = Resetpass::findByPassReset($getToken);

      if ($user) {

          $rules = [
            'password' => ['required' => true, 'minLength' => 7]
          ];

          $validate = new ValidateRequest;
          $validate->abide($_POST, $rules);

          if ($validate->hasError()) {
            $errors = $validate->getErrorMessages();
            return view('password/resetpass', compact('getToken', 'errors'));
          }

        //continue with reset password since all error check above has been passed
        $password  = password_hash($request->password, PASSWORD_BCRYPT);

        $updateUserNewPass = User::where('id', $user->id)->update([
          'password' => $password,
          'password_reset_hash' => NULL,
          'password_reset_exp' => NULL
        ]);

        if ($updateUserNewPass) {
          return \view('password/reset_success');
        }else {
          echo "could not reset password";
          exit;
        }

      }else {
        return \view('password/token_expired');
        exit;
      }
    }
  }

}
