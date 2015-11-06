<?php
/**
 * Genesis settings.
 *
 * @author Craig Simpson
 * @package genesis-starter-theme
 * @since 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add support for structural wraps.
 *
 * @since 1.0
 */
add_theme_support( 'genesis-structural-wraps', array(
	'header',
	'nav',
	'subnav',
	'site-inner',
	'footer-widgets',
	'footer',
) );

/**
 * Force HTML5
 *
 * @since 1.0
 */
add_theme_support( 'html5', array( 
	'comment-list',
	'comment-form',
	'search-form',
	'gallery',
	'caption',
) );

/**
 * Adds <meta> tags for mobile responsiveness.
 *
 * @since 1.0
 */
add_theme_support( 'genesis-responsive-viewport' );

/**
 * Add support for custom backgrounds.
 *
 * @since 1.0
 */
add_theme_support( 'custom-background' );

/**
 * Add support for a custom header.
 *
 * @since 1.0
 */
add_theme_support( 'genesis-custom-header', array( 'width' => 960, 'height' => 100 ) );

/**
 * Add Genesis accessiblity support.
 *
 * @since 1.0
 */
add_theme_support( 'genesis-accessibility', array( 
	'headings',
	'drop-down-menu',
	'search-form',
	'skip-links',
	'rems',
) );

/**
 * Add Genesis footer widget areas.
 *
 * @since 1.0
 */
add_theme_support( 'genesis-footer-widgets', 3 );
