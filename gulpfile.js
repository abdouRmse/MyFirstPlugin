var gulp = require('gulp');
var concat = require('gulp-concat');
var sass = require('gulp-sass')(require('sass'));
var  livereload = require('gulp-livereload');

// sass task
gulp.task('sass', function (){

    gulp.src('assets/sass/*.scss')
        .pipe(concat("style.scss"))
        .pipe(sass({outputStyle: 'compressed'}))
        .pipe(gulp.dest('dist/assets/css'))
        .pipe(livereload());

});

gulp.task('html', function () {

  console.log('i am in html');
  return gulp.src('index.html')
    .pipe(gulp.dest('dist'))
    .pipe(livereload());
});

gulp.task('watch', function(){
  require('./server.js');
  livereload.listen();
  gulp.watch('index.html', gulp.series('html'));
  gulp.watch('assets/sass/*.scss', gulp.series('sass'));
});

gulp.task('default', gulp.series('watch'));


