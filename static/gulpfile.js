const gulp = require('gulp');
var sass = require('gulp-sass')(require('sass'));

// Task 1: Converting SASS to CSS
gulp.task('sass', function(){
    return gulp.src('scss/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('css/'));
});

