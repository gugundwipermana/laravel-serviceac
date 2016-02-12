var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss');

    /*mix.styles([
        'canvasCrop.css'
        ], 'public/css/main.css', 'resources/assets/css/');
*/
    /*mix.scripts([
        '../../../node_modules/bootstrap-sass/assets/javascripts/bootstrap.js',
        'canvasCrop.js',
        'main.js'
    ], 'public/js/main.js', 'resources/assets/scripts/');*/
});
