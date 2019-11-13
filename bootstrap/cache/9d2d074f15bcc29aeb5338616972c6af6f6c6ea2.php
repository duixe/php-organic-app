<?php $__env->startSection('title', 'Shop Page'); ?>

<?php $__env->startSection('data-page-id', 'shop'); ?>

<?php $__env->startSection('content'); ?>
  <main class="shop__main">

    <section class="section-shop" id="root-2">
      <div class="container section__shop">
        <div class="row">
          <div class="col-xs-12 col-sm-4 col-md-3" v-for="feature in featured">
            <div class="pcard">
              <div class="pcard-content">
                <img :src="'/' + feature.image_path" alt="{{ feature.name }}">
                <div class="pcard-icons">
                  <a :href="'/products/' + feature.id" class="fa fa-shopping-basket" data-toggle="tooltip" data-placement="top" title="Add to Cart"></a>
                  <a :href="'/products/' + feature.id" class="fa fa-expand" data-toggle="tooltip" data-placement="top" title="about this product"></a>
                </div>
              </div>
              <div class="pcard-caption">
                <h3 class="pcard-caption__title">{{ stringLimit(feature.name, 5) }}</h3>
                <p class="pcard-caption__price">${{ feature.price }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>



  </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/organicstore/resources/views/shop.blade.php ENDPATH**/ ?>