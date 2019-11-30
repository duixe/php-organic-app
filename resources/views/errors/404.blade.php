@extends('layouts.app')
{{-- {{use App\Classes\CSRFToken;}} --}}

@section('title', 'Page Not Found')

@section('data-page-id', 'auth')

@section('content')

  <section class="notfound">
    <div class="jumbotron jumbotron-fluid">
      <div class="container text-center">
        <h3 class="display-2">🙄ops !!</h3>
        <h1 class="display-3">404 Not FOund</h1><br>
        <p class="lead">The page you're Looking for could not be Found</p>
      </div>
    </div>
  </section>

@endsection
