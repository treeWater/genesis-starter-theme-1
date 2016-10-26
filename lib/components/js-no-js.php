<?php
/**
 * Adds a no-js body class to the front-end, and a script on genesis_before
 * which immediately changes the class to js if JavaScript is enabled.
 *
 * @author  Craig Simpson
 * @package Project\Theme
 * @since   1.0.0
 */

namespace Project\Theme;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_filter( 'body_class', __NAMESPACE__ . '\body_class' );
/**
 * Add 'no-js' class to body element.
 *
 * @param $classes
 *
 * @return array
 *
 * @since 1.0.0
 */
function body_class( $classes ) {
	$classes[] = 'no-js';

	return $classes;
}

add_action( 'genesis_before', __NAMESPACE__ . '\add_js_script', 1 );
/**
 * Echo out the script that changes 'no-js' class to 'js'.
 *
 * @since 1.0.0
 */
function add_js_script() {
	?>
	<script type="text/javascript">
		//<![CDATA[
		(function () {
			var c = document.body.className;
			c = c.replace(/no-js/, 'js');
			document.body.className = c;
		})();
		//]]>
	</script>
	<?php
}
