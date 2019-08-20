<?php
/* ==========================================================
  Services
=========================================================== */
if ( !function_exists('lvsy_image_link_function')) {
  function lvsy_image_link_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'simple_image'  => '',
      'image_link'  => '',
      'open_link'  => '',
      'class'  => '',
    ), $atts));

    // Link Target
    $open_link = $open_link ? 'target="_blank"' : '';

    // Service Image
    $large_image =  wp_get_attachment_url( $simple_image, 'fullsize', false, '' );
    if(class_exists('Aq_Resize')) {
      $post_img = aq_resize( $large_image, '250', '150', true );
    } else {
      $post_img = $large_image;
    } 
    // $image_url = wp_get_attachment_url( $post_img );

    $image_link = $image_link ? '<a href="'.$image_link.'" '.$open_link.'><img src="'. $post_img .'" alt=""></a>' : '<span><img src="'. $post_img .'" alt="'.$facility_title.'"></span>';
    $simple_imagee = $simple_image ? '<div class="lvsy-donor-event">'.$image_link.'</div>' : '';

    

    $output = '';
    $output .= '<div class="lvsy-donor-events '.$class.'"><div class="row">'.$simple_imagee.'</div></div>';
    return $output;
  }
}
add_shortcode( 'lvsy_image_link', 'lvsy_image_link_function' );
