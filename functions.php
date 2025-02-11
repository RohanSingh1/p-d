<?php
 /**
 * Functions
 */

/*
Directory
- path to the current directory
*/
define( 'DIR', dirname( __FILE__ ) );

/**
 * paisanoanddaughters functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package paisanoanddaughters
 */
if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.1' );
}

if ( ! defined( 'PND_DIR_PATH' ) ) {
	define( 'PND_DIR_PATH', untrailingslashit( get_template_directory() ) );
}

if ( ! defined( 'PND_DIR_URI' ) ) {
	define( 'PND_DIR_URI', untrailingslashit( get_template_directory_uri() ) );
}

if ( ! defined( 'PND_ASSETS_URI' ) ) {
	define( 'PND_ASSETS_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/' );
}

if ( ! defined( 'PND_INCLUDES' ) ) {
	define( 'PND_INCLUDES', untrailingslashit( get_template_directory() ) . '/inc/' );
}

/*
General Functions
- basic theme functions
*/
include_once( DIR . '/inc/functions-general.php' );
include_once( DIR . '/inc/gutenberg-blocks.php' );
include_once( DIR . '/inc/helper-functions.php' );
include_once( DIR . '/inc/hooks.php' );