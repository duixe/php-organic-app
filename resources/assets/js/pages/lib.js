(function() {
  "use strict";

  ORGANICSTORE.module = {
    truncateString: function limit(string, value) {
      if (string.length > value) {
        return string.substring(0, value) + "...";
      }else {
        return string;
      }
    },
    addItemToCart: function(id, callbackFunc) {
      let token = $(".section-features").data('token');

      if(token == null || !token) {
        token = $(".section-produce").data('token');
      }
      if (token == null || !token) {
        token = $(".product").data('token');
      }
      if (token == null || !token) {
        token = $(".section-shop").data('token');
      }

      let postData = $.param({product_id: id, token: token});
      axios.post('/cart', postData)
      .then(function(res) {
        callbackFunc(res.data.success);
      });
    },

    getTotalItems: function(callback) {
      axios.get('/cart/items').then(function(res) {
        callback(res.data.itemTotal);
      });
    }

  }
})()
