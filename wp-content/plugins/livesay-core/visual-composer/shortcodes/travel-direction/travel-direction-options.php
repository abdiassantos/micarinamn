<?php
/**
 * Services - Shortcode Options
 */
add_action( 'init', 'lvsy_travel_direction_vc_map' );
if ( ! function_exists( 'lvsy_travel_direction_vc_map' ) ) {
  function lvsy_travel_direction_vc_map() {
    vc_map( array(
      "name" => __( "Travel Direction", 'livesay-core'),
      "base" => "lvsy_travel_direction",
      "description" => __( "Travel Direction Shortcodes", 'livesay-core'),
      "icon" => "fa fa-map-signs color-brown",
      "category" => LivesayLib::lvsy_cat_name(),
      "params" => array(

        array(
          "type"      => 'textfield',
          "heading"   => __('Start Point Text', 'livesay-core'),
          "param_name" => "start_txt",
          "value"      => "",
          "description" => __( "Enter your start point text.", 'livesay-core')
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('End Point Text', 'livesay-core'),
          "param_name" => "end_txt",
          "value"      => "",
          "description" => __( "Enter your end point text.", 'livesay-core')
        ),
        LivesayLib::vt_notice_field(__( "Travel Mode", 'livesay-core' ),'cntara_opt','cs-warning', ''), // Notice
        array(
          "type" => "switcher",
          "heading" => __( "Hide Driving", 'livesay-core' ),
          "param_name" => "hide_driving",
          "on_text" => __( "Yes", 'livesay-core' ),
          "off_text" => __( "No", 'livesay-core' ),
          "value" => '',
          "description" => __( "Driving travel mode will hide, if enabled.", 'livesay-core')
        ),
        array(
          "type" => "switcher",
          "heading" => __( "Hide Bicylcing", 'livesay-core' ),
          "param_name" => "hide_bicylcing",
          "on_text" => __( "Yes", 'livesay-core' ),
          "off_text" => __( "No", 'livesay-core' ),
          "value" => '',
          "description" => __( "Bicylcing travel mode will hide, if enabled.", 'livesay-core')
        ),
        array(
          "type" => "switcher",
          "heading" => __( "Hide Public Transport", 'livesay-core' ),
          "param_name" => "hide_public",
          "on_text" => __( "Yes", 'livesay-core' ),
          "off_text" => __( "No", 'livesay-core' ),
          "value" => '',
          "description" => __( "Public Transport travel mode will hide, if enabled.", 'livesay-core')
        ),
        array(
          "type" => "switcher",
          "heading" => __( "Hide Walking", 'livesay-core' ),
          "param_name" => "hide_walking",
          "on_text" => __( "Yes", 'livesay-core' ),
          "off_text" => __( "No", 'livesay-core' ),
          "value" => '',
          "description" => __( "Walking travel mode will hide, if enabled.", 'livesay-core')
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Button Text', 'livesay-core'),
          "param_name" => "btn_txt",
          "value"      => "",
          "description" => __( "Enter your button text.", 'livesay-core')
        ),

        LivesayLib::vt_class_option(),

      )
    ) );
  }
}
