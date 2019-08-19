<?php
/**
 * Travel Info - Shortcode Options
 */
add_action( 'init', 'lvsy_travel_vc_map' );
if ( ! function_exists( 'lvsy_travel_vc_map' ) ) {
  function lvsy_travel_vc_map() {
    vc_map( array(
      "name" => __( "Travel Info", 'livesay-core'),
      "base" => "lvsy_travel",
      "description" => __( "Travel Info Shortcodes", 'livesay-core'),
      "icon" => "fa fa-car color-blue",
      "category" => LivesayLib::lvsy_cat_name(),
      "params" => array(

        LivesayLib::vt_open_link_tab(),

        array(
          "type"      => 'vt_icon',
          "heading"   => __('Set Icon', 'livesay-core'),
          "param_name" => "travel_icon",
          "value"      => "",
          "description" => __( "Set your travel icon.", 'livesay-core'),
        ),
        LivesayLib::vt_notice_field(__( "Content Area", 'livesay-core' ),'cntara_opt','cs-warning', ''), // Notice
        array(
          "type"      => 'textfield',
          "heading"   => __('Travel Info Title', 'livesay-core'),
          "param_name" => "travel_title",
          "value"      => "",
          "description" => __( "Enter your travel info title.", 'livesay-core')
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Travel Info Title Link', 'livesay-core'),
          "param_name" => "travel_title_link",
          "value"      => "",
          "description" => __( "Enter your travel info title link.", 'livesay-core')
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Travel Info sub-Title', 'livesay-core'),
          "param_name" => "travel_sub_title",
          "value"      => "",
          "description" => __( "Enter your travel info sub-title.", 'livesay-core')
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Travel Time', 'livesay-core'),
          "param_name" => "travel_time",
          "value"      => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Enter your travel time.", 'livesay-core')
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Travel Time In', 'livesay-core'),
          "param_name" => "travel_time_in",
          "value"      => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Enter your travel time in (EX: Mins or hours).", 'livesay-core')
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Travel Distance', 'livesay-core'),
          "param_name" => "travel_distance",
          "value"      => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Enter your travel distance.", 'livesay-core')
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Travel Distance In', 'livesay-core'),
          "param_name" => "travel_distance_in",
          "value"      => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Enter your travel distance in (EX: Miles or Kms).", 'livesay-core')
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('View More Text', 'livesay-core'),
          "param_name" => "view_more",
          "value"      => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Enter your view more text.", 'livesay-core')
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('View More Link', 'livesay-core'),
          "param_name" => "view_more_link",
          "value"      => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Enter your view more link.", 'livesay-core')
        ),

        LivesayLib::vt_class_option(),

      )
    ) );
  }
}
