<?php
/**
 * List - Shortcode Options
 */
add_action( 'init', 'lvsy_list_vc_map' );
if ( ! function_exists( 'lvsy_list_vc_map' ) ) {
  function lvsy_list_vc_map() {
    vc_map( array(
      "name" => __( "List", 'livesay-core'),
      "base" => "lvsy_list",
      "description" => __( "List Styles", 'livesay-core'),
      "icon" => "fa fa-list color-red",
      "category" => LivesayLib::lvsy_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'List Style', 'livesay-core' ),
          'value' => array(
            __( 'Style One (Image or Icon)', 'livesay-core' ) => 'lvsy-list-one',
            __( 'Style Two (Simple Circle)', 'livesay-core' ) => 'lvsy-list-two',
            __( 'Style Three (Contact Section)', 'livesay-core' ) => 'lvsy-list-three',
            __( 'Style Four (Person Details)', 'livesay-core' ) => 'lvsy-list-four',
          ),
          'admin_label' => true,
          'param_name' => 'list_style',
          'description' => __( 'Select your list style.', 'livesay-core' ),
        ),

        // List
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Lists', 'livesay-core' ),
          'param_name' => 'list_items',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              'type' => 'dropdown',
              'value' => array(
                __( 'Icon', 'livesay-core' ) => 'list_icon',
                __( 'Image', 'livesay-core' ) => 'list_image',
              ),
              'heading' => __( 'Icon or Image', 'livesay-core' ),
              'param_name' => 'icon_image',
            ),
            array(
              'type' => 'vt_icon',
              'value' => '',
              'heading' => __( 'Select Icon', 'livesay-core' ),
              'param_name' => 'select_icon',
              'dependency' => array(
                'element' => 'icon_image',
                'value' => 'list_icon',
              ),
            ),
            array(
              'type' => 'attach_image',
              'value' => '',
              'heading' => __( 'Upload Icon Image', 'livesay-core' ),
              'param_name' => 'select_image',
              'dependency' => array(
                'element' => 'icon_image',
                'value' => 'list_image',
              ),
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'admin_label' => true,
              'heading' => __( 'Title', 'livesay-core' ),
              'param_name' => 'list_title',
            ),
            array(
              'type' => 'textarea',
              'value' => '',
              'heading' => __( 'Text', 'livesay-core' ),
              'param_name' => 'list_text',
            ),

          )
        ),
        LivesayLib::vt_class_option(),

        // Style
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Text Color', 'livesay-core' ),
          'param_name' => 'text_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'livesay-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Bullet/Icon Color', 'livesay-core' ),
          'param_name' => 'icon_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'livesay-core' ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Text Size', 'livesay-core' ),
          'param_name' => 'text_size',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'livesay-core' ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Bullet/Icon Size', 'livesay-core' ),
          'param_name' => 'icon_size',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'livesay-core' ),
        ),
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Title Color', 'livesay-core' ),
          'param_name' => 'title_color',
          'group' => __( 'Style', 'livesay-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'description' => __( 'Pick your title color.', 'livesay-core' ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Title Size', 'livesay-core' ),
          'param_name' => 'title_size',
          'group' => __( 'Style', 'livesay-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'description' => __( 'Enter the px value if you used title area in list style type one.', 'livesay-core' ),
        ),

      )
    ) );
  }
}
