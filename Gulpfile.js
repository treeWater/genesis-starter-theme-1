// Include Gulp.
var gulp        = require( 'gulp' ),
    requireDir 	= require('require-dir');

var load 	= requireDir('./tasks', { recurse: true } );

// Default Tasks.
gulp.task( 'default' , [ 'watch' ] );
gulp.task( 'serve' , [ 'server', 'watch' ] );
gulp.task( 'build' , [ 'scripts', 'images', 'styles', 'i18n' ] )
