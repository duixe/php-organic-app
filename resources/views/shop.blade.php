@extends('layouts.app')

@section('title', 'Shop Page')

@section('data-page-id', 'shop')

@section('content')
  <main class="shop__main">

    <section class="section-shop" id="root-2">
      <div class="container section__shop">
        <div class="row">
          <div class="col-xs-12 col-sm-4 col-md-3" v-for="feature in featured">
            <div class="pcard">
              <div class="pcard-content">
                <img :src="'/' + feature.image_path" alt="@{{ feature.name }}">
                <div class="pcard-icons">
                  <a :href="'/products/' + feature.id" class="fa fa-shopping-basket" data-toggle="tooltip" data-placement="top" title="Add to Cart"></a>
                  <a :href="'/products/' + feature.id" class="fa fa-expand" data-toggle="tooltip" data-placement="top" title="about this product"></a>
                </div>
              </div>
              <div class="pcard-caption">
                <h3 class="pcard-caption__title">@{{ stringLimit(feature.name, 18) }}</h3>
                <p class="pcard-caption__price">$@{{ feature.price }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>



  </main>
@endsection
