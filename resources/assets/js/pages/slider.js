(function() {
  "use strict";

  ORGANICSTORE.homeslider.initCarousel = function() {
    $('.slider__page').not(".slick-initialized")
    .slick({
      autoplay: true,
      autoplaySpeed: 3000,
      dots: true,
      prevArrow: ".section-landing .slider__btn .slider__btn-prev",
      nextArrow: ".section-landing .slider__btn .slider__btn-next",
    });
  }
})();
