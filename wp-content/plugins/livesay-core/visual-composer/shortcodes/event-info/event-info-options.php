<?php
/**
 * File Info - Shortcode Options
 */
add_action( 'init', 'lvsy_event_info_vc_map' );
if ( ! function_exists( 'lvsy_event_info_vc_map' ) ) {
  function lvsy_event_info_vc_map() {
    vc_map( array(
      "name" => __( "Event Info", 'livesay-core'),
      "base" => "lvsy_event_info",
      "description" => __( "Event Info Shortcodes", 'livesay-core'),
      "icon" => "fa fa-calendar color-brown",
      "category" => LivesayLib::lvsy_cat_name(),
      "params" => array(

        LivesayLib::vt_notice_field(__( "Content Area", 'livesay-core' ),'cntara_opt','cs-warning', ''), // Notice
        array(
          "type"      => 'textfield',
          "heading"   => __('Event Info Title', 'livesay-core'),
          "param_name" => "event_info_title",
          "value"      => "",
          "description" => __( "Enter your event info title.", 'livesay-core')
        ),
        array(
          "type"      => 'textarea_html',
          "heading"   => __('Content', 'livesay-core'),
          "param_name" => "content",
          "value"      => "",
          "description" => __( "Enter your service content here.", 'livesay-core'),
          "Shortcode"   => true
        ),

        LivesayLib::vt_class_option(),

        // Style
        LivesayLib::vt_notice_field(__( "Title Styling", 'livesay-core' ),'tle_opt','cs-warning', 'Style'), // Notice

        array(
          "type"      => 'colorpicker',
          "heading"   => __('Title Color', 'livesay-core'),
          "param_name" => "title_color",
          "value"      => "",
          "description" => __( "Pick your heading color.", 'livesay-core'),
          "group" => __( "Style", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),

        array(
          "type"      => 'textfield',
          "heading"   => __('Title Size', 'livesay-core'),
          "param_name" => "title_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for title size in px.", 'livesay-core'),
          "group" => __( "Style", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Content Color', 'livesay-core'),
          "param_name" => "content_color",
          "value"      => "",
          "description" => __( "Pick your content color.", 'livesay-core'),
          "group" => __( "Style", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Content Size', 'livesay-core'),
          "param_name" => "content_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for content size in px.", 'livesay-core'),
          "group" => __( "Style", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
      )
    ) );
  }
}
