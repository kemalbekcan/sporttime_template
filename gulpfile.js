const { series, src, dest } = require('gulp');
const sass = require('gulp-sass')(require('sass'));

function compileSass() {
    return src('scss/**/*.scss')
      .pipe(sass().on('error', sass.logError))
      .pipe(dest('styles/'));
  }

exports.default = series(compileSass);