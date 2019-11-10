@extends('layouts.app')

@section('title', 'Home Page')

@section('data-page-id', 'home')

@section('content')
  <main>
      <div class="container-fluid p-0">
        <section class="section-landing">
          <div class="slider__page">
            <div class="slider__page-1">
              <h4>Testing for absolute</h4>
              <img src="/img/home/img-slider-1.jpg" alt="">
            </div>

            <div class="slider__page-2">
              <img src="/img/home/img-slider-2.jpg" alt="">
            </div>

            <div class="slider__page-3">
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

@endsection
