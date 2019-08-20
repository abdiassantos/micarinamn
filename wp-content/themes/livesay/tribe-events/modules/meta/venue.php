<?php
/**
 * VictorTheme Custom Changes
*/

/**
 * Single Event Meta (Venue) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/venue.php
 *
 * @package TribeEventsCalendar
 */

if ( ! tribe_get_venue_id() ) {
	return;
}

$phone   = tribe_get_phone();
$website = tribe_get_venue_website_link();

?>

<div class="tribe-events-meta-group tribe-events-meta-group-venue">
	<h3 class="tribe-events-single-section-title"> <?php livesay_tribe_get_venue_label_singular(); ?> </h3>
	<dl>
		<?php do_action( 'tribe_events_single_meta_venue_section_start' ) ?>
    <!-- Custom Change : Removed tribe venue -->

		<?php if ( tribe_address_exists() ) : ?>
			<dd class="tribe-venue-location">
				<address class="tribe-events-address">
					<?php echo tribe_get_full_address(); ?>

					<?php if ( tribe_show_google_map_link() ) : ?>
						<?php echo tribe_get_map_link_html(); ?>
					<?php endif; ?>
				</address>
			</dd>
		<?php endif; ?>
    <!-- Custom Change : Wrapped phone no & Website in one div -->
    <div class="lvsy-event-contact-info">
		<?php if ( ! empty( $phone ) ): ?>
			<!-- Custom Change : Removed dt/dd and added span tags And changed Phone text to T -->
			<span><span> <?php esc_html_e( 'T:', 'livesay' ) ?></span>
			<a href="tel:<?php echo esc_url($phone); ?>"> <?php echo esc_attr($phone); ?></a> </span>
		<?php endif ?>

		<?php if ( ! empty( $website ) ): ?>
			<!-- Custom Change : Removed dt/dd and added span tags -->
			<span><span> <?php esc_html_e( 'Website:', 'livesay' ) ?> </span>
			<?php echo esc_url($website); ?></span>
		<?php endif ?>
		</div>

		<?php do_action( 'tribe_events_single_meta_venue_section_end' ) ?>
	</dl>
</div>
