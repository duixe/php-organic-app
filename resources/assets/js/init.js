
(function() {
  'use strict';

  // $(document).bootstrap();
  // $(document).admin();

  $(document).ready(() => {
    // SWITCH TO A PREFRED PAGE AT A POINT IN EXECUTION
    switch ($("body").data("page-id")) {
      case 'home':
        ORGANICSTORE.homenav.initNav();
        ORGANICSTORE.homeslider.initCarousel();
        ORGANICSTORE.homeslider.homePageProducts();
        ORGANICSTORE.homescroll.initScroll();
        ORGANICSTORE.homescroll.customNav();
        break;

      case 'product':
        ORGANICSTORE.product.details();
        ORGANICSTORE.product.initNavProduct();
        ORGANICSTORE.product.initScrollProduct();
        // ORGANICSTORE.product.initCarouselProduct();
        break;

      case 'shop':
        ORGANICSTORE.shop.shopPageProducts();
        ORGANICSTORE.shop.initNavShop();
        ORGANICSTORE.shop.initScrollShop();
        break;

      case 'adminProduct':
        ORGANICSTORE.admin.changeEvent();
        ORGANICSTORE.admin.delete();
        break;

      case 'adminCategories':
          ORGANICSTORE.admin.update();
          ORGANICSTORE.admin.delete();
          ORGANICSTORE.admin.create();
        break;
      default:

    }
  })
})();
