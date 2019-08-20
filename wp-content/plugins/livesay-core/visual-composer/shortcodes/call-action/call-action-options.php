<?php
/**
 * Call to Action - Shortcode Options
 */
add_action( 'init', 'ctas_vc_map' );
if ( ! function_exists( 'ctas_vc_map' ) ) {
 function ctas_vc_map() {
   vc_map( array(
     "name" => __( "Call to Action", 'livesay-core'),
     "base" => "lvsy_ctas",
     "description" => __( "Call to Action Group", 'livesay-core'),
     "as_parent" => array('only' => 'lvsy_cta,lvsy_button'),
     "content_element" => true,
     "show_settings_on_create" => false,
     "is_container" => true,
     "icon" => "fa fa-bullhorn color-grey",
     "category" => LivesayLib::lvsy_cat_name(),
     "params" => array(

        LivesayLib::vt_class_option(),

     ),
     "js_view" => 'VcColumnView'
   ) );
 }
}

// Call to Action List
add_action( 'init', 'cta_vc_map' );
if ( ! function_exists( 'cta_vc_map' ) ) {
  function cta_vc_map() {
    vc_map( array(
      "name" => __( "Call to Action - Content", 'livesay-core'),
      "base" => "lvsy_cta",
      "description" => __( "Call to Action Content", 'livesay-core'),
      "icon" => "fa fa-font color-slate-blue",
      "as_child" => array('only' => 'lvsy_ctas'),
      "category" => LivesayLib::lvsy_cat_name(),
      "params" => array(

        array(
          "type"        => 'textfield',
          "heading"     => __('Content Width', 'livesay-core'),
          "param_name"  => "content_width",
          "value"       => "",
          "admin_label" => true,
          "description" => __( "Enter your width in %. [Eg: 70%]. Rest of width will go for button.", 'livesay-core')
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Title', 'livesay-core'),
          "param_name"  => "cta_title",
          "value"       => "",
          "description" => __( "Enter title for your call to action section", 'livesay-core')
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Sub-Title', 'livesay-core'),
          "param_name"  => "cta_sub_title",
          "value"       => "",
          "description" => __( "Enter sub-title for your call to action section", 'livesay-core')
        ),
        LivesayLib::vt_class_option(),

        // Styling
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Title Color', 'livesay-core'),
          "param_name"  => "title_color",
          "value"       => "",
          "group"       => "Style",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Sub-Title Color', 'livesay-core'),
          "param_name"  => "sub_title_color",
          "value"       => "",
          "group"       => "Style",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
        ),

        // Size
        array(
          "type"        => 'textfield',
          "heading"     => __('Title Size', 'livesay-core'),
          "param_name"  => "title_size",
          "value"       => "",
          "group"       => "Style",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "description" => __( "Enter font size in px.", 'livesay-core')
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Sub-Title Size', 'livesay-core'),
          "param_name"  => "sub_title_size",
          "value"       => "",
          "group"       => "Style",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "description" => __( "Enter font size in px.", 'livesay-core')
        ),

      )
    ) );
  }
}