(function() {
  "use strict";

  ORGANICSTORE.shop.shopPageProducts = function() {
    var app2 = new Vue({
      el: '#root-2',
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
            app2.featured = res.data.featured;
            app2.loading = false;
          });
        },
        stringLimit: function(string, value) {
          if (string.length > value) {
            return string.substring(0, value) + "...";
          }else {
            return string;
          }
        }

      },
      //when the vue instance is created then call an unanemous func to call the custom function
      created: function() {
        this.getFeaturedProducts();
      }
    });
  }
})()
