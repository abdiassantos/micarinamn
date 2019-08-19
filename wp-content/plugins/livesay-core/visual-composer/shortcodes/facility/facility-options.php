<?php
/**
 * Facility - Shortcode Options
 */
add_action( 'init', 'lvsy_facility_vc_map' );
if ( ! function_exists( 'lvsy_facility_vc_map' ) ) {
  function lvsy_facility_vc_map() {
    vc_map( array(
      "name" => __( "Facility", 'livesay-core'),
      "base" => "lvsy_facility",
      "description" => __( "Facility Shortcodes", 'livesay-core'),
      "icon" => "fa fa-check-square color-brown",
      "category" => LivesayLib::lvsy_cat_name(),
      "params" => array(

        LivesayLib::vt_open_link_tab(),
        array(
          "type"      => 'attach_image',
          "heading"   => __('Upload Facility Image', 'livesay-core'),
          "param_name" => "facility_image",
          "value"      => "",
          "description" => __( "Set your Facility image.", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Facility Image Link', 'livesay-core'),
          "param_name" => "facility_image_link",
          "value"      => "",
          "description" => __( "Enter your facility image link.", 'livesay-core')
        ),

        LivesayLib::vt_notice_field(__( "Content Area", 'livesay-core' ),'cntara_opt','cs-warning', ''), // Notice
        array(
          "type"      => 'textfield',
          "heading"   => __('Facility Title', 'livesay-core'),
          "param_name" => "facility_title",
          "value"      => "",
          "description" => __( "Enter your facility title.", 'livesay-core')
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Facility Title Link', 'livesay-core'),
          "param_name" => "facility_title_link",
          "value"      => "",
          "description" => __( "Enter your facility link.", 'livesay-core')
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
          "type"      => 'colorpicker',
          "heading"   => __('Title Hover Color', 'livesay-core'),
          "param_name" => "title_hover_color",
          "value"      => "",
          "description" => __( "Pick your heading hover color.", 'livesay-core'),
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

      )
    ) );
  }
}
