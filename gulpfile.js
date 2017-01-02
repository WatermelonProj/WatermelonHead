//const elixir = require('laravel-elixir');
var gulp = require('gulp');
var $    = require('gulp-load-plugins')();
var Promise = require('es6-promise').Promise;

var sassPaths = [
  'public_html/bower_components/foundation-sites/scss',
  'public_html/bower_components/motion-ui/src'
];

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

/*elixir(mix => {
    mix.sass('app.scss')
       .webpack('app.js');
});*/

gulp.task('sass', function() {
  return gulp.src('public_html/scss/app.scss')
    .pipe($.sass({
      includePaths: sassPaths
    })
      .on('error', $.sass.logError))
    .pipe($.autoprefixer({
      browsers: ['last 2 versions', 'ie >= 9']
    }))
    .pipe(gulp.dest('public_html/css/'));
});

gulp.task('default', ['sass'], function() {
  gulp.watch(['public_html/scss/*'], ['sass']);
});
