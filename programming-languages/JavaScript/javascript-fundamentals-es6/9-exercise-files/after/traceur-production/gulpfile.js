var gulp = require('gulp');
var traceur = require('gulp-traceur');

gulp.task('traceur', function(){
    return gulp.src('es6/**/*.js')
               .pipe(traceur({experimental:true, blockBinding: true}))
               .pipe(gulp.dest('es5'));
});

gulp.task('default', function() {
    gulp.run('traceur');
});