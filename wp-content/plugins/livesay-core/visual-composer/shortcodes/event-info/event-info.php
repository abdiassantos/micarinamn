<?php
/* ==========================================================
  Services
=========================================================== */
if ( !function_exists('lvsy_event_info_function')) {
  function lvsy_event_info_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'event_info_title'  => '',
      'class'  => '',

      // Style
      'title_color'  => '',
      'title_size'  => '',
      'content_color'  => '',
      'content_size'  => '',
    ), $atts));

    // fix unclosed/unwanted paragraph tags in $content
    $content = wpb_js_remove_wpautop($content, true);

    // Shortcode Style CSS
    $e_uniqid       = uniqid();
    $inline_style   = '';

    // Colors & Size

    if ( $title_color || $title_size) {
      $inline_style .= '.event-info-'.$e_uniqid.' .section-title {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. livesay_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }

    if ( $content_color || $content_size) {
      $inline_style .= '.event-info-'.$e_uniqid.' p {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. livesay_check_px($content_size) .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    livesay_add_inline_style( $inline_style );
    $styled_class  = ' event-info-'. $e_uniqid;

    // Event Info Title
    $event_info_title = $event_info_title ? '<div class="section-title">'.$event_info_title.'</div>' : '';

    $output = '';
    $output .= '<div class="lvsy-event-files '.$class.' '.$styled_class.'"><div class="file-info"><div class="vertical-scrollbox"><div class="lvsy-table-container"><div class="lvsy-align-container"><div class="section-title-wrap">'.$event_info_title.'</div>'.$content.'</div></div></div></div></div>';
    return $output;
  }
}
add_shortcode( 'lvsy_event_info', 'lvsy_event_info_function' );
