<?php
/**
 * Event Schedule - Shortcode Options
 */
add_action( 'init', 'livesay_schedule_vc_map' );
if ( ! function_exists( 'livesay_schedule_vc_map' ) ) {
  function livesay_schedule_vc_map() {
    vc_map( array(
      "name" => __( "Event Schedule", 'livesay-core'),
      "base" => "livesay_schedule",
      "description" => __( "Schedule Styles", 'livesay-core'),
      "icon" => "fa fa-calendar color-orange",
      "category" => LivesayLib::lvsy_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Schedule Style', 'livesay-core' ),
          'value' => array(
            __( 'Style 1', 'livesay-core' ) => 'style_one',
            __( 'Style 2', 'livesay-core' ) => 'style_two',
          ),
          'admin_label' => true,
          'param_name' => 'schedule_style',
          'description' => __( 'Select your schedule style.', 'livesay-core' ),
        ),

        // Schedule Items
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Schedules', 'livesay-core' ),
          'param_name' => 'schedule_items',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              "type"      => 'textfield',
              "heading"   => __('Enter Author Name', 'livesay-core'),
              "param_name" => "author_name",
              "value"      => "",
              'admin_label' => true,
              "description" => __( "Enter your author name.", 'livesay-core'),
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              "type"      => 'textfield',
              "heading"   => __('Enter Author Link', 'livesay-core'),
              "param_name" => "author_link",
              "value"      => "",
              'admin_label' => true,
              "description" => __( "Enter your author name.", 'livesay-core'),
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              "type"      => 'textfield',
              "heading"   => __('Enter Time', 'livesay-core'),
              "param_name" => "author_time",
              "value"      => "",
              "description" => __( "Enter your topic start time.", 'livesay-core'),
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              'type' => 'dropdown',
              'heading' => __( 'Time in', 'livesay-core' ),
              'value' => array(
                __( 'AM', 'livesay-core' ) => 'am',
                __( 'PM', 'livesay-core' ) => 'pm',
                __( 'Hide', 'livesay-core' ) => '',
              ),
              'param_name' => 'time_in',
              "description" => __( "Select your time in as AM or PM.", 'livesay-core'),
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              "type"      => 'textfield',
              "heading"   => __('Place Title', 'livesay-core'),
              "param_name" => "place_title",
              "value"      => "",
              "description" => __( "Enter your place title Ex.Room .", 'livesay-core'),
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              "type"      => 'textfield',
              "heading"   => __('Place', 'livesay-core'),
              "param_name" => "place",
              "value"      => "",
              "description" => __( "Enter your place where this event is conducting Ex. Room 1.", 'livesay-core'),
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              "type"      => 'textfield',
              "heading"   => __('Topic Title', 'livesay-core'),
              "param_name" => "topic_title",
              "value"      => "",
              "description" => __( "Enter your topic title.", 'livesay-core'),
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              "type"      => 'textfield',
              "heading"   => __('Topic Link', 'livesay-core'),
              "param_name" => "topic_link",
              "value"      => "",
              "description" => __( "Enter your topic link.", 'livesay-core'),
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              "type"      => 'textfield',
              "heading"   => __('Speaker Name', 'livesay-core'),
              "param_name" => "topic_speaker",
              "value"      => "",
              "description" => __( "Enter your topic speaker name.", 'livesay-core'),
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              "type"      => 'textfield',
              "heading"   => __('Speaker Designation', 'livesay-core'),
              "param_name" => "speaker_designation",
              "value"      => "",
              "description" => __( "Enter your topic speaker designation.", 'livesay-core'),
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              "type"      => 'textarea',
              "heading"   => __('Topic Content', 'livesay-core'),
              "param_name" => "topic_content",
              "value"      => "",
              "description" => __( "Enter your topic content.", 'livesay-core'),
            ),
            array(
              "type"      => 'vt_icon',
              "heading"   => __('Set Duration Icon', 'livesay-core'),
              "param_name" => "duration_icon",
              "value"      => "",
              "description" => __( "Set your duration icon.", 'livesay-core'),
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              "type"      => 'textfield',
              "heading"   => __('Duration', 'livesay-core'),
              "param_name" => "topic_duration",
              "value"      => "",
              "description" => __( "Enter your topic duration in hours.", 'livesay-core'),
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              "type"      => 'vt_icon',
              "heading"   => __('Set Location Icon', 'livesay-core'),
              "param_name" => "location_icon",
              "value"      => "",
              "description" => __( "Set your location icon.", 'livesay-core'),
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              "type"      => 'textfield',
              "heading"   => __('Location', 'livesay-core'),
              "param_name" => "topic_location",
              "value"      => "",
              "description" => __( "Enter your topic location.", 'livesay-core'),
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              "type"      => 'textfield',
              "heading"   => __('Location Link', 'livesay-core'),
              "param_name" => "topic_location_link",
              "value"      => "",
              "description" => __( "Enter your topic location link.", 'livesay-core'),
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),

          )
        ),

        livesayLib::vt_class_option(),

      )
    ) );
  }
}
