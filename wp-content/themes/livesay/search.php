<?php
/*
 * The template for displaying search results pages.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

get_header();
get_template_part( 'layouts/header/title', 'bar' );

// Theme Options
$livesay_blog_columns = cs_get_option('blog_listing_columns');
$livesay_sidebar_position = cs_get_option('blog_sidebar_position');

// Sidebar Position
if ($livesay_sidebar_position === 'sidebar-hide') {
	$livesay_layout_class = 'col-md-12';
	$livesay_sidebar_class = 'lvsy-hide-sidebar';
} elseif ($livesay_sidebar_position === 'sidebar-left') {
	$livesay_layout_class = 'col-md-8';
	$livesay_sidebar_class = 'lvsy-left-sidebar';
} else {
	$livesay_layout_class = 'col-md-8';
	$livesay_sidebar_class = 'lvsy-right-sidebar';
}
?>

<div class="container lvsy-content-area <?php echo esc_attr($livesay_sidebar_class); ?>">
	<div class="row">
		<?php
			if ($livesay_sidebar_position === 'sidebar-left' && $livesay_sidebar_position !== 'sidebar-hide') {
				get_sidebar(); // Sidebar
			}
		?>
		<div class="lvsy-content-side <?php echo esc_attr($livesay_layout_class); ?>">
			<div class="lvsy-blg">
				<?php
				if ( have_posts() ) :
					/* Start the Loop */
					while ( have_posts() ) : the_post();
						get_template_part( 'layouts/post/content' );
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
			<?php
				if ($livesay_sidebar_position !== 'sidebar-hide') {
					get_sidebar(); // Sidebar
				}
			?>
	</div>
</div>

<?php
get_footer();
