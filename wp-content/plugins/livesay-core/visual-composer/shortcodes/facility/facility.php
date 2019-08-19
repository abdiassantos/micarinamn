<?php
/* ==========================================================
  Services
=========================================================== */
if ( !function_exists('lvsy_facility_function')) {
  function lvsy_facility_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'facility_image'  => '',
      'facility_image_link'  => '',
      'facility_title'  => '',
      'facility_title_link'  => '',
      'open_link'  => '',
      'class'  => '',

      // Style
      'title_color'  => '',
      'title_hover_color' => '',
      'title_size'  => '',
    ), $atts));

    // Shortcode Style CSS
    $e_uniqid       = uniqid();
    $inline_style   = '';

    // Colors & Size
    if ( $title_color || $title_size) {
      $inline_style .= '.facility-'.$e_uniqid.' .facility-title a, .facility-'.$e_uniqid.' .facility-title span {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. livesay_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $title_hover_color) {
      $inline_style .= '.facility-'.$e_uniqid.' .facility-title a:hover {';
      $inline_style .= ( $title_hover_color ) ? 'color:'. $title_hover_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    livesay_add_inline_style( $inline_style );
    $styled_class  = ' facility-'. $e_uniqid;

    // Link Target
    $open_link = $open_link ? 'target="_blank"' : '';

    // Service Image
    $icon_image_url = wp_get_attachment_url( $facility_image );
    $facility_image_link = $facility_image_link ? '<a href="'.$facility_image_link.'" '.$open_link.'><img src="'. $icon_image_url .'" alt="'.$facility_title.'"></a>' : '<span><img src="'. $icon_image_url .'" alt="'.$facility_title.'"></span>';
    $facility_image = $facility_image ? '<div class="facility-picture">'.$facility_image_link.'</div>' : '';

    // Service Title
    $facility_title_link = $facility_title_link ? '<a href="'.$facility_title_link.'">'.$facility_title.'</a>' : '<span>'.$facility_title.'</span>';
    $facility_title = $facility_title ? '<div class="facility-title">'.$facility_title_link.'</div>' : '';

    $output = '';
    $output .= '<div class="lvsy-conference-facilities '.$styled_class.' '.$class.'"><div class="facility-item">'.$facility_image.'<div class="facility-info">'.$facility_title.'</div></div></div>';
    return $output;
  }
}
add_shortcode( 'lvsy_facility', 'lvsy_facility_function' );
