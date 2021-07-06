const gulp = require('gulp');
const concat = require('gulp-concat');
const uglify = require('gulp-uglifyjs');
const autoprefixer = require('gulp-autoprefixer');
const image = require('gulp-image');
const cleanCSS = require('gulp-clean-css');
const sourcemaps = require('gulp-sourcemaps');
const gcmq = require('gulp-group-css-media-queries');
const preproc = require('gulp-sass');

const config = {
    src: './public',
    css: {
        src: '/precss/**/*.scss',
        dest: '/css'
    },
    js: {
        src: '/js/**/*.js'
    }
};

gulp.task('common-js', function () {
    return gulp.src([ // Берем все необходимые файлы
        './public/js/common.js',
    ])
        .pipe(concat('common.min.js'))
        .pipe(uglify()) // Сжимаем JS файл
        .pipe(gulp.dest('./public/js')); // Выгружаем в папку app/js
});

gulp.task('js', ['common-js'], function () {
    return gulp.src([ // Берем все необходимые библиотеки
				'./public/libs/jquery/jquery.min.js', // Берем jQuery
				'./public/libs/mmenu/jquery.mmenu.js',
				'./public/libs/mask/mask.min.js',
                './public/libs/slick/slick.js',
				'./public/libs/fancybox/fancybox.js',
				'./public/js/common.min.js' // Всегда в конце
    ])
        .pipe(concat('libs.min.js')) // Собираем их в кучу в новом файле libs.min.js
        .pipe(uglify()) // Сжимаем JS файл
        .pipe(gulp.dest('./public/js')) // Выгружаем в папку app/js
});

gulp.task('build', function () {
    gulp.src(config.src + config.css.src)
        .pipe(sourcemaps.init())
        .pipe(preproc())
        /*.pipe(gcmq())*/
        .pipe(autoprefixer({
            browsers: ['> 0.1%'],
            cascade: false
        }))
        .pipe(cleanCSS({
            level: 2
        }))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(config.src + config.css.dest))
});

gulp.task('dev', function () {
    gulp.watch(config.src + config.css.src, ['build']);
    gulp.watch(['libs/**/*.js', './public/js/common.js'], ['js']);
});

gulp.task('imagemin', function () {
    gulp.src('./public/img/**/**')
        .pipe(image({
            optipng: ['-i 1', '-strip all', '-fix', '-o7', '-force'],
            pngquant: ['--speed=1', '--force', 256],
            zopflipng: ['-y', '--lossy_8bit', '--lossy_transparent'],
            jpegRecompress: ['--strip', '--quality', 'medium', '--min', 40, '--max', 80],
            mozjpeg: ['-optimize', '-progressive'],
            guetzli: ['--quality', 85],
            gifsicle: ['--optimize'],
            svgo: ['--enable', 'cleanupIDs', '--disable', 'convertColors']
        }))
        .pipe(gulp.dest('./public/dist/img'));
});
