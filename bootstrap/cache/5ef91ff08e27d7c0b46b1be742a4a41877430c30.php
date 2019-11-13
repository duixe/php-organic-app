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
                <p class="heading-land__paragraph pb-2">Organic fruits and vegetables at your Doorstep</p>

                <a href="/shop" class="bttn bttn--primary">Shop Now</a>
              </div>
              <img src="/img/home/img-slider-01.jpg" alt="">
            </div>

            <div class="slider__page-2">
              <div class="slider__textbox">
                <h1 class="heading-land">Organic</h1>
                <h5 class="heading-land__5">100% guranteed</h5>
                <h2 class="heading-land__2">Live Organic Stay Healthy</h2>
                <p class="heading-land__paragraph pb-1">Organic fruits and vegetables at your Doorstep</p>

                <a href="#" class="bttn bttn--primary">Shop Now</a>
              </div>
              <img src="/img/home/img-slider-02.jpg" alt="">
            </div>

            <div class="slider__page-3">
              <div class="slider__textbox">
                <h1 class="heading-land">Organic</h1>
                <h5 class="heading-land__5">100% guranteed</h5>
                <h2 class="heading-land__2">Live Organic Stay Healthy</h2>
                <p class="heading-land__paragraph pb-1">Organic fruits and vegetables at your Doorstep</p>

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

        <section class="section-features" id="root">
            <div class="u-center-text u-margin-bottom-vsmall">
              <h4 id="intro" class="heading-secondary circled"><span>Variteies Available</span></h4>
            </div>
            <div class="container-fluid">
              <div class="feature-options">
                <div class="feature-btn">
                  <a href="#" class="feature-btn__active"><span style="font-weight: 300;">Organic</span> Vegetables</a>
                </div>
                <div class="feature-img">
                  <img src="/img/home/png-1.png" alt="">
                </div>
                <div class="feature-btn">
                  <a href="#" class="feature-btn__1"><span style="font-weight: 300;">Other</span> Variteies</a>
                </div>
              </div>
              <div class="row pb-2">
                <div class="col-xs-4 col-sm-3 col-md-2" v-for="feature in featured">
                  <div class="pcard">
                    <div class="pcard-content">
                      <img :src="'/' + feature.image_path" alt="{{ feature.name }}">
                      <div class="pcard-icons">
                        <a :href="'/products/' + feature.id" class="fa fa-shopping-basket" data-toggle="tooltip" data-placement="top" title="Add to Cart"></a>
                        <a :href="'/products/' + feature.id" class="fa fa-expand" data-toggle="tooltip" data-placement="top" title="about this product"></a>
                      </div>
                    </div>
                    <div class="pcard-caption">
                      <h3 class="pcard-caption__title">{{ stringLimit(feature.name, 18) }}</h3>
                      <p class="pcard-caption__price">${{ feature.price }}</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="u-center-text u-margin-top-big">
                <a href="/shop" class="feature-btn__1"><span style="font-weight: 300;">Shop</span> Now</a>
              </div>
            </div>
        </section>
      </div>
  </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/organicstore/resources/views/home.blade.php ENDPATH**/ ?>