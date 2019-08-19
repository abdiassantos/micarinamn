<?php
// Metabox
$livesay_id    = ( isset( $post ) ) ? $post->ID : false;
$livesay_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $livesay_id;
$livesay_id    = ( livesay_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $livesay_id;
$livesay_meta  = get_post_meta( $livesay_id, 'page_type_metabox', true );
if (($livesay_meta && is_page()) || ($livesay_meta && is_single($post->ID)) || ($livesay_meta && livesay_is_woocommerce_shop())) {
	$livesay_title_bar_padding = $livesay_meta['title_area_spacings'];
	$bg_type = $livesay_meta['bg_type'];
} else {
	$livesay_title_bar_padding = '';
  $bg_type = cs_get_option('bg_type');
}

if ($livesay_meta) {
  $transparency_header  = $livesay_meta['transparency_header'];
} else {
  $transparency_header  = cs_get_option('transparent_header');
}

if($livesay_meta && $livesay_meta['transparency_header']){
  $transparency_header = $livesay_meta['transparency_header'];
} else {
  $transparency_header = cs_get_option('transparent_header');
}

$livesay_transparency_title_class = $transparency_header ? 'transparent-titlr-bar ' : '';

// Padding - Theme Options
if ($livesay_title_bar_padding && $livesay_title_bar_padding !== 'padding-none') {
	$livesay_title_top_spacings = $livesay_meta['title_top_spacings'];
	$livesay_title_bottom_spacings = $livesay_meta['title_bottom_spacings'];
	if ($livesay_title_bar_padding === 'padding-custom') {
		$livesay_title_top_spacings = $livesay_title_top_spacings ? 'padding-top:'. livesay_check_px($livesay_title_top_spacings) .';' : '';
		$livesay_title_bottom_spacings = $livesay_title_bottom_spacings ? 'padding-bottom:'. livesay_check_px($livesay_title_bottom_spacings) .';' : '';
		$livesay_custom_padding = $livesay_title_top_spacings . $livesay_title_bottom_spacings;
	} else {
		$livesay_custom_padding = '';
	}
} else {
	$livesay_title_bar_padding = cs_get_option('title_bar_padding');
	$livesay_titlebar_top_padding = cs_get_option('titlebar_top_padding');
	$livesay_titlebar_bottom_padding = cs_get_option('titlebar_bottom_padding');
	if ($livesay_title_bar_padding === 'padding-custom') {
		$livesay_titlebar_top_padding = $livesay_titlebar_top_padding ? 'padding-top:'. livesay_check_px($livesay_titlebar_top_padding) .';' : '';
		$livesay_titlebar_bottom_padding = $livesay_titlebar_bottom_padding ? 'padding-bottom:'. livesay_check_px($livesay_titlebar_bottom_padding) .';' : '';
		$livesay_custom_padding = $livesay_titlebar_top_padding . $livesay_titlebar_bottom_padding;
	} else {
		$livesay_custom_padding = '';
	}
}

// Banner Type - Meta Box
if (($livesay_meta && is_page()) || ($livesay_meta && is_single($post->ID)) || ($livesay_meta && livesay_is_woocommerce_shop())) {
	$livesay_banner_type = $livesay_meta['banner_type'];
} else { $livesay_banner_type = ''; }

// Overlay Color - Theme Options
if (($livesay_meta && is_page()) || ($livesay_meta && is_single($post->ID))) {
	$livesay_bg_overlay_color = $livesay_meta['titlebar_bg_overlay_color'];
} else { $livesay_bg_overlay_color = ''; }
if ($livesay_bg_overlay_color) {
	if ($livesay_bg_overlay_color) {
		$livesay_overlay_color = 'background-color: '. $livesay_bg_overlay_color .'';
	} else {
		$livesay_overlay_color = '';
	}
} else {
	$livesay_bg_overlay_color = cs_get_option('titlebar_bg_overlay_color');
	if ($livesay_bg_overlay_color) {
		$livesay_overlay_color = 'background-color: '. $livesay_bg_overlay_color .'';
	} else {
		$livesay_overlay_color = '';
	}
}

// Background - Type
if( $livesay_meta ) {
	if($bg_type !== 'transparent') {
	  extract( $livesay_meta['title_area_bg'] );
	  if($image) {

		  $livesay_background_image       = ( ! empty( $image ) ) ? 'background-image: url(' . $image . ');' : '';
		  $livesay_background_repeat      = ( ! empty( $image ) && ! empty( $repeat ) ) ? ' background-repeat: ' . $repeat . ';' : '';
		  $livesay_background_position    = ( ! empty( $image ) && ! empty( $position ) ) ? ' background-position: ' . $position . ';' : '';
		  $livesay_background_size    = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-size: ' . $size . ';' : '';
		  $livesay_background_attachment    = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-attachment: ' . $attachment . ';' : '';
		  $livesay_background_color       = ( ! empty( $color ) ) ? ' background-color: ' . $color . ';' : '';
		  $livesay_background_style       = ( ! empty( $image ) ) ? $livesay_background_image . $livesay_background_repeat . $livesay_background_position . $livesay_background_size . $livesay_background_attachment : '';

		  $livesay_title_bg = ( ! empty( $livesay_background_style ) || ! empty( $livesay_background_color ) ) ? $livesay_background_style . $livesay_background_color : '';
		} else {

			$title_bgg = cs_get_option('titlebar_bg');
			if($title_bgg){
				extract( $title_bgg );

			  $livesay_background_image       = ( ! empty( $image ) ) ? 'background-image: url(' . $image . ');' : '';
			  $livesay_background_repeat      = ( ! empty( $image ) && ! empty( $repeat ) ) ? ' background-repeat: ' . $repeat . ';' : '';
			  $livesay_background_position    = ( ! empty( $image ) && ! empty( $position ) ) ? ' background-position: ' . $position . ';' : '';
			  $livesay_background_size    = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-size: ' . $size . ';' : '';
			  $livesay_background_attachment    = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-attachment: ' . $attachment . ';' : '';
			  $livesay_background_color       = ( ! empty( $color ) ) ? ' background-color: ' . $color . ';' : '';
			  $livesay_background_style       = ( ! empty( $image ) ) ? $livesay_background_image . $livesay_background_repeat . $livesay_background_position . $livesay_background_size . $livesay_background_attachment : '';

			  $livesay_title_bg = ( ! empty( $livesay_background_style ) || ! empty( $livesay_background_color ) ) ? $livesay_background_style . $livesay_background_color : '';
			} else {
				$livesay_title_bg = '';
			}
		}

	} else {
		$livesay_title_bg = '';
	}
} else {

	$title_bgg = cs_get_option('titlebar_bg');
	if($title_bgg){
		extract( $title_bgg );

	  $livesay_background_image       = ( ! empty( $image ) ) ? 'background-image: url(' . $image . ');' : '';
	  $livesay_background_repeat      = ( ! empty( $image ) && ! empty( $repeat ) ) ? ' background-repeat: ' . $repeat . ';' : '';
	  $livesay_background_position    = ( ! empty( $image ) && ! empty( $position ) ) ? ' background-position: ' . $position . ';' : '';
	  $livesay_background_size    = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-size: ' . $size . ';' : '';
	  $livesay_background_attachment    = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-attachment: ' . $attachment . ';' : '';
	  $livesay_background_color       = ( ! empty( $color ) ) ? ' background-color: ' . $color . ';' : '';
	  $livesay_background_style       = ( ! empty( $image ) ) ? $livesay_background_image . $livesay_background_repeat . $livesay_background_position . $livesay_background_size . $livesay_background_attachment : '';

	  $livesay_title_bg = ( ! empty( $livesay_background_style ) || ! empty( $livesay_background_color ) ) ? $livesay_background_style . $livesay_background_color : '';
	} else {
	  $livesay_title_bg = '';
	}
}

if($livesay_banner_type === 'hide-title-area') { // Hide Title Area
} elseif($livesay_meta && $livesay_banner_type === 'revolution-slider') { // Hide Title Area
	echo do_shortcode($livesay_meta['page_revslider']);
} else {
	$need_title_bar = cs_get_option('need_title_bar');
	$need_breadcrumbs = cs_get_option('need_breadcrumbs');
if($need_title_bar){
	if($bg_type === 'transparent') {
		$title_style_cls = 'title-style-two';
	} else {
	  $title_style_cls = '';
	} ?>
<section class="lvsy-page-title lvsy-parallax <?php echo esc_attr($title_style_cls);?> <?php echo esc_attr($livesay_banner_type); ?>" data-parallax="scroll" style="<?php echo esc_attr($livesay_title_bg .$livesay_overlay_color); ?>">
  <div class="page-title-wrap <?php echo esc_attr($livesay_transparency_title_class); ?> <?php echo esc_attr($livesay_title_bar_padding); ?>" style="<?php echo esc_attr($livesay_custom_padding); ?>">
    <div class="container">
      <h1 class="page-title"><?php echo livesay_title_area(); ?></h1>
      <?php if($need_breadcrumbs) { ?>
	      <ol class="breadcrumb">
					<?php get_template_part( 'layouts/header/breadcrumbs', 'bar' );?>
	      </ol>
      <?php } ?>
    </div>
  </div>
</section>
<?php }
}
