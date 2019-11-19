(function() {
  "use strict";

  ORGANICSTORE.product.details = function() {
    let app = new Vue({
      el: '#product',
      data: {
        product: [],
        category: [],
        subCategory: [],
        similarProducts: [],
        productId: $('#product').data('id'),
        loading: false
      },
      methods: {
        getProductDetails: function() {
          this.loading = true;
          setTimeout(function() {
            axios.get('/products-details/' + app.productId)
            .then(function(res) {
              app.product = res.data.product;
              app.category = res.data.category;
              app.subCategory = res.data.subCategory;
              app.loading = false;
            });
          }, 1000);
        },
        getSimilarProduct: function() {
          axios.get('/products-details/' + this.productId)
          .then(function(res) {
            app.similarProducts = res.data.similarProducts;
            setTimeout(function() {
              $('#product-slide').not(".slick-initialized")
              .slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplaySpeed: 3000
              });
            }, 1000);
          })
        },
        stringLimit: function(string, value) {
          if (string.length > value) {
            return string.substring(0, value) + "...";
          }else {
            return string;
          }
        }
      },
      created: function() {
        this.getProductDetails();
      },
      mounted: function() {
        this.getSimilarProduct();
      }
    });
  }
})()
