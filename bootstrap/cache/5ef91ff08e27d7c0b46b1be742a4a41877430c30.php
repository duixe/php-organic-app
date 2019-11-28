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
          <div class="section-landing__wave"></div>
        </section>

        <section class="section-features" data-token="<?php echo e($token); ?>" id="root">
            
            <div class="container-fluid">
              <div class="feature-options">
                <div class="feature-btn">
                  <a href="#" class="feature-btn__active"><span style="font-weight: 300;">Organic</span> Vegetables</a>
                </div>
                <div class="feature-img">
                  <img src="/img/home/varieties2.png" alt="">
                </div>
                <div class="feature-btn">
                  <a href="#" class="feature-btn__1"><span style="font-weight: 300;">Other</span> Variteies</a>
                </div>
              </div>
              <div class="row pb-2">
                <div class="col-xs-4 col-sm-3 col-md-2" v-cloak v-for="feature in featured">
                  <div class="pcard">
                    <div class="pcard-content">
                      <img :src="'/' + feature.image_path" class="pcard__img" alt="{{ feature.name }}">
                      <img src="/img/home/wavesmall.png" class="pcard__shape" alt="">
                      <div class="pcard-icons">
                        <button v-if="feature.quantity > 0" @click.prevent="addToCart(feature.id)" type="button" data-toggle="tooltip" data-placement="top" title="Add to Cart"><i class="fa fa-shopping-basket"></i></button>
                        <button v-else type="button" data-toggle="tooltip" data-placement="top" title="out of stock"><i class="fas fa-info"></i></button>
                        <a :href="'/products/' + feature.id" class="fa fa-expand"></a>
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

        <!-- section about -->
        <section class="section-about">
          <div class="container-fluid p-0">
            <div class="u-center-text u-margin-bottom-small">
              <h3 class="heading__about"><span class="heading__about-tin">We provide</span> fresh organic farm food</h3>
              <h4 class="heading__about-sub"><span>about organic store</span></h4>
              <p class="heading__about-paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                <div class="about__box">
                  <div class="about__head">
                    <img src="/img/home/about-png1.png" alt="">
                  </div>
                  <div class="about__info">
                    <h4><span class="heading__about-tin">fresh from</span> our organic farm</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod labore et dolore magna aliqua.</p>
                  </div>
                  <a href="/shop" class="btn-text">Read more &rarr;</a>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                <div class="about__box">
                  <div class="about__head">
                    <img src="/img/home/about-png2.png" alt="">
                  </div>
                  <div class="about__info">
                    <h4><span class="heading__about-tin">100%</span> organic produce</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod labore et dolore magna aliqua.</p>
                  </div>
                  <a href="/shop" class="btn-text">Read more &rarr;</a>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                <div class="about__box">
                  <div class="about__head">
                    <img src="/img/home/about-png3.png" alt="">
                  </div>
                  <div class="about__info">
                    <h4><span class="heading__about-tin">premium</span> quality</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod labore et dolore magna aliqua.</p>
                  </div>
                  <a href="/shop" class="btn-text">Read more &rarr;</a>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                <div class="about__box">
                  <div class="about__head">
                    <img src="/img/home/about-png4.png" alt="">
                  </div>
                  <div class="about__info">
                    <h4><span class="heading__about-tin">100%</span> healthy and clean</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod labore et dolore magna aliqua.</p>
                  </div>
                  <a href="/shop" class="btn-text">Read more &rarr;</a>
                </div>
              </div>
            </div>
          </div>
          <div class="about__img">
            <img src="/img/home/vegavail2.png" alt="">
          </div>
        </section>

        <!-- section from our farm -->
        <section class="section-farm">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-4 col-md-3 text-center">
                <div class="farm__box">
                  <div class="farm__box-head">
                    <img src="/img/home/farmpng4.png" alt="">
                  </div>
                  <span class="farm__box-divider"></span>
                  <div class="farm__box-footer">
                    <h4 class="farm__box-h4"><span class="heading__about-tin">Organic</span> fruits</h4>
                    <p class="farm__box-paragraph">+20 produce</p>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-4 col-md-3 text-center">
                <div class="farm__box">
                  <div class="farm__box-head">
                    <img src="/img/home/farmpng3.png" alt="">
                  </div>
                  <span class="farm__box-divider"></span>
                  <div class="farm__box-footer">
                    <h4 class="farm__box-h4"><span class="heading__about-tin">Fresh</span> vegetables</h4>
                    <p class="farm__box-paragraph">+30 produce</p>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="farm__message">
                  <h4 class="farm__message-h4">fresh from our farm</h4>
                  <h3 class="farm__message-h3">OVER <span class="heading__about-tin">100</span> Fresh and Organic fruits and vegetables</h3>
                  <p class="farm__message-paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eu nisl nunc mi ipsum faucibus vitae. Phasellus vestibulum lorem sed risus ultricies tristique nulla aliquet enim. Facilisi morbi tempus iaculis urna id volutpat lacus laoreet. Justo nec ultrices dui sapien eget mi proin. Nunc sed id semper risus in hendrerit gravida rutrum quisque.</p>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- section produce -->
        <section class="section-produce" data-token="<?php echo e($token); ?>" id="root-3">
          <div class="container">
            <div class="text-center">
              <h4 class="farm__message-h4">fresh from our farm</h4>
              <h4 class="heading-secondary"><span class="heading__about-tin">organic</span> goods available for sale</h4>
            </div>

            <div class="customtab">
              <ul class="customtab__nav">
                <li class="active"><a href="#tab-1" class="customtab__nav-btn" data-toggle="tab" role="tab">organic fruits</a></li>
                <li><a href="#tab-1" class="customtab__nav-btn" data-toggle="tab" role="tab">organic vegetables</a></li>
                <li><a href="/shop" class="customtab__nav-btn">visit shop</a></li>
              </ul>

                  <div class="row tab-content">

                      <div class="tab-pane active col-xs-12 col-sm-4 col-md-3" v-cloak v-for="product in products" id="tab-1" role="tabpanel">
                        <div class="pcard">
                          <div class="pcard-content">
                            <img :src="'/' + product.image_path" class="pcard__img" v-bind:alt="product.name">
                            <img src="/img/home/wavesmall.png" class="pcard__shape" alt="">
                            <div class="pcard-icons">
                              <button v-if="product.quantity > 0" @click.prevent="addToCart(product.id)" type="button" data-toggle="tooltip" data-placement="top" title="Add to Cart"><i class="fa fa-shopping-basket"></i></button>
                              <button v-else type="button" data-toggle="tooltip" data-placement="top" title="out of stock"><i class="fas fa-info"></i></button>
                              <a :href="'/products/' + product.id" class="fa fa-expand"></a>
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

        </section>


        
        <section class="section-book">
          <img class="book__bg-img1" src="/img/home/greenleave2.png" alt="green-leave">
          <img class="book__bg-img2" src="/img/home/vegleaf.png" alt="green-leave">
          <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="book">
                            <div class="book__form">
                                <form action="#" class="form">
                                    <div class="u-margin-bottom-medium">
                                        <h2 class="heading__about">
                                           Contact us Now
                                        </h2>
                                    </div>

                                    <div class="form__group">
                                        <input type="text" class="form__input" placeholder="Full Name" id="name" required>
                                        <label for="name" class="form__label">Full Name</label>
                                    </div>

                                    <div class="form__group">
                                        <input type="email" class="form__input" placeholder="Email Address" id="email" required>
                                        <label for="email" class="form__label">Email Address</label>
                                    </div>

                                    <div class="form__group">
                                        <textarea name="textArea" id="textArea" class="form__input" placeholder="Send us a messaage"></textarea>
                                        <label for="textArea" class="form__label">Send us a messaage</label>
                                    </div>

                                    <div class="form-group">
                                        <a href="#" class="btn-text2">Send message&rarr;</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                   </div>
                </div>
            </div>
        </section>

        
        <section class="section-stories">
          <div class="bg-video">
            <video class="bg-video__content" autoplay muted loop>
                <source src="/img/home/storymov.mp4" type="video/mp4">
                Your browser is not supported!
            </video>
          </div>
          <div class="u-center-text u-margin-bottom-big">
            <h2 class="heading-general">
              Our customers are very Happy 😊
            </h2>
          </div>
          <div class="container">
            <div class="slider__page2">
              <div class="row story__container">
                <div class="story">
                  <figure class="story__shape">
                    <img src="img/home/story3.jpg" alt="person on a tour" class="story__img">
                    <figcaption class="story__caption">Mary Smith</figcaption>
                  </figure>
                  <div class="story__text">
                    <h3 class="heading-tertiary u-margin-bottom-small">All i had to do was to visit the site and order</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquid nisi veniam ab quod magnam quia, sequi fuga vero quasi veritatis illo quos nostrum sunt adipisci vitae fuga vero quasi veritatis illo quos nostrum sunt adipisci vitae veritatis illo quos nostrum sunt adipisci vitae</p>
                  </div>
                </div>
              </div>
              <div class="row story__container">
                 <div class="story">
                   <figure class="story__shape">
                       <img src="img/home/story2.jpg" alt="person on a tour" class="story__img">
                       <figcaption class="story__caption">Tommy Higan</figcaption>
                   </figure>
                   <div class="story__text">
                       <h3 class="heading-tertiary u-margin-bottom-small">Shopping for organic farmfoods has never been better</h3>
                       <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquid nisi veniam ab quod magnam quia, sequi fuga vero quasi veritatis illo quos nostrum sunt adipisci vitae fuga vero quasi veritatis illo quos nostrum sunt adipisci vitae veritatis illo quos nostrum sunt adipisci vitae</p>
                   </div>
                 </div>
              </div>
              <div class="row story__container">
                 <div class="story">
                   <figure class="story__shape">
                       <img src="img/home/story1.jpg" alt="person on a tour" class="story__img">
                       <figcaption class="story__caption">Hannah Dean</figcaption>
                   </figure>
                   <div class="story__text">
                       <h3 class="heading-tertiary u-margin-bottom-small">Organic store serves me well</h3>
                       <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquid nisi veniam ab quod magnam quia, sequi fuga vero quasi veritatis illo quos nostrum sunt adipisci vitae fuga vero quasi veritatis illo quos nostrum sunt adipisci vitae veritatis illo quos nostrum sunt adipisci vitae</p>
                   </div>
                 </div>
              </div>
            </div>


          </div>
        </section>
      </div>
  </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/organicstore/resources/views/home.blade.php ENDPATH**/ ?>