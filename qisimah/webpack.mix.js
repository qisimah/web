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
mix.webpackConfig({
    module: {
        loaders: [{
            test: /\.styl$/,
            loader: 'css-loader!stylus-loader?paths=node_modules/bootstrap-stylus/stylus/'
        }]
    }
});

var d = new Date();

mix.js('resources/assets/js/app.js', '../js/app'+d.getTime()+'.js')
   .sass('resources/assets/sass/app.scss', 'public/css');
