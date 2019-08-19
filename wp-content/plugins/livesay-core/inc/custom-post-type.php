<?php

/**
 * Initialize Custom Post Type - Livesay Theme
 */

function livesay_custom_post_type() {

	// Speakers - Start
	$speaker_slug = 'speaker';
	$speakers = __('Speakers', 'livesay-core');

	// Register custom post type - Speakers
	register_post_type('speakers',
		array(
			'labels' => array(
				'name' => $speakers,
				'singular_name' => sprintf(esc_html__('%s Post', 'livesay-core' ), $speakers),
				'all_items' => sprintf(esc_html__('%s', 'livesay-core' ), $speakers),
				'add_new' => esc_html__('Add New', 'livesay-core') ,
				'add_new_item' => sprintf(esc_html__('Add New %s', 'livesay-core' ), $speakers),
				'edit' => esc_html__('Edit', 'livesay-core') ,
				'edit_item' => sprintf(esc_html__('Edit %s', 'livesay-core' ), $speakers),
				'new_item' => sprintf(esc_html__('New %s', 'livesay-core' ), $speakers),
				'view_item' => sprintf(esc_html__('View %s', 'livesay-core' ), $speakers),
				'search_items' => sprintf(esc_html__('Search %s', 'livesay-core' ), $speakers),
				'not_found' => esc_html__('Nothing found in the Database.', 'livesay-core') ,
				'not_found_in_trash' => esc_html__('Nothing found in Trash', 'livesay-core') ,
				'parent_item_colon' => ''
			) ,
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			// 'menu_position' => 10,
			'show_in_menu' => 'livesay_post_type',
			'menu_icon' => 'dashicons-businessman',
			'rewrite' => array(
				'slug' => $speaker_slug,
				'with_front' => false
			),
			'has_archive' => true,
			'taxonomies'  => array( 'category' ),
			'capability_type' => 'post',
			'hierarchical' => true,
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'excerpt',
				'revisions',
				'sticky',
			)
		)
	);
	// Speakers - End

	// sponsor - Start
	$sponsor_slug = 'sponsor';
	$sponsor = __('sponsors', 'livesay-core');

	// Register custom post type - sponsor
	register_post_type('sponsor',
		array(
			'labels' => array(
				'name' => $sponsor,
				'singular_name' => sprintf(esc_html__('%s Post', 'livesay-core' ), $sponsor),
				'all_items' => sprintf(esc_html__('%s', 'livesay-core' ), $sponsor),
				'add_new' => esc_html__('Add New', 'livesay-core') ,
				'add_new_item' => sprintf(esc_html__('Add New %s', 'livesay-core' ), $sponsor),
				'edit' => esc_html__('Edit', 'livesay-core') ,
				'edit_item' => sprintf(esc_html__('Edit %s', 'livesay-core' ), $sponsor),
				'new_item' => sprintf(esc_html__('New %s', 'livesay-core' ), $sponsor),
				'view_item' => sprintf(esc_html__('View %s', 'livesay-core' ), $sponsor),
				'search_items' => sprintf(esc_html__('Search %s', 'livesay-core' ), $sponsor),
				'not_found' => esc_html__('Nothing found in the Database.', 'livesay-core') ,
				'not_found_in_trash' => esc_html__('Nothing found in Trash', 'livesay-core') ,
				'parent_item_colon' => ''
			) ,
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			// 'menu_position' => 10,
			'show_in_menu' => 'livesay_post_type',
			'menu_icon' => 'dashicons-businessman',
			'rewrite' => array(
				'slug' => $sponsor_slug,
				'with_front' => false
			),
			'has_archive' => true,
			'taxonomies'  => array( 'category' ),
			'capability_type' => 'post',
			'hierarchical' => true,
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'excerpt',
				'revisions',
				'sticky',
			)
		)
	);
	// sponsor - End

	// Testimonials - Start
	$testimonial_slug = 'testimonial';
	$testimonials = __('Testimonials', 'livesay-core');

	// Register custom post type - Testimonials
	register_post_type('testimonial',
		array(
			'labels' => array(
				'name' => $testimonials,
				'singular_name' => sprintf(esc_html__('%s Post', 'livesay-core' ), $testimonials),
				'all_items' => sprintf(esc_html__('%s', 'livesay-core' ), $testimonials),
				'add_new' => esc_html__('Add New', 'livesay-core') ,
				'add_new_item' => sprintf(esc_html__('Add New %s', 'livesay-core' ), $testimonials),
				'edit' => esc_html__('Edit', 'livesay-core') ,
				'edit_item' => sprintf(esc_html__('Edit %s', 'livesay-core' ), $testimonials),
				'new_item' => sprintf(esc_html__('New %s', 'livesay-core' ), $testimonials),
				'view_item' => sprintf(esc_html__('View %s', 'livesay-core' ), $testimonials),
				'search_items' => sprintf(esc_html__('Search %s', 'livesay-core' ), $testimonials),
				'not_found' => esc_html__('Nothing found in the Database.', 'livesay-core') ,
				'not_found_in_trash' => esc_html__('Nothing found in Trash', 'livesay-core') ,
				'parent_item_colon' => ''
			) ,
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'rewrite' => array(
				'slug' => $testimonial_slug,
				'with_front' => false
			),
			'has_archive' => true,
			'capability_type' => 'post',
			'hierarchical' => true,
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'revisions',
				'sticky',
			)
		)
	);
	// Testimonials - End

		// gallery - Start
	$gallery_slug = 'gallery';
	$gallery = __('Gallery', 'livesay-core');

	// Register custom post type - gallery
	register_post_type('gallery',
		array(
			'labels' => array(
				'name' => $gallery,
				'singular_name' => sprintf(esc_html__('%s Post', 'livesay-core' ), $gallery),
				'all_items' => sprintf(esc_html__('%s', 'livesay-core' ), $gallery),
				'add_new' => esc_html__('Add New', 'livesay-core') ,
				'add_new_item' => sprintf(esc_html__('Add New %s', 'livesay-core' ), $gallery),
				'edit' => esc_html__('Edit', 'livesay-core') ,
				'edit_item' => sprintf(esc_html__('Edit %s', 'livesay-core' ), $gallery),
				'new_item' => sprintf(esc_html__('New %s', 'livesay-core' ), $gallery),
				'view_item' => sprintf(esc_html__('View %s', 'livesay-core' ), $gallery),
				'search_items' => sprintf(esc_html__('Search %s', 'livesay-core' ), $gallery),
				'not_found' => esc_html__('Nothing found in the Database.', 'livesay-core') ,
				'not_found_in_trash' => esc_html__('Nothing found in Trash', 'livesay-core') ,
				'parent_item_colon' => ''
			) ,
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			// 'menu_position' => 10,
			'menu_icon' => 'dashicons-format-gallery',
			'rewrite' => array(
				'slug' => $gallery_slug,
				'with_front' => false
			),
			'has_archive' => true,
			'taxonomies'  => array( 'category' ),
			'capability_type' => 'post',
			'hierarchical' => true,
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'excerpt',
				'revisions',
				'sticky',
			)
		)
	);
	// gallery - End

	// Template - Start
	$template_slug = 'template';
	$template = __('Template', 'livesay-core');

	// Register custom post type - template
	register_post_type('template',
		array(
			'labels' => array(
				'name' => $template,
				'singular_name' => sprintf(esc_html__('%s Post', 'livesay-core' ), $template),
				'all_items' => sprintf(esc_html__('%s', 'livesay-core' ), $template),
				'add_new' => esc_html__('Add New', 'livesay-core') ,
				'add_new_item' => sprintf(esc_html__('Add New %s', 'livesay-core' ), $template),
				'edit' => esc_html__('Edit', 'livesay-core') ,
				'edit_item' => sprintf(esc_html__('Edit %s', 'livesay-core' ), $template),
				'new_item' => sprintf(esc_html__('New %s', 'livesay-core' ), $template),
				'view_item' => sprintf(esc_html__('View %s', 'livesay-core' ), $template),
				'search_items' => sprintf(esc_html__('Search %s', 'livesay-core' ), $template),
				'not_found' => esc_html__('Nothing found in the Database.', 'livesay-core') ,
				'not_found_in_trash' => esc_html__('Nothing found in Trash', 'livesay-core') ,
				'parent_item_colon' => ''
			) ,
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_icon' => 'dashicons-welcome-write-blog',
			'rewrite' => array(
				'slug' => $template_slug,
				'with_front' => false
			),
			'has_archive' => true,
			'taxonomies'  => array( 'category' ),
			'capability_type' => 'post',
			'hierarchical' => true,
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'excerpt',
				'revisions',
				'sticky',
			)
		)
	);
	// Template - End

}

// Post Type - Menu
add_action('admin_menu', 'livesay_speakers_admin_menu');
function livesay_speakers_admin_menu() {
  add_submenu_page('edit.php?post_type=tribe_events', 'Speakers', 'Speakers', 'manage_options', 'edit.php?post_type=speakers');
}
add_action('admin_menu', 'livesay_sponsor_admin_menu');
function livesay_sponsor_admin_menu() {
  add_submenu_page('edit.php?post_type=tribe_events', 'Sponsor', 'Sponsor', 'manage_options', 'edit.php?post_type=sponsor');
}

// After Theme Setup
function livesay_custom_flush_rules() {
	// Enter post type function, so rewrite work within this function
	livesay_custom_post_type();
	// Flush it
	flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'livesay_custom_flush_rules');
add_action('init', 'livesay_custom_post_type');

/* ---------------------------------------------------------------------------
 * Custom columns - Testimonial
 * --------------------------------------------------------------------------- */
add_filter("manage_edit-testimonial_columns", "livesay_testimonial_edit_columns");
function livesay_testimonial_edit_columns($columns) {
  $new_columns['cb'] = '<input type="checkbox" />';
  $new_columns['title'] = __('Title', 'livesay-core' );
  $new_columns['thumbnail'] = __('Image', 'livesay-core' );
  $new_columns['name'] = __('Client Name', 'livesay-core' );
  $new_columns['date'] = __('Date', 'livesay-core' );

  return $new_columns;
}

add_action('manage_testimonial_posts_custom_column', 'livesay_manage_testimonial_columns', 10, 2);
function livesay_manage_testimonial_columns( $column_name ) {
  global $post;

  switch ($column_name) {

    /* If displaying the 'Image' column. */
    case 'thumbnail':
      echo get_the_post_thumbnail( $post->ID, array( 100, 100) );
    break;

    case "name":
    	$testimonial_options = get_post_meta( get_the_ID(), 'testimonial_options', true );
      echo $testimonial_options['testi_name'];
    break;

    /* Just break out of the switch statement for everything else. */
    default :
      break;
    break;

  }
}

/* ---------------------------------------------------------------------------
 * Custom columns - speaker
 * --------------------------------------------------------------------------- */
add_filter("manage_edit-speaker_columns", "livesay_speaker_edit_columns");
function livesay_speaker_edit_columns($columns) {
  $new_columns['cb'] = '<input type="checkbox" />';
  $new_columns['title'] = __('Title', 'livesay-core' );
  $new_columns['thumbnail'] = __('Image', 'livesay-core' );
  $new_columns['name'] = __('Job Position', 'livesay-core' );
  $new_columns['date'] = __('Date', 'livesay-core' );

  return $new_columns;
}

add_action('manage_speaker_posts_custom_column', 'livesay_manage_speaker_columns', 10, 2);
function livesay_manage_speaker_columns( $column_name ) {
  global $post;

  switch ($column_name) {

    /* If displaying the 'Image' column. */
    case 'thumbnail':
      echo get_the_post_thumbnail( $post->ID, array( 100, 100) );
    break;

    case "name":
    	$speaker_options = get_post_meta( get_the_ID(), 'speaker_options', true );
      echo $speaker_options['speaker_job_position'];
    break;

    /* Just break out of the switch statement for everything else. */
    default :
      break;
    break;

  }
}
