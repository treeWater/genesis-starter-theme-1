<?php
/**
 * Wrap oEmbed content.
 *
 * @author  Craig Simpson
 * @package Project\Theme
 * @since   1.0.0
 */

declare ( strict_types = 1 );

namespace Project\Theme;

add_filter( 'oembed_dataparse', __NAMESPACE__ . '\embed_wrap', 10, 3 );
/**
 * Wrap oEmbed generated HTML with divs that allow for styling them.
 *
 * @since 1.0.0
 *
 * @link https://plugins.svn.wordpress.org/oembed-styling/tags/1.1/oEmbed-styling.php
 *
 * @param string     $html oEmbed HTML.
 * @param \WP_oEmbed $data oEmbed data.
 * @param string     $url  oEmbed URL.
 * @return string Wrapped oEmbed HTML.
 */
function embed_wrap( string $html, \WP_oEmbed $data, string $url ) {
	preg_match( '#(http|ftp)s?://(www\.)?([a-z0-9\.\-]+)/?.*#i', $url, $matches );
	$domain = str_replace( '.', '-', $matches[3] );

	return "<div class=\"oembed oembed-$data->type oembed-$domain oembed-$data->type-$domain\">$html</div>";
}
