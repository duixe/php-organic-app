<?php $__env->startSection('title', 'cart'); ?>

<?php $__env->startSection('data-page-id', 'cart'); ?>

<?php $__env->startSection('stripe-checkout'); ?>
<script src="https://checkout.stripe.com/checkout.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="shopping_cart" id="shopping_cart">

      <div v-show="loading" class="loader">
        <div class="circle"></div>
        <div class="circle"></div>
      </div>

      <div class="container item" v-cloak v-if="loading == false">
        <div class="row">
          <div class="cart__table">
            <h2 v-if="fail" v-text="message"></h2>
            <div v-else>
              <h2>your cart</h2>

              <div class="cart__table-table">
                <table class="table">
                  <thead class="thead-light">
                    <tr class="cart__table-row">
                      <th>product detail</th>
                      <th></th>
                      <th>product price</th>
                      <th>quantity</th>
                      <th>total price</th>
                    </tr>
                  </thead>
                  <tbody class="cart__table-body">
                    <tr v-for="item in items">
                      <td class="td__image">
                        <div class="td__image-bg">
                          <a :href="'/products/' + item.id">
                            <img :src="'/' + item.image" :alt="item.name">
                          </a>
                        </div>
                      </td>
                      <td class="td__details">
                        <h4 class="td__details-h4"><a :href="'/product/' + item.id"><span>organic </span>{{ item.name }}</a></h5>
                        <h5 class="td__details-h5">Status: </h5>
                        <span class="td__details-span" v-if="item.stock > 1">
                          In Stock
                        </span>
                        <span class="td__details-span" v-else>
                          Sorry, out of stock
                        </span>
                      </td>
                      <td class="td__price">
                        <h4 class="td__price-h4">${{ item.price }}</h4>
                      </td>
                      <td style="font-size: 1.4rem;">
                        <div class="td__quantity">
                          <button v-if="item.quantity > 1" @click="updateQuantity(item.id, '-')" class="td__quantity-btnm"><i class="fa fa-minus-circle"></i></button>
                          <h5 class="td__quantity-h5">{{ item.quantity }}</h5>
                          <button v-if="item.stock > item.quantity" @click="updateQuantity(item.id, '+')" class="td__quantity-btnp"><i class="fa fa-plus-circle"></i></button>
                        </div>
                      </td>
                      <td class="td__total">
                        <strong class="td__total-price">${{ item.total }}</strong>
                        <button @click="removeItem(item.index)"><i class="fas fa-times" aria-hidden="true"></i></button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="cart__summary">
                <div class="cart__summary-left">
                  <h5 class="cart__summary-left--h5">Enter coupon code if you have one. <span>APPLY HERE 👇</span></h5>
                  <div class="coupon-box">
                    <input class="coupon-txt" type="text" name="coupon" placeholder="coupon code">
                    <button class="coupon-btn"><i class="fas fa-tag"></i></button>
                  </div>
                </div>
                <div class="cart__summary-right">
                    <div class="cart__summary-right--total">
                      <h5>Subtotoal: <span class="float-right">${{ cartTotal }}</span></h5>
                      <h5>Discounted Amount: <span class="float-right">$0.00</span></h5>
                      <h5>Tax: <span class="float-right">$0.00</span></h5>
                      <h5>Totoal: <span class="float-right">${{ cartTotal }}</span></h5>
                    </div>
                </div>
              </div>
              <div class="text-right mt-5">
              <a href="/shop" class="btno btno--green mr-3">
                Contine shopping &nbsp;&nbsp;<i class="fas fa-shopping-basket" aria-hidden="true"></i>
              </a>
              <button @click.prevent="checkout()" v-if="authenticated" name="button" class="btno btno--brown">
                Checkout &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-credit-card" aria-hidden="true"></i>
              </button>
              <span v-else>
                <a href="/login" class="btno btno--brown">
                  Checkout &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-credit-card" aria-hidden="true"></i>
                </a>
              </span>
              <span id="properties" class="d-none" data-customer-email="<?php echo e(user()->email); ?>" data-stripe-key="<?php echo e(App\Classes\Session::get('publishable_key')); ?>"></span>
            </div>
            </div>
          </div>
        </div>
      </div>

    </section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/organicstore/resources/views/cart.blade.php ENDPATH**/ ?>