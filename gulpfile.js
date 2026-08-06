const { src, dest, parallel, series, watch  } = require("gulp");
const $ = require('gulp-load-plugins')();
const browserSync = require('browser-sync').create();
const autoPrefixer = require('gulp-autoprefixer');
const open = require('open');                                   // 打开页面

const js = function() {
	return src('src/js/**/*.js')
		// .pipe($.concat('common.js'))        // 合并文件
		.pipe($.babel({
			presets: ['@babel/env']     // es6转换为es5
		}))
		.pipe(dest('dist/js/'))         // 临时输出到本地
		.pipe($.uglify())                 // 压缩js文件
		.pipe($.rename({suffix: '.min'})) // 重命名
		.pipe(dest('dist/js/'))         // 最终输出
		// .pipe($.connect.reload())
};

const less_fuc = function () {
	return src('src/less/main.less')
		.pipe($.less())                         // 编译less 文件为css
		.pipe(dest('src/css/less'))             // 临时输出到css 文件内
		// .pipe($.connect.reload())
};

const css = function () {
	// return src('src/css/**/*.css')
	return src('src/css/less/main.css')
		// .pipe($.concat('index.css'))
		.pipe(autoPrefixer())
		.pipe(dest('dist/css/'))
		.pipe($.cleanCss())                     // 压缩css文件
		.pipe($.rename({suffix: '.min'}))
		.pipe(dest('dist/css/'))
		.pipe(browserSync.stream())
};

const server = function() {
	browserSync.init({
		port: 3000,
		open: true,
		proxy: 'http://rapiddirect.mmler.cn/'
	});
}

// 打开页面地址
const openUrl = function () {
	return open(`http://localhost:3000`)
}

// 监听文件更改后 重新 压缩或者编译文件
const watch_fun = function () {
	return (
		watch(['src/**/*.js']).on('change', series(js, browserSync.reload)),
		watch(['src/**/*.less']).on('change', series(less_fuc, css)),
		watch(['*.php', 'templates/*.php']).on('change', parallel(browserSync.reload))
	)
}

exports.js = js
exports.less = less_fuc
exports.css = css

exports.default =
	series(
		parallel(  // series: 同步 ； parallel异步
			js,
			series(less_fuc, css)
			// html
		),
		// openUrl,
		parallel(
			watch_fun,
			server
		)
	)
