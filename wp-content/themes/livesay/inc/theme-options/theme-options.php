<?php
/*
 * All Theme Options for Livesay theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

function livesay_vt_settings( $settings ) {

  $settings           = array(
    'menu_title'      => LIVESAY_NAME . esc_html__(' Options', 'livesay'),
    'menu_slug'       => sanitize_title(LIVESAY_NAME) . '_options',
    'menu_type'       => 'menu',
    'menu_icon'       => 'dashicons-awards',
    'menu_position'   => '4',
    'ajax_save'       => false,
    'show_reset_all'  => true,
    'framework_title' => LIVESAY_NAME .' <small>V-'. LIVESAY_VERSION .' by <a href="'. LIVESAY_BRAND_URL .'" target="_blank">'. LIVESAY_BRAND_NAME .'</a></small>',
  );

  return $settings;

}
add_filter( 'cs_framework_settings', 'livesay_vt_settings' );

// Theme Framework Options
function livesay_vt_options( $options ) {

  $options      = array(); // remove old options

  // ------------------------------
  // Theme Brand
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_brand',
    'title'    => esc_html__('Brand', 'livesay'),
    'icon'     => 'fa fa-bookmark',
    'sections' => array(

      // brand logo tab
      array(
        'name'     => 'brand_logo_title',
        'title'    => esc_html__('Logo', 'livesay'),
        'icon'     => 'fa fa-star',
        'fields'   => array(

          // Site Logo
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Site Logo', 'livesay')
          ),
          array(
            'id'    => 'brand_logo_default',
            'type'  => 'image',
            'title' => esc_html__('Default Logo', 'livesay'),
            'info'  => esc_html__('Upload your default logo here. If you not upload, then site title will load in this logo location.', 'livesay'),
            'add_title' => esc_html__('Add Logo', 'livesay'),
          ),
          array(
            'id'    => 'brand_logo_retina',
            'type'  => 'image',
            'title' => esc_html__('Retina Logo', 'livesay'),
            'info'  => esc_html__('Upload your retina logo here. Recommended size is 2x from default logo.', 'livesay'),
            'add_title' => esc_html__('Add Retina Logo', 'livesay'),
          ),
          array(
            'id'          => 'retina_width',
            'type'        => 'text',
            'title'       => esc_html__('Retina & Normal Logo Width', 'livesay'),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'retina_height',
            'type'        => 'text',
            'title'       => esc_html__('Retina & Normal Logo Height', 'livesay'),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'brand_logo_top',
            'type'        => 'number',
            'title'       => esc_html__('Logo Top Space', 'livesay'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'brand_logo_bottom',
            'type'        => 'number',
            'title'       => esc_html__('Logo Bottom Space', 'livesay'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Transparent Header', 'livesay')
          ),
          array(
            'id'    => 'transparent_logo_default',
            'type'  => 'image',
            'title' => esc_html__('Transparent Logo', 'livesay'),
            'info'  => esc_html__('Upload your transparent header logo here. This logo is used in transparent header by enabled in each pages.', 'livesay'),
            'add_title' => esc_html__('Add Transparent Logo', 'livesay'),
          ),
          array(
            'id'    => 'transparent_logo_retina',
            'type'  => 'image',
            'title' => esc_html__('Transparent Retina Logo', 'livesay'),
            'info'  => esc_html__('Upload your transparent header retina logo here. This logo is used in transparent header by enabled in each pages.', 'livesay'),
            'add_title' => esc_html__('Add Transparent Retina Logo', 'livesay'),
          ),

          // WordPress Admin Logo
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('WordPress Admin Logo', 'livesay')
          ),
          array(
            'id'    => 'brand_logo_wp',
            'type'  => 'image',
            'title' => esc_html__('Login logo', 'livesay'),
            'info'  => esc_html__('Upload your WordPress login page logo here.', 'livesay'),
            'add_title' => esc_html__('Add Login Logo', 'livesay'),
          ),
        ) // end: fields
      ), // end: section

      // brand logo tab
      array(
        'name'     => 'mobile_logo_title',
        'title'    => esc_html__('Mobile Logo', 'livesay'),
        'icon'     => 'fa fa-mobile',
        'fields'   => array(

          // Mobile Logo
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Mobile Logo - If you not upload mobile logo as separatly here, then normal logo will place in that position.', 'livesay')
          ),
          array(
            'id'    => 'mobile_logo_retina',
            'type'  => 'image',
            'title' => esc_html__('Mobile Logo', 'livesay'),
            'info'  => esc_html__('Upload your mobile logo as retina size.', 'livesay'),
            'add_title' => esc_html__('Add Mobile Logo', 'livesay'),
          ),
          array(
            'id'          => 'mobile_logo_width',
            'type'        => 'text',
            'title'       => esc_html__('Mobile Logo Width', 'livesay'),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'mobile_logo_height',
            'type'        => 'text',
            'title'       => esc_html__('Mobile Logo Height', 'livesay'),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'mobile_logo_top',
            'type'        => 'number',
            'title'       => esc_html__('Logo Top Space', 'livesay'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'mobile_logo_bottom',
            'type'        => 'number',
            'title'       => esc_html__('Logo Bottom Space', 'livesay'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),

        ) // end: fields
      ), // end: section

      // Fav
      array(
        'name'     => 'brand_fav',
        'title'    => esc_html__('Fav Icon', 'livesay'),
        'icon'     => 'fa fa-anchor',
        'fields'   => array(

            // -----------------------------
            // Begin: Fav
            // -----------------------------
            array(
              'id'    => 'brand_fav_icon',
              'type'  => 'image',
              'title' => esc_html__('Fav Icon', 'livesay'),
              'info'  => esc_html__('Upload your site fav icon, size should be 16x16.', 'livesay'),
              'add_title' => esc_html__('Add Fav Icon', 'livesay'),
            ),
            array(
              'id'    => 'iphone_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPhone icon', 'livesay'),
              'info'  => esc_html__('Icon for Apple iPhone (57px x 57px). This icon is used for Bookmark on Home screen.', 'livesay'),
              'add_title' => esc_html__('Add iPhone Icon', 'livesay'),
            ),
            array(
              'id'    => 'iphone_retina_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPhone retina icon', 'livesay'),
              'info'  => esc_html__('Icon for Apple iPhone retina (114px x114px). This icon is used for Bookmark on Home screen.', 'livesay'),
              'add_title' => esc_html__('Add iPhone Retina Icon', 'livesay'),
            ),
            array(
              'id'    => 'ipad_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPad icon', 'livesay'),
              'info'  => esc_html__('Icon for Apple iPad (72px x 72px). This icon is used for Bookmark on Home screen.', 'livesay'),
              'add_title' => esc_html__('Add iPad Icon', 'livesay'),
            ),
            array(
              'id'    => 'ipad_retina_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPad retina icon', 'livesay'),
              'info'  => esc_html__('Icon for Apple iPad retina (144px x 144px). This icon is used for Bookmark on Home screen.', 'livesay'),
              'add_title' => esc_html__('Add iPad Retina Icon', 'livesay'),
            ),

        ) // end: fields
      ), // end: section

    ),
  );

  // ------------------------------
  // Layout
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_layout',
    'title'  => esc_html__('Layout', 'livesay'),
    'icon'   => 'fa fa-file-text'
  );

  $options[]      = array(
    'name'        => 'theme_general',
    'title'       => esc_html__('General', 'livesay'),
    'icon'        => 'fa fa-wrench',

    // begin: fields
    'fields'      => array(

      // -----------------------------
      // Begin: Responsive
      // -----------------------------
      array(
        'id'    => 'theme_layout_width',
        'type'  => 'image_select',
        'title' => esc_html__('Full Width & Extra Width', 'livesay'),
        'info' => esc_html__('Boxed or Fullwidth? Choose your site layout width. Default : Full Width', 'livesay'),
        'options'      => array(
          'container'    => LIVESAY_CS_IMAGES .'/boxed-width.jpg',
          'container-fluid'    => LIVESAY_CS_IMAGES .'/full-width.jpg',
        ),
        'default'      => 'container-fluid',
        'radio'      => true,
      ),

      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Background Options', 'livesay'),
        'dependency' => array( 'theme_layout_width_container', '==', 'true' ),
      ),
      array(
        'id'             => 'theme_layout_bg_type',
        'type'           => 'select',
        'title'          => esc_html__('Background Type', 'livesay'),
        'options'        => array(
          'bg-image' => esc_html__('Image', 'livesay'),
          'bg-pattern' => esc_html__('Pattern', 'livesay'),
        ),
        'dependency' => array( 'theme_layout_width_container', '==', 'true' ),
      ),
      array(
        'id'    => 'theme_layout_bg_pattern',
        'type'  => 'image_select',
        'title' => esc_html__('Background Pattern', 'livesay'),
        'info' => esc_html__('Select background pattern', 'livesay'),
        'options'      => array(
          'pattern-1'    => LIVESAY_CS_IMAGES . '/pattern-1.png',
          'pattern-2'    => LIVESAY_CS_IMAGES . '/pattern-2.png',
          'pattern-3'    => LIVESAY_CS_IMAGES . '/pattern-3.png',
          'pattern-4'    => LIVESAY_CS_IMAGES . '/pattern-4.png',
          'custom-pattern'  => LIVESAY_CS_IMAGES . '/pattern-5.png',
        ),
        'default'      => 'pattern-1',
        'radio'      => true,
        'dependency' => array( 'theme_layout_width_container|theme_layout_bg_type', '==|==', 'true|bg-pattern' ),
      ),
      array(
        'id'      => 'custom_bg_pattern',
        'type'    => 'upload',
        'title'   => esc_html__('Custom Pattern', 'livesay'),
        'dependency' => array( 'theme_layout_width_container|theme_layout_bg_type|theme_layout_bg_pattern_custom-pattern', '==|==|==', 'true|bg-pattern|true' ),
        'info' => esc_html__('Select your custom background pattern. <br />Note, background pattern image will be repeat in all x and y axis. So, please consider all repeatable area will perfectly fit your custom patterns.', 'livesay'),
      ),
      array(
        'id'      => 'theme_layout_bg',
        'type'    => 'background',
        'title'   => esc_html__('Background', 'livesay'),
        'dependency' => array( 'theme_layout_width_container|theme_layout_bg_type', '==|==', 'true|bg-image' ),
      ),
      array(
        'id'      => 'theme_bg_parallax',
        'type'    => 'switcher',
        'title'   => esc_html__('Parallax', 'livesay'),
        'dependency' => array( 'theme_layout_width_container', '==', 'true' ),
      ),
      array(
        'id'      => 'theme_bg_parallax_speed',
        'type'    => 'text',
        'title'   => esc_html__('Parallax Speed', 'livesay'),
        'attributes' => array(
          'placeholder'     => '0.4',
        ),
        'dependency' => array( 'theme_layout_width_container|theme_bg_parallax', '==|!=', 'true' ),
      ),
      array(
        'id'      => 'theme_bg_overlay_color',
        'type'    => 'color_picker',
        'title'   => esc_html__('Overlay Color', 'livesay'),
        'dependency' => array( 'theme_layout_width_container', '==', 'true' ),
      ),

    ), // end: fields

  );

  // ------------------------------
  // Header Sections
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_header_tab',
    'title'    => esc_html__('Header', 'livesay'),
    'icon'     => 'fa fa-bars',
    'sections' => array(

      // header design tab
      array(
        'name'     => 'header_design_tab',
        'title'    => esc_html__('Design', 'livesay'),
        'icon'     => 'fa fa-magic',
        'fields'   => array(

          // Extra's
          array(
            'id'          => 'mobile_breakpoint',
            'type'        => 'text',
            'title'       => esc_html__('Mobile Menu Starts from?', 'livesay'),
            'attributes'  => array( 'placeholder' => '767' ),
            'info' => esc_html__('Just put numeric value only. Like : 767. Don\'t use px or any other units.', 'livesay'),
          ),
          array(
            'id'    => 'transparent_header',
            'type'  => 'switcher',
            'title' => esc_html__('Transparent Header', 'livesay'),
            'info' => esc_html__('Turn On if you want your header as transparent.', 'livesay'),
            'default' => false,
          ),
          array(
            'id'    => 'sticky_header',
            'type'  => 'switcher',
            'title' => esc_html__('Sticky Header', 'livesay'),
            'info' => esc_html__('Turn On if you want your naviagtion bar on sticky.', 'livesay'),
            'default' => true,
          ),
          array(
            'id'    => 'cart_widget',
            'type'  => 'switcher',
            'title' => esc_html__('Cart Widget', 'livesay'),
            'info' => esc_html__('Turn On if you want to show cart widget in header. Make sure about installation/activation of WooCommerce plugin.', 'livesay'),
            'default' => false,
          ),

        )
      ),

      // header banner
      array(
        'name'     => 'header_banner_tab',
        'title'    => esc_html__('Title Bar (or) Banner', 'livesay'),
        'icon'     => 'fa fa-bullhorn',
        'fields'   => array(

          // Title Area
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Title Area', 'livesay')
          ),
          array(
            'id'      => 'need_title_bar',
            'type'    => 'switcher',
            'title'   => esc_html__('Title Bar', 'livesay'),
            'label'   => esc_html__('If you want title bar in your sub-pages, please turn this ON.', 'livesay'),
            'default'    => true,
          ),
          array(
            'id'             => 'title_bar_padding',
            'type'           => 'select',
            'title'          => esc_html__('Padding Spaces Top & Bottom', 'livesay'),
            'options'        => array(
              'padding-none' => esc_html__('Default Spacing', 'livesay'),
              'padding-xs' => esc_html__('Extra Small Padding', 'livesay'),
              'padding-sm' => esc_html__('Small Padding', 'livesay'),
              'padding-md' => esc_html__('Medium Padding', 'livesay'),
              'padding-lg' => esc_html__('Large Padding', 'livesay'),
              'padding-xl' => esc_html__('Extra Large Padding', 'livesay'),
              'padding-no' => esc_html__('No Padding', 'livesay'),
              'padding-custom' => esc_html__('Custom Padding', 'livesay'),
            ),
            'dependency'   => array( 'need_title_bar', '==', 'true' ),
          ),
          array(
            'id'             => 'titlebar_top_padding',
            'type'           => 'text',
            'title'          => esc_html__('Padding Top', 'livesay'),
            'attributes' => array(
              'placeholder'     => '100px',
            ),
            'dependency'   => array( 'title_bar_padding', '==', 'padding-custom' ),
          ),
          array(
            'id'             => 'titlebar_bottom_padding',
            'type'           => 'text',
            'title'          => esc_html__('Padding Bottom', 'livesay'),
            'attributes' => array(
              'placeholder'     => '100px',
            ),
            'dependency'   => array( 'title_bar_padding', '==', 'padding-custom' ),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Background Options', 'livesay'),
            'dependency' => array( 'need_title_bar', '==', 'true' ),
          ),
          array(
            'id'        => 'bg_type',
            'type'      => 'select',
            'title'     => esc_html__('Choose Background Type', 'livesay'),
            'options'   => array(
              'transparent'    => 'Transparent',
              'bg_img' => 'Background Image',
            ),
            'dependency' => array( 'need_title_bar', '==', 'true' ),
          ),
          array(
            'id'      => 'titlebar_bg',
            'type'    => 'background',
            'title'   => esc_html__('Background', 'livesay'),
            'dependency'  => array('bg_type|need_title_bar', '==|==', 'bg_img|true'),
          ),
          array(
            'id'      => 'titlebar_bg_overlay_color',
            'type'    => 'color_picker',
            'title'   => esc_html__('Overlay Color', 'livesay'),
            'dependency'  => array('bg_type|need_title_bar', '==|==', 'bg_img|true'),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Breadcrumbs', 'livesay'),
          ),
          array(
            'id'      => 'need_breadcrumbs',
            'type'    => 'switcher',
            'title'   => esc_html__('Breadcrumbs', 'livesay'),
            'label'   => esc_html__('If you want Breadcrumbs in your banner, please turn this ON.', 'livesay'),
            'default'    => true,
          ),

        )
      ),

    ),
  );

  // ------------------------------
  // Footer Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'footer_section',
    'title'    => esc_html__('Footer', 'livesay'),
    'icon'     => 'fa fa-ellipsis-h',
    'sections' => array(

      // footer widgets
      array(
        'name'     => 'footer_widgets_tab',
        'title'    => esc_html__('Widget Area', 'livesay'),
        'icon'     => 'fa fa-th',
        'fields'   => array(

          // Footer Widget Block
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Footer Widget Block', 'livesay')
          ),
          array(
            'id'    => 'footer_widget_block',
            'type'  => 'switcher',
            'title' => esc_html__('Enable Widget Block', 'livesay'),
            'info' => __('If you turn this ON, then Goto : Appearance > Widgets. There you can see <strong>Footer Widget 1,2,3 or 4</strong> Widget Area, add your widgets there.', 'livesay'),
            'default' => true,
          ),
          array(
            'id'    => 'footer_widget_layout',
            'type'  => 'image_select',
            'title' => esc_html__('Widget Layouts', 'livesay'),
            'info' => esc_html__('Choose your footer widget layouts.', 'livesay'),
            'default' => 1,
            'options' => array(
              1   => LIVESAY_CS_IMAGES . '/footer/footer-1.png',
              2   => LIVESAY_CS_IMAGES . '/footer/footer-2.png',
              3   => LIVESAY_CS_IMAGES . '/footer/footer-3.png',
              4   => LIVESAY_CS_IMAGES . '/footer/footer-4.png',
              5   => LIVESAY_CS_IMAGES . '/footer/footer-5.png',
              6   => LIVESAY_CS_IMAGES . '/footer/footer-6.png',
              7   => LIVESAY_CS_IMAGES . '/footer/footer-7.png',
              8   => LIVESAY_CS_IMAGES . '/footer/footer-8.png',
              9   => LIVESAY_CS_IMAGES . '/footer/footer-9.png',
            ),
            'radio'       => true,
            'dependency'  => array('footer_widget_block', '==', true),
          ),
          array(
            'id'    => 'padding_top',
            'type'  => 'text',
            'title' => esc_html__('Footer Widget Top Padding', 'livesay'),
            'shortcode' => true,
            'dependency'  => array('footer_widget_block', '==', true),
            'info' => esc_html__('Enter Padding top value Ex:40.', 'livesay'),
          ),
          array(
            'id'    => 'padding_bottom',
            'type'  => 'text',
            'title' => esc_html__('Footer Widget Bottom Padding', 'livesay'),
            'shortcode' => true,
            'dependency'  => array('footer_widget_block', '==', true),
            'info' => esc_html__('Enter Padding bottom value Ex:40.', 'livesay'),
          ),

        )
      ),

      // footer copyright
      array(
        'name'     => 'footer_copyright_tab',
        'title'    => esc_html__('Copyright Bar', 'livesay'),
        'icon'     => 'fa fa-copyright',
        'fields'   => array(

          // Copyright
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Copyright Layout', 'livesay'),
          ),
          array(
            'id'    => 'need_copyright',
            'type'  => 'switcher',
            'title' => esc_html__('Enable Copyright Section', 'livesay'),
            'default' => true,
          ),
          array(
            'id'    => 'footer_copyright_layout',
            'type'  => 'image_select',
            'title' => esc_html__('Select Copyright Layout', 'livesay'),
            'info' => esc_html__('In above image, blue box is copyright text and yellow box is secondary text.', 'livesay'),
            'default'      => 'copyright-3',
            'options'      => array(
              'copyright-1'    => LIVESAY_CS_IMAGES .'/footer/copyright-1.png',
              'copyright-2'    => LIVESAY_CS_IMAGES .'/footer/copyright-2.png',
              'copyright-3'    => LIVESAY_CS_IMAGES .'/footer/copyright-3.png',
              ),
            'radio'        => true,
            'default'      => 'copyright-3',
            'dependency'     => array('need_copyright', '==', true),
          ),
          array(
            'id'    => 'copyright_text',
            'type'  => 'textarea',
            'title' => esc_html__('Copyright Text', 'livesay'),
            'shortcode' => true,
            'dependency' => array('need_copyright', '==', true),
            'after'       => 'Helpful shortcodes: [vt_current_year] [vt_home_url] or any shortcode.',
          ),

          // Copyright Another Text
          array(
            'type'    => 'notice',
            'class'   => 'warning cs-vt-heading',
            'content' => esc_html__('Copyright Secondary Text', 'livesay'),
            'dependency'     => array('need_copyright', '==', true),
          ),
          array(
            'id'    => 'secondary_text',
            'type'  => 'textarea',
            'title' => esc_html__('Secondary Text', 'livesay'),
            'shortcode' => true,
            'dependency' => array('need_copyright', '==', 'true'),
          ),

        )
      ),

    ),
  );

  // ------------------------------
  // Design
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_design',
    'title'  => esc_html__('Design', 'livesay'),
    'icon'   => 'fa fa-magic'
  );

  // ------------------------------
  // color section
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_color_section',
    'title'    => esc_html__('Colors', 'livesay'),
    'icon'     => 'fa fa-eyedropper',
    'fields' => array(

      array(
        'type'    => 'heading',
        'content' => esc_html__('Color Options', 'livesay'),
      ),
      array(
        'type'    => 'subheading',
        'wrap_class' => 'color-tab-content',
        'content' => __('All color options are available in our theme customizer. The reason of we used customizer options for color section is because, you can choose each part of color from there and see the changes instantly using customizer. <br /><br />Highly customizable colors are in <strong>Appearance > Customize</strong>', 'livesay'),
      ),

    ),
  );

  // ------------------------------
  // Typography section
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_typo_section',
    'title'    => esc_html__('Typography', 'livesay'),
    'icon'     => 'fa fa-header',
    'fields' => array(

      // Start fields
      array(
        'id'                  => 'typography',
        'type'                => 'group',
        'fields'              => array(
          array(
            'id'              => 'title',
            'type'            => 'text',
            'title'           => esc_html__('Title', 'livesay'),
          ),
          array(
            'id'              => 'selector',
            'type'            => 'textarea',
            'title'           => esc_html__('Selector', 'livesay'),
            'info'           => __('Enter css selectors like : <strong>body, .custom-class</strong>', 'livesay'),
          ),
          array(
            'id'              => 'font',
            'type'            => 'typography',
            'title'           => esc_html__('Font Family', 'livesay'),
          ),
          array(
            'id'              => 'css',
            'type'            => 'textarea',
            'title'           => esc_html__('Custom CSS', 'livesay'),
          ),
        ),
        'button_title'        => esc_html__('Add New Typography', 'livesay'),
        'accordion_title'     => esc_html__('New Typography', 'livesay'),
        'default'             => array(
          array(
            'title'           => esc_html__('Body Typography', 'livesay'),
            'selector'        => 'body, .lvsy-btn, input[type="submit"], form label, .lvsy-countdown .countdown_amount, .lvsy-search-form form input, .woocommerce .woocommerce-ordering select, .woocommerce #review_form #respond p label, .woocommerce table.shop_table td, .woocommerce form .form-row input.input-text, .woocommerce form .form-row select, .woocommerce form .form-row textarea, .woocommerce form.checkout_coupon input.input-text, .woocommerce #add_payment_method #payment div.payment_box p, .woocommerce .woocommerce-cart #payment div.payment_box p, .woocommerce .woocommerce-checkout #payment div.payment_box p, .lvsy-contact input[type="text"], .lvsy-contact input[type="email"], .lvsy-contact input[type="password"], .lvsy-contact input[type="tel"], .lvsy-contact input[type="search"], .lvsy-contact input[type="date"], .lvsy-contact input[type="time"], .lvsy-contact input[type="datetime-local"], .lvsy-contact input[type="month"], .lvsy-contact input[type="url"], .lvsy-contact input[type="number"], .lvsy-contact select, .lvsy-contact .form-control, .lvsy-contact textarea',
            'font'            => array(
              'family'        => 'Ubuntu',
              'variant'       => 'regular',
            ),
            'size'            => '14px',
            'line_height'     => '1.42857143',
          ),
          array(
            'title'           => esc_html__('Menu Typography', 'livesay'),
            'selector'        => '.lvsy-nav .navbar-nav > li > a',
            'font'            => array(
              'family'        => 'Roboto',
              'variant'       => 'regular',
            ),
            'size'            => '15px',
          ),
          array(
            'title'           => esc_html__('Sub Menu Typography', 'livesay'),
            'selector'        => '.lvsy-nav .navbar-nav .dropdown-menu, .mean-container .mean-nav ul.sub-menu li a',
            'font'            => array(
              'family'        => 'Roboto',
              'variant'       => 'regular',
            ),
            'size'            => '14px',
            'line_height'     => '1.42857143',
          ),
          array(
            'title'           => esc_html__('Headings Typography', 'livesay'),
            'selector'        => 'h1, h2, h3, h4, h5, h6, .sponsor-info h5, .sponsor-title, .service-title, .facility-title, .news-title, .accommodation-title, .section-title',
            'font'            => array(
              'family'        => 'Ubuntu',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Shortcode Elements Typography', 'livesay'),
            'selector'        => 'p, input[type="text"], input[type="email"], input[type="password"], input[type="tel"], input[type="search"], input[type="date"], input[type="time"], input[type="datetime-local"], input[type="month"], input[type="url"], input[type="number"], textarea, select, .form-control, table td, .modal-body .wpcf7-list-item-label, .nav-tabs, .lvsy-countdown .countdown_section, .conference-location, .speaker-info .speaker-designation, .event-info .speaker-name, .event-address, .lvsy-join-event .section-title-wrap .section-sub-title, .travel-info h5, .lvsy-newsletter .section-title-wrap .section-sub-title, .pricing-info ul, .news-info .news-meta, .lvsy-page-title, span.tribe-address, .lvsy-event-contact-info, .speaker-detail-wrap .speaker-designation, .speaker-detail-wrap .speaker-quote, .blog-meta, .lvsy-comments-area .lvsy-comments-meta .comments-date, .lvsy-past-event .section-title-wrap .section-sub-title, .woocommerce-product-rating .woocommerce-review-link, .contact-info ul, #quote-carousel p, .testimonial-style-three .lvsy-carousel p',
            'font'            => array(
              'family'        => 'Roboto',
              'variant'       => 'regular',
            ),
          ),

          array(
            'title'           => esc_html__('Example Usage', 'livesay'),
            'selector'        => '.your-custom-class',
            'font'            => array(
              'family'        => 'Roboto Slab',
              'variant'       => 'regular',
            ),
          ),
        ),
      ),

      // Subset
      array(
        'id'                  => 'subsets',
        'type'                => 'select',
        'title'               => esc_html__('Subsets', 'livesay'),
        'class'               => 'chosen',
        'options'             => array(
          'latin'             => 'latin',
          'latin-ext'         => 'latin-ext',
          'cyrillic'          => 'cyrillic',
          'cyrillic-ext'      => 'cyrillic-ext',
          'greek'             => 'greek',
          'greek-ext'         => 'greek-ext',
          'vietnamese'        => 'vietnamese',
          'devanagari'        => 'devanagari',
          'khmer'             => 'khmer',
        ),
        'attributes'         => array(
          'data-placeholder' => 'Subsets',
          'multiple'         => 'multiple',
          'style'            => 'width: 200px;'
        ),
        'default'             => array( 'latin' ),
      ),

      array(
        'id'                  => 'font_weight',
        'type'                => 'select',
        'title'               => esc_html__('Font Weights', 'livesay'),
        'class'               => 'chosen',
        'options'             => array(
          '100'   => 'Thin 100',
          '100i'  => 'Thin 100 Italic',
          '200'   => 'Extra Light 200',
          '200i'  => 'Extra Light 200 Italic',
          '300'   => 'Light 300',
          '300i'  => 'Light 300 Italic',
          '400'   => 'Regular 400',
          '400i'  => 'Regular 400 Italic',
          '500'   => 'Medium 500',
          '500i'  => 'Medium 500 Italic',
          '600'   => 'Semi Bold 600',
          '600i'  => 'Semi Bold 600 Italic',
          '700'   => 'Bold 700',
          '700i'  => 'Bold 700 Italic',
          '800'   => 'Extra Bold 800',
          '800i'  => 'Extra Bold 800 Italic',
          '900'   => 'Black 900',
          '900i'  => 'Black 900 Italic',
        ),
        'attributes'         => array(
          'data-placeholder' => 'Font Weight',
          'multiple'         => 'multiple',
          'style'            => 'width: 200px;'
        ),
        'default'             => array( '400','700','600','300' ),
      ),

      // Custom Fonts Upload
      array(
        'id'                 => 'font_family',
        'type'               => 'group',
        'title'              => 'Upload Custom Fonts',
        'button_title'       => 'Add New Custom Font',
        'accordion_title'    => 'Adding New Font',
        'accordion'          => true,
        'desc'               => 'It is simple. Only add your custom fonts and click to save. After you can check "Font Family" selector. Do not forget to Save!',
        'fields'             => array(

          array(
            'id'             => 'name',
            'type'           => 'text',
            'title'          => 'Font-Family Name',
            'attributes'     => array(
              'placeholder'  => 'for eg. Arial'
            ),
          ),

          array(
            'id'             => 'ttf',
            'type'           => 'upload',
            'title'          => 'Upload .ttf <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.ttf</i>',
            ),
          ),

          array(
            'id'             => 'eot',
            'type'           => 'upload',
            'title'          => 'Upload .eot <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.eot</i>',
            ),
          ),

          array(
            'id'             => 'otf',
            'type'           => 'upload',
            'title'          => 'Upload .otf <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.otf</i>',
            ),
          ),

          array(
            'id'             => 'woff',
            'type'           => 'upload',
            'title'          => 'Upload .woff <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.woff</i>',
            ),
          ),

          array(
            'id'             => 'css',
            'type'           => 'textarea',
            'title'          => 'Extra CSS Style <small><i>(optional)</i></small>',
            'attributes'     => array(
              'placeholder'  => 'for eg. font-weight: normal;'
            ),
          ),

        ),
      ),
      // End All field

    ),
  );

  // ------------------------------
  // Pages
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_pages',
    'title'  => esc_html__('Pages', 'livesay'),
    'icon'   => 'fa fa-files-o'
  );

  // ------------------------------
  // Speaker Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'speaker_section',
    'title'    => esc_html__('Speaker', 'livesay'),
    'icon'     => 'fa fa-users',
    'fields' => array(

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Title Bar', 'livesay'),
          ),

          array(
            'id'      => 'speaker_need_title_bar',
            'type'    => 'switcher',
            'title'   => esc_html__('Title Bar', 'livesay'),
            'label'   => esc_html__('If you want title bar in your sub-pages, please turn this ON.', 'livesay'),
            'default'    => true,
          ),
          array(
            'id'             => 'speaker_title_bar_padding',
            'type'           => 'select',
            'title'          => esc_html__('Padding Spaces Top & Bottom', 'livesay'),
            'options'        => array(
              'padding-none' => esc_html__('Default Spacing', 'livesay'),
              'padding-xs' => esc_html__('Extra Small Padding', 'livesay'),
              'padding-sm' => esc_html__('Small Padding', 'livesay'),
              'padding-md' => esc_html__('Medium Padding', 'livesay'),
              'padding-lg' => esc_html__('Large Padding', 'livesay'),
              'padding-xl' => esc_html__('Extra Large Padding', 'livesay'),
              'padding-no' => esc_html__('No Padding', 'livesay'),
              'padding-custom' => esc_html__('Custom Padding', 'livesay'),
            ),
            'dependency'   => array( 'speaker_need_title_bar', '==', 'true' ),
          ),
          array(
            'id'             => 'speaker_titlebar_top_padding',
            'type'           => 'text',
            'title'          => esc_html__('Padding Top', 'livesay'),
            'attributes' => array(
              'placeholder'     => '100px',
            ),
            'dependency'   => array( 'speaker_title_bar_padding', '==', 'padding-custom' ),
          ),
          array(
            'id'             => 'speaker_titlebar_bottom_padding',
            'type'           => 'text',
            'title'          => esc_html__('Padding Bottom', 'livesay'),
            'attributes' => array(
              'placeholder'     => '100px',
            ),
            'dependency'   => array( 'speaker_title_bar_padding', '==', 'padding-custom' ),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Title Bar Background Options', 'livesay'),
            'dependency' => array( 'speaker_need_title_bar', '==', 'true' ),
          ),
          array(
            'id'        => 'speaker_bg_type',
            'type'      => 'select',
            'title'     => esc_html__('Choose Background Type', 'livesay'),
            'options'   => array(
              'transparent'    => 'Transparent',
              'bg_img' => 'Background Image',
            ),
            'dependency' => array( 'speaker_need_title_bar', '==', 'true' ),
          ),
          array(
            'id'      => 'speaker_titlebar_bg',
            'type'    => 'background',
            'title'   => esc_html__('Background', 'livesay'),
            'dependency'  => array('speaker_bg_type|speaker_need_title_bar', '==|==', 'bg_img|true'),
          ),
          array(
            'id'      => 'speaker_titlebar_bg_overlay_color',
            'type'    => 'color_picker',
            'title'   => esc_html__('Overlay Color', 'livesay'),
            'dependency'  => array('speaker_bg_type|speaker_need_title_bar', '==|==', 'bg_img|true'),
          ),

      // Speaker Start
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Speaker', 'livesay')
      ),
      array(
        'id'             => 'speaker_listing_style',
        'type'           => 'select',
        'title'          => esc_html__('Speaker Listing Style', 'livesay'),
        'options'        => array(
          'style_one' => esc_html__('Style One', 'livesay'),
          'style_two' => esc_html__('Style Two', 'livesay'),
          'style_three' => esc_html__('Style Three', 'livesay'),
        ),
        'default_option' => 'Select Speaker style',
      ),
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Listing', 'livesay')
      ),

      array(
        'id'      => 'speaker_limit',
        'type'    => 'text',
        'title'   => esc_html__('Speaker limit', 'livesay'),
        'info'   => esc_html__('Enter the number of items to show.', 'livesay'),
      ),
      array(
        'id'          => 'speaker_order',
        'title'       => esc_html__('Speaker Order', 'livesay'),
        'desc'        => esc_html__('Select speaker order', 'livesay'),
        'type'        => 'select',
        'options'        => array(
          'ascending' => esc_html__('Ascending', 'livesay'),
          'decending' => esc_html__('Decending', 'livesay'),
        ),
      ),
      array(
        'id'          => 'speaker_orderby',
        'title'       => esc_html__('Speaker Orderby', 'livesay'),
        'desc'        => esc_html__('Select speaker orderby', 'livesay'),
        'type'        => 'select',
        'options'        => array(
          'None' => esc_html__('None', 'livesay'),
          'id' => esc_html__('ID', 'livesay'),
          'author' => esc_html__('Author', 'livesay'),
          'title' => esc_html__('Title', 'livesay'),
          'date' => esc_html__('Date', 'livesay'),
        ),
      ),
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Enable/Disable Options', 'livesay')
      ),
      array(
        'id'      => 'speaker_pagination',
        'type'    => 'switcher',
        'title'   => esc_html__('Pagination', 'livesay'),
        'label'   => esc_html__('If you need pagination in speaker pages, please turn this ON.', 'livesay'),
        'default'   => true,
      ),
      // Speaker End

    ),
  );

  // ------------------------------
  // Sponsor Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'sponsor_section',
    'title'    => esc_html__('Sponsor', 'livesay'),
    'icon'     => 'fa fa-users',
    'fields' => array(

      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Title Bar', 'livesay'),
      ),

      array(
        'id'      => 'sponsor_need_title_bar',
        'type'    => 'switcher',
        'title'   => esc_html__('Title Bar', 'livesay'),
        'label'   => esc_html__('If you want title bar in your sub-pages, please turn this ON.', 'livesay'),
        'default'    => true,
      ),
      array(
        'id'             => 'sponsor_title_bar_padding',
        'type'           => 'select',
        'title'          => esc_html__('Padding Spaces Top & Bottom', 'livesay'),
        'options'        => array(
          'padding-none' => esc_html__('Default Spacing', 'livesay'),
          'padding-xs' => esc_html__('Extra Small Padding', 'livesay'),
          'padding-sm' => esc_html__('Small Padding', 'livesay'),
          'padding-md' => esc_html__('Medium Padding', 'livesay'),
          'padding-lg' => esc_html__('Large Padding', 'livesay'),
          'padding-xl' => esc_html__('Extra Large Padding', 'livesay'),
          'padding-no' => esc_html__('No Padding', 'livesay'),
          'padding-custom' => esc_html__('Custom Padding', 'livesay'),
        ),
        'dependency'   => array( 'sponsor_need_title_bar', '==', 'true' ),
      ),
      array(
        'id'             => 'sponsor_titlebar_top_padding',
        'type'           => 'text',
        'title'          => esc_html__('Padding Top', 'livesay'),
        'attributes' => array(
          'placeholder'     => '100px',
        ),
        'dependency'   => array( 'sponsor_title_bar_padding', '==', 'padding-custom' ),
      ),
      array(
        'id'             => 'sponsor_titlebar_bottom_padding',
        'type'           => 'text',
        'title'          => esc_html__('Padding Bottom', 'livesay'),
        'attributes' => array(
          'placeholder'     => '100px',
        ),
        'dependency'   => array( 'sponsor_title_bar_padding', '==', 'padding-custom' ),
      ),

      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Title Bar Background Options', 'livesay'),
        'dependency' => array( 'sponsor_need_title_bar', '==', 'true' ),
      ),
      array(
        'id'        => 'sponsor_bg_type',
        'type'      => 'select',
        'title'     => esc_html__('Choose Background Type', 'livesay'),
        'options'   => array(
          'transparent'    => 'Transparent',
          'bg_img' => 'Background Image',
        ),
        'dependency' => array( 'sponsor_need_title_bar', '==', 'true' ),
      ),
      array(
        'id'      => 'sponsor_titlebar_bg',
        'type'    => 'background',
        'title'   => esc_html__('Background', 'livesay'),
        'dependency'  => array('sponsor_bg_type|sponsor_need_title_bar', '==|==', 'bg_img|true'),
      ),
      array(
        'id'      => 'sponsor_titlebar_bg_overlay_color',
        'type'    => 'color_picker',
        'title'   => esc_html__('Overlay Color', 'livesay'),
        'dependency'  => array('sponsor_bg_type|sponsor_need_title_bar', '==|==', 'bg_img|true'),
      ),

      // Sponsor Start
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Listing', 'livesay')
      ),
      array(
        'id'             => 'sponsor_column',
        'type'           => 'select',
        'title'          => esc_html__('Sponsor Column', 'livesay'),
        'options'        => array(
          'col-3' => esc_html__('Three Columns', 'livesay'),
          'col-4' => esc_html__('Four Columns', 'livesay'),
          'col-5' => esc_html__('Five Columns', 'livesay'),
        ),
        'default_option'     => esc_html__('Select Sponsor Column', 'livesay'),
      ),

      array(
        'id'      => 'sponsor_limit',
        'type'    => 'text',
        'title'   => esc_html__('Sponsor limit', 'livesay'),
        'info'   => esc_html__('Enter the number of items to show.', 'livesay'),
      ),
      array(
        'id'          => 'sponsor_order',
        'title'       => esc_html__('Sponsor Order', 'livesay'),
        'desc'        => esc_html__('Select sponsor order', 'livesay'),
        'type'        => 'select',
        'options'        => array(
          'ascending' => esc_html__('Ascending', 'livesay'),
          'decending' => esc_html__('Decending', 'livesay'),
        ),
      ),
      array(
        'id'          => 'sponsor_orderby',
        'title'       => esc_html__('Sponsor Orderby', 'livesay'),
        'desc'        => esc_html__('Select sponsor orderby', 'livesay'),
        'type'        => 'select',
        'options'        => array(
          'None' => esc_html__('None', 'livesay'),
          'id' => esc_html__('ID', 'livesay'),
          'author' => esc_html__('Author', 'livesay'),
          'title' => esc_html__('Title', 'livesay'),
          'date' => esc_html__('Date', 'livesay'),
        ),
      ),
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Enable/Disable Options', 'livesay')
      ),
      array(
        'id'      => 'sponsor_pagination',
        'type'    => 'switcher',
        'title'   => esc_html__('Pagination', 'livesay'),
        'label'   => esc_html__('If you need pagination in sponsor pages, please turn this ON.', 'livesay'),
        'default'   => true,
      ),
      // Sponsor End

    ),
  );

  // ------------------------------
  // Gallery Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'gallery_section',
    'title'    => esc_html__('Gallery', 'livesay'),
    'icon'     => 'fa fa-picture-o',
    'fields' => array(

      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Title Bar', 'livesay'),
      ),

      array(
        'id'      => 'gallery_need_title_bar',
        'type'    => 'switcher',
        'title'   => esc_html__('Title Bar', 'livesay'),
        'label'   => esc_html__('If you want title bar in your sub-pages, please turn this ON.', 'livesay'),
        'default'    => true,
      ),
      array(
        'id'             => 'gallery_title_bar_padding',
        'type'           => 'select',
        'title'          => esc_html__('Padding Spaces Top & Bottom', 'livesay'),
        'options'        => array(
          'padding-none' => esc_html__('Default Spacing', 'livesay'),
          'padding-xs' => esc_html__('Extra Small Padding', 'livesay'),
          'padding-sm' => esc_html__('Small Padding', 'livesay'),
          'padding-md' => esc_html__('Medium Padding', 'livesay'),
          'padding-lg' => esc_html__('Large Padding', 'livesay'),
          'padding-xl' => esc_html__('Extra Large Padding', 'livesay'),
          'padding-no' => esc_html__('No Padding', 'livesay'),
          'padding-custom' => esc_html__('Custom Padding', 'livesay'),
        ),
        'dependency'   => array( 'gallery_need_title_bar', '==', 'true' ),
      ),
      array(
        'id'             => 'gallery_titlebar_top_padding',
        'type'           => 'text',
        'title'          => esc_html__('Padding Top', 'livesay'),
        'attributes' => array(
          'placeholder'     => '100px',
        ),
        'dependency'   => array( 'gallery_title_bar_padding', '==', 'padding-custom' ),
      ),
      array(
        'id'             => 'gallery_titlebar_bottom_padding',
        'type'           => 'text',
        'title'          => esc_html__('Padding Bottom', 'livesay'),
        'attributes' => array(
          'placeholder'     => '100px',
        ),
        'dependency'   => array( 'gallery_title_bar_padding', '==', 'padding-custom' ),
      ),

      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Title Bar Background Options', 'livesay'),
        'dependency' => array( 'gallery_need_title_bar', '==', 'true' ),
      ),
      array(
        'id'        => 'gallery_bg_type',
        'type'      => 'select',
        'title'     => esc_html__('Choose Background Type', 'livesay'),
        'options'   => array(
          'transparent'    => 'Transparent',
          'bg_img' => 'Background Image',
        ),
        'dependency' => array( 'gallery_need_title_bar', '==', 'true' ),
      ),
      array(
        'id'      => 'gallery_titlebar_bg',
        'type'    => 'background',
        'title'   => esc_html__('Background', 'livesay'),
        'dependency'  => array('gallery_bg_type|gallery_need_title_bar', '==|==', 'bg_img|true'),
      ),
      array(
        'id'      => 'gallery_titlebar_bg_overlay_color',
        'type'    => 'color_picker',
        'title'   => esc_html__('Overlay Color', 'livesay'),
        'dependency'  => array('gallery_bg_type|gallery_need_title_bar', '==|==', 'bg_img|true'),
      ),

      // Gallery Start
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Listing', 'livesay')
      ),
      array(
        'id'             => 'gallery_column',
        'type'           => 'select',
        'title'          => esc_html__('gallery Column', 'livesay'),
        'options'        => array(
          'col-3' => esc_html__('Three Columns', 'livesay'),
          'col-4' => esc_html__('Four Columns', 'livesay'),
        ),
        'default_option'     => esc_html__('Select gallery Column', 'livesay'),
      ),

      array(
        'id'      => 'gallery_limit',
        'type'    => 'text',
        'title'   => esc_html__('gallery limit', 'livesay'),
        'info'   => esc_html__('Enter the number of items to show.', 'livesay'),
      ),
      array(
        'id'          => 'gallery_order',
        'title'       => esc_html__('gallery Order', 'livesay'),
        'desc'        => esc_html__('Select gallery order', 'livesay'),
        'type'        => 'select',
        'options'        => array(
          'ascending' => esc_html__('Ascending', 'livesay'),
          'decending' => esc_html__('Decending', 'livesay'),
        ),
      ),
      array(
        'id'          => 'gallery_orderby',
        'title'       => esc_html__('gallery Orderby', 'livesay'),
        'desc'        => esc_html__('Select gallery orderby', 'livesay'),
        'type'        => 'select',
        'options'        => array(
          'None' => esc_html__('None', 'livesay'),
          'id' => esc_html__('ID', 'livesay'),
          'author' => esc_html__('Author', 'livesay'),
          'title' => esc_html__('Title', 'livesay'),
          'date' => esc_html__('Date', 'livesay'),
        ),
      ),
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Enable/Disable Options', 'livesay')
      ),
      array(
        'id'      => 'gallery_pagination',
        'type'    => 'switcher',
        'title'   => esc_html__('Pagination', 'livesay'),
        'label'   => esc_html__('If you need pagination in gallery pages, please turn this ON.', 'livesay'),
        'default'   => true,
      ),
      // gallery End

    ),
  );

  // ------------------------------
  // Blog Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'blog_section',
    'title'    => esc_html__('Blog', 'livesay'),
    'icon'     => 'fa fa-edit',
    'sections' => array(

      // blog general section
      array(
        'name'     => 'blog_general_tab',
        'title'    => esc_html__('General', 'livesay'),
        'icon'     => 'fa fa-cog',
        'fields'   => array(

          // Layout
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Layout', 'livesay')
          ),
          array(
            'id'             => 'blog_sidebar_position',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Position', 'livesay'),
            'options'        => array(
              'sidebar-right' => esc_html__('Right', 'livesay'),
              'sidebar-left' => esc_html__('Left', 'livesay'),
              'sidebar-hide' => esc_html__('Hide', 'livesay'),
            ),
            'default_option' => 'Select sidebar position',
            'help'          => esc_html__('This style will apply, default blog pages - Like : Archive, Category, Tags, Search & Author.', 'livesay'),
            'info'          => esc_html__('Default option : Right', 'livesay'),
          ),
          array(
            'id'             => 'blog_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'livesay'),
            'options'        => livesay_vt_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'livesay'),
            'dependency'     => array('blog_sidebar_position', '!=', 'sidebar-hide'),
            'info'          => esc_html__('Default option : Main Widget Area', 'livesay'),
          ),
          // Layout
          // Global Options
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Global Options', 'livesay')
          ),
          array(
            'id'         => 'theme_exclude_categories',
            'type'       => 'checkbox',
            'title'      => esc_html__('Exclude Categories', 'livesay'),
            'info'      => esc_html__('Select categories you want to exclude from blog page.', 'livesay'),
            'options'    => 'categories',
          ),
          array(
            'id'      => 'theme_blog_excerpt',
            'type'    => 'text',
            'title'   => esc_html__('Excerpt Length', 'livesay'),
            'info'   => esc_html__('Blog short content length, in blog listing pages.', 'livesay'),
            'default' => '55',
          ),
          array(
            'id'      => 'theme_metas_hide',
            'type'    => 'checkbox',
            'title'   => esc_html__('Meta\'s to hide', 'livesay'),
            'info'    => esc_html__('Check items you want to hide from blog/post meta field.', 'livesay'),
            'class'      => 'horizontal',
            'options'    => array(
              'category'   => esc_html__('Category', 'livesay'),
              'author'     => esc_html__('Author', 'livesay'),
              'share'    => esc_html__('Share', 'livesay'),
            ),
            // 'default' => '30',
          ),
          // End fields

        )
      ),

      // blog single section
      array(
        'name'     => 'blog_single_tab',
        'title'    => esc_html__('Single', 'livesay'),
        'icon'     => 'fa fa-sticky-note',
        'fields'   => array(

          // Start fields
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Enable / Disable', 'livesay')
          ),
          array(
            'id'    => 'single_featured_image',
            'type'  => 'switcher',
            'title' => esc_html__('Featured Image', 'livesay'),
            'info' => esc_html__('If need to hide featured image from single blog post page, please turn this OFF.', 'livesay'),
            'default' => true,
          ),
          array(
            'id'    => 'single_author_info',
            'type'  => 'switcher',
            'title' => esc_html__('Author Info', 'livesay'),
            'info' => esc_html__('If need to hide author info on single blog page, please turn this OFF.', 'livesay'),
            'default' => true,
          ),
          array(
            'id'    => 'single_share_option',
            'type'  => 'switcher',
            'title' => esc_html__('Share Option', 'livesay'),
            'info' => esc_html__('If need to hide share option on single blog page, please turn this OFF.', 'livesay'),
            'default' => true,
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Sidebar', 'livesay')
          ),
          array(
            'id'             => 'single_sidebar_position',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Position', 'livesay'),
            'options'        => array(
              'sidebar-right' => esc_html__('Right', 'livesay'),
              'sidebar-left' => esc_html__('Left', 'livesay'),
              'sidebar-hide' => esc_html__('Hide', 'livesay'),
            ),
            'default_option' => 'Select sidebar position',
            'info'          => esc_html__('Default option : Right', 'livesay'),
          ),
          array(
            'id'             => 'single_blog_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'livesay'),
            'options'        => livesay_vt_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'livesay'),
            'dependency'     => array('single_sidebar_position', '!=', 'sidebar-hide'),
            'info'          => esc_html__('Default option : Main Widget Area', 'livesay'),
          ),
          // End fields

        )
      ),

    ),
  );

if (class_exists( 'WooCommerce' )){
  // ------------------------------
  // WooCommerce Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'woocommerce_section',
    'title'    => esc_html__('WooCommerce', 'livesay'),
    'icon'     => 'fa fa-shopping-cart',
    'fields' => array(

      // Start fields
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Layout', 'livesay')
      ),
      array(
        'id'             => 'woo_product_columns',
        'type'           => 'select',
        'title'          => esc_html__('Product Column', 'livesay'),
        'options'        => array(
          3 => esc_html__('Three Column', 'livesay'),
          4 => esc_html__('Four Column', 'livesay'),
        ),
        'default_option' => esc_html__('Select Product Columns', 'livesay'),
        'help'          => esc_html__('This style will apply, default woocommerce listings pages. Like, shop and archive pages.', 'livesay'),
      ),
      array(
        'id'             => 'woo_sidebar_position',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Position', 'livesay'),
        'options'        => array(
          'right-sidebar' => esc_html__('Right', 'livesay'),
          'left-sidebar' => esc_html__('Left', 'livesay'),
          'sidebar-hide' => esc_html__('Hide', 'livesay'),
        ),
        'default_option' => esc_html__('Select sidebar position', 'livesay'),
        'info'          => esc_html__('Default option : Right', 'livesay'),
      ),
      array(
        'id'             => 'woo_widget',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Widget', 'livesay'),
        'options'        => livesay_vt_registered_sidebars(),
        'default_option' => esc_html__('Select Widget', 'livesay'),
        'dependency'     => array('woo_sidebar_position', '!=', 'sidebar-hide'),
        'info'          => esc_html__('Default option : Shop Page', 'livesay'),
      ),

      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Listing', 'livesay')
      ),
      array(
        'id'      => 'theme_woo_limit',
        'type'    => 'text',
        'title'   => esc_html__('Product Limit', 'livesay'),
        'info'   => esc_html__('Enter the number value for per page products limit.', 'livesay'),
      ),
      // End fields

      // Start fields
      array(
        'type'    => 'notice',
        'class'   => 'info cs-vt-heading',
        'content' => esc_html__('Single Product', 'livesay')
      ),
      array(
        'id'             => 'woo_related_limit',
        'type'           => 'text',
        'title'          => esc_html__('Related Products Limit', 'livesay'),
      ),
      array(
        'id'    => 'woo_single_upsell',
        'type'  => 'switcher',
        'title' => esc_html__('You May Also Like', 'livesay'),
        'info' => esc_html__('If you don\'t want \'You May Also Like\' products in single product page, please turn this ON.', 'livesay'),
        'default' => false,
      ),
      array(
        'id'    => 'woo_single_related',
        'type'  => 'switcher',
        'title' => esc_html__('Related Products', 'livesay'),
        'info' => esc_html__('If you don\'t want \'Related Products\' in single product page, please turn this ON.', 'livesay'),
        'default' => false,
      ),
      // End fields

    ),
  );
}

  // ------------------------------
  // Extra Pages
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_extra_pages',
    'title'    => esc_html__('Extra Pages', 'livesay'),
    'icon'     => 'fa fa-clone',
    'sections' => array(

      // error 404 page
      array(
        'name'     => 'error_page_section',
        'title'    => esc_html__('404 Page', 'livesay'),
        'icon'     => 'fa fa-exclamation-triangle',
        'fields'   => array(

          // Start 404 Page
          array(
            'id'    => 'error_heading',
            'type'  => 'text',
            'title' => esc_html__('404 Page Heading', 'livesay'),
            'info'  => esc_html__('Enter 404 page heading.', 'livesay'),
          ),
          array(
            'id'    => 'error_page_content',
            'type'  => 'textarea',
            'title' => esc_html__('404 Page Content', 'livesay'),
            'info'  => esc_html__('Enter 404 page content.', 'livesay'),
            'shortcode' => true,
          ),
          array(
            'id'    => 'error_page_bg',
            'type'  => 'image',
            'title' => esc_html__('404 Page Background', 'livesay'),
            'info'  => esc_html__('Choose 404 page background styles.', 'livesay'),
            'add_title' => esc_html__('Add 404 Image', 'livesay'),
          ),
          array(
            'id'    => 'error_btn_text',
            'type'  => 'text',
            'title' => esc_html__('Button Text', 'livesay'),
            'info'  => esc_html__('Enter BACK TO HOME button text. If you want to change it.', 'livesay'),
          ),
          // End 404 Page

        ) // end: fields
      ), // end: fields section

      // maintenance mode page
      array(
        'name'     => 'maintenance_mode_section',
        'title'    => esc_html__('Maintenance Mode', 'livesay'),
        'icon'     => 'fa fa-hourglass-half',
        'fields'   => array(

          // Start Maintenance Mode
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => __('If you turn this ON : Only Logged in users will see your pages. All other visiters will see, selected page of : <strong>Maintenance Mode Page</strong>', 'livesay')
          ),
          array(
            'id'             => 'enable_maintenance_mode',
            'type'           => 'switcher',
            'title'          => esc_html__('Maintenance Mode', 'livesay'),
            'default'        => false,
          ),
          array(
            'id'             => 'maintenance_mode_page',
            'type'           => 'select',
            'title'          => esc_html__('Maintenance Mode Page', 'livesay'),
            'options'        => 'pages',
            'default_option' => esc_html__('Select a page', 'livesay'),
            'dependency'   => array( 'enable_maintenance_mode', '==', 'true' ),
          ),
          array(
            'id'             => 'maintenance_mode_bg',
            'type'           => 'background',
            'title'          => esc_html__('Page Background', 'livesay'),
            'dependency'   => array( 'enable_maintenance_mode', '==', 'true' ),
          ),
          // End Maintenance Mode

        ) // end: fields
      ), // end: fields section

    )
  );

  // ------------------------------
  // Advanced
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_advanced',
    'title'  => esc_html__('Advanced', 'livesay'),
    'icon'   => 'fa fa-cog'
  );

  // ------------------------------
  // Misc Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'misc_section',
    'title'    => esc_html__('Misc', 'livesay'),
    'icon'     => 'fa fa-recycle',
    'sections' => array(

      // custom sidebar section
      array(
        'name'     => 'custom_sidebar_section',
        'title'    => esc_html__('Custom Sidebar', 'livesay'),
        'icon'     => 'fa fa-reorder',
        'fields'   => array(

          // start fields
          array(
            'id'              => 'custom_sidebar',
            'title'           => esc_html__('Sidebars', 'livesay'),
            'desc'            => esc_html__('Go to Appearance -> Widgets after create sidebars', 'livesay'),
            'type'            => 'group',
            'fields'          => array(
              array(
                'id'          => 'sidebar_name',
                'type'        => 'text',
                'title'       => esc_html__('Sidebar Name', 'livesay'),
              ),
              array(
                'id'          => 'sidebar_desc',
                'type'        => 'text',
                'title'       => esc_html__('Custom Description', 'livesay'),
              )
            ),
            'accordion'       => true,
            'button_title'    => esc_html__('Add New Sidebar', 'livesay'),
            'accordion_title' => esc_html__('New Sidebar', 'livesay'),
          ),
          // end fields

        )
      ),
      // custom sidebar section

      // Custom CSS/JS
      array(
        'name'        => 'custom_css_js_section',
        'title'       => esc_html__('Custom Codes', 'livesay'),
        'icon'        => 'fa fa-code',

        // begin: fields
        'fields'      => array(

          // Start Custom CSS/JS
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Custom CSS', 'livesay')
          ),
          array(
            'id'             => 'theme_custom_css',
            'type'           => 'textarea',
            'attributes' => array(
              'rows'     => 10,
              'placeholder'     => esc_html__('Enter your CSS code here...', 'livesay'),
            ),
          ),
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Custom JS', 'livesay')
          ),
          array(
            'id'             => 'theme_custom_js',
            'type'           => 'textarea',
            'attributes' => array(
              'rows'     => 10,
              'placeholder'     => esc_html__('Enter your JS code here...', 'livesay'),
            ),
          ),
          // End Custom CSS/JS

        ) // end: fields
      ),

      // Translation
      array(
        'name'        => 'theme_translation_section',
        'title'       => esc_html__('Translation', 'livesay'),
        'icon'        => 'fa fa-language',

        // begin: fields
        'fields'      => array(

          // Start Translation
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Common Texts', 'livesay')
          ),
          array(
            'id'          => 'read_more_text',
            'type'        => 'text',
            'title'       => esc_html__('Continue Reading Text', 'livesay'),
          ),
          array(
            'id'          => 'share_text',
            'type'        => 'text',
            'title'       => esc_html__('Share Text', 'livesay'),
          ),
          array(
            'id'          => 'share_on_text',
            'type'        => 'text',
            'title'       => esc_html__('Share On Tooltip Text', 'livesay'),
          ),
          array(
            'id'          => 'author_text',
            'type'        => 'text',
            'title'       => esc_html__('Author Text', 'livesay'),
          ),
          array(
            'id'          => 'post_comment_text',
            'type'        => 'text',
            'title'       => esc_html__('Post Comment Text [Submit Button]', 'livesay'),
          ),
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('WooCommerce', 'livesay')
          ),
          array(
            'id'          => 'add_to_cart_text',
            'type'        => 'text',
            'title'       => esc_html__('Add to Cart Text', 'livesay'),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Single Event', 'livesay')
          ),
          array(
            'id'          => 'about_organizer',
            'type'        => 'text',
            'title'       => esc_html__('About the Organizer', 'livesay'),
          ),
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Speaker', 'livesay')
          ),
          array(
            'id'          => 'speaker_title',
            'type'        => 'text',
            'title'       => esc_html__('Speaker', 'livesay'),
          ),
          array(
            'id'          => 'speaker_website',
            'type'        => 'text',
            'title'       => esc_html__('Website', 'livesay'),
          ),
          array(
            'id'          => 'speaker_follow',
            'type'        => 'text',
            'title'       => esc_html__('Follow', 'livesay'),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Sponsor', 'livesay')
          ),
          array(
            'id'          => 'sponsor_type',
            'type'        => 'text',
            'title'       => esc_html__('Type', 'livesay'),
          ),
          array(
            'id'          => 'sponsor_website',
            'type'        => 'text',
            'title'       => esc_html__('Website', 'livesay'),
          ),
          array(
            'id'          => 'sponsor_follow',
            'type'        => 'text',
            'title'       => esc_html__('Follow', 'livesay'),
          ),
          array(
            'id'          => 'sponsor_learn_more',
            'type'        => 'text',
            'title'       => esc_html__('Learn More', 'livesay'),
          ),
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Pagination', 'livesay')
          ),
          array(
            'id'          => 'older_post',
            'type'        => 'text',
            'title'       => esc_html__('Older Posts Text', 'livesay'),
          ),
          array(
            'id'          => 'newer_post',
            'type'        => 'text',
            'title'       => esc_html__('Newer Posts Text', 'livesay'),
          ),

          // End Translation

        ) // end: fields
      ),

    ),
  );

  // ------------------------------
  // backup                       -
  // ------------------------------
  $options[]   = array(
    'name'     => 'backup_section',
    'title'    => 'Backup',
    'icon'     => 'fa fa-shield',
    'fields'   => array(

      array(
        'type'    => 'notice',
        'class'   => 'warning',
        'content' => 'You can save your current options. Download a Backup and Import.',
      ),

      array(
        'type'    => 'backup',
      ),

    )
  );

  return $options;

}
add_filter( 'cs_framework_options', 'livesay_vt_options' );
