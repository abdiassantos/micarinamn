<?php
/*
 * The template for displaying all single gallery.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
get_header();
get_template_part( 'layouts/header/title', 'bar' );
// Metabox
$livesay_id    = ( isset( $post ) ) ? $post->ID : 0;
$livesay_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $livesay_id;
$livesay_id    = ( livesay_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $livesay_id;
$livesay_meta  = get_post_meta( $livesay_id, 'page_type_metabox', true );

if ($livesay_meta) {
	$livesay_content_padding = $livesay_meta['content_spacings'];
} else { $livesay_content_padding = ''; }
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

// Page Layout Options
$livesay_page_layout = get_post_meta( get_the_ID(), 'page_layout_options', true );
if ($livesay_page_layout) {

	$livesay_page_layout = $livesay_page_layout['page_layout'];

	if ($livesay_page_layout === 'extra-width') {
		$livesay_column_class = 'extra-width';
		$livesay_layout_class = 'container-fluid';
	} elseif($livesay_page_layout === 'left-sidebar' || $livesay_page_layout === 'right-sidebar') {
		$livesay_column_class = 'col-md-8';
		$livesay_layout_class = 'container';
	} else {
		$livesay_column_class = 'col-md-12';
		$livesay_layout_class = 'container';
	}

	// Page Layout Class
	if ($livesay_page_layout === 'left-sidebar') {
		$livesay_sidebar_class = 'lvsy-left-sidebar';
	} elseif ($livesay_page_layout === 'right-sidebar') {
		$livesay_sidebar_class = 'lvsy-right-sidebar';
	} elseif ($livesay_page_layout === 'extra-width') {
		$livesay_sidebar_class = 'lvsy-extra-width';
	} else {
		$livesay_sidebar_class = 'lvsy-full-width';
	}
} else {
	$livesay_column_class = 'col-md-12';
	$livesay_layout_class = 'container';
	$livesay_sidebar_class = 'lvsy-full-width';
}

?>

<div class="lvsy-main-wrap <?php echo esc_attr($livesay_layout_class .' '. $livesay_content_padding .' '. $livesay_sidebar_class); ?>" style="<?php echo esc_attr($livesay_custom_padding); ?>">
			<?php
				if($livesay_page_layout === 'left-sidebar') {
		   		get_sidebar();
				}
			?>
			<div class="lvsy-content-side <?php echo esc_attr($livesay_column_class); ?>">
				<div class="lvsy-unit-fix">
					<div class="lvsy-blog-detail">
						<?php
						if ( have_posts() ) :
							/* Start the Loop */
							while ( have_posts() ) : the_post();
								$livesay_large_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
								$livesay_large_image = $livesay_large_image[0];?>
								<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
										<?php
									  if(has_post_thumbnail()) { ?>
										<div class="blog-picture">
											<img src="<?php echo esc_url($livesay_large_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
										</div>
										<?php }
										// Content
										the_content();
										if ( function_exists( 'livesay_post_share' ) ) { ?>
								    <div class="lvsy-blog-meta">
											<div class="lvsy-blog-share">
								        <?php livesay_post_share(); ?>
								      </div>
								    </div>
								    <?php } ?>
									<div class="lvsy-more-posts">
										<div class="pull-left">
											<?php $prev_post = get_adjacent_post(false, '', true);
											if(!empty($prev_post)) {
											echo '<span>'.esc_html__('Previous Gallery', 'livesay').'</span><a href="' . esc_url(get_permalink($prev_post->ID)) . '" title="' . esc_attr($prev_post->post_title) . '">' . esc_attr($prev_post->post_title) . '</a>'; } ?>
										</div>
										<div class="pull-right">
											<?php $next_post = get_adjacent_post(false, '', false);
											if(!empty($next_post)) {
											echo '<span>'.esc_html__('Next Gallery', 'livesay').'</span><a href="' . esc_url(get_permalink($next_post->ID)) . '" title="' . esc_attr($next_post->post_title) . '">' . esc_attr($next_post->post_title) . '</a>'; } ?>
										</div>
									</div>
								</div>
								<?php
							endwhile;
						else :
							get_template_part( 'layouts/post/content', 'none' );
						endif; ?>
					</div>
						<?php
				    livesay_paging_nav();
				    wp_reset_postdata();  // avoid errors further down the page
						?>
				</div><!-- Content Area -->
		  </div>
				<?php
				if($livesay_page_layout === 'right-sidebar') {
					get_sidebar();
				}
				?>
</div>
<?php
get_footer();
