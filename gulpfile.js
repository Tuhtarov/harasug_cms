const gulp = require('gulp')
const del = require('del')
const concat = require('gulp-concat')
const autoprefixer = require('gulp-autoprefixer')
const minifyCss = require('gulp-clean-css')
const sourceMaps = require('gulp-sourcemaps')
const gcmq = require('gulp-group-css-media-queries');

function clean() {
    return del('./public/dist/css')
}

function css() {
    // return gulp.src('./resources/css/**/*.css')
    return gulp.src('./resources/css/*.css')
        .pipe(sourceMaps.init())
        .pipe(concat('app.css'))
        .pipe(autoprefixer())
        .pipe(gcmq())
        .pipe(minifyCss({
            level: 2
        }))
        .pipe(sourceMaps.write('.'))
        .pipe(gulp.dest('./public/dist/css'))
}

function watch() {
    return gulp.watch('./resources/css/**/*.css', css)
}

let build = gulp.parallel(css)
let dev = gulp.series(clean, css, watch)

//режим сборки с удалением старых файлов
gulp.task('cleanBuild', gulp.series(clean, build))

//обычный режим сборки
gulp.task('build', gulp.parallel(css))

//режим разработки (прослушка изменений)
gulp.task('dev', dev)
