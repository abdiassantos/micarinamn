<?php
/*
 * The template for displaying all pages.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

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
$livesay_woo_columns = cs_get_option('woo_product_columns');
$livesay_woo_sidebar = cs_get_option('woo_sidebar_position');

$livesay_woo_columns = $livesay_woo_columns ? $livesay_woo_columns : '3';

if ($livesay_woo_sidebar === 'left-sidebar') {
	$livesay_column_class = 'col-md-8';
	$livesay_sidebar_class = 'lvsy-left-sidebar';
} elseif ($livesay_woo_sidebar === 'sidebar-hide') {
	$livesay_column_class = 'col-md-12';
	$livesay_sidebar_class = 'lvsy-hide-sidebar';
} else {
	$livesay_column_class = 'col-md-8';
	$livesay_sidebar_class = 'lvsy-right-sidebar';
}

get_header();
get_template_part( 'layouts/header/title', 'bar' );?>

<div class="lvsy-main-wrap woocommerce woocommerce-page woo-col-<?php echo esc_attr($livesay_woo_columns .' '. $livesay_content_padding .' '. $livesay_sidebar_class); ?>" style="<?php echo esc_attr($livesay_custom_padding); ?>">
	<div class="container">
		<?php
			// Left Sidebar
			if($livesay_woo_sidebar === 'left-sidebar') {
	   		get_sidebar('shop');
			}
		?>
		<div class="lvsy-primary <?php echo esc_attr($livesay_column_class); ?>">
			<?php
			if ( have_posts() ) :
				woocommerce_content();
			endif; // End of the loop.
			?>
		</div><!-- Content Area -->
		<?php
			// Right Sidebar
			if($livesay_woo_sidebar !== 'left-sidebar' && $livesay_woo_sidebar !== 'sidebar-hide') {
				get_sidebar('shop');
			}
		?>
	</div>
</div>
<?php
get_footer();
