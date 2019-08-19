<?php
/* ==========================================================
  Services
=========================================================== */
if ( !function_exists('lvsy_travel_function')) {
  function lvsy_travel_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'travel_icon'  => '',
      'travel_title'  => '',
      'travel_title_link'  => '',
      'travel_sub_title'  => '',
      'travel_time'  => '',
      'travel_time_in'  => '',
      'travel_distance'  => '',
      'travel_distance_in' => '',
      'view_more' => '',
      'view_more_link' => '',
      'open_link'  => '',
      'class'  => '',

    ), $atts));

    // Travel Icon
    $travel_icon = $travel_icon ? '<div class="pull-left"><i class="'. $travel_icon .'" aria-hidden="true"></i></div>' : '';

    // Link Target
    $open_link = $open_link ? 'target="_blank"' : '';
    $travel_title_link = $travel_title_link ? '<a href="'.$travel_title_link.'">'.$travel_title.'</a>' : '<span class="info-title">'.$travel_title.'</span>';
    $travel_title = $travel_title ? '<h5>'.$travel_title_link.'</h5>' : '';
    $travel_sub_title = $travel_sub_title ? '<p>'.$travel_sub_title.'</p>' : '';
    $travel_time = $travel_time ? '<p><span>'.$travel_time.''.$travel_time_in.'</span></p>' : '';
    $travel_distance = $travel_distance ? '<p>'.$travel_distance.''.$travel_distance_in.'</p>' : '';
    $view_more_link = $view_more_link ? '<a href="'. $view_more_link .'" '. $open_link .'>'. $view_more .'</a>' : '<span>'. $view_more .'</span>';

    $output = '';
    $output .= '<div class="lvsy-travel '.$class.'">'.$travel_icon.'<div class="travel-info"><div class="row"><div class="col-md-8 col-sm-8">'.$travel_title.''.$travel_sub_title.'<div class="clearfix">'.$view_more_link.'</div></div><div class="col-md-4 col-sm-4"><div class="travel-time">'.$travel_time.''.$travel_distance.'</div></div></div></div></div>';
    return $output;
  }
}
add_shortcode( 'lvsy_travel', 'lvsy_travel_function' );
