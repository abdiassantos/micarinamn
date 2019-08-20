<?php
/*
 * The template for displaying all single posts.
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

$above_footer_option = get_post_meta( get_the_ID(), 'above_footer_option', true );
if ($above_footer_option) {
  $above_footer_widget = $above_footer_option['above_footer_widget'];
} else {
  $above_footer_widget = '';
}

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

// Theme Options
$livesay_sidebar_position = cs_get_option('single_sidebar_position');

// Sidebar Position
if ($livesay_sidebar_position === 'sidebar-hide') {
	$livesay_layout_class = 'col-md-12';
	$livesay_sidebar_class = 'lvsy-hide-sidebar';
} elseif ($livesay_sidebar_position === 'sidebar-left') {
	$livesay_layout_class = 'col-md-9';
	$livesay_sidebar_class = 'lvsy-left-sidebar';
} else {
	$livesay_layout_class = 'col-md-9';
	$livesay_sidebar_class = 'lvsy-right-sidebar';
}
?>

<div class="lvsy-main-wrap <?php echo esc_attr($livesay_content_padding .' '. $livesay_sidebar_class); ?>" style="<?php echo esc_attr($livesay_custom_padding); ?>">
	<div class="container">
			<?php
				if ($livesay_sidebar_position === 'sidebar-left' && $livesay_sidebar_position !== 'sidebar-hide') {
					get_sidebar(); // Sidebar
				}
			?>
			<div class="lvsy-primary <?php echo esc_attr($livesay_layout_class); ?>">
				<div class="lvsy-unit-fix">
					<div class="lvsy-blog-detail">
						<?php
						if ( have_posts() ) :
							/* Start the Loop */
							while ( have_posts() ) : the_post();
								get_template_part( 'layouts/post/content', 'single' );
								if ( (comments_open() || get_comments_number()) ) :
									comments_template();
								endif;
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
		  </div>
				<?php
					if ($livesay_sidebar_position !== 'sidebar-hide') {
						get_sidebar(); // Sidebar
					}
				?>
	</div>
</div>
<?php
if($above_footer_widget) {
  if (is_active_sidebar('above-footer')) {
    dynamic_sidebar('above-footer');
  }
}
get_footer();
