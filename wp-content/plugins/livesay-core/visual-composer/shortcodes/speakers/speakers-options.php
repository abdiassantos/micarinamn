<?php
/**
 * Speaker - Shortcode Options
 */
add_action( 'init', 'livesay_speaker_vc_map' );
if ( ! function_exists( 'livesay_speaker_vc_map' ) ) {
  function livesay_speaker_vc_map() {
    vc_map( array(
    "name" => __( "Speaker", 'livesay-core'),
    "base" => "livesay_speaker",
    "description" => __( "Speaker Style", 'livesay-core'),
    "icon" => "fa fa-user color-red",
    "category" => LivesayLib::lvsy_cat_name(),
    "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Speaker Style', 'livesay-core' ),
          'value' => array(
            __( 'Style One', 'livesay-core' ) => 'style_one',
            __( 'Style Two', 'livesay-core' ) => 'style_two',
            __( 'Style Three', 'livesay-core' ) => 'style_three',
          ),
          'admin_label' => true,
          'param_name' => 'speaker_style',
          'description' => __( 'Select your speaker style.', 'livesay-core' ),
        ),

        array(
          "type" => "dropdown",
          "heading" => __( "speaker Column", 'livesay-core' ),
          "param_name" => "speaker_column",
          "value" => array(
            __('Select Column', 'livesay-core') => '',
            __('Column One', 'livesay-core') => 'col-md-12',
            __('Column Two', 'livesay-core') => 'col-md-6',
            __('Column Three', 'livesay-core') => 'col-md-4 col-sm-6',
            __('Column Four', 'livesay-core') => 'col-md-3 col-sm-6',
          ),
          "description" => __( "Select speaker column.", 'livesay-core'),
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Disable Image Crop', 'livesay-core'),
          "param_name"  => "disable_crop",
          "value"       => "",
          "std"         => false,
          "description" => __( "If you need to disable image resize, turn this to On.", 'livesay-core'),
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
          "param_name"  => "speaker_limit",
          "value"       => "",
          "description" => __( "Enter the number of items to show.", 'livesay-core'),
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'List By', 'livesay-core' ),
          'value' => array(
            __( 'Category', 'livesay-core' ) => 'category',
            __( 'ID', 'livesay-core' ) => 'id',
          ),
          'admin_label' => true,
          'param_name' => 'list_by',
          'description' => __( 'Select your speaker listing based on Id/Catgeory .', 'livesay-core' ),
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Specific ID', 'livesay-core'),
          "param_name"  => "speaker_id",
          "value"       => "",
          "description" => __( "Enter your speaker members ID, to show them only by your choice.", 'livesay-core'),
          'dependency' => array(
            'element' => 'list_by',
            'value' => 'id',
          ),
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Show only certain categories?', 'livesay-core'),
          "param_name"  => "speaker_show_category",
          "value"       => "",
          "description" => __( "Enter category SLUGS (comma separated) you want to display.", 'livesay-core'),
          'dependency' => array(
            'element' => 'list_by',
            'value' => 'category',
          ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Order', 'livesay-core' ),
          'value' => array(
            __( 'Select speaker Order', 'livesay-core' ) => '',
            __('Asending', 'livesay-core') => 'ASC',
            __('Desending', 'livesay-core') => 'DESC',
          ),
          'param_name' => 'speaker_order',
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
            __('Based on Mentioned ID\'s', 'livesay-core') => 'post__in',
          ),
          'param_name' => 'speaker_orderby',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Pagination', 'livesay-core'),
          "param_name"  => "speaker_pagination",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "If you need pagination, turn this to On.", 'livesay-core'),
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Social Icons', 'livesay-core'),
          "param_name"  => "speaker_social_icon",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "If you need social icon, turn this to On.", 'livesay-core'),
        ),

        LivesayLib::vt_class_option(),

        // Style
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Name Color', 'livesay-core'),
          "param_name"  => "name_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'livesay-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Name Hover Color', 'livesay-core'),
          "param_name"  => "name_hover_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'livesay-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Social Icon Color', 'livesay-core'),
          "param_name"  => "social_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'livesay-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Social Icon Hover Color', 'livesay-core'),
          "param_name"  => "social_hover_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'livesay-core'),
        ),
        array(
          "type"        =>'colorpicker',
          "heading"     =>__('Profession Color', 'livesay-core'),
          "param_name"  => "profession_color",
          "value"       => "",
          'dependency' => array(
            'element' => 'speaker_style',
            'value' => 'style_three',
          ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'livesay-core'),
        ),
        // Size
        array(
          "type"        =>'textfield',
          "heading"     =>__('Name Size', 'livesay-core'),
          "param_name"  => "name_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'livesay-core'),
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Profession Size', 'livesay-core'),
          "param_name"  => "profession_size",
          "value"       => "",
          'dependency' => array(
            'element' => 'speaker_style',
            'value' => 'style_three',
          ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group"     =>__('Style', 'livesay-core'),
        ),

      ), // Params
    ) );
  }
}