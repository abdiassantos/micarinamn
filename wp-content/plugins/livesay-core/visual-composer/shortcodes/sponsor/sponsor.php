<?php
/* ==========================================================
  Sponsors
=========================================================== */
if ( !function_exists('livesay_sponsor_function')) {
  function livesay_sponsor_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'sponsor_column'  => '',
      'sponsor_limit'  => '',
      'sponsor_id' => '',
      'sponsor_order' => '',
      'sponsor_orderby' => '',
      'sponsor_show_category' => '',
      'short_content'    => '',
      'sponsor_pagination' => '',
      'learn_more_txt' => '',
      'class'  => '',
      // Style
      'title_color'  => '',
      'title_hover_color'  => '',
      'title_size'  => '',
      'content_color' => '',
      'content_size'  => '',
      'learn_more_color' => '',
      'learn_more_hover_color' => '',
      'learn_more_size' => '',
    ), $atts));

    $sponsor_column = $sponsor_column ? $sponsor_column : 'col-md-4 col-sm-6';
    $learn_more_txt = $learn_more_txt ? $learn_more_txt : esc_attr('Learn More', 'livesay_core');

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    if ( $title_size || $title_color ) {
      $inline_style .= '.lvsy-donors.lvsy-donors-style-three .lvsy-donor-'. $e_uniqid .' .lvsy-donor-name a, .lvsy-donors.lvsy-donors-style-three .lvsy-donor-'. $e_uniqid .' .lvsy-donor-name span {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. livesay_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $title_hover_color ) {
      $inline_style .= '.lvsy-donors.lvsy-donors-style-three .lvsy-donor-'. $e_uniqid .' .lvsy-donor-name a:hover, .lvsy-donors.lvsy-donors-style-three .lvsy-donor-'. $e_uniqid .' .lvsy-donor-name span:hover {';
      $inline_style .= ( $title_hover_color ) ? 'color:'. $title_hover_color .';' : '';
      $inline_style .= '}';
    }
    if ( $content_size || $content_color ) {
      $inline_style .= '.lvsy-donors.lvsy-donors-style-three .lvsy-donor-'. $e_uniqid .' .lvsy-donor-item p {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. livesay_check_px($content_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $learn_more_size || $learn_more_color ) {
      $inline_style .= '.lvsy-donors.lvsy-donors-style-three .lvsy-donor-'. $e_uniqid .' .clearfix a {';
      $inline_style .= ( $learn_more_color ) ? 'color:'. $learn_more_color .';' : '';
      $inline_style .= ( $learn_more_size ) ? 'font-size:'. livesay_check_px($learn_more_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $learn_more_hover_color ) {
      $inline_style .= '.lvsy-donors.lvsy-donors-style-three .lvsy-donor-'. $e_uniqid .' .clearfix:hover a, .lvsy-donors.lvsy-donors-style-three .lvsy-donor-'. $e_uniqid .' .clearfix:hover span {';
      $inline_style .= ( $learn_more_hover_color ) ? 'color:'. $learn_more_hover_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    livesay_add_inline_style( $inline_style );
    $styled_class  = ' lvsy-donor-'. $e_uniqid;

    // Turn output buffer on
    ob_start();

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
      // other query params here,
      'paged' => $my_page,
      'post_type' => 'sponsor',
      'posts_per_page' => (int)$sponsor_limit,
      'category_name' => esc_attr($sponsor_show_category),
      'orderby' => $sponsor_orderby,
      'order' => $sponsor_order,
      'post__in' => $sponsor_id
    );

    $lvsy_post = new WP_Query( $args ); ?>

      <div class="lvsy-donors lvsy-donors-style-three"><div class="lvsy-donor-category <?php echo $class . $styled_class ?>">
      <?php if ($lvsy_post->have_posts()) : while ($lvsy_post->have_posts()) : $lvsy_post->the_post();
      $sponsor_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
      $sponsor_options = get_post_meta( get_the_ID(), 'sponsor_options', true );
      $sponsor_short_info = $sponsor_options['sponsor_short_info'];?>
        <div class="<?php echo esc_attr($sponsor_column); ?>">
          <div class="lvsy-donor-item">
            <div class="lvsy-donor-logo"><?php esc_url(the_post_thumbnail()); ?></div>
            <div class="lvsy-donor-name"><a href="<?php esc_url(the_permalink());?>"><?php esc_attr(the_title()); ?></a></div>
              <?php if($sponsor_short_info) { ?>
                <p><?php echo esc_attr($sponsor_short_info); ?></p>
              <?php } ?>
            <div class="clearfix"><a href="<?php esc_url(the_permalink()); ?>"><?php echo esc_attr($learn_more_txt); ?></a></div>
          </div>
        </div>
      <?php
      endwhile;
      endif;
      wp_reset_postdata(); ?>

    </div></div>

    <?php
    if ($sponsor_pagination) {
        livesay_paging_nav();
        wp_reset_postdata();  // avoid errors further down the page
    }

    // Return outbut buffer
    return ob_get_clean();
  }
}
add_shortcode( 'livesay_sponsor', 'livesay_sponsor_function' );
