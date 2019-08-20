<?php
/* ==========================================================
  Livesay Gallery
=========================================================== */
if ( !function_exists('livesay_gallery_masonry_function')) {
  function livesay_gallery_masonry_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'livesay_gallery_masonry_items'  => '',
      'livesay_gallery_masonry_column' => '',
      'gallery_masonry_link' => '',
      'class'  => '',

      // Carousel
      'slick_dots'  => '',
      'slick_nav'  => '',
    ), $atts));

    $gallery_column = $livesay_gallery_masonry_column ? $livesay_gallery_masonry_column : 'col-md-4 col-sm-6';

    // Group Field
    $livesay_gallery_masonry_items = (array) vc_param_group_parse_atts( $livesay_gallery_masonry_items );
    $get_each_list = array();
    foreach ( $livesay_gallery_masonry_items as $gallery_item ) {
      $each_list = $gallery_item;
      $each_list['gallery_img'] = isset( $gallery_item['gallery_img'] ) ? $gallery_item['gallery_img'] : '';
      $each_list['img_title'] = isset( $gallery_item['img_title'] ) ? $gallery_item['img_title'] : '';
      $each_list['img_title_link'] = isset( $gallery_item['img_title_link'] ) ? $gallery_item['img_title_link'] : '';
      $each_list['gallery_masonry_link'] = isset( $gallery_item['gallery_masonry_link'] ) ? $gallery_item['gallery_masonry_link'] : '';
      $get_each_list[] = $each_list;
    }

     $output = '';
     $output .= '<div class="lvsy-glry"><div class="lvsy-event-gallery gallery-style-two '. $class .'">';

     // Group Param Output
     foreach ( $get_each_list as $each_list ) {
      $output .= '<div class="'.$gallery_column.'"><div class="gallery-item">';
      //Logo
      $image_url = wp_get_attachment_url( $each_list['gallery_img'] );
      $gallery_img_actual = $each_list['gallery_img'] ? '<div class="clearfix"><img src="'.$image_url.'" alt="'.$each_list['img_title'].'"></div>' : '';
      

      if($each_list['gallery_masonry_link'] === 'custom_link') {
        $img_title = $each_list['img_title_link'] ? '<div class="gallery-title"><a href="'.$each_list['img_title_link'].'" class="lvsy-gallery-custom">'.$each_list['img_title'].'</a></div>' : '<div class="gallery-title"><span class="lvsy-gallery">'.$each_list['img_title'].'</span></div>';
      } else {
        $img_title = $each_list['img_title'] ? '<div class="gallery-title"><a href="'.$image_url.'" data-fancybox-group="gallery" class="lvsy-gallery">'.$each_list['img_title'].'</a></div>' : '';
      }

      $output .= $gallery_img_actual;
      $output .= '<div class="gallery-info"><div class="lvsy-table-container"><div class="lvsy-align-container">'.$img_title.'</div></div></div>';
      $output .= '</div></div>';
    }

    $output .= '</div></div>';

    return $output;
  }
}
add_shortcode( 'livesay_gallery_masonry', 'livesay_gallery_masonry_function' );
