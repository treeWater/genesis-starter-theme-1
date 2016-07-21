<?php
/**
 * Theme functions File, responsible for looping through and loading theme functionality from includes.
 *
 * @author  Craig Simpson
 * @package Project\Theme
 * @since   1.0.0
 */

namespace Project\Theme;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'genesis_setup', __NAMESPACE__ . '\child_theme_setup', 15 );
/**
 * After Genesis has finished loading, load up child theme files.
 *
 * @since 1.0.0
 */
function child_theme_setup() {

	$child_theme = wp_get_theme();

	define( 'CHILD_THEME_NAME', $child_theme->get( 'Name' ) );
	define( 'CHILD_THEME_URL', $child_theme->get( 'ThemURI' ) );
	define( 'CHILD_THEME_VERSION', $child_theme->get( 'Version' ) );
	define( 'CHILD_THEME_DIRECTORY', get_stylesheet_directory_uri() );

	load_child_theme_textdomain( 'genesis-starter-theme', get_stylesheet_directory() . '/assets/languages' );

	/**
	 * Configure theme support.
	 *
	 * @since 1.0.0
	 */
	require_once 'functions/add-theme-support.php';

	/**
	 * Enqueue assets.
	 *
	 * @since 1.0.0
	 */
	require_once 'functions/enqueue-assets.php';

	/**
	 * Header customisations.
	 *
	 * @since 1.0.0
	 */
	require_once 'functions/header.php';

	/**
	 * Shame. Code not yet sorted.
	 *
	 * @since 1.0.0
	 */
	require_once 'functions/shame.php';

}
