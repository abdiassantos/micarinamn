<?php
/* ===========================================================
    Pricing
=========================================================== */
if ( !function_exists('livesay_pricing_function')) {
  function livesay_pricing_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'pricing_style'  => '',
      'plan_title'         => '',
      'plan_icon'     => '',
      'price'         => '',
      'price_in'      => '',
      'price_caption'    => '',
      'btn_text'      => '',
      'btn_link'      => '',
      'class'         => '',
      'pricing_features' => '',
    ), $atts));

    // Group Field
    $pricing_features = (array) vc_param_group_parse_atts( $pricing_features );

    // Atts
    $uniqtab     = uniqid();
    $plan_icon  = $plan_icon ? '<i class="icons '.$plan_icon.'"></i>' : '';
    $plan_title = $plan_title ? '<h5>'.$plan_title.'</h5>' : '';
    $price_in = $price_in ? $price_in : '$';
    if($pricing_style === 'style_two') {
      $price = $price ? '<div class="price">'.$plan_title.'<h2><sup>'.$price_in.'</sup>'.$price.'<sub class="price-type">'.$price_caption.'</sub></h2></div>' : '';
      $btn_class = '';
    } else {
      $price = $price ? '<div class="price"><h2><sup>'.$price_in.'</sup>'.$price.'<span>'.$price_caption.'</span></h2></div>' : '';
      $btn_class = 'lvsy-btn-small';
    }
    $btn_text = $btn_text ? $btn_text : esc_attr('Buy Now', 'livesay_core');
    $btn_link = $btn_link ? '<a href="'.$btn_link.'" class="lvsy-btn lvsy-btn-white '.$btn_class.'">'.$btn_text.'</a>' : '<span class="lvsy-btn lvsy-btn-white '.$btn_class.'">'.$btn_text.'</span>';

    if($pricing_style === 'style_two') {
      $pricing_class = 'pricing-style-two';
    } else {
      $pricing_class = 'pricing-spacer-two';
    }

    // Output
    if($pricing_style === 'style_two') {
      $output = '<div class="lvsy-pricing '.$pricing_class.'"><div class="pricing-item '.$class.'">'.$price.'<div class="pricing-info"><ul>';
    } else {
      $output = '<div class="lvsy-pricing '.$pricing_class.'"><div class="pricing-item '.$class.'">'.$price.'<div class="pricing-info">'.$plan_title.'<ul>';
    }

    // Foreach features
    $i = 1;
    foreach ( $pricing_features as $list_item ) {
      if(!isset($list_item['feature_avail'] )){
        $avail_class = 'fa-times-circle';
      } else {
        $avail_class = 'fa-check-circle';
      }
      if($pricing_style === 'style_two') {
        $output .= '<li>'.$list_item['title'].'</li>';
      } else {
        $output .= '<li><i class="fa '.$avail_class.'" aria-hidden="true"></i> <span>'.$list_item['title'].'</span></li>';
      }
    }
    // Foreach features

    $output .= '</ul><div class="clearfix">'.$btn_link.'</div></div></div></div>';

    return $output;

  }
}
add_shortcode( 'livesay_pricing', 'livesay_pricing_function' );
