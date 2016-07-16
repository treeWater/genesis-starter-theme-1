<?php
/**
 * Theme functions File, responsible for looping through and loading theme functionality from includes.
 *
 * @author  Craig Simpson
 * @package Genesis_Starter_Theme
 * @since   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'genesis_setup', 'genesis_starter_theme_setup', 15 );
/**
 * After Genesis has finished loading, load up child theme files.
 *
 * @since 1.0.0
 */
function genesis_starter_theme_setup() {

	$child_theme = wp_get_theme();

	define( 'CHILD_THEME_NAME', $child_theme->get( 'Name' ) );
	define( 'CHILD_THEME_URL', $child_theme->get( 'ThemURI' ) );
	define( 'CHILD_THEME_VERSION', $child_theme->get( 'Version' ) );
	define( 'CHILD_THEME_TEXT_DOMAIN', $child_theme->get( 'Text Domain' ) );

	load_child_theme_textdomain( CHILD_THEME_TEXT_DOMAIN, get_stylesheet_directory() . '/languages' );

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
