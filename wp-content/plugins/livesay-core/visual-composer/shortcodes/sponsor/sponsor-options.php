<?php
/**
 * sponsor - Shortcode Options
 */
add_action( 'init', 'livesay_sponsor_vc_map' );
if ( ! function_exists( 'livesay_sponsor_vc_map' ) ) {
  function livesay_sponsor_vc_map() {
    vc_map( array(
    "name" => __( "Sponsor", 'livesay-core'),
    "base" => "livesay_sponsor",
    "description" => __( "sponsor Style", 'livesay-core'),
    "icon" => "fa fa-user color-pink",
    "category" => LivesayLib::lvsy_cat_name(),
    "params" => array(

        array(
          "type" => "dropdown",
          "heading" => __( "sponsor Column", 'livesay-core' ),
          "param_name" => "sponsor_column",
          "value" => array(
            __('Select Column', 'livesay-core') => '',
            __('Column Two', 'livesay-core')    => 'col-md-6',
            __('Column Three', 'livesay-core')  => 'col-md-4 col-sm-6',
            __('Column Four', 'livesay-core')   => 'col-md-3 col-sm-6',
            __('Column Five', 'livesay-core')   => 'one-fifth',
          ),
          "description" => __( "Select sponsor column.", 'livesay-core'),
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
          "param_name"  => "sponsor_limit",
          "value"       => "",
          "description" => __( "Enter the number of items to show.", 'livesay-core'),
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Specific ID', 'livesay-core'),
          "param_name"  => "sponsor_id",
          "value"       => "",
          "description" => __( "Enter your sponsor members ID, to show them only by your choice.", 'livesay-core'),
        ),
        array(
          'type'    => 'dropdown',
          'heading' => __( 'Order', 'livesay-core' ),
          'value'   => array(
            __( 'Select sponsor Order', 'livesay-core' ) => '',
            __('Asending', 'livesay-core') => 'ASC',
            __('Desending', 'livesay-core') => 'DESC',
          ),
          'param_name' => 'sponsor_order',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          'type'    => 'dropdown',
          'heading' => __( 'Order By', 'livesay-core' ),
          'value'   => array(
            __('None', 'livesay-core')   => 'none',
            __('ID', 'livesay-core')     => 'ID',
            __('Author', 'livesay-core') => 'author',
            __('Title', 'livesay-core')  => 'title',
            __('Date', 'livesay-core')   => 'date',
          ),
          'param_name' => 'sponsor_orderby',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Show only certain categories?', 'livesay-core'),
          "param_name"  => "sponsor_show_category",
          "value"       => "",
          "description" => __( "Enter category SLUGS (comma separated) you want to display.", 'livesay-core')
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Pagination', 'livesay-core'),
          "param_name"  => "sponsor_pagination",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "If you need pagination, turn this to On.", 'livesay-core'),
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Learn More Text', 'livesay-core'),
          "param_name"  => "learn_more_txt",
          "value"       => "",
          "description" => __( "Enter your sponsor learn more text.", 'livesay-core'),
        ),

        LivesayLib::vt_class_option(),

        // Style
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Title Color', 'livesay-core'),
          "param_name"  => "title_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'livesay-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Title Hover Color', 'livesay-core'),
          "param_name"  => "title_hover_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'livesay-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Content Color', 'livesay-core'),
          "param_name"  => "content_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'livesay-core'),
        ),
        // Size
        array(
          "type"        =>'textfield',
          "heading"     =>__('Title Size', 'livesay-core'),
          "param_name"  => "title_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'livesay-core'),
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Content Size', 'livesay-core'),
          "param_name"  => "content_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'livesay-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Learn More Color', 'livesay-core'),
          "param_name"  => "learn_more_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'livesay-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Learn More Hover Color', 'livesay-core'),
          "param_name"  => "learn_more_hover_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'livesay-core'),
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Learn More Size', 'livesay-core'),
          "param_name"  => "learn_more_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'livesay-core'),
        ),

      ), // Params
    ) );
  }
}