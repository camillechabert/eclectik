const gulp = require('gulp');
const browserSync = require('browser-sync').create();
const inject = require('gulp-inject');
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');

const paths = {
    php : 'app/**/*.php',
    phpFront : 'app/viewsUser/*.php',
    phpAdmin : 'app/viewsAdmin/*.php',
    cssAdmin : 'app/assets/css/admin/',
    cssFront : 'app/assets/css/front/',
    sassAdmin : 'app/assets/css/admin/sass/*.scss',
    sassFront : 'app/assets/css/front/sass/**/*.scss',
    js : 'app/assets/js/*.js',
    front : 'app/viewsUser/',
    admin : 'app/viewsAdmin/'
};

function sassCompile (source, dest) {
    return gulp.src(source)
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer({
            browsers : ['last 3 versions'],
            cascade : true
        }))
        .pipe(gulp.dest(dest))
        .pipe(browserSync.stream());
}

function injectSources (el, sourceJs, sourceCss, dest) {
    var target = gulp.src(el);
    var sources = gulp.src([sourceJs, sourceCss], {read: false});
    return target.pipe(inject(sources))
        .pipe(gulp.dest(dest));
}

//// Compile sass
gulp.task('sass-admin', function() {
   sassCompile(paths.sassAdmin, paths.cssAdmin);
});
gulp.task('sass-front', function() {
    sassCompile(paths.sassFront, paths.cssFront);
});

////materialize
gulp.task('materialize', function() {
    sassCompile('bower_components/materialize-src/sass/materialize.scss', paths.cssAdmin);
});

//// Inject sources
gulp.task('inject-back', function () {
    injectSources(paths.phpAdmin, paths.js, paths.cssAdmin, paths.admin);
});
gulp.task('inject-front', function () {
    injectSources(paths.phpFront, paths.js, paths.cssFront, paths.front);
});

// work in progress
gulp.task('serve', ['sass-admin', 'sass-front', 'materialize', 'inject-back', 'inject-front'], function() {
    browserSync.init({
        proxy: 'www.eclectik.dev'
    });
    gulp.watch(paths.sassFront, ['sass-front']);
    gulp.watch(paths.sassAdmin, ['sass-admin']);
    gulp.watch('app/assets/materialize-src/sass/materialize.scss', ['materialize']);
    gulp.watch(paths.js, ['sass-admin', 'sass-front']).on('change', browserSync.reload);
    gulp.watch(paths.php).on('change', browserSync.reload);
});

gulp.task('default', ['serve']);

// TODO: work finished
// builder tout le projet dans un dossier 'tmp' une fois le dev terminé
// cleaner et minifier le css, le js et je php
// gulp.task('build',[]);