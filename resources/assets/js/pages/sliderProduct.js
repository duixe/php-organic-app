(function() {
  "use strict";

  ORGANICSTORE.product.initCarouselProduct = function() {
    $('.product-slide').not(".slick-initialized")
    .slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplaySpeed: 3000
    });
  }
})();
