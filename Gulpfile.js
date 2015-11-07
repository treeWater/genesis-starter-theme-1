// Project Configuration.
var url         = 'locahost.dev',
    textdomain  = 'genesis-starter-theme';

// Include Gulp.
var gulp        = require( 'gulp' );

// Include Plugins.
var sass        = require( 'gulp-sass' ),
    sourcemaps  = require( 'gulp-sourcemaps' ),
    plumber     = require( 'gulp-plumber' ),
    imagemin    = require( 'gulp-imagemin' ),
    jshint      = require( 'gulp-jshint' ),
    notify      = require( 'gulp-notify' ),
    concat      = require( 'gulp-concat' ),
    cache       = require( 'gulp-cache' ),
    postcss     = require( 'gulp-postcss' ),
    mqpacker    = require( 'css-mqpacker' ),
    pxtorem     = require( 'postcss-pxtorem' ),
    potgen      = require( 'gulp-wp-pot' ),
    sort        = require( 'gulp-sort' ),
    browserSync = require( 'browser-sync' ).create();

// Default Tasks.
gulp.task( 'default' , [ 'watch' ] );
gulp.task( 'serve' , [ 'server', 'watch' ] );
gulp.task( 'build' , [ 'scripts', 'images', 'styles', 'i18n' ] )

// Watch Task.
gulp.task( 'watch' , function() {

    // Set the watch tasks for different file type
    gulp.watch( 'assets/scss/**/*.scss' , ['styles'] );
    gulp.watch( 'assets/js/**/*.js' , ['scripts'] );
    gulp.watch( 'assets/images/**/*' , ['images'] );
    gulp.watch( '**/*.php' ).on( 'change' , browserSync.reload );

});

// Set up BrowserSync.
gulp.task( 'server' , function() {

    // Initiate BrowserSync using the local url (defined above).
    browserSync.init({
        proxy: url
    });

});

// Run `gulp i18n` to generate .pot file using the theme textdomain (defined above).
gulp.task( 'i18n' , function () {

    return gulp.src('**/*.php')
        .pipe( sort() )
        .pipe( potgen( {
            domain: textdomain,
            destFile: textdomain + '.pot'
        } ))
        .pipe(gulp.dest('./languages/'));

});

// Scripts task.
gulp.task( 'scripts' , function() {

    return gulp.src( 'assets/js/**/*.js' )
        .pipe( jshint( '.jshintrc' ) )
        .pipe( jshint.reporter( 'default' ) )
        .pipe( sourcemaps.init() )
            .pipe( concat( 'theme.js' ) )
        .pipe( sourcemaps.write() )
        .pipe( gulp.dest( './js' ) )
        .pipe( notify( { message: 'Javascript tasks run.' } ) )
        .pipe( browserSync.stream() );

} );

// Images task.
gulp.task( 'images' , function() {

    return gulp.src( 'assets/images/**/*' )
        .pipe( cache( imagemin( { optimizationLevel: 3, progressive: true, interlaced: true } ) ) )
        .pipe( gulp.dest( './images' ) )
        .pipe( notify( { message: 'Images task complete.' } ) )
        .pipe( browserSync.stream() );

} );

// Styles tasks.
gulp.task( 'styles' , function() {

    var postProcessors = [
        mqpacker({
            sort: true
        }),
        pxtorem( {
            root_value: 16,
            replace: false,
            media_query: true
        } )
    ];

    return gulp
    .src( 'assets/scss/**/*.scss' )
        .pipe( plumber() )
        .pipe( sourcemaps.init() )
            .pipe( sass({outputStyle: 'compressed'}) )
            .pipe( postcss( postProcessors ) )
        .pipe( sourcemaps.write( '.' ) )
        .pipe( plumber.stop() )
        .pipe( gulp.dest( './' ) )
        .pipe( notify( { message: 'Stylesheet compiled & saved.' } ) )
        .pipe( browserSync.stream() );

});
