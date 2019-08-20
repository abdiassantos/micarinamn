<?php
/* ==========================================================
  Blog
=========================================================== */
if ( !function_exists('lvsy_blog_function')) {
  function lvsy_blog_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'blog_limit'  => '',
      // Enable & Disable
      'blog_date'  => '',
      'blog_author'  => '',
      'blog_pagination'  => '',
      // Listing
      'blog_order'  => '',
      'blog_orderby'  => '',
      'blog_show_category'  => '',
      'short_content'  => '',
      'class'  => '',
      // Miss Align
      'miss_align_height'  => '',
    ), $atts));

    // Excerpt
    if (livesay_framework_active()) {
      $excerpt_length = cs_get_option('theme_blog_excerpt');
      $excerpt_length = $excerpt_length ? $excerpt_length : '55';
      if ($short_content) {
        $short_content = $short_content;
      } else {
        $short_content = $excerpt_length;
      }
    } else {
      $short_content = '55';
    }

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Miss-Aligned
    if ( $miss_align_height ) {
      $inline_style .= '.lvsy-news-'. $e_uniqid .' .news-item {';
      $inline_style .= ( $miss_align_height ) ? 'min-height:'. livesay_core_check_px($miss_align_height) .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    livesay_add_inline_style( $inline_style );
    $styled_class  = ' lvsy-news-'. $e_uniqid;

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
      'post_type' => 'post',
      'posts_per_page' => (int)$blog_limit,
      'category_name' => esc_attr($blog_show_category),
      'orderby' => $blog_orderby,
      'order' => $blog_order
    );

    $lvsy_post = new WP_Query( $args ); ?>

    <!-- Blog Start -->
    <div class="lvsy-news">
    <div class="<?php echo esc_attr($styled_class .' '. $class); ?>">

      <?php
      if ($lvsy_post->have_posts()) : while ($lvsy_post->have_posts()) : $lvsy_post->the_post();

        $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
        $large_image = $large_image[0];
          if(class_exists('Aq_Resize')) {
              $post_img = aq_resize( $large_image, '370', '240', true );
            } else {
              $post_img = $large_image;
            }

        $post_type = get_post_meta( get_the_ID(), 'post_type_metabox', true );
      ?>

      <div id="post-<?php the_ID(); ?>" <?php post_class('lvsy-blog-post'); ?>>
        <div class="col-md-4 col-sm-6">
          <div class="news-item">
            <div class="news-picture"><a href="<?php echo esc_url(get_the_permalink()); ?>"><img src="<?php echo $post_img; ?>" alt="<?php echo esc_attr(get_the_title()); ?>"></a></div>
            <div class="news-info">
              <div class="news-title"><a href="<?php echo esc_url( get_permalink() ); ?>" class="bp-heading"><?php echo esc_attr(get_the_title()); ?></a></div>
              <div class="news-meta"><?php
              if ( !$blog_author ) { // Author Hide
                printf(
                  '<span>'. __('by','livesay-core') .' <a href="%1$s" rel="author">%2$s</a></span>',
                  esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                  get_the_author()
                );
              }
              if ( !$blog_date ) { // Date Hide
              echo get_the_date(); }?>
              </div>
            </div>
          </div>
        </div>
        </div><!-- #post-## -->

      <?php
      endwhile;
      endif;
      wp_reset_postdata(); ?>

    </div>
    <!-- Blog End -->
  </div>

    <?php
    if ($blog_pagination) {
      if ( function_exists('wp_pagenavi')) {
        wp_pagenavi(array( 'query' => $lvsy_post ) );
        wp_reset_postdata();  // avoid errors further down the page
      }
    }

    // Return outbut buffer
    return ob_get_clean();

  }
}
add_shortcode( 'lvsy_blog', 'lvsy_blog_function' );
