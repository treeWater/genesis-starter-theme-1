<?php
/**
 * Theme setup.
 *
 * @author  Craig Simpson
 * @package Project\Theme
 * @since   1.0.0
 */

declare ( strict_types = 1 );

namespace Project\Theme;

/**
 * Theme setup class.
 *
 * @package Project\Theme
 */
class Setup {
	/**
	 * Runtime Configuration parameters.
	 *
	 * @var array
	 */
	protected $config;

	/**
	 * Instantiate the object.
	 *
	 * @since 1.0.0
	 *
	 * @param array $config Config.
	 * @return self
	 */
	public function __construct( array $config ) {
		$this->config = $config;

		$this->init_events();
	}

	/**
	 * Initialize the hooks.
	 *
	 * @since 1.0.0
	 */
	protected function init_events() {
		add_action( 'genesis_setup', [ $this, 'setup' ], 15 );

		add_filter( 'genesis_theme_settings_defaults',  [ $this, 'theme_settings_defaults_filter' ], 10, 1 );
		add_filter( 'genesis_edit_post_link',           '__return_false' );
	}

	/**
	 * General theme setup tasks.
	 *
	 * @since 1.0.0
	 */
	public function setup() {
		array_walk( $this->config['tasks'], function( $config, $method ) {
			$this->$method( $config );
		} );
	}

	/**
	 * Change the Genesis Theme Settings defaults.
	 *
	 * @since 1.0.0
	 *
	 * @param array $defaults Default array of settings passed in from the filter.
	 * @return array Return the amended settings defaults array.
	 */
	public function theme_settings_defaults_filter( array $defaults ): array {
		return wp_parse_args( $this->config['theme_settings_defaults'], $defaults );
	}

	/**
	 * Add theme supports.
	 *
	 * @since 1.0.0
	 *
	 * @param array $config Config.
	 */
	protected function add_theme_support( array $config ) {
		array_walk( $config, function( $args, $feature ) {
			add_theme_support( $feature, $args ?: true );
		});
	}

	/**
	 * Remove theme supports.
	 *
	 * @since 1.0.0
	 *
	 * @param array $config Config.
	 */
	protected function remove_theme_support( array $config ) {
		array_walk( $config, function( $feature ) {
			remove_theme_support( $feature );
		});
	}

	/**
	 * Add the image sizes.
	 *
	 * @since 1.0.0
	 *
	 * @param array $config Config.
	 */
	protected function add_image_size( array $config ) {
		array_walk( $config, function( $args, $name ) {
			add_image_size( $name, $args[0], $args[1], isset( $args[2] ) ? $args[2] : false );
		});
	}

	/**
	 * Layouts handler.
	 *
	 * @since 1.0.0
	 *
	 * @param array $config Config.
	 */
	protected function genesis_unregister_layout( array $config ) {
		array_walk( $config, function( $layout ) {
			genesis_unregister_layout( $layout );
		});
	}

	/**
	 * Remove widgets.
	 *
	 * @since 1.0.0
	 *
	 * @param array $config Config.
	 */
	protected function unregister_widget( array $config ) {
		array_walk( $config, function( $widget ) {
			unregister_widget( $widget );
		});
	}

	/**
	 * Register and unregister sidebars as defined in configuration
	 *
	 * @since 1.0.0
	 *
	 * @param array $config Config.
	 */
	protected function sidebars( array $config ) {
		if ( ! empty( $config['unregister'] ) ) {
			array_walk( $config['unregister'], function ( $sidebar ) {
				unregister_sidebar( $sidebar );
			} );
		}

		if ( ! empty( $config['register'] ) ) {
			array_walk( $config['register'], function ( $sidebar, $sidebar_id ) {
				genesis_register_sidebar( [
					'id'          => $sidebar_id,
					'name'        => $sidebar['name'],
					'description' => $sidebar['description'],
				] );
			} );
		}
	}
}
