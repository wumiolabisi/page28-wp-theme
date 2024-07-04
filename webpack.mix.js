// webpack.mix.js

let mix = require('laravel-mix');

mix.js('src/js/load-more.js', 'dist/js').js('src/js/app.js', 'dist/js').sass('src/scss/style.scss', 'dist/css');
