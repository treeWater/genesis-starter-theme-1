<?php
/**
 * Autoload child theme customizations.
 *
 * Loads our custom functions, assets and theme customizations.
 *
 * @author  Craig Simpson
 * @since   1.0.0
 * @package Project\Theme
 */

namespace Project\Theme;

/**
 * Load theme components files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function load_theme_components() {
    $file_names = [
        'components/assets.php',
        'components/cleanup.php',
        'components/header.php',
        'components/navigation.php',
        'components/oembed.php',
        'components/shame.php',
    ];
    load_specified_files( $file_names );
}

/**
 * Load each of the specified files.
 *
 * @since 1.0.0
 *
 * @param array  $file_names
 * @param string $folder_root
 *
 * @return void
 */
function load_specified_files( array $file_names, $folder_root = '' ) {
    $folder_root = $folder_root ?: CHILD_THEME_DIR . '/lib/';
    foreach ( $file_names as $file_name ) {
        include( $folder_root . $file_name );
    }
}

load_theme_components();
