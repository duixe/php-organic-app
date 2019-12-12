<?php $__env->startSection('title', 'Reset your password'); ?>

<?php $__env->startSection('data-page-id', 'auth'); ?>

<?php $__env->startSection('content'); ?>

    <section class="auth__login forgetpass" id="auth__login">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
              <div class="card-body p-0">
                <div class="row">
                  <div class="col-lg-6 col-md-6 d-none d-lg-block d-md-block forgetpass__bg-image"></div>
                  <div class="col-md-6 col-lg-6">
                    <div class="login__content">
                      <div class="login__content-head">
                        <h4>Request password reset</h4>
                      </div>
                      <?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                      <form  action="/password/forget" method="post">
                        <div class="form__group">
                          <input type="text" class="form__input2" name="email" placeholder="Enter your Email" id="username" value="<?php echo e(App\Classes\Request::old('post', 'username')); ?>">
                          <label for="username" class="form__label">Enter your Email</label>
                          <span class="eye d-none" >
                            <i id="hideone" class="far fa-eye"></i>
                            <i id="hidetwo" class="fas fa-eye-slash"></i>
                          </span>
                        </div>

                        <input type="hidden" name="token" value="<?php echo e(App\Classes\CSRFToken::_token()); ?>">
                        <button class="forgetpass__btn">Send password reset</button>
                      </form>
                      <hr>
                      <br>
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

<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/organicstore/resources/views/password/forget.blade.php ENDPATH**/ ?>