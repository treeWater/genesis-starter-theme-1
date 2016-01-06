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
	$logo = '<img src="' . get_stylesheet_directory_uri() . '/images/logo.png" alt="' . esc_attr( get_bloginfo( 'name' ) ) . ' Homepage" width="800" height="84" />';
	$inside = sprintf( '<a href="%s">%s<span class="screen-reader-text">%s</span></a>', trailingslashit( home_url() ), $logo, get_bloginfo( 'name' ) );
	$wrap = genesis_is_root_page() && 'title' === genesis_get_seo_option( 'home_h1_on' ) ? 'h1' : 'p';
	$wrap = genesis_is_root_page() && ! genesis_get_seo_option( 'home_h1_on' ) ? 'h1' : $wrap;
	$wrap = genesis_html5() && genesis_get_seo_option( 'semantic_headings' ) ? 'h1' : $wrap;
	return sprintf( '<%1$s %2$s>%3$s</%1$s>', $wrap, genesis_attr( 'site-title' ), $inside );
}
