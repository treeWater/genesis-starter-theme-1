<?php
/**
 * Enqueue Assets.
 *
 * @author  Craig Simpson
 * @package Project\Theme
 * @since   1.0.0
 */

namespace Project\Theme;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\load_scripts_styles' );
/**
 * Enqueue scripts and styles.
 *
 * @since 1.0
 */
function load_scripts_styles() {
	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	wp_enqueue_style( 'fonts', '//fonts.googleapis.com/css?family=Lato:300,400,700' );
	wp_enqueue_style( 'dashicons' );

	wp_enqueue_script( 'gst-theme', CHILD_THEME_URI . '/assets/js/theme' . $suffix . '.js', [ 'jquery' ], CHILD_THEME_VERSION, true );
}

add_filter( 'genesis_pre_load_favicon', __NAMESPACE__ . '\pre_load_favicon' );
/**
 * Simple favicon override to specify your favicon's location.
 *
 * @since 1.0
 */
function pre_load_favicon() {

	return CHILD_THEME_URI . '/assets/images/favicon.ico';

}
