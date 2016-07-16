<?php
/**
 * Enqueue Assets.
 *
 * @author  Craig Simpson
 * @package Genesis_Starter_Theme
 * @since   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'wp_enqueue_scripts', 'gst_load_styles' );
/**
 * Enqueue web fonts or additional stylesheets
 *
 * @since 1.0
 */
function gst_load_styles() {
	wp_enqueue_style( 'fonts', '//fonts.googleapis.com/css?family=Lato:300,400,700' );
}

add_action( 'wp_enqueue_scripts', 'gst_load_scripts' );
/**
 * Enqueue scripts in the footer
 *
 * @since 1.0
 */
function gst_load_scripts() {

	wp_dequeue_script( 'comment-reply' );
	wp_enqueue_script( 'gst-theme', get_stylesheet_directory_uri() . '/assets/js/theme.js', [ 'jquery' ], CHILD_THEME_VERSION, true );

}

add_filter( 'genesis_pre_load_favicon', 'gst_pre_load_favicon' );
/**
 * Simple favicon override to specify your favicon's location.
 *
 * @since 1.0
 */
function gst_pre_load_favicon() {

	return get_stylesheet_directory_uri() . '/assets/images/favicon.ico';

}
