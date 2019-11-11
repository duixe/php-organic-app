<?php $__env->startSection('title', 'Home Page'); ?>

<?php $__env->startSection('data-page-id', 'home'); ?>

<?php $__env->startSection('content'); ?>
  <main>
      <div class="container-fluid p-0">
        <section class="section-landing">
          <div class="slider__page">
            <div class="slider__page-1">
              <div class="slider__textbox">
                <h1 class="heading-land">Organic</h1>
                <h5 class="heading-land__5">100% guranteed</h5>
                <h2 class="heading-land__2">Live Organic Stay Healthy</h2>
                <p class="heading-land__paragraph">Organic fruits and vegetables at your Doorstep</p>

                <a href="#" class="bttn bttn--primary">Shop Now</a>
              </div>
              <img src="/img/home/img-slider-01.jpg" alt="">
            </div>

            <div class="slider__page-2">
              <div class="slider__textbox">
                <h1 class="heading-land">Organic</h1>
                <h5 class="heading-land__5">100% guranteed</h5>
                <h2 class="heading-land__2">Live Organic Stay Healthy</h2>
                <p class="heading-land__paragraph">Organic fruits and vegetables at your Doorstep</p>

                <a href="#" class="bttn bttn--primary">Shop Now</a>
              </div>
              <img src="/img/home/img-slider-02.jpg" alt="">
            </div>

            <div class="slider__page-3">
              <div class="slider__textbox">
                <h1 class="heading-land">Organic</h1>
                <h5 class="heading-land__5">100% guranteed</h5>
                <h2 class="heading-land__2">Live Organic Stay Healthy</h2>
                <p class="heading-land__paragraph">Organic fruits and vegetables at your Doorstep</p>

                <a href="#" class="bttn bttn--primary">Shop Now</a>
              </div>
              <img src="/img/home/img-slider-3.jpg" alt="">
            </div>
          </div>
          <div class="slider__btn">
            <span class="slider__btn-prev btn__position"><i class="fas fa-chevron-left"></i></span>
            <span class="slider__btn-next btn__position right-0"><i class="fas fa-chevron-right"></i></span>
          </div>
        </section>
      </div>
  </main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/organicstore/resources/views/home.blade.php ENDPATH**/ ?>