<?php
/*
 * The template for displaying all single sponsor.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
get_header();
get_template_part( 'layouts/header/title', 'bar' );
// Metabox
$livesay_id    = ( isset( $post ) ) ? $post->ID : 0;
$livesay_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $livesay_id;
$livesay_id    = ( livesay_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $livesay_id;
$livesay_id    = ( 'sponsor' == get_post_type() ) ? get_the_ID() : $livesay_id;
$livesay_meta  = get_post_meta( $livesay_id, 'page_type_metabox', true );
$sponsor_options = get_post_meta( get_the_ID(), 'sponsor_options', true );

$above_footer_option = get_post_meta( get_the_ID(), 'above_footer_option', true );
if ($above_footer_option) {
  $above_footer_widget = $above_footer_option['above_footer_widget'];
} else {
  $above_footer_widget = '';
}

if ($livesay_meta) {
	$livesay_content_padding = $livesay_meta['content_spacings'];
} else {
	$livesay_content_padding = '';
}

if ($sponsor_options) {
	$sponsor_type = $sponsor_options['sponsor_type'];
	$sponsor_type_link = $sponsor_options['sponsor_type_link'];
	$sponsor_website = $sponsor_options['sponsor_website'];
	$sponsor_website_link = $sponsor_options['sponsor_website_link'];
	$sponsor_quote = $sponsor_options['sponsor_quote'];
	$sponsor_socials = $sponsor_options['social_icons'];
  $sponsor_contact = $sponsor_options['sponsor_contact'];
  $sponsor_contact_link = $sponsor_options['sponsor_contact_link'];
} else {
	$sponsor_type = '';
	$sponsor_type_link = '';
	$sponsor_website = '';
	$sponsor_website_link = '';
	$sponsor_quote = '';
	$sponsor_socials = '';
}

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
?>
<div class="lvsy-main-wrap <?php echo esc_attr($livesay_content_padding); ?>" style="<?php echo esc_attr($livesay_custom_padding); ?>">
  <div class="container">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="lvsy-donor-detail">
      <div class="lvsy-primary">
        <div class="lvsy-donor-info">
          <h4><?php esc_attr(the_title()); ?></h4>
          <h5><?php echo esc_attr($sponsor_quote); ?></h5>
          <p><?php the_content(); ?></p>
        </div>
      </div>
      <div class="lvsy-secondary">
        <div class="lvsy-donor-profile">
          <div class="lvsy-donor-logo"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
          <ul>
            <?php if ( ! empty( $sponsor_type ) ) {
              $sponsor_type_txt = cs_get_option('sponsor_type');
              if ($sponsor_type_txt) {
                $type_txt = $sponsor_type_txt;
              } else {
                $type_txt = esc_html__('Type', 'livesay');
              }
            ?>
              <li><span class="lvsy-donor-lable"><?php echo esc_attr($type_txt); ?></span>
                <?php
                  if ($sponsor_type_link) {
                    echo '<a href="'.esc_url($sponsor_type_link).'">'.esc_attr($sponsor_type).'</a>';
                  } else {
                    echo '<span>'.esc_attr($sponsor_type).'</span>';
                  }
                ?>
              </li>
            <?php } ?>
            <?php if ( ! empty( $sponsor_website ) ) {
              $sponsor_website_txt = cs_get_option('sponsor_website');
              if ($sponsor_website_txt) {
                $website_txt = $sponsor_website_txt;
              } else {
                $website_txt = esc_html__('Website', 'livesay');
              }
            ?>
            <li><span class="lvsy-donor-lable"><?php echo esc_attr($website_txt); ?></span>
              <?php if ($sponsor_website_link) { ?>
                <a href="<?php echo esc_url($sponsor_website_link); ?>" target="_blank"><?php echo esc_attr($sponsor_website); ?></a>
              <?php } else { ?>
                <span class="spkr-website"><?php echo esc_attr($sponsor_website); ?></span>
              <?php } ?>
            </li>
            <?php }
            if ( ! empty( $sponsor_socials ) ) {
              $sponsor_follow_txt = cs_get_option('sponsor_follow');
              if ($sponsor_follow_txt) {
                $follow_txt = $sponsor_follow_txt;
              } else {
                $follow_txt = esc_html__('Follow', 'livesay');
              }
            ?>
            <li> <span class="lvsy-donor-lable"><?php echo esc_attr($follow_txt); ?></span>
            <span class="lvsy-social">
              <?php foreach ( $sponsor_socials as $social ) {
              	if ($social['icon']) {
                  if($social['icon_link']) {
                    echo '<a href="'.esc_url($social['icon_link']).'"><i class="'.esc_attr($social['icon']).'" aria-hidden="true"></i></a>';
                  } else {
                    echo '<span><i class="'.esc_attr($social['icon']).'" aria-hidden="true"></i></span>';
                  }
                }
              	?>
              <?php }  ?>
            </span> </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
    <?php
			endwhile;
			endif;
		?>
  </div>
</div>
<?php
  if($above_footer_widget) {
    if (is_active_sidebar('above-footer')) {
      dynamic_sidebar('above-footer');
    }
  }
get_footer();
