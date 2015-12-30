<?php
/**
 * Header tweaks.
 * @author Craig Simpson
 * @package genesis-starter-theme
 * @since 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Remove the site description
 *
 * @since 1.0
 */
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );

//add_filter( 'genesis_seo_title', 'gst_header_inline_logo', 10, 3 );
/**
 * Inline logo file
 *
 * @since 1.0
 */
function gst_header_inline_logo( $title, $inside, $wrap ) {
	$logo = '<img src="' . get_stylesheet_directory_uri() . 'assets/images/logo.png" width="200" height="80" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '">';
	$inside = sprintf( '<a href="%s" title="%s">%s</a>', trailingslashit( home_url() ), esc_attr( get_bloginfo( 'name' ) ), $logo );
	$wrap = is_front_page() && 'title' === genesis_get_seo_option( 'home_h1_on' ) ? 'h1' : 'p';
	$wrap = is_front_page() && ! genesis_get_seo_option( 'home_h1_on' ) ? 'h1' : $wrap;
	$wrap = genesis_html5() && genesis_get_seo_option( 'semantic_headings' ) ? 'h1' : $wrap;
	return sprintf( '<%1$s %2$s>%3$s</%1$s>', $wrap, genesis_attr( 'site-title' ), $inside );
}

add_filter( 'body_class' , 'gst_body_class');
/**
 * Add slug as <body> class.
 *
 * @since 1.0
 */
function gst_body_class($classes) {
  // Add page slug if it doesn't exist
	if ( is_single() || is_page() && ! is_front_page() ) {
		if ( ! in_array( basename( get_permalink() ), $classes ) ) {
			$classes[] = basename( get_permalink() );
		}
	}
	return $classes;
}
