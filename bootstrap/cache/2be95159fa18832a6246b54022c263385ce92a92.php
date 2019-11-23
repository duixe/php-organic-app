<?php $__env->startSection('title', 'Register an account'); ?>

<?php $__env->startSection('data-page-id', 'auth'); ?>

<?php $__env->startSection('content'); ?>

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
                  <?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  <form action="/register" method="post">
                    <div class="form__group">
                      <input type="text" class="form__input2" name="fullname" placeholder="Full Name" id="name" value="<?php echo e(App\Classes\Request::old('post', 'fullname')); ?>" required>
                      <label for="name" class="form__label">Full Name</label>
                    </div>

                    <div class="form__group">
                      <input type="email" class="form__input2" name="email" placeholder="Your Email Address" id="email" value="<?php echo e(App\Classes\Request::old('post', 'email')); ?>" required>
                      <label for="name" class="form__label">Your email address</label>
                    </div>

                    <div class="form__group">
                      <input type="text" class="form__input2" name="username" placeholder="your username" id="username" value="<?php echo e(App\Classes\Request::old('post', 'username')); ?>" required>
                      <label for="username" class="form__label">Your username</label>
                    </div>

                    <div class="form__group">
                      <input type="password" class="form__input2" name="password" placeholder="password" id="password" required>
                      <label for="name" class="form__label">password</label>
                    </div>

                    <div class="form__group">
                        <textarea name="address" id="textArea" class="form__input2" placeholder="Enter your address"><?php echo e(App\Classes\Request::old('post', 'username')); ?></textarea>
                        <label for="textArea" class="form__label">Enter your address</label>
                    </div>
                    <input type="hidden" name="token" value="<?php echo e(App\Classes\CSRFToken::_token()); ?>">
                    <button type="submit" class="register__btn">Register</button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="register__small" href="#">Forgot Password?</a>
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


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/organicstore/resources/views/register.blade.php ENDPATH**/ ?>