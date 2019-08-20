<?php
/* Call to Action */
if ( !function_exists('lvsy_ctas_function')) {
  function lvsy_ctas_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'class'  => '',
    ), $atts));

    // Output
    $output   = '<div class="lvsy-join-event '.$class.'"><div class="container"><div class="row">';
    $output  .= do_shortcode($content);
    $output  .= '</div></div></div>';
    return $output;

  }
}
add_shortcode( 'lvsy_ctas', 'lvsy_ctas_function' );

/* Call to Action */
if ( !function_exists('lvsy_cta_function')) {
  function lvsy_cta_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'content_width'  => '',
      'cta_title'  => '',
      'cta_sub_title'  => '',
      'title_color'  => '',
      'sub_title_color'  => '',
      'title_size'  => '',
      'sub_title_size'  => '',
      'class'  => '',
    ), $atts));

        // Shortcode Style CSS
    $e_uniqid       = uniqid();
    $inline_style   = '';

    // Colors & Size
    if ( $title_color || $title_size) {
      $inline_style .= '.event-'.$e_uniqid.' .section-title {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. livesay_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $sub_title_color || $sub_title_size) {
      $inline_style .= '.event-'.$e_uniqid.' .section-sub-title {';
      $inline_style .= ( $sub_title_color ) ? 'color:'. $sub_title_color .';' : '';
      $inline_style .= ( $sub_title_size ) ? 'font-size:'. livesay_check_px($sub_title_size) .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    livesay_add_inline_style( $inline_style );
    $styled_class  = ' event-'. $e_uniqid;

    // fix unclosed/unwanted paragraph tags in $content
    $content = wpb_js_remove_wpautop($content, true);
    $content = $content ? do_shortcode($content) : '';
    $content_width = $content_width ? 'style="width:'. $content_width .';"' : '';
    $cta_title = $cta_title ? '<div class="section-title">'. $cta_title .'</div>' : '';
    $cta_sub_title = $cta_sub_title ? '<div class="section-sub-title">'. $cta_sub_title .'</div>' : '';

    // Output
    return '<div class="lvsy-cta-ctnt '.$styled_class.'" '. $content_width .'><div class="section-title-wrap '. $class .'">'. $cta_title .''. $cta_sub_title .'</div></div>';

  }
}
add_shortcode( 'lvsy_cta', 'lvsy_cta_function' );
