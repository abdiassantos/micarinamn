<?php
/* ==========================================================
  Services
=========================================================== */
if ( !function_exists('lvsy_services_function')) {
  function lvsy_services_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'service_img_type'  => '',
      'service_image'  => '',
      'service_icon'  => '',
      'service_title'  => '',
      'service_title_link'  => '',
      'read_more_link'  => '',
      'read_more_title'  => '',
      'open_link'  => '',
      'class'  => '',

      // Style
      'img_width'  => '',
      'title_color'  => '',
      'title_hover_color' => '',
      'title_size'  => '',
      'content_color'  => '',
      'content_size'  => '',
      'readmore_color'  => '',
      'readmore_hover_color'  => '',
      'readmore_size'  => '',
    ), $atts));

    // fix unclosed/unwanted paragraph tags in $content
    $content = wpb_js_remove_wpautop($content, true);

    // Shortcode Style CSS
    $e_uniqid       = uniqid();
    $inline_style   = '';

    // Colors & Size
    if ($img_width) {
      $inline_style .= '.services-'.$e_uniqid.' .service-icon img {';
      $inline_style .= ( $img_width ) ? 'width:'. livesay_check_px($img_width) .';' : '';
      $inline_style .= '}';
    }
    if ( $title_color || $title_size) {
      $inline_style .= '.services-'.$e_uniqid.' .service-title a, .services-'.$e_uniqid.' .service-title span {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. livesay_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $title_hover_color) {
      $inline_style .= '.services-'.$e_uniqid.' .service-title a:hover {';
      $inline_style .= ( $title_hover_color ) ? 'color:'. $title_hover_color .';' : '';
      $inline_style .= '}';
    }
    if ( $content_color || $content_size) {
      $inline_style .= '.services-'.$e_uniqid.' p {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. livesay_check_px($content_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $readmore_color || $readmore_size) {
      $inline_style .= '.services-'.$e_uniqid.' .clearfix a {';
      $inline_style .= ( $readmore_color ) ? 'color:'. $readmore_color .';' : '';
      $inline_style .= ( $readmore_size ) ? 'font-size:'. livesay_check_px($readmore_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $readmore_hover_color ) {
      $inline_style .= '.services-'.$e_uniqid.' .clearfix:hover a.services-read-more {';
      $inline_style .= ( $readmore_hover_color ) ? 'color:'. $readmore_hover_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    livesay_add_inline_style( $inline_style );
    $styled_class  = ' services-'. $e_uniqid;

    // Link Target
    $open_link = $open_link ? 'target="_blank"' : '';
    $read_more_link = $read_more_link ? '<a href="'. $read_more_link .'" class="services-read-more" '. $open_link .'>'. $read_more_title .'</a>' : '<span class="services-read-more">'. $read_more_title .'</span>';

    // Service Image
    if ($service_img_type === 'icon') {
      $service_icon = $service_icon ? '<div class="service-icon"><i class="'. $service_icon .'"></i></div>' : '';
    } else {
      $icon_image_url = wp_get_attachment_url( $service_image );
      $service_icon = $service_image ? '<div class="service-icon"><img src="'. $icon_image_url .'" alt="'.$service_title.'"/></div>' : '';
    }

    // Service Title
    $service_title_link = $service_title_link ? '<a href="'.$service_title_link.'">'.$service_title.'</a>' : '<span>'.$service_title.'</span>';
    $service_title = $service_title ? '<div class="service-title">'.$service_title_link.'</div>' : '';

    $output = '';
    $output .= '<div class="lvsy-services '.$styled_class.' '.$class.'"><div class="service-item">'.$service_icon.''.$service_title.''.$content.'<div class="clearfix">'.$read_more_link.'</div></div></div>';
    return $output;
  }
}
add_shortcode( 'lvsy_services', 'lvsy_services_function' );
