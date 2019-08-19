<?php
/**
 * Button - Shortcode Options
 */
add_action( 'init', 'lvsy_button_vc_map' );
if ( ! function_exists( 'lvsy_button_vc_map' ) ) {
  function lvsy_button_vc_map() {
    vc_map( array(
      "name" => __( "Button", 'livesay-core'),
      "base" => "lvsy_button",
      "description" => __( "Button Styles", 'livesay-core'),
      "icon" => "fa fa-mouse-pointer color-orange",
      "category" => LivesayLib::lvsy_cat_name(),
      "params" => array(

        array(
          "type" => "textfield",
          "heading" => __( "Button Text", 'livesay-core' ),
          "param_name" => "button_text",
          'value' => '',
          'admin_label' => true,
          "description" => __( "Enter your button text.", 'livesay-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "href",
          "heading" => __( "Button Link", 'livesay-core' ),
          "param_name" => "button_link",
          'value' => '',
          "description" => __( "Enter your button link.", 'livesay-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "switcher",
          "heading" => __( "Button Align Right", 'livesay-core' ),
          "param_name" => "align_right",
          "std" => false,
          'value' => '',
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "switcher",
          "heading" => __( "Open New Tab?", 'livesay-core' ),
          "param_name" => "open_link",
          "std" => false,
          'value' => '',
          "on_text" => __( "Yes", 'livesay-core' ),
          "off_text" => __( "No", 'livesay-core' ),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "switcher",
          "heading" => __( "Disable Simple Dark Hover", 'livesay-core' ),
          "param_name" => "simple_hover",
          "std" => false,
          'value' => '',
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),

        LivesayLib::vt_class_option(),

        // Styling
        array(
          "type" => "colorpicker",
          "heading" => __( "Text Color", 'livesay-core' ),
          "param_name" => "text_color",
          'value' => '',
          "group" => __( "Styling", 'livesay-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Text Hover Color", 'livesay-core' ),
          "param_name" => "text_hover_color",
          'value' => '',
          "group" => __( "Styling", 'livesay-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Background Color", 'livesay-core' ),
          "param_name" => "btn_bg_color",
          'value' => '',
          "group" => __( "Styling", 'livesay-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Background Hover Color", 'livesay-core' ),
          "param_name" => "btn_bg_hover_color",
          'value' => '',
          "group" => __( "Styling", 'livesay-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'simple_hover',
            'value' => 'true',
          ),
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Border Color", 'livesay-core' ),
          "param_name" => "border_color",
          'value' => '',
          "group" => __( "Styling", 'livesay-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Border Hover Color", 'livesay-core' ),
          "param_name" => "border_hover_color",
          'value' => '',
          "group" => __( "Styling", 'livesay-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'simple_hover',
            'value' => 'true',
          ),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Text Size", 'livesay-core' ),
          "param_name" => "text_size",
          'value' => '',
          "description" => __( "Enter button text font size. [Eg: 14px]", 'livesay-core'),
          "group" => __( "Styling", 'livesay-core'),
        ),

        // Design Tab
        array(
          "type" => "css_editor",
          "heading" => __( "Text Size", 'livesay-core' ),
          "param_name" => "css",
          "group" => __( "Design", 'livesay-core'),
        ),

      )
    ) );
  }
}
