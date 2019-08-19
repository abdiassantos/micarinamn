<?php
/* ==========================================================
  Services
=========================================================== */
if ( !function_exists('livesay_conference_function')) {
  function livesay_conference_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'conference_style'  => '',
      'conference_event'  => '',
      'cfrce_title'  => '',
      'title_caption'  => '',
      'conference_image'  => '',
      'img_align'  => '',
      'ticket_txt'  => '',
      'ticket_link'  => '',
      'open_link'  => '',
      'class'  => '',
      'countdown_format' => '',

      // Plural Label
      'label_years' => '',
      'label_months' => '',
      'label_weeks' => '',
      'label_days' => '',
      'label_hours' => '',
      'label_minutes' => '',
      'label_seconds' => '',
      // Singular Label
      'label_year' => '',
      'label_month' => '',
      'label_week' => '',
      'label_day' => '',
      'label_hour' => '',
      'label_minute' => '',
      'label_second' => '',

      // Style
      'title_color'  => '',
      'title_size'  => '',
      'title_caption_color' => '',
      'title_caption_size' => '',
      'content_color' => '',
      'content_size' => '',
      'btn_bg_color' => '',
      'btn_hover_color' => '',
      'btn_txt_color' => '',
      'btn_txt_hover_color' => '',
    ), $atts));

    // fix unclosed/unwanted paragraph tags in $content
    $content = wpb_js_remove_wpautop($content, true);

    // Shortcode Style CSS
    $e_uniqid       = uniqid();
    $inline_style   = '';

    // Colors & Size
    if ( $title_color || $title_size) {
      $inline_style .= '.conference-'.$e_uniqid.' .conference-title, .conference-'.$e_uniqid.' .lvsy-conference.conference-style-three .conference-title {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'. livesay_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $title_caption_color || $title_caption_size) {
      $inline_style .= '.conference-'.$e_uniqid.' .conference-sub-title {';
      $inline_style .= ( $title_caption_color ) ? 'color:'. $title_caption_color .';' : '';
      $inline_style .= ( $title_caption_size ) ? 'font-size:'. livesay_check_px($title_caption_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $content_color || $content_size) {
      $inline_style .= '.conference-'.$e_uniqid.' .conference-location, .conference-'.$e_uniqid.' p {';
      $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
      $inline_style .= ( $content_size ) ? 'font-size:'. livesay_check_px($content_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $btn_bg_color || $btn_txt_color ) {
      $inline_style .= '.conference-'.$e_uniqid.' a.lvsy-btn, .conference-'.$e_uniqid.' .buy-ticket-link {';
      $inline_style .= ( $btn_bg_color ) ? 'background-color:'. $btn_bg_color .';' : '';
      $inline_style .= ( $btn_txt_color ) ? 'color:'. $btn_txt_color .';' : '';
      $inline_style .= '}';
    }
    if ( $btn_hover_color || $btn_txt_hover_color ) {
      $inline_style .= '.conference-'.$e_uniqid.' a.lvsy-btn:hover, .conference-'.$e_uniqid.' .buy-ticket-link a:hover {';
      $inline_style .= ( $btn_hover_color ) ? 'background-color:'. $btn_hover_color .';' : '';
      $inline_style .= ( $btn_txt_hover_color ) ? 'color:'. $btn_txt_hover_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    livesay_add_inline_style( $inline_style );
    $styled_class  = ' conference-'. $e_uniqid;

    $countdown_format = $countdown_format ? $countdown_format : '';
    // Plural Labels
    $label_years = $label_years ? $label_years : esc_html__('Years','ceremony-core');
    $label_months = $label_months ? $label_months : esc_html__('Months','ceremony-core');
    $label_weeks = $label_weeks ? $label_weeks : esc_html__('Weeks','ceremony-core');
    $label_days = $label_days ? $label_days : esc_html__('Days','ceremony-core');
    $label_hours = $label_hours ? $label_hours : esc_html__('Hours','ceremony-core');
    $label_minutes = $label_minutes ? $label_minutes : esc_html__('Minutes','ceremony-core');
    $label_seconds = $label_seconds ? $label_seconds : esc_html__('Seconds','ceremony-core');

    // Singular Labels
    $label_year = $label_year ? $label_year : esc_html__('Year','ceremony-core');
    $label_month = $label_month ? $label_month : esc_html__('Month','ceremony-core');
    $label_week = $label_week ? $label_week : esc_html__('Week','ceremony-core');
    $label_day = $label_day ? $label_day : esc_html__('Day','ceremony-core');
    $label_hour = $label_hour ? $label_hour : esc_html__('Hour','ceremony-core');
    $label_minute = $label_minute ? $label_minute : esc_html__('Minute','ceremony-core');
    $label_second = $label_second ? $label_second : esc_html__('Second','ceremony-core');

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
      // other query params here,
      'paged' => $my_page,
      'post_type' => 'tribe_events',
      'p'   => $conference_event
    );

    $livesay_post = new WP_Query( $args );

    // Title
    $con_title = $cfrce_title ? '<h2 class="conference-title">'.$cfrce_title.'</h2>' : '';
    $con_title_cap = $title_caption ? '<h4 class="conference-sub-title">'.$title_caption.'</h4>' : '';

    // Link Target
    $open_link = $open_link ? 'target="_blank"' : '';
    if($conference_style === 'livesay-conference-three') {
      $ticket_link = $ticket_link ? '<a href="'.$ticket_link.'" '.$open_link.'>'.$ticket_txt.'</a>' : '<span>'.$ticket_txt.'</span>';
    } else {
      $ticket_link = $ticket_link ? '<a href="'.$ticket_link.'" class="lvsy-btn" '.$open_link.'>'.$ticket_txt.'</a>' : '<span class="lvsy-btn">'.$ticket_txt.'</span>';
    }
      $ticket_txt = $ticket_txt ? $ticket_link : '';

    // Conference Image
    $image_url = wp_get_attachment_url( $conference_image );
    $conference_image_main = $conference_image ? '<img src="'.$image_url.'" alt="">' : '';
      if ($conference_style === 'livesay-conference-two') {
        $con_class = ' conference-style-two';
      } elseif($conference_style === 'livesay-conference-three') {
        $con_class = ' conference-style-three';
      } elseif($conference_style === 'livesay-conference-four') {
        $con_class = ' conference-style-four';
      } else {
        $con_class = '';
      }

    if ($livesay_post->have_posts()) : while ($livesay_post->have_posts()) : $livesay_post->the_post();
      $data_date = 'data-date="'.tribe_get_start_date( null, false, 'm/ j/ Y' ).' '.tribe_get_start_date( null, false, 'g:i').'"';
      $data_id = 'data-id="'.get_the_ID().'"';
      $output = '';
      $output .= '<div class="lvsy-conference '.$class.''.$con_class.' '.$styled_class.'" '.$data_id.'><div class="container">';
      $uniqid = get_the_ID();
       if ($conference_style === 'livesay-conference-two') {
        if($img_align === 'right') {
            $img_cls = 'pull-right';
            $cnt_cls = 'pull-left';
          } else {
            $img_cls = 'pull-left';
            $cnt_cls = 'pull-right';
          }

          $output .= '<div class="conference-wrap"><div class="conference-img '.$img_cls.'">'.$conference_image_main.'</div><div class="conference-info '.$cnt_cls.'"><h2 class="conference-title">'.esc_attr(get_the_title()).'</h2><p>'.get_the_excerpt().'</p><div class="clearfix">'.$ticket_txt.'</div></div></div></div>';
       } elseif($conference_style === 'livesay-conference-three') {
          $output .= '<div class="row"><div class="col-md-6"><div class="conference-title-wrap"><h2 class="conference-title">'.esc_attr(get_the_title()).'</h2>'.$con_title_cap.'</div><p>'.get_the_excerpt().'</p></div><div class="col-md-6 text-center"><div class="pull-right"><div class="lvsy-count-'.$uniqid.' lvsy-countdown" '.$data_date.' '.$data_id.' data-years="'.$label_years.'" data-months="'.$label_months.'" data-weeks="'.$label_weeks.'" data-days="'.$label_days.'" data-hours="'.$label_hours.'" data-minutes="'.$label_minutes.'" data-seconds="'.$label_seconds.'" data-year="'.$label_year.'" data-month="'.$label_month.'" data-week="'.$label_week.'" data-day="'.$label_day.'" data-hour="'.$label_hour.'" data-minute="'.$label_minute.'" data-second="'.$label_second.'" data-format="'.$countdown_format.'"></div><div class="conference-location">'.livesay_tribe_events_event_schedule_details().''.esc_html__(' in ','livesay').''.tribe_get_venue().'</div><div class="buy-ticket-link">'.$ticket_txt.'</div></div></div></div>';
       } elseif($conference_style === 'livesay-conference-four') {
          $output .= '<div class="lvsy-container"><div class="conference-title-wrap">'.$con_title.'</div><div class="conference-location">'.livesay_tribe_events_event_schedule_details().''.esc_html__(' in ','livesay').''.tribe_get_venue().'</div><div class="lvsy-count-'.$uniqid.' lvsy-countdown" '.$data_date.' '.$data_id.' data-years="'.$label_years.'" data-months="'.$label_months.'" data-weeks="'.$label_weeks.'" data-days="'.$label_days.'" data-hours="'.$label_hours.'" data-minutes="'.$label_minutes.'" data-seconds="'.$label_seconds.'" data-year="'.$label_year.'" data-month="'.$label_month.'" data-week="'.$label_week.'" data-day="'.$label_day.'" data-hour="'.$label_hour.'" data-minute="'.$label_minute.'" data-second="'.$label_second.'" data-format="'.$countdown_format.'"></div><div class="clearfix">'.$ticket_txt.'</div></div>';
       } else {
          $output .= '<div class="lvsy-container"><div class="conference-title-wrap">'.$con_title_cap.'<h2 class="conference-title">'.esc_attr(get_the_title()).'</h2></div><p>'.get_the_excerpt().'</p><div class="conference-location">'.livesay_tribe_events_event_schedule_details().''.esc_html__(' in ','livesay').''.tribe_get_venue().'</div><div class="lvsy-count-'.$uniqid.' lvsy-countdown" '.$data_date.' '.$data_id.' data-years="'.$label_years.'" data-months="'.$label_months.'" data-weeks="'.$label_weeks.'" data-days="'.$label_days.'" data-hours="'.$label_hours.'" data-minutes="'.$label_minutes.'" data-seconds="'.$label_seconds.'" data-year="'.$label_year.'" data-month="'.$label_month.'" data-week="'.$label_week.'" data-day="'.$label_day.'" data-hour="'.$label_hour.'" data-minute="'.$label_minute.'" data-second="'.$label_second.'" data-format="'.$countdown_format.'"></div><div class="clearfix">'.$ticket_txt.'</div></div>';
       }

       $output .= '</div></div>';
    endwhile;
    endif;
    wp_reset_postdata();

    return $output;
  }
}
add_shortcode( 'livesay_conference', 'livesay_conference_function' );
