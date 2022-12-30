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
mix.js('resources/js/ajax-form.js', 'js');

// lib
mix.copy('resources/js/libs/jquery.js', 'public/js');
mix.copy('resources/js/libs/slick.js', 'public/js');
mix.copy('resources/js/libs/animations.js', 'public/js');

// pages
mix.js('resources/js/pages/home.js', 'js');
mix.js('resources/js/pages/project.js', 'js');

//========================================================= SCSS file ===========================================================


// default
mix.sass('resources/scss/style.scss', 'css');
mix.sass('resources/scss/app-layout.scss', 'css');
mix.sass('resources/scss/fonts.scss', 'css');
mix.sass('resources/scss/variables.scss', 'css');

// lib
mix.styles([
    'resources/scss/libs/drop.css',
    'resources/scss/libs/slick.css',
    'resources/scss/libs/anims.css',
], 'public/css/all-lib.css');

// pages
mix.sass('resources/scss/pages/home.scss', 'css');
mix.sass('resources/scss/pages/projects.scss', 'css');
mix.sass('resources/scss/pages/project.scss', 'css');

mix.setPublicPath('public')
mix.version();