<?php
/**
 * Cleaner walker for wp_nav_menu()
 *
 * Walker_Nav_Menu (WordPress default) example output:
 *   <li id="menu-item-8" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8"><a href="/">Home</a></li>
 *   <li id="menu-item-9" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9"><a href="/sample-page/">Sample Page</a></l
 *
 * Clean_Nav_Walker example output:
 *   <li class="menu-home"><a href="/">Home</a></li>
 *   <li class="menu-sample-page"><a href="/sample-page/">Sample Page</a></li>
 *
 * @author  Craig Simpson
 * @package Project\Theme
 * @since   1.0.0
 */

namespace Project\Theme;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Clean_Nav_Walker extends \Walker_Nav_Menu {

	/**
	 * Is current post a custom post type
	 *
	 * @var bool
	 */
	private $cpt;

	/**
	 * Stores the archive page for current URL
	 *
	 * @var false|string
	 */
	private $archive;

	/**
	 * Clean_Nav_Walker constructor.h
	 */
	public function __construct() {
		add_filter( 'nav_menu_css_class', array( $this, 'css_classes' ), 10, 2 );
		add_filter( 'nav_menu_item_id', '__return_null' );

		$cpt           = get_post_type();
		$this->cpt     = in_array( $cpt, get_post_types( array( '_builtin' => false ) ) );
		$this->archive = get_post_type_archive_link( $cpt );
	}

	/**
	 * @param $classes
	 *
	 * @return int
	 */
	public function check_current( $classes ) {
		return preg_match( '/(current[-_])|active/', $classes );
	}


	/**
	 * Compare URL against relative URL
	 */
	public function url_compare( $url, $rel ) {
		$url = trailingslashit( $url );
		$rel = trailingslashit( $rel );

		return 0 === ( strcasecmp( $url, $rel ) );
	}

	/**
	 * Overwrite the default Walker_Nav_Menu `display_element` method.
	 *
	 * @param object $element
	 * @param array $children_elements
	 * @param int $max_depth
	 * @param int $depth
	 * @param array $args
	 * @param string $output
	 */
	public function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {
		$element->is_subitem = ( ( ! empty( $children_elements[ $element->ID ] ) && ( ( $depth + 1 ) < $max_depth || ( $max_depth === 0 ) ) ) );

		if ( $element->is_subitem ) {
			foreach ( $children_elements[ $element->ID ] as $child ) {
				if ( $child->current_item_parent || $this->url_compare( $this->archive, $child->url ) ) {
					$element->classes[] = 'active';
				}
			}
		}

		$element->is_active = ( ! empty( $element->url ) && strpos( $this->archive, $element->url ) );

		if ( $element->is_active ) {
			$element->classes[] = 'active';
		}

		parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}


	/**
	 * Remove unwanted classes, add our new improved classes.
	 *
	 * @param $classes
	 * @param $item
	 *
	 * @return array
	 */
	public function css_classes( $classes, $item ) {

		$slug = sanitize_title( $item->title );

		// Fix core `active` behavior for custom post types
		if ( $this->cpt ) {
			$classes = str_replace( 'current_page_parent', '', $classes );

			if ( $this->url_compare( $this->archive, $item->url ) ) {
				$classes[] = 'active';
			}
		}

		// Remove most core classes
		$classes = preg_replace( '/(current(-menu-|[-_]page[-_])(item|parent|ancestor))/', 'active', $classes );
		$classes = preg_replace( '/^((menu|page)[-_\w+]+)+/', '', $classes );

		// Re-add core `menu-item` class
		$classes[] = 'menu-item';

		// Re-add core `menu-item-has-children` class on parent elements
		if ( $item->is_subitem ) {
			$classes[] = 'menu-item-has-children';
		}

		// Add `menu-<slug>` class
		$classes[] = 'menu-' . $slug;

		$classes = array_unique( $classes );
		$classes = array_map( 'trim', $classes );

		return array_filter( $classes );
	}
}
