(function() {
  "use strict";

  ORGANICSTORE.homeslider.homePageProducts = function() {
    var app = new Vue({
      el: '#root',
      data: {
        featured: [],
        loading: false,
      },
      //in vue when trying to define any function they must go into the method object👇
      methods: {
        getFeaturedProducts: function() {
          this.loading = true;
          axios.get('/featured')
          .then(function(res) {
            app.featured = res.data.featured;
            app.loading = false;
          });
        },
        stringLimit: function(string, value) {
          return ORGANICSTORE.module.truncateString(string, value);
        },
        addToCart: function(id) {
          ORGANICSTORE.module.addItemToCart(id, function(msg) {
            Toast.fire({
              icon: 'success',
              title: msg
            })
          });
          ORGANICSTORE.module.getTotalItems(function(totalItem) {
            $('#cart-itm').html(totalItem);
          })

        },
        showTotalItemInCart: function() {
          ORGANICSTORE.module.getTotalItems(function(totalItem) {
            $('#cart-itm').html(totalItem);
          });
        }
      },
      //when the vue instance is created then call an unanemous func to call the custom function
      created: function() {
        this.getFeaturedProducts();
        this.showTotalItemInCart();
      }
    });


    //for produce in home page
    var app3 = new Vue({
      el: '#root-3',
      data: {
        products: [],
        loading: false,
      },
      //in vue when trying to define any function they must go into the method object👇
      methods: {
        getAllProducts: function() {
          this.loading = true;
          axios.get('/get-products')
          .then(function(res) {
            app3.products = res.data.products;
            app3.loading = false;
          });
        },
        stringLimit: function(string, value) {
          return ORGANICSTORE.module.truncateString(string, value);
        },
        addToCart: function(id) {
          ORGANICSTORE.module.addItemToCart(id, function(msg) {
            Toast.fire({
              icon: 'success',
              title: msg
            })
          });
          ORGANICSTORE.module.getTotalItems(function(totalItem) {
            $('#cart-itm').html(totalItem);
          });
        }
      },
      //when the vue instance is created then call an unanemous func to call the custom function
      created: function() {
        this.getAllProducts();
      }
    });
  }
})()
