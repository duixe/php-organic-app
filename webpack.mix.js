let mix = require('laravel-mix');

mix.setPublicPath('public');
mix.sass('resources/assets/sass/main.scss', 'public/css/style.css');
mix.js('resources/assets/js/main.js', 'public/js/app.js');
