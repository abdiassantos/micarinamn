<?php
/**
 * VictorTheme Custom Changes :Changed Overall Structure
*/

/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @version  4.3
 *
 */ ?>
<!-- Custom Change: Metabox Options-->
<?php
$livesay_id    = ( isset( $post ) ) ? $post->ID : 0;
$livesay_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $livesay_id;
$livesay_id    = ( livesay_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $livesay_id;
$livesay_id    = ( tribe_is_event()) ? get_the_ID() : $livesay_id;
$livesay_meta  = get_post_meta( $livesay_id, 'page_type_metabox', true );
$livesay_event_meta  = get_post_meta( get_the_ID(), 'livesay_tribe_event_options', true );

if ($livesay_meta) {
	$livesay_content_padding = $livesay_meta['content_spacings'];
} else {
	$livesay_content_padding = '';
}

if($livesay_event_meta) {
	$event_speakers = $livesay_event_meta['event_speaker'];
	$event_sponsor = $livesay_event_meta['event_sponsor'];
} else {
  $event_speakers = '';
  $event_sponsor = '';
}

// Padding - Metabox
if ($livesay_content_padding && $livesay_content_padding !== 'padding-none') {
	$livesay_content_top_spacings = $livesay_meta['content_top_spacings'];
	$livesay_content_bottom_spacings = $livesay_meta['content_bottom_spacings'];
	if ($livesay_content_padding === 'padding-custom') {
		$livesay_content_top_spacings = $livesay_content_top_spacings ? 'padding-top:'. livesay_check_px($livesay_content_top_spacings) .';' : '';
		$livesay_content_bottom_spacings = $livesay_content_bottom_spacings ? 'padding-bottom:'. livesay_check_px($livesay_content_bottom_spacings) .';' : '';
		$livesay_custom_padding = $livesay_content_top_spacings . $livesay_content_bottom_spacings;
	} else {
		$livesay_custom_padding = '';
	}
} else {
	$livesay_custom_padding = '';
}

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural = tribe_get_event_label_plural();

$event_id = get_the_ID();
?>
<!-- Custom Change: Wrap three div's on top-->
<div class="lvsy-main-wrap <?php echo esc_attr($livesay_content_padding); ?>">
  <div class="container">
    <div class="event-detail">
			<div id="tribe-events-content" class="tribe-events-single lvsy-primary">
      <!-- Custom Change: Removed events-back p tag-->
				<!-- Notices -->
				<?php tribe_the_notices() ?>

      	<!-- Custom Change: Removed tribe-events-schedule div & tribe-events-header div-->

				<?php while ( have_posts() ) :  the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<!-- Event featured image, but exclude link -->
						<!-- Custom Change: Interchanged Featured image and title & removed title class, changed title tag as h4-->
						<?php echo tribe_event_featured_image( $event_id, 'full', false ); ?>

						<?php the_title( '<h4>', '</h4>' ); ?>
						<!-- Event content -->
						<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
						<div class="tribe-events-single-event-description tribe-events-content">
							<?php the_content(); ?>
						</div>
						<!-- Custom Change: Removed action:tribe_events_single_event_after_the_content-->

						<!-- Event meta -->
						<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
						<?php tribe_get_template_part( 'modules/meta' ); ?>
						<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
					</div> <!-- #post-x -->
					<?php if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
				<?php endwhile; ?>

				<!-- Event footer -->
				<div id="tribe-events-footer">
					<!-- Navigation -->
					<h3 class="tribe-events-visuallyhidden"><?php printf( esc_html__( '%s Navigation', 'livesay' ), $events_label_singular ); ?></h3>
					<ul class="tribe-events-sub-nav">
						<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?></li>
						<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?></li>
					</ul>
					<!-- .tribe-events-sub-nav -->
				</div>
				<!-- #tribe-events-footer -->
				<!-- Custom Change : Included Sponsor section start -->
				<?php
		    $sponsor = array( $event_sponsor );
				$sponsor_args = array(
		      'posts_per_page' => -1,
		      'post_type' => 'sponsor',
		      'post__in' => $sponsor[0],
		      'orderby' => 'post__in',
		      'order' => 'ASE',
	    	);
	    	// var_dump($sponsor_args);

		    $sponsor_post = new WP_Query( $sponsor_args );
	      if ($sponsor_post->have_posts()) : while ($sponsor_post->have_posts()) : $sponsor_post->the_post();
		      $sponsors_options = get_post_meta( get_the_ID(), 'sponsor_options', true );
					$sponsor_website = $sponsors_options['sponsor_website'];
					$sponsor_website_link = $sponsors_options['sponsor_website_link'];
					$sponsor_socials = $sponsors_options['social_icons'];
					$sponsor_quote = $sponsors_options['sponsor_quote'];
					$sponsor_profile = $sponsors_options['sponsor_profile'];
					$sponsor_profile_link = $sponsors_options['sponsor_profile_link'];
					$sponsor_contact = $sponsors_options['sponsor_contact'];
					$sponsor_contact_link = $sponsors_options['sponsor_contact_link'];
				?>
				<div class="lvsy-donor-wrap">
          <div class="row">
            <div class="col-md-5 col-sm-5">
              <div class="lvsy-donor-profile">
                <div class="lvsy-donor-logo"><a href="<?php esc_url(the_permalink()); ?>"><?php esc_url(the_post_thumbnail()); ?></a></div>
                <?php if ( ! empty( $sponsor_website ) || ! empty( $sponsor_socials )) { ?>
                <ul>
                <?php if ( ! empty( $sponsor_website ) ) {
                	$sponsor_website_txt = cs_get_option('sponsor_website');
										if ($sponsor_website_txt) {
											$website_txt = $sponsor_website_txt;
										} else {
											$website_txt = esc_html__('Website', 'livesay');
										}
								?>
                  <li><span class="lvsy-donor-lable"><?php echo esc_attr($website_txt); ?></span>
                  	<?php if ($sponsor_website) {
                  	if ($sponsor_website_link) { ?>
			                <a href="<?php echo esc_url($sponsor_website_link); ?>" target="_blank"><?php echo esc_attr($sponsor_website); ?></a>
			              <?php } else { ?>
			                <span><?php echo esc_attr($sponsor_website); ?></span>
			              <?php } }?>
                  </li>
                  <?php }
                  if ( ! empty( $sponsor_socials ) ) {
                  	$sponsor_follow_txt = cs_get_option('sponsor_follow');
											if ($sponsor_follow_txt) {
												$follow_txt = $sponsor_follow_txt;
											} else {
												$follow_txt = esc_html__('Follow', 'livesay');
											}
									?>
	                  <li> <span class="lvsy-donor-lable"><?php echo esc_attr($follow_txt); ?></span>
	                  	<span class="lvsy-social">
			                  <?php foreach ( $sponsor_socials as $social ) {
			                  	if ($social['icon']) {
					                  if($social['icon_link']) {
					                    echo '<a href="'.esc_url($social['icon_link']).'"><i class="'.esc_attr($social['icon']).'" aria-hidden="true"></i></a>';
					                  } else {
					                    echo '<span><i class="'.esc_attr($social['icon']).'" aria-hidden="true"></i></span>';
					                  }
					                }
			                  	?>
					              <?php }  ?>
		                  </span>
	                  </li>
                  <?php } ?>
                </ul>
                <?php } ?>
                <div class="lvsy-donor-links">
                <?php
                if ($sponsor_profile) {
	                if ($sponsor_profile_link) {
	                	echo '<a href="'.esc_url($sponsor_profile_link).'" target="_blank">'.esc_attr($sponsor_profile).'</a>';
	                } else {
	                	echo '<span>'.esc_attr($sponsor_profile).'</span>';
	                } }
                ?>
                <?php
                if ($sponsor_contact) {
	                if ($sponsor_contact_link) {
	                	echo '<a href="'.esc_url($sponsor_contact_link).'" target="_blank">'.esc_attr($sponsor_contact).'</a>';
	                } else {
	                	echo '<span>'.esc_attr($sponsor_contact).'</span>';
	                }
	              }
                ?> </div>
              </div>
            </div>
            <div class="col-md-7 col-sm-7">
              <div class="lvsy-donor-info">
              <?php
	              $about_organizer_txt = cs_get_option('about_organizer');
								if ($about_organizer_txt) {
									$organizer_txt = $about_organizer_txt;
								} else {
									$organizer_txt = esc_html__('About The Organizer', 'livesay');
								}
							?>
                <h4><?php echo esc_attr($organizer_txt); ?></h4>
                <h5><?php echo esc_attr($sponsor_quote); ?></h5>
                <p><?php livesay_excerpt(); ?></p>
              </div>
            </div>
          </div>
        </div>
        <?php
		      endwhile;
		      endif;
		      wp_reset_postdata();
		    ?>
		    <!-- Custom Change : Included Sponsor section end -->

			</div><!-- #tribe-events-content -->
			<!-- Custom Change : Included Speaker Sidebar start -->
			<?php
	    $speakers = array( $event_speakers );
			$speakers_args = array(
	      'posts_per_page' => -1,
	      'post_type' => 'speakers',
	      'post__in' => $speakers[0],
	      'orderby' => 'post__in',
	      'order' => 'ASE',
    	);
    	// var_dump($speakers_args);

	    $livesay_post = new WP_Query( $speakers_args );
      if ($livesay_post->have_posts()) :
      	while ($livesay_post->have_posts()) : $livesay_post->the_post();
	      $speakers_options = get_post_meta( get_the_ID(), 'speakers_options', true );
				$speaker_website = $speakers_options['speakers_website'];
				$speakers_website_link = $speakers_options['speakers_website_link'];
				$speaker_socials = $speakers_options['social_icons'];
			?>
			<div class="lvsy-secondary-speaker">
        <div class="event-author">
	        <?php
		        $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
		        $large_image = $large_image[0];
	          if(class_exists('Aq_Resize')) {
	              $post_img = aq_resize( $large_image, '159', '159', true );
	            } else {
	              $post_img = $large_image;
	            }
	        ?>
          <div class="author-picture"><img src="<?php echo esc_url($post_img); ?>" alt="<?php esc_attr(the_title()); ?>"></div>
          <ul>
	          <?php
		          $speaker_title_txt = cs_get_option('speaker_title');
							if ($speaker_title_txt) {
								$speaker_txt = $speaker_title_txt;
							} else {
								$speaker_txt = esc_html__('Speaker', 'livesay');
							}
						?>
            <li><span class="author-lable"><?php echo esc_attr($speaker_txt); ?></span><?php esc_attr(the_title()); ?></li>
            <?php if ( ! empty( $speaker_website ) ) {
      				$speaker_website_txt = cs_get_option('speaker_website');
							if ($speaker_website_txt) {
								$website_txt = $speaker_website_txt;
							} else {
								$website_txt = esc_html__('Website', 'livesay');
							}
						?>
            <li><span class="author-lable"><?php echo esc_attr($website_txt); ?></span>
            	<?php
            	if ($speaker_website) {
			          if ($speakers_website_link) {
			          	echo '<a href="'. esc_url($speakers_website_link) .'" target="_blank">'. esc_attr($speaker_website) .'</a>';
			          } else {
			          	echo '<span>'. esc_attr($speaker_website) .'</span>';
			          }
		        	} ?>
            </li>
            <?php }
            if ( ! empty( $speaker_socials ) ) {
    					$speaker_follow_txt = cs_get_option('speaker_follow');
							if ($speaker_follow_txt) {
								$follow_txt = $speaker_follow_txt;
							} else {
								$follow_txt = esc_html__('Follow', 'livesay');
							}
						?>
	            <li> <span class="author-lable"><?php echo esc_attr($follow_txt); ?></span> <span class="lvsy-social">
	            <?php foreach ( $speaker_socials as $social ) {
                if ($social['icon']) {
                  if($social['icon_link']) {
                    echo '<a href="'.esc_url($social['icon_link']).'"><i class="'.esc_attr($social['icon']).'" aria-hidden="true"></i></a>';
                  } else {
                    echo '<span><i class="'.esc_attr($social['icon']).'" aria-hidden="true"></i></span>';
                  }
                }
              ?>
	              <?php }  ?>
	            </span> </li>
            <?php }  ?>
          </ul>
        </div>
      </div>
      <?php
      endwhile;
      wp_reset_postdata();
      endif; ?>
      <!-- Custom Change : Included Speaker Sidebar end -->
		</div>
	</div>
</div>
