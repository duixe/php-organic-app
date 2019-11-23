// window .$ = window.JQuery = require('jquery');
 // global.jQuery = require('jquery');
let $ = require('jquery');
window.jQuery = $;
window.$ = $;

//sweetalert and toaster
const Swal = require('sweetalert2');
window.Swal = Swal;

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true
});

window.Toast = Toast;

// require axios
window.axios = require('axios');
// window.Vue = require('vue');

//Vue
var Vue = require('vue');
var validator = require('vue-validator');
var resource = require('vue-resource');
window.Vue = Vue;

Vue.use(validator);
Vue.use(resource);

//node dependencies
// require('popper.js/dist/popper.min');
require('bootstrap/dist/js/bootstrap.min.js');
require('jquery.easing/jquery.easing.min.js');
require('slick-carousel/slick/slick.min');

//custom js files
require('../../assets/js/admin.min.js');
require('chart.js/dist/Chart.bundle');
require('../../assets/js/store.js');
require('../../assets/js/admin/events.js');
require('../../assets/js/admin/update.js');
require('../../assets/js/admin/delete.js');
require('../../assets/js/admin/create.js');
require('../../assets/js/pages/nav.js');
require('../../assets/js/pages/shopnav.js');
require('../../assets/js/pages/slider.js');
require('../../assets/js/pages/sliderProduct.js');
require('../../assets/js/pages/lib.js');
require('../../assets/js/pages/cart.js');
require('../../assets/js/pages/home_products.js');
require('../../assets/js/pages/shop_products.js');
require('../../assets/js/pages/product__details.js');
require('../../assets/js/pages/scroll.js');
require('../../assets/js/pages/shopscroll.js');
require('../../assets/js/pages/productnav.js');
require('../../assets/js/pages/productscroll.js');
require('../../assets/js/pages/cartnav.js');
require('../../assets/js/pages/cartscroll.js');
require('../../assets/js/init.js');
