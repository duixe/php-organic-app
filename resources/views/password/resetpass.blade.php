@extends('layouts.app')
{{-- {{use App\Classes\CSRFToken;}} --}}

@section('title', 'Reset your password')

@section('data-page-id', 'auth')

@section('content')

  <section class="auth__login forgetpass" id="auth__login">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
          <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
              <div class="row">
                <div class="col-lg-6 col-md-6 d-none d-lg-block d-md-block resetpass__bg-image"></div>
                <div class="col-md-6 col-lg-6">
                  <div class="login__content">
                    <div class="login__content-head">
                      <h4>Request password reset</h4>
                    </div>
                    @include('includes.message')
                    <form action="/password/reset-pass/" method="post">

                      <div class="form__group">
                        <input type="password" class="form__input2" name="password" placeholder="Enter new password" id="password" required>
                        <label for="name" class="form__label">Enter new password</label>
                      </div>

                      <input type="hidden" name="token" value="{{ $getToken }}">
                      <button type="submit" class="forgetpass__btn">Reset your password</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </section>


@endsection
