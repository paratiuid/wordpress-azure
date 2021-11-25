const {src, dest, watch, series, parallel} = require('gulp');

const sass 			= require('gulp-sass')(require('node-sass'));
const autoprefixer	= require('gulp-autoprefixer');
const cleanCSS 		= require('gulp-clean-css');

const sassSources = {
    orig: './src/scss/*.scss',
    dest: '.',
    watch: [
        './src/scss/*.scss',
        './src/scss/**/*.scss',
        '../../../portal/resources/css/*.scss',
        '../../../portal/resources/css/**/*.scss'
    ]
}, jsPlugins = {
    tinySlider: {
        orig: [
            './node_modules/swiper/swiper-bundle.min.js',
            './node_modules/swiper/swiper-bundle.css'
        ],
        dest: './plugins/swiper'
    }
}

function copyJsPlugins(done) {
	Object.keys(jsPlugins).forEach(val => {
		return src(jsPlugins[val].orig)
			.pipe(dest(jsPlugins[val].dest));
	});
	done();
}

function processCSS(done) {
    return src(sassSources.orig)
            // .pipe(sourceMaps.init())
            .pipe(sass({
                includePaths: [
                    "node_modules",
                    "../../../portal/resources/css",
                    "../../../portal/node_modules"
                ]})
            )
            .pipe(autoprefixer({
                    overrideBrowserslist: ['last 2 versions'],
                    cascade: false
                })
            )
            // .pipe(sourceMaps.write("."))
            .pipe(dest(sassSources.dest));
}

// function processImages() {
// 	return src(imgSources.watchFolder)
//             // .pipe(imagemin(
//             //     [
//             //         imagemin.mozjpeg({quality: 85, progressive: true}),
//             //         imagemin.optipng({optimizationLevel: 5}),
//             //     ])
//             // )
//             .pipe(dest(imgSources.output));
// }

function watchStylesProcess() {
	return watch(sassSources.watch, processCSS);
}

exports.default = series(
	processCSS,
	parallel(
        watchStylesProcess,
	)
);
exports.copyPlugins = copyJsPlugins;