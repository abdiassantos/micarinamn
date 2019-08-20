<?php
// Metabox

$livesay_title_bar_padding = '';
// Padding - Theme Options
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
$bg_type = cs_get_option('bg_type');
$livesay_bg_overlay_color = cs_get_option('speaker_titlebar_bg_overlay_color');

// Speakers
if( 'speakers' == get_post_type() ) {
	$livesay_bg_overlay_color = cs_get_option('speaker_titlebar_bg_overlay_color');
	$bg_type = cs_get_option('speaker_bg_type');
	if($bg_type !== 'transparent') {
		$speaker_title_bgg = cs_get_option('speaker_titlebar_bg');
		if ($speaker_title_bgg) {
			extract( $speaker_title_bgg );
			$livesay_background_image       = ( ! empty( $image ) ) ? 'background-image: url(' . $image . ');' : '';
			$livesay_background_repeat      = ( ! empty( $image ) && ! empty( $repeat ) ) ? ' background-repeat: ' . $repeat . ';' : '';
			$livesay_background_position    = ( ! empty( $image ) && ! empty( $position ) ) ? ' background-position: ' . $position . ';' : '';
			$livesay_background_size    = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-size: ' . $size . ';' : '';
			$livesay_background_attachment    = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-attachment: ' . $attachment . ';' : '';
			$livesay_background_color       = ( ! empty( $color ) ) ? ' background-color: ' . $color . ';' : '';
			$livesay_background_style       = ( ! empty( $image ) ) ? $livesay_background_image . $livesay_background_repeat . $livesay_background_position . $livesay_background_size . $livesay_background_attachment : '';

			$livesay_title_bg = ( ! empty( $livesay_background_style ) || ! empty( $livesay_background_color ) ) ? $livesay_background_style . $livesay_background_color : '';
		} else {
			$bg_type = cs_get_option('bg_type');
		  if($bg_type !== 'transparent') {
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
		}
		$title_style_cls = '';
	} else {
		$title_style_cls = 'title-style-two';
		$livesay_title_bg = '';
	}
} elseif( is_post_type_archive('sponsor') ) {
	$livesay_bg_overlay_color = cs_get_option('sponsor_titlebar_bg_overlay_color');
	$bg_type = cs_get_option('sponsor_bg_type');
	if($bg_type !== 'transparent') {
		$sponsor_title_bgg = cs_get_option('sponsor_titlebar_bg');
		if (isset($sponsor_title_bgg)) {
		extract( $sponsor_title_bgg );

		$livesay_background_image       = ( ! empty( $image ) ) ? 'background-image: url(' . $image . ');' : '';
		$livesay_background_repeat      = ( ! empty( $image ) && ! empty( $repeat ) ) ? ' background-repeat: ' . $repeat . ';' : '';
		$livesay_background_position    = ( ! empty( $image ) && ! empty( $position ) ) ? ' background-position: ' . $position . ';' : '';
		$livesay_background_size    = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-size: ' . $size . ';' : '';
		$livesay_background_attachment    = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-attachment: ' . $attachment . ';' : '';
		$livesay_background_color       = ( ! empty( $color ) ) ? ' background-color: ' . $color . ';' : '';
		$livesay_background_style       = ( ! empty( $image ) ) ? $livesay_background_image . $livesay_background_repeat . $livesay_background_position . $livesay_background_size . $livesay_background_attachment : '';

		$livesay_title_bg = ( ! empty( $livesay_background_style ) || ! empty( $livesay_background_color ) ) ? $livesay_background_style . $livesay_background_color : '';
		} else {
		  if($bg_type !== 'transparent') {
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
			} }
		  $livesay_title_bg = '';
		}
	} else {
		$livesay_title_bg = '';
	}
} elseif( is_post_type_archive('gallery') ) {
	$livesay_bg_overlay_color = cs_get_option('gallery_titlebar_bg_overlay_color');
	$bg_type = cs_get_option('gallery_bg_type');
	if($bg_type !== 'transparent') {
		$gallery_title_bgg = cs_get_option('gallery_titlebar_bg');
		if (isset($gallery_title_bgg)) {
		extract( $gallery_title_bgg );

		$livesay_background_image       = ( ! empty( $image ) ) ? 'background-image: url(' . $image . ');' : '';
		$livesay_background_repeat      = ( ! empty( $image ) && ! empty( $repeat ) ) ? ' background-repeat: ' . $repeat . ';' : '';
		$livesay_background_position    = ( ! empty( $image ) && ! empty( $position ) ) ? ' background-position: ' . $position . ';' : '';
		$livesay_background_size    = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-size: ' . $size . ';' : '';
		$livesay_background_attachment    = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-attachment: ' . $attachment . ';' : '';
		$livesay_background_color       = ( ! empty( $color ) ) ? ' background-color: ' . $color . ';' : '';
		$livesay_background_style       = ( ! empty( $image ) ) ? $livesay_background_image . $livesay_background_repeat . $livesay_background_position . $livesay_background_size . $livesay_background_attachment : '';

		$livesay_title_bg = ( ! empty( $livesay_background_style ) || ! empty( $livesay_background_color ) ) ? $livesay_background_style . $livesay_background_color : '';
		} else {
		  if($bg_type !== 'transparent') {
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
			} }
		  $livesay_title_bg = '';
		}
	} else {
		$livesay_title_bg = '';
	}
} else {
	if($bg_type !== 'transparent') {
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
		}
	} else {
		$livesay_title_bg = '';
	}
	$livesay_title_bg = '';
}

if ($livesay_bg_overlay_color) {
	$livesay_overlay_color = 'background-color: '. $livesay_bg_overlay_color .'';
} else {
	$livesay_overlay_color = '';
}

$need_title_bar = cs_get_option('need_title_bar');
$need_breadcrumbs = cs_get_option('need_breadcrumbs');
if($need_title_bar){
	if($bg_type === 'transparent') {
		$title_style_cls = 'title-style-two';
	} else {
	  $title_style_cls = '';
	} ?>
<section class="lvsy-page-title lvsy-parallax <?php echo esc_attr($title_style_cls);?>" data-parallax="scroll" style="<?php echo esc_attr($livesay_custom_padding .$livesay_title_bg .$livesay_overlay_color); ?>">
  <div class="page-title-wrap <?php echo esc_attr($livesay_title_bar_padding); ?>">
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
