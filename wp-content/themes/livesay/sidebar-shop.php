<?php
/*
 * The sidebar only for WooCommerce pages.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

$livesay_woo_widget = cs_get_option('woo_widget');
?>
<div class="lvsy-secondary">
	<?php if ($livesay_woo_widget) {
		if (is_active_sidebar($livesay_woo_widget)) {
			dynamic_sidebar($livesay_woo_widget);
		}
	} else {
		if (is_active_sidebar( 'sidebar-shop' )) {
			dynamic_sidebar( 'sidebar-shop' );
		}
	} ?>
</div><!-- #secondary -->
<?php
