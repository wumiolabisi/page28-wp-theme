// webpack.mix.js

let mix = require('laravel-mix');

mix.js('src/js/app.js', 'dist/js').js('src/js/ajax.js', 'dist/js').sass('src/scss/style.scss', 'dist/css');
