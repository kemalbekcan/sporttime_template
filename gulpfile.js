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

function htmlTask() {
  return src("src/*.html").pipe(dest("public"));
}

// Sass Task
function scssTask() {
  return src("src/scss/app.scss", { sourcemaps: false })
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
    ["src/*.html", "src/**/*.scss", "src/**/*.js"],
    series(htmlTask, scssTask, jsTask, imgTask, browsersyncReload)
  );
}

// Default Gulp Task
exports.default = series(
  htmlTask,
  scssTask,
  jsTask,
  imgTask,
  browsersyncServe,
  watchTask
);
