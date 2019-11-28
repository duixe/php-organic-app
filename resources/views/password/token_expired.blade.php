@extends('layouts.app')
{{-- {{use App\Classes\CSRFToken;}} --}}

@section('title', 'token expired')

@section('data-page-id', 'auth')

@section('content')

      <section style="padding: 15rem;">
        <div class="container">
          <div class="row text-center">
            <div class="col-md-12 col-lg-12">
              <h1>Request Password Reset</h1>

              <p class="lead">Password reset link Invalid or expired, please click <a href="/password/forget">here</a> to request another one. </p>
            </div>
          </div>
        </div>
      </section>



@endsection
