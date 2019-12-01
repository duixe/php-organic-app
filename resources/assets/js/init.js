
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
        ORGANICSTORE.home.sendMessage();
        break;

      case 'product':
        ORGANICSTORE.product.details();
        ORGANICSTORE.product.initNavProduct();
        ORGANICSTORE.product.initScrollProduct();
        break;

      case 'cart':
        ORGANICSTORE.product.cart();
        ORGANICSTORE.cart.initNavCart();
        ORGANICSTORE.cart.initScrollCart();
        break;

      case 'shop':
        ORGANICSTORE.shop.shopPageProducts();
        ORGANICSTORE.shop.initNavShop();
        ORGANICSTORE.shop.initScrollShop();
        break;

      case 'auth':
        ORGANICSTORE.auth.initNavAuth();
        ORGANICSTORE.auth.initScrollAuth();
        ORGANICSTORE.auth.initPassReveal();
        break;

      case 'adminProduct':
        ORGANICSTORE.admin.changeEvent();
        ORGANICSTORE.admin.delete();
        break;

      case 'adminDashboard':
        ORGANICSTORE.admin.dashboard();
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
