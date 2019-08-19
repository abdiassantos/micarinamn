<?php
/**
 * VictorTheme Custom Changes :Changed Overall Structure
*/

/**
 * Single Event Meta (Details) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/details.php
 *
 * @package TribeEventsCalendar
 */

$time_format = get_option( 'time_format', Tribe__Date_Utils::TIMEFORMAT );
$time_range_separator = tribe_get_option( 'timeRangeSeparator', ' - ' );

$start_datetime = tribe_get_start_date();
$start_date = tribe_get_start_date( null, false );
$start_time = tribe_get_start_date( null, false, $time_format );
$start_ts = tribe_get_start_date( null, false, Tribe__Date_Utils::DBDATEFORMAT );

$end_datetime = tribe_get_end_date();
$end_date = tribe_get_display_end_date( null, false );
$end_time = tribe_get_end_date( null, false, $time_format );
$end_ts = tribe_get_end_date( null, false, Tribe__Date_Utils::DBDATEFORMAT );

$time_formatted = null;
if ( $start_time == $end_time ) {
	$time_formatted = esc_attr( $start_time );
} else {
	$time_formatted = esc_attr( $start_time . $time_range_separator . $end_time );
}

$event_id = Tribe__Main::post_id_helper();

/**
 * Returns a formatted time for a single event
 *
 * @var string Formatted time string
 * @var int Event post id
 */
$time_formatted = apply_filters( 'tribe_events_single_event_time_formatted', $time_formatted, $event_id );

/**
 * Returns the title of the "Time" section of event details
 *
 * @var string Time title
 * @var int Event post id
 */
$time_title = apply_filters( 'tribe_events_single_event_time_title', esc_html__( 'Time:', 'livesay' ), $event_id );

$cost = tribe_get_formatted_cost();
$website = tribe_get_event_website_link();
?>
			<div class="event-detail-table">
          <h4><?php esc_html_e( 'Details', 'livesay' ) ?></h4>
          <?php
		do_action( 'tribe_events_single_meta_details_section_start' );

		// All day (multiday) events
		// if ( tribe_event_is_all_day() && tribe_event_is_multiday() ) :
			?>
			<!-- Custom Change : Included date cost & category in table format And Removed default structure -->
      <div class="lvsy-responsive-table">
        <table>
          <tbody>
            <tr>
              <th><?php esc_html_e( 'Start', 'livesay' ) ?></th>
              <th><?php esc_html_e( 'End', 'livesay' ) ?></th>
              <?php if ( tribe_get_cost() ) : ?>
              <th><?php esc_html_e( 'Cost', 'livesay' ) ?></th>
              <?php endif; ?>
              <th><?php esc_html_e( 'Category', 'livesay' ) ?></th>
            </tr>
            <tr>
            <!-- Custom Change : Changed date format -->
              <td><?php echo tribe_get_start_date( null, false, 'F j, Y' ); ?> <?php echo tribe_get_start_date( null, false, 'g:ia' ); ?></td>
              <td><?php echo tribe_get_end_date( null, false, 'F j, Y' ); ?> <?php echo tribe_get_end_date( null, false, 'g:ia');  ?></td>
              <?php if ( tribe_get_cost() ) : ?>
              <td><?php echo tribe_get_cost( null, true ) ?></td>
              <?php endif; ?>
              <td class="event-categories">
	              <span>
		              <?php
										echo tribe_get_event_categories(
											get_the_id(), array(
												'before'       => '',
												'sep'          => ', ',
												'after'        => '',
												'label'        => '', // An appropriate plural/singular label will be provided

											)
										);
									?>
								</span>
							</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
