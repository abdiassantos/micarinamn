<?php
/*
 * The sidebar containing the main widget area.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

$livesay_blog_widget = cs_get_option('blog_widget');
$livesay_single_blog_widget = cs_get_option('single_blog_widget');
$livesay_team_widget = cs_get_option('team_widget');

if (is_page()) {
	// Page Layout Options
	$livesay_page_layout = get_post_meta( get_the_ID(), 'page_layout_options', true );
}
?>

<div class="lvsy-secondary">
	<?php if (is_page() && $livesay_page_layout['page_sidebar_widget']) {
		if (is_active_sidebar($livesay_page_layout['page_sidebar_widget'])) {
			dynamic_sidebar($livesay_page_layout['page_sidebar_widget']);
		}
	} elseif (!is_page() && $livesay_blog_widget && !$livesay_single_blog_widget) {
		if (is_active_sidebar($livesay_blog_widget)) {
			dynamic_sidebar($livesay_blog_widget);
		}
	} elseif ($livesay_team_widget && is_singular('team')) {
		if (is_active_sidebar($livesay_team_widget)) {
			dynamic_sidebar($livesay_team_widget);
		}
	} elseif (is_single() && $livesay_single_blog_widget) {
		if (is_active_sidebar($livesay_single_blog_widget)) {
			dynamic_sidebar($livesay_single_blog_widget);
		}
	} else {
		if (is_active_sidebar('sidebar-1')) {
			dynamic_sidebar( 'sidebar-1' );
		}
	} ?>
</div><!-- #secondary -->
