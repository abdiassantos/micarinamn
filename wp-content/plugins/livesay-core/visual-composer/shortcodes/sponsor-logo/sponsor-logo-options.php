<?php
/**
 * Sponsors - Shortcode Options
 */
add_action( 'init', 'livesay_sponsors_vc_map' );
if ( ! function_exists( 'livesay_sponsors_vc_map' ) ) {
  function livesay_sponsors_vc_map() {
    vc_map( array(
      "name" => __( "Sponsors Logo", 'livesay-core'),
      "base" => "livesay_sponsors",
      "description" => __( "Sponsor Styles", 'livesay-core'),
      "icon" => "fa fa-user color-orange",
      "category" => LivesayLib::lvsy_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Sponsor Style', 'livesay-core' ),
          'value' => array(
            __( 'Logo With Title', 'livesay-core' ) => 'style_one',
            __( 'Logo', 'livesay-core' ) => 'style_two',
          ),
          'admin_label' => true,
          'param_name' => 'sponsor_style',
          'description' => __( 'Select your sponsors style.', 'livesay-core' ),
        ),

        array(
          "type" => "textfield",
          "heading" => __( "Sponsors Title", 'livesay-core' ),
          "param_name" => "sponsor_title",
          'value' => '',
          'admin_label' => true,
          'dependency' => array(
            'element' => 'sponsor_style',
            'value' => 'style_one',
          ),
          "description" => __( "Enter your sponsor title.", 'livesay-core'),
        ),
        // Sponsor logos
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Logos', 'livesay-core' ),
          'param_name' => 'logo_items',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              "type"      => 'attach_image',
              "heading"   => __('Upload Sponsor Logo', 'livesay-core'),
              "param_name" => "sponsor_logo",
              "value"      => "",
              "description" => __( "Set your sponsor logo.", 'livesay-core'),
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              "type" => "textfield",
              "heading" => __( "Logo Link", 'livesay-core' ),
              "param_name" => "logo_link",
              'value' => '',
              "description" => __( "Enter your sponsor logo link.", 'livesay-core'),
            ),
          )
        ),

        livesayLib::vt_class_option(),

        // Style
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Title Color', 'livesay-core' ),
          'param_name' => 'title_color',
          'dependency' => array(
            'element' => 'sponsor_style',
            'value' => 'style_one',
          ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'livesay-core' ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Title Size', 'livesay-core' ),
          'param_name' => 'title_size',
          'dependency' => array(
            'element' => 'sponsor_style',
            'value' => 'style_one',
          ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'livesay-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Logo Border Color', 'livesay-core' ),
          'param_name' => 'border_color',
          'dependency' => array(
            'element' => 'sponsor_style',
            'value' => 'style_one',
          ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'livesay-core' ),
        ),

      )
    ) );
  }
}
