<?php
/**
 * Navigation changes.
 *
 * @author  Craig Simpson
 * @package Project\Theme
 * @since   1.0.0
 */

namespace Project\Theme;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Remove the ID applied to a menu list item..
 */
add_filter( 'nav_menu_item_id', '__return_null' );

add_filter( 'wp_nav_menu_args', __NAMESPACE__ . '\nav_menu_args' );
/**
 * Clean up wp_nav_menu_args.
 * Remove the navigation container.
 * Use our Clean_Nav_Walker class.
 *
 * @uses Clean_Nav_Walker
 *
 * @param string $args
 *
 * @return array
 */
function nav_menu_args( $args = '' ) {

	/**
	 * Include Clean_Nav_Walker.
	 */
	include_once CHILD_THEME_DIR . '/lib/classes/class-clean-nav-walker.php';

	$nav_menu_args              = [];
	$nav_menu_args['container'] = false;

	if ( ! $args['items_wrap'] ) {
		$nav_menu_args['items_wrap'] = '<ul class="%2$s">%3$s</ul>';
	}

	if ( ! $args['walker'] ) {
		$nav_menu_args['walker'] = new Clean_Nav_Walker();
	}

	return array_merge( $args, $nav_menu_args );
}
