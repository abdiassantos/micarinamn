<?php
/**
 * Livesay Gallery - Shortcode Options
 */
add_action( 'init', 'livesay_gallery_masonry_vc_map' );
if ( ! function_exists( 'livesay_gallery_masonry_vc_map' ) ) {
  function livesay_gallery_masonry_vc_map() {
    vc_map( array(
      "name" => __( "Livesay Gallery Masonry", 'livesay-core'),
      "base" => "livesay_gallery_masonry",
      "description" => __( "Livesay Gallery Styles", 'livesay-core'),
      "icon" => "fa fa-picture-o color-orange",
      "category" => LivesayLib::lvsy_cat_name(),
      "params" => array(
        array(
          "type" => "dropdown",
          "heading" => __( "Gallery Column", 'livesay-core' ),
          "param_name" => "livesay_gallery_masonry_column",
          "value" => array(
            __('Select Column', 'livesay-core') => '',
            __('Column Three', 'livesay-core')  => 'col-md-4 col-sm-6',
            __('Column Four', 'livesay-core')   => 'col-md-3 col-sm-6',
          ),
          "description" => __( "Select gallery column.", 'livesay-core'),
        ),

        // Livesay Gallery
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Livesay Gallery List', 'livesay-core' ),
          'param_name' => 'livesay_gallery_masonry_items',
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
            array(
              "type" => "textfield",
              "heading" => __( "Title", 'livesay-core' ),
              "param_name" => "img_title",
              'value' => '',
              'admin_label' => true,
              "description" => __( "Enter gallery image title.", 'livesay-core'),
            ),
            array(
              "type" => "dropdown",
              "heading" => __( "Gallery Image Link", 'livesay-core' ),
              "param_name" => "gallery_masonry_link",
              "value" => array(
                __('Select Link Type', 'livesay-core') => '',
                __('Custom Link', 'livesay-core')  => 'custom_link',
                __('Pretty Pop-up', 'livesay-core')   => 'pretty_popup',
              ),
              "description" => __( "Select gallery image link.", 'livesay-core'),
            ),
            array(
              "type" => "textfield",
              "heading" => __( "Title Link", 'livesay-core' ),
              "param_name" => "img_title_link",
              'value' => '',
              'admin_label' => true,
              'dependency' => array(
                'element' => 'gallery_masonry_link',
                'value' => 'custom_link',
              ),
              "description" => __( "Enter gallery image title link.", 'livesay-core'),
            ),
          )
        ),

        livesayLib::vt_class_option(),
      )
    ) );
  }
}
