/******************************************************
|  Required Gulp Plugins
******************************************************/
var gulp		=	require('gulp');
var sass		=	require('gulp-ruby-sass');
var coffee		=	require('gulp-coffee');
var gutil		=	require('gulp-util');
var autoprefix	=	require('gulp-autoprefixer');
var notify		=	require('gulp-notify');
var minifyCSS	=	require('gulp-minify-css');
var tar			=	require('gulp-tar');
var gzip		=	require('gulp-gzip');
var imageOptim	=	require('gulp-imagemin');
var jsmin		=	require('gulp-jsmin');
var rename		=	require('gulp-rename');
var changed		=	require('gulp-changed');
var concat		=	require('gulp-concat');
var uglify		=	require('gulp-uglify');
var exec		=	require('child_process').exec;
var sys			=	require('sys');

/******************************************************
|  Directory Locations
******************************************************/
var sassDir		=	"app/assets/sass";
var coffeeDir	=	"app/assets/coffee";
var cssDir		=	"public/css";
var jsDir		=	"public/js";
var assetsDir	=	"public/assets";
var imgDir		=	"public/img";
var optimImgDir	=	"public/images";

/******************************************************
|  Files to Include in GZipped Folder
******************************************************/
var appFiles = [
					'app/**/*',
					'public/**/*',
					'bootstrap/**/*',
					'.env.php',
					'artisan',
					'composer.*',
					'server.php',
					'phpunit.xml',
					'setup',
					'artisan'
				];

/******************************************************
|  GZip File Name Generation to Append Date And Time
******************************************************/
var currentdate	=	new Date();
var zipFileName	=	"Project" + currentdate.getDate() + "-" + (currentdate.getMonth()+1)  +
					"-" + currentdate.getFullYear() + "_" + currentdate.getHours() +
					currentdate.getMinutes() + currentdate.getSeconds();

/******************************************************
|  Files to Include in scripts.js
******************************************************/
var js2Inc	=	[
					assetsDir + '/jquery/jquery-1.10.2.min.js',
					jsDir + '/scripts.js'
				];

/******************************************************
|  Files to Include in styles.css
******************************************************/
var siteCss	=	[
					cssDir + '/styles.css'
				];



/******************************************************
|  Gulp Tasks
******************************************************/
 
// JS concat, strip debugging and minify
gulp.task('concatscripts', function() {
	return gulp.src(js2Inc)
				.pipe(concat('scripts.js'))
				.pipe(uglify())
				.pipe(gulp.dest(jsDir))
				.pipe(notify('JS File(s) Have Been Minified Successfully!'));

});

gulp.task('concatstyles', function() {
	return gulp.src(siteCss)
				.pipe(changed(cssDir + 'min'))
				.pipe(concat('styles.css'))
				.pipe(minifyCSS(opts))
				.pipe(gulp.dest(cssDir + 'min'))
				.pipe(notify('Site Related CSS File(s) Have Been Minified Successfully!'));
});

gulp.task('fonts', function() {
	return gulp.src('public/fonts/fonts.css')
				.pipe(minifyCSS(opts))
				.pipe(gulp.dest(cssDir));
});


gulp.task('minify-js', function () {
	return gulp.src(jsDir + '/**/*.js')
				.pipe(changed(jsDir + 'min'))
				.pipe(jsmin())
				.pipe(gulp.dest(jsDir + 'min'))
				.pipe(notify('JS File(s) Have Been Minified Successfully!'));
});

gulp.task('minify-css', function() {
	return gulp.src(cssDir + '/**/*.css')
				.pipe(changed(cssDir + 'min'))
				.pipe(minifyCSS(opts))
				.pipe(gulp.dest(cssDir + 'min'))
				.pipe(notify('CSS File(s) Have Been Minified Successfully!'));
});

gulp.task('optim-img', function () {
    return gulp.src(imgDir + '/**/*')
				.pipe(changed(optimImgDir))
				.pipe(imageOptim())
				.pipe(gulp.dest(optimImgDir))
				.pipe(notify('Images Have Been Minified Successfully! (Loc: public/images)'));
});

gulp.task('sass2css', function() {
	return gulp.src(sassDir + '/**/*.sass')
				.pipe(sass({style : 'compressed'}).on('error', gutil.log))
				.pipe(autoprefix('last 10 version'))
				.pipe(gulp.dest(cssDir))
				.pipe(notify('SASS Compiled to CSS, Prefixed and Minified!'));
});

gulp.task('coffee2js', function() {
	return gulp.src(coffeeDir + '/**/*.coffee')
				.pipe(coffee().on('error', gutil.log))
				.pipe(gulp.dest(jsDir))
				.pipe(notify('CoffeeScript Compiled to JS!'));
});

gulp.task('gzipit', function () {
    return gulp.src(appFiles)
				.pipe(tar(zipFileName + '.tar'))
				.pipe(gzip())
				.pipe(gulp.dest('compressed'))
				.pipe(notify('The Project Has Been Gzipped!'));
});

gulp.task('phpunit', function() {
	exec('phpunit', function(error,stdout) {
		sys.puts(stdout);
	});
});

gulp.task('phpspec', function() {
	exec('phpspec', function(error,stdout) {
		sys.puts(stdout);
	});
});


/******************************************************
|  Watch Directories For Changes If Any Run Gulp Tasks
******************************************************/

gulp.task('watch', function() {
	// gulp.watch(coffeeDir + '/**/*.coffee',['coffee2js'] );
	// gulp.watch(sassDir + '/**/*.sass', ['sass2css']);
	// gulp.watch('app/**/*.php', ['phpunit']);
	// gulp.watch(cssDir + '/**/*.css', ['minify-css']);
	// gulp.watch(imgDir + '/**/*', ['optim-img']);
	// gulp.watch(jsDir + '/**/*.js', ['minify-js']);

});

/******************************************************
|  Default Gulp Tasks
******************************************************/

gulp.task('default', ['sass2css', 'coffee2js', 'phpunit', 'minify-css', 'watch']);
