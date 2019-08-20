<?php
/**
 * Livesay Gallery - Shortcode Options
 */
add_action( 'init', 'livesay_gallery_slider_vc_map' );
if ( ! function_exists( 'livesay_gallery_slider_vc_map' ) ) {
  function livesay_gallery_slider_vc_map() {
    vc_map( array(
      "name" => __( "Livesay Gallery Slider", 'livesay-core'),
      "base" => "livesay_gallery",
      "description" => __( "Livesay Gallery Styles", 'livesay-core'),
      "icon" => "fa fa-picture-o color-green",
      "category" => LivesayLib::lvsy_cat_name(),
      "params" => array(

        // Livesay Gallery
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Livesay Gallery List', 'livesay-core' ),
          'param_name' => 'livesay_gallery_items',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              "type"      => 'attach_image',
              "heading"   => __('Upload Livesay Gallery Image', 'livesay-core'),
              "param_name" => "gallery_img",
              "value"      => "",
              "description" => __( "Set your accommodation image.", 'livesay-core'),
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
          )
        ),

        livesayLib::vt_class_option(),

        // Carousel
        array(
          "type"        => "notice",
          "heading"     => __( "Basic Options", 'livesay-core' ),
          "param_name"  => 'bsic_opt',
          'class'       => 'cs-warning',
          'value'       => '',
          "group"       => __('Carousel', 'livesay-core'),
        ),

        array(
          "type" => "switcher",
          "heading" => __( "Dots", 'livesay-core' ),
          "group" => __( "Carousel", 'livesay-core' ),
          "param_name" => "slick_dots",
          "on_text" => __( "Yes", 'livesay-core' ),
          "off_text" => __( "No", 'livesay-core' ),
          "value" => '',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "If you want Carousel Dots, enable it.", 'livesay-core')
        ),
        array(
          "type" => "switcher",
          "heading" => __( "Navigation", 'livesay-core' ),
          "group" => __( "Carousel", 'livesay-core' ),
          "param_name" => "slick_nav",
          "on_text" => __( "Yes", 'livesay-core' ),
          "off_text" => __( "No", 'livesay-core' ),
          "value" => '',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "If you want Carousel Navigation, enable it.", 'livesay-core')
        ),
        array(
          "type" => "switcher",
          "heading" => __( "Autoplay", 'livesay-core' ),
          "group" => __( "Carousel", 'livesay-core' ),
          "param_name" => "carousel_autoplay",
          "on_text" => __( "Yes", 'livesay-core' ),
          "off_text" => __( "No", 'livesay-core' ),
          "value" => '',
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          "description" => __( "If you want to start Carousel automatically, enable it.", 'livesay-core')
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Autoplay Timeout", 'livesay-core' ),
          "group" => __( "Carousel", 'livesay-core' ),
          "param_name" => "carousel_autoplay_timeout",
          'value' => '',
          "description" => __( "Change carousel Autoplay timing value. Default : 5000. Means 5 seconds.", 'livesay-core')
        ),

      )
    ) );
  }
}
