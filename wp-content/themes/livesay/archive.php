<?php
/*
 * The template for displaying archive pages.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
get_header();
if( 'speakers' == get_post_type() ) {
get_template_part( 'layouts/header/title', 'global' );
// Theme Options
$speaker_style = cs_get_option('speaker_listing_style');
$speaker_limit = cs_get_option('speaker_limit');
$speaker_order = cs_get_option('speaker_order');
$speaker_orderby = cs_get_option('speaker_orderby');
$speaker_pagination = cs_get_option('speaker_pagination');

if($speaker_style === 'style_two'){
  $speak_style_cls = 'speakers-style-two';
} elseif($speaker_style === 'style_three'){
  $speak_style_cls = 'speakers-style-three';
} else {
  $speak_style_cls = '';
}
// Query Starts Here
// Pagination
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
  'post_type' => 'speakers',
  'posts_per_page' => (int)$speaker_limit,
  'orderby' => $speaker_orderby,
  'order' => $speaker_order,
  'post__in' => '',
);

$livesay_speaker_qury = new WP_Query( $args ); ?>
<div class="lvsy-single-speaker-wrap">
  <div class="lvsy-speakers <?php echo esc_attr($speak_style_cls); ?>"> <!-- speaker Starts -->
    <div class="container lvsy-content-area">
    <?php if ($livesay_speaker_qury->have_posts()) : ?>
      <div class="row">
	      <?php
	      while ($livesay_speaker_qury->have_posts()) : $livesay_speaker_qury->the_post();
	      // Link
	      $speaker_options = get_post_meta( get_the_ID(), 'speakers_options', true );
	      $speaker_socials = $speaker_options['social_icons'];
	      $speaker_pro = $speaker_options['speakers_designation'];

	      // Featured Image
	      $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
	      $large_image = $large_image[0];
	      $abt_title = get_the_title();
	      if($speaker_style === 'style_three'){
	        if(class_exists('Aq_Resize')) {
	          $actual_img = aq_resize( $large_image, '212', '212', true );
	        } else {
	          $actual_img = $large_image;
	        }
	        $actual_image = $actual_img;
	      } elseif($speaker_style === 'style_two'){
	        if(class_exists('Aq_Resize')) {
	          $actual_img = aq_resize( $large_image, '470', '390', true );
	        } else {
	          $actual_img = $large_image;
	        }
	        $actual_image = $actual_img;
	      } else {
	      	if(class_exists('Aq_Resize')) {
	          $actual_img = aq_resize( $large_image, '270', '270', true );
	        } else {
	          $actual_img = $large_image;
	        }
	        $actual_image = $actual_img;
	      }

	      if($speaker_style === 'style_three'){ ?>
	      <div class="col-md-3 col-sm-4">
	        <div class="speaker-item">
	          <div class="speaker-picture"><?php echo '<img src="'. esc_url($actual_image) .'" alt="'. esc_attr($abt_title) .'">'; ?>
	          <?php if($speaker_socials) { ?>
	            <div class="lvsy-social">
	              <div class="lvsy-table-container">
	                <div class="lvsy-align-container">
	                  <?php
	                    if ( ! empty( $speaker_socials ) ) {
	                    foreach ( $speaker_socials as $social ) { ?>
	                    <a href="<?php echo esc_url($social['icon_link']); ?>"><i class="<?php echo esc_attr($social['icon']); ?>" aria-hidden="true"></i></a>
	                  <?php } } ?>
	                </div>
	              </div>
	            </div>
	          <?php } ?>
	          </div>
	          <div class="speaker-info">
	            <div class="speaker-name"><a href="<?php echo esc_url(get_permalink()); ?>" class="speaker-name"><?php echo esc_attr($abt_title); ?></a></div>
              <div class="speaker-designation"><?php echo esc_attr($speaker_pro); ?></div>
	          </div>
	        </div>
	      </div>

	      <?php } else { ?>
	        <div class="col-md-3 col-sm-4">
	          <div class="speaker-item">
	            <div class="speaker-picture"><?php echo '<img src="'. esc_url($actual_image) .'" alt="'. esc_attr($abt_title) .'">'; ?></div>
	            <div class="speaker-info">
	              <div class="lvsy-table-container">
	                <div class="lvsy-align-container">
	                  <div class="speaker-name"><a href="<?php echo esc_url(get_permalink()); ?>" class="speaker-name"><?php echo esc_attr($abt_title); ?></a></div>
	                  <?php if($speaker_socials) { ?>
	                  <div class="lvsy-social">
	                    <?php
	                      if ( ! empty( $speaker_socials ) ) {
	                      foreach ( $speaker_socials as $social ) {
	                    ?>
	                      <a href="<?php echo esc_attr($social['icon_link']); ?>"><i class="<?php echo esc_attr($social['icon']); ?>" aria-hidden="true"></i></a>
	                    <?php } } ?>
	                  </div>
	                <?php } ?>
	                </div>
	              </div>
	            </div>
	          </div>
	        </div>
	      <?php } ?>
	      <?php endwhile; ?>
    	</div>
<?php
  endif;

  if ($speaker_pagination) {
    livesay_paging_nav();
    wp_reset_postdata();  // avoid errors further down the page
  } ?>
  	</div><!-- speaker End -->
  </div>
</div>
<?php
} elseif( 'sponsor' == get_post_type() ) {
  get_template_part( 'layouts/header/title', 'global' );
// Theme Options
$sponsor_limit = cs_get_option('sponsor_limit');
$sponsor_order = cs_get_option('sponsor_order');
$sponsor_orderby = cs_get_option('sponsor_orderby');
$sponsor_pagination = cs_get_option('sponsor_pagination');
$sponsor_column = cs_get_option('sponsor_column');
if($sponsor_column === 'col-4'){
	$column_cls = 'col-md-3 col-sm-6';
} elseif($sponsor_column === 'col-5'){
	$column_cls = 'one-fifth';
} else {
	$column_cls ='col-md-4 col-sm-6';
}

  // Query Starts Here
  // Pagination
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
    'post_type' => 'sponsor',
    'posts_per_page' => (int)$sponsor_limit,
    'orderby' => $sponsor_orderby,
    'order' => $sponsor_order,
    'post__in' => '',
  );

  $livesay_sponsor_qury = new WP_Query( $args ); ?>
<div class="lvsy-single-donor-wrap">
  <div class="lvsy-donors lvsy-donors-style-three">
  <?php  if ($livesay_sponsor_qury->have_posts()) : ?>
    <div class="container">
      <div class="lvsy-donor-category">
        <div class="row">
  	      <?php
  	      while ($livesay_sponsor_qury->have_posts()) : $livesay_sponsor_qury->the_post();

  	      // Featured Image
  	      $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
  	      $large_image = $large_image[0];
  	      $abt_title = get_the_title();

          $sponsor_options = get_post_meta( get_the_ID(), 'sponsor_options', true );
          $sponsor_short_info = $sponsor_options['sponsor_short_info'];

  	      	if(class_exists('Aq_Resize')) {
  	          $actual_img = aq_resize( $large_image, '164', '53', true );
  	        } else {
  	          $actual_img = $large_image;
  	        }
  	        $actual_image = $large_image;
  	      ?>

          <div class="<?php echo esc_attr($column_cls); ?>">
            <div class="lvsy-donor-item">
              <div class="lvsy-donor-logo"><a href="<?php the_permalink(); ?>"><?php echo '<img src="'. esc_url($actual_image) .'" alt="'. esc_attr($abt_title) .'">'; ?></a></div>
              <div class="lvsy-donor-name"><?php echo esc_attr($abt_title); ?></div>
              <?php if($sponsor_short_info) { ?>
              <p><?php echo esc_attr($sponsor_short_info); ?></p>
              <?php }
                $sponsor_learn_more_txt = cs_get_option('sponsor_learn_more');
                if ($sponsor_learn_more_txt) {
                  $learn_more_txt = $sponsor_learn_more_txt;
                } else {
                  $learn_more_txt = esc_html__('Learn More', 'livesay');
                }
              ?>
              <div class="clearfix"><a href="<?php the_permalink(); ?>"><?php echo esc_attr($learn_more_txt); ?></a></div>
            </div>
          </div>
  	      <?php endwhile; ?>
      </div>
    </div>
  </div><!-- speaker End -->
  <?php
    endif;
    if ($sponsor_pagination) {
      livesay_paging_nav();
      wp_reset_postdata();  // avoid errors further down the page
    } ?>
  </div>
</div>

<?php
} elseif( 'gallery' == get_post_type() ) {
  get_template_part( 'layouts/header/title', 'global' );
// Theme Options
$gallery_limit = cs_get_option('gallery_limit');
$gallery_order = cs_get_option('gallery_order');
$gallery_orderby = cs_get_option('gallery_orderby');
$gallery_pagination = cs_get_option('gallery_pagination');
$gallery_column = cs_get_option('gallery_column');
if($gallery_column === 'col-4'){
  $column_cls = 'col-md-3 col-sm-6';
} elseif($gallery_column === 'col-5'){
  $column_cls = 'one-fifth';
} else {
  $column_cls ='col-md-4 col-sm-6';
}

  // Query Starts Here
  // Pagination
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
    'post__in' => '',
  );

  $livesay_gallery_qury = new WP_Query( $args );?>

<div class="lvsy-event-gallery">
  <?php if ($livesay_gallery_qury->have_posts()) : ?>
  <div class="container">
    <div class="row">
      <?php
      while ($livesay_gallery_qury->have_posts()) : $livesay_gallery_qury->the_post();
      // Link
      $gallery_options = get_post_meta( get_the_ID(), 'gallery_options', true );
      $gallery_link_type = $gallery_options['gallery_link_type'];
      $popup_image = $gallery_options['popup_image'];

      // Featured Image
      $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
      $large_image = $large_image[0];
      $gallery_title = get_the_title();
        if(class_exists('Aq_Resize')) {
          $actual_img = aq_resize( $large_image, '370', '340', true );
        } else {
          $actual_img = $large_image;
        }
        $actual_image = $actual_img;

      $pop_img = wp_get_attachment_image_src( $popup_image, 'fullsize', false, '' );
      $pop_img = $pop_img[0];

      if($gallery_link_type === 'popup-img') {
        if($pop_img) {
          $img_link = $pop_img;
          $gallery_popup = 'gallery';
        } else {
          $img_link = $actual_img;
          $gallery_popup = 'gallery';
        }
      } else {
        $img_link = get_the_permalink();
        $gallery_popup = 'none';
      }
       ?>
      <div class="<?php echo esc_attr($column_cls); ?>">
        <div class="gallery-item">
          <div class="clearfix"><?php echo '<img src="'. esc_url($actual_image) .'" alt="'. esc_attr($gallery_title) .'">'; ?></div>
          <div class="gallery-info">
            <div class="lvsy-table-container">
              <div class="lvsy-align-container">
                <div class="gallery-title"><?php echo '<a href="'. esc_url($img_link) .'" data-fancybox-group="'. esc_attr($gallery_popup) .'" class="lvsy-gallery">'. esc_attr($gallery_title) .'</a>'; ?></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
  <?php
   endif;
  if ($gallery_pagination) {
    livesay_paging_nav();
    wp_reset_postdata();  // avoid errors further down the page
  } ?>
</div><!-- gallery End -->
<?php
} else {
get_template_part( 'layouts/header/title', 'global' );
// Theme Options
$livesay_blog_columns = cs_get_option('blog_listing_columns');
$livesay_sidebar_position = cs_get_option('blog_sidebar_position');

// Sidebar Position
if ($livesay_sidebar_position === 'sidebar-hide') {
	$livesay_layout_class = 'col-md-12';
	$livesay_sidebar_class = 'lvsy-hide-sidebar';
} elseif ($livesay_sidebar_position === 'sidebar-left') {
	$livesay_layout_class = 'col-md-8';
	$livesay_sidebar_class = 'lvsy-left-sidebar';
} else {
	$livesay_layout_class = 'col-md-8';
	$livesay_sidebar_class = 'lvsy-right-sidebar';
}
?>

<div class="container lvsy-content-area <?php echo esc_attr($livesay_sidebar_class); ?>">
	<div class="row">
		<?php
		if ($livesay_sidebar_position === 'sidebar-left' && $livesay_sidebar_position !== 'sidebar-hide') {
			get_sidebar(); // Sidebar
		}
		?>
		<div class="lvsy-content-side <?php echo esc_attr($livesay_layout_class); ?>">
			<div class="lvsy-blg">
			<?php
			if ( have_posts() ) :
				/* Start the Loop */
				while ( have_posts() ) : the_post();
					get_template_part( 'layouts/post/content' );
				endwhile;
			else :
				get_template_part( 'layouts/post/content', 'none' );
			endif; ?>

			</div><!-- Blog Div -->
			<?php
	    livesay_paging_nav();
	    wp_reset_postdata();  // avoid errors further down the page
			?>
		</div><!-- Content Area -->

		<?php
		if ($livesay_sidebar_position !== 'sidebar-hide') {
			get_sidebar(); // Sidebar
		}
		?>
	</div>
</div>

<?php }
get_footer();
