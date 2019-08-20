<?php
/* ==========================================================
  Sponsors
=========================================================== */
if ( !function_exists('livesay_section_title_function')) {
  function livesay_section_title_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'section_title'  => '',
      'section_sub_title'  => '',
      'class'  => '',
      // Style
      'title_color'  => '',
      'title_size'  => '',
      'sub_title_color'  => '',
      'sub_title_size'  => '',

      // Design Tab
      'css'  => '',
    ), $atts));

    // Design Tab
    $custom_css = ( function_exists( 'vc_shortcode_custom_css_class' ) ) ? vc_shortcode_custom_css_class( $css, ' ' ) : '';

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Text Color
    if ( $title_size || $title_color ) {
      $inline_style .= '.lvsy-section-title-'. $e_uniqid .' .section-title {';
      $inline_style .= ( $title_size ) ? 'font-size:'. livesay_core_check_px($title_size) .';' : '';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= '}';
    }
    if ( $sub_title_size || $sub_title_color ) {
      $inline_style .= '.lvsy-section-title-'. $e_uniqid .' .section-sub-title {';
      $inline_style .= ( $sub_title_size ) ? 'font-size:'. livesay_core_check_px($sub_title_size) .';' : '';
      $inline_style .= ( $sub_title_color ) ? 'color:'. $sub_title_color .';' : '';
      $inline_style .= '}';
    }
      $title = $section_title ? '<div class="section-title">'.$section_title.'</div>' : '';
      $sub_title = $section_sub_title ? '<div class="section-sub-title">'.$section_sub_title.'</div>' : '';

    // add inline style
    livesay_add_inline_style( $inline_style );
    $styled_class  = ' lvsy-section-title-'. $e_uniqid;

    $output = '<div class="section-title-wrap '. $class . $styled_class . $custom_css .'">'. $title . $sub_title .' </div>';

    return $output;
  }
}
add_shortcode( 'livesay_section_title', 'livesay_section_title_function' );
