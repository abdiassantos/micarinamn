<?php
/* Testimonial Carousel */
if ( !function_exists('livesay_testimonial_carousel_function')) {
  function livesay_testimonial_carousel_function( $atts, $content = NULL, $key = '' ) {

    extract(shortcode_atts(array(
      'testimonial_style'  => '',
      'class'  => '',

      // Listing
      'testimonial_limit'  => '',
      'testimonial_order'  => '',
      'testimonial_orderby'  => '',

      // Carousel
      'carousel_loop'  => '',
      'carousel_items'  => '',
      'carousel_margin'  => '',
      'carousel_dots'  => '',
      'carousel_nav'  => '',
      'carousel_autoplay_timeout'  => '',
      'carousel_autoplay'  => '',
      'carousel_animate_out'  => '',
      'carousel_autowidth'  => '',
      'carousel_autoheight'  => '',
      'carousel_tablet'  => '',
      'carousel_mobile'  => '',
      'carousel_small_mobile'  => '',

      // Color & Style
      'title_color'  => '',
      'content_color'  => '',
      'name_color'  => '',
      'name_hover_color' => '',
      'profession_color'  => '',
      'title_size'  => '',
      'content_size'  => '',
      'name_size'  => '',
      'profession_size'  => '',
    ), $atts));

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Title Color
    if ( $title_color || $title_size ) {
      $inline_style .= '.lvsy-testi-carousel-'. $e_uniqid .' .testimonial-style-two .section-title, .lvsy-testi-carousel-'. $e_uniqid .'.testimonial-style-three .section-title {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. livesay_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }
    // Content Color
    if ( $content_color || $content_size ) {
      $inline_style .= '.lvsy-testi-carousel-'. $e_uniqid .'.lvsy-testimonial p, .lvsy-testi-carousel-'. $e_uniqid .' #quote-carousel p {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. livesay_check_px($content_size) .';' : '';
      $inline_style .= '}';
    }
    // Name Color
    if ( $name_color || $name_size ) {
      $inline_style .= '.lvsy-testi-carousel-'. $e_uniqid .'.lvsy-testimonial .quote-client, .lvsy-testi-carousel-'. $e_uniqid .'.testimonial-style-two .quote-client a {';
      $inline_style .= ( $name_color ) ? 'color:'. $name_color .';' : '';
      $inline_style .= ( $name_size ) ? 'font-size:'. livesay_check_px($name_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $name_hover_color ) {
      $inline_style .= '.lvsy-testi-carousel-'. $e_uniqid .'.testimonial-style-two .quote-client a:hover {';
      $inline_style .= ( $name_hover_color ) ? 'color:'. $name_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Profession Color
    if ( $profession_color || $profession_size ) {
      $inline_style .= '.lvsy-testi-carousel-'. $e_uniqid .'.lvsy-testimonial .quote-client span {';
      $inline_style .= ( $profession_color ) ? 'color:'. $profession_color .';' : '';
      $inline_style .= ( $profession_size ) ? 'font-size:'. livesay_check_px($profession_size) .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    livesay_add_inline_style( $inline_style );
    $styled_class  = ' lvsy-testi-carousel-'. $e_uniqid;

    // Carousel Data's
    $carousel_loop = $carousel_loop !== 'true' ? 'data-loop="true"' : 'data-loop="false"';
    $carousel_items = $carousel_items ? 'data-items="'. $carousel_items .'"' : 'data-items="1"';
    $carousel_margin = $carousel_margin ? 'data-margin="'. $carousel_margin .'"' : 'data-margin="0"';
    $carousel_dots = $carousel_dots !== 'true' ? ' data-dots="false"' : ' data-dots="true"';
    $carousel_nav = $carousel_nav !== 'true' ? ' data-nav="false"' : ' data-nav="true"';
    $carousel_autoplay_timeout = $carousel_autoplay_timeout ? 'data-autoplay-timeout="'. $carousel_autoplay_timeout .'"' : '';
    $carousel_autoplay = $carousel_autoplay ? 'data-autoplay="'. $carousel_autoplay .'"' : '';
    $carousel_animate_out = $carousel_animate_out ? 'data-animateout="'. $carousel_animate_out .'"' : '';
    $carousel_autowidth = $carousel_autowidth ? 'data-auto-width="'. $carousel_autowidth .'"' : '';
    $carousel_autoheight = $carousel_autoheight ? 'data-auto-height="'. $carousel_autoheight .'"' : '';
    $carousel_tablet = $carousel_tablet ? 'data-items-tablet="'. $carousel_tablet .'"' : '';
    $carousel_mobile = $carousel_mobile ? 'data-items-mobile-landscape="'. $carousel_mobile .'"' : '';
    $carousel_small_mobile = $carousel_small_mobile ? 'data-items-mobile-portrait="'. $carousel_small_mobile .'"' : '';

    // Testimonial Style
    if ($testimonial_style === 'testimonial_two') {
      $testimonial_style_class = ' testimonial-style-two ';
    } elseif ($testimonial_style === 'testimonial_three') {
      $testimonial_style_class = ' testimonial-style-three lvsy-parallax ';
    } else {
      $testimonial_style_class = ' lvsy-parallax';
    }

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

    $livesay_testi = new WP_Query( $args );

    if ($livesay_testi->have_posts()) :
    ?>

    <div class="lvsy-testimonial <?php echo $testimonial_style_class .' '. $styled_class; ?>" data-parallax-background-ratio=".5">
    <div class="container">
      <!-- Testimonial Starts -->
      <?php if ($testimonial_style === 'testimonial_two') { // Style Two ?>
        <div class="section-title-wrap">
          <h2 class="section-title"><?php echo esc_html__('What Our Customer Says', 'livesay-core'); ?></h2>
        </div>
        <div class="lvsy-carousel" <?php echo $carousel_loop .' '. $carousel_items .' '. $carousel_margin .' '. $carousel_dots .' '. $carousel_nav .' '. $carousel_autoplay_timeout .' '. $carousel_autoplay .' '. $carousel_animate_out .' '. $carousel_autowidth .' '. $carousel_autoheight .' '. $carousel_tablet .' '. $carousel_mobile .' '. $carousel_small_mobile; ?>>
      <?php } elseif ($testimonial_style === 'testimonial_three') {  ?>
      <div class="lvsy-container">
        <div class="section-title-wrap">
          <h2 class="section-title"><?php echo esc_html__('What Our Customer Says', 'livesay-core'); ?></h2>
        </div>
        <div class="lvsy-carousel" <?php echo $carousel_loop .' '. $carousel_items .' '. $carousel_margin .' '. $carousel_dots .' '. $carousel_nav .' '. $carousel_autoplay_timeout .' '. $carousel_autoplay .' '. $carousel_animate_out .' '. $carousel_autowidth .' '. $carousel_autoheight .' '. $carousel_tablet .' '. $carousel_mobile .' '. $carousel_small_mobile; ?>>
      <?php } else { ?>
      <div class="lvsy-container">
        <div class="carousel slide" data-ride="carousel" id="quote-carousel">
          <div class="carousel-inner">
      <?php }

    $c = 0;
    while ($livesay_testi->have_posts()) : $livesay_testi->the_post();

    // Get Meta Box Options - livesay_framework_active()
    $testimonial_options = get_post_meta( get_the_ID(), 'testimonial_options', true );
    $client_name = $testimonial_options['testi_name'];
    $name_link = $testimonial_options['testi_name_link'];
    $client_pro = $testimonial_options['testi_pro'];
    $pro_link = $testimonial_options['testi_pro_link'];

    if ($testimonial_style === 'testimonial_two') { // Style Two
      $name_tag = $name_link ? 'a' : 'span';
      $name_link = $name_link ? 'href="'. $name_link .'" target="_blank"' : '';
      $client_name = $client_name ? '<'. $name_tag .' '. $name_link .' class="testi-name">'. $client_name .'</'. $name_tag .'>' : '';
    } else {
      $name_tag = $name_link ? 'a' : 'span';
      $name_link = $name_link ? 'href="'. $name_link .'" target="_blank"' : '';
      $client_name = $client_name ? $client_name  : '';
    }

      $client_pro = $client_pro ? '<span>'.$client_pro.'</span>' : '';

    // Featured Image
    $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(), 'fullsize', false, '' );
    $large_image = $large_image[0];

      if(class_exists('Aq_Resize')) {
        $testi_img = aq_resize( $large_image, '54', '54', true );
      } else {$testi_img = $large_image;}
    $actual_image = $large_image ? '<'. $name_tag .' '. $name_link .'><img src="'. $testi_img .'" alt=""></'. $name_tag .'>' : '';

    if ($testimonial_style === 'testimonial_two') { // Style Two
    ?>

      <div class="item">
        <div class="testimonial-wrap">
          <?php the_content(); ?>
        </div>
        <h5 class="quote-client">
          <?php echo $actual_image; ?><?php echo $client_name; ?>
          <?php echo $client_pro; ?>
        </h5>
      </div>

    <?php
    } elseif ($testimonial_style === 'testimonial_three') { ?>
        <div class="item">
          <?php the_content(); ?>
          <h5 class="quote-client"><?php echo $actual_image; ?><?php echo $client_name . $client_pro; ?></h5>
        </div>

    <?php
    } else {
      $c++;
      if ( $c == 1 ){
        $class = ' active';
      }
      else{
        $class='';
      }
    ?>
      <div class="item <?php echo $class; ?>">
        <?php the_content(); ?>
        <h5 class="quote-client"><?php echo $client_name . $client_pro; ?></h5>
      </div>
    <?php
    } // Style One
    endwhile;
    wp_reset_postdata();
    ?>

  <?php if ($testimonial_style === 'testimonial_two') { // Style Two ?>
    </div>
  <?php } elseif ($testimonial_style === 'testimonial_three') {  ?>
    </div>
  <?php } else { ?>

    <?php
    $args = array(
      'paged' => $my_page,
      'post_type' => 'testimonial',
      'posts_per_page' => (int)$testimonial_limit,
      'orderby' => $testimonial_orderby,
      'order' => $testimonial_order
    );

    $livesay_test = new WP_Query( $args );

    if ($livesay_test->have_posts()) : ?>

      <ol class="carousel-indicators">
        <?php $s=0; ?>
        <?php  while ($livesay_test->have_posts()) : $livesay_test->the_post();
          // Featured Image
          $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(), 'fullsize', false, '' );
          $large_image = $large_image[0];
            if(class_exists('Aq_Resize')) {
              $testi_img = aq_resize( $large_image, '54', '54', true );
            } else {
              $testi_img = $large_image;
            }

          $actual_image = $large_image ? '<'. $name_tag .' '. $name_link .'><img src="'. $testi_img .'" alt=""></'. $name_tag .'>' : ''; ?>
          <li id="indicator-<?php echo sanitize_title($client_name .$s); ?>" data-target="#quote-carousel" data-slide-to="<?php echo $s; ?>">
            <?php
              $s++;
              echo $actual_image;

            ?>
          </li>

        <?php
          endwhile;
          wp_reset_postdata();
        ?>
      </ol>

<?php endif; ?>
</div>
    </div>

  <?php } ?>
  <?php if ($testimonial_style === 'testimonial_two') { // Style Two ?>
    </div>
    </div>
  <?php } elseif ($testimonial_style === 'testimonial_three') {  ?>
    </div>
    </div>
    </div>
  <?php } else { ?>
  </div>
  </div>
  <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
  <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
</div>
  <!-- Testimonial End -->

<?php }
  endif;
    // Return outbut buffer
    return ob_get_clean();

  }
}
add_shortcode( 'livesay_testimonial_carousel', 'livesay_testimonial_carousel_function' );