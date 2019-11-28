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
                    <form action="/password/reset-pass/" method="post">

                      <div class="form__group">
                        <input type="password" class="form__input2" name="password" placeholder="Enter new password" id="password" required>
                        <label for="name" class="form__label">Enter new password</label>
                      </div>

                      <input type="hidden" name="token" value="<?php echo e($getToken); ?>">
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


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/organicstore/resources/views/password/resetpass.blade.php ENDPATH**/ ?>