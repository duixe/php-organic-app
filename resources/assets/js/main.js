// window .$ = window.JQuery = require('jquery');
 // global.jQuery = require('jquery');
let $ = require('jquery');
window.jQuery = $;
window.$ = $;

// require('jquery');
window.axios = require('axios');
// window.Vue = require('vue');

//node dependencies
// require('popper.js/dist/popper.min');
require('bootstrap/dist/js/bootstrap.min.js');
require('slick-carousel/slick/slick.min');
require('jquery.easing/jquery.easing.min.js');

//custom js files
require('../../assets/js/admin.min.js');
require('chart.js/dist/Chart.bundle');
require('../../assets/js/store.js');
require('../../assets/js/admin/events.js');
require('../../assets/js/admin/update.js');
require('../../assets/js/admin/delete.js');
require('../../assets/js/admin/create.js');
require('../../assets/js/init.js');
