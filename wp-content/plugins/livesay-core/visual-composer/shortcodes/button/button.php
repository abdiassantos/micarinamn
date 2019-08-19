<?php
/* ===========================================================
    Button
=========================================================== */
if ( !function_exists('lvsy_button_function')) {
  function lvsy_button_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'button_text'  => '',
      'button_link'  => '',
      'open_link'  => '',
      'simple_hover'  => '',
      'align_right'  => '',
      'class'  => '',
      // Styling
      'text_color'  => '',
      'text_hover_color'  => '',
      'btn_bg_hover_color'  => '',
      'btn_bg_color'  => '',
      'border_color'  => '',
      'border_hover_color'  => '',
      'text_size'  => '',
      // Design
      'css' => ''
    ), $atts));

    // Design Tab
    $custom_css = ( function_exists( 'vc_shortcode_custom_css_class' ) ) ? vc_shortcode_custom_css_class( $css, ' ' ) : '';

    // Shortcode Style CSS
    $e_uniqid     = uniqid();
    $inline_style = '';

    // Button Text Color
    if ( $text_color ) {
      $inline_style .= '.lvsy-btn-'. $e_uniqid .' a.lvsy-btn {';
      $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
      $inline_style .= '}';
    }
    // Button Text Hover Color
    if ( $text_hover_color ) {
      $inline_style .= '.lvsy-btn-'. $e_uniqid .' :hover, .lvsy-btn-'. $e_uniqid .':focus, .lvsy-btn-'. $e_uniqid .':active {';
      $inline_style .= ( $text_hover_color ) ? 'color:'. $text_hover_color .' !important;' : '';
      $inline_style .= '}';
    }
    // Text Size
    if ( $text_size ) {
      $inline_style .= '.lvsy-btn-'. $e_uniqid .' a.lvsy-btn {';
      $inline_style .= ( $text_size ) ? 'font-size:'. livesay_core_check_px($text_size) .';' : '';
      $inline_style .= '}';
    }
    // Button BG Color
    if ( $btn_bg_color ) {
      $inline_style .= '.lvsy-btn-'. $e_uniqid .' a.lvsy-btn {';
      $inline_style .= ( $btn_bg_color ) ? 'background-color:'. $btn_bg_color .';' : '';
      $inline_style .= '}';
    }
    // Button Border Color
    if ( $border_color ) {
      $inline_style .= '.lvsy-btn-'. $e_uniqid .' a.lvsy-btn {';
      $inline_style .= ( $border_color ) ? 'border-color:'. $border_color .';' : '';
      $inline_style .= '}';
    }
    // Button Hover Color
    if ( $btn_bg_hover_color || $border_hover_color ) {
      $inline_style .= '.lvsy-btn-'. $e_uniqid .' a.lvsy-btn:hover, .lvsy-btn-'. $e_uniqid .' a.lvsy-btn:focus, .lvsy-btn-'. $e_uniqid .' a.lvsy-btn:active {';
      $inline_style .= ( $btn_bg_hover_color ) ? 'background-color:'. $btn_bg_hover_color .' !important;' : '';
      $inline_style .= ( $border_hover_color ) ? 'border-color: '. $border_hover_color .' !important;' : '';
      $inline_style .= '}';
    }

    // add inline style
    livesay_add_inline_style( $inline_style );
    $styled_class  = ' lvsy-btn-'. $e_uniqid;

    if($align_right){
      $align_cls = 'pull-right ';
    } else {
      $align_cls = 'clearfix';
    }

    // Styling
    $open_link = $open_link ? ' target="_blank"' : '';
    $button_link = $button_link ? '<a href="'. $button_link .'"'.$open_link.' class="lvsy-btn lvsy-btn-black">'.$button_text.'</a>' : '<span class="lvsy-btn lvsy-btn-black">'.$button_text.'</span>';
    $button_text = $button_text ? ''. $button_link .'' : '';
    $simple_hover = $simple_hover ? '' : ' btn-hover-one';

    $output = '<div class="'.$align_cls. $custom_css . $styled_class . $simple_hover .' '. $class .'" >'. $button_text .'</div>';

    return $output;

  }
}
add_shortcode( 'lvsy_button', 'lvsy_button_function' );
