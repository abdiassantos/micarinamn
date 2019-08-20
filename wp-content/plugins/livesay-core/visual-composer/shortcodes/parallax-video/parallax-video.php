<?php
/* ==========================================================
  Livesay Gallery
=========================================================== */
if ( !function_exists('livesay_parallax_videos_function')) {
  function livesay_parallax_videos_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'parallax_video_style'  => '',
      'featured_img'  => '',
      'video_link' => '',
      'video_mp4_link' => '',
      'video_webm_link' => '',
      'video_ovg_link' => '',
      'video_height'  => '',
      'class'  => '',

    ), $atts));

    // Shortcode Style CSS
    $e_uniqid       = uniqid();
    $inline_style   = '';

    // Colors & Size
    if ( $video_height) {
      $inline_style .= '.parallax-video-'.$e_uniqid.'.lvsy-event-video {';
      $inline_style .= ( $video_height ) ? 'height:'. livesay_check_px($video_height) .';' : '';
      $inline_style .= '}';
    }
    if ( $video_height) {
      $inline_style .= '.parallax-video-'.$e_uniqid.'.lvsy-event-video.video-on {';
      $inline_style .= ( $video_height ) ? 'height:auto;' : '';
      $inline_style .= '}';
    }

    // add inline style
    livesay_add_inline_style( $inline_style );
    $styled_class  = ' parallax-video-'. $e_uniqid;

     $output = '';
     $image_url = wp_get_attachment_url( $featured_img );
     $bg_img = $image_url ? 'style="background-image:url('.$image_url.');"' : '';
     if ($parallax_video_style === 'style_two'){
      $output .= '<section class="lvsy-event-video lvsy-parallax '.$class.''.$styled_class.'" data-parallax="scroll" '.$bg_img.'><div class="video-wrap"><video loop controls tabindex="0" poster="'.$image_url.'" id="lvsy-video"><source src="'.$video_mp4_link.'" type="video/mp4"/><source src="'.$video_webm_link.'" type="video/webm"/><source src="'.$video_ovg_link.'" type="video/ogg"/>'.esc_html__('Your browser does not support the video tag' , 'livesay').'</video><div class="lvsy-control-btn"><a href="javascript:void(0);"></a></div></div></section>';
     } else {
     $output .= '<section class="lvsy-event-video lvsy-parallax '.$class.''.$styled_class.'" data-parallax="scroll" '.$bg_img.'><div class="video-wrap"><div class="lvsy-control-btn"><a href="'.$video_link.'" class="lvsy-gallery fancybox.iframe"></a></div></div></section>';
     }

    return $output;
  }
}
add_shortcode( 'livesay_parallax_videos', 'livesay_parallax_videos_function' );
