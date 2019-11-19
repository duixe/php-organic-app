<?php $__env->startSection('title', 'Shop Page'); ?>

<?php $__env->startSection('data-page-id', 'shop'); ?>

<?php $__env->startSection('content'); ?>
  <main class="shop__main">

    <section class="section-shop" data-token="<?php echo e($token); ?>" id="root-2">
      <div class="u-center-text shop__img">
        <img src="/img/home/fruitsavail1.png" alt="">
      </div>
      <div class="container mb-10 section__shop">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-3" v-cloak v-for="feature in featured">
            <div class="pcard">
              <div class="pcard-content">
                <img :src="'/' + feature.image_path" class="pcard__img" v-bind:alt="feature.name">
                <img src="/img/home/wavesmall.png" class="pcard__shape" alt="">
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
      </div>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
      <div class="container mt-5 section__shop">
        <div class="u-center-text shop__img2">
          <img src="/img/home/vegavail1.png" alt="">
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-4 col-md-3" v-cloak v-for="product in products">
            <div class="pcard">
              <div class="pcard-content">
                <img :src="'/' + product.image_path" class="pcard__img" v-bind:alt="product.name">
                <img src="/img/home/wavesmall.png" class="pcard__shape" alt="">
                <div class="pcard-icons">
                  <a :href="'/products/' + product.id" class="fa fa-shopping-basket" data-toggle="tooltip" data-placement="top" title="Add to Cart"></a>
                  <a :href="'/products/' + product.id" class="fa fa-expand" data-toggle="tooltip" data-placement="top" title="about this product"></a>
                </div>
              </div>
              <div class="pcard-caption">
                <h3 class="pcard-caption__title">{{ stringLimit(product.name, 18) }}</h3>
                <p class="pcard-caption__price">${{ product.price }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center">
        <i v-show="loading" class="fas fa-spinner fa-spin" style="font-size: 4rem; padding-bottom: 3.5rem; position: fixed; top: 60%; color: 0a2b1d; bottom: 20%;"></i>
      </div>
    </section>



  </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/organicstore/resources/views/shop.blade.php ENDPATH**/ ?>