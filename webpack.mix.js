const mix = require('laravel-mix');
mix.js('resources/js/app.js','public/js');
mix.js('resources/js/home.js','public/js')
.react();