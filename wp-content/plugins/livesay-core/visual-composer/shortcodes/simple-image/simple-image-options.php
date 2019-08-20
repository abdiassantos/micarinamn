<?php
/**
 * Simple Image Link - Shortcode Options
 */
add_action( 'init', 'lvsy_image_link_vc_map' );
if ( ! function_exists( 'lvsy_image_link_vc_map' ) ) {
  function lvsy_image_link_vc_map() {
    vc_map( array(
      "name" => __( "Simple Image Link", 'livesay-core'),
      "base" => "lvsy_image_link",
      "description" => __( "Simple Image Link Shortcodes", 'livesay-core'),
      "icon" => "fa fa-picture-o color-blue",
      "category" => LivesayLib::lvsy_cat_name(),
      "params" => array(

        LivesayLib::vt_open_link_tab(),
        array(
          "type"      => 'attach_image',
          "heading"   => __('Upload Image', 'livesay-core'),
          "param_name" => "simple_image",
          "value"      => "",
          "description" => __( "Set your link image.", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Image Link', 'livesay-core'),
          "param_name" => "image_link",
          "value"      => "",
          "description" => __( "Enter your image link.", 'livesay-core')
        ),

        LivesayLib::vt_class_option(),

      )
    ) );
  }
}
