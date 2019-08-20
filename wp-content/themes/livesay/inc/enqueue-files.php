<?php
/*
 * All CSS and JS files are enqueued from this file
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/**
 * Enqueue Files for FrontEnd
 */
if ( ! function_exists( 'livesay_vt_scripts_styles' ) ) {
  function livesay_vt_scripts_styles() {

    // WooCommerce
    if (class_exists( 'WooCommerce' )){
      wp_enqueue_style( 'woocommerce-layout', LIVESAY_CSS . '/woocommerce-layout.css', null, 1.0, 'all' );
      wp_enqueue_style( 'woocommerce', LIVESAY_CSS . '/woocommerce.css', null, 1.0, 'all' );
    }

    // Styles
    wp_enqueue_style( 'font-awesome', LIVESAY_THEMEROOT_URI . '/inc/theme-options/cs-framework/assets/css/font-awesome.min.css' );
    wp_enqueue_style( 'bootstrap', LIVESAY_CSS .'/bootstrap.min.css', array(), '3.3.6', 'all' );
    wp_enqueue_style( 'own-carousel', LIVESAY_CSS .'/owl.carousel.css', array(), '2.4', 'all' );
    wp_enqueue_style( 'jquery-fancybox', LIVESAY_CSS .'/jquery.fancybox.css', array(), '2.1.5', 'all' );
    wp_enqueue_style( 'fancybox-thumbs', LIVESAY_CSS .'/jquery.fancybox-thumbs.css', array(), '1.0.7', 'all' );
    wp_enqueue_style( 'range-slider', LIVESAY_CSS .'/rangeSlider.min.css', array(), 'all' );
    wp_enqueue_style( 'simpleline-icons', LIVESAY_CSS .'/simple-line-icons.css', array(), '2.4.0', 'all' );
    wp_enqueue_style( 'swiper', LIVESAY_CSS .'/swiper.min.css', array(), '3.4.1', 'all' );
    wp_enqueue_style( 'livesay-style', LIVESAY_CSS .'/styles.css', array(), LIVESAY_VERSION, 'all' );

    // Scripts
    wp_enqueue_script( 'bootstrap', LIVESAY_SCRIPTS . '/bootstrap.min.js', array( 'jquery' ), '3.3.6', true );
    wp_enqueue_script( 'html5shiv', LIVESAY_SCRIPTS . '/html5shiv.js', array( 'jquery' ), '3.7.0', true );
    wp_enqueue_script( 'respond', LIVESAY_SCRIPTS . '/respond.min.js', array( 'jquery' ), '1.4.2', true );
    wp_enqueue_script( 'placeholders', LIVESAY_SCRIPTS . '/placeholders.min.js', array( 'jquery' ), '4.0.1', true );
    wp_enqueue_script( 'jquery-sticky', LIVESAY_SCRIPTS . '/jquery.sticky.min.js', array( 'jquery' ), '1.0.4', true );
    wp_enqueue_script( 'swiper', LIVESAY_SCRIPTS . '/swiper.min.js', array( 'jquery' ), '3.4.1', true );
    wp_enqueue_script( 'jquery-countdown', LIVESAY_SCRIPTS . '/jquery.countdown.min.js', array( 'jquery' ), '1.6.2', true );
    wp_enqueue_script( 'owl-carousel', LIVESAY_SCRIPTS . '/owl.carousel.min.js', array( 'jquery' ), '2.1.6', true );
    wp_enqueue_script( 'parallax', LIVESAY_SCRIPTS . '/parallax.min.js', array( 'jquery' ), '1.4.2', true );
    wp_enqueue_script( 'theia-sticky-sidebar', LIVESAY_SCRIPTS . '/theia-sticky-sidebar.min.js', array( 'jquery' ), '1.5.0', true );
    wp_enqueue_script( 'jquery-fancybox', LIVESAY_SCRIPTS . '/jquery.fancybox.min.js', array( 'jquery' ), '2.1.5', true );
    wp_enqueue_script( 'enscroll', LIVESAY_SCRIPTS . '/enscroll.min.js', array( 'jquery' ), '0.6.2', true );
    wp_enqueue_script( 'range-slider', LIVESAY_SCRIPTS . '/rangeSlider.min.js', array( 'jquery' ), LIVESAY_VERSION, true );
    wp_enqueue_script( 'jquery-responsive-tabs', LIVESAY_SCRIPTS . '/jquery.responsiveTabs.min.js', array( 'jquery' ), '1.4.0', true );
    wp_enqueue_script( 'jquery-fancybox-thumbs', LIVESAY_SCRIPTS . '/jquery.fancybox-thumbs.min.js', array( 'jquery' ), '1.0.7', true );
    wp_enqueue_script( 'livesay-scripts', LIVESAY_SCRIPTS . '/scripts.js', array( 'jquery' ), LIVESAY_VERSION, true );

    // Comments
    wp_enqueue_script( 'validate', LIVESAY_SCRIPTS . '/jquery.validate.min.js', array( 'jquery' ), '1.9.0', true );
    wp_add_inline_script( 'validate', 'jQuery(document).ready(function($) {$("#commentform").validate({rules: {author: {required: true,minlength: 2},email: {required: true,email: true},comment: {required: true,minlength: 10}}});});' );

    // Responsive Active
    wp_enqueue_style( 'livesay-responsive', LIVESAY_CSS .'/responsive.css', array(), '1.0', 'all' );

    // Adds support for pages with threaded comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }

  }
  add_action( 'wp_enqueue_scripts', 'livesay_vt_scripts_styles' );
}

/**
 * Apply theme's stylesheet to the visual editor.
 *
 * @uses add_editor_style() Links a stylesheet to visual editor
 * @uses get_stylesheet_uri() Returns URI of theme stylesheet
 */
function livesay_add_editor_styles() {
 add_editor_style( get_stylesheet_uri() );
}
add_action( 'init', 'livesay_add_editor_styles' );

/**
 * Enqueue Files for BackEnd
 */
if ( ! function_exists( 'livesay_vt_admin_scripts_styles' ) ) {
  function livesay_vt_admin_scripts_styles() {

    wp_enqueue_style( 'livesay-admin-main', LIVESAY_CSS . '/admin-styles.css', true );
    wp_enqueue_script( 'livesay-admin-scripts', LIVESAY_SCRIPTS . '/admin-scripts.js', true );

  }
  add_action( 'admin_enqueue_scripts', 'livesay_vt_admin_scripts_styles' );
}

/* Enqueue All Styles */
if ( ! function_exists( 'livesay_vt_wp_enqueue_styles' ) ) {
  function livesay_vt_wp_enqueue_styles() {
    add_action( 'wp_head', 'livesay_vt_custom_css', 99 );
    livesay_vt_google_fonts();
  }
  add_action( 'wp_enqueue_scripts', 'livesay_vt_wp_enqueue_styles' );
}
