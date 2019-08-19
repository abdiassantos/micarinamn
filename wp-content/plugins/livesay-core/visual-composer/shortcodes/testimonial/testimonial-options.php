<?php
/**
 * Testimonial - Shortcode Options
 */
add_action( 'init', 'testimonial_vc_map' );
if ( ! function_exists( 'testimonial_vc_map' ) ) {
  function testimonial_vc_map() {
    vc_map( array(
    "name" => __( "Testimonial", 'livesay-core'),
    "base" => "lvsy_testimonial",
    "description" => __( "Testimonial Style", 'livesay-core'),
    "icon" => "fa fa-comment color-grey",
    "category" => LivesayLib::lvsy_cat_name(),
    "params" => array(

      array(
        "type" => "dropdown",
        "heading" => __( "Testimonial Column", 'livesay-core' ),
        "param_name" => "testimonial_column",
        "value" => array(
          __('Column One', 'livesay-core') => 'col-lg-12',
          __('Column Two', 'livesay-core') => 'col-lg-6',
        ),
        "admin_label" => true,
        "description" => __( "Select testimonial column.", 'livesay-core'),
      ),

      array(
        "type"        => "notice",
        "heading"     => __( "Listing", 'livesay-core' ),
        "param_name"  => 'lsng_opt',
        'class'       => 'cs-warning',
        'value'       => '',
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('Limit', 'livesay-core'),
        "param_name"  => "testimonial_limit",
        "value"       => "",
        'admin_label' => true,
        "description" => __( "Enter the number of items to show.", 'livesay-core'),
      ),
      array(
        'type' => 'dropdown',
        'heading' => __( 'Order', 'livesay-core' ),
        'value' => array(
          __( 'Select Testimonial Order', 'livesay-core' ) => '',
          __('Asending', 'livesay-core') => 'ASC',
          __('Desending', 'livesay-core') => 'DESC',
        ),
        'param_name' => 'testimonial_order',
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        'type' => 'dropdown',
        'heading' => __( 'Order By', 'livesay-core' ),
        'value' => array(
          __('None', 'livesay-core') => 'none',
          __('ID', 'livesay-core') => 'ID',
          __('Author', 'livesay-core') => 'author',
          __('Title', 'livesay-core') => 'title',
          __('Date', 'livesay-core') => 'date',
        ),
        'param_name' => 'testimonial_orderby',
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'switcher',
        "heading"     =>__('Pagination', 'livesay-core'),
        "param_name"  => "testimonial_pagination",
        "value"       => "",
        "std"         => false,
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('Miss-Aligned?', 'livesay-core'),
        "param_name"  => "testimonial_min_height",
        "value"       => "",
        "description" => __( "Enter minimum height value in px.", 'livesay-core'),
      ),
      LivesayLib::vt_class_option(),

      // Style
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Title Color', 'livesay-core'),
        "param_name"  => "title_color",
        "value"       => "",
        "group"       => __('Style', 'livesay-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Content Color', 'livesay-core'),
        "param_name"  => "content_color",
        "value"       => "",
        "group"       => __('Style', 'livesay-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Name Color', 'livesay-core'),
        "param_name"  => "name_color",
        "value"       => "",
        "group"       => __('Style', 'livesay-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Profession Color', 'livesay-core'),
        "param_name"  => "profession_color",
        "value"       => "",
        "group"       => __('Style', 'livesay-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      // Size
      array(
        "type"        =>'textfield',
        "heading"     =>__('Title Size', 'livesay-core'),
        "param_name"  => "title_size",
        "value"       => "",
        "group"       => __('Style', 'livesay-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('Content Size', 'livesay-core'),
        "param_name"  => "content_size",
        "value"       => "",
        "group"       => __('Style', 'livesay-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('Name Size', 'livesay-core'),
        "param_name"  => "name_size",
        "value"       => "",
        "group"       => __('Style', 'livesay-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('Profession Size', 'livesay-core'),
        "param_name"  => "profession_size",
        "value"       => "",
        "group"       => __('Style', 'livesay-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),

      ), // Params
    ) );
  }
}