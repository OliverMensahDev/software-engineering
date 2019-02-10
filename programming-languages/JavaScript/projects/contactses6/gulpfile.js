var gulp = require('gulp');
var babel = require('gulp-babel');

gulp.task('build', function(){
  return gulp.src('src/**/*.js')
    .pipe(babel())
    .pipe(gulp.dest('build/js'));
});

gulp.task('default', ['build','watch']);

gulp.task('watch', function(){
  gulp.watch('src/**/*.js', ['build']);
});
