<?php
/**
 * Contact - Shortcode Options
 */
add_action( 'init', 'contact_vc_map' );
if ( ! function_exists( 'contact_vc_map' ) ) {
  function contact_vc_map() {

    $cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
    $contact_forms = array();
    if ( $cf7 ) {
      foreach ( $cf7 as $cform ) {
        $contact_forms[ $cform->post_title ] = $cform->ID;
      }
    } else {
      $contact_forms[ __( 'No contact forms found', 'js_composer' ) ] = 0;
    }

    vc_map( array(
    "name" => __( "Livesay: Contact Form 7", 'livesay-core'),
    "base" => "lvsy_contact",
    "description" => __( "Contact Form 7 Style", 'livesay-core'),
    "icon" => "icon-wpb-contactform7",
    "category" => LivesayLib::lvsy_cat_name(),
    "params" => array(

      array(
        'type' => 'dropdown',
        'heading' => __( 'Select contact form', 'js_composer' ),
        'param_name' => 'id',
        'value' => $contact_forms,
        'save_always' => true,
        'admin_label' => true,
        'description' => __( 'Choose previously created contact form from the drop down list.', 'js_composer' ),
      ),
      array(
        'type' => 'dropdown',
        'value' => array(
          __( 'No Styles', 'livesay-core' ) => '',
          __( 'Style One', 'livesay-core' ) => 'contact-box-one',
          __( 'Style Two', 'livesay-core' ) => 'contact-box-two',
        ),
        'admin_label' => true,
        'heading' => __( 'Contact Form Box Style', 'livesay-core' ),
        'param_name' => 'box_style',
        'description' => __( 'Select from box style.', 'livesay-core' ),
      ),
      array(
        'type' => 'textfield',
        'value' => '',
        'heading' => __( 'Title', 'livesay-core' ),
        'description' => __( 'Enter Form title for your contact form.', 'livesay-core' ),
        'param_name' => 'form_title',
      ),
      LivesayLib::vt_class_option(),

      array(
        'type' => 'textfield',
        'value' => '',
        'heading' => __( 'Button Text Size', 'livesay-core' ),
        'description' => __( 'Enter text size for submit button.', 'livesay-core' ),
        'group' => __( 'Style', 'livesay-core' ),
        'param_name' => 'submit_size',
      ),
      array(
        'type' => 'colorpicker',
        'value' => '',
        'heading' => __( 'Button Text Color', 'livesay-core' ),
        'description' => __( 'Pick text color for submit button.', 'livesay-core' ),
        'group' => __( 'Style', 'livesay-core' ),
        'param_name' => 'submit_color',
      ),
      array(
        'type' => 'colorpicker',
        'value' => '',
        'heading' => __( 'Button BG Color', 'livesay-core' ),
        'description' => __( 'Pick button background color.', 'livesay-core' ),
        'group' => __( 'Style', 'livesay-core' ),
        'param_name' => 'submit_bg_color',
      ),

      ), // Params
    ) );
  }
}