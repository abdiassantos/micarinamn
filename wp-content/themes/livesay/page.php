<?php
/*
 * The template for displaying all pages.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
// Metabox
if( function_exists( 'get_events' ) ) {
if(tribe_is_event()) {
	// Plugin is active
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

	get_header();
	get_template_part( 'layouts/header/title', 'bar' );?>
		<div class="container">
			<div class="row">
				<div class="lvsy-content-side">
					<?php
						while ( have_posts() ) : the_post();
							the_content();
							// If comments are open or we have at least one comment, load up the comment template.
							if ( (comments_open() || get_comments_number()) ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
					?>
				</div><!-- Content Area -->
			</div>
		</div>

	<?php
	} else {
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
$above_footer_option = get_post_meta( get_the_ID(), 'above_footer_option', true );
if ($above_footer_option) {
	$above_footer_widget = $above_footer_option['above_footer_widget'];
} else {
  $above_footer_widget = '';
}

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
	$above_footer_widget = '';
}

get_header();
get_template_part( 'layouts/header/title', 'bar' );?>

<div class="<?php echo esc_attr($livesay_layout_class .' '. $livesay_content_padding .' '. $livesay_sidebar_class); ?> lvsy-content-area" style="<?php echo esc_attr($livesay_custom_padding); ?>">
	<div class="row">
		<?php
			// Left Sidebar
			if($livesay_page_layout === 'left-sidebar') {
	   		get_sidebar();
			}
		?>
		<div class="lvsy-content-side <?php echo esc_attr($livesay_column_class); ?>">
			<?php
				while ( have_posts() ) : the_post();
					the_content();
					// If comments are open or we have at least one comment, load up the comment template.
					if ( (comments_open() || get_comments_number()) ) :
						comments_template();
					endif;
				endwhile; // End of the loop.
			?>
		</div><!-- Content Area -->
		<?php
			// Right Sidebar
			if($livesay_page_layout === 'right-sidebar') {
				get_sidebar();
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
}
} else {
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
$above_footer_option = get_post_meta( get_the_ID(), 'above_footer_option', true );
if ($above_footer_option) {
	$above_footer_widget = $above_footer_option['above_footer_widget'];
} else {
  $above_footer_widget = '';
}

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
	$above_footer_widget = '';
}

get_header();
get_template_part( 'layouts/header/title', 'bar' );?>

<div class="<?php echo esc_attr($livesay_layout_class .' '. $livesay_content_padding .' '. $livesay_sidebar_class); ?> lvsy-content-area" style="<?php echo esc_attr($livesay_custom_padding); ?>">
	<div class="row">
		<?php
		// Left Sidebar
		if($livesay_page_layout === 'left-sidebar') {
   		get_sidebar();
		}
		?>
		<div class="lvsy-content-side <?php echo esc_attr($livesay_column_class); ?>">
			<?php
				while ( have_posts() ) : the_post();
					the_content();
					// If comments are open or we have at least one comment, load up the comment template.
					if ( (comments_open() || get_comments_number()) ) :
						comments_template();
					endif;
				endwhile; // End of the loop.
			?>
		</div><!-- Content Area -->
		<?php
			// Right Sidebar
			if($livesay_page_layout === 'right-sidebar') {
				get_sidebar();
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
}
get_footer();
