// Project Configuration
var url         = 'localhost.dev';

// Include Gulp
var gulp        = require( 'gulp' );

// Include Plugins
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
    browserSync = require( 'browser-sync' ).create();

// Set up BrowserSync.
gulp.task( 'initServer' , function() {
    // Initiate browsersync using the local url
    browserSync.init({
        proxy: url
    });

});

// Watch Task.
gulp.task( 'watch' , function() {

    // Set the watch tasks for different file type
    gulp.watch( 'assets/scss/**/*.scss' , ['styles'] );
    gulp.watch( 'assets/js/**/*.js' , ['scripts'] );
    gulp.watch( 'assets/images/**/*' , ['images'] );
    gulp.watch( '**/*.php' ).on( 'change' , browserSync.reload );

});

// Styles
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

// Scripts
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

// Images
gulp.task( 'images' , function() {
    return gulp.src( 'assets/images/**/*' )
        .pipe( cache( imagemin( { optimizationLevel: 3, progressive: true, interlaced: true } ) ) )
        .pipe( gulp.dest( './images' ) )
        .pipe( notify( { message: 'Images task complete.' } ) )
        .pipe( browserSync.stream() );
} );

// Default Tasks
gulp.task( 'default' , ['watch'] );
gulp.task( 'serve' , ['initServer', 'watch'] );
