<?php
/**
 * Setup theme
 *
 * @author  Craig Simpson
 * @package Project\Theme
 * @since   1.0.0
 */

namespace Project\Theme;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return [

	/*
	 * ================================================================
	 * Tasks Configuration
	 *
	 * Each of the tasks that need to be run in setup are defined here
	 *
	 * Structure:
	 *      'add_theme_support'         => array(),
	 *      'add_image_size'            => array(),
	 *      'genesis_unregister_layout' => array(),
	 *      'unregister_widget'         => array(),
	 *      'sidebars'                  => array(
	 *          'unregister'            => array(),
	 *          'register'              => array(),
	 *      ),
	 * ================================================================
	 */

	'tasks' => [
		'add_theme_support' => [
			'html5'                           => [
				'caption',
				'comment-form',
				'comment-list',
				'gallery',
				'search-form',
			],
			'genesis-accessibility'           => [
				'headings',
				'drop-down-menu',
				'rems',
				'search-form',
				'skip-links',
			],
			'genesis-responsive-viewport'     => '',
			'genesis-structural-wraps'        => [
				'header',
				'menu-primary',
				'menu-secondary',
				'site-inner',
				'footer-widgets',
				'footer',
			],
			'genesis-menus'                   => [
				'primary'   => __( 'Primary Navigation Menu', 'genesis-starter-theme' ),
				'secondary' => __( 'Secondary Navigation Menu', 'genesis-starter-theme' ),
			],
			'genesis-after-entry-widget-area' => '',
			'genesis-footer-widgets'          => 3,
		],

		'add_image_size' => [
		],

		'genesis_unregister_layout' => [
			'content-sidebar-sidebar',
			'sidebar-content-sidebar',
			'sidebar-sidebar-content',
		],

		'unregister_widget' => [
			'Genesis_Featured_Page',
			'Genesis_Featured_Post',
			'Genesis_User_Profile_Widget',
		],

		'sidebars' => [
			'unregister' => [
				'sidebar-alt',
			],
		],
	],

	/*
	 * ================================================================
	 * Modify the Theme Setting Defaults
	 *
	 * The args configured here are merged with the defaults from
	 * Genesis and passed through the hook 'genesis_theme_settings_defaults'.
	 *
	 * Refer to genesis/lib/admin/theme-settings.php for a complete
	 * list of defaults.
	 * ================================================================
	 */

	'theme_settings_defaults' => [
	],
];
