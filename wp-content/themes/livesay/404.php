<?php
/*
 * The template for displaying 404 pages.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

// Theme Options
$livesay_error_heading = cs_get_option('error_heading');
$livesay_error_page_content = cs_get_option('error_page_content');
$livesay_error_page_bg = cs_get_option('error_page_bg');
$livesay_error_btn_text = cs_get_option('error_btn_text');

$livesay_error_heading = ( $livesay_error_heading ) ? $livesay_error_heading : esc_html__( 'Sorry! Page Not Found', 'livesay' );
$livesay_error_page_content = ( $livesay_error_page_content ) ? $livesay_error_page_content : esc_html__( 'The link you followed may be broken, or the page may have been removed.', 'livesay' );

$livesay_error_btn_text = ( $livesay_error_btn_text ) ? $livesay_error_btn_text : esc_html__( 'BACK TO HOME', 'livesay' );

get_header();
get_template_part( 'layouts/header/title', 'bar' ); ?>

<!-- Content -->
<div class="lvsy-error">
	<div class="container">
		<div class="lvsy-container">
			<div class="error-content">
				<div class="clearfix">
				<?php if ($livesay_error_page_bg) {
					echo '<img src="'.esc_url(wp_get_attachment_url($livesay_error_page_bg)).'" alt="'.esc_html__('404 Error', 'livesay').'" width="637">';
				} else {
					echo '<img src="'.esc_url(LIVESAY_IMAGES). '/404.png'.'" alt="'.esc_html__('404 Error', 'livesay').'" width="637">';
				} ?>
				</div>
					<div class="error-title-wrap">
						<div class="error-title"><?php echo esc_attr($livesay_error_heading); ?></div>
						<p><?php echo esc_attr($livesay_error_page_content); ?></p>
					</div>
					<div class="clearfix"><a href="<?php echo esc_url(home_url( '/' )); ?>" class="lvsy-btn btn-fourth"><?php echo esc_attr($livesay_error_btn_text); ?></a></div>
			</div>
		</div>
	</div>
</div>
<!-- Content -->

<?php
get_footer();
