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


    mix.sass('app.scss', 'resources/assets/css');
    mix.sass('admin.scss', 'resources/assets/css');

    mix.styles([
        'libs/pure-min.css',
        'libs/font-awesome.min.css',
        'main.css',
        'app.css'
    ]);

    mix.styles([
        'libs/pure-min.css',
        'libs/font-awesome.min.css',
        'main.css',
        'app.css',
        'admin.css',
        'libs/select2.min.css',
    ], 'public/css/admin.css');

    mix.scripts([
        'libs/jquery.js',
        'main.js',
    ]);

    mix.scripts([
        'libs/jquery.js',
        'libs/select2.min.js',
        'main.js',
    ], 'public/js/admin.js');

    mix.version(['public/css/all.css', 'public/js/all.js', 'public/css/admin.css', 'public/js/admin.js']);

    mix.copy(
        'resources/assets/fonts/',
        'public/build/fonts/'
    );

});
