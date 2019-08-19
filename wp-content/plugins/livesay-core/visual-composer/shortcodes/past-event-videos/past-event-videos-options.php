<?php
/**
 * Past Event Videos - Shortcode Options
 */
add_action( 'init', 'livesay_past_event_videos_vc_map' );
if ( ! function_exists( 'livesay_past_event_videos_vc_map' ) ) {
  function livesay_past_event_videos_vc_map() {
    vc_map( array(
      "name" => __( "Past Event Videos", 'livesay-core'),
      "base" => "livesay_past_event_videos",
      "description" => __( "Past Event Videos", 'livesay-core'),
      "icon" => "fa fa-video-camera",
      "category" => LivesayLib::lvsy_cat_name(),
      "params" => array(

        array(
          "type"      => 'textfield',
          "heading"   => __('Past Event Videos Title', 'livesay-core'),
          "param_name" => "title",
          "value"      => "",
          "description" => __( "Set past event video title.", 'livesay-core')
        ),

        // Past Event Videos
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Past Event Videos List', 'livesay-core' ),
          'param_name' => 'past_event_videos_items',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              "type"      => 'attach_image',
              "heading"   => __('Upload Video Featured Image', 'livesay-core'),
              "param_name" => "featured_img",
              "value"      => "",
              "description" => __( "Set your video featured image.", 'livesay-core'),
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              "type"      => 'textfield',
              "heading"   => __('Enter Video Link', 'livesay-core'),
              "param_name" => "video_link",
              "value"      => "",
              "description" => __( "Set your video link.", 'livesay-core'),
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
          )
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Check More Videos Text', 'livesay-core'),
          "param_name" => "check_more_txt",
          "value"      => "",
          "description" => __( "Enter check more videos text.", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Check More Videos Link', 'livesay-core'),
          "param_name" => "check_more_link",
          "value"      => "",
          "description" => __( "Enter check more videos link.", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),

        livesayLib::vt_class_option(),

      )
    ) );
  }
}
