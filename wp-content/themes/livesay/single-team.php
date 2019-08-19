<?php
/*
 * The template for displaying all single team.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
get_header();

// Metabox
$livesay_id    = ( isset( $post ) ) ? $post->ID : 0;
$livesay_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $livesay_id;
$livesay_id    = ( livesay_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $livesay_id;
$livesay_meta  = get_post_meta( $livesay_id, 'page_type_metabox', true );
if ($livesay_meta) {
	$livesay_content_padding = $livesay_meta['content_spacings'];
} else { $livesay_content_padding = ''; }
// Padding - Theme Options
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
	$livesay_top_spacing = cs_get_option('team_top_spacing');
	$livesay_bottom_spacing = cs_get_option('team_bottom_spacing');
	if ($livesay_top_spacing || $livesay_bottom_spacing) {
		$livesay_top_spacing = $livesay_top_spacing ? 'padding-top:'. livesay_check_px($livesay_top_spacing) .';' : '';
		$livesay_bottom_spacing = $livesay_bottom_spacing ? 'padding-bottom:'. livesay_check_px($livesay_bottom_spacing) .';' : '';
		$livesay_custom_padding = $livesay_top_spacing . $livesay_bottom_spacing;
	} else {
		$livesay_custom_padding = '';
	}
}

// Sidebar Position
$livesay_layout_class = 'col-lg-12 no-padding';
?>

<div class="container lvsy-content-area <?php echo esc_attr($livesay_content_padding); ?>" style="<?php echo esc_attr($livesay_custom_padding); ?>">
	<div class="row">
		<div class="<?php echo esc_attr($livesay_layout_class); ?> sngl-team-cnt">
			<div class="lvsy-blog-one lvsy-blog-list lvsy-blog-col-1">
				<?php
					if (have_posts()) : while (have_posts()) : the_post();
						the_content();
					endwhile;
					endif;
				?>
			</div><!-- Blog Div -->
				<?php wp_reset_postdata();  // avoid errors further down the page?>
		</div><!-- Content Area -->
	</div>
</div>

<?php
get_footer();
