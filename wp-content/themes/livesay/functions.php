<?php
/*
 * Livesay Theme's Functions
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/**
 * Define - Folder Paths
 */
define( 'LIVESAY_THEMEROOT_PATH', get_template_directory() );
define( 'LIVESAY_THEMEROOT_URI', get_template_directory_uri() );
define( 'LIVESAY_CSS', LIVESAY_THEMEROOT_URI . '/assets/css' );
define( 'LIVESAY_IMAGES', LIVESAY_THEMEROOT_URI . '/assets/images' );
define( 'LIVESAY_SCRIPTS', LIVESAY_THEMEROOT_URI . '/assets/js' );
define( 'LIVESAY_FRAMEWORK', get_template_directory() . '/inc' );
define( 'LIVESAY_LAYOUT', get_template_directory() . '/layouts' );
define( 'LIVESAY_CS_IMAGES', LIVESAY_THEMEROOT_URI . '/inc/theme-options/theme-extend/images' );
define( 'LIVESAY_CS_FRAMEWORK', get_template_directory() . '/inc/theme-options/theme-extend' ); // Called in Icons field *.json
define( 'LIVESAY_ADMIN_PATH', get_template_directory() . '/inc/theme-options/cs-framework' ); // Called in Icons field *.json

/**
 * Define - Global Theme Info's
 */
if (is_child_theme()) {
	$livesay_theme_child = wp_get_theme();
	$livesay_get_parent = $livesay_theme_child->Template;
	$livesay_theme = wp_get_theme($livesay_get_parent);
} else { // Parent Theme Active
	$livesay_theme = wp_get_theme();
}
define('LIVESAY_NAME', $livesay_theme->get( 'Name' ));
define('LIVESAY_VERSION', $livesay_theme->get( 'Version' ));
define('LIVESAY_BRAND_URL', $livesay_theme->get( 'AuthorURI' ));
define('LIVESAY_BRAND_NAME', $livesay_theme->get( 'Author' ));

/**
 * All Main Files Include
 */
require_once( LIVESAY_FRAMEWORK . '/init.php' );
