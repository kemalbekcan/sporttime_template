const { src, dest, watch, series } = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const postcss = require("gulp-postcss");
const cssnano = require("cssnano");
const terser = require("gulp-terser");
const litePreset = require("cssnano-preset-lite");
const autoprefixer = require("autoprefixer");
const preset = litePreset({ discardComments: false });
const browsersync = require("browser-sync").create();
const imagemin = require("gulp-imagemin");

function phpTask() {
  return src("src/*.php").pipe(dest("public"));
}

function partialsMoveTask() {
  return src("src/partials/*.php").pipe(dest("public/partials"));
}

function viewsMoveTask() {
  return src("src/views/*.php").pipe(dest("public/views"));
}

function adminMoveTask() {
  return src("src/views/admin/*.php").pipe(dest("public/views/admin"));
}

// Sass Task
function scssTask() {
  return src("src/scss/app.scss", { sourcemaps: false })
    .pipe(sass())
    .pipe(postcss([cssnano({ preset, plugins: [autoprefixer] })]))
    .pipe(dest("public/css", { sourcemaps: "." }));
}

// Sass Task
function adminScssTask() {
  return src("src/scss/admin.scss", { sourcemaps: false })
    .pipe(sass())
    .pipe(postcss([cssnano({ preset, plugins: [autoprefixer] })]))
    .pipe(dest("public/css", { sourcemaps: "." }));
}

// JavaScript Task
function jsTask() {
  return src("src/js/script.js", { sourcemaps: false })
    .pipe(terser())
    .pipe(dest("public/js", { sourcemaps: "." }));
}

// JavaScript Task
function imgTask() {
  return src("src/img/*{jpg,png,gif,svg}").pipe(dest("public/img"));
    // .pipe(
    //   imagemin([
    //     imagemin.gifsicle({ interlaced: true }),
    //     imagemin.mozjpeg({ quality: 75, progressive: true }),
    //     imagemin.optipng({ optimizationLevel: 5 }),
    //     imagemin.svgo({
    //       plugins: [{ removeViewBox: true }, { cleanupIDs: false }],
    //     }),
    //   ])
    // )
    
}

function browsersyncServe(cb) {
  browsersync.init({
    server: {
      baseDir: "./public",
    },
  });
  cb();
}

function browsersyncReload(cb) {
  browsersync.reload();
  cb();
}

// Watch Task
function watchTask() {
  watch(
    [
      "src/*.php",
      "src/views/*.php",
      "src/partials/*.php",
      "src/views/admin/*.php",
      "src/**/*.scss",
      "src/**/*.js",
    ],
    series(
      phpTask,
      partialsMoveTask,
      viewsMoveTask,
      adminMoveTask,
      scssTask,
      adminScssTask,
      jsTask,
      imgTask,
      browsersyncReload
    )
  );
}

// Default Gulp Task
exports.default = series(
  phpTask,
  partialsMoveTask,
  viewsMoveTask,
  scssTask,
  jsTask,
  imgTask,
  browsersyncServe,
  watchTask
);
