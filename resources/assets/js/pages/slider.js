(function() {
  "use strict";

  ORGANICSTORE.homeslider.initCarousel = function() {
    $('.slider__page').not(".slick-initialized")
    .slick({
      autoplay: true,
      autoplaySpeed: 3000,
      dots: true,
      fade: true,
      cssEase: 'linear',
      prevArrow: ".section-landing .slider__btn .slider__btn-prev",
      nextArrow: ".section-landing .slider__btn .slider__btn-next",
    });

    $('.slider__page2').not(".slick-initialized")
    .slick({
      autoplay: true,
      autoplaySpeed: 3000,
      arrows: false,
      dots: true,
      fade: false,
      cssEase: 'cubic-bezier(0.600, -0.280, 0.735, 0.045)',
    });
  }
})();
