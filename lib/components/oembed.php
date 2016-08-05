<?php
/**
 * Wrap oEmbed content.
 *
 * @package   Project\Theme
 * @author    Craig Simpson
 * @license   GPL-2.0+
 * @copyright 2016 Gamajo Tech
 */

namespace Project\Theme;

add_filter('embed_oembed_html', __NAMESPACE__ . '\embed_wrap');
/**
 * Wrap embedded media as suggested by Readability
 *
 * @link https://gist.github.com/965956
 * @link http://www.readability.com/publishers/guidelines#publisher
 *
 * @since 1.0.0
 */
function embed_wrap( $cache ) {
	return '<div class="entry-content-asset">' . $cache . '</div>';
}
