@extends('layouts.app')
{{-- {{use App\Classes\CSRFToken;}} --}}

@section('title', 'Register an account')

@section('data-page-id', 'auth')

@section('content')

    <section class="auth" id="auth">
      <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-5 col-md-5 d-none d-lg-block d-md-block register__bg-image"></div>
              <div class="col-md-7 col-lg-7">
                <div class="register__content">
                  <div class="register__content-head">
                    <h4>Create an Account !</h4>
                  </div>
                  @include('includes.message')
                  <form action="/register" method="post">
                    <div class="form__group">
                      <input type="text" class="form__input2" name="fullname" placeholder="Full Name" id="name" value="{{ App\Classes\Request::old('post', 'fullname')}}" required>
                      <label for="name" class="form__label">Full Name</label>
                    </div>

                    <div class="form__group">
                      <input type="email" class="form__input2" name="email" placeholder="Your Email Address" id="email" value="{{ App\Classes\Request::old('post', 'email')}}" required>
                      <label for="name" class="form__label">Your email address</label>
                    </div>

                    <div class="form__group">
                      <input type="text" class="form__input2" name="username" placeholder="your username" id="username" value="{{ App\Classes\Request::old('post', 'username')}}" required>
                      <label for="username" class="form__label">Your username</label>
                    </div>

                    <div class="form__group form__group-eye">
                      <input type="password" class="form__input2" name="password" placeholder="password" id="password" required>
                      <label for="name" class="form__label">password</label>
                      <span class="eye">
                        <i id="hideone" class="far fa-eye"></i>
                        <i id="hidetwo" class="fas fa-eye-slash"></i>
                      </span>
                    </div>

                    <div class="form__group">
                        <textarea name="address" id="addressArea" class="form__input2" placeholder="Enter your address" title="">{{App\Classes\Request::old('post', 'username')}}</textarea>
                        <label for="textArea" class="form__label">Enter your address</label>
                    </div>
                    <input type="hidden" name="token" value="{{App\Classes\CSRFToken::_token()}}">
                    <button type="submit" class="register__btn">Register</button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="register__small" href="/password/forget">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="register__small" href="/login">Already have an account? Login!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>


@endsection
