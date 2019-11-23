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
            }, 600);
          })
        },
        stringLimit: function(string, value) {
          return ORGANICSTORE.module.truncateString(string, value);
        },
        addToCart: function(id) {
          let swalObj = {
            width: 600,
            padding: '3em',
            fontSize: '20px'
          };
          ORGANICSTORE.module.addItemToCart(id, function(msg) {
            Swal.fire({
              title: '😊',
              width: 600,
              padding: '3em',
              fontSize: '3.125em',
              text: msg,
              icon: 'success',
            })
          });
          ORGANICSTORE.module.getTotalItems(function(totalItem) {
            $('#cart-itm').html(totalItem);
          });
        },
        showTotalItemInCart: function() {
          ORGANICSTORE.module.getTotalItems(function(totalItem) {
            $('#cart-itm').html(totalItem);
          });
        }
      },
      created: function() {
        this.getProductDetails();
        this.showTotalItemInCart();
      },
      mounted: function() {
        this.getSimilarProduct();
      }
    });
  }
})()
