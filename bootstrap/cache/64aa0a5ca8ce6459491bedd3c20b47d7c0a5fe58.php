<?php $__env->startSection('title', 'log in to ypur account'); ?>

<?php $__env->startSection('data-page-id', 'auth'); ?>

<?php $__env->startSection('content'); ?>

    <section class="auth__login" id="auth__login">
      <img class="auth__login-leaf1" src="/img/home/login-leaf1.png" alt="vegetables">
      <img class="auth__login-leaf2" src="/img/home/login-leaf2.png" alt="vegetables">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
              <div class="card-body p-0">
                <div class="row">
                  <div class="col-sm-6 col-lg-6 col-md-6 d-none d-lg-block d-md-block d-sm-block login__bg-image"></div>
                  <div class="col-sm-6 col-md-6 col-lg-6 login__mobile">
                    <div class="login__content">
                      <div class="login__content-head">
                        <h4>Welcome Back !</h4>
                      </div>
                      <?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                      <form  action="/login" method="post">
                        <div class="form__group">
                          <input type="text" class="form__input2" name="username" placeholder="your username" id="username" value="<?php echo e(App\Classes\Request::old('post', 'username')); ?>">
                          <label for="username" class="form__label">You username or Email</label>
                        </div>

                        <div class="form__group">
                          <input type="password" class="form__input2" name="password" placeholder="password" id="password">
                          <label for="name" class="form__label">password</label>
                          <span class="eye d-none" >
                            <i id="hideone" class="far fa-eye"></i>
                            <i id="hidetwo" class="fas fa-eye-slash"></i>
                          </span>
                        </div>

                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" name="remember_me" id="exampleCheck1" <?php if(isset($remember_me)): ?> checked="checked" <?php endif; ?>>
                          <label class="form-check-label p2" for="exampleCheck1">Remember me</label>
                        </div>

                        <input type="hidden" name="token" value="<?php echo e(App\Classes\CSRFToken::_token()); ?>">
                        <button class="login__btn">Log in</button>
                      </form>
                      <hr>
                      <div class="text-center">
                        <a class="login__small" href="/password/forget">Forgot Password?</a>
                      </div>
                      <div class="text-center">
                        <a class="login__small" href="/register">Don't have an account? Sign Up!</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


      </div>
    </section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/organicstore/resources/views/login.blade.php ENDPATH**/ ?>