<?php
/**
 * VictorTheme Custom Changes :Changed Overall Structure
*/

/**
 * Day View Single Event
 * This file contains one event in the day view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/day/single-event.php
 *
 * @version 4.5.6
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$venue_details = tribe_get_venue_details();

// Venue microformats
$has_venue = ( $venue_details ) ? ' vcard' : '';
$has_venue_address = ( ! empty( $venue_details['address'] ) ) ? ' location' : '';

?>

<!-- Custom Chnage : Rearrange the location of image and contents & wrapped img with row and col-md-6 div -->
<!-- Event Image -->
<div class="row">
<div class="col-md-6">
<?php echo tribe_event_featured_image( null, 'large' ); ?><!-- Custom Change : Changed image size to large -->
</div>
<!-- Custom Change : Wrapped all other contents with div 'col-md-6' -->
<div class="col-md-6">
<!-- Event Title -->
<?php do_action( 'tribe_events_before_the_event_title' ) ?>
<h2 class="tribe-events-list-event-title summary">
	<a class="url" href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="<?php esc_attr(the_title_attribute()) ?>" rel="bookmark">
		<?php esc_attr(the_title()); ?>
	</a>
</h2>
<?php do_action( 'tribe_events_after_the_event_title' ) ?>
<!-- Event Meta -->
<?php do_action( 'tribe_events_before_the_meta' ) ?>
<!-- Custom Chnage : Rearrange the cost and location  -->
<?php if ( tribe_get_cost() ) : ?>
	<div class="tribe-events-event-cost">
		<span class="ticket-cost"><?php echo tribe_get_cost( null, true ); ?></span>
		<?php
		/** This action is documented in the-events-calendar/src/views/list/single-event.php */
		do_action( 'tribe_events_inside_cost' )
		?>
	</div>
<?php endif; ?>

<div class="tribe-events-event-meta <?php echo esc_attr( $has_venue . $has_venue_address ); ?>">

	<!-- Schedule & Recurrence Details -->
	<div class="tribe-updated published time-details">
		<?php echo tribe_events_event_schedule_details(); ?>
	</div>

	<?php if ( $venue_details ) : ?>
		<!-- Venue Display Info -->
		<div class="tribe-events-venue-details">
			<?php echo implode( ', ', $venue_details ); ?>
		</div> <!-- .tribe-events-venue-details -->
	<?php endif; ?>

</div><!-- .tribe-events-event-meta -->

<?php do_action( 'tribe_events_after_the_meta' ) ?>

<!-- Event Content -->
<?php do_action( 'tribe_events_before_the_content' ) ?>
<div class="tribe-events-list-event-description tribe-events-content description entry-summary">
	<?php echo tribe_events_get_the_excerpt(); ?>
	<a href="<?php echo esc_url( tribe_get_event_link() ); ?>" class="tribe-events-read-more" rel="bookmark"><?php esc_html_e( 'Find out more', 'livesay' ) ?> &raquo;</a>
</div><!-- .tribe-events-list-event-description -->
</div>
</div>
<?php
do_action( 'tribe_events_after_the_content' );
