"use strict";

// === CSS (PostCSS + Autoprefixer) ===
const postcss = require("gulp-postcss");
const autoprefixer = require("autoprefixer");

// === Gulp e plugins ===
const gulp = require("gulp");
const sass = require("gulp-dart-sass"); // COMPILADOR SASS CORRETO PARA GULP
const sourcemaps = require("gulp-sourcemaps");
const cleanCSS = require("gulp-clean-css");
const rename = require("gulp-rename");
const concat = require("gulp-concat");
const uglify = require("gulp-uglify");
const babel = require("gulp-babel");

// === Pastas ===
const folder = {
    src: "src/",
    dist: "dist/",
    dist_assets: "dist/assets/"
};

// =============================
//       COMPILAR SASS
// =============================
function css() {
    return gulp
        .src([folder.src + "scss/*.scss"])
        .pipe(sourcemaps.init())
        .pipe(
            sass({
                silenceDeprecations: ["legacy-js-api"] // <<< AQUI FICA A OPÇÃO
            }).on("error", sass.logError)
        )
        .pipe(postcss([autoprefixer({ overrideBrowserslist: ["> 1%"] })]))
        .pipe(gulp.dest(folder.dist_assets + "css/"))
        .pipe(cleanCSS())
        .pipe(rename({ suffix: ".min" }))
        .pipe(sourcemaps.write("./"))
        .pipe(gulp.dest(folder.dist_assets + "css/"));
}

// =============================
//       JAVASCRIPT PAGES
// =============================
function jsPages() {
    return gulp
        .src(folder.src + "js/pages/*.js")
        .pipe(
            babel({
                presets: ["@babel/env"],
                compact: false
            })
        )
        .on("error", function (error) {
            console.error(error.toString(), "\n\n", error.codeFrame);
            this.emit("end");
        })
        .pipe(uglify())
        .on("error", function (err) {
            console.log(err.toString());
        })
        .pipe(gulp.dest(folder.dist_assets + "js/pages"));
}

// =============================
//       JAVASCRIPT THEME
// =============================
function jsTheme() {
    const out = folder.dist_assets + "js/";

    return gulp
        .src([folder.src + "js/app.js"])
        .pipe(sourcemaps.init())
        .pipe(concat("app.js"))
        .pipe(gulp.dest(out))
        .pipe(rename({ suffix: ".min" }))
        .pipe(uglify())
        .on("error", function (err) {
            console.log(err.toString());
        })
        .pipe(sourcemaps.write("./"))
        .pipe(gulp.dest(out));
}

// =============================
//           WATCH
// =============================
function watchFiles() {
    gulp.watch(folder.src + "scss/**/*", gulp.series(css));
    gulp.watch(folder.src + "js/**/*", gulp.series(jsPages, jsTheme));
}

// =============================
//          TASKS
// =============================
gulp.task("watch", gulp.parallel(watchFiles));

gulp.task(
    "default",
    gulp.series(css, jsPages, jsTheme, "watch", (done) => done())
);
