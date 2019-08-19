<?php
/* ==========================================================
  Sponsors
=========================================================== */
if ( !function_exists('livesay_sponsors_function')) {
  function livesay_sponsors_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'sponsor_style'  => '',
      'sponsor_title'  => '',
      'logo_items'  => '',
      'class'  => '',
      // Style
      'title_color'  => '',
      'title_size'  => '',
      'border_color'  => '',
    ), $atts));

    // Group Field
    $logo_items = (array) vc_param_group_parse_atts( $logo_items );
    $get_each_list = array();
    foreach ( $logo_items as $logo_item ) {
      $each_list = $logo_item;
      $each_list['sponsor_logo'] = isset( $logo_item['sponsor_logo'] ) ? $logo_item['sponsor_logo'] : '';
      $each_list['logo_link'] = isset( $logo_item['logo_link'] ) ? $logo_item['logo_link'] : '';
      $get_each_list[] = $each_list;
    }

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    if ( $title_size || $title_color ) {
      $inline_style .= '.lvsy-donor-'. $e_uniqid .' .lvsy-donor-title {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. livesay_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $border_color ) {
      $inline_style .= '.lvsy-donor-'. $e_uniqid .' .lvsy-donor-item {';
      $inline_style .= ( $border_color ) ? 'border-color:'. $border_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    livesay_add_inline_style( $inline_style );
    $styled_class  = ' lvsy-donor-'. $e_uniqid;

      if ($sponsor_style === 'style_two') {
        $sponsor_class = 'lvsy-donors-style-two';
      } else {
        $sponsor_class = '';
      }

      $output ='<div class="lvsy-donors '.$sponsor_class.'"><div class="lvsy-donor-category '. $class . $styled_class .'">';
      if ($sponsor_style === 'style_two') {
        $output .= '';
      } else {
        $sponsor_title = $sponsor_title ? '<div class="lvsy-donor-title">'.$sponsor_title.'</div>' : '';
        $output .= $sponsor_title;
      }
    // Group Param Output
     foreach ( $get_each_list as $each_list ) {
      $image_url = wp_get_attachment_url( $each_list['sponsor_logo'] );
      $image_actual = $each_list['sponsor_logo'] ? '<img src="'.$image_url.'" alt="'.esc_attr('Sponso', 'livesay-core').'">' : '';
      $logo_link = $each_list['logo_link'] ? '<div class="lvsy-donor-item"><a href="'.$each_list['logo_link'].'" target="_blank">'.$image_actual.'</a></div>' : '<div class="lvsy-donor-item"><span>'.$image_actual.'</span></div>';
      $logo_exact = $each_list['sponsor_logo'] ? $logo_link : '';
      $output .= $logo_exact;
      }

    $output .= '</div></div>';

    return $output;
  }
}
add_shortcode( 'livesay_sponsors', 'livesay_sponsors_function' );
