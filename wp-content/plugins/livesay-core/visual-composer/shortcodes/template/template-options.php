<?php
/**
 * Template - Shortcode Options
 */
add_action( 'init', 'livesay_template_vc_map' );
if ( ! function_exists( 'livesay_template_vc_map' ) ) {
  function livesay_template_vc_map() {
    $args = array(
      'post_type' => 'template',
      'posts_per_page' => -1,
    );
    $pages = get_posts($args);
    $template_post = array();
    if ( $pages ) {
      foreach ( $pages as $page ) {
        $template_post[ $page->ID ] = $page->post_title;
      }
    } else {
      $template_post[ esc_html__( 'No templates found', 'livesay' ) ] = 0;
    }
    vc_map( array(
    "name" => __( "Template", 'livesay-core'),
    "base" => "livesay_templates",
    "description" => __( "Template Style", 'livesay-core'),
    "icon" => "fa fa-user color-pink",
    "category" => LivesayLib::lvsy_cat_name(),
    "params" => array(

        array(
          "type" => "dropdown",
          "heading" => __( "Template", 'livesay-core' ),
          'admin_label' => true,
          "param_name" => "select_template",
          "value" => $template_post,
          "std"         => " ",
          "description" => __( "Add Set of Shortcode elements in Template Menu. And choose that template here to show.", 'livesay-core'),
        )

      ), // Params
    ) );
  }
}