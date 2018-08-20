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
   .js('resources/assets/js/app-landing.js', 'public/js/app-landing.js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .less('node_modules/bootstrap-less/bootstrap/bootstrap.less', 'public/css/bootstrap.css')
   .less('resources/assets/less/adminlte-app.less','public/css/adminlte-app.css')
   .less('node_modules/toastr/toastr.less','public/css/toastr.css')
   .combine([
       'public/css/app.css',
       'node_modules/admin-lte/dist/css/skins/_all-skins.css',
       'node_modules/datatables.net-bs/css/dataTables.bootstrap.css',
       'node_modules/sweetalert2/dist/sweetalert2.css',
       'node_modules/multiselect/css/multi-select.css',
       'node_modules/inputmask/css/inputmask.css',
       'public/css/adminlte-app.css',
       'node_modules/icheck/skins/square/blue.css',
       'node_modules/icheck/skins/square/blue.css',
       'node_modules/icheck/skins/all.css',
       'node_modules/select2/dist/css/select2.css'
   ], 'public/css/all.css')
   .combine([
       'public/css/bootstrap.css',
       'resources/assets/css/main.css'
   ], 'public/css/all-landing.css')
   .copy('node_modules/icheck/skins/square/blue.png','public/css')
   .copy('node_modules/icheck/skins/square/blue@2x.png','public/css');

// <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.min.js"></script>
//     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.min.css">
