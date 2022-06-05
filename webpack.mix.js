const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

 mix.copy('node_modules/@babel/parser/lib/index.js', 'public/home/js/raphael-min.js');
 mix.copy('node_modules/font-awesome/css/font-awesome.css', 'public/home/css');
 // mix.copy('node_modules/bootstrap/dist/css/bootstrap.css', 'public/home/css');
 mix.copy('node_modules/jquery/dist/jquery.js', 'public/home/js');
 
 mix.copy('resources/assets/home/css/custom/style.css', 'public/home/css/custom')
 mix.copy('resources/assets/home/css/responsive.css', 'public/home/css')
 mix.copy('resources/assets/home/js/tether.min.js', 'public/home/js')
 mix.copy('resources/assets/home/js/custom.js', 'public/home/js')
 mix.copy('resources/assets/home/css/colors.css', 'public/home/css')
 mix.copy('resources/assets/home/css/bootstrap.css', 'public/home/css')
 
 //home
 mix.copyDirectory('resources/assets/home/images', 'public/home/images');
 mix.copyDirectory('node_modules/font-awesome/fonts', 'public/home/fonts');
 
 mix.js('node_modules/bootstrap/dist/js/bootstrap.js', 'public/home/js');
 //admin
 mix.copyDirectory('resources/assets/admin/css/', 'public/admin/css');
 mix.js([
     'resources/assets/admin/js/chart-area-demo.js',
     'resources/assets/admin/js/chart-bar-demo.js',
     'resources/assets/admin/js/datatables-simple-demo.js',
     'resources/assets/admin/js/scripts.js'
 ], 'public/admin/js/script.js');

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ])
    .webpackConfig(require('./webpack.config'));

if (mix.inProduction()) {
    mix.version();
}
