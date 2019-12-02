<?php $__env->startSection('title', 'Page Not Found'); ?>

<?php $__env->startSection('data-page-id', 'auth'); ?>

<?php $__env->startSection('content'); ?>

  <section class="notfound">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 text-center">
          <h3 class="notfound__h3">Oops !!</h3>
          <img class="notfound--img" src="img/home/oopspng.png" alt="">
        </div>
        <div class="col-xs-12 col-sm-12 offset-md-1 col-md-6 col-lg-6 text-center u-padd-top-big">
          <h1 class="notfound__h1">404 Not FOund</h1><br>
          <p class="notfound__paragragh">Sorry, The page you're Looking for could not be Found</p>
        </div>
      </div>
    </div>
  </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/organicstore/resources/views/errors/404.blade.php ENDPATH**/ ?>