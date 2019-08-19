<?php
/* ==========================================================
  Services
=========================================================== */
if ( !function_exists('lvsy_travel_direction_function')) {
  function lvsy_travel_direction_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'start_txt'  => '',
      'end_txt'  => '',
      'hide_driving'  => '',
      'hide_bicylcing'  => '',
      'hide_public'  => '',
      'hide_walking'  => '',
      'btn_txt'  => '',
      'class'  => '',

    ), $atts));

    $start_txt = $start_txt ? $start_txt : esc_html__('Start Point:', 'livesay-core');
    $end_txt = $end_txt ? $end_txt : esc_html__('End Point:', 'livesay-core');
    $btn_txt = $btn_txt ? $btn_txt : esc_html__('Get Me to the Venues', 'livesay-core');

    // Turn output buffer on
    ob_start(); ?>
<div class="lvsy-travel-info">
  <form action="//maps.google.co.uk/maps" method="get" target="_blank">
    <div class="row">
      <div class="col-md-6 col-sm-6">
      <p>
        <label for="saddr"><?php echo $start_txt; ?></label>
        <input id="saddr" name="saddr" type="text" placeholder="<?php echo esc_html__('Enter Start Point', 'livesay-core'); ?>" value="" />
      </p>
      </div>
      <div class="col-md-6 col-sm-6">
        <p>
          <label for="daddr"><?php echo $end_txt; ?></label>
          <input name="daddr" type="text" placeholder="<?php echo esc_html__('Enter End Point', 'livesay-core'); ?>" />
        </p>
      </div>
      <div class="col-md-12 col-sm-12">
      <p> <span class="wpcf7-form-control-wrap radio-769"> <span class="wpcf7-form-control wpcf7-radio wpcf7-exclusive-radio">
      <?php if(!$hide_driving) { ?>
      <span class="wpcf7-list-item first">
        <label> <span class="radio-icon-wrap">
          <input name="dirflg" value="d" type="radio">
          <span class="radio-icon"></span> </span> <span class="wpcf7-list-item-label"><?php echo esc_html__('Driving', 'livesay-core'); ?></span> </label>
      </span>

      <?php }
      if(!$hide_bicylcing) { ?>
        <span class="wpcf7-list-item">
          <label> <span class="radio-icon-wrap">
            <input name="dirflg" value="b" type="radio">
            <span class="radio-icon"></span> </span> <span class="wpcf7-list-item-label"><?php echo esc_html__('Bicylcing', 'livesay-core'); ?></span> </label>
        </span>
      <?php }
      if(!$hide_public) { ?>
        <span class="wpcf7-list-item">
          <label> <span class="radio-icon-wrap">
            <input name="dirflg" value="r" type="radio">
            <span class="radio-icon"></span> </span> <span class="wpcf7-list-item-label"><?php echo esc_html__('Public Transport', 'livesay-core'); ?></span> </label>
        </span>
      <?php }
      if(!$hide_walking) { ?>
      <span class="wpcf7-list-item">
      <label> <span class="radio-icon-wrap">
        <input name="dirflg" value="w" type="radio">
        <span class="radio-icon"></span> </span> <span class="wpcf7-list-item-label"><?php echo esc_html__('Walking', 'livesay-core'); ?></span> </label>
      </span>
      <?php } ?>
      </span>
      </span> </p>
      </div>
      <div class="col-md-12 col-sm-12">
        <p>
          <input type="submit" value="<?php echo $btn_txt; ?>" />
          <input name="hl" type="hidden" value="en" />
        </p>
      </div>
    </div>
  </form>
</div>

   <?php // Return outbut buffer
    return ob_get_clean();

  }
}
add_shortcode( 'lvsy_travel_direction', 'lvsy_travel_direction_function' );
