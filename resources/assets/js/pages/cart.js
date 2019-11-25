(function() {
  "use strict";

ORGANICSTORE.product.cart = function() {

  var Stripe = StripeCheckout.configure({
    key: $('#properties').data('stripe-key'),
    locale: "auto",
    image: "",
    token: function(token) {
      var data = $.param({stripeToken: token.id, stripeEmail: token.email});
      axios.post('/cart/payment', data).then(function(res) {
        let msg = res.data.success;
        Swal.fire({
          title: 'Payment Successful',
          width: 600,
          padding: '3em',
          fontSize: '3.125em',
          text: msg,
          icon: 'success'
        })
        app.displayItems(200);
      }).catch(function(err) {
        console.log(err);
      });

    }

  });

  let app = new Vue({
    el: '#shopping_cart',
    data: {
      items: [],
      cartTotal: 0,
      fail: false,
      loading: false,
      authenticated: false,
      message: '',
      amountInCents: 0
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
              app.authenticated = res.data.authenticated;
              app.amountInCents = res.data.amountInCents;
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
      },
      checkout: function() {
        Stripe.open({
          name: "ORGANIC Store, ltd",
          description: "shopping basket Items",
          email: $('#properties').data('customer-email'),
          amount: app.amountInCents,
          zipCode: true
        })
      }
    },
    created: function() {
      this.displayItems(1000);
    }
  });
}


})()
