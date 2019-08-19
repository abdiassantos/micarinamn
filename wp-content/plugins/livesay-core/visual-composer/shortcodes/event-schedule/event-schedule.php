<?php
/* ==========================================================
  Sponsors
=========================================================== */
if ( !function_exists('livesay_schedule_function')) {
  function livesay_schedule_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'schedule_style'  => '',
      'schedule_items'  => '',
      'class'  => '',
      // Style
      'title_color'  => '',
      'title_size'  => '',
      'border_color'  => '',
    ), $atts));

    // Group Field
    $schedule_items = (array) vc_param_group_parse_atts( $schedule_items );
    $get_each_list = array();
    foreach ( $schedule_items as $schedule_item ) {
      $each_list = $schedule_item;
      $each_list['author_name'] = isset( $schedule_item['author_name'] ) ? $schedule_item['author_name'] : '';
      $each_list['author_link'] = isset( $schedule_item['author_link'] ) ? $schedule_item['author_link'] : '';
      $each_list['author_time'] = isset( $schedule_item['author_time'] ) ? $schedule_item['author_time'] : '';
      $each_list['time_in'] = isset( $schedule_item['time_in'] ) ? $schedule_item['time_in'] : '';
      $each_list['place_title'] = isset( $schedule_item['place_title'] ) ? $schedule_item['place_title'] : '';
      $each_list['place'] = isset( $schedule_item['place'] ) ? $schedule_item['place'] : '';
      $each_list['topic_title'] = isset( $schedule_item['topic_title'] ) ? $schedule_item['topic_title'] : '';
      $each_list['topic_link'] = isset( $schedule_item['topic_link'] ) ? $schedule_item['topic_link'] : '';
      $each_list['topic_speaker'] = isset( $schedule_item['topic_speaker'] ) ? $schedule_item['topic_speaker'] : '';
      $each_list['speaker_designation'] = isset( $schedule_item['speaker_designation'] ) ? $schedule_item['speaker_designation'] : '';
      $each_list['topic_content'] = isset( $schedule_item['topic_content'] ) ? $schedule_item['topic_content'] : '';
      $each_list['duration_icon'] = isset( $schedule_item['duration_icon'] ) ? $schedule_item['duration_icon'] : '';
      $each_list['topic_duration'] = isset( $schedule_item['topic_duration'] ) ? $schedule_item['topic_duration'] : '';
      $each_list['location_icon'] = isset( $schedule_item['location_icon'] ) ? $schedule_item['location_icon'] : '';
      $each_list['topic_location'] = isset( $schedule_item['topic_location'] ) ? $schedule_item['topic_location'] : '';
      $each_list['topic_location_link'] = isset( $schedule_item['topic_location_link'] ) ? $schedule_item['topic_location_link'] : '';
      $get_each_list[] = $each_list;
    }
    if($schedule_style === 'style_two') {
      $schld_cls = ' schedule-style-two';
    } else {
      $schld_cls = '';
    }

    $output ='<div class="lvsy-event-schedule '.$schld_cls.' '.$class.'"><div class="event-menu">';

    // Group Param Output
    foreach ( $get_each_list as $each_list ) {

      $author_link = $each_list['author_link'] ? '<a href="'.$each_list['author_link'].'">'.$each_list['author_name'].'</a>' : '<span>'.$each_list['author_name'].'</span>';
      $author_name = $each_list['author_name'] ? $author_link : '';
      $author_time = $each_list ['author_time'] ? '<span>'.$each_list['author_time'].' <em>'.$each_list['time_in'].'</em></span>' : '';
      $place_title = $each_list ['place_title'] ? '<span class="event-room">'.$each_list ['place_title'].'</span>' : '';
      $place = $each_list ['place'] ? ''.$each_list ['place'].'' : '';
      $topic_link = $each_list['topic_link'] ? '<div class="event-title"><a href="'.$each_list['topic_link'].'">'.$each_list['topic_title'].'</a></div>' : '<div class="event-title">'.$each_list['topic_title'].'</div>';
      $topic_title = $each_list['topic_title'] ? $topic_link : '';
      $speaker_designation = $each_list['speaker_designation'] ? '<span class="speaker-designation">'.$each_list['speaker_designation'].'</span>' : '';
      $topic_speaker = $each_list['topic_speaker'] ? '<div class="speaker-name">'.$each_list['topic_speaker'].' '.$each_list['speaker_designation'].'</div>' : '';
      $topic_content = $each_list['topic_content'] ? '<p>'.$each_list['topic_content'].'</p>' : '';
      $duration_icon = $each_list['duration_icon'] ? '<i class="'.$each_list['duration_icon'].'" aria-hidden="true"></i>'  : '<i class="fa fa-clock-o" aria-hidden="true"></i>';
      $topic_duration = $each_list['topic_duration'] ? '<span>'.$duration_icon.''.$each_list['topic_duration'].'</span>' : '';
      $location_icon = $each_list['location_icon'] ? '<i class="'.$each_list['location_icon'].'" aria-hidden="true"></i>'  : '<i class="fa fa-map-marker" aria-hidden="true"></i>';
      $topic_location_link = $each_list['topic_location_link'] ? '<a href="'.$each_list['topic_location_link'].'" target="_blank">'.$location_icon.' '.$each_list['topic_location'].'</a>' : ''.$location_icon.' '.$each_list['topic_location'].'';
      $topic_location =$each_list['topic_location'] ? $topic_location_link : '';

        if($schedule_style === 'style_two') {
          $output .= '<div class="event-item"><div class="event-time">'.$author_time.'</div><div class="event-info"><div class="event-title">'.$each_list['topic_title'].''.$topic_speaker.'</div><div class="event-info-wrap">'.$topic_content.'';

          if($topic_duration || $topic_location) {
            $output .= '<div class="event-address"> '.$topic_duration.' '.$topic_location.' </div>';
          }
            $output .= '</div></div></div>';

        } else {
          $output .= '<div class="event-item"><div class="row"><div class="col-md-6 col-sm-6"><div class="event-speaker"><div class="speaker-name">'.$author_name.'</div><p>'.$author_time.' <span>'.$place_title.' '.$place.'</span></p></div></div><div class="col-md-6 col-sm-6"><div class="event-info">'.$topic_title.''.$topic_speaker.''.$topic_content.'';

          if($topic_duration || $topic_location) {
              $output .= '<div class="event-address"> '.$topic_duration.' '.$topic_location.'</div>';
          }

          $output .= '</div></div></div></div>';
        }

    }

    $output .= '</div></div>';

    return $output;
  }
}
add_shortcode( 'livesay_schedule', 'livesay_schedule_function' );
