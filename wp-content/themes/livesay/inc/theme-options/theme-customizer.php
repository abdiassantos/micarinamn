<?php
/*
 * All customizer related options for Livesay theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

if( ! function_exists( 'livesay_vt_customizer' ) ) {
  function livesay_vt_customizer( $options ) {

	$options        = array(); // remove old options

	// Primary Color
	$options[]      = array(
	  'name'        => 'elemets_color_section',
	  'title'       => esc_html__('Primary Color', 'livesay'),
	  'settings'    => array(

	    // Fields Start
			array(
				'name'      => 'all_element_colors',
				'default'   => '#f30c74',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Elements Color', 'livesay'),
					'description'    => esc_html__('This is theme primary color, means it\'ll affect all elements that have default color of our theme primary color.', 'livesay'),
				),
			),
			array(
				'name'      => 'button_hover_colors',
				'default'   => '#df0969',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Button Hover Color', 'livesay'),
					'description'    => esc_html__('This affect all button\' hover color.', 'livesay'),
				),
			),
	    // Fields End

	  )
	);
	// Primary Color

	// Header Color
	$options[]      = array(
	  'name'        => 'header_color_section',
	  'title'       => esc_html__('02. Header Colors', 'livesay'),
	  'settings'    => array(

	    // Fields Start
	    array(
				'name'          => 'header_cart_widget',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('Header Cart Widget', 'livesay'),
					),
				),
			),
	    array(
				'name'      => 'cart_widget_bg_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Cart Counter Background Color', 'livesay'),
				),
			),
			array(
				'name'          => 'header_main_menu_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('Main Menu Colors', 'livesay'),
					),
				),
			),
			array(
				'name'      => 'header_bg_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Background Color', 'livesay'),
					'description'    => esc_html__('It will not affect transparent header', 'livesay'),
				),
			),
			array(
				'name'      => 'header_link_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Link Color', 'livesay'),
				),
			),
			array(
				'name'      => 'header_link_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Link Hover Color', 'livesay'),
				),
			),

			// Sub Menu Color
			array(
				'name'          => 'header_submenu_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('Sub-Menu Colors', 'livesay'),
					),
				),
			),
			array(
				'name'      => 'submenu_bg_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Background Color', 'livesay'),
				),
			),
			array(
				'name'      => 'submenu_border_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Border Color', 'livesay'),
				),
			),
			array(
				'name'      => 'submenu_link_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Link Color', 'livesay'),
				),
			),
			array(
				'name'      => 'submenu_link_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Link Hover Color', 'livesay'),
				),
			),
	    // Fields End

	  )
	);
	// Header Color

	// Title Bar Color
	$options[]      = array(
	  'name'        => 'titlebar_section',
	  'title'       => esc_html__('03. Title Bar Colors', 'livesay'),
    'settings'      => array(

    	// Fields Start
    	array(
				'name'          => 'titlebar_colors_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('<h2 style="margin: 0;text-align: center;">Title Colors</h2> <br /> This is common settings, if this settings not affect in your page. Please check your page metabox. You may set default settings there.', 'livesay'),
					),
				),
			),
    	array(
				'name'      => 'titlebar_title_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Title Color', 'livesay'),
				),
			),

			array(
				'name'          => 'titlebar_breadcrumbs_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('Breadcrumbs Colors', 'livesay'),
					),
				),
			),
    	array(
				'name'      => 'breadcrumbs_text_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Text Color', 'livesay'),
				),
			),
			array(
				'name'      => 'breadcrumbs_link_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Link Color', 'livesay'),
				),
			),
			array(
				'name'      => 'breadcrumbs_link_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Link Hover Color', 'livesay'),
				),
			),
	    // Fields End

	  )
	);
	// Title Bar Color

	// Content Color
	$options[]      = array(
	  'name'        => 'content_section',
	  'title'       => esc_html__('04. Content Colors', 'livesay'),
	  'description' => esc_html__('This is all about content area text and heading colors.', 'livesay'),
	  'sections'    => array(

	  	array(
	      'name'          => 'content_text_section',
	      'title'         => esc_html__('Content Text', 'livesay'),
	      'settings'      => array(

			    // Fields Start
			    array(
						'name'      => 'body_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Body & Content Color', 'livesay'),
						),
					),
					array(
						'name'      => 'body_links_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Body Links Color', 'livesay'),
						),
					),
					array(
						'name'      => 'body_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Body Links Hover Color', 'livesay'),
						),
					),
					array(
						'name'          => 'content_sidebar_section',
						'control'       => array(
							'type'        => 'cs_field',
							'options'     => array(
								'type'      => 'notice',
								'class'     => 'info',
								'content'   => esc_html__('Sidebar', 'livesay'),
							),
						),
					),
					array(
						'name'      => 'sidebar_content_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Sidebar Content Color', 'livesay'),
						),
					),
					array(
						'name'      => 'sidebar_link_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Sidebar Link Color', 'livesay'),
						),
					),
					array(
						'name'      => 'sidebar_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Sidebar Link Hover Color', 'livesay'),
						),
					),
			    // Fields End
			  )
			),

			// Text Colors Section
			array(
	      'name'          => 'content_heading_section',
	      'title'         => esc_html__('Headings', 'livesay'),
	      'settings'      => array(

	      	// Fields Start
					array(
						'name'      => 'content_heading_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Content Heading Color', 'livesay'),
						),
					),
	      	array(
						'name'      => 'sidebar_heading_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Sidebar Heading Color', 'livesay'),
						),
					),
			    // Fields End

      	)
      ),

	  )
	);
	// Content Color

	// Footer Color
	$options[]      = array(
	  'name'        => 'footer_section',
	  'title'       => esc_html__('05. Footer Colors', 'livesay'),
	  'description' => esc_html__('This is all about footer settings. Make sure you\'ve enabled your needed section at : Livesay > Theme Options > Footer ', 'livesay'),
	  'sections'    => array(

			// Footer Widgets Block
	  	array(
	      'name'          => 'footer_widget_section',
	      'title'         => esc_html__('Widget Block', 'livesay'),
	      'settings'      => array(

			    // Fields Start
					array(
			      'name'          => 'footer_widget_color_notice',
			      'control'       => array(
			        'type'        => 'cs_field',
			        'options'     => array(
			          'type'      => 'notice',
			          'class'     => 'info',
			          'content'   => esc_html__('Content Colors', 'livesay'),
			        ),
			      ),
			    ),
					array(
						'name'      => 'footer_heading_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Widget Heading Color', 'livesay'),
						),
					),
					array(
						'name'      => 'footer_text_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Widget Text Color', 'livesay'),
						),
					),
					array(
						'name'      => 'footer_link_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Widget Link Color', 'livesay'),
						),
					),
					array(
						'name'      => 'footer_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Widget Link Hover Color', 'livesay'),
						),
					),
					array(
						'name'      => 'footer_bg_color',
						'default'   => '#222327',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Background Color', 'livesay'),
						),
					),
			    // Fields End
			  )
			),
			// Footer Widgets Block

			// Footer Copyright Block
	  	array(
	      'name'          => 'footer_copyright_section',
	      'title'         => esc_html__('Copyright Block', 'livesay'),
	      'settings'      => array(

			    // Fields Start
			    array(
			      'name'          => 'footer_copyright_active',
			      'control'       => array(
			        'type'        => 'cs_field',
			        'options'     => array(
			          'type'      => 'notice',
			          'class'     => 'info',
			          'content'   => __('Make sure you\'ve enabled copyright block in : <br /> <strong>Livesay > Theme Options > Footer > Copyright Bar : Enable Copyright Block</strong>', 'livesay'),
			        ),
			      ),
			    ),
					array(
						'name'      => 'copyright_text_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Text Color', 'livesay'),
						),
					),
					array(
						'name'      => 'copyright_link_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Link Color', 'livesay'),
						),
					),
					array(
						'name'      => 'copyright_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Link Hover Color', 'livesay'),
						),
					),
					array(
						'name'      => 'copyright_bg_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Background Color', 'livesay'),
						),
					),
					array(
						'name'      => 'copyright_border_color',
						'default'   => '#cccccc',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Border Color', 'livesay'),
						),
					),

			  )
			),
			// Footer Copyright Block

	  )
	);
	// Footer Color

	return $options;

  }
  add_filter( 'cs_customize_options', 'livesay_vt_customizer' );
}