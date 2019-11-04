let mix = require('laravel-mix');

mix.setPublicPath('public');
mix.sass('resources/assets/sass/main.scss', 'public/css/style.css');
mix.sass('resources/assets/sass/admin.scss', 'public/css/admincustom.css');
mix.js('resources/assets/js/main.js', 'public/js/app.js');
