<?php
/**
 * Services - Shortcode Options
 */
add_action( 'init', 'lvsy_services_vc_map' );
if ( ! function_exists( 'lvsy_services_vc_map' ) ) {
  function lvsy_services_vc_map() {
    vc_map( array(
      "name" => __( "Service", 'livesay-core'),
      "base" => "lvsy_services",
      "description" => __( "Service Shortcodes", 'livesay-core'),
      "icon" => "fa fa-cog color-brown",
      "category" => LivesayLib::lvsy_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Services Image Upload Type', 'livesay-core' ),
          'value' => array(
            __( 'Image', 'livesay-core' ) => 'image',
            __( 'Icon', 'livesay-core' ) => 'icon',
          ),
          'admin_label' => true,
          'param_name' => 'service_img_type',
          'description' => __( 'Select your service style.', 'livesay-core' ),
        ),
        LivesayLib::vt_open_link_tab(),
        array(
          "type"      => 'attach_image',
          "heading"   => __('Upload Service Image', 'livesay-core'),
          "param_name" => "service_image",
          "value"      => "",
          "description" => __( "Set your service image.", 'livesay-core'),
          'dependency' => array(
            'element' => 'service_img_type',
            'value' => 'image',
          ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),

        array(
          "type"      => 'vt_icon',
          "heading"   => __('Set Icon', 'livesay-core'),
          "param_name" => "service_icon",
          "value"      => "",
          "description" => __( "Set your service icon.", 'livesay-core'),
          'dependency' => array(
            'element' => 'service_img_type',
            'value' => 'icon',
          ),
        ),
        LivesayLib::vt_notice_field(__( "Content Area", 'livesay-core' ),'cntara_opt','cs-warning', ''), // Notice
        array(
          "type"      => 'textfield',
          "heading"   => __('Service Title', 'livesay-core'),
          "param_name" => "service_title",
          "value"      => "",
          "description" => __( "Enter your service title.", 'livesay-core')
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Service Title Link', 'livesay-core'),
          "param_name" => "service_title_link",
          "value"      => "",
          "description" => __( "Enter your service link.", 'livesay-core')
        ),
        array(
          "type"      => 'textarea_html',
          "heading"   => __('Content', 'livesay-core'),
          "param_name" => "content",
          "value"      => "",
          "description" => __( "Enter your service content here.", 'livesay-core')
        ),

        // Read More
        array(
    			"type"        => "notice",
    			"heading"     => __( "Read More Link", 'livesay-core' ),
    			"param_name"  => 'rml_opt',
    			'class'       => 'cs-warning',
    			'value'       => '',
    		),
        array(
          "type"      => 'href',
          "heading"   => __('Link', 'livesay-core'),
          "param_name" => "read_more_link",
          "value"      => "",
          "description" => __( "Set your link for read more.", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Title', 'livesay-core'),
          "param_name" => "read_more_title",
          "value"      => "",
          "description" => __( "Enter your read more title.", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        LivesayLib::vt_class_option(),

        // Style
        LivesayLib::vt_notice_field(__( "Title Styling", 'livesay-core' ),'tle_opt','cs-warning', 'Style'), // Notice
        array(
          "type"      => 'textfield',
          "heading"   => __('Image/Icon Width', 'livesay-core'),
          "param_name" => "img_width",
          "value"      => "",
          "description" => __( "Enter the numeric value for image width in px.", 'livesay-core'),
          "group" => __( "Style", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Title Color', 'livesay-core'),
          "param_name" => "title_color",
          "value"      => "",
          "description" => __( "Pick your heading color.", 'livesay-core'),
          "group" => __( "Style", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Title Hover Color', 'livesay-core'),
          "param_name" => "title_hover_color",
          "value"      => "",
          "description" => __( "Pick your heading hover color.", 'livesay-core'),
          "group" => __( "Style", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Title Size', 'livesay-core'),
          "param_name" => "title_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for title size in px.", 'livesay-core'),
          "group" => __( "Style", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Content Color', 'livesay-core'),
          "param_name" => "content_color",
          "value"      => "",
          "description" => __( "Pick your content color.", 'livesay-core'),
          "group" => __( "Style", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Content Size', 'livesay-core'),
          "param_name" => "content_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for content size in px.", 'livesay-core'),
          "group" => __( "Style", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Read More Color', 'livesay-core'),
          "param_name" => "readmore_color",
          "value"      => "",
          "description" => __( "Pick your readmore color.", 'livesay-core'),
          "group" => __( "Style", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Read More Hover Color', 'livesay-core'),
          "param_name" => "readmore_hover_color",
          "value"      => "",
          "description" => __( "Pick your readmore hover color.", 'livesay-core'),
          "group" => __( "Style", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Read More Size', 'livesay-core'),
          "param_name" => "readmore_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for readmore size in px.", 'livesay-core'),
          "group" => __( "Style", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),

      )
    ) );
  }
}
