<?php
/*
 * All Custom Shortcode for [theme_name] theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

if( ! function_exists( 'livesay_vt_shortcodes' ) ) {
  function livesay_vt_shortcodes( $options ) {

    $options       = array();

    /* Content Shortcodes */
    $options[]     = array(
      'title'      => __('Content Shortcodes', 'livesay'),
      'shortcodes' => array(

        // Spacer
        array(
          'name'          => 'vc_empty_space',
          'title'         => __('Spacer', 'livesay'),
          'fields'        => array(

            array(
              'id'        => 'height',
              'type'      => 'text',
              'title'     => __('Height', 'livesay'),
              'attributes' => array(
                'placeholder'     => '20px',
              ),
            ),

          ),
        ),
        // Spacer

        // Section Title
        array(
          'name'          => 'vt_section_title',
          'title'         => __('Section Title', 'livesay'),
          'fields'        => array(

            array(
              'id'        => 'section_title',
              'type'      => 'text',
              'title'     => __('Title', 'livesay'),
            ),
            array(
              'id'        => 'section_sub_title',
              'type'      => 'text',
              'title'     => __('sub-Title', 'livesay'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'livesay'),
            ),
            array(
              'id'        => 'title_color',
              'type'      => 'color_picker',
              'title'     => __('Title Color', 'livesay'),
            ),
            array(
              'id'        => 'title_size',
              'type'      => 'text',
              'title'     => __('Title Size', 'livesay'),
            ),
            array(
              'id'        => 'sub_title_color',
              'type'      => 'color_picker',
              'title'     => __('Sub-Title Color', 'livesay'),
            ),
            array(
              'id'        => 'sub_title_size',
              'type'      => 'text',
              'title'     => __('sub-Title Size', 'livesay'),
            ),

          ),

        ),
        // Section Title

        // Social Icons
        array(
          'name'          => 'vt_socials',
          'title'         => __('Social Icons', 'livesay'),
          'view'          => 'clone',
          'clone_id'      => 'vt_social',
          'clone_title'   => __('Add New', 'livesay'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'livesay'),
            ),

            // Colors
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Colors', 'livesay')
            ),
            array(
              'id'        => 'icon_color',
              'type'      => 'color_picker',
              'title'     => __('Icon Color', 'livesay'),
              'wrap_class' => 'column_third',
            ),
            array(
              'id'        => 'icon_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Icon Hover Color', 'livesay'),
              'wrap_class' => 'column_third',
            ),

            // Icon Size
            array(
              'id'        => 'icon_size',
              'type'      => 'text',
              'title'     => __('Icon Size', 'livesay'),
              'wrap_class' => 'column_full',
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'social_link',
              'type'      => 'text',
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
              'title'     => __('Link', 'livesay')
            ),
            array(
              'id'        => 'social_icon',
              'type'      => 'icon',
              'title'     => __('Social Icon', 'livesay')
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'livesay'),
              'on_text'     => __('Yes', 'livesay'),
              'off_text'     => __('No', 'livesay'),
            ),

          ),

        ),
        // Social Icons

    /* Download Button Shortcodes */

        array(
          'name'          => 'vt_download_button',
          'title'         => __('Download Button Shortcodes', 'roof'),
          'fields'        => array(

            array(
              'id'        => 'download_txt',
              'type'      => 'text',
              'title'     => __('Download Button Text', 'roof'),
            ),
            array(
              'id'        => 'download_icon',
              'type'      => 'icon',
              'title'     => __('Download Button Text', 'roof'),
            ),
            array(
              'id'        => 'download_link',
              'type'      => 'text',
              'title'     => __('Download Button Link', 'roof'),
            ),
            array(
              'id'        => 'icon_size',
              'type'      => 'text',
              'title'     => __('Download Button icon size', 'roof'),
            ),
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Download Button text size', 'roof'),
            ),
            array(
              'id'        => 'bg_color',
              'type'      => 'color_picker',
              'title'     => __('Download Button bg color', 'roof'),
            ),
            array(
              'id'        => 'bg_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Download Button bg hover color', 'roof'),
            ),
            array(
              'id'        => 'icon_color',
              'type'      => 'color_picker',
              'title'     => __('Download Button icon color', 'roof'),
            ),
            array(
              'id'        => 'border_color',
              'type'      => 'color_picker',
              'title'     => __('Download Button border color', 'roof'),
            ),
            array(
              'id'        => 'txt_color',
              'type'      => 'color_picker',
              'title'     => __('Download Button text color', 'roof'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'roof'),
            ),
          ),
        ),

        // Useful Links
        array(
          'name'          => 'vt_useful_links',
          'title'         => __('Useful Links', 'livesay'),
          'view'          => 'clone',
          'clone_id'      => 'vt_useful_link',
          'clone_title'   => __('Add New', 'livesay'),
          'fields'        => array(

            array(
              'id'        => 'column_width',
              'type'      => 'select',
              'title'     => __('Column Width', 'livesay'),
              'options'        => array(
                'full-width' => __('One Column', 'livesay'),
                'half-width' => __('Two Column', 'livesay'),
                'third-width' => __('Three Column', 'livesay'),
              ),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'livesay'),
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'title_link',
              'type'      => 'text',
              'title'     => __('Link', 'livesay')
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'livesay'),
              'on_text'     => __('Yes', 'livesay'),
              'off_text'     => __('No', 'livesay'),
            ),
            array(
              'id'        => 'link_title',
              'type'      => 'text',
              'title'     => __('Title', 'livesay')
            ),

          ),

        ),
        // Useful Links

        // Links With Title
        array(
          'name'          => 'vt_link_with_titles',
          'title'         => __('Links With Title', 'livesay'),
          'view'          => 'clone',
          'clone_id'      => 'vt_link_with_title',
          'clone_title'   => __('Add New', 'livesay'),
          'fields'        => array(

            array(
              'id'        => 'links_title',
              'type'      => 'text',
              'title'     => __('Title', 'livesay'),
            ),

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'livesay'),
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'title_link',
              'type'      => 'text',
              'title'     => __('Link', 'livesay')
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'livesay'),
              'on_text'     => __('Yes', 'livesay'),
              'off_text'     => __('No', 'livesay'),
            ),
            array(
              'id'        => 'link_title',
              'type'      => 'text',
              'title'     => __('Title', 'livesay')
            ),

          ),

        ),
        // Links With Title

        // Simple Text Link
        array(
          'name'          => 'livesay_simple_text_link',
          'title'         => __('Simple Text Link', 'livesay'),
          'fields'        => array(

            array(
              'id'        => 'link_text',
              'type'      => 'text',
              'title'     => __('Link Text', 'livesay'),
            ),
            array(
              'id'        => 'title_link',
              'type'      => 'text',
              'title'     => __('Link', 'livesay')
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'livesay'),
              'on_text'     => __('Yes', 'livesay'),
              'off_text'     => __('No', 'livesay'),
            ),

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'livesay'),
            ),

          ),

        ),
        // Simple Text Link

        // Contact List
        array(
          'name'          => 'vt_contact_lists',
          'title'         => __('Contact List', 'livesay'),
          'view'          => 'clone',
          'clone_id'      => 'vt_contact_list',
          'clone_title'   => __('Add New', 'livesay'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'livesay'),
            ),

            // Colors
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Colors', 'livesay')
            ),
            array(
              'id'        => 'title_color',
              'type'      => 'color_picker',
              'title'     => __('Title Color', 'livesay'),
              'wrap_class' => 'column_third el-hav-border',
            ),
            array(
              'id'        => 'text_color',
              'type'      => 'color_picker',
              'title'     => __('Text Color', 'livesay'),
              'wrap_class' => 'column_third el-hav-border',
            ),
            array(
              'id'        => 'bullet_color',
              'type'      => 'color_picker',
              'title'     => __('Bullet Color', 'livesay'),
              'wrap_class' => 'column_third el-hav-border',
            ),

            // Size
            array(
              'id'        => 'title_size',
              'type'      => 'text',
              'title'     => __('Title Size', 'livesay'),
              'wrap_class' => 'column_half el-hav-border',
              'attributes' => array(
                'placeholder'     => 'Eg: 14px',
              ),
            ),
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'livesay'),
              'attributes' => array(
                'placeholder'     => 'Eg: 14px',
              ),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'bullet_top_space',
              'type'      => 'text',
              'title'     => __('Bullet Top Space', 'livesay'),
              'attributes' => array(
                'placeholder'     => 'Eg: 12px',
              ),
              'wrap_class' => 'column_full',
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'title',
              'type'      => 'text',
              'title'     => __('Title', 'livesay')
            ),
            array(
              'id'        => 'text',
              'type'      => 'text',
              'title'     => __('Text', 'livesay')
            ),
            array(
              'id'        => 'text_link',
              'type'      => 'text',
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
              'title'     => __('Text Link', 'livesay')
            ),

          ),

        ),
        // Contact List

        // Simple Image List
        array(
          'name'          => 'vt_image_lists',
          'title'         => __('Simple Image List', 'livesay'),
          'view'          => 'clone',
          'clone_id'      => 'vt_image_list',
          'clone_title'   => __('Add New', 'livesay'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'livesay'),
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'get_image',
              'type'      => 'upload',
              'title'     => __('Image', 'livesay')
            ),
            array(
              'id'        => 'link',
              'type'      => 'text',
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
              'title'     => __('Link', 'livesay')
            ),
            array(
              'id'    => 'open_tab',
              'type'  => 'switcher',
              'std'   => false,
              'title' => __('Open link to new tab?', 'livesay')
            ),

          ),

        ),
        // Simple Image List

        // Simple Link
        array(
          'name'          => 'vt_simple_link',
          'title'         => __('Simple Link', 'livesay'),
          'fields'        => array(

            array(
              'id'        => 'link_style',
              'type'      => 'select',
              'title'     => __('Link Style', 'livesay'),
              'options'        => array(
                'link-underline' => __('Link Underline', 'livesay'),
                'link-arrow-right' => __('Link Arrow (Right)', 'livesay'),
                'link-arrow-left' => __('Link Arrow (Left)', 'livesay'),
              ),
            ),
            array(
              'id'        => 'link_icon',
              'type'      => 'icon',
              'title'     => __('Icon', 'livesay'),
              'value'      => 'fa fa-caret-right',
              'dependency'  => array('link_style', '!=', 'link-underline'),
            ),
            array(
              'id'        => 'link_text',
              'type'      => 'text',
              'title'     => __('Link Text', 'livesay'),
            ),
            array(
              'id'        => 'link',
              'type'      => 'text',
              'title'     => __('Link', 'livesay'),
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'livesay'),
              'on_text'     => __('Yes', 'livesay'),
              'off_text'     => __('No', 'livesay'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'livesay'),
            ),

            // Normal Mode
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Normal Mode', 'livesay')
            ),
            array(
              'id'        => 'text_color',
              'type'      => 'color_picker',
              'title'     => __('Text Color', 'livesay'),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'border_color',
              'type'      => 'color_picker',
              'title'     => __('Border Color', 'livesay'),
              'wrap_class' => 'column_half el-hav-border',
              'dependency'  => array('link_style', '==', 'link-underline'),
            ),
            // Hover Mode
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Hover Mode', 'livesay')
            ),
            array(
              'id'        => 'text_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Text Hover Color', 'livesay'),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'border_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Border Hover Color', 'livesay'),
              'wrap_class' => 'column_half el-hav-border',
              'dependency'  => array('link_style', '==', 'link-underline'),
            ),

            // Size
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Font Sizes', 'livesay')
            ),
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'livesay'),
              'attributes' => array(
                'placeholder'     => 'Eg: 14px',
              ),
            ),

          ),
        ),
        // Simple Link

        // Blockquotes
        array(
          'name'          => 'vt_blockquote',
          'title'         => __('Blockquote', 'livesay'),
          'fields'        => array(

            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'livesay'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'livesay'),
            ),
            array(
              'id'        => 'content_color',
              'type'      => 'color_picker',
              'title'     => __('Content Color', 'livesay'),
            ),
            array(
              'id'        => 'left_color',
              'type'      => 'color_picker',
              'title'     => __('Left Border Color', 'livesay'),
            ),
            // Content
            array(
              'id'        => 'content',
              'type'      => 'textarea',
              'title'     => __('Content', 'livesay'),
            ),

          ),

        ),
        // Blockquotes

        // Button
        array(
          'name'          => 'vt_button',
          'title'         => __('Button', 'livesay'),
          'fields'        => array(

            array(
              'id'        => 'btn_txt',
              'type'      => 'text',
              'title'     => __('Button Text', 'livesay'),
            ),
            array(
              'id'        => 'btn_link',
              'type'      => 'text',
              'title'     => __('Button Link', 'livesay'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'livesay'),
            ),

            // Styles
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Styles', 'livesay')
            ),

            array(
              'id'        => 'btn_bg_color',
              'type'      => 'color_picker',
              'title'     => __('Button Background Color', 'livesay'),
            ),
            array(
              'id'        => 'btn_bg_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Button Background Hover Color', 'livesay'),
            ),
            array(
              'id'        => 'btn_border_color',
              'type'      => 'color_picker',
              'title'     => __('Button Border Color', 'livesay'),
            ),
            array(
              'id'        => 'btn_border_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Button Border Hover Color', 'livesay'),
            ),
            array(
              'id'        => 'btn_txt_color',
              'type'      => 'color_picker',
              'title'     => __('Button Text Color', 'livesay'),
            ),
            array(
              'id'        => 'txt_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Button Text Hover Color', 'livesay'),
            ),
            array(
              'id'        => 'txt_size',
              'type'      => 'text',
              'title'     => __('Button Text Size', 'livesay'),
              'wrap_class' => 'column_half el-hav-border',
            ),

          ),

        ),
        // Button

        // Reserve Seat Button
        array(
          'name'          => 'vt_reserve_button',
          'title'         => __('Reserve Seat Button', 'livesay'),
          'fields'        => array(

            array(
              'id'        => 'btn_txt',
              'type'      => 'text',
              'title'     => __('Button Text', 'livesay'),
            ),
            array(
              'id'        => 'btn_target',
              'type'      => 'text',
              'title'     => __('Button Data Target', 'livesay'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'livesay'),
            ),

            // Styles
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Styles', 'livesay')
            ),

            array(
              'id'        => 'btn_bg_color',
              'type'      => 'color_picker',
              'title'     => __('Button Background Color', 'livesay'),
            ),
            array(
              'id'        => 'btn_bg_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Button Background Hover Color', 'livesay'),
            ),
            array(
              'id'        => 'btn_border_color',
              'type'      => 'color_picker',
              'title'     => __('Button Border Color', 'livesay'),
            ),
            array(
              'id'        => 'btn_border_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Button Border Hover Color', 'livesay'),
            ),
            array(
              'id'        => 'btn_txt_color',
              'type'      => 'color_picker',
              'title'     => __('Button Text Color', 'livesay'),
            ),
            array(
              'id'        => 'txt_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Button Text Hover Color', 'livesay'),
            ),
            array(
              'id'        => 'txt_size',
              'type'      => 'text',
              'title'     => __('Button Text Size', 'livesay'),
              'wrap_class' => 'column_half el-hav-border',
            ),

          ),

        ),
        // Button

        // List Styles
        array(
          'name'          => 'vt_address_lists',
          'title'         => __('Address Lists', 'livesay'),
          'view'          => 'clone',
          'clone_id'      => 'vt_address_list',
          'clone_title'   => __('Add New', 'livesay'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'livesay'),
            ),

            // Colors
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Colors', 'livesay')
            ),
            array(
              'id'        => 'text_color',
              'type'      => 'color_picker',
              'title'     => __('Text Color', 'livesay'),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'title_color',
              'type'      => 'color_picker',
              'title'     => __('Title Color', 'livesay'),
              'wrap_class' => 'column_half el-hav-border',
            ),

            // Size
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'livesay'),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'title_size',
              'type'      => 'text',
              'title'     => __('Title Size', 'livesay'),
              'wrap_class' => 'column_half el-hav-border',
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'list_title',
              'type'      => 'text',
              'title'     => __('Title', 'livesay')
            ),
            array(
              'id'        => 'list_text',
              'type'      => 'textarea',
              'title'     => __('Text', 'livesay')
            ),

          ),

        ),
        // List Styles

      ),
    );

    /* Footer Shortcodes */
    $options[]     = array(
      'title'      => __('Footer Shortcodes', 'livesay'),
      'shortcodes' => array(

        // Footer Heading
        array(
          'name'          => 'vt_footer_heading',
          'title'         => __('Footer Heading', 'livesay'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'livesay'),
            ),

            array(
              'id'        => 'footer_title',
              'type'      => 'text',
              'title'     => __('Title', 'livesay')
            ),
            array(
              'id'        => 'footer_sub_title',
              'type'      => 'text',
              'title'     => __('Sub-Title', 'livesay')
            ),
            // Styles
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Styles', 'livesay')
            ),
            array(
              'id'        => 'title_color',
              'type'      => 'color_picker',
              'title'     => __('Title Color', 'livesay'),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'sub_title_color',
              'type'      => 'color_picker',
              'title'     => __('Sub-Title Color', 'livesay'),
              'wrap_class' => 'column_half el-hav-border',
            ),

            // Size
            array(
              'id'        => 'title_size',
              'type'      => 'text',
              'title'     => __('Title Size', 'livesay'),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'sub_title_size',
              'type'      => 'text',
              'title'     => __('Sub-Title Size', 'livesay'),
              'wrap_class' => 'column_half el-hav-border',
            ),

          ),

          ),

        )
        // Footer Heading

      
    );

  return $options;

  }
  add_filter( 'cs_shortcode_options', 'livesay_vt_shortcodes' );
}