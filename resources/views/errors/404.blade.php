@extends('layouts.app')
{{-- {{use App\Classes\CSRFToken;}} --}}

@section('title', 'Page Not Found')

@section('data-page-id', 'auth')

@section('content')

  <section class="notfound">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 text-center">
          <h3 class="notfound__h3">Oops !!</h3>
          <img class="notfound--img" src="/img/home/oopspng.png" alt="">
        </div>
        <div class="col-xs-12 col-sm-12 offset-md-1 col-md-6 col-lg-6 text-center u-padd-top-big">
          <h1 class="notfound__h1">404 Not FOund</h1><br>
          <p class="notfound__paragragh">Sorry, The page you're Looking for could not be Found</p>
        </div>
      </div>
    </div>
  </section>

@endsection
