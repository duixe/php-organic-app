<?php $__env->startSection('title', 'token expired'); ?>

<?php $__env->startSection('data-page-id', 'auth'); ?>

<?php $__env->startSection('content'); ?>

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



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/organicstore/resources/views/password/token_expired.blade.php ENDPATH**/ ?>