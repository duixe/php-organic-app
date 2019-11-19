<?php $__env->startSection('title'); ?> <?php echo e($product->name); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('data-page-id', 'product'); ?>

<?php $__env->startSection('content'); ?>

    <section class="product" id="product" data-token="<?php echo e($product->token); ?>" data-id="<?php echo e($product->id); ?>">
      <div class="text-center">
        <i v-show="loading" class="fas fa-spinner fa-spin" style="font-size: 4rem; padding-bottom: 3.5rem; position: fixed; top: 60%; color: 0a2b1d; bottom: 20%;"></i>
      </div>
      <div class="container-fluid">
          <div class="product__container">
          <div class="row mt-5">
            <div class="col-sm-8 col-lg-6 col-sm-offset-2 col-lg-offset-0 pt-40 text-center">
              <div class="product-item">
                <img src="/<?php echo e($product->image_path); ?>" alt="">
              </div>
              <div class="product__slider">
                <div class="row" id="product-slide">
                  <div class="col-md-3 product-slide__item" v-for="similar in similarProducts">
                    <img :src="'/' + similar.image_path" v-bind:alt="similar.name" style="width: 100%;">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 pt-50 pl-10">
              <div class="product__description">
                <h2 class="product__description-title"><span class="light1">Organic</span> {{ product.name }}</h2>
                <span class="product__description-divider"></span>
                <p class="product__description-price">${{ product.price }}</p>
                <span class="product__description-divider2"></span>
                <div class="product__description-paragraph">
                  <p>{{ product.description}}. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
                <span class="product__description-divider2"></span>
                <ul class="product__description-tags">
                  <li><span>category: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><a href="'/product/category' + category.slug">{{ category.name}}</a></li>
                  <li><span>subcategory: </span><a href="'/product/subCategory' + subCategory.slug">{{ subCategory.name}}</a></li>
                </ul>
                <span class="product__description-divider2"></span>
                <div class="product__description-foot">
                  <a href="#" class="product__description-btn"><i class="fas fa-shopping-basket"></i> Add to basket</a>
                </div>
              </div>
            </div>
          </div>
          </div>
      </div>
    </section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/organicstore/resources/views/product.blade.php ENDPATH**/ ?>