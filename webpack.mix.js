const { mix } = require('laravel-mix');

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
mix.js('resources/assets/js/app.js', 'public/js')
   .version();

mix.combine([
    'resources/assets/css/datatables.bootstrap.css',
    'resources/assets/css/dataTables.bootstrap.min.css',
    'resources/assets/css/responsive.dataTables.min.css',
    'resources/assets/css/animate.css',
    'resources/assets/css/select2.css',
    'resources/assets/css/sweetalert.css',
    'resources/assets/css/bootstrap-datepicker.css'
], 'public/css/vendor.css');

mix.combine([
    'resources/assets/js/vendor/jquery.dataTables.min.js',
    'resources/assets/js/vendor/datatables.bootstrap.js',
    'resources/assets/js/vendor/bootstrap-datepicker.js',
    'resources/assets/js/vendor/select2.js',
    'resources/assets/js/vendor/sweetalert.min.js'
], 'public/js/vendor.js');
