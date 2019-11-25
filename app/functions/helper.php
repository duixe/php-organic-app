<?php

  use Philo\Blade\Blade;
  use voku\helper\Paginator;
  use Illuminate\Database\Capsule\Manager as Capsule;

  use Carbon\Carbon;
  use App\Classes\Session;
  use App\Models\User;

  function view($path, array $data = []) {

    $view = __DIR__.'/../../resources/views';
    $cache = __DIR__.'/../../bootstrap/cache';

    $blade = new Blade($view, $cache);
    echo $blade->view()->make($path, $data)->render();
  }


  function make($filename, $data) {

    extract($data);

    ob_start();

    //include template from resources
    include(__DIR__.'/../../resources/views/emails/'.$filename.'.php');

    //get content
      $content = ob_get_contents();

      //erase output content and turn off output buffering
      ob_end_clean();

      return $content;
  }


  function generateSlug($value) {
    //remove all characters not in the list of undescore, letters, numbers and whitespace
    $value = preg_replace('![^'.preg_quote('_').'\pL\pN\s]+!u', '', mb_strtolower($value));

    //replace underscore with "-"
    $value = preg_replace('!['.preg_quote('-').'\s]+!u', '-', $value);

    //remove whitespace
    return trim($value, '-');
  }

  function paginate($num_of_records, $total_records, $table_name, $object) {

    $pages = new Paginator($num_of_records, 'p');
    $pages->set_total($total_records);

    $data = Capsule::select("SELECT * FROM $table_name WHERE deleted_at is null ORDER BY created_at DESC" . $pages->get_limit());

    $categories = $object->transform($data);

    return [$categories, $pages->page_links()];
  }


  function isAuthenticated() {

    return Session::has('SESSION_USER_NAME') ? true : false ;
  }

  function user() {

    if(isAuthenticated()) {
      return User::findorFail(Session::get('SESSION_USER_ID'));
    }
    return false;
  }


  function convertToCent($value) {
    //remove commas
    $value = preg_replace("/\,/i","", $value);

    $value = preg_replace("/([^0-9\.\-])/i", "", $value);

    if (!is_numeric($value)) {
      return 0.00;
    }

    $value = (float) $value;

    return round($value, 2) * 100;
  }
