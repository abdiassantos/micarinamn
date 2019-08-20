<?php
/**
 * Pricing - Shortcode Options
 */
add_action( 'init', 'livesay_pricing_vc_map' );
if ( ! function_exists( 'livesay_pricing_vc_map' ) ) {
  function livesay_pricing_vc_map() {
    vc_map( array(
      "name" => __( "Pricing", 'livesay-core'),
      "base" => "livesay_pricing",
      "description" => __( "Pricing Styles", 'livesay-core'),
      "icon" => "fa fa-usd color-orange",
      "category" => LivesayLib::lvsy_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Pricing Style', 'livesay-core' ),
          'value' => array(
            __( 'Style One', 'livesay-core' ) => 'style_one',
            __( 'Style Two', 'livesay-core' ) => 'style_two',
          ),
          'admin_label' => true,
          'param_name' => 'pricing_style',
          'description' => __( 'Select your pricing style.', 'livesay-core' ),
        ),

        array(
          "type" => "textfield",
          "heading" => __( "PLan Name", 'livesay-core' ),
          "param_name" => "plan_title",
          'value' => '',
          'admin_label' => true,
          "description" => __( "Enter your pricing title.", 'livesay-core'),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Price Caption Text", 'livesay-core' ),
          "param_name" => "price_caption",
          'value' => '',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Price", 'livesay-core' ),
          "param_name" => "price",
          'value' => '',
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Price currency", 'livesay-core' ),
          "param_name" => "price_in",
          'value' => '',
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Button Text", 'livesay-core' ),
          "param_name" => "btn_text",
          'value' => '',
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Button Link", 'livesay-core' ),
          "param_name" => "btn_link",
          'value' => '',
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        livesayLib::vt_class_option(),

        // List of features
        array(
          'type' => 'param_group',
          'value' => '',
          'param_name' => 'pricing_features',
          'params' => array(
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Feature Title', 'livesay-core' ),
              'param_name' => 'title',
              'admin_label' => true,
            ),
            array(
              'type' => 'switcher',
              'value' => '',
              'heading' => __( 'Feature Availability', 'livesay-core' ),
              'param_name' => 'feature_avail',
              'dependency' => array(
                'element' => 'pricing_style',
                'value' => 'style_one',
              ),
            ),

          )
        ),

      )
    ) );
  }
}
