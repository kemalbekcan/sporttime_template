const { src, dest, watch, series } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const cssnano = require('cssnano');
const terser = require('gulp-terser');
const browsersync = require('browser-sync').create();

function htmlTask() {
  return src('src/*.html')
    .pipe(dest('public'));
}

// Sass Task
function scssTask() {
  return src('src/scss/app.scss', { sourcemaps: true })
    .pipe(sass())
    .pipe(postcss([cssnano()]))
    .pipe(dest('public/css', { sourcemaps: '.' }));
}

// JavaScript Task
function jsTask() {
  return src('src/js/script.js', { sourcemaps: true })
    .pipe(terser())
    .pipe(dest('public/js', { sourcemaps: '.' }));
}

function browsersyncServe(cb) {
  browsersync.init({
    server: {
      baseDir: './public'
    }
  });
  cb();
}

function browsersyncReload(cb) {
  browsersync.reload();
  cb();
}

// Watch Task
function watchTask(){
  watch('*.html', browsersyncReload);
  watch(['src/**/*.scss', 'src/**/*.js'], series(scssTask, jsTask, browsersyncReload));
}

// Default Gulp Task
exports.default = series(
  htmlTask,
  scssTask,
  jsTask,
  browsersyncServe,
  watchTask
);

