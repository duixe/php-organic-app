(function() {
  "use strict";

ORGANICSTORE.product.cart = function() {

  let app = new Vue({
    el: '#shopping_cart',
    data: {
      items: [],
      cartTotal: [],
      fail: false,
      loading: false,
      message: ''
    },
    methods: {
      displayItems: function(secTime) {
        this.loading = true;
        setTimeout(function() {
          axios.get('/cart/items').then(function(res) {
            if (res.data.failed) {
              app.fail = true;
              app.message = res.data.failed;
              app.loading = false;
            } else {
              app.items = res.data.items;
              app.cartTotal = res.data.cartTotal;
              app.loading = false;
            }
          });
        }, secTime);

        ORGANICSTORE.module.getTotalItems(function(totalItem) {
          $('#cart-itm').html(totalItem);
        });
      },
      updateQuantity: function(product_id, operator) {
        let msg = `${product_id} and the ${operator}`;
        let postData = $.param({product_id: product_id, operator: operator});
        axios.post('/cart/update-qty', postData).then(function(res) {
          app.displayItems(200);
        })
      },
      removeItem: function(index) {
        let postData = $.param({item_index: index});
        axios.post('/cart/remove-item', postData).then(function(res) {
          let msg = res.data.success;
          Toast.fire({
            icon: 'success',
            title: msg
          });
          app.displayItems(200);
        })
      }
    },
    created: function() {
      this.displayItems(1000);
    }
  });
}


})()
