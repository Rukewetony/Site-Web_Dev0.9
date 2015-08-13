// Variables
var gulp       = require('gulp'),
	jade       = require('jade'),
	gulpJade   = require('gulp-jade'),
	haml       = require('gulp-haml'),
	sourcemaps = require('gulp-sourcemaps'),
	minifyCss  = require('gulp-minify-css'),
	rename     = require('gulp-rename'),
	compass    = require('gulp-compass'),
	zip        = require('gulp-zip'),
	msg        = require('gulp-msg'),
	notify     = require('gulp-notify'),
	jadephp    = require('jade-php'),
	plumber    = require('gulp-plumber'),
	path       = require('path')

// Icone pour les notifications Gulp
var notifyInfo = {
	title: 'Gulp',
	icon: path.join(__dirname, 'gulp.png')
};

// Paramétre pour la configuration de Plumber
var plumberErrorHandler = { errorHandler: notify.onError({
		title: notifyInfo.title,
		icon: notifyInfo.icon,
		message: "Error: <%= error.message %>"
	})
};

// Compilation du SCSS en CSS
gulp.task('compass_scss', function() {
	return gulp.src('webroot/scss/*.scss')
		.pipe(compass({
			css: 'webroot/css',
			sass: 'webroot/scss',
			image: 'webroot/img'}))
		.pipe(rename({ suffix: '.min'}))
    	.pipe(minifyCss())
		.pipe(notify({ message: 'Tâche SCSS & MinifyCss  faite.' }))
		.pipe(gulp.dest('webroot/css'))
});

// Minification du css en .min.css
gulp.task('minify-css', function() {
  return gulp.src('webroot/css/*.css')
    .pipe(sourcemaps.init())
    .pipe(minifyCss())
    .pipe(gulp.dest('webroot/css/'));
});

// Tâche de distribution
gulp.task('dist', ['compass', 'haml', 'jade'],function(){
});

// Tâche par défault
gulp.task('default', ['dist'], function(){
	gulp.src('*')
		.pipe(zip('archive.zip'))
		.pipe(gulp.dest('.'));
});

// Tâche qui permet de lancer toute les tâches
gulp.task('watch', function(){
	gulp.watch('webroot/scss/**/*.scss', ['compass_scss']);
	gulp.watch('haml/*.haml'          , ['haml']);
	gulp.watch('jade/**/*.jade'       , ['jade']);
	gulp.watch('webroot/css/*.css'     , ['minify-css']);
})
