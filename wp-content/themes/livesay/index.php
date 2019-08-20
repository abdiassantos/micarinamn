<?php
/*
 * The main template file.
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

// Theme Options
$livesay_sidebar_position = cs_get_option('blog_sidebar_position');

// Sidebar Position
if ($livesay_sidebar_position === 'sidebar-hide') {
	$layout_class = 'col-md-12';
	$livesay_sidebar_class = 'lvsy-hide-sidebar';
} elseif ($livesay_sidebar_position === 'sidebar-left') {
	$layout_class = 'col-md-9';
	$livesay_sidebar_class = 'lvsy-left-sidebar';
} else {
	$layout_class = 'col-md-9';
	$livesay_sidebar_class = 'lvsy-right-sidebar';
}
?>
<!-- Livesay main wrap, Livesay right sidebar -->
<div class="lvsy-main-wrap <?php echo esc_attr($livesay_sidebar_class); ?>">
  <div class="container">
    <div class="lvsy-primary <?php echo esc_attr($layout_class); ?>">
	    <?php
			if ( have_posts() ) :
				/* Start the Loop */
				while ( have_posts() ) : the_post();
					get_template_part( 'layouts/post/content' );
				endwhile;
			else :
				get_template_part( 'layouts/post/content', 'none' );
			endif; ?>
      <div class="lvsy-pagination">
		    <?php
				livesay_paging_nav();
		    wp_reset_postdata();  // avoid errors further down the page
				?>
	    </div>
		</div>
			<?php
				if ($livesay_sidebar_position !== 'sidebar-hide') {
					get_sidebar(); // Sidebar
				}
			?>
	</div>
</div>

<?php
get_footer();
