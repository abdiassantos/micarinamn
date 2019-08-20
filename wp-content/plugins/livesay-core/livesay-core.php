<?php
/*
Plugin Name: Livesay Core
Plugin URI: https://victorthemes.com/wp-themes/livesay/
Description: Plugin to contain shortcodes and custom post types of the livesay theme.
Author: VictorThemes
Author URI: https://victorthemes.com/
Version: 1.7
Text Domain: livesay-core
*/

if( ! function_exists( 'livesay_block_direct_access' ) ) {
	function livesay_block_direct_access() {
		if( ! defined( 'ABSPATH' ) ) {
			exit( 'Forbidden' );
		}
	}
}

// Plugin URL
define( 'LIVESAY_PLUGIN_URL', plugins_url( '/', __FILE__ ) );

// Plugin PATH
define( 'LIVESAY_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'LIVESAY_PLUGIN_ASTS', LIVESAY_PLUGIN_URL . 'assets' );
define( 'LIVESAY_PLUGIN_IMGS', LIVESAY_PLUGIN_ASTS . '/images' );
define( 'LIVESAY_PLUGIN_INC', LIVESAY_PLUGIN_PATH . 'inc' );

// DIRECTORY SEPARATOR
define ( 'DS' , DIRECTORY_SEPARATOR );

// Livesay Shortcode Path
define( 'LIVESAY_SHORTCODE_BASE_PATH', LIVESAY_PLUGIN_PATH . 'visual-composer/' );
define( 'LIVESAY_SHORTCODE_PATH', LIVESAY_SHORTCODE_BASE_PATH . 'shortcodes/' );

/**
 * Check if Codestar Framework is Active or Not!
 */
function livesay_framework_active() {
  return ( defined( 'CS_VERSION' ) ) ? true : false;
}

/* VTHEME_NAME_P */
define('VTHEME_NAME_P', 'Livesay');

// Initial File
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if (is_plugin_active('livesay-core/livesay-core.php')) {

	// Custom Post Type
	require_once( LIVESAY_PLUGIN_INC . '/custom-post-type.php' );

  // Shortcodes
  require_once( LIVESAY_SHORTCODE_BASE_PATH . '/vc-setup.php' );
  require_once( LIVESAY_PLUGIN_INC . '/custom-shortcodes/theme-shortcodes.php' );
  require_once( LIVESAY_PLUGIN_INC . '/custom-shortcodes/custom-shortcodes.php' );

  // Widgets
  require_once( LIVESAY_PLUGIN_INC . '/widgets/get-quote-widget.php' );
  require_once( LIVESAY_PLUGIN_INC . '/widgets/nav-widget.php' );
  require_once( LIVESAY_PLUGIN_INC . '/widgets/recent-posts.php' );
  require_once( LIVESAY_PLUGIN_INC . '/widgets/instagram-widget.php' );
  require_once( LIVESAY_PLUGIN_INC . '/widgets/testimonial-widget.php' );
  require_once( LIVESAY_PLUGIN_INC . '/widgets/text-widget.php' );
  require_once( LIVESAY_PLUGIN_INC . '/widgets/reserve-seat.php' );
  require_once( LIVESAY_PLUGIN_INC . '/widgets/call-to-action.php' );
  require_once( LIVESAY_PLUGIN_INC . '/widgets/widget-extra-fields.php' );

}

/**
 * Plugin language
 */
function livesay_plugin_language_setup() {
  load_plugin_textdomain( 'livesay-core', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'init', 'livesay_plugin_language_setup' );

/* WPAUTOP for shortcode output */
if( ! function_exists( 'livesay_set_wpautop' ) ) {
  function livesay_set_wpautop( $content, $force = true ) {
    if ( $force ) {
      $content = wpautop( preg_replace( '/<\/?p\>/', "\n", $content ) . "\n" );
    }
    return do_shortcode( shortcode_unautop( $content ) );
  }
}

/* Use shortcodes in text widgets */
add_filter('widget_text', 'do_shortcode');

/* Shortcodes enable in the_excerpt */
add_filter('the_excerpt', 'do_shortcode');

/* Remove p tag and add by our self in the_excerpt */
remove_filter('the_excerpt', 'wpautop');

/* Add Extra Social Fields in Admin User Profile */
function livesay_add_twitter_facebook( $contactmethods ) {
  $contactmethods['facebook']   = 'Facebook';
  $contactmethods['twitter']    = 'Twitter';
  $contactmethods['google_plus']  = 'Google Plus';
  $contactmethods['linkedin']   = 'Linkedin';
  return $contactmethods;
}
add_filter('user_contactmethods','livesay_add_twitter_facebook',10,1);

/**
 *
 * Encode string for backup options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_encode_string' ) ) {
  function cs_encode_string( $string ) {
    return rtrim( strtr( call_user_func( 'base'. '64' .'_encode', addslashes( gzcompress( serialize( $string ), 9 ) ) ), '+/', '-_' ), '=' );
  }
}

/**
 *
 * Decode string for backup options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_decode_string' ) ) {
  function cs_decode_string( $string ) {
    return unserialize( gzuncompress( stripslashes( call_user_func( 'base'. '64' .'_decode', rtrim( strtr( $string, '-_', '+/' ), '=' ) ) ) ) );
  }
}

/* Share Options */
if ( ! function_exists( 'livesay_wp_share_option' ) ) {
  function livesay_wp_share_option() {

    global $post;
    $page_url = get_permalink($post->ID );
    $title = $post->post_title;
    if (livesay_framework_active()) {
      $share_on_text = cs_get_option('share_on_text');
    } else {
      $share_on_text = '';
    }
    $share_on_text = $share_on_text ? $share_on_text : esc_html__( 'Share On', 'livesay-core' );
    ?><div class="share-links"><a href="//twitter.com/home?status=<?php print(urlencode($title)); ?>+<?php print(urlencode($page_url)); ?>" class="icon-fa-twitter" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Twitter', 'livesay-core'); ?>" target="_blank"><i class="fa fa-twitter"></i></a><a href="//www.facebook.com/sharer/sharer.php?u=<?php print(urlencode($page_url)); ?>&amp;t=<?php print(urlencode($title)); ?>" class="icon-fa-facebook" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Facebook', 'livesay-core'); ?>" target="_blank"><i class="fa fa-facebook"></i></a><a href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?php print(urlencode($page_url)); ?>&amp;title=<?php print(urlencode($title)); ?>" class="icon-fa-linkedin" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Linkedin', 'livesay-core'); ?>" target="_blank"><i class="fa fa-linkedin"></i></a><a href="//plus.google.com/share?url=<?php print(urlencode($page_url)); ?>" class="icon-fa-google-plus" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Google+', 'livesay-core'); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></div><?php
  }
}

/* Metas (Share)*/
if ( ! function_exists( 'livesay_post_share' ) ) {
  function livesay_post_share() {
  global $post;
  $metas_hide = (array) cs_get_option( 'theme_metas_hide' );
  $lvsy_single_share_option = cs_get_option('single_share_option');
  $share_text = cs_get_option('share_text');
  $share_text = $share_text ? $share_text : esc_html__( 'Share', 'livesay' );

  if(is_single()) {
    $social_cls = 'lvsy-blog-share';
  } else {
    $social_cls = 'share-blog';
  }

  if ( !in_array( 'share', $metas_hide ) ) { ?>
  <div class="<?php echo esc_attr($social_cls); ?>">
    <span><?php if(!is_single()) { ?><i class="icon-share icons"></i><em><?php }
        echo esc_attr($share_text); ?></em></span><?php
      if ( !in_array( 'share', $metas_hide ) ) { // Share Hide
        if($lvsy_single_share_option) {
          livesay_wp_share_option();
        }
      } }// Share Hides ?>
  </div>
  <?php
  }
}

/* Custom WordPress admin login logo */
if( ! function_exists( 'livesay_theme_login_logo' ) ) {
  function livesay_theme_login_logo() {
    if (livesay_framework_active()) {
      $login_logo = cs_get_option('brand_logo_wp');
    } else {
      $login_logo = '';
    }
    if($login_logo) {
      $login_logo_url = wp_get_attachment_url($login_logo);
    } else {
      $login_logo_url = esc_url(LIVESAY_PLUGIN_IMGS). '/wp-login-logo.png';
    }
    if($login_logo) {
    echo "
      <style>
        body.login #login h1 a {
        background: url('$login_logo_url') no-repeat scroll center bottom transparent;
        height: 100px;
        width: 100%;
        margin-bottom:0px;
        }
      </style>";
    }
  }
  add_action('login_head', 'livesay_theme_login_logo');
}

/* WordPress admin login logo link */
if( ! function_exists( 'livesay_login_url' ) ) {
  function livesay_login_url() {
    return site_url();
  }
  add_filter( 'login_headerurl', 'livesay_login_url', 10, 4 );
}

/* WordPress admin login logo link */
if( ! function_exists( 'livesay_login_title' ) ) {
  function livesay_login_title() {
    return get_bloginfo('name');
  }
  add_filter('login_headertitle', 'livesay_login_title');
}

/**
 * One Click Install
 * @return Import Demos - Needed Import Demo's
 */
function livesay_import_files() {
  return array(
    array(
      'import_file_name'           => 'Livesay',
      'import_file_url'            => trailingslashit( LIVESAY_PLUGIN_URL ) . 'inc/import/content.xml',
      'import_widget_file_url'     => trailingslashit( LIVESAY_PLUGIN_URL ) . 'inc/import/widget.wie',
      'local_import_csf'           => array(
        array(
          'file_path'   => trailingslashit( LIVESAY_PLUGIN_URL ) . 'inc/import/theme-options.json',
          'option_name' => '_cs_options',
        ),
      ),
      'import_notice'              => __( 'Import process may take 3-5 minutes, please be patient. It\'s really based on your network speed.', 'livesay-core' ),
      'preview_url'                => 'http://victorthemes.com/themes/livesay',
    ),
  );
}
add_filter( 'pt-ocdi/import_files', 'livesay_import_files' );

/**
 * One Click Import Function for CodeStar Framework
 */
if ( ! function_exists( 'csf_after_content_import_execution' ) ) {
  function csf_after_content_import_execution( $selected_import_files, $import_files, $selected_index ) {

    $downloader = new OCDI\Downloader();

    if( ! empty( $import_files[$selected_index]['import_csf'] ) ) {

      foreach( $import_files[$selected_index]['import_csf'] as $index => $import ) {
        $file_path = $downloader->download_file( $import['file_url'], 'demo-csf-import-file-'. $index . '-'. date( 'Y-m-d__H-i-s' ) .'.json' );
        $file_raw  = OCDI\Helpers::data_from_file( $file_path );
        update_option( $import['option_name'], json_decode( $file_raw, true ) );
      }

    } else if( ! empty( $import_files[$selected_index]['local_import_csf'] ) ) {

      foreach( $import_files[$selected_index]['local_import_csf'] as $index => $import ) {
        $file_path = $import['file_path'];
        $file_raw  = OCDI\Helpers::data_from_file( $file_path );
        update_option( $import['option_name'], json_decode( $file_raw, true ) );
      }

    }

    // Put info to log file.
    $ocdi       = OCDI\OneClickDemoImport::get_instance();
    $log_path   = $ocdi->get_log_file_path();

    OCDI\Helpers::append_to_file( 'Codestar Framework files loaded.'. $logs, $log_path );

  }
  add_action('pt-ocdi/after_content_import_execution', 'csf_after_content_import_execution', 3, 99 );
}

/**
 * [livesay_after_import_setup]
 * @return Front Page, Post Page & Menu Set
 */
function livesay_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
        'primary' => $main_menu->term_id,
      )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home One' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'livesay_after_import_setup' );

// Install Demos Menu - Menu Edited
function livesay_core_one_click_page( $default_settings ) {
  $default_settings['parent_slug'] = 'themes.php';
  $default_settings['page_title']  = esc_html__( 'Install Demos', 'livesay-core' );
  $default_settings['menu_title']  = esc_html__( 'Install Demos', 'livesay-core' );
  $default_settings['capability']  = 'import';
  $default_settings['menu_slug']   = 'install_demos';

  return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'livesay_core_one_click_page' );

// Model Popup - Width Increased
function livesay_ocdi_confirmation_dialog_options ( $options ) {
  return array_merge( $options, array(
    'width'       => 600,
    'dialogClass' => 'wp-dialog',
    'resizable'   => false,
    'height'      => 'auto',
    'modal'       => true,
  ) );
}
add_filter( 'pt-ocdi/confirmation_dialog_options', 'livesay_ocdi_confirmation_dialog_options', 10, 1 );

// Disable the branding notice - ProteusThemes
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

function ocdi_plugin_intro_text( $default_text ) {
    $auto_install = admin_url('themes.php?page=install_demos');
    $manual_install = admin_url('themes.php?page=install_demos&import-mode=manual');
    $default_text .= '<h1>Install Demos</h1>
    <div class="vtheme-core_intro-text vtdemo-one-click">
    <div id="poststuff">

      <div class="postbox important-notes">
        <h3><span>Important notes:</span></h3>
        <div class="inside">
          <ol>
            <li>Please note, this import process will take time. So, please be patient.</li>
            <li>Please make sure you\'ve installed recommended plugins before you import this content.</li>
            <li>All images are demo purposes only. So, images may repeat in your site content.</li>
          </ol>
        </div>
      </div>

      <div class="postbox vt-support-box vt-error-box">
        <h3><span>Don\'t Edit Parent Theme Files:</span></h3>
        <div class="inside">
          <p>Don\'t edit any files from parent theme! Use only a <strong>Child Theme</strong> files for your customizations!</p>
          <p>If you get future updates from our theme, you\'ll lose edited customization from your parent theme.</p>
        </div>
      </div>

      <div class="postbox vt-support-box">
        <h3><span>Need Support?</span> <a href="https://www.youtube.com/watch?v=9HW-YydMZ2Y" target="_blank" class="cs-section-video"><i class="fa fa-youtube-play"></i> <span>How to?</span></a></h3>
        <div class="inside">
          <p>Have any doubts regarding this installation or any other issues? Please feel free to open a ticket in our support center.</p>
          <a href="http://victorthemes.com/docs/livesay" class="button-primary" target="_blank">Docs</a>
          <a href="https://victorthemes.com/my-account/support/" class="button-primary" target="_blank">Support</a>
          <a href="https://victorthemes.com/wp-themes/livesay" class="button-primary" target="_blank">Item Page</a>
        </div>
      </div>
      <div class="nav-tab-wrapper vt-nav-tab">
        <a href="'. $auto_install .'" class="nav-tab vt-mode-switch vt-auto-mode nav-tab-active">Auto Import</a>
        <a href="'. $manual_install .'" class="nav-tab vt-mode-switch vt-manual-mode">Manual Import</a>
      </div>

    </div>
  </div>';

    return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'ocdi_plugin_intro_text' );
