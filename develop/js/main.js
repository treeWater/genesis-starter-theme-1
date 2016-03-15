var genesis_starter_theme = (function( $ ) {
	'use strict';

	/**
	 * Empty placholder function.
	 *
	 * @since 1.0.0
	 */
	var functionName = function() {
		// Empty function, do all the things.
	},

	/**
	 * Fire events on document ready, and bind other events.
	 *
	 * @since 1.0.0
	 */
	ready = function() {
		functionName();

    // Examples binding to events.
		$( window ).on( 'resize.genesis_starter_theme', functionName );
		$( window ).on( 'scroll.genesis_starter_theme resize.genesis_starter_theme', functionName );
	};

	// Only expose the ready function to the world
	return {
		ready: ready
	};

})( jQuery );

jQuery( genesis_starter_theme.ready );
