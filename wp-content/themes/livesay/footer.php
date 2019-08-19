<?php
/*
 * The template for displaying the footer.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
$padding_top = cs_get_option( 'padding_top' );
$padding_bottom = cs_get_option( 'padding_bottom' );
if ($padding_top) {
  $foot_padding_top = 'padding-top:'. livesay_check_px($padding_top) .';';
} else {
  $foot_padding_top = '';
}
if ($padding_bottom) {
  $foot_padding_bottom = 'padding-bottom:'. livesay_check_px($padding_bottom) .';';
} else {
  $foot_padding_bottom = '';
}

$livesay_id    = ( isset( $post ) ) ? $post->ID : 0;
$livesay_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $livesay_id;
$livesay_id    = ( livesay_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $livesay_id;
$livesay_meta  = get_post_meta( $livesay_id, 'page_type_metabox', true );

if ($livesay_meta) {
  $livesay_hide_footer  = $livesay_meta['hide_footer'];
} else { $livesay_hide_footer = ''; }
if (!$livesay_hide_footer) { // Hide Footer Metabox
  if (!is_active_sidebar('footer-1') && !is_active_sidebar('footer-2') && !is_active_sidebar('footer-3') && !is_active_sidebar('footer-4')) {
    $foo_cls = ' dhav-widget';
  } else {
    $foo_cls = '';
  }
?>
  <!-- Livesay footer -->
  <footer class="lvsy-footer <?php echo esc_attr($foo_cls); ?>" style="<?php echo esc_attr($foot_padding_top); echo esc_attr($foot_padding_bottom); ?>">
    <?php
      $footer_widget_block = cs_get_option('footer_widget_block');
      if (isset($footer_widget_block)) {
        // Footer Widget Block
        get_template_part( 'layouts/footer/footer', 'widgets' );
      }
    ?>
  </footer>
  <!-- Livesay copyright -->
  <?php $need_copyright = cs_get_option('need_copyright');
    if (isset($need_copyright)) {
    // Copyright Block
    get_template_part( 'layouts/footer/footer', 'copyright' );
  }
}
?>
<!-- Livesay back top -->
<div class="lvsy-back-top"> <a href="#0"><i class="fa fa-angle-up" aria-hidden="true"></i></a> </div>
</div><!-- #vtheme-wrapper -->
</div><!-- body under div -->
<?php wp_footer(); ?>
</body>
</html>