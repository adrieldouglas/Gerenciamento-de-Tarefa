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

 mix
 .sass('resources/views/admin/assets/scss/reset.scss', 'public/assets/css/reset.css')
 .sass('resources/views/admin/assets/scss/boot.scss', 'public/assets/css/boot.css')
 .sass('resources/views/admin/assets/scss/login.scss', 'public/assets/css/login.css')

 .styles([

 	'resources/views/admin/assets/css/bootstrap.min.css',

 	], 'public/assets/css/bootstrap.css')

 .scripts([
 	'resources/views/admin/assets/js/bootstrap.bundle.min.js',
 	], 'public/assets/js/bundle.js')

 .scripts([
 	'resources/views/admin/assets/js/login.js',
 	], 'public/assets/js/login.js')

  .scripts([
 	'resources/views/admin/assets/js/jquery.min.js',
 	], 'public/assets/js/jquery.js')

    .scripts([
 	'resources/views/admin/assets/js/canvasjs.min.js',
 	], 'public/assets/js/canvasjs.js')

 .copyDirectory('resources/views/admin/assets/background', 'public/assets/images')
 .copyDirectory('resources/views/admin/assets/images', 'public/assets/logotipo')

.options({
 	processCssUrls: false
 })

 .version()
 ;
