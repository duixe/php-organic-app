<?php

namespace App\Classes;
use Illuminate\Database\Capsule\Manager as Capsule;

class ValidateRequest{

  private static $err = [];
  private static $err_messages = [
    'string' => 'The :attribute field cannot contain numbers',
    'required' => 'The :attribute field is required',
    'minLength' => 'The :attribute field must be minimum of :policy characters',
    'maxLength' => 'The :attribute field must not exceed :policy characters',
    'mixed' => 'The :attribute field can onnly contain letters, numbers dash and space only',
    'number' => 'The :attribute field cannot contain letters. e.g 12, 34.5',
    'email' => 'email address is not valid',
    'unique' => 'The :attribute is already taken, please try another one'
  ];

  public function abide(array $dataAndValues, array $policies) {

    foreach ($dataAndValues as $column => $value) {
      if (in_array($column, array_keys($policies))) {
        #the array of data is what is passed in here
        self::doValidation([
          'column' => $column,
          'value' => $value,
          'policies' => $policies[$column]
        ]);
      }
    }
  }

  private static function doValidation(array $data) {
     $column = $data['column'];
     foreach($data['policies'] as $rule => $policy) {
       $valid = call_user_func_array([self::class, $rule], [$column, $data['value'], $policy]);

       if (!$valid) {
         self::setError(
           str_replace([':attribute', ':policy', ], [$column, $policy, ' '], self::$err_messages[$rule]), $column
         );
       }
     }
  }

  /**
  * #param $column: field name or column
  * #param $value: value passed into the form
  * #param $policy: the rule we set e.g max =4
  * #return type: bool which is true or false
  */


  protected static function unique($col, $val, $policy) {

    if($val != null && !empty(trim($val))) {
      return !Capsule::table($policy)->where($col, '=', $val)->exists();
    }
    return true;
  }

  protected static function required($col, $val, $policy) {

    return $val !== null && !empty(trim($val));
  }

  protected static function minLength($col, $val, $policy) {

    if($val != null && !empty(trim($val))) {
      return strlen($val) >= $policy;
    }
    return true;

  }

  protected static function maxLength($col, $val, $policy) {

    if($val != null && !empty(trim($val))) {
      return strlen($val) <= $policy;
    }
    return true;

  }

  protected static function email($col, $val, $policy) {

    if($val != null && !empty(trim($val))) {
      return filter_var($val, FILTER_VALIDATE_EMAIL);
    }
    return true;
  }

  protected static function mixed($col, $val, $policy) {

    if($val != null && !empty(trim($val))) {
      if (!preg_match('/^[A-Za-z0-9 .,_~\-!@#\&%\^\'\*\(\)]+$/', $val)) {
        return false;
      }
    }
    return true;
  }


  protected static function string($col, $val, $policy) {

    if($val != null && !empty(trim($val))) {
      if (!preg_match('/^[A-Za-z ]+$/', $val)) {
        return false;
      }
    }

    return true;
  }

  protected static function number($col, $val, $policy) {

    if($val != null && !empty(trim($val))) {
      if (!preg_match('/^[0-9.]+$/', $val)) {
        return false;
      }
    }

    return true;
  }


  private static function setError($err, $key = null) {
    if ($key) {
      self::$err[$key][] = $err;
    }else {
      self::$err[] = $err;
    }
  }
  /*
    return true if there is any validation error
  */
  public function hasError() {

    return count(self::$err) > 0 ? true : false;

    }

    /*
      return all validation errors
    */
    public function getErrorMessages() {
      return self::$err;
    }

}
