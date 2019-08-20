<?php
/* gallery */
if ( !function_exists('lvsy_gallery_function')) {
  function lvsy_gallery_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'gallery_column'  => '',
      'class'  => '',
      // Listing
      'gallery_limit'  => '',
      'gallery_id'  => '',
      'gallery_order'  => '',
      'gallery_orderby'  => '',
      'gallery_pagination'  => '',
      'gallery_social_icon' => '',

    ), $atts));

    // gallery Column
    $gallery_column = $gallery_column ? $gallery_column : 'col-md-4 col-sm-6';

    // Turn output buffer on
    ob_start();

    // Show ID
    if ($gallery_id) {
      $gallery_id = explode(',',$gallery_id);
    } else {
      $gallery_id = '';
    }

    // Query Starts Here
    // Pagination
    global $paged;
    if( get_query_var( 'paged' ) )
      $my_page = get_query_var( 'paged' );
    else {
      if( get_query_var( 'page' ) )
        $my_page = get_query_var( 'page' );
      else
        $my_page = 1;
      set_query_var( 'paged', $my_page );
      $paged = $my_page;
    }

    $args = array(
      'paged' => $my_page,
      'post_type' => 'gallery',
      'posts_per_page' => (int)$gallery_limit,
      'orderby' => $gallery_orderby,
      'order' => $gallery_order,
      'post__in' => $gallery_id,
    );

    $lvsy_gallery_qury = new WP_Query( $args );
    if ($lvsy_gallery_qury->have_posts()) :
    ?>
<div class="lvsy-event-gallery <?php echo $class; ?>">
  <div class="container">
    <div class="row">
      <?php
      while ($lvsy_gallery_qury->have_posts()) : $lvsy_gallery_qury->the_post();
      // Link
      $gallery_options = get_post_meta( get_the_ID(), 'gallery_options', true );
      $gallery_link_type = $gallery_options['gallery_link_type'];
      $popup_image = $gallery_options['popup_image'];
      

      // Featured Image
      $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
      $large_image = $large_image[0];
      $gallery_title = get_the_title();
        if(class_exists('Aq_Resize')) {
          $actual_img = aq_resize( $large_image, '340', '340', true );
        } else {
          $actual_img = $large_image;
        }

      $pop_img = wp_get_attachment_image_src( $popup_image, 'fullsize', false, '' );
      $pop_img = $pop_img[0];
      ?>
      <div class="<?php echo $gallery_column; ?>">
        <div class="gallery-item">
          <div class="clearfix"><?php echo '<img src="'. esc_url($actual_image) .'" alt="'.esc_attr($gallery_title).'">'; ?></div>
          <div class="gallery-info">
            <div class="lvsy-table-container">
              <div class="lvsy-align-container">
                <div class="gallery-title">
                <?php 
                  if($gallery_link_type === 'popup-img') {
                    echo '<a href="'.esc_url($pop_img).'" data-fancybox-group="gallery" class="lvsy-gallery">'.esc_attr($gallery_title).'</a>';
                  } else {
                    echo '<a href="'.esc_url(get_the_permalink()).'" class="lvsy-gallery">'.esc_attr($gallery_title).'</a>';
                  }
                ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div> 
  </div> 
</div><!-- gallery End -->

<?php
  endif;

  if ($gallery_pagination) {
    livesay_paging_nav();
    wp_reset_postdata();  // avoid errors further down the page
  }
  // Return outbut buffer
  return ob_get_clean();
  }
}
add_shortcode( 'lvsy_gallery', 'lvsy_gallery_function' );
