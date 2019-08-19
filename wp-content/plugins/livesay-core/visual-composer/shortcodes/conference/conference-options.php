<?php
/**
 * Conference - Shortcode Options
 */
add_action( 'init', 'livesay_conference_vc_map' );
if ( ! function_exists( 'livesay_conference_vc_map' ) ) {
  function livesay_conference_vc_map() {

    $args = array(
    'post_type' => 'tribe_events',
    'posts_per_page' => -1,
    );
    $pages = get_posts($args);
    $event_post = array();
    if ( $pages ) {
      foreach ( $pages as $page ) {
        $event_post[ $page->post_title ] = $page->ID;
      }
    } else {
      $event_post[ esc_html__( 'No Galleries found', 'sewell' ) ] = 0;
    }

    vc_map( array(
      "name" => __( "Conference", 'livesay-core'),
      "base" => "livesay_conference",
      "description" => __( "Conference Shortcodes", 'livesay-core'),
      "icon" => "fa fa-cog color-brown",
      "category" => LivesayLib::lvsy_cat_name(),
      "params" => array(

        array(
          'type'        => 'dropdown',
          'heading'     => __( "Conference Style", 'livesay-core'),
          'param_name'  => 'conference_style',
          'admin_label' => true,
          'value'       => array(
            __( "Select Conference Style", 'livesay-core') => '',
            __( 'Style One', 'livesay-core' ) => 'livesay-conference-one',
            __( 'Style Two', 'livesay-core' ) => 'livesay-conference-two',
            __( 'Style Three', 'livesay-core' ) => 'livesay-conference-three',
            __( 'Style Four', 'livesay-core' ) => 'livesay-conference-four',
          ),
          'description' => __( "Select Conference Style", 'livesay-core'),
        ),

        array(
          'type' => 'dropdown',
          'heading' => __( 'Select Event', 'livesay-core' ),
          'value'  => $event_post,
          'save_always' => true,
          'param_name' => 'conference_event',
          'description' => __( 'Select your conference style.', 'livesay-core' ),
        ),

        array(
          "type"      => 'textfield',
          "heading"   => __('Title', 'livesay-core'),
          "param_name" => "cfrce_title",
          "value"      => "",
          "description" => __( "Enter your title.", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'conference_style',
            'value' => 'livesay-conference-four',
          ),
        ),

        array(
          "type"      => 'textfield',
          "heading"   => __('Title Caption', 'livesay-core'),
          "param_name" => "title_caption",
          "value"      => "",
          "description" => __( "Enter title caption.", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'conference_style',
            'value' => array('livesay-conference-one','livesay-conference-three'),
          ),
        ),
        array(
          "type"      => 'attach_image',
          "heading"   => __('Upload Conference Image', 'livesay-core'),
          "param_name" => "conference_image",
          "value"      => "",
          "description" => __( "Set your conference image.", 'livesay-core'),
          'dependency' => array(
            'element' => 'conference_style',
            'value' => 'livesay-conference-two',
          ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Image Align', 'livesay-core' ),
          'value' => array(
            __( 'Left', 'livesay-core' ) => 'left',
            __( 'Right', 'livesay-core' ) => 'right',
          ),
          'param_name' => 'img_align',
          'dependency' => array(
            'element' => 'conference_style',
            'value' => 'livesay-conference-two',
          ),
          'description' => __( 'Select your image alignment.', 'livesay-core' ),
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Buy Ticket Text', 'livesay-core'),
          "param_name" => "ticket_txt",
          "value"      => "",
          "description" => __( "Enter buy ticket button text.", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),

        array(
          "type"      => 'href',
          "heading"   => __('Buy Ticket Link', 'livesay-core'),
          "param_name" => "ticket_link",
          "value"      => "",
          "description" => __( "Enter buy ticket button link.", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        LivesayLib::vt_open_link_tab(),

        LivesayLib::vt_class_option(),
        array(
          "type"      => 'textfield',
          "heading"   => __('Countdown Format', 'livesay-core'),
          "param_name" => "countdown_format",
          "value"      => "",
          'description' => __( "For Reference <a href='http://keith-wood.name/countdown.html' target='_blank'>Click Here</a>", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        // Plural Labels
        array(
          "type"        => "notice",
          "heading"     => __( "Countdown Plural Labels", 'livesay-core' ),
          "param_name"  => 'mts_opt',
          'class'       => 'cs-warning',
          'value'       => '',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Years Text', 'livesay-core'),
          "param_name" => "label_years",
          "value"      => "",
          "description" => __( "Enter years text here.", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Months Text', 'livesay-core'),
          "param_name" => "label_months",
          "value"      => "",
          "description" => __( "Enter months text here.", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Weeks Text', 'livesay-core'),
          "param_name" => "label_weeks",
          "value"      => "",
          "description" => __( "Enter weeks text here.", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Days Text', 'livesay-core'),
          "param_name" => "label_days",
          "value"      => "",
          "description" => __( "Enter days text here.", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Hours Text', 'livesay-core'),
          "param_name" => "label_hours",
          "value"      => "",
          "description" => __( "Enter hours text here.", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Minutes Text', 'livesay-core'),
          "param_name" => "label_minutes",
          "value"      => "",
          "description" => __( "Enter minutes text here.", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Seconds Text', 'livesay-core'),
          "param_name" => "label_seconds",
          "value"      => "",
          "description" => __( "Enter seconds text here.", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),

        // Singular Labels
        array(
          "type"        => "notice",
          "heading"     => __( "Countdown Singular Labels", 'livesay-core' ),
          "param_name"  => 'mts_opt',
          'class'       => 'cs-warning',
          'value'       => '',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Year Text', 'livesay-core'),
          "param_name" => "label_year",
          "value"      => "",
          "description" => __( "Enter year text here.", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Month Text', 'livesay-core'),
          "param_name" => "label_month",
          "value"      => "",
          "description" => __( "Enter month text here.", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Week Text', 'livesay-core'),
          "param_name" => "label_week",
          "value"      => "",
          "description" => __( "Enter week text here.", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Day Text', 'livesay-core'),
          "param_name" => "label_day",
          "value"      => "",
          "description" => __( "Enter day text here.", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Hour Text', 'livesay-core'),
          "param_name" => "label_hour",
          "value"      => "",
          "description" => __( "Enter hour text here.", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Minute Text', 'livesay-core'),
          "param_name" => "label_minute",
          "value"      => "",
          "description" => __( "Enter minute text here.", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Second Text', 'livesay-core'),
          "param_name" => "label_second",
          "value"      => "",
          "description" => __( "Enter second text here.", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),

        // Style
        array(
          "type"         => 'colorpicker',
          "heading"      => __('Title Color', 'livesay-core'),
          "param_name"   => "title_color",
          "value"        => "",
          "description"  => __( "Pick your heading color.", 'livesay-core'),
          "group"        => "Style",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Title Caption Color', 'livesay-core'),
          "param_name" => "title_caption_color",
          "value"      => "",
          "description" => __( "Pick your title caption color.", 'livesay-core'),
          "group"       => "Style",
          'dependency' => array(
            'element' => 'conference_style',
            'value' => array('livesay-conference-one','livesay-conference-three'),
          ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Title Size', 'livesay-core'),
          "param_name" => "title_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for title size in px.", 'livesay-core'),
          "group"       => "Style",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Title Caption Size', 'livesay-core'),
          "param_name" => "title_caption_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for title caption size in px.", 'livesay-core'),
          "group"       => "Style",
          'dependency' => array(
            'element' => 'conference_style',
            'value' => array('livesay-conference-one','livesay-conference-three'),
          ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"         => 'colorpicker',
          "heading"      => __('Content Color', 'livesay-core'),
          "param_name"   => "content_color",
          "value"        => "",
          "description"  => __( "Pick your content color.", 'livesay-core'),
          "group"        => "Style",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Content Size', 'livesay-core'),
          "param_name" => "content_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for content size in px.", 'livesay-core'),
          "group"       => "Style",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Button bg Color', 'livesay-core'),
          "param_name" => "btn_bg_color",
          "value"      => "",
          "group"       => "Style",
          'dependency' => array(
            'element' => 'conference_style',
            'value' => array('livesay-conference-one','livesay-conference-two','livesay-conference-four'),
          ),
          "description" => __( "Pick your button bg color.", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Button Hover Color', 'livesay-core'),
          "param_name" => "btn_hover_color",
          "value"      => "",
          "group"       => "Style",
          'dependency' => array(
            'element' => 'conference_style',
            'value' => array('livesay-conference-one','livesay-conference-two','livesay-conference-four'),
          ),
          "description" => __( "Pick your button hover color.", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Button Text Color', 'livesay-core'),
          "param_name" => "btn_txt_color",
          "value"      => "",
          "group"       => "Style",
          "description" => __( "Pick your button text color.", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Button Text Hover Color', 'livesay-core'),
          "param_name" => "btn_txt_hover_color",
          "value"      => "",
          "group"       => "Style",
          "description" => __( "Pick your button text hover color.", 'livesay-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
      )
    ) );
  }
}
