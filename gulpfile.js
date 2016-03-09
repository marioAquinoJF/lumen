var elixir = require('laravel-elixir'),
        bowerDir = './vendor/bower_components/',
        livereload = require('gulp-livereload'),
        gulp = require('gulp'),
        clean = require('rimraf');
elixir(function(mix){
    mix.copy(bowerDir+'bootstrap/dist/fonts', 'public/fonts')
            .copy(bowerDir+'font-awesome/fonts', 'public/fonts')
            .copy(bowerDir+'bootstrap/dist/js/bootstrap.js', 'resources/assets/js')
            .copy(bowerDir+'jquery/dist/jquery.js', 'resources/assets/js')
          //  .copy(bowerDir+'jquery/dist/tabs.js', 'resources/assets/js')
            .scripts([
                'jquery.js',
                'bootstrap.js',
                'custom.js',
                'tabbs.js'
            ], 'public/js/scripts.js')
                    .less('app.less');
});
