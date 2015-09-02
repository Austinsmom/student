var gulp = require('gulp'),
    sass = require('gulp-sass'),
    minify = require('gulp-minify-css'),
    concat = require('gulp-concat'),
    rename = require('gulp-rename');

var path = {
    'resources': {
        'sass': './resources/assets/sass'
    },
    'public': {
        'css': './public/assets/css'
    },
    'sass': './resources/assets/sass/**/*.scss'
};

gulp.task('sass', function () {

    return gulp.src(path.resources.sass + '/app.scss')
        .pipe(sass({
            onError: console.error.bind(console, 'SASS ERROR')
        }))
        .pipe(minify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(path.public.css))

});

// task lancé si une modification est faite dans les fichiers scss des resources/assets/sass
gulp.task('watch', function () {
    gulp.watch(path.sass, ['sass'])
});

gulp.task('default', ['watch']);