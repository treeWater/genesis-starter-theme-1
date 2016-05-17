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

	load_child_theme_textdomain( 'genesis-starter-theme', get_stylesheet_directory() . '/languages' );

	define( 'CHILD_THEME_NAME', 'Genesis Starter Theme' );
	define( 'CHILD_THEME_URL', 'http://github.com/craigsimps/genesis-starter-theme' );
	define( 'CHILD_THEME_VERSION', '1.0.0' );

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
