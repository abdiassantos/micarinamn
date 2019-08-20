<?php
/*
 * The template for displaying all single speaker.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
get_header();
get_template_part( 'layouts/header/title', 'bar' );
// Metabox
$livesay_id    = ( isset( $post ) ) ? $post->ID : 0;
$livesay_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $livesay_id;
$livesay_id    = ( livesay_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $livesay_id;
$livesay_id    = ( 'speakers' == get_post_type() ) ? get_the_ID() : $livesay_id;
$livesay_meta  = get_post_meta( $livesay_id, 'page_type_metabox', true );
$speakers_options = get_post_meta( get_the_ID(), 'speakers_options', true );

if ($livesay_meta) {
	$livesay_content_padding = $livesay_meta['content_spacings'];
} else {
	$livesay_content_padding = '';
}

if ($speakers_options) {
	$speaker_designation = $speakers_options['speakers_designation'];
	$speakers_quote = $speakers_options['speakers_quote'];
	$speakers_events_list = $speakers_options['speakers_events_list'];
	$speaker_website = $speakers_options['speakers_website'];
	$speaker_website_link = $speakers_options['speakers_website_link'];
	$speaker_socials = $speakers_options['social_icons'];
} else {
	$speaker_designation = '';
	$speakers_quote = '';
	$speakers_events_list = '';
	$speaker_website = '';
	$speakers_website_link = '';
	$speaker_socials = '';
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
?>
<div class="lvsy-main-wrap <?php echo esc_attr($livesay_content_padding); ?>" style="<?php echo esc_attr($livesay_custom_padding); ?>">
	<div class="container">
			<div class="lvsy-speaker-primary">
				<div class="lvsy-unit-fix">
				<?php
         if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="lvsy-speaker-detail">
				    <div class="container">
					    <div class="row">
					      <div class="col-md-6">
					        <div class="speaker-picture"><?php esc_url(the_post_thumbnail()); ?></div>
					      </div>
					      <div class="col-md-6">
					        <div class="speaker-detail-wrap">
					          <div class="speaker-name"><?php esc_attr(the_title()); ?></div>
					          <div class="speaker-designation"><?php echo esc_attr($speaker_designation); ?></div>
					          <div class="speaker-quote"><?php echo esc_attr($speakers_quote); ?></div>
					          <p><?php the_excerpt(); ?></p>
					          <?php if ($speakers_events_list) { ?>
					          <div class="speaker-link"><?php echo do_shortcode($speakers_events_list); ?></div> <?php } ?>
					          <?php if ( ! empty( $speaker_website ) ) {
				              $speaker_website_txt = cs_get_option('speaker_website');
											if ($speaker_website_txt) {
												$website_txt = $speaker_website_txt;
											} else {
												$website_txt = esc_html__('Website', 'livesay');
											}
										?>
					          <div class="speaker-link"><span><?php echo esc_attr($website_txt); ?></span>
					          <?php
					          if ($speaker_website) {
						          if ($speaker_website_link) {
						          	echo '<a href="'. esc_url($speaker_website_link) .'" target="_blank">'. esc_attr($speaker_website) .'</a>';
						          } else {
						          	echo '<span class="spkr-website">'. esc_attr($speaker_website) .'</span>';
						          }
					        	}
					          ?>
					          </div>
					          <?php }
					          if ( ! empty( $speaker_socials ) ) {
					          	$speaker_follow_txt = cs_get_option('speaker_follow');
											if ($speaker_follow_txt) {
												$follow_txt = $speaker_follow_txt;
											} else {
												$follow_txt = esc_html__('Follow', 'livesay');
											}
										?>
					          <div class="speaker-link"> <span><?php echo esc_attr($follow_txt); ?></span>
					            <div class="lvsy-social">
					            <?php foreach ( $speaker_socials as $social ) {
				                if ($social['icon']) {
				                  if($social['icon_link']) {
				                    echo '<a href="'.esc_url($social['icon_link']).'"><i class="'.esc_attr($social['icon']).'" aria-hidden="true"></i></a>';
				                  } else {
				                    echo '<span><i class="'.esc_attr($social['icon']).'" aria-hidden="true"></i></span>';
				                  }
				                }
			                	?>
				              <?php } ?>
					            </div>
					          </div>
					          <?php } ?>
					        </div>
					      </div>
							</div>
						</div>
					</div>
					<?php
						endwhile;
						endif;
					?>
				</div>
				<div class="speaker-content-area">
				<?php the_content(); ?>
				</div>
				<?php
			    livesay_paging_nav();
			    wp_reset_postdata();  // avoid errors further down the page
				?>
		  </div>
	</div>
</div>

<?php
get_footer();
