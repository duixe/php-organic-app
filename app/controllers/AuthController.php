<?php

namespace App\Controllers;

use App\Models\Product;
use App\Classes\Request;
use App\Classes\CSRFToken;
use App\Classes\ValidateRequest;
use App\Models\User;
use App\Models\Remember;
use App\Classes\Session;
use App\Classes\Redirect;
use App\Classes\Auth;
use Carbon\Carbon;

class AuthController extends BaseController{

  public function __construct() {
    if(isAuthenticated()) {
      Redirect::redirectTo('/');
    }
  }

  public function showRegisterForm() {

    return view('register');
  }

  public function showLoginForm() {

    return view('login');
  }

  public function register() {

    if(Request::has('post')) {
      $request = Request::get('post');
      if (CSRFToken::verifyCSRFToken($request->token)) {
        $rules = [
          'username' => ['required' => true, 'maxLength' => 25, 'string' => true, 'unique' => 'users'],
          'email' => ['required' => true, 'email' => true, 'unique' => 'users'],
          'password' => ['required' => true, 'minLength' => 7],
          'fullname' => ['required' => true, 'minLength' => 6, 'maxLength' => 60],
          'address' => ['required' => true, 'minLength' => 4, 'maxLength' => 500, 'mixed' => true]
        ];

        $validate = new ValidateRequest;
        $validate->abide($_POST, $rules);

        if ($validate->hasError()) {
          $errors = $validate->getErrorMessages();
          return view('register', ['errors' => $errors]);
        }

        User::create([
          'username' => $request->username,
          'email' => $request->email,
          'password' => password_hash($request->password, PASSWORD_BCRYPT),
          'fullname' => $request->fullname,
          'address' => $request->address,
          'role' => 'user',
        ]);

        Request::refresh();
        return \view('register', ['success' => 'Account created, please login']);
      }else {
        throw new \Exception("Token Mismatch", 1);

      }
      return null;
    }
  }

  public function login() {
    if(Request::has('post')) {

      $request = Request::get('post');
      if (CSRFToken::verifyCSRFToken($request->token)) {
        $rules = [
          'username' => ['required' => true],
          'password' => ['required' => true]
        ];

        $validate = new ValidateRequest;
        $validate->abide($_POST, $rules);

        if ($validate->hasError()) {
          $errors = $validate->getErrorMessages();
          return view('login', ['errors' => $errors]);
        }


          //check whether user exist in db 👇
          $user = User::where('username', $request->username)
          ->orWhere('email', $request->username)->first();

          if($user){
            if (!password_verify($request->password, $user->password)) {
              Session::add('error', 'Incorrect Credentials');
              return view('login', ['remember_me' => $request->remember_me]);
            }else {
              Session::add('SESSION_USER_ID', $user->id);
              Session::add('SESSION_USER_NAME', $user->username);

              $authLogin = new Auth();

              if ($user->role == 'admin') {
                Redirect::redirectTo("/admin");
              }elseif ($user->role == 'user' && Session::has('user_cart')) {
                if ($request->remember_me) {

                  if ($authLogin->rememberLogin($request, $user)) {

                    // $expire_timestamp = time() + 60 * 60 * 24 * 30;
                    setcookie('remember_me', $request->token, $authLogin->expire_timestamp, '/');

                  }
                }
                Redirect::redirectTo("/cart");
              }else {
                if ($request->remember_me) {

                  if ($authLogin->rememberLogin($request, $user)) {

                    // $expire_timestamp = time() + 60 * 60 * 24 * 30;
                    setcookie('remember_me', $request->token, $authLogin->expire_timestamp, '/');

                  }
                }
                Redirect::redirectTo('/');
              }

              //Add Remember me before redirect to home page
              // $authLogin = new Auth();
              // if ($request->remember_me) {
              //
              //   if ($authLogin->rememberLogin($request, $user)) {
              //
              //     // $expire_timestamp = time() + 60 * 60 * 24 * 30;
              //     setcookie('remember_me', $request->token, $authLogin->expire_timestamp, '/');
              //
              //   }
              // }

              // $cookie_result = var_dump($_COOKIE);


            }
          }else {
            Session::add('error', 'Incorrect Credentials');
            return \view('login');
          }



        // Request::refresh();
        // return \view('register', ['success' => 'Account created, please login']);
      }else {
        throw new \Exception("Token Mismatch", 1);

      }
      return null;
    }
  }

  public function logout() {

      if (isAuthenticated()) {
        Session::remove('SESSION_USER_ID');
        Session::remove('SESSION_USER_NAME');

        if(!Session::has('user_cart')) {
          session_destroy();
          session_regenerate_id(true);
        }
        //delete remember me option
        Auth::deleteRemeberMe();
      }

      Redirect::redirectTo('/');
  }

}
