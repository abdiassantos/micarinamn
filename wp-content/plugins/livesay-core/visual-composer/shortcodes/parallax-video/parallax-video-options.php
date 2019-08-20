<?php
/**
 * Past Event Videos - Shortcode Options
 */
add_action( 'init', 'livesay_parallax_video_vc_map' );
if ( ! function_exists( 'livesay_parallax_video_vc_map' ) ) {
  function livesay_parallax_video_vc_map() {
    vc_map( array(
      "name" => __( "Parallax Event Videos", 'livesay-core'),
      "base" => "livesay_parallax_videos",
      "description" => __( "Parallax Video", 'livesay-core'),
      "icon" => "fa fa-video-camera",
      "category" => LivesayLib::lvsy_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Parallax Video Style', 'livesay-core' ),
          'value' => array(
            __( 'Style One', 'livesay-core' ) => 'style_one',
            __( 'Style Two', 'livesay-core' ) => 'style_two',
          ),
          'admin_label' => true,
          'param_name' => 'parallax_video_style',
          'description' => __( 'Select your parallax video style.', 'livesay-core' ),
        ),

        array(
          "type"      => 'attach_image',
          "heading"   => __('Upload Video Cover Image', 'livesay-core'),
          "param_name" => "featured_img",
          "value"      => "",
          "description" => __( "Set your video cover image.", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Enter Video Link', 'livesay-core'),
          "param_name" => "video_link",
          "value"      => "",
          "description" => __( "Set your video link.", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'parallax_video_style',
            'value' => 'style_one',
          ),
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Video mp4 format Link', 'livesay-core'),
          "param_name" => "video_mp4_link",
          "value"      => "",
          "description" => __( "Set your video mp4 format link.", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'parallax_video_style',
            'value' => 'style_two',
          ),
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Video webm format Link', 'livesay-core'),
          "param_name" => "video_webm_link",
          "value"      => "",
          "description" => __( "Set your video webm format link.", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'parallax_video_style',
            'value' => 'style_two',
          ),
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Video ovg Format Link', 'livesay-core'),
          "param_name" => "video_ovg_link",
          "value"      => "",
          "description" => __( "Set your video ovg format link.", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'parallax_video_style',
            'value' => 'style_two',
          ),
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Video Height', 'livesay-core'),
          "param_name" => "video_height",
          "value"      => "",
          "description" => __( "Set your video height.", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        livesayLib::vt_class_option(),
      )
    ) );
  }
}
