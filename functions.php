<?php
/**
 * Theme functions File, responsible for looping through and loading theme functionality from includes.
 *
 * @author	Craig Simpson
 * @package genesis-starter-theme
 * @since 	1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'genesis_setup', 'genesis_starter_theme_setup', 14 );
/**
 * After Genesis has finished loading, load up child theme files.
 *
 * @since 1.0.0
 * @throws \Exception If file can't be found.
 */
function genesis_starter_theme_setup() {

	define( 'CHILD_THEME_NAME', 'Genesis Starter Theme' );
	define( 'CHILD_THEME_URL', 'http://github.com/craigsimps/genesis-starter-theme' );
	define( 'CHILD_THEME_VIEWS', get_stylesheet_directory() . '/templates/views/' );

	$includes = [
		'includes/add-theme-support.php',
		'includes/enqueue-assets.php',
		'includes/theme/header.php',
		'includes/shame.php',
	];

	array_walk( $includes, function ( $include ) {
		if ( ! $include_path = locate_template( $include ) ) {
			throw new \Exception( sprintf( __( 'Error locating %s for inclusion', 'genesis-starter-theme' ), $include ) );
		}

		require_once $include_path;
	} );

}
