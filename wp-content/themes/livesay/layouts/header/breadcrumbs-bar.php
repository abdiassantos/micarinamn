<?php
$livesay_id    = ( isset( $post ) ) ? $post->ID : 0;
$livesay_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $livesay_id;
$livesay_id    = ( livesay_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $livesay_id;
$livesay_meta  = get_post_meta( $livesay_id, 'page_type_metabox', true );
if ($livesay_meta && is_page()) {
	$livesay_hide_breadcrumbs  = $livesay_meta['hide_breadcrumbs'];
} else { $livesay_hide_breadcrumbs = ''; }
if (!$livesay_hide_breadcrumbs) { // Hide Breadcrumbs
?>
<!-- Breadcrumbs -->
<?php if(!$livesay_hide_breadcrumbs) { ?>
<div class="container-fluid lvsy-breadcrumbs">
  <div class="row">

    <div class="container">
    <div class="row">

      <?php if ( function_exists( 'breadcrumb_trail' ) ) breadcrumb_trail(); ?>

    </div>
    </div>

  </div>
</div>
<!-- Breadcrumbs -->
<?php } }// Hide Breadcrumbs ?>