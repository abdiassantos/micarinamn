<?php
// Logo Image
$livesay_brand_logo_default = cs_get_option('brand_logo_default');
$livesay_brand_logo_retina = cs_get_option('brand_logo_retina');

// Mobile Logo
$livesay_mobile_logo = cs_get_option('mobile_logo_retina');
$livesay_mobile_width = cs_get_option('mobile_logo_width');
$livesay_mobile_height = cs_get_option('mobile_logo_height');
$livesay_mobile_logo_top = cs_get_option('mobile_logo_top');
$livesay_mobile_logo_bottom = cs_get_option('mobile_logo_bottom');
$livesay_mobile_class = $livesay_mobile_logo ? ' hav-mobile-logo' : ' dhve-mobile-logo';

// Transparent Header Logos
$livesay_transparent_logo = cs_get_option('transparent_logo_default');
$livesay_transparent_retina = cs_get_option('transparent_logo_retina');

// Metabox - Header Transparent
$livesay_id    = ( isset( $post ) ) ? $post->ID : false;
$livesay_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $livesay_id;
$livesay_id    = ( livesay_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $livesay_id;
$livesay_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $livesay_id : false;
$livesay_meta  = get_post_meta( $livesay_id, 'page_type_metabox', true );
if ($livesay_meta) {
  $livesay_transparent_header  = $livesay_meta['transparency_header'];
} else {
  $livesay_transparent_header  = cs_get_option('transparent_header');
}

if($livesay_transparent_header){
$transparent_default_class = $livesay_transparent_logo ? ' hav-transparent-logo' : ' dhav-transparent-logo';
$transparent_retina_class = $livesay_transparent_retina ? ' hav-transparent-retina' : ' dhav-transparent-retina';
} else {
	$transparent_default_class = '';
	$transparent_retina_class = '';
}

// Retina Size
$livesay_retina_width = cs_get_option('retina_width');
$livesay_retina_height = cs_get_option('retina_height');

// Logo Spacings
$livesay_brand_logo_top = cs_get_option('brand_logo_top');
$livesay_brand_logo_bottom = cs_get_option('brand_logo_bottom');
if ($livesay_mobile_logo_top) {
	$livesay_brand_logo_top = 'padding-top:'. livesay_check_px($livesay_mobile_logo_top) .';';
} elseif ($livesay_brand_logo_top !== '') {
	$livesay_brand_logo_top = 'padding-top:'. livesay_check_px($livesay_brand_logo_top) .';';
} else { $livesay_brand_logo_top = ''; }
if ($livesay_mobile_logo_bottom) {
	$livesay_brand_logo_bottom = 'padding-bottom:'. livesay_check_px($livesay_mobile_logo_bottom) .';';
} elseif ($livesay_brand_logo_bottom !== '') {
	$livesay_brand_logo_bottom = 'padding-bottom:'. livesay_check_px($livesay_brand_logo_bottom) .';';
} else { $livesay_brand_logo_bottom = ''; }

$retina_width_actual = $livesay_retina_width ? 'width='.$livesay_retina_width.'' : '';
$retina_height_actual = $livesay_retina_height ? 'height='.$livesay_retina_height.'' : '';
$livesay_mobile_width_actual = $livesay_mobile_width ? 'width='.$livesay_mobile_width.'' : '';
$livesay_mobile_height_actual = $livesay_mobile_height ? 'height='.$livesay_mobile_height.'' : '';
?>

<div class="lvsy-logo <?php echo esc_attr($livesay_mobile_class); ?><?php echo esc_attr($transparent_default_class . $transparent_retina_class); ?>" style="<?php echo esc_attr($livesay_brand_logo_top); echo esc_attr($livesay_brand_logo_bottom); ?>">
	<a href="<?php echo esc_url(home_url( '/' )); ?>">
	<?php
	if (isset($livesay_transparent_header) && isset($livesay_transparent_logo)) {
		if (isset($livesay_transparent_logo)){
			if (isset($livesay_transparent_retina)){
				echo '<img src="'. esc_url(wp_get_attachment_url($livesay_transparent_retina)) .'" '. esc_attr($retina_width_actual) .' '. esc_attr($retina_height_actual) .' alt="" class="transparent-retina-logo transparent-logo">';
			}
			echo '<img src="'. esc_url(wp_get_attachment_url($livesay_transparent_logo)) .'" alt="" class="transparent-default-logo transparent-logo" '. esc_attr($retina_width_actual) .' '. esc_attr($retina_height_actual) .'>';
		} elseif (isset($livesay_brand_logo_default)){
			if ($livesay_brand_logo_retina){
				echo '<img src="'. esc_url(wp_get_attachment_url($livesay_brand_logo_retina)) .'" '. esc_attr($retina_width_actual) .''. esc_attr($retina_height_actual) .' alt="" class="retina-logo">
					';
			}
			if ($livesay_mobile_logo){
			echo '<img src="'. esc_url(wp_get_attachment_url($livesay_mobile_logo)) .'" '. esc_attr($livesay_mobile_width_actual) .' '. esc_attr($livesay_mobile_height_actual) .' alt="" class="mobile-logo">
				';
		}
			echo '<img src="'. esc_url(wp_get_attachment_url($livesay_brand_logo_default)) .'" alt="" class="default-logo" '. esc_attr($retina_width_actual) .' '. esc_attr($retina_height_actual) .'>';
		} else {
			echo '<div class="text-logo"><h2>'. esc_attr(get_bloginfo( 'name' )) . '</h2></div>';
		}
		if (isset($livesay_brand_logo_default)){
			if ($livesay_brand_logo_retina){
				echo '<img src="'. esc_url(wp_get_attachment_url($livesay_brand_logo_retina)) .'" '. esc_attr($retina_width_actual) .' '. esc_attr($retina_height_actual) .' alt="" class="retina-logo sticky-logo">
					';
			}
			if ($livesay_mobile_logo){
			echo '<img src="'. esc_url(wp_get_attachment_url($livesay_mobile_logo)) .'" '. esc_attr($livesay_mobile_width_actual) .' '. esc_attr($livesay_mobile_height_actual) .' alt="" class="mobile-logo">
				';
		}
			echo '<img src="'. esc_url(wp_get_attachment_url($livesay_brand_logo_default)) .'" alt="" class="default-logo sticky-logo" '. esc_attr($retina_width_actual) .' '. esc_attr($retina_height_actual) .'>';
		}
	} elseif (isset($livesay_brand_logo_default)){
		if ($livesay_brand_logo_retina){
			echo '<img src="'. esc_url(wp_get_attachment_url($livesay_brand_logo_retina)) .'" '. esc_attr($retina_width_actual) .' '. esc_attr($retina_height_actual) .' alt="" class="retina-logo">
				';
		}
		if ($livesay_mobile_logo){
			echo '<img src="'. esc_url(wp_get_attachment_url($livesay_mobile_logo)) .'" '. esc_attr($livesay_mobile_width_actual) .' '. esc_attr($livesay_mobile_height_actual) .' alt="" class="mobile-logo">
				';
		}
		echo '<img src="'. esc_url(wp_get_attachment_url($livesay_brand_logo_default)) .'" alt="" class="default-logo" '. esc_attr($retina_width_actual) .' '. esc_attr($retina_height_actual) .'>';
	} else {
		echo '<div class="text-logo"><h2>'. esc_attr(get_bloginfo( 'name' )) . '</h2></div>';
	}
	echo '</a>';
	?>
</div>
