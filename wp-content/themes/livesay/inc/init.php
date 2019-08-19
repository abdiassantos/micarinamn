<?php
/*
 * All Livesay Theme Related Functions Files are Linked here
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/* Theme All Basic Setup */
require_once( LIVESAY_FRAMEWORK . '/theme-support.php' );
require_once( LIVESAY_FRAMEWORK . '/backend-functions.php' );
require_once( LIVESAY_FRAMEWORK . '/frontend-functions.php' );
require_once( LIVESAY_FRAMEWORK . '/enqueue-files.php' );
require_once( LIVESAY_CS_FRAMEWORK . '/custom-style.php' );
require_once( LIVESAY_CS_FRAMEWORK . '/config.php' );

/* WooCommerce Integration */
if (class_exists( 'WooCommerce' )){
	require_once( LIVESAY_FRAMEWORK . '/plugins/woocommerce/woo-config.php' );
}

/* Bootstrap Menu Walker */
require_once( LIVESAY_FRAMEWORK . '/core/vt-mmenu/wp_bootstrap_navwalker.php' );

/* Install Plugins */
require_once( LIVESAY_FRAMEWORK . '/plugins/notify/activation.php' );

/* Breadcrumbs */
require_once( LIVESAY_FRAMEWORK . '/plugins/breadcrumb-trail.php' );

/* Aqua Resizer */
require_once( LIVESAY_FRAMEWORK . '/plugins/aq_resizer.php' );

/* Sidebars */
require_once( LIVESAY_FRAMEWORK . '/core/sidebars.php' );