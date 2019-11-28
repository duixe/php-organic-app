@extends('layouts.app')
{{-- {{use App\Classes\CSRFToken;}} --}}

@section('title', 'Reset your password')

@section('data-page-id', 'auth')

@section('content')


  <section class="resetReq">
    <div class="container">
      <div class="row text-center">
        <div class="col-md-12 col-lg-12 col-xl-12">
          <h1 class="display-2">Request Password Reset</h1>

          <p class="h3">please check your email</p>
        </div>
      </div>
    </div>
  </section>


@endsection
