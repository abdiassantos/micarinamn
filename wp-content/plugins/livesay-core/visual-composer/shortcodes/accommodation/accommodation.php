<?php
/* ==========================================================
  Accommodation
=========================================================== */
if ( !function_exists('livesay_accommodation_function')) {
  function livesay_accommodation_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'accommodation_items'  => '',
      'accommodation_img' => '',
      'accommodation_title' => '',
      'accommodation_venue_txt' => '',
      'accommodation_rate_text' => '',
      'website_txt' => '',
      'website_link' => '',
      'class'  => '',

      // Carousel
      'slick_loop'  => '',
      'slick_carousel' => '',
      'slick_items'  => '',
      'slick_dots'  => '',
      'slick_nav'  => '',
      'slick_autoplay_timeout'  => '',
      'slick_autoplay'  => '',
      'slick_laptop'  => '',
      'slick_tablet'  => '',
      'slick_mobile'  => '',

      // Style
      'title_color'  => '',
      'title_size'  => '',
      'title_hover_color'  => '',
      'content_color' => '',
      'content_size' => '',
      'website_color' => '',
      'website_hover_color' => '',
      'website_size' => '',
    ), $atts));

    // Group Field
    $accommodation_items = (array) vc_param_group_parse_atts( $accommodation_items );
    $get_each_list = array();
    foreach ( $accommodation_items as $accommodation_item ) {
      $each_list = $accommodation_item;
      $each_list['accommodation_img'] = isset( $accommodation_item['accommodation_img'] ) ? $accommodation_item['accommodation_img'] : '';
      $each_list['accommodation_title'] = isset( $accommodation_item['accommodation_title'] ) ? $accommodation_item['accommodation_title'] : '';
      $each_list['website_link'] = isset( $accommodation_item['website_link'] ) ? $accommodation_item['website_link'] : '';
      $each_list['accommodation_venue_txt'] = isset( $accommodation_item['accommodation_venue_txt'] ) ? $accommodation_item['accommodation_venue_txt'] : '';
      $each_list['accommodation_rate_text'] = isset( $accommodation_item['accommodation_rate_text'] ) ? $accommodation_item['accommodation_rate_text'] : '';
      $each_list['website_txt'] = isset( $accommodation_item['website_txt'] ) ? $accommodation_item['website_txt'] : '';
      $get_each_list[] = $each_list;
    }

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    if ( $title_size || $title_color ) {
      $inline_style .= '.accommodation-'. $e_uniqid .' .accommodation-title a, .accommodation-'. $e_uniqid .' .accommodation-title span {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. livesay_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $title_hover_color ) {
      $inline_style .= '.accommodation-'. $e_uniqid .' .accommodation-title a:hover {';
      $inline_style .= ( $title_hover_color ) ? 'color:'. $title_hover_color .';' : '';
      $inline_style .= '}';
    }
    if ( $content_color || $content_size ) {
      $inline_style .= '.accommodation-'. $e_uniqid .' .accommodation-info p {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. livesay_check_px($content_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $website_size || $website_color ) {
      $inline_style .= '.accommodation-'. $e_uniqid .' .clearfix a, .accommodation-'. $e_uniqid .' .clearfix span {';
      $inline_style .= ( $website_color ) ? 'color:'. $website_color .';' : '';
      $inline_style .= ( $website_size ) ? 'font-size:'. livesay_check_px($website_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $website_hover_color ) {
      $inline_style .= '.accommodation-'. $e_uniqid .' .clearfix a:hover {';
      $inline_style .= ( $website_hover_color ) ? 'color:'. $website_hover_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    livesay_add_inline_style( $inline_style );
    $styled_class  = ' accommodation-'. $e_uniqid;

    // Items
    $slick_items = $slick_items ? 'data-items="'. $slick_items .'"' : '';
    $slick_laptop = $slick_laptop ? 'data-laptop="'. $slick_laptop .'"' : '';
    $slick_tablet = $slick_tablet ? 'data-tablet="'. $slick_tablet .'"' : '';
    $slick_mobile = $slick_mobile ? 'data-mobile="'. $slick_mobile .'"' : '';

    // Slide Functions
    $slick_autoplay = $slick_autoplay ? 'data-autoplay="'. $slick_autoplay .'"' : '';
    $slick_autoplay_timeout = $slick_autoplay_timeout ? 'data-autoplay-time="'. $slick_autoplay_timeout .'"' : '';
    $slick_loop = $slick_loop ? 'data-loop="'. $slick_loop .'"' : '';

    // Carousel Data's
    $slick_dots = $slick_dots ? 'data-dots="'. $slick_dots .'"' : '';
    $slick_nav = $slick_nav ? 'data-nav="'. $slick_nav .'"' : '';
    if($slick_carousel) {
         $output = '<div class="lvsy-accommodation '. $class . $styled_class .'"><div class="lvsy-carousel" '.$slick_loop .' '. $slick_items . ' '. $slick_laptop .' '. $slick_dots .' '. $slick_nav .' '. $slick_autoplay_timeout .' '. $slick_autoplay .' '. $slick_tablet .' '. $slick_mobile.'>';
    } else {
      $output = '<div class="lvsy-accommodation accommodation-style-two '. $class . $styled_class .'">';
    }

     // Group Param Output
     foreach ( $get_each_list as $each_list ) {
      //Logo
      $image_url = wp_get_attachment_url( $each_list['accommodation_img'] );
      if($slick_carousel) {
        $output .= '<div class="item"><div class="accommodation-item">';
      } else {
        $output .= '<div class="col-md-4 col-sm-6"><div class="accommodation-item">';
      }

      $acc_img = $each_list['accommodation_img'] ? '<div class="accommodation-picture"><img src="'.$image_url.'" alt="'.$each_list['accommodation_title'].'"></div>' : '';
      $acc_title_link = $each_list['website_link'] ? '<a href="'.$each_list['website_link'].'" target="_blank">'.$each_list['accommodation_title'].'</a>': '<span>'.$each_list['accommodation_title'].'</span>';
      $acc_title = $each_list['accommodation_title'] ? '<div class="accommodation-title">'.$acc_title_link.'</div>': '';
      $acc_venue_txt = $each_list['accommodation_venue_txt'] ? '<p>'.$each_list['accommodation_venue_txt'].'</p>' : '';
      $acc_rate_txt = $each_list['accommodation_rate_text'] ? '<p>'.$each_list['accommodation_rate_text'].'</p>' : '';
      $acc_website_link = $each_list['website_link'] ? '<a href="'.$each_list['website_link'].'" target="_blank">'.$each_list['website_txt'].'</a>': '<span>'.$each_list['website_txt'].'</span>';
      $acc_web_txt = $each_list['website_txt'] ? '<div class="clearfix">'.$acc_website_link.'</div>' : '';

      $output .= ''. $acc_img .'<div class="accommodation-info">' .$acc_title . $acc_venue_txt . $acc_rate_txt . $acc_web_txt . '</div>' ;
      $output .= '</div></div>';
    }
    if($slick_carousel) {
        $output .= '</div></div>';
    } else {
        $output .= '</div>';
    }

    return $output;
  }
}
add_shortcode( 'livesay_accommodation', 'livesay_accommodation_function' );
