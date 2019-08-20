<?php
/**
 * Accommodation - Shortcode Options
 */
add_action( 'init', 'livesay_accommodation_vc_map' );
if ( ! function_exists( 'livesay_accommodation_vc_map' ) ) {
  function livesay_accommodation_vc_map() {
    vc_map( array(
      "name" => __( "Accommodation", 'livesay-core'),
      "base" => "livesay_accommodation",
      "description" => __( "Accommodation Styles", 'livesay-core'),
      "icon" => "fa fa-home color-orange",
      "category" => LivesayLib::lvsy_cat_name(),
      "params" => array(

        // Accommodations
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Accommodation List', 'livesay-core' ),
          'param_name' => 'accommodation_items',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              "type"      => 'attach_image',
              "heading"   => __('Upload Accommodation Image', 'livesay-core'),
              "param_name" => "accommodation_img",
              "value"      => "",
              "description" => __( "Set your accommodation image.", 'livesay-core'),
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              "type" => "textfield",
              "heading" => __( "Accommodation Title", 'livesay-core' ),
              "param_name" => "accommodation_title",
              'value' => '',
              "description" => __( "Enter your accommodation title.", 'livesay-core'),
            ),
            array(
              "type" => "textfield",
              "heading" => __( "Accommodation Venue Text", 'livesay-core' ),
              "param_name" => "accommodation_venue_txt",
              'value' => '',
              'admin_label' => true,
              "description" => __( "Enter your accommodation venue text.", 'livesay-core'),
            ),
            array(
              "type" => "textfield",
              "heading" => __( "Accommodation Rate Text", 'livesay-core' ),
              "param_name" => "accommodation_rate_text",
              'value' => '',
              "description" => __( "Enter your accommodation rate text.", 'livesay-core'),
            ),
            array(
              "type" => "textfield",
              "heading" => __( "View Website Text", 'livesay-core' ),
              "param_name" => "website_txt",
              'value' => '',
              "description" => __( "Enter your accommodation view website text.", 'livesay-core'),
            ),
            array(
              "type" => "textfield",
              "heading" => __( "View Website Link", 'livesay-core' ),
              "param_name" => "website_link",
              'value' => '',
              "description" => __( "Enter your accommodation view website link.", 'livesay-core'),
            ),
          )
        ),

        livesayLib::vt_class_option(),

        // Carousel
        array(
          "type" => "switcher",
          "heading" => __( "Need Carousel", 'livesay-core' ),
          "group" => __( "Carousel", 'livesay-core' ),
          "param_name" => "slick_carousel",
          "value" => '',
          "description" => __( "Carousel is enabled ,if enable this.", 'livesay-core')
        ),
        array(
          "type"        => "notice",
          "heading"     => __( "Basic Options", 'livesay-core' ),
          "param_name"  => 'bsic_opt',
          'class'       => 'cs-warning',
          'value'       => '',
          'dependency' => array(
            'element' => 'slick_carousel',
            'value' => 'true',
          ),
          "group"       => __('Carousel', 'livesay-core'),
        ),
        array(
          "type" => "switcher",
          "heading" => __( "Disable Loop?", 'livesay-core' ),
          "group" => __( "Carousel", 'livesay-core' ),
          "param_name" => "slick_loop",
          "on_text" => __( "Yes", 'livesay-core' ),
          "off_text" => __( "No", 'livesay-core' ),
          "value" => '',
          'dependency' => array(
            'element' => 'slick_carousel',
            'value' => 'true',
          ),
          "description" => __( "Continuously moving carousel, if enabled.", 'livesay-core')
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Items", 'livesay-core' ),
          "group" => __( "Carousel", 'livesay-core' ),
          "param_name" => "slick_items",
          'value' => '',
          'dependency' => array(
            'element' => 'slick_carousel',
            'value' => 'true',
          ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Enter the numeric value of how many items you want in per slide.", 'livesay-core')
        ),
        array(
          "type" => "switcher",
          "heading" => __( "Dots", 'livesay-core' ),
          "group" => __( "Carousel", 'livesay-core' ),
          "param_name" => "slick_dots",
          "on_text" => __( "Yes", 'livesay-core' ),
          "off_text" => __( "No", 'livesay-core' ),
          "value" => '',
          'dependency' => array(
            'element' => 'slick_carousel',
            'value' => 'true',
          ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "If you want Carousel Dots, enable it.", 'livesay-core')
        ),
        array(
          "type" => "switcher",
          "heading" => __( "Navigation", 'livesay-core' ),
          "group" => __( "Carousel", 'livesay-core' ),
          "param_name" => "slick_nav",
          "on_text" => __( "Yes", 'livesay-core' ),
          "off_text" => __( "No", 'livesay-core' ),
          "value" => '',
          'dependency' => array(
            'element' => 'slick_carousel',
            'value' => 'true',
          ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "If you want Carousel Navigation, enable it.", 'livesay-core')
        ),

        array(
          "type"        => "notice",
          "heading"     => __( "Auto Play & Interaction", 'livesay-core' ),
          "param_name"  => 'apyi_opt',
          'class'       => 'cs-warning',
          'value'       => '',
          'dependency' => array(
            'element' => 'slick_carousel',
            'value' => 'true',
          ),
          "group"       => __('Carousel', 'livesay-core'),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Autoplay Timeout", 'livesay-core' ),
          "group" => __( "Carousel", 'livesay-core' ),
          "param_name" => "Slick_autoplay_timeout",
          'value' => '',
          'dependency' => array(
            'element' => 'slick_carousel',
            'value' => 'true',
          ),
          "description" => __( "Change carousel Autoplay timing value. Default : 5000. Means 5 seconds.", 'livesay-core')
        ),
        array(
          "type" => "switcher",
          "heading" => __( "Autoplay", 'livesay-core' ),
          "group" => __( "Carousel", 'livesay-core' ),
          "param_name" => "slick_autoplay",
          "on_text" => __( "Yes", 'livesay-core' ),
          "off_text" => __( "No", 'livesay-core' ),
          "value" => '',
          'dependency' => array(
            'element' => 'slick_carousel',
            'value' => 'true',
          ),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          "description" => __( "If you want to start Carousel automatically, enable it.", 'livesay-core')
        ),

        array(
          "type"        => "notice",
          "heading"     => __( "Responsive Options", 'livesay-core' ),
          "param_name"  => 'res_opt',
          'class'       => 'cs-warning',
          'value'       => '',
          'dependency' => array(
            'element' => 'slick_carousel',
            'value' => 'true',
          ),
          "group"       => __('Carousel', 'livesay-core'),
        ),

        array(
          "type" => "textfield",
          "heading" => __( "Laptop", 'livesay-core' ),
          "group" => __( "Carousel", 'livesay-core' ),
          "param_name" => "slick_laptop",
          'value' => '',
          'dependency' => array(
            'element' => 'slick_carousel',
            'value' => 'true',
          ),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          "description" => __( "Enter number of items to show in laptop screen(screen width:1200).", 'livesay-core')
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Tablet", 'livesay-core' ),
          "group" => __( "Carousel", 'livesay-core' ),
          "param_name" => "slick_tablet",
          'value' => '',
          'dependency' => array(
            'element' => 'slick_carousel',
            'value' => 'true',
          ),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          "description" => __( "Enter number of items to show in tablet(screen width:850).", 'livesay-core')
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Mobile", 'livesay-core' ),
          "group" => __( "Carousel", 'livesay-core' ),
          "param_name" => "slick_mobile",
          'value' => '',
          'dependency' => array(
            'element' => 'slick_carousel',
            'value' => 'true',
          ),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
          "description" => __( "Enter number of items to show in mobile(screen width:520).", 'livesay-core')
        ),

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
          'heading' => __( 'Title Hover Color', 'livesay-core' ),
          'param_name' => 'title_hover_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'livesay-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Content Color', 'livesay-core' ),
          'param_name' => 'content_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'livesay-core' ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Content Size', 'livesay-core' ),
          'param_name' => 'content_size',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'livesay-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'View Website Color', 'livesay-core' ),
          'param_name' => 'website_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'livesay-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'View Website Hover Color', 'livesay-core' ),
          'param_name' => 'website_hover_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'livesay-core' ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'View Website Size', 'livesay-core' ),
          'param_name' => 'website_size',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'livesay-core' ),
        ),

      )
    ) );
  }
}
