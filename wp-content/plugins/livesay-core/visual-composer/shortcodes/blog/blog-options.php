<?php
/**
 * Blog - Shortcode Options
 */
add_action( 'init', 'lvsy_blog_vc_map' );
if ( ! function_exists( 'lvsy_blog_vc_map' ) ) {
  function lvsy_blog_vc_map() {
    vc_map( array(
      "name" => __( "Blog", 'livesay-core'),
      "base" => "lvsy_blog",
      "description" => __( "Blog Styles", 'livesay-core'),
      "icon" => "fa fa-newspaper-o color-red",
      "category" => LivesayLib::lvsy_cat_name(),
      "params" => array(

        array(
          "type"        =>'textfield',
          "heading"     =>__('Limit', 'livesay-core'),
          "param_name"  => "blog_limit",
          "value"       => "",
          'admin_label' => true,
          "description" => __( "Enter the number of items to show.", 'livesay-core'),
        ),

        array(
    			"type"        => "notice",
    			"heading"     => __( "Meta's to Hide", 'livesay-core' ),
    			"param_name"  => 'mts_opt',
    			'class'       => 'cs-warning',
    			'value'       => '',
    		),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Date', 'livesay-core'),
          "param_name"  => "blog_date",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-3 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Author', 'livesay-core'),
          "param_name"  => "blog_author",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-3 vc_column vt_field_space',
        ),

        array(
    			"type"        => "notice",
    			"heading"     => __( "Listing", 'livesay-core' ),
    			"param_name"  => 'lsng_opt',
    			'class'       => 'cs-warning',
    			'value'       => '',
    		),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Order', 'livesay-core' ),
          'value' => array(
            __( 'Select Blog Order', 'livesay-core' ) => '',
            __('Asending', 'livesay-core') => 'ASC',
            __('Desending', 'livesay-core') => 'DESC',
          ),
          'param_name' => 'blog_order',
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
          'param_name' => 'blog_orderby',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Show only certain categories?', 'livesay-core'),
          "param_name"  => "blog_show_category",
          "value"       => "",
          "description" => __( "Enter category SLUGS (comma separated) you want to display.", 'livesay-core')
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Short Content (Excerpt Length)', 'livesay-core'),
          "param_name"  => "short_content",
          "value"       => "",
          "description" => __( "Enter the numeric value of, how many words you want in short content paragraph.", 'livesay-core')
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Pagination', 'livesay-core'),
          "param_name"  => "blog_pagination",
          "value"       => "",
          "std"         => true,
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),

        array(
          "type"        =>'textfield',
          "heading"     =>__('Miss-Aligned? Mention Minimum Height :', 'livesay-core'),
          "param_name"  => "miss_align_height",
          "value"       => "",
          "description" => __( "Enter the px value for minimum height. This will fix miss-aligned issue with your listing items.", 'livesay-core')
        ),
        LivesayLib::vt_class_option(),

      )
    ) );
  }
}
