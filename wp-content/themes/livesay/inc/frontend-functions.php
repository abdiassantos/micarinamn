<?php
/*
 * All Front-End Helper Functions
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/* Exclude category from blog */
if( ! function_exists( 'livesay_vt_excludeCat' ) ) {
  function livesay_vt_excludeCat($query) {
  	if ( $query->is_home ) {
  		$exclude_cat_ids = cs_get_option('theme_exclude_categories');
  		if($exclude_cat_ids) {
  			foreach( $exclude_cat_ids as $exclude_cat_id ) {
  				$exclude_from_blog[] = '-'. $exclude_cat_id;
  			}
  			$query->set('cat', implode(',', $exclude_from_blog));
  		}
  	}
  	return $query;
  }
  add_filter('pre_get_posts', 'livesay_vt_excludeCat');
}

/* Excerpt Length */
class LivesayExcerpt {

  // Default length (by WordPress)
  public static $livesay_length = 55;

  // Output: livesay_excerpt('short');
  public static $livesay_excerpt_types = array(
    'short' => 25,
    'regular' => 55,
    'long' => 100
  );

  /**
   * Sets the length for the excerpt,
   * then it adds the WP filter
   * And automatically calls the_excerpt();
   *
   * @param string $livesay_new_length
   * @return void
   * @author Baylor Rae'
   */
  public static function livesay_length($livesay_new_length = 55) {
    LivesayExcerpt::$livesay_length = $livesay_new_length;
    add_filter('excerpt_length', 'LivesayExcerpt::livesay_new_length');
    LivesayExcerpt::livesay_excerpt_output();
  }

  // Tells WP the new length
  public static function livesay_new_length() {
    if( isset(LivesayExcerpt::$livesay_excerpt_types[LivesayExcerpt::$livesay_length]) )
      return LivesayExcerpt::$livesay_excerpt_types[LivesayExcerpt::$livesay_length];
    else
      return LivesayExcerpt::$livesay_length;
  }

  // Echoes out the excerpt
  public static function livesay_excerpt_output() {
    the_excerpt();
  }

}

// Custom Excerpt Length
if( ! function_exists( 'livesay_excerpt' ) ) {
  function livesay_excerpt($livesay_length = 55) {
    LivesayExcerpt::livesay_length($livesay_length);
  }
}

if ( ! function_exists( 'livesay_new_excerpt_more' ) ) {
  function livesay_new_excerpt_more( $more ) {
    return ' [...]';
  }
  add_filter('excerpt_more', 'livesay_new_excerpt_more');
}

/* Tag Cloud Widget - Remove Inline Font Size */
if( ! function_exists( 'livesay_vt_tag_cloud' ) ) {
  function livesay_vt_tag_cloud($tag_string){
    return preg_replace("/style='font-size:.+pt;'/", '', $tag_string);
  }
  add_filter('wp_generate_tag_cloud', 'livesay_vt_tag_cloud', 10, 3);
}

/* Password Form */
if( ! function_exists( 'livesay_vt_password_form' ) ) {
  function livesay_vt_password_form( $output ) {
    $output = str_replace( 'type="submit"', 'type="submit" class=""', $output );
    return $output;
  }
  add_filter('the_password_form' , 'livesay_vt_password_form');
}

/* Maintenance Mode */
if( ! function_exists( 'livesay_vt_maintenance_mode' ) ) {
  function livesay_vt_maintenance_mode(){

    $maintenance_mode_page = cs_get_option( 'maintenance_mode_page' );
    $enable_maintenance_mode = cs_get_option( 'enable_maintenance_mode' );

    if ( isset($enable_maintenance_mode) && ! empty( $maintenance_mode_page ) && ! is_user_logged_in() ) {
      get_template_part('layouts/post/content', 'maintenance');
      exit;
    }

  }
  add_action( 'wp', 'livesay_vt_maintenance_mode', 1 );
}

/* Widget Layouts */
if ( ! function_exists( 'livesay_vt_footer_widgets' ) ) {
  function livesay_vt_footer_widgets() {

    $output = '';
    $footer_widget_layout = cs_get_option('footer_widget_layout');

    if( $footer_widget_layout ) {

      switch ( $footer_widget_layout ) {
        case 1: $widget = array('piece' => 1, 'class' => 'col-md-12'); break;
        case 2: $widget = array('piece' => 2, 'class' => 'col-md-6'); break;
        case 3: $widget = array('piece' => 3, 'class' => 'col-md-4'); break;
        case 4: $widget = array('piece' => 4, 'class' => 'col-md-3 col-sm-6'); break;
        case 5: $widget = array('piece' => 3, 'class' => 'col-md-3', 'layout' => 'col-md-6', 'queue' => 1); break;
        case 6: $widget = array('piece' => 3, 'class' => 'col-md-3', 'layout' => 'col-md-6', 'queue' => 2); break;
        case 7: $widget = array('piece' => 3, 'class' => 'col-md-3', 'layout' => 'col-md-6', 'queue' => 3); break;
        case 8: $widget = array('piece' => 4, 'class' => 'col-md-2', 'layout' => 'col-md-6', 'queue' => 1); break;
        case 9: $widget = array('piece' => 4, 'class' => 'col-md-2', 'layout' => 'col-md-6', 'queue' => 4); break;
        default : $widget = array('piece' => 1, 'class' => 'col-md-12'); break;
      }

      for( $i = 1; $i < $widget["piece"]+1; $i++ ) {

        $widget_class = ( isset( $widget["queue"] ) && $widget["queue"] == $i ) ? $widget["layout"] : $widget["class"];

        $output .= '<div class="'. $widget_class .'">';
        ob_start();
        if (is_active_sidebar('footer-'. $i)) {
          dynamic_sidebar( 'footer-'. $i );
        }
        $output .= ob_get_clean();
        $output .= '</div>';

      }
    }

    return $output;

  }
}

/* WP Link Pages */
if ( ! function_exists( 'livesay_wp_link_pages' ) ) {
  function livesay_wp_link_pages() {
    $defaults = array(
      'before'           => '<div class="wp-link-pages">' . esc_html__( 'Pages:', 'livesay' ),
      'after'            => '</div>',
      'link_before'      => '<span>',
      'link_after'       => '</span>',
      'next_or_number'   => 'number',
      'separator'        => ' ',
      'pagelink'         => '%',
      'echo'             => 1
    );
    wp_link_pages( $defaults );
  }
}

/* Metas : Category & Author */
if ( ! function_exists( 'livesay_post_metas' ) ) {
  function livesay_post_metas() {
    global $post;
    $metas_hide = (array) cs_get_option( 'theme_metas_hide' );
  ?>
  <div class="blog-meta">
    <?php
    if ( !in_array( 'category', $metas_hide ) ) { // Category Hide
      if ( get_post_type() === 'post') {
        $category_list = get_the_category_list( ', ', '', $post->ID );
        if ( $category_list ) {
          echo '<span>'. $category_list .' </span>';
        }
      }
    } // Category Hides

    if ( !in_array( 'author', $metas_hide ) ) { // Author Hide
    ?>
    <span>
      <?php
      printf(
        '<span>'. esc_html__('by','livesay') .' <a href="%1$s" rel="author">%2$s</a></span>',
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        get_the_author()
      );
      ?>
    </span>
    <?php } ?>
  </div>
  <?php
  }
}

/* Author Info */
if ( ! function_exists( 'livesay_author_info' ) ) {
  function livesay_author_info() {

    if (get_the_author_meta( 'url' )) {
      $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $website_url = get_the_author_meta( 'url' );
      $target = 'target="_blank"';
    } else {
      $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $website_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $target = '';
    }

    // variables
    $author_text = cs_get_option('author_text');
    $author_text = $author_text ? $author_text : esc_html__( 'Author', 'livesay' );
    $author_content = get_the_author_meta( 'description' );
if ($author_content) {
?>
  <div class="lvsy-author-info">
    <div class="author-avatar">
      <a href="<?php echo esc_url($website_url); ?>" <?php echo esc_attr($target); ?>>
        <?php echo get_avatar( get_the_author_meta( 'ID' ), 80 ); ?>
      </a>
    </div>
    <div class="author-content">
      <div class="author-pro"><?php echo esc_attr($author_text); ?></div>
      <a href="<?php echo esc_url($author_url); ?>" class="author-name"><?php echo esc_attr(get_the_author_meta('first_name')).' '. esc_attr(get_the_author_meta('last_name')); ?></a>
      <p><?php echo get_the_author_meta( 'description' ); ?></p>
      <!--post author socail start\-->
        <?php
        $facebook = get_the_author_meta('facebook');
        $twitter  = get_the_author_meta('twitter');
        $vine = get_the_author_meta('vine');
        $pinterest = get_the_author_meta('pinterest');
        $instagram = get_the_author_meta('instagram');
        ?>
        <div class="lvsy-social">
          <?php
          if(!empty($facebook)) {
          echo '<a href="'. esc_url($facebook) .'" target="_blank"><i class="fa fa-facebook"></i></a>';
          }
           if(!empty($twitter)) {
          echo '<a href="'. esc_url($twitter) .'" target="_blank"><i class="fa fa-twitter"></i></a>';
          }
          if(!empty($vine)) {
          echo '<a href="'. esc_url($vine) .'" target="_blank"><i class="fa fa-vine"></i></a>';
          }
          if(!empty($pinterest)) {
          echo '<a href="'. esc_url($pinterest) .'" target="_blank"><i class="fa fa-pinterest"></i></a>';
          }
          if(!empty($instagram)) {
          echo '<a href="'. esc_url($instagram) .'" target="_blank"><i class="fa fa-instagram"></i></a>';
          }
         ?>
        </div>
    </div>
  </div>

<?php
} // if $author_content
  }
}

/* ==============================================
   Custom Comment Area Modification
=============================================== */
if ( ! function_exists( 'livesay_comment_modification' ) ) {
  function livesay_comment_modification($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);
    if ( 'div' == $args['style'] ) {
      $tag = 'div';
      $add_below = 'comment';
    } else {
      $tag = 'li';
      $add_below = 'div-comment';
    }
    $comment_class = empty( $args['has_children'] ) ? '' : 'parent';
  ?>

  <<?php echo esc_attr($tag); ?> <?php comment_class('item ' . $comment_class .' ' ); ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="">
    <?php endif; ?>
    <div class="comment-theme">
        <div class="comment-image">
          <?php if ( $args['avatar_size'] != 0 ) {
            echo get_avatar( $comment, 104 );
          } ?>
        </div>
    </div>
    <div class="comment-main-area">
      <div class="comment-wrapper">
        <div class="lvsy-comments-meta">
          <h4><?php printf( '%s', get_comment_author() ); ?></h4>
          <span class="comments-date">
            <?php echo get_comment_date(); echo esc_html__(' at ','livesay'); ?>
            <span class="caps"><?php echo get_comment_time(); ?></span>
          </span>
          <div class="comments-reply">
          <?php
            comment_reply_link( array_merge( $args, array(
            'reply_text' => '<span class="comments-reply-link">'. esc_html__('Reply','livesay') .'<i class="fa fa-long-arrow-down" aria-hidden="true"></i></span>',
            'before' => '',
            'class'  => '',
            'depth' => $depth,
            'max_depth' => $args['max_depth']
            ) ) );
          ?>
          </div>
        </div>
        <?php if ( $comment->comment_approved == '0' ) : ?>
        <em class="comment-awaiting-moderation"><?php echo esc_html__( 'Your comment is awaiting moderation.', 'livesay' ); ?></em>
        <?php endif; ?>
        <div class="comment-area">
          <?php comment_text(); ?>
        </div>
      </div>
    </div>
  <?php if ( 'div' != $args['style'] ) : ?>
  </div>
  <?php endif;
  }
}

/* Title Area */
if ( ! function_exists( 'livesay_title_area' ) ) {
  function livesay_title_area() {

    global $post, $wp_query;
    // Get post meta in all type of WP pages
    $livesay_id    = ( isset( $post ) ) ? $post->ID : 0;
    $livesay_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $livesay_id;
    $livesay_id    = ( livesay_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $livesay_id;
    $livesay_meta  = get_post_meta( $livesay_id, 'page_type_metabox', true );
    if ($livesay_meta && (!is_archive() || livesay_is_woocommerce_shop())) {
      $custom_title = $livesay_meta['page_custom_title'];
      if ($custom_title) {
        $custom_title = $custom_title;
      } elseif(post_type_archive_title()) {
        post_type_archive_title();
      } else {
        $custom_title = '';
      }
    } else { $custom_title = ''; }

    /**
     * For strings with necessary HTML, use the following:
     * Note that I'm only including the actual allowed HTML for this specific string.
     * More info: https://codex.wordpress.org/Function_Reference/wp_kses
     */
    $allowed_title_area_tags = array(
        'a' => array(
          'href' => array(),
        ),
        'span' => array(
          'class' => array(),
        )
    );

    if( $custom_title ) {
      echo esc_attr($custom_title);
    } elseif ( is_home() ) {
      bloginfo('description');
    } elseif ( is_search() ) {
      printf( esc_html__( 'Search Results for %s', 'livesay' ), '<span>' . get_search_query() . '</span>' );
    } elseif ( is_category() || is_tax() ){
      single_cat_title();
    } elseif ( livesay_is_woocommerce_shop() ){
      printf(esc_html__('Shop', 'livesay'));
    } elseif ( is_tag() ){
      single_tag_title(esc_html__('Posts Tagged: ', 'livesay'));
    } elseif ( is_archive() ){
      if ( is_day() ) {
        printf( wp_kses( esc_html__( 'Archive for %s', 'livesay' ), $allowed_title_area_tags ), get_the_date());
      } elseif ( is_month() ) {
        printf( wp_kses( esc_html__( 'Archive for %s', 'livesay' ), $allowed_title_area_tags ), get_the_date( 'F, Y' ));
      } elseif ( is_year() ) {
        printf( wp_kses( esc_html__( 'Archive for %s', 'livesay' ), $allowed_title_area_tags ), get_the_date( 'Y' ));
      } elseif ( is_author() ) {
        printf( wp_kses( esc_html__( 'Posts by: %s', 'livesay' ), $allowed_title_area_tags ), get_the_author_meta( 'display_name', $wp_query->post->post_author ));
      } elseif( livesay_is_woocommerce_shop() ) {
        echo esc_attr($custom_title);
      } elseif ( is_post_type_archive('tribe_events') ) {
        printf(esc_html__('Events', 'livesay'));
      } elseif ( is_post_type_archive() ) {
        post_type_archive_title();
      } else {
        esc_html_e( 'Archives', 'livesay' );
      }
    } elseif( is_404() ) {
      esc_html_e('404', 'livesay');
    } elseif( is_singular('tribe_events') ) {
      echo get_the_title($wp_query->post->ID);
    } else {
      the_title();
    }

  }
}

/**
 * Pagination Function
 */
if ( ! function_exists( 'livesay_paging_nav' ) ) {
  function livesay_paging_nav() {
    if ( function_exists('wp_pagenavi')) {
      wp_pagenavi();
    } else {
      echo '<div class="lvsy-pagination">';
      $older_post = cs_get_option('older_post');
      $newer_post = cs_get_option('newer_post');
      $older_post = $older_post ? $older_post : esc_html__( '&larr;', 'livesay' );
      $newer_post = $newer_post ? $newer_post : esc_html__( '&rarr;', 'livesay' );
      global $wp_query;
      $big = 999999999;
      if($wp_query->max_num_pages == '1' ) {} else {echo '';}
      echo paginate_links( array(
        'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
        'format' => '?paged=%#%',
        'prev_text' => $older_post,
        'next_text' => $newer_post,
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
      ));
      echo '</div>';
      if($wp_query->max_num_pages == '1' ) {} else {echo '';}
    }
  }
}

/* Event Calender:Changed Date format */
add_filter('tribe_events_event_schedule_details', 'livesay_tribe_events_event_schedule_details');
if ( ! function_exists( 'livesay_tribe_events_event_schedule_details' ) ) {
function livesay_tribe_events_event_schedule_details() {

  global $event;
  if ( is_numeric( $event ) )
    $event = get_post( $event );

  $schedule = '<span class="date-start dtstart">';
  $format = '';
  $date_without_year_format = tribe_get_date_format();
  $date_with_year_format = tribe_get_date_format( true );
  $time_format = get_option( 'time_format' );
  $datetime_separator = tribe_get_option('dateTimeSeparator', ' @ ');
  $time_range_separator = tribe_get_option('timeRangeSeparator', ' - ');
  $microformatStartFormat = tribe_get_start_date( $event, false, 'Y-m-dTh:i' );
  $microformatEndFormat = tribe_get_end_date( $event, false, 'Y-m-dTh:i' );

  $settings = array(
    'show_end_time' => true,
    'time' => true,
  );

  $settings = wp_parse_args( apply_filters('tribe_events_event_schedule_details_formatting', $settings), $settings );
  if ( ! $settings['time'] ) $settings['show_end_time'] = false;
  extract($settings);

  $format = $date_with_year_format;

  // if it starts and ends in the current year then there is no need to display the year
  if ( tribe_get_start_date( $event, false, 'Y' ) === date( 'Y' ) && tribe_get_end_date( $event, false, 'Y' ) === date( 'Y' ) ) {
    $format = $date_without_year_format;
  }

  if ( tribe_event_is_multiday( $event ) ) { // multi-date event

    $format2ndday = $format;

    //If it's all day and the end date is in the same month and year, just show the day.
    if ( tribe_event_is_all_day( $event ) && tribe_get_end_date( $event, false, 'm' ) === tribe_get_start_date( $event, false, 'm' ) && tribe_get_end_date( $event, false, 'Y' ) === date( 'Y' ) ) {
      $format2ndday = 'j';
    }

    if ( tribe_event_is_all_day( $event ) ) {
      $schedule .= tribe_get_start_date( $event, true, $format );
      $schedule .= '<span class="value-title" title="'. $microformatStartFormat .'"></span>';
      $schedule .= '</span>'.$time_range_separator;
      $schedule .= '<span class="date-end dtend">';
      $schedule .= tribe_get_end_date( $event, true, $format2ndday );
      $schedule .= '<span class="value-title" title="'. $microformatEndFormat .'"></span>';
    } else {
      $schedule .= tribe_get_start_date( $event, false, $date_without_year_format );
      $schedule .= '<span class="value-title" title="'. $microformatStartFormat .'"></span>';
      $schedule .= '</span>'.$time_range_separator;
      $schedule .= '<span class="date-end dtend">';
      $schedule .= tribe_get_end_date( $event, true, 'j, Y' );
      $schedule .= '<span class="value-title" title="'. $microformatEndFormat .'"></span>';
    }

  } elseif ( tribe_event_is_all_day( $event ) ) { // all day event
    $schedule .=  tribe_get_start_date( $event, true, $format );
    $schedule .= '<span class="value-title" title="'. $microformatStartFormat .'"></span>';
  } else { // single day event
    if ( tribe_get_start_date( $event, false, 'g:i A' ) === tribe_get_end_date( $event, false, 'g:i A' ) ) { // Same start/end time
      $schedule .= tribe_get_start_date( $event, false, $format ) . ( $time ? $datetime_separator . tribe_get_start_date( $event, false, $time_format ) : '' );
      $schedule .= '<span class="value-title" title="'. $microformatStartFormat .'"></span>';
    } else { // defined start/end time
      $schedule .= tribe_get_start_date( $event, false, $format ) . ( $time ? $datetime_separator . tribe_get_start_date( $event, false, $time_format ) : '' );
      $schedule .= '<span class="value-title" title="'. $microformatStartFormat .'"></span>';
      $schedule .= '</span>' . ( $show_end_time ? $time_range_separator : '' );
      $schedule .= '<span class="end-time dtend">';
      $schedule .= ( $show_end_time ? tribe_get_end_date( $event, false, $time_format ) : '' ) . '<span class="value-title" title="'. $microformatEndFormat .'"></span>';
    }
  }

  $schedule .= '</span>';

  $schedule =$schedule;

  return apply_filters( 'livesay_tribe_events_event_schedule_details', $schedule );
}
}

/* Event Calender:Changed Venus Title */
function livesay_tribe_get_venue_label_singular() {
  return apply_filters( 'tribe_venue_label_singular', esc_html__( 'VENUS INFO', 'livesay' ) );
}

// Custom Post Type limit
function livesay_custom_posts_per_page( $query ) {
  if ( post_type_exists( 'sponsor' ) ) {
    if ( is_post_type_archive() ) {
      $sponsor_limit = cs_get_option('sponsor_limit');
      if ( $query->query_vars['post_type'] == 'sponsor' ) $query->query_vars['posts_per_page'] = $sponsor_limit;
    }
  }
  if ( post_type_exists( 'gallery' ) ) {
    if ( is_post_type_archive() ) {
      $gallery_limit = cs_get_option('gallery_limit');
      if ( $query->query_vars['post_type'] == 'gallery' ) $query->query_vars['posts_per_page'] = $gallery_limit;
    }
  }
  if ( post_type_exists( 'speakers' ) ) {
    if ( is_post_type_archive() ) {
      $speaker_limit = cs_get_option('speaker_limit');
      if ( $query->query_vars['post_type'] == 'speakers' ) $query->query_vars['posts_per_page'] = $speaker_limit;
    }
  }
  return $query;
}
add_filter( 'pre_get_posts', 'livesay_custom_posts_per_page' );
