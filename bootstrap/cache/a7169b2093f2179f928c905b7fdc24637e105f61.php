<?php $__env->startSection('title', 'Page Not Found'); ?>

<?php $__env->startSection('data-page-id', 'auth'); ?>

<?php $__env->startSection('content'); ?>

  <section class="notfound">
    <div class="jumbotron jumbotron-fluid">
      <div class="container text-center">
        <h3 class="display-2">🙄ops !!</h3>
        <h1 class="display-3">404 Not FOund</h1><br>
        <p class="lead">The page you're Looking for could not be Found</p>
      </div>
    </div>
  </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/organicstore/resources/views/errors/404.blade.php ENDPATH**/ ?>