// Initialize modules
// Importing specific gulp API functions lets us write them below as series() instead of gulp.series()
const { src, dest, watch, series, parallel } = require('gulp');
// Importing all the Gulp-related packages we want to use
const sourcemaps = require('gulp-sourcemaps');
const sass = require('gulp-sass')(require('sass'));
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cleancss = require('gulp-clean-css');
const cssnano = require('cssnano');
var replace = require('gulp-replace');

// File paths
const files = {
    scssPath: 'assets/scss/**/*.scss',
    jsPath: 'assets/js/**/*.js',
    customJSPath: 'js/src/*.js',
    customCSSPath: 'assets/css/src/*.css'
}

// Sass task: compiles the style.scss file into style.css
function scssTask(){
    return src(files.scssPath)
        .pipe(sourcemaps.init()) // initialize sourcemaps first
        .pipe(sass()) // compile SCSS to CSS
        .pipe(postcss([ autoprefixer(), cssnano() ])) // PostCSS plugins
        .pipe(cleancss())
        // .pipe(sourcemaps.write('.')) // write sourcemaps file in current directory
        .pipe(dest('./assets/css/')); // put final CSS in dist folder
}

// Custom CSS task: minify CSS files from 'assets/css/src' to ''assets/css 
function customCssTask(){
    return src(files.customCSSPath)
        .pipe(postcss([ autoprefixer(), cssnano() ])) // PostCSS plugins
        .pipe(dest('./assets/css/')
    ); // put final CSS in dist folder
}



function debugPrint(content) {
    console.log(content);
}

// JS task: concatenates and uglifies JS files to script.js (This is a temp of concat Js. Use it when you need)
function jsTask(){
    return src([
        files.jsPath,
        ])
        .pipe(concat('general-concat.js'))
        .pipe(uglify())
        .pipe(dest('assets/dist/js'));
}

// Custom JS Task: minify individually each js file from 'js/src' path to 'js'

function customJsTask() {
    return src(files.jsPath)
    .pipe(uglify())
    .pipe(dest('assets/dist/js'))
}

// Watch task: watch SCSS and JS files for changes
// If any change, run scss and js tasks simultaneously
function watchTask(){
    watch([files.scssPath, files.jsPath, files.customCSSPath],
        //{interval: 1000, usePolling: true}, //Makes docker work
        series(
            parallel(scssTask, jsTask, customCssTask, customJsTask)
        )
    );
}


// Export the default Gulp task so it can be run
// Runs the scss and js tasks simultaneously
// then runs cacheBust, then watch task
exports.default = series(
    parallel(scssTask, jsTask, customCssTask),
    watchTask
);