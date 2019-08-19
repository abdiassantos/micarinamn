<?php
/*
 * The template for portfolio category pages.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
get_header();

if (livesay_is_post_type('portfolio')) {
	$livesay_portfolio_style = cs_get_option('portfolio_style');
	$livesay_portfolio_column = cs_get_option('portfolio_column');
	$livesay_portfolio_no_space = cs_get_option('portfolio_no_space');
	$livesay_portfolio_pagination = cs_get_option('portfolio_pagination');

	$livesay_portfolio_style = $livesay_portfolio_style ? $livesay_portfolio_style : 'one';
	$livesay_portfolio_column = $livesay_portfolio_column ? $livesay_portfolio_column : 'bpw-col-3';
	$livesay_portfolio_no_space = $livesay_portfolio_no_space ? 'bpw-no-gutter' : '';
}
?>

<div class="container lvsy-content-area">
	<div class="row">
		<?php if (livesay_is_post_type('portfolio')) { ?>
			<!-- Portfolio Start -->
		  <div class="lvsy-portfolios bpw-style-<?php echo esc_attr($livesay_portfolio_style); ?> <?php echo esc_attr($livesay_portfolio_column); ?> <?php echo esc_attr($livesay_portfolio_no_space); ?>">
		    <div class="grid-sizer"></div>
		    <div class="gutter-sizer"></div>
				<?php
				/* Start the Loop */
				if (have_posts()) : while (have_posts()) : the_post();
						get_template_part( 'layouts/portfolio/portfolio', $livesay_portfolio_style );
				endwhile;
				else :
					get_template_part( 'layouts/post/content', 'none' );
				endif;
				wp_reset_postdata(); ?>
			</div><!-- Portfolios End -->
			<?php
				if ($livesay_portfolio_pagination) {
				  livesay_paging_nav();
				}
			wp_reset_postdata();
		} // Post Type Portfolio
		?>

	</div> <!-- Row -->
</div> <!-- Container -->
<?php
get_footer();
