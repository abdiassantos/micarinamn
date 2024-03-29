<?php
/* ==========================================================
  Tabs
=========================================================== */
if( ! function_exists( 'lvsy_vt_tabs_function' ) ) {
  function lvsy_vt_tabs_function( $atts, $content = '', $key = '' ) {

    global $vt_tabs;
    $vt_tabs = array();

    extract( shortcode_atts( array(
      'id'        => '',
      'tab_style' => '',
      'class'     => '',
      'active'    => 1,
    ), $atts ) );

    do_shortcode( $content );

    // is not empty
    if( empty( $vt_tabs ) ) { return; }

    $output       = '';
    $id           = ( $id ) ? ' id="'. $id .'"' : '';
    $active       = ( isset( $_REQUEST['tab'] ) ) ? $_REQUEST['tab'] : $active;
    $uniqtab      = uniqid();
    if ($tab_style === 'style-two') {
      $tab_style_class = 'lvsy-event-schedule schedule-tab-style-two ';
    } elseif($tab_style === 'style-three') {
      $tab_style_class = 'lvsy-event-schedule schedule-tab-style-two ';
    } elseif($tab_style === 'style-four') {
      $tab_style_class = 'lvsy-travel-info ';
    } else {
      $tab_style_class = 'nav-tabs-one ';
    }

    // begin output
    if($tab_style === 'style-three') {
      $output  .= '<div class="tab-content"><div'. $id .' class="'. $tab_style_class . $class .'">';
    } else {
      $output  .= '<div'. $id .' class="'. $tab_style_class . $class .'">';
    }

      // tab-navs
      $output  .= '<ul class="nav nav-tabs">';
      foreach( $vt_tabs as $key => $tab ){
        $title      = $tab['atts']['title'];
        $icon       = ( !empty( $tab['atts']['icon'] ) ) ? '<i class="'. $tab['atts']['icon'] .'"></i>': '';
        $active_nav = ( ( $key + 1 ) == $active ) ? ' class="active"' : '';
        $output    .= '<li'. $active_nav .'><a href="#'. $uniqtab .'-'. $key .'" data-toggle="tab">'. $icon . $title . '</a></li>';
      }
      $output  .= '</ul>';

      // tab-contents
      $output  .= '<div class="tab-content">';
      foreach( $vt_tabs as $key => $tab ){
        $title           = $tab['atts']['title'];
        $active_content  = ( ( $key + 1 ) == $active ) ? ' in active' : '';
        $output         .= '<div id="'. $uniqtab .'-'. $key .'" class="tab-pane fade'. $active_content .'">'. do_shortcode( $tab['content'] ) .'</div>';
      }
      $output  .= '</div>';
  if($tab_style === 'style-three') {
    $output  .= '</div></div>';
  } else {
    $output  .= '</div>';
  }
    // end output

    return $output;
  }
  add_shortcode( 'vt_tabs', 'lvsy_vt_tabs_function' );
}

/* ==========================================================
  Tab
=========================================================== */
if( ! function_exists( 'lvsy_vt_tab_function' ) ) {
  function lvsy_vt_tab_function( $atts, $content = '', $key = '' ) {
    global $vt_tabs;
    $vt_tabs[]  = array( 'atts' => $atts, 'content' => $content );
    return;
  }
  add_shortcode('vt_tab', 'lvsy_vt_tab_function');
}