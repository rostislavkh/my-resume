const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */


//========================================================= JS file ===========================================================

// default
mix.js('resources/js/default.js', 'js');

// lib
// mix.copy('resources/js/lib/arcticmodal.js', 'public/js');

// pages
// mix.js('resources/js/pages/page-login.js', 'js');

//========================================================= SCSS file ===========================================================


// default
mix.sass('resources/scss/style.scss', 'css');
mix.sass('resources/scss/app-layout.scss', 'css');
mix.sass('resources/scss/fonts.scss', 'css');
mix.sass('resources/scss/variables.scss', 'css');
mix.sass('resources/scss/pages/home.scss', 'css');

// lib
// mix.styles([
//     'resources/css/lib/arcticmodal.css',
// ], 'public/css/all-lib.css');

// pages
// mix.css('resources/css/pages/index-lc.css', 'css');

mix.setPublicPath('public')
mix.version();