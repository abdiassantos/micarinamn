<?php
/**
 * Sponsors - Shortcode Options
 */
add_action( 'init', 'livesay_sponsors_content_vc_map' );
if ( ! function_exists( 'livesay_sponsors_content_vc_map' ) ) {
  function livesay_sponsors_content_vc_map() {
    vc_map( array(
      "name" => __( "Sponsors With Content", 'livesay-core'),
      "base" => "livesay_sponsors_content",
      "description" => __( "Sponsor Content Styles", 'livesay-core'),
      "icon" => "fa fa-user color-blue",
      "category" => LivesayLib::lvsy_cat_name(),
      "params" => array(

        array(
          "type" => "textfield",
          "heading" => __( "Sponsors Title", 'livesay-core' ),
          "param_name" => "sponsor_title",
          'value' => '',
          'admin_label' => true,
          "description" => __( "Enter your sponsor title.", 'livesay-core'),
        ),
        // Sponsor logos
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Logos List', 'livesay-core' ),
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
            array(
              "type" => "textfield",
              "heading" => __( "Sponsors Logo Title", 'livesay-core' ),
              "param_name" => "logo_title",
              'value' => '',
              'admin_label' => true,
              "description" => __( "Enter your sponsor logo title.", 'livesay-core'),
            ),
            array(
              "type" => "textfield",
              "heading" => __( "Logo Title Link", 'livesay-core' ),
              "param_name" => "logo_title_link",
              'value' => '',
              "description" => __( "Enter your sponsor logo title link.", 'livesay-core'),
            ),
            array(
              "type" => "textarea",
              "heading" => __( "Logo Content", 'livesay-core' ),
              "param_name" => "logo_content",
              'value' => '',
              "description" => __( "Enter your sponsor logo content.", 'livesay-core'),
            ),
            array(
              "type" => "textfield",
              "heading" => __( "Learn More Text", 'livesay-core' ),
              "param_name" => "learn_more_txt",
              'value' => '',
              "description" => __( "Enter your learn more.", 'livesay-core'),
            ),
            array(
              "type" => "textfield",
              "heading" => __( "Learn More Link", 'livesay-core' ),
              "param_name" => "learn_more_link",
              'value' => '',
              "description" => __( "Enter your learn more.", 'livesay-core'),
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
          'heading' => __( 'Logo Border Color', 'livesay-core' ),
          'param_name' => 'border_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'livesay-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Logo Heading Color', 'livesay-core' ),
          'param_name' => 'logo_title_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'livesay-core' ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Logo Heading Size', 'livesay-core' ),
          'param_name' => 'logo_title_size',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'livesay-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Logo Heading Hover Color', 'livesay-core' ),
          'param_name' => 'logo_title_hover_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'livesay-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Logo Content Color', 'livesay-core' ),
          'param_name' => 'logo_content_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'livesay-core' ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Logo Content Size', 'livesay-core' ),
          'param_name' => 'logo_content_size',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'livesay-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Learn More Color', 'livesay-core' ),
          'param_name' => 'learn_more_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'livesay-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Learn More Hover Color', 'livesay-core' ),
          'param_name' => 'learn_more_hover_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'livesay-core' ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Learn More Size', 'livesay-core' ),
          'param_name' => 'learn_more_size',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'livesay-core' ),
        ),

      )
    ) );
  }
}
