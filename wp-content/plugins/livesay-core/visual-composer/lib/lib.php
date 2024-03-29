<?php
/**
 * Visual Composer Library
 * Common Fields
 */
class LivesayLib {

	// Get Theme Name
	public static function lvsy_cat_name() {
		return __( "by VictorThemes", 'livesay-core' );
	}

	// Notice
	public static function vt_notice_field($heading, $param, $class, $group) {
		return array(
			"type"        => "notice",
			"heading"     => $heading,
			"param_name"  => $param,
			'class'       => $class,
			'value'       => '',
			"group"       => $group,
		);
	}

	// Extra Class
	public static function vt_class_option() {
		return array(
		  "type" => "textfield",
		  "heading" => __( "Extra class name", 'livesay-core' ),
		  "param_name" => "class",
		  'value' => '',
		  "description" => __( "Custom styled class name.", 'livesay-core')
		);
	}

	// ID
	public static function vt_id_option() {
		return array(
		  "type" => "textfield",
		  "heading" => __( "Element ID", 'livesay-core' ),
		  "param_name" => "id",
		  'value' => '',
		  "description" => __( "Enter your ID for this element. If you want.", 'livesay-core')
		);
	}

	// Open Link in New Tab
	public static function vt_open_link_tab() {
		return array(
			"type" => "switcher",
			"heading" => __( "Open New Tab? (Links)", 'livesay-core' ),
			"param_name" => "open_link",
			"std" => true,
			'value' => '',
			"on_text" => __( "Yes", 'livesay-core' ),
			"off_text" => __( "No", 'livesay-core' ),
		);
	}

	/**
	 * Carousel Default Options
	 */

	// Loop
	public static function vt_carousel_loop() {
		return array(
			"type" => "switcher",
			"heading" => __( "Disable Loop?", 'livesay-core' ),
			"group" => __( "Carousel", 'livesay-core' ),
			"param_name" => "carousel_loop",
			"on_text" => __( "Yes", 'livesay-core' ),
			"off_text" => __( "No", 'livesay-core' ),
			"value" => '',
			"description" => __( "Continuously moving carousel, if enabled.", 'livesay-core')
		);
	}
	// Items
	public static function vt_carousel_items() {
		return array(
		  "type" => "textfield",
			"heading" => __( "Items", 'livesay-core' ),
		  "group" => __( "Carousel", 'livesay-core' ),
		  "param_name" => "carousel_items",
		  'value' => '',
			'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
		  "description" => __( "Enter the numeric value of how many items you want in per slide.", 'livesay-core')
		);
	}
	// Margin
	public static function vt_carousel_margin() {
		return array(
		  "type" => "textfield",
			"heading" => __( "Margin", 'livesay-core' ),
		  "group" => __( "Carousel", 'livesay-core' ),
		  "param_name" => "carousel_margin",
		  'value' => '',
			'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
		  "description" => __( "Enter the numeric value of how much space you want between each carousel item.", 'livesay-core')
		);
	}
	// Dots
	public static function vt_carousel_dots() {
		return array(
		  "type" => "switcher",
			"heading" => __( "Dots", 'livesay-core' ),
		  "group" => __( "Carousel", 'livesay-core' ),
		  "param_name" => "carousel_dots",
			"on_text" => __( "Yes", 'livesay-core' ),
			"off_text" => __( "No", 'livesay-core' ),
			"value" => '',
			'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
		  "description" => __( "If you want Carousel Dots, enable it.", 'livesay-core')
		);
	}
	// Nav
	public static function vt_carousel_nav() {
		return array(
		  "type" => "switcher",
			"heading" => __( "Navigation", 'livesay-core' ),
		  "group" => __( "Carousel", 'livesay-core' ),
		  "param_name" => "carousel_nav",
			"on_text" => __( "Yes", 'livesay-core' ),
			"off_text" => __( "No", 'livesay-core' ),
			"value" => '',
			'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
		  "description" => __( "If you want Carousel Navigation, enable it.", 'livesay-core')
		);
	}
	// Autoplay Timeout
	public static function vt_carousel_autoplay_timeout() {
		return array(
		  "type" => "textfield",
			"heading" => __( "Autoplay Timeout", 'livesay-core' ),
		  "group" => __( "Carousel", 'livesay-core' ),
		  "param_name" => "carousel_autoplay_timeout",
		  'value' => '',
		  "description" => __( "Change carousel Autoplay timing value. Default : 5000. Means 5 seconds.", 'livesay-core')
		);
	}
	// Autoplay
	public static function vt_carousel_autoplay() {
		return array(
		  "type" => "switcher",
			"heading" => __( "Autoplay", 'livesay-core' ),
		  "group" => __( "Carousel", 'livesay-core' ),
		  "param_name" => "carousel_autoplay",
			"on_text" => __( "Yes", 'livesay-core' ),
			"off_text" => __( "No", 'livesay-core' ),
			"value" => '',
			'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
		  "description" => __( "If you want to start Carousel automatically, enable it.", 'livesay-core')
		);
	}
	// Animate Out
	public static function vt_carousel_animateout() {
		return array(
		  "type" => "switcher",
			"heading" => __( "Animate Out", 'livesay-core' ),
		  "group" => __( "Carousel", 'livesay-core' ),
		  "param_name" => "carousel_animate_out",
			"on_text" => __( "Yes", 'livesay-core' ),
			"off_text" => __( "No", 'livesay-core' ),
			"value" => '',
			'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
		  "description" => __( "CSS3 animation out.", 'livesay-core')
		);
	}
	// Mouse Drag
	public static function vt_carousel_mousedrag() {
		return array(
		  "type" => "switcher",
			"heading" => __( "Disable Mouse Drag?", 'livesay-core' ),
		  "group" => __( "Carousel", 'livesay-core' ),
		  "param_name" => "carousel_mousedrag",
			"on_text" => __( "Yes", 'livesay-core' ),
			"off_text" => __( "No", 'livesay-core' ),
			"value" => '',
			'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
		  "description" => __( "If you want to disable Mouse Drag, check it.", 'livesay-core')
		);
	}
	// Auto Width
	public static function vt_carousel_autowidth() {
		return array(
		  "type" => "switcher",
			"heading" => __( "Auto Width", 'livesay-core' ),
		  "group" => __( "Carousel", 'livesay-core' ),
		  "param_name" => "carousel_autowidth",
			"on_text" => __( "Yes", 'livesay-core' ),
			"off_text" => __( "No", 'livesay-core' ),
			"value" => '',
			'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
		  "description" => __( "Adjust Auto Width automatically for each carousel items.", 'livesay-core')
		);
	}
	// Auto Height
	public static function vt_carousel_autoheight() {
		return array(
		  "type" => "switcher",
			"heading" => __( "Auto Height", 'livesay-core' ),
		  "group" => __( "Carousel", 'livesay-core' ),
		  "param_name" => "carousel_autoheight",
			"on_text" => __( "Yes", 'livesay-core' ),
			"off_text" => __( "No", 'livesay-core' ),
			"value" => '',
			'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
		  "description" => __( "Adjust Auto Height automatically for each carousel items.", 'livesay-core')
		);
	}
	// Tablet
	public static function vt_carousel_tablet() {
		return array(
		  "type" => "textfield",
			"heading" => __( "Tablet", 'livesay-core' ),
		  "group" => __( "Carousel", 'livesay-core' ),
		  "param_name" => "carousel_tablet",
		  'value' => '',
			'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
		  "description" => __( "Enter number of items to show in tablet.", 'livesay-core')
		);
	}
	// Mobile
	public static function vt_carousel_mobile() {
		return array(
		  "type" => "textfield",
			"heading" => __( "Mobile", 'livesay-core' ),
		  "group" => __( "Carousel", 'livesay-core' ),
		  "param_name" => "carousel_mobile",
		  'value' => '',
			'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
		  "description" => __( "Enter number of items to show in mobile.", 'livesay-core')
		);
	}
	// Small Mobile
	public static function vt_carousel_small_mobile() {
		return array(
		  "type" => "textfield",
			"heading" => __( "Small Mobile", 'livesay-core' ),
		  "group" => __( "Carousel", 'livesay-core' ),
		  "param_name" => "carousel_small_mobile",
		  'value' => '',
			'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
		  "description" => __( "Enter number of items to show in small mobile.", 'livesay-core')
		);
	}

}

/* Shortcode Extends */
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
  class WPBakeryShortCode_lvsy_Histories extends WPBakeryShortCodesContainer {
  }
  class WPBakeryShortCode_lvsy_Map_Tabs extends WPBakeryShortCodesContainer {
  }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
  class WPBakeryShortCode_lvsy_History extends WPBakeryShortCode {
  }
  class WPBakeryShortCode_lvsy_Map_Tab extends WPBakeryShortCode {
  }
}

// Call to Action
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
  class WPBakeryShortCode_lvsy_Ctas extends WPBakeryShortCodesContainer {
  }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
  class WPBakeryShortCode_lvsy_Cta extends WPBakeryShortCode {
  }
}

/*
 * Load All Shortcodes within a directory of visual-composer/shortcodes
 */
function lvsy_all_shortcodes() {
	$dirs = glob( LIVESAY_SHORTCODE_PATH . '*', GLOB_ONLYDIR );
	if ( !$dirs ) return;
	foreach ($dirs as $dir) {
		$dirname = basename( $dir );

		/* Include all shortcodes backend options file */
		$options_file = $dir . DS . $dirname . '-options.php';
		$options = array();
		if ( file_exists( $options_file ) ) {
			include_once( $options_file );
		} else {
			continue;
		}

		/* Include all shortcodes frondend options file */
		$shortcode_class_file = $dir . DS . $dirname .'.php';
		if ( file_exists( $shortcode_class_file ) ) {
			include_once( $shortcode_class_file );
		}
	}
}
lvsy_all_shortcodes();

if( ! function_exists( 'vc_add_shortcode_param' ) && function_exists( 'add_shortcode_param' ) ) {
  function vc_add_shortcode_param( $name, $form_field_callback, $script_url = null ) {
    return add_shortcode_param( $name, $form_field_callback, $script_url );
  }
}

/* Inline Style */
global $livesay_all_inline_styles;
$livesay_all_inline_styles = array();
if( ! function_exists( 'livesay_add_inline_style' ) ) {
  function livesay_add_inline_style( $style ) {
    global $livesay_all_inline_styles;
    array_push( $livesay_all_inline_styles, $style );
  }
}

/* Enqueue Inline Styles */
if ( ! function_exists( 'livesay_enqueue_inline_styles' ) ) {
  function livesay_enqueue_inline_styles() {

    global $livesay_all_inline_styles;

    if ( ! empty( $livesay_all_inline_styles ) ) {
      echo '<style id="livesay-inline-style" type="text/css">'. livesay_compress_css_lines( join( '', $livesay_all_inline_styles ) ) .'</style>';
    }

  }
  add_action( 'wp_footer', 'livesay_enqueue_inline_styles' );
}

/* Validate px entered in field */
if( ! function_exists( 'livesay_core_check_px' ) ) {
  function livesay_core_check_px( $num ) {
    return ( is_numeric( $num ) ) ? $num . 'px' : $num;
  }
}

/* Tabs Added Via lvsy_vt_tabs_function */
if( function_exists( 'lvsy_vt_tabs_function' ) ) {
  add_shortcode( 'vc_tabs', 'lvsy_vt_tabs_function' );
  add_shortcode( 'vc_tab', 'lvsy_vt_tab_function' );
}