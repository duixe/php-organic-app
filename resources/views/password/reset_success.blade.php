@extends('layouts.app')
{{-- {{use App\Classes\CSRFToken;}} --}}

@section('title', 'token expired')

@section('data-page-id', 'auth')

@section('content')

      <section style="padding-top: 17rem;">
        <div class="container">
          <div class="row text-center">
            <div class="col-md-12 col-lg-12">
              <h1 class="display-3">password reset successful 👍</h1>

              <p class="h4">You can now  <a href="/login">Login</a>. </p>
            </div>
          </div>
        </div>
      </section>



@endsection
