<?php
/* ==========================================================
  Sponsors
=========================================================== */
if ( !function_exists('livesay_sponsors_content_function')) {
  function livesay_sponsors_content_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'sponsor_title'  => '',
      'logo_items'  => '',
      'logo_title' => '',
      'logo_title_link' => '',
      'logo_content' => '',
      'learn_more_txt' => '',
      'class'  => '',
      // Style
      'title_color'  => '',
      'title_size'  => '',
      'border_color'  => '',
      'logo_title_color' => '',
      'logo_title_hover_color' => '',
      'logo_title_size' => '',
      'logo_content_color' => '',
      'logo_content_size' => '',
      'learn_more_color' => '',
      'learn_more_hover_color' => '',
      'learn_more_size' => '',
    ), $atts));

    // Group Field
    $logo_items = (array) vc_param_group_parse_atts( $logo_items );
    $get_each_list = array();
    foreach ( $logo_items as $logo_item ) {
      $each_list = $logo_item;
      $each_list['sponsor_logo'] = isset( $logo_item['sponsor_logo'] ) ? $logo_item['sponsor_logo'] : '';
      $each_list['logo_link'] = isset( $logo_item['logo_link'] ) ? $logo_item['logo_link'] : '';
      $each_list['logo_title'] = isset( $logo_item['logo_title'] ) ? $logo_item['logo_title'] : '';
      $each_list['logo_title_link'] = isset( $logo_item['logo_title_link'] ) ? $logo_item['logo_title_link'] : '';
      $each_list['logo_content'] = isset( $logo_item['logo_content'] ) ? $logo_item['logo_content'] : '';
      $each_list['learn_more_txt'] = isset( $logo_item['learn_more_txt'] ) ? $logo_item['learn_more_txt'] : '';
      $each_list['learn_more_link'] = isset( $logo_item['learn_more_link'] ) ? $logo_item['learn_more_link'] : '';
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
    if ( $logo_title_size || $logo_title_color ) {
      $inline_style .= '.lvsy-donor-'. $e_uniqid .' .lvsy-donor-name a, .lvsy-donor-'. $e_uniqid .' .lvsy-donor-name span {';
      $inline_style .= ( $logo_title_color ) ? 'color:'. $logo_title_color .';' : '';
      $inline_style .= ( $logo_title_size ) ? 'font-size:'. livesay_check_px($logo_title_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $logo_title_hover_color ) {
      $inline_style .= '.lvsy-donor-'. $e_uniqid .' .lvsy-donor-name a:hover, .lvsy-donor-'. $e_uniqid .' .lvsy-donor-name span:hover {';
      $inline_style .= ( $logo_title_hover_color ) ? 'color:'. $logo_title_hover_color .';' : '';
      $inline_style .= '}';
    }
    if ( $logo_content_size || $logo_content_color ) {
      $inline_style .= '.lvsy-donor-'. $e_uniqid .' .lvsy-donor-item p {';
      $inline_style .= ( $logo_content_color ) ? 'color:'. $logo_content_color .';' : '';
      $inline_style .= ( $logo_content_size ) ? 'font-size:'. livesay_check_px($logo_content_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $learn_more_size || $learn_more_color ) {
      $inline_style .= '.lvsy-donor-'. $e_uniqid .' .clearfix a {';
      $inline_style .= ( $learn_more_color ) ? 'color:'. $learn_more_color .';' : '';
      $inline_style .= ( $learn_more_size ) ? 'font-size:'. livesay_check_px($learn_more_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $learn_more_hover_color ) {
      $inline_style .= '.lvsy-donor-'. $e_uniqid .' .clearfix:hover a, .lvsy-donor-'. $e_uniqid .' .clearfix:hover span {';
      $inline_style .= ( $learn_more_hover_color ) ? 'color:'. $learn_more_hover_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    livesay_add_inline_style( $inline_style );
    $styled_class  = ' lvsy-donor-'. $e_uniqid;

      $output ='<div class="lvsy-donors lvsy-donors-style-three"><div class="lvsy-donor-category '. $class . $styled_class .'">';

      $sponsor_title = $sponsor_title ? '<div class="lvsy-donor-title">'.$sponsor_title.'</div>' : '';
      $output .= $sponsor_title;

    // Group Param Output
     foreach ( $get_each_list as $each_list ) {
      //Logo
      $image_url = wp_get_attachment_url( $each_list['sponsor_logo'] );
      $output .='<div class="col-md-4 col-sm-6"><div class="lvsy-donor-item">';
      $logo_link = $each_list['logo_link'] ? '<div class="lvsy-donor-logo"><a href="'.$each_list['logo_link'].'"><img src="'.$image_url.'" alt="'.esc_attr('Sponsor', 'livesay-core').'"></a></div>' : '<div class="lvsy-donor-logo"><span><img src="'.$image_url.'" alt="'.esc_attr('Sponsor', 'livesay-core').'"></span></div>';
      $logo_exact = $each_list['sponsor_logo'] ? $logo_link : '';
      // Logo Heading
      $logo_title_link = $each_list['logo_title_link'] ? '<a href="'.$each_list['logo_title_link'].'">'.$each_list['logo_title'].'</a>' : '<span>'.$each_list['logo_title'].'</span>';
      $logo_title = $each_list['logo_title'] ? '<div class="lvsy-donor-name">'.$logo_title_link.'</div>' : '';

      // Logo Content
      $logo_content = $each_list['logo_content'] ? '<p>'.$each_list['logo_content']. '</p>': '';

      // Learn More
      $learn_more_link = $each_list['learn_more_link'] ? '<a href="'.$each_list['learn_more_link'].'">'.$each_list['learn_more_txt'].'</a>' : '<span>'.$each_list['learn_more_txt'].'</span>';
      $learn_more_txt = $each_list['learn_more_txt'] ? '<div class="clearfix">'.$learn_more_link.'</div>' : '';

      $output .= ''. $logo_exact . $logo_title . $logo_content . $learn_more_txt.'' ;
      $output .= '</div></div>';
      }

    $output .= '</div></div>';

    return $output;
  }
}
add_shortcode( 'livesay_sponsors_content', 'livesay_sponsors_content_function' );
