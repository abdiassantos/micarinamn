<?php
/* ==========================================================
  Livesay Gallery
=========================================================== */
if ( !function_exists('livesay_gallery_function')) {
  function livesay_gallery_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'livesay_gallery_items'  => '',
      'gallery_img' => '',
      'class'  => '',

      // Carousel
      'slick_dots'  => '',
      'slick_nav'  => '',
      'carousel_autoplay' => '',
      'carousel_autoplay_timeout' => '',
    ), $atts));

    // Group Field
    $livesay_gallery_items = (array) vc_param_group_parse_atts( $livesay_gallery_items );
    $get_each_list = array();
    foreach ( $livesay_gallery_items as $gallery_item ) {
      $each_list = $gallery_item;
      $each_list['gallery_img'] = isset( $gallery_item['gallery_img'] ) ? $gallery_item['gallery_img'] : '';
      $get_each_list[] = $each_list;
    }

    // Carousel Data's
    $slick_dots = $slick_dots ? 'data-dots="'. $slick_dots .'"' : '';
    $slick_nav = $slick_nav ? 'data-nav="'. $slick_nav .'"' : '';
    $carousel_autoplay = $carousel_autoplay ? 'data-autoplay="'. $carousel_autoplay .'"' : '';
    $carousel_autoplay_timeout = $carousel_autoplay_timeout ? 'data-autoplay-time="'. $carousel_autoplay_timeout .'"' : '';
     $output = '';
     $output .= '<div class="lvsy-event-files"><div class="lvsy-carousel '. $class . '" data-items="1" data-margin="0" data-loop="true" '. $slick_dots .' '. $slick_nav .' '.$carousel_autoplay.' '.$carousel_autoplay_timeout.' data-tablet="1" data-laptop="1" data-mobile="1">';

     // Group Param Output
     foreach ( $get_each_list as $each_list ) {
      //Logo
      $image_url = wp_get_attachment_url( $each_list['gallery_img'] );
      $gallery_img_actual = $each_list['gallery_img'] ? '<div class="item"><img src="'.$image_url.'" alt=""></div>' : '';

      $output .= $gallery_img_actual;
    }

    $output .= '</div></div>';

    return $output;
  }
}
add_shortcode( 'livesay_gallery', 'livesay_gallery_function' );
