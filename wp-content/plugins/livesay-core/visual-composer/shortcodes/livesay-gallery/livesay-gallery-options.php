<?php
/**
 * Gallery - Shortcode Options
 */
add_action( 'init', 'livesay_gallery_vc_map' );
if ( ! function_exists( 'livesay_gallery_vc_map' ) ) {
  function livesay_gallery_vc_map() {
    vc_map( array(
    "name" => __( "Livesay gallery", 'livesay-core'),
    "base" => "lvsy_gallery",
    "description" => __( "gallery Style", 'livesay-core'),
    "icon" => "fa fa-user color-red",
    "category" => LivesayLib::lvsy_cat_name(),
    "params" => array(

        array(
          "type" => "dropdown",
          "heading" => __( "gallery Column", 'livesay-core' ),
          "param_name" => "gallery_column",
          "value" => array(
            __('Select Column', 'livesay-core') => '',
            __('Column Three', 'livesay-core') => 'col-md-4 col-sm-6',
            __('Column Four', 'livesay-core') => 'col-md-3 col-sm-6',
          ),
          "description" => __( "Select gallery column.", 'livesay-core'),
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
          "param_name"  => "gallery_limit",
          "value"       => "",
          "description" => __( "Enter the number of items to show.", 'livesay-core'),
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Specific ID', 'livesay-core'),
          "param_name"  => "gallery_id",
          "value"       => "",
          "description" => __( "Enter your gallery members ID, to show them only by your choice.", 'livesay-core'),
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Order', 'livesay-core' ),
          'value' => array(
            __( 'Select gallery Order', 'livesay-core' ) => '',
            __('Asending', 'livesay-core') => 'ASC',
            __('Desending', 'livesay-core') => 'DESC',
          ),
          'param_name' => 'gallery_order',
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
          'param_name' => 'gallery_orderby',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Pagination', 'livesay-core'),
          "param_name"  => "gallery_pagination",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "If you need pagination, turn this to On.", 'livesay-core'),
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Social Icons', 'livesay-core'),
          "param_name"  => "gallery_social_icon",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "If you need social icon, turn this to On.", 'livesay-core'),
        ),

        LivesayLib::vt_class_option(),

      ), // Params
    ) );
  }
}