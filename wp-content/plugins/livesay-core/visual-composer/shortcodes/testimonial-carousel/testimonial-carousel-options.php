<?php
/**
 * Testimonial Carousel - Shortcode Options
 */
add_action( 'init', 'testimonial_carousel_vc_map' );
if ( ! function_exists( 'testimonial_carousel_vc_map' ) ) {
  function testimonial_carousel_vc_map() {
    vc_map( array(
    "name" => __( "Testimonial Carousel", 'livesay-core'),
    "base" => "livesay_testimonial_carousel",
    "description" => __( "Carousel Style Testimonial", 'livesay-core'),
    "icon" => "fa fa-comments color-green",
    "category" => LivesayLib::lvsy_cat_name(),
    "params" => array(

      array(
        "type" => "dropdown",
        "heading" => __( "Testimonial Style", 'livesay-core' ),
        "param_name" => "testimonial_style",
        "value" => array(
          __('Style One', 'livesay-core') => 'testimonial_one',
          __('Style Two', 'livesay-core') => 'testimonial_two',
          __('Style Three', 'livesay-core') => 'testimonial_three',
        ),
        "admin_label" => true,
        "description" => __( "Select testimonial carousel style.", 'livesay-core'),
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
      LivesayLib::vt_class_option(),

      // Carousel
      array(
        "type"        => "notice",
        "heading"     => __( "Basic Options", 'livesay-core' ),
        "param_name"  => 'bsic_opt',
        "group" => __( "Carousel", 'livesay-core' ),
        'class'       => 'cs-warning',
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => array('testimonial_two','testimonial_three'),
          ),
        'value'       => '',
      ),

      array(
        "type" => "switcher",
        "heading" => __( "Disable Loop?", 'livesay-core' ),
        "group" => __( "Carousel", 'livesay-core' ),
        "param_name" => "carousel_loop",
        "on_text" => __( "Yes", 'livesay-core' ),
        "off_text" => __( "No", 'livesay-core' ),
        "value" => '',
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => array('testimonial_two','testimonial_three'),
          ),
        "description" => __( "Continuously moving carousel, if enabled.", 'livesay-core')
      ),
      array(
        "type" => "textfield",
        "heading" => __( "Items", 'livesay-core' ),
        "group" => __( "Carousel", 'livesay-core' ),
        "param_name" => "carousel_items",
        'value' => '',
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => array('testimonial_two','testimonial_three'),
          ),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        "description" => __( "Enter the numeric value of how many items you want in per slide.", 'livesay-core')
      ),
      array(
        "type" => "textfield",
        "heading" => __( "Margin", 'livesay-core' ),
        "group" => __( "Carousel", 'livesay-core' ),
        "param_name" => "carousel_margin",
        'value' => '',
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => array('testimonial_two','testimonial_three'),
          ),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        "description" => __( "Enter the numeric value of how much space you want between each carousel item.", 'livesay-core')
      ),
      array(
        "type" => "switcher",
        "heading" => __( "Dots", 'livesay-core' ),
        "group" => __( "Carousel", 'livesay-core' ),
        "param_name" => "carousel_dots",
        "on_text" => __( "Yes", 'livesay-core' ),
        "off_text" => __( "No", 'livesay-core' ),
        "value" => '',
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => array('testimonial_two','testimonial_three'),
          ),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        "description" => __( "If you want Carousel Dots, enable it.", 'livesay-core')
      ),
      array(
        "type" => "switcher",
        "heading" => __( "Navigation", 'livesay-core' ),
        "group" => __( "Carousel", 'livesay-core' ),
        "param_name" => "carousel_nav",
        "on_text" => __( "Yes", 'livesay-core' ),
        "off_text" => __( "No", 'livesay-core' ),
        "value" => '',
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => array('testimonial_two','testimonial_three'),
          ),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        "description" => __( "If you want Carousel Navigation, enable it.", 'livesay-core')
      ),

      array(
        "type"        => "notice",
        "heading"     => __( "Auto Play & Interaction", 'livesay-core' ),
        "param_name"  => 'apyi_opt',
        "group" => __( "Carousel", 'livesay-core' ),
        'class'       => 'cs-warning',
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => array('testimonial_two','testimonial_three'),
          ),
        'value'       => '',
      ),
      array(
        "type" => "textfield",
        "heading" => __( "Autoplay Timeout", 'livesay-core' ),
        "group" => __( "Carousel", 'livesay-core' ),
        "param_name" => "carousel_autoplay_timeout",
        'value' => '',
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => array('testimonial_two','testimonial_three'),
          ),
        "description" => __( "Change carousel Autoplay timing value. Default : 5000. Means 5 seconds.", 'livesay-core')
      ),
      array(
        "type" => "switcher",
        "heading" => __( "Autoplay", 'livesay-core' ),
        "group" => __( "Carousel", 'livesay-core' ),
        "param_name" => "carousel_autoplay",
        "on_text" => __( "Yes", 'livesay-core' ),
        "off_text" => __( "No", 'livesay-core' ),
        "value" => '',
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => array('testimonial_two','testimonial_three'),
          ),
        'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        "description" => __( "If you want to start Carousel automatically, enable it.", 'livesay-core')
      ),
      array(
        "type" => "switcher",
        "heading" => __( "Animate Out", 'livesay-core' ),
        "group" => __( "Carousel", 'livesay-core' ),
        "param_name" => "carousel_animate_out",
        "on_text" => __( "Yes", 'livesay-core' ),
        "off_text" => __( "No", 'livesay-core' ),
        "value" => '',
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => array('testimonial_two','testimonial_three'),
          ),
        'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        "description" => __( "CSS3 animation out.", 'livesay-core')
      ),

      array(
        "type"        => "notice",
        "heading"     => __( "Width & Height", 'livesay-core' ),
        "param_name"  => 'wah_opt',
        "group" => __( "Carousel", 'livesay-core' ),
        'class'       => 'cs-warning',
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => array('testimonial_two','testimonial_three'),
          ),
        'value'       => '',
      ),

      array(
        "type" => "switcher",
        "heading" => __( "Auto Width", 'livesay-core' ),
        "group" => __( "Carousel", 'livesay-core' ),
        "param_name" => "carousel_autowidth",
        "on_text" => __( "Yes", 'livesay-core' ),
        "off_text" => __( "No", 'livesay-core' ),
        "value" => '',
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => array('testimonial_two','testimonial_three'),
          ),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        "description" => __( "Adjust Auto Width automatically for each carousel items.", 'livesay-core')
      ),
      array(
        "type" => "switcher",
        "heading" => __( "Auto Height", 'livesay-core' ),
        "group" => __( "Carousel", 'livesay-core' ),
        "param_name" => "carousel_autoheight",
        "on_text" => __( "Yes", 'livesay-core' ),
        "off_text" => __( "No", 'livesay-core' ),
        "value" => '',
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => array('testimonial_two','testimonial_three'),
          ),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        "description" => __( "Adjust Auto Height automatically for each carousel items.", 'livesay-core')
      ),

      array(
        "type"        => "notice",
        "heading"     => __( "Responsive Options", 'livesay-core' ),
        "param_name"  => 'res_opt',
        "group" => __( "Carousel", 'livesay-core' ),
        'class'       => 'cs-warning',
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => array('testimonial_two','testimonial_three'),
          ),
        'value'       => '',
      ),

      array(
        "type" => "textfield",
        "heading" => __( "Tablet", 'livesay-core' ),
        "group" => __( "Carousel", 'livesay-core' ),
        "param_name" => "carousel_tablet",
        'value' => '',
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => array('testimonial_two','testimonial_three'),
          ),
        'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        "description" => __( "Enter number of items to show in tablet.", 'livesay-core')
      ),
      array(
        "type" => "textfield",
        "heading" => __( "Mobile", 'livesay-core' ),
        "group" => __( "Carousel", 'livesay-core' ),
        "param_name" => "carousel_mobile",
        'value' => '',
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => array('testimonial_two','testimonial_three'),
          ),
        'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        "description" => __( "Enter number of items to show in mobile.", 'livesay-core')
      ),
      array(
        "type" => "textfield",
        "heading" => __( "Small Mobile", 'livesay-core' ),
        "group" => __( "Carousel", 'livesay-core' ),
        "param_name" => "carousel_small_mobile",
        'value' => '',
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => array('testimonial_two','testimonial_three'),
          ),
        'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        "description" => __( "Enter number of items to show in small mobile.", 'livesay-core')
      ),

      // Style
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Title Color', 'livesay-core'),
        "param_name"  => "title_color",
        "value"       => "",
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => array('testimonial_two','testimonial_three'),
          ),
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
        "heading"     =>__('Name Hover Color', 'livesay-core'),
        "param_name"  => "name_hover_color",
        "value"       => "",
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => 'testimonial_two',
          ),
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
        'dependency' => array(
            'element' => 'testimonial_style',
            'value' => array('testimonial_two','testimonial_three'),
          ),
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