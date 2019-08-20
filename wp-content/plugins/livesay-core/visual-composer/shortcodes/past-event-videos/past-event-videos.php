<?php
/* ==========================================================
  Livesay Gallery
=========================================================== */
if ( !function_exists('livesay_past_event_videos_function')) {
  function livesay_past_event_videos_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'title'  => '',
      'past_event_videos_items'  => '',
      'featured_img' => '',
      'video_link' => '',
      'check_more_txt' => '',
      'check_more_link' => '',
      'class'  => '',

    ), $atts));

    $event_title = $title ? '<h5>'.$title.'</h5>' : '';
    $check_more = $check_more_link ? '<a href="'.$check_more_link.'">'.$check_more_txt.'</a>' : '<span>'.$check_more_txt.'</span>';
    $check_more_actual = $check_more_txt ? $check_more : '';

    // Group Field
    $past_event_videos = (array) vc_param_group_parse_atts( $past_event_videos_items );
    $get_each_list = array();
    foreach ( $past_event_videos as $video_item ) {
      $each_list = $video_item;
      $each_list['featured_img'] = isset( $video_item['featured_img'] ) ? $video_item['featured_img'] : '';
      $each_list['video_link'] = isset( $video_item['video_link'] ) ? $video_item['video_link'] : '';
      $get_each_list[] = $each_list;
    }

     $output = '';
     $output .= '<div class="event-videos"><div class="lvsy-container"><div class="row">';
     $output .= $event_title;
     // Group Param Output
     foreach ( $get_each_list as $each_list ) {
      $output .= '<div class="col-md-4 col-sm-4"><div class="video-item '. $class .'">';

      $image_url = wp_get_attachment_url( $each_list['featured_img'] );
      $featured_img_actual = $each_list['featured_img'] ? '<img src="'.$image_url.'" alt="video">' : '';
      $video_link = $each_list['video_link'] ? '<div class="lvsy-control-btn"><a href="'.$each_list['video_link'].'" class="lvsy-gallery fancybox.iframe"></a></div>' : '';

      $output .= ''.$featured_img_actual.$video_link.'</div></div>';
    }
    $output .= '</div><div class="more-videos">'.$check_more_actual.'</div></div>';
    $output .= '</div>';
    return $output;
  }
}
add_shortcode( 'livesay_past_event_videos', 'livesay_past_event_videos_function' );
