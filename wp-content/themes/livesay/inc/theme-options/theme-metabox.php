<?php
/*
 * All Metabox related options for Livesay theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

function livesay_vt_metabox_options( $options ) {

  $options      = array();

  // -----------------------------------------
  // Page Metabox Options                    -
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'page_type_metabox',
    'title'     => esc_html__('Page Custom Options', 'livesay'),
    'post_type' => array('post', 'page', 'product', 'speakers', 'sponsor', 'tribe_events', 'gallery'),
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(

      // Header
      array(
        'name'  => 'header_section',
        'title' => esc_html__('Header', 'livesay'),
        'icon'  => 'fa fa-bars',
        'fields' => array(

          array(
            'id'    => 'stick_header',
            'type'  => 'switcher',
            'title' => esc_html__('Sticky Header', 'livesay'),
            'info' => esc_html__('Turn On if you want your naviagtion bar on sticky.', 'livesay'),
          ),
          array(
            'id'    => 'transparency_header',
            'type'  => 'switcher',
            'title' => esc_html__('Transparent Header', 'livesay'),
            'info' => esc_html__('Use Transparent Method', 'livesay'),
          ),
          array(
            'id'    => 'transparent_menu_color',
            'type'  => 'color_picker',
            'title' => esc_html__('Menu Color', 'livesay'),
            'info' => esc_html__('Pick your menu color. This color will only apply for non-sticky header mode.', 'livesay'),
            'dependency'   => array('transparency_header', '==', 'true'),
          ),
          array(
            'id'    => 'transparent_menu_hover_color',
            'type'  => 'color_picker',
            'title' => esc_html__('Menu Hover Color', 'livesay'),
            'info' => esc_html__('Pick your menu hover color. This color will only apply for non-sticky header mode.', 'livesay'),
            'dependency'   => array('transparency_header', '==', 'true'),
          ),
          array(
            'id'             => 'choose_menu',
            'type'           => 'select',
            'title'          => esc_html__('Choose Menu', 'livesay'),
            'desc'          => esc_html__('Choose custom menus for this page.', 'livesay'),
            'options'        => 'menus',
            'default_option' => esc_html__('Select your menu', 'livesay'),
          ),

          // Enable & Disable
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Enable & Disable', 'livesay'),
            'dependency' => array('header_design', '!=', 'default'),
          ),
          array(
            'id'    => 'sticky_header',
            'type'  => 'switcher',
            'title' => esc_html__('Sticky Header', 'livesay'),
            'info' => esc_html__('Turn On if you want your naviagtion bar on sticky.', 'livesay'),
            'default' => false,
            'dependency' => array('header_design', '!=', 'default'),
          ),
          array(
            'id'    => 'search_icon',
            'type'  => 'switcher',
            'title' => esc_html__('Search Icon', 'livesay'),
            'info' => esc_html__('Turn On if you want to show search icon in navigation bar.', 'livesay'),
            'default' => true,
            'dependency' => array('header_design', '!=', 'default'),
          ),
          array(
            'id'    => 'cart_widget',
            'type'  => 'switcher',
            'title' => esc_html__('Cart Widget', 'livesay'),
            'info' => esc_html__('Turn On if you want to show cart widget in header. Make sure about installation/activation of WooCommerce plugin.', 'livesay'),
            'default' => false,
          ),

        ),
      ),
      // Header

      // Banner & Title Area
      array(
        'name'  => 'banner_title_section',
        'title' => esc_html__('Banner & Title Area', 'livesay'),
        'icon'  => 'fa fa-bullhorn',
        'fields' => array(

          array(
            'id'        => 'banner_type',
            'type'      => 'select',
            'title'     => esc_html__('Choose Banner Type', 'livesay'),
            'options'   => array(
              'default-title'    => 'Default Title',
              'revolution-slider' => 'Shortcode [Rev Slider]',
              'hide-title-area'   => 'Hide Title/Banner Area',
            ),
          ),
          array(
            'id'    => 'page_revslider',
            'type'  => 'textarea',
            'title' => esc_html__('Revolution Slider or Any Shortcodes', 'livesay'),
            'desc' => esc_html__('Enter any shortcodes that you want to show in this page title area. <br />Eg : Revolution Slider shortcode.', 'livesay'),
            'attributes' => array(
              'placeholder' => esc_html__('Enter your shortcode...', 'livesay'),
            ),
            'dependency'   => array('banner_type', '==', 'revolution-slider'),
          ),
          array(
            'id'    => 'page_custom_title',
            'type'  => 'text',
            'title' => esc_html__('Custom Title', 'livesay'),
            'attributes' => array(
              'placeholder' => esc_html__('Enter your custom title...', 'livesay'),
            ),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'        => 'title_area_spacings',
            'type'      => 'select',
            'title'     => esc_html__('Title Area Spacings', 'livesay'),
            'options'   => array(
              'padding-none' => esc_html__('Default Spacing', 'livesay'),
              'padding-xs' => esc_html__('Extra Small Padding', 'livesay'),
              'padding-sm' => esc_html__('Small Padding', 'livesay'),
              'padding-md' => esc_html__('Medium Padding', 'livesay'),
              'padding-lg' => esc_html__('Large Padding', 'livesay'),
              'padding-xl' => esc_html__('Extra Large Padding', 'livesay'),
              'padding-cnt-no' => esc_html__('No Padding', 'livesay'),
              'padding-custom' => esc_html__('Custom Padding', 'livesay'),
            ),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'title_top_spacings',
            'type'  => 'text',
            'title' => esc_html__('Top Spacing', 'livesay'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('banner_type|title_area_spacings', '==|==', 'default-title|padding-custom'),
          ),
          array(
            'id'    => 'title_bottom_spacings',
            'type'  => 'text',
            'title' => esc_html__('Bottom Spacing', 'livesay'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('banner_type|title_area_spacings', '==|==', 'default-title|padding-custom'),
          ),
          array(
            'id'        => 'bg_type',
            'type'      => 'select',
            'title'     => esc_html__('Choose Background Type', 'livesay'),
            'options'   => array(
              'bg_img' => 'Background Image',
              'transparent'    => 'Transparent',
            ),
            'default'    => 'bg_img',
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'title_area_bg',
            'type'  => 'background',
            'title' => esc_html__('Background', 'livesay'),
            'dependency'  => array('bg_type|banner_type', '==|==', 'bg_img|default-title'),
          ),
          array(
            'id'    => 'titlebar_bg_overlay_color',
            'type'  => 'color_picker',
            'title' => esc_html__('Overlay Color', 'livesay'),
            'dependency'  => array('bg_type|banner_type', '==|==', 'bg_img|default-title'),
          ),

        ),
      ),
      // Banner & Title Area

      // Content Section
      array(
        'name'  => 'page_content_options',
        'title' => esc_html__('Content Options', 'livesay'),
        'icon'  => 'fa fa-file',

        'fields' => array(

          array(
            'id'        => 'content_spacings',
            'type'      => 'select',
            'title'     => esc_html__('Content Spacings', 'livesay'),
            'options'   => array(
              'padding-none' => esc_html__('Default Spacing', 'livesay'),
              'padding-xs' => esc_html__('Extra Small Padding', 'livesay'),
              'padding-sm' => esc_html__('Small Padding', 'livesay'),
              'padding-md' => esc_html__('Medium Padding', 'livesay'),
              'padding-lg' => esc_html__('Large Padding', 'livesay'),
              'padding-xl' => esc_html__('Extra Large Padding', 'livesay'),
              'padding-cnt-no' => esc_html__('No Padding', 'livesay'),
              'padding-custom' => esc_html__('Custom Padding', 'livesay'),
            ),
            'desc' => esc_html__('Content area top and bottom spacings.', 'livesay'),
          ),
          array(
            'id'    => 'content_top_spacings',
            'type'  => 'text',
            'title' => esc_html__('Top Spacing', 'livesay'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('content_spacings', '==', 'padding-custom'),
          ),
          array(
            'id'    => 'content_bottom_spacings',
            'type'  => 'text',
            'title' => esc_html__('Bottom Spacing', 'livesay'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('content_spacings', '==', 'padding-custom'),
          ),

        ), // End Fields
      ), // Content Section

      // Enable & Disable
      array(
        'name'  => 'hide_show_section',
        'title' => esc_html__('Enable & Disable', 'livesay'),
        'icon'  => 'fa fa-toggle-on',
        'fields' => array(

          array(
            'id'    => 'hide_header',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Header', 'livesay'),
            'label' => esc_html__('Yes, Please do it.', 'livesay'),
          ),
          array(
            'id'    => 'hide_breadcrumbs',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Breadcrumbs', 'livesay'),
            'label' => esc_html__('Yes, Please do it.', 'livesay'),
          ),
          array(
            'id'    => 'hide_footer',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Footer', 'livesay'),
            'label' => esc_html__('Yes, Please do it.', 'livesay'),
          ),

        ),
      ),
      // Enable & Disable

    ),
  );

  // -----------------------------------------
  // Page Layout
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'page_layout_options',
    'title'     => esc_html__('Page Layout', 'livesay'),
    'post_type' => array('page', 'gallery'),
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'page_layout_section',
        'fields' => array(

          array(
            'id'        => 'page_layout',
            'type'      => 'image_select',
            'options'   => array(
              'full-width'    => LIVESAY_CS_IMAGES . '/page-1.png',
              'extra-width'   => LIVESAY_CS_IMAGES . '/page-2.png',
              'left-sidebar'  => LIVESAY_CS_IMAGES . '/page-3.png',
              'right-sidebar' => LIVESAY_CS_IMAGES . '/page-4.png',
            ),
            'attributes' => array(
              'data-depend-id' => 'page_layout',
            ),
            'default'    => 'full-width',
            'radio'      => true,
            'wrap_class' => 'text-center',
          ),
          array(
            'id'            => 'page_sidebar_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'livesay'),
            'options'        => livesay_vt_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'livesay'),
            'dependency'   => array('page_layout', 'any', 'left-sidebar,right-sidebar'),
          ),

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Testimonial
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'testimonial_options',
    'title'     => esc_html__('Testimonial Client', 'livesay'),
    'post_type' => 'testimonial',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'testimonial_option_section',
        'fields' => array(

          array(
            'id'      => 'testi_name',
            'type'    => 'text',
            'title'   => esc_html__('Name', 'livesay'),
            'info'    => esc_html__('Enter client name', 'livesay'),
          ),
          array(
            'id'      => 'testi_name_link',
            'type'    => 'text',
            'title'   => esc_html__('Name Link', 'livesay'),
            'info'    => esc_html__('Enter client name link, if you want', 'livesay'),
          ),
          array(
            'id'      => 'testi_pro',
            'type'    => 'text',
            'title'   => esc_html__('Profession', 'livesay'),
            'info'    => esc_html__('Enter client profession', 'livesay'),
          ),
          array(
            'id'      => 'testi_pro_link',
            'type'    => 'text',
            'title'   => esc_html__('Profession Link', 'livesay'),
            'info'    => esc_html__('Enter client profession link', 'livesay'),
          ),

        ),
      ),

    ),
  );

  // -----------------------------------------
  // speakers
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'speakers_options',
    'title'     => esc_html__('Speaker Details', 'livesay'),
    'post_type' => 'speakers',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'speakers_option_section',
        'fields' => array(

          array(
            'id'      => 'speakers_events_list',
            'type'    => 'textarea',
            'title'    => esc_html__('Speaker Events List', 'livesay'),
            'info'    => esc_html__('Enter speaker events lists.', 'livesay'),
            'shortcode' => true,
          ),

          array(
            'id'      => 'speakers_website',
            'type'    => 'text',
            'title'    => esc_html__('Speaker Website', 'livesay'),
            'attributes' => array(
              'placeholder' => esc_html__('Eg : www.testsite.com', 'livesay'),
            ),
            'info'    => esc_html__('Enter Speaker website.', 'livesay'),
          ),
          array(
            'id'      => 'speakers_website_link',
            'type'    => 'text',
            'title'    => esc_html__('Speaker Website Link', 'livesay'),
            'attributes' => array(
              'placeholder' => esc_html__('http://', 'livesay'),
            ),
            'info'    => esc_html__('Enter speaker website link.', 'livesay'),
          ),
          array(
            'id'      => 'speakers_designation',
            'type'    => 'text',
            'title'    => esc_html__('Speaker Designation', 'livesay'),
            'attributes' => array(
              'placeholder' => esc_html__('Eg : UI Design', 'livesay'),
            ),
            'info'    => esc_html__('Enter Speaker website.', 'livesay'),
          ),
          array(
            'id'      => 'speakers_quote',
            'type'    => 'textarea',
            'title'    => esc_html__('Speaker Quote', 'livesay'),
            'info'    => esc_html__('Enter Speaker quote.', 'livesay'),
          ),
          array(
            'id'      => 'speakers_custom_link',
            'type'    => 'text',
            'title'    => esc_html__('Custom Link', 'livesay'),
            'attributes' => array(
              'placeholder' => esc_html__('http://', 'livesay'),
            ),
            'info'    => esc_html__('Enter your custom link, if you don\'t want to show this page.', 'livesay'),
          ),
          array(
            'id'                  => 'social_icons',
            'type'                => 'group',
            'title'    => esc_html__('Social Icons', 'livesay'),
            'button_title'       => 'Add New Icon',
            'accordion_title'    => 'Adding New Icon',
            'accordion'          => true,
            'fields'              => array(
              array(
                'id'              => 'icon',
                'type'            => 'icon',
                'title'           => esc_html__('Select your icon', 'livesay'),
              ),
              array(
                'id'              => 'icon_link',
                'type'            => 'text',
                'title'           => esc_html__('Enter your icon link', 'livesay'),
              ),

            ),

          ),

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Sponsors
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'sponsor_options',
    'title'     => esc_html__('Sponsor Details', 'livesay'),
    'post_type' => 'sponsor',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'sponsor_option_section',
        'fields' => array(

          array(
            'id'      => 'sponsor_type',
            'type'    => 'text',
            'title'    => esc_html__('Sponsor Type', 'livesay'),
            'attributes' => array(
              'placeholder' => esc_html__('Eg : Platinum Sponsor', 'livesay'),
            ),
            'info'    => esc_html__('Enter sponsor type.', 'livesay'),
          ),
          array(
            'id'      => 'sponsor_type_link',
            'type'    => 'text',
            'title'    => esc_html__('Sponsor Type Link', 'livesay'),
            'attributes' => array(
              'placeholder' => esc_html__('http://', 'livesay'),
            ),
            'info'    => esc_html__('Enter sponsor type link.', 'livesay'),
          ),
          array(
            'id'      => 'sponsor_website',
            'type'    => 'text',
            'title'    => esc_html__('Sponsor Website', 'livesay'),
            'attributes' => array(
              'placeholder' => esc_html__('Eg : www.yoursite.com', 'livesay'),
            ),
            'info'    => esc_html__('Enter sponsor website.', 'livesay'),
          ),
          array(
            'id'      => 'sponsor_website_link',
            'type'    => 'text',
            'title'    => esc_html__('Sponsor Website Link', 'livesay'),
            'attributes' => array(
              'placeholder' => esc_html__('http://', 'livesay'),
            ),
            'info'    => esc_html__('Enter sponsor website link.', 'livesay'),
          ),
          array(
            'id'      => 'sponsor_profile',
            'type'    => 'text',
            'title'    => esc_html__('Sponsor Profile Text', 'livesay'),
            'attributes' => array(
              'placeholder' => esc_html__('Eg : My Profile', 'livesay'),
            ),
            'info'    => esc_html__('Enter sponsor profile text.', 'livesay'),
          ),
          array(
            'id'      => 'sponsor_profile_link',
            'type'    => 'text',
            'title'    => esc_html__('Sponsor Profile Link', 'livesay'),
            'attributes' => array(
              'placeholder' => esc_html__('http://', 'livesay'),
            ),
            'info'    => esc_html__('Enter sponsor profile link.', 'livesay'),
          ),
          array(
            'id'      => 'sponsor_contact',
            'type'    => 'text',
            'title'    => esc_html__('Sponsor Contact Us Text', 'livesay'),
            'attributes' => array(
              'placeholder' => esc_html__('Eg : Contact', 'livesay'),
            ),
            'info'    => esc_html__('Enter sponsor contact us text.', 'livesay'),
          ),
          array(
            'id'      => 'sponsor_contact_link',
            'type'    => 'text',
            'title'    => esc_html__('Sponsor Contact Us Link', 'livesay'),
            'attributes' => array(
              'placeholder' => esc_html__('http://', 'livesay'),
            ),
            'info'    => esc_html__('Enter sponsor contact us link.', 'livesay'),
          ),
          array(
            'id'      => 'sponsor_quote',
            'type'    => 'textarea',
            'title'    => esc_html__('Sponsor Quote', 'livesay'),
            'info'    => esc_html__('Enter Sponsor quote.', 'livesay'),
          ),
          array(
            'id'      => 'sponsor_short_info',
            'type'    => 'textarea',
            'title'    => esc_html__('Sponsor Short Info', 'livesay'),
            'info'    => esc_html__('Enter Sponsor short info.', 'livesay'),
          ),
          array(
            'id'                  => 'social_icons',
            'type'                => 'group',
            'title'    => esc_html__('Social Icons', 'livesay'),
            'button_title'       => 'Add New Icon',
            'accordion_title'    => 'Adding New Icon',
            'accordion'          => true,
            'fields'              => array(
              array(
                'id'              => 'icon',
                'type'            => 'icon',
                'title'           => esc_html__('Select your icon', 'livesay'),
              ),
              array(
                'id'              => 'icon_link',
                'type'            => 'text',
                'title'           => esc_html__('Enter your icon link', 'livesay'),
              ),

            ),

          ),

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Above Footer Widget
  // -----------------------------------------
    $options[]    = array(
    'id'        => 'above_footer_option',
    'title'     => esc_html__('Above Footer Widget', 'livesay'),
    'post_type' => array('sponsor','page','speakers','post'),
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'above_footer_option_section',
        'fields' => array(

          array(
            'id'            => 'above_footer_widget',
            'type'           => 'switcher',
            'title'          => esc_html__('Show Above footer Widget', 'livesay'),
            'info'          => esc_html__('Make sure to add widget in Appearance > widgets > Above Footer Widget', 'livesay'),
          ),
        ),
      ),

    ),
  );

  // -----------------------------------------
  // Gallery
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'gallery_options',
    'title'     => esc_html__('Gallery Details', 'livesay'),
    'post_type' => 'gallery',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'gallery_option_section',
        'fields' => array(

          array(
            'id'        => 'gallery_link_type',
            'type'      => 'select',
            'title'     => esc_html__('Choose Gallery Link Type', 'livesay'),
            'options'   => array(
              'post-link'    => 'Post Link',
              'popup-img' => 'Large Image Popup',
            ),
          ),
          array(
            'id'      => 'popup_image',
            'type'    => 'image',
            'title'   => esc_html__('Gallery Popup Image', 'livesay'),
            'dependency'   => array('gallery_link_type', '==', 'popup-img'),
          ),

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Events
  // -----------------------------------------
  $speaker_args = array(
    'post_type' => 'speakers',
    'posts_per_page' => -1,
  );
  $speaker_list = get_posts($speaker_args);
  $speaker_post = array();
  if ( $speaker_list ) {
    foreach ( $speaker_list as $speaker ) {
      $speaker_post[ $speaker->ID ] = $speaker->post_title;
    }
  } else {
    $speaker_post[ esc_html__( 'No Speakers found', 'livesay' ) ] = 0;
  }

  $sponsor_args = array(
    'post_type' => 'sponsor',
    'posts_per_page' => -1,
  );
  $sponsor_list = get_posts($sponsor_args);
  $sponsor_post = array();
  if ( $sponsor_list ) {
    foreach ( $sponsor_list as $sponsor ) {
      $sponsor_post[ $sponsor->ID ] = $sponsor->post_title;
    }
  } else {
    $sponsor_post[ esc_html__( 'No Speakers found', 'livesay' ) ] = 0;
  }
  $options[]    = array(
    'id'        => 'livesay_tribe_event_options',
    'title'     => esc_html__('Event Speaker & Sponsor Details', 'livesay'),
    'post_type' => 'tribe_events',
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'livesay_tribe_event_section',
        'fields' => array(

          array(
            'id' => 'event_speaker',
            'type' => 'select',
            'title' => esc_html__( 'Select Speaker', 'livesay' ),
            'options'  => $speaker_post,
            'attributes'         => array(
              'placeholder'   => 'Select a Spearker',
              'multiple'      => 'multiple'
            ),
            'class'         => 'chosen',
            'info' => esc_html__( 'Select your event speaker.', 'livesay' ),
          ),
          array(
            'id' => 'event_sponsor',
            'type' => 'select',
            'title' => esc_html__( 'Select Sponsor', 'livesay' ),
            'options'  => $sponsor_post,
            'attributes'         => array(
              'placeholder'   => 'Select a Sponsor',
              'multiple'      => 'multiple'
            ),
            'class'         => 'chosen',
            'info' => esc_html__( 'Select your event sponser.', 'livesay' ),
          ),

        ),
      ),

    ),
  );

  return $options;

}
add_filter( 'cs_metabox_options', 'livesay_vt_metabox_options' );