<?php
/**
 * Header tweaks.
 *
 * @author  Craig Simpson
 * @package Project\Theme
 * @since   1.0.0
 */

declare ( strict_types = 1 );

namespace Project\Theme;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'genesis_before_header', __NAMESPACE__ . '\maybe_move_primary_nav' );
/**
 * Maybe move the primary navigation to the header (if no widget in header-right).
 */
function maybe_move_primary_nav() {
	if ( is_active_sidebar( 'header-right' ) ) {
		return;
	}
	remove_action( 'genesis_after_header', 'genesis_do_nav' );
	add_action( 'genesis_header', 'genesis_do_nav', 11 );
}

/**
 * Remove the site description
 *
 * @since 1.0
 */
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );

add_filter( 'genesis_seo_title', __NAMESPACE__ . '\header_inline_logo' );
/**
 * Inline logo file
 *
 * @since 1.0
 */
function header_inline_logo() {
	$logo = '<img src="' . esc_url( CHILD_THEME_URI . '/assets/images/logo.png' ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . ' Homepage" width="800" height="84" />';
	$inside = sprintf( '<a href="%s">%s<span class="screen-reader-text">%s</span></a>', trailingslashit( home_url() ), $logo, get_bloginfo( 'name' ) );
	$wrap = genesis_is_root_page() && 'title' === genesis_get_seo_option( 'home_h1_on' ) ? 'h1' : 'p';
	$wrap = genesis_is_root_page() && ! genesis_get_seo_option( 'home_h1_on' ) ? 'h1' : $wrap;
	$wrap = genesis_html5() && genesis_get_seo_option( 'semantic_headings' ) ? 'h1' : $wrap;

	return sprintf( '<%1$s %2$s>%3$s</%1$s>', $wrap, genesis_attr( 'site-title' ), $inside );
}
