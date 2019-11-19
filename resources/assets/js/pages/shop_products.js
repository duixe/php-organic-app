(function() {
  "use strict";

  ORGANICSTORE.shop.shopPageProducts = function() {
    var app2 = new Vue({
      el: '#root-2',
      data: {
        featured: [],
        products: [],
        count: 0,
        loading: false,
      },
      //in vue when trying to define any function they must go into the method object👇
      methods: {
        getFeaturedProducts: function() {
          this.loading = true;
          axios.all(
            [axios.get('/featured'), axios.get('/get-products')]
          ).then(axios.spread(function(featuredRes, getProdRes) {
            app2.featured = featuredRes.data.featured;
            app2.products = getProdRes.data.products;
            app2.count = getProdRes.data.count;
            app2.loading = false;
          }));
        },
        stringLimit: function(string, value) {
          if (string.length > value) {
            return string.substring(0, value) + "...";
          }else {
            return string;
          }
        },
        loadMoreProducts: function() {
          let token = $('.section-shop').data('token');
          this.loading = true;
          //jquery param is used because by default axios passes all javascript OBJ as JSON, we rather need form url encode format of which php understand
          let data = $.param({next: 4, token: token, count: app2.count});
          axios.post('/load-more', data)
          .then(function(res) {
            app2.products = res.data.products;
            app2.count = res.data.count;
            app2.loading = false;
          })
        },

      },
      //when the vue instance is created then call an unanemous func to call the custom function
      created: function() {
        this.getFeaturedProducts();
      },
      mounted: function() {
        $(window).scroll(function() {
          if($(window).scrollTop() + $(window).height() == $(document).height()) {
            app2.loadMoreProducts();
          }
        });
      }
    });
  }
})()
