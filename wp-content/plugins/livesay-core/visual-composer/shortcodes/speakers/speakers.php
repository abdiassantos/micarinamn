<?php
/* Speaker */
if ( !function_exists('livesay_speaker_function')) {
  function livesay_speaker_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'speaker_style'   => '',
      'speaker_column'  => '',
      'class'  => '',
      // Listing
      'speaker_limit'  => '',
      'speaker_id'  => '',
      'speaker_show_category' => '',
      'speaker_order'  => '',
      'speaker_orderby'  => '',
      'speaker_pagination'  => '',
      'disable_crop' => '',
      'speaker_social_icon' => '',
      // Color & Style
      'name_color'  => '',
      'profession_color'  => '',
      'name_hover_color'  => '',
      'name_size'  => '',
      'profession_size'  => '',
      'social_color'  => '',
      'social_hover_color'  => '',
    ), $atts));

    // Shortcode Style CSS
    $e_uniqid       = uniqid();
    $inline_style   = '';

    // Name Color
    if ( $name_color || $name_size ) {
      $inline_style .= '.lvsy-speaker-'. $e_uniqid .' .speaker-name a, .lvsy-speaker-'. $e_uniqid .'.speakers-style-three .speaker-info .speaker-name a {';
      $inline_style .= ( $name_color ) ? 'color:'. $name_color .';' : '';
      $inline_style .= ( $name_size ) ? 'font-size:'. livesay_core_check_px($name_size) .';' : '';
      $inline_style .= '}';
    }

    // Name Hover color
    if ( $name_hover_color ) {
      $inline_style .= '.lvsy-speaker-'. $e_uniqid .' .speaker-name a:hover, .lvsy-speaker-'. $e_uniqid .'.speakers-style-three .speaker-info .speaker-name a:hover {';
      $inline_style .= ( $name_hover_color ) ? 'color:'. $name_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Social Icon Color
    if ( $social_color ) {
      $inline_style .= '.lvsy-speaker-'. $e_uniqid .' .lvsy-social a, .lvsy-speaker-'. $e_uniqid .'.speakers-style-three .lvsy-social a {';
      $inline_style .= ( $social_color ) ? 'color:'. $social_color .';' : '';
      $inline_style .= '}';
    }
    if ( $social_hover_color ) {
      $inline_style .= '.lvsy-speaker-'. $e_uniqid .' .lvsy-social a:hover, .lvsy-speaker-'. $e_uniqid .'.speakers-style-three .lvsy-social a:hover {';
      $inline_style .= ( $social_hover_color ) ? 'color:'. $social_hover_color .';' : '';
      $inline_style .= '}';
    }
    // Profession Color
    if ( $profession_color || $profession_size ) {
      $inline_style .= '.lvsy-speaker-'. $e_uniqid .' .speaker-designation {';
      $inline_style .= ( $profession_color ) ? 'color:'. $profession_color .';' : '';
      $inline_style .= ( $profession_size ) ? 'font-size:'. livesay_core_check_px($profession_size) .';' : '';
      $inline_style .= '}';
    }

    // Add inline style
    livesay_add_inline_style( $inline_style );
    $styled_class  = ' lvsy-speaker-'. $e_uniqid;

    // speaker Column
    $speaker_column = $speaker_column ? $speaker_column : 'col-lg-4';

    // Speaker style
    if($speaker_style === 'style_two'){
      $speak_style_cls = 'speakers-style-two';
    } elseif($speaker_style === 'style_three'){
      $speak_style_cls = 'speakers-style-three';
    } else {
      $speak_style_cls = '';
    }
    // Turn output buffer on
    ob_start();

    // Show ID
    if ($speaker_id) {
      $speaker_id = explode(',',$speaker_id);
    } else {
      $speaker_id = '';
    }

    // Query Starts Here
    // Pagination
    global $paged;
    if( get_query_var( 'paged' ) )
      $my_page = get_query_var( 'paged' );
    else {
      if( get_query_var( 'page' ) )
        $my_page = get_query_var( 'page' );
      else
        $my_page = 1;
      set_query_var( 'paged', $my_page );
      $paged = $my_page;
    }

    $args = array(
      'paged' => $my_page,
      'post_type' => 'speakers',
      'posts_per_page' => (int)$speaker_limit,
      'category_name' => esc_attr($speaker_show_category),
      'orderby' => $speaker_orderby,
      'order' => $speaker_order,
      'post__in' => $speaker_id,
    );

    $lvsy_speaker_qury = new WP_Query( $args );

    if ($lvsy_speaker_qury->have_posts()) :
    ?>

  <div class="lvsy-speakers <?php echo $styled_class .' ' .$speak_style_cls. ' '. $class; ?>"> <!-- speaker Starts -->
    <div class="row">

      <?php
      while ($lvsy_speaker_qury->have_posts()) : $lvsy_speaker_qury->the_post();

      // Link
      $speaker_options = get_post_meta( get_the_ID(), 'speakers_options', true );
      $speaker_socials = $speaker_options['social_icons'];
      $speaker_pro = $speaker_options['speakers_designation'];
      $speaker_pro = $speaker_pro ? '<div class="speaker-designation">'.$speaker_pro.'</div>' : '';

      // Featured Image
      $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
      $large_image = $large_image[0];
      $abt_title = get_the_title();
      if(!$disable_crop) {
        if($speaker_style === 'style_three'){
          if(class_exists('Aq_Resize')) {
            $actual_img = aq_resize( $large_image, '212', '212', true );
          } else {
            $actual_img = $large_image;
          }
        } elseif($speaker_style === 'style_two'){
          if(class_exists('Aq_Resize')) {
            $actual_img = aq_resize( $large_image, '520', '420', true );
          } else {
            $actual_img = $large_image;
          }
        } else {
          if(class_exists('Aq_Resize')) {
            $actual_img = aq_resize( $large_image, '277', '270', true );
          } else {
            $actual_img = $large_image;
          }
        }
      } else {
        $actual_img = $large_image;
      }

      if($speaker_style === 'style_three'){ ?>
      <div class="<?php echo $speaker_column; ?>">
        <div class="speaker-item">
          <div class="speaker-picture"><?php echo '<img src="'. esc_url($actual_img) .'" alt="'.esc_attr($abt_title).'">'; ?>
          <?php if($speaker_social_icon) { ?>
            <div class="lvsy-social">
              <div class="lvsy-table-container">
                <div class="lvsy-align-container">
                  <?php
                    if ( ! empty( $speaker_socials ) ) {
                    foreach ( $speaker_socials as $social ) {
                  ?>
                    <a href="<?php echo $social['icon_link']; ?>"><i class="<?php echo $social['icon']; ?>" aria-hidden="true"></i></a>
                  <?php } } ?>
                </div>
              </div>
            </div>
          <?php } ?>
          </div>
          <div class="speaker-info">
            <div class="speaker-name"><a href="<?php echo esc_url(get_permalink()); ?>" class="speaker-name"><?php echo $abt_title; ?></a></div>
            <?php echo $speaker_pro; ?>
          </div>
        </div>
      </div>

      <?php } else { ?>
        <div class="<?php echo $speaker_column; ?>">
          <div class="speaker-item">
            <div class="speaker-picture"><?php echo '<img src="'. esc_url($actual_img) .'" alt="'.esc_attr($abt_title).'">'; ?></div>
            <div class="speaker-info">
              <div class="lvsy-table-container">
                <div class="lvsy-align-container">
                  <div class="speaker-name"><a href="<?php echo esc_url(get_permalink()); ?>" class="speaker-name"><?php echo esc_attr($abt_title); ?></a></div>
                  <?php if($speaker_social_icon) { ?>
                  <div class="lvsy-social">
                    <?php
                      if ( ! empty( $speaker_socials ) ) {
                      foreach ( $speaker_socials as $social ) {
                    ?>
                      <a href="<?php echo $social['icon_link']; ?>"><i class="<?php echo $social['icon']; ?>" aria-hidden="true"></i></a>
                    <?php } } ?>
                  </div>
                <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>

      <?php endwhile; ?>

    </div>
  </div><!-- speaker End -->

<?php
  endif;

  if ($speaker_pagination) {
      livesay_paging_nav();
      wp_reset_postdata();  // avoid errors further down the page
  }
  wp_reset_postdata();  // avoid errors further down the page

  // Return outbut buffer
  return ob_get_clean();

  }
}
add_shortcode( 'livesay_speaker', 'livesay_speaker_function' );
