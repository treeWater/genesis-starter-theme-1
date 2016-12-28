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

add_action( 'genesis_setup', __NAMESPACE__ . '\child_theme_setup', 10 );
/**
 * After Genesis has finished loading, load up child theme files.
 *
 * @since 1.0.0
 */
function child_theme_setup() {

	/**
	 * Initialize Child Theme Constants.
	 *
	 * @since 1.0.0
	 */
	$child_theme = wp_get_theme();

	define( 'CHILD_THEME_NAME', $child_theme->get( 'Name' ) );
	define( 'CHILD_THEME_URL', $child_theme->get( 'ThemeURI' ) );
	define( 'CHILD_THEME_VERSION', $child_theme->get( 'Version' ) );

	define( 'CHILD_THEME_DIR', get_stylesheet_directory() );
	define( 'CHILD_THEME_URI', get_stylesheet_directory_uri() );

	/**
	 * Set localization.
	 *
	 * @since 1.0.0
	 */
	load_child_theme_textdomain( 'genesis-starter-theme', get_stylesheet_directory() . '/languages' );

	/**
	 * Load child theme setup class.
	 *
	 * @since 1.0.0
	 */
	include_once 'lib/classes/class-setup.php';

	/**
	 * Load theme config using our Setup class.
	 *
	 * @uses Setup
	 *
	 * @since 1.0.0
	 */
	new Setup( include_once 'lib/config.php' );

	/**
	 * Load child theme customizations.
	 *
	 * Loads our custom functions, assets and theme customizations.
	 *
	 * @since 1.0.0
	 */
	include_once 'lib/autoload.php';

}
