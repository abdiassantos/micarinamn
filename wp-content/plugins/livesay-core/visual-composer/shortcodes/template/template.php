<?php
/* ==========================================================
  Templates
=========================================================== */
if ( !function_exists('livesay_templates_function')) {
  function livesay_templates_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'select_template'  => '',
    ), $atts));

    // Turn output buffer on
    ob_start();

    $args = array(
      // other query params here,
      'post_type' => 'template',
      'name' => $select_template
    );

    $lvsy_post = new WP_Query( $args );
    if ($lvsy_post->have_posts()) : while ($lvsy_post->have_posts()) : $lvsy_post->the_post();
      the_content();
    endwhile;
    endif;
    wp_reset_postdata();

    // Return outbut buffer
    return ob_get_clean();
  }
}
add_shortcode( 'livesay_templates', 'livesay_templates_function' );
