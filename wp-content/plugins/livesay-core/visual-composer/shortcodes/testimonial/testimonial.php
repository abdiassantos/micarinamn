<?php
/* Testimonial */
if ( !function_exists('lvsy_testimonial_function')) {
  function lvsy_testimonial_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'testimonial_column'  => '',
      'class'  => '',

      // Listing
      'testimonial_limit'  => '',
      'testimonial_order'  => '',
      'testimonial_orderby'  => '',
      'testimonial_pagination'  => '',
      'testimonial_min_height'  => '',

      // Color & Style
      'title_color'  => '',
      'content_color'  => '',
      'name_color'  => '',
      'profession_color'  => '',
      'title_size'  => '',
      'content_size'  => '',
      'name_size'  => '',
      'profession_size'  => '',
    ), $atts));

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Minimum Height
    if ( $testimonial_min_height ) {
      $inline_style .= '.lvsy-testimonial-'. $e_uniqid .' .lvsy-testimonials-four {';
      $inline_style .= ( $testimonial_min_height ) ? 'min-height:'. $testimonial_min_height .';' : '';
      $inline_style .= '}';
    }
    // Title Color
    if ( $title_color || $title_size ) {
      $inline_style .= '.lvsy-testimonial-'. $e_uniqid .' .lvsy-testimonials-four .testimonial-heading {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. $title_size .';' : '';
      $inline_style .= '}';
    }
    // Content Color
    if ( $content_color || $content_size ) {
      $inline_style .= '.lvsy-testimonial-'. $e_uniqid .' .lvsy-testimonials-four p {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. $content_size .';' : '';
      $inline_style .= '}';
    }
    // Name Color
    if ( $name_color || $name_size ) {
      $inline_style .= '.lvsy-testimonial-'. $e_uniqid .' .lvsy-testimonials-four .testi-client-info .testi-name {';
      $inline_style .= ( $name_color ) ? 'color:'. $name_color .';' : '';
      $inline_style .= ( $name_size ) ? 'font-size:'. $name_size .';' : '';
      $inline_style .= '}';
    }
    // Profession Color
    if ( $profession_color || $profession_size ) {
      $inline_style .= '.lvsy-testimonial-'. $e_uniqid .' .lvsy-testimonials-four .testi-client-info .testi-pro {';
      $inline_style .= ( $profession_color ) ? 'color:'. $profession_color .';' : '';
      $inline_style .= ( $profession_size ) ? 'font-size:'. $profession_size .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    livesay_add_inline_style( $inline_style );
    $styled_class  = ' lvsy-testimonial-'. $e_uniqid;

    // Turn output buffer on
    ob_start();

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
      'post_type' => 'testimonial',
      'posts_per_page' => (int)$testimonial_limit,
      'orderby' => $testimonial_orderby,
      'order' => $testimonial_order
    );

    $lvsy_testi = new WP_Query( $args );

    if ($lvsy_testi->have_posts()) :
    ?>

    <div class="<?php echo $styled_class .' '. $class; ?>"> <!-- Testimonial Starts -->

    <?php
    while ($lvsy_testi->have_posts()) : $lvsy_testi->the_post();

    // Get Meta Box Options - livesay_framework_active()
    $testimonial_options = get_post_meta( get_the_ID(), 'testimonial_options', true );
    $client_name = $testimonial_options['testi_name'];
    $name_link = $testimonial_options['testi_name_link'];
    $client_pro = $testimonial_options['testi_pro'];
    $pro_link = $testimonial_options['testi_pro_link'];

    // Featured Image
    $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
    $large_image = $large_image[0];
    if(class_exists('Aq_Resize')) {
      $testi_img = aq_resize( $large_image, '170', '170', true );
    } else {$testi_img = $large_image;}
    ?>
    <div class="<?php echo $testimonial_column; ?>">
      <div class="lvsy-testimonials-four rounded-three">
        <div class="testi-client">
          <?php
          if ($large_image) {
            if ($name_link) {
              echo '<a href="'. esc_url($name_link).'"><img src="'. esc_url($testi_img).'" alt=""></a>';
            } else {
              echo '<span><img src="'. esc_url($testi_img).'" alt=""></span>';
            }
          }
          ?>
        </div>
        <div class="testi-content">
          <span class="testimonial-heading"><?php echo esc_attr(the_title()); ?></span>
          <?php the_content(); ?>
          <div class="testi-client-info">
          <?php if ($client_name) {
            if ($name_link) {
              echo '<a href ="'. esc_url($name_link).'" target="_blank" class="testi-name">'. esc_attr($client_name).'</a>';
            } else {
              echo '<span class="testi-name">'. esc_attr($client_name).'</span>';
            }
          }
          if ($client_pro) {
            if ($pro_link) {
              echo '<a href ="'. esc_url($pro_link).'" target="_blank" class="testi-pro">'. esc_attr($client_pro).'</a>';
            } else {
              echo '<span class="testi-pro">'. esc_attr($client_pro).'</span>';
            }
          } ?>
          </div>
        </div>
      </div>
    </div>
    <?php
    endwhile;
    wp_reset_postdata();
    ?>

    </div> <!-- Testimonial End -->

<?php
  endif;

  if ($testimonial_pagination) {
    if ( function_exists('wp_pagenavi')) {
      wp_pagenavi(array( 'query' => $lvsy_testi ) );
      wp_reset_postdata();  // avoid errors further down the page
    }
  }

    // Return outbut buffer
    return ob_get_clean();

  }
}
add_shortcode( 'lvsy_testimonial', 'lvsy_testimonial_function' );