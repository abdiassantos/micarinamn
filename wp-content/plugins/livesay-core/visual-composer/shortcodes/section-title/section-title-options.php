<?php
/**
 * Section Title - Shortcode Options
 */
add_action( 'init', 'livesay_section_title_vc_map' );
if ( ! function_exists( 'livesay_section_title_vc_map' ) ) {
  function livesay_section_title_vc_map() {
    vc_map( array(
      "name" => __( "Section Title", 'livesay-core'),
      "base" => "livesay_section_title",
      "description" => __( "Section Title Styles", 'livesay-core'),
      "icon" => "fa fa-header color-orange",
      "category" => LivesayLib::lvsy_cat_name(),
      "params" => array(

        array(
          "type" => "textfield",
          "heading" => __( "Section Title", 'livesay-core' ),
          "param_name" => "section_title",
          'value' => '',
          'admin_label' => true,
          "description" => __( "Enter your section title.", 'livesay-core'),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Section Sub-Title", 'livesay-core' ),
          "param_name" => "section_sub_title",
          'value' => '',
          'admin_label' => true,
          "description" => __( "Enter your section sub-title.", 'livesay-core'),
        ),
        livesayLib::vt_class_option(),

        // Style
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Title Color', 'livesay-core' ),
          'param_name' => 'title_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'livesay-core' ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Title Size', 'livesay-core' ),
          'param_name' => 'title_size',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'livesay-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Sub-Title Color', 'livesay-core' ),
          'param_name' => 'sub_title_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'livesay-core' ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Sub-Title Size', 'livesay-core' ),
          'param_name' => 'sub_title_size',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'livesay-core' ),
        ),
        array(
            'type' => 'css_editor',
            'heading' => __( 'Css', 'my-text-domain' ),
            'param_name' => 'css',
            'group' => __( 'Design options', 'livesay-core' ),
        ),

      )
    ) );
  }
}
