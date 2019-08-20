<?php
// Metabox
$livesay_id    = ( isset( $post ) ) ? $post->ID : 0;
$livesay_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $livesay_id;
$livesay_id    = ( livesay_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $livesay_id;
$livesay_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $livesay_id : false;
$livesay_meta  = get_post_meta( $livesay_id, 'page_type_metabox', true );

// Header Style - ThemeOptions & Metabox
if ($livesay_meta) {
  $livesay_sticky_header  = $livesay_meta['sticky_header'];
} else {
  $livesay_sticky_header  = cs_get_option('sticky_header');
}
if ($livesay_meta) {
  $livesay_sticky_header  = $livesay_meta['sticky_header'];
} else {
  $livesay_sticky_header  = cs_get_option('sticky_header');
}

$livesay_mobile_breakpoint = cs_get_option('mobile_breakpoint');
$livesay_breakpoint = $livesay_mobile_breakpoint ? $livesay_mobile_breakpoint : '767';

?>
<!-- Navigation & Search -->
<?php
  if ($livesay_meta) {
    $livesay_choose_menu = $livesay_meta['choose_menu'];
  } else { $livesay_choose_menu = ''; }
  $livesay_choose_menu = $livesay_choose_menu ? $livesay_choose_menu : '';

  echo '<nav class="lvsy-nav" data-starts="'. esc_attr($livesay_breakpoint).'">';
  wp_nav_menu(
    array(
      'menu'              => 'primary',
      'theme_location'    => 'primary',
      'container'         => '',
      'container_class'   => '',
      'container_id'      => '',
      'menu'              => $livesay_choose_menu,
      'menu_class'        => 'nav navbar-nav',
      'fallback_cb'       => 'livesay_wp_bootstrap_navwalker::fallback',
      'walker'            => new livesay_wp_bootstrap_navwalker()
    )
  );
  echo '</nav>';
