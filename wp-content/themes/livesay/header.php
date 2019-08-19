<?php
/*
 * The header for our theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php
// Metabox
$livesay_id    = ( isset( $post ) ) ? $post->ID : false;
$livesay_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $livesay_id;
$livesay_id    = ( livesay_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $livesay_id;
$livesay_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $livesay_id : false;
$livesay_meta  = get_post_meta( $livesay_id, 'page_type_metabox', true );

// Header Style
if ($livesay_meta) {
  $transparency_header  = $livesay_meta['transparency_header'];
  $livesay_hide_header = $livesay_meta['hide_header'];
  $livesay_sticky_header  = $livesay_meta['stick_header'];
  $livesay_cart_widget  = $livesay_meta['cart_widget'];
} else {
  $transparency_header  = cs_get_option('transparent_header');
  $livesay_hide_header = '';
  $livesay_sticky_header  = cs_get_option('sticky_header');
  $livesay_cart_widget  = cs_get_option('cart_widget');
}

if($livesay_meta && $livesay_meta['stick_header']){
  $livesay_sticky_header  = $livesay_meta['stick_header'];
} else {
  $livesay_sticky_header  = cs_get_option('sticky_header');
}

if($livesay_meta && $livesay_meta['transparency_header']){
  $transparency_header = $livesay_meta['transparency_header'];
} else {
  $transparency_header = cs_get_option('transparent_header');
}

if($livesay_meta && $livesay_meta['cart_widget']){
  $livesay_cart_widget = $livesay_meta['cart_widget'];
} else {
  $livesay_cart_widget = cs_get_option('cart_widget');
}

// Parallax
$livesay_bg_parallax = cs_get_option('theme_bg_parallax');
$livesay_hav_parallax = $livesay_bg_parallax ? ' parallax-window' : '';
$livesay_parallax_speed = cs_get_option('theme_bg_parallax_speed');
$livesay_bg_parallax_speed = $livesay_parallax_speed ? $livesay_parallax_speed : '0.4';

// Theme Layout Width
$livesay_bg_overlay_color  = cs_get_option( 'theme_bg_overlay_color' );
$livesay_layout_width  = cs_get_option( 'theme_layout_width' );
$livesay_layout_width_class = ($livesay_layout_width === 'container') ? 'layout-boxed'. $livesay_hav_parallax : 'layout-full';

// Header
$livesay_sticky_header_class = $livesay_sticky_header ? 'lvsy-header-sticky ' : '';
$livesay_transparency_header_class = $transparency_header ? 'header-style-two ' : '';
?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11"><?php

if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
  if (cs_get_option('brand_fav_icon')) {
    echo '<link rel="shortcut icon" href="'. esc_url(wp_get_attachment_url(cs_get_option('brand_fav_icon'))) .'" />';
  } else { ?>
    <link rel="shortcut icon" href="<?php echo esc_url(LIVESAY_IMAGES); ?>/favicon.png" />
  <?php }
  if (cs_get_option('iphone_icon')) {
    echo '<link rel="apple-touch-icon" sizes="57x57" href="'. esc_url(wp_get_attachment_url(cs_get_option('iphone_icon'))) .'" >';
  }
  if (cs_get_option('iphone_retina_icon')) {
    echo '<link rel="apple-touch-icon" sizes="114x114" href="'. esc_url(wp_get_attachment_url(cs_get_option('iphone_retina_icon'))) .'" >';
    echo '<link name="msapplication-TileImage" href="'. esc_url(wp_get_attachment_url(cs_get_option('iphone_retina_icon'))) .'" >';
  }
  if (cs_get_option('ipad_icon')) {
    echo '<link rel="apple-touch-icon" sizes="72x72" href="'. esc_url(wp_get_attachment_url(cs_get_option('ipad_icon'))) .'" >';
  }
  if (cs_get_option('ipad_retina_icon')) {
    echo '<link rel="apple-touch-icon" sizes="144x144" href="'. esc_url(wp_get_attachment_url(cs_get_option('ipad_retina_icon'))) .'" >';
  }
}

wp_head(); ?>
</head>
<body <?php echo body_class(); ?>>
<?php
if ($livesay_bg_parallax) { ?>
  <div class="<?php echo esc_attr($livesay_layout_width_class); ?>" data-stellar-background-ratio="<?php echo esc_attr($livesay_bg_parallax_speed); ?>">
<?php } else {?>
  <div class="<?php echo esc_attr($livesay_layout_width_class); ?>">
<?php } ?>

  <?php if($livesay_bg_overlay_color) { ?>
    <div class="layout-overlay" style="background-color: <?php echo esc_attr($livesay_bg_overlay_color); ?>;"></div>
  <?php } ?>
  <div id="vtheme-wrapper">
<?php if (!$livesay_hide_header) { ?>
<!-- Livesay header, header style two -->
<header class="lvsy-header <?php echo esc_attr($livesay_sticky_header_class); ?><?php echo esc_attr($livesay_transparency_header_class); ?>">
  <div class="container">
  <?php
    // Brand Logo
    get_template_part( 'layouts/header/logo' ); ?>
    <div class="header-right">
      <?php get_template_part( 'layouts/header/menu', 'bar' );?>
      <a href="javascript:void(0);" class="lvsy-toggle"><span></span></a>
      <?php if($livesay_cart_widget) { ?>
        <div class="shopping-handbag"><a href="<?php echo esc_url(wc_get_cart_url()); ?>">
        <?php if($transparency_header) {
          echo '<img src="'. esc_url(LIVESAY_IMAGES) .'/icons/icon14.png'.'" alt="" width="18">';
        } else {
          echo '<img src="'. esc_url(LIVESAY_IMAGES) .'/icons/icon15.png'.'" alt="" width="18">';
        } ?>
        <span class="shopping-counter"><?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count(), 'livesay' ), WC()->cart->get_cart_contents_count() ); ?></span></a></div>
      <?php } ?>
    </div>
  </div>
</header>
<?php }
