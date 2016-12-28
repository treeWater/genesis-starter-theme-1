<?php
/**
 * Wrap oEmbed content.
 *
 * @author  Craig Simpson
 * @package Project\Theme
 * @since   1.0.0
 */

namespace Project\Theme;

add_filter( 'embed_oembed_html', __NAMESPACE__ . '\embed_wrap' );
/**
 * Wrap embedded media as suggested by Readability
 *
 * @link https://gist.github.com/965956
 * @link http://www.readability.com/publishers/guidelines#publisher
 *
 * @since 1.0.0
 *
 * @param $cache
 * @return string
 */
function embed_wrap( $cache ) {
	return '<div class="entry-content-asset">' . $cache . '</div>';
}
