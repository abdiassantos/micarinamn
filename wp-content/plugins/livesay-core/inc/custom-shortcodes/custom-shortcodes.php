<?php
/* Spacer */
function vt_spacer_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "height" => '',
  ), $atts));

  $result = do_shortcode('[vc_empty_space height="'. $height .'"]');
  return $result;

}
add_shortcode("vt_spacer", "vt_spacer_function");

/* Section Title */
function vt_section_title_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "section_title" => '',
    "section_sub_title" => '',
    "custom_class" => '',
    "title_color" => '',
    "title_size"  => '',
    "sub_title_color" => '',
    "sub_title_size" => '',
  ), $atts));

  // fix unclosed/unwanted paragraph tags in $content
  $content = wpb_js_remove_wpautop($content, true);

  // Shortcode Style CSS
  $e_uniqid        = uniqid();
  $inline_style  = '';

  // Text Color
  if ( $title_size || $title_color ) {
    $inline_style .= '.lvsy-section-title-'. $e_uniqid .' .section-title {';
    $inline_style .= ( $title_size ) ? 'font-size:'. livesay_core_check_px($title_size) .';' : '';
    $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
    $inline_style .= '}';
  }
  if ( $sub_title_size || $sub_title_color ) {
    $inline_style .= '.lvsy-section-title-'. $e_uniqid .' .section-sub-title {';
    $inline_style .= ( $sub_title_size ) ? 'font-size:'. livesay_core_check_px($sub_title_size) .';' : '';
    $inline_style .= ( $sub_title_color ) ? 'color:'. $sub_title_color .';' : '';
    $inline_style .= '}';
  }
  $title = $section_title ? '<div class="section-title">'.$section_title.'</div>' : '';
  $sub_title = $section_sub_title ? '<div class="section-sub-title">'.$section_sub_title.'</div>' : '';

  // add inline style
  livesay_add_inline_style( $inline_style );
  $styled_class  = ' lvsy-section-title-'. $e_uniqid;

  $result = '<div class="section-title-wrap '. $custom_class . $styled_class .'">'. $title . $sub_title .' </div>';
  return $result;

}
add_shortcode("vt_section_title", "vt_section_title_function");

/* Social Icons */
function vt_socials_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "custom_class" => '',
    // Colors
    "icon_color" => '',
    "icon_hover_color" => '',
    "icon_size" => '',
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $icon_color || $icon_size ) {
    $inline_style .= '.lvsy-socials-'. $e_uniqid .'.lvsy-social a {';
    $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
    $inline_style .= ( $icon_size ) ? 'font-size:'. livesay_core_check_px($icon_size) .';' : '';
    $inline_style .= '}';
  }
  if ( $icon_hover_color ) {
    $inline_style .= '.lvsy-socials-'. $e_uniqid .'.lvsy-social li a:hover {';
    $inline_style .= ( $icon_hover_color ) ? 'color:'. $icon_hover_color .';' : '';
    $inline_style .= '}';
  }

  // add inline style
  livesay_add_inline_style( $inline_style );
  $styled_class  = ' lvsy-socials-'. $e_uniqid;

  $result = '<div class="lvsy-social '. $custom_class . $styled_class .'">'. do_shortcode($content) .'</div>';
  return $result;

}
add_shortcode("vt_socials", "vt_socials_function");

/* Social Icon */
function vt_social_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "social_link" => '',
      "social_icon" => '',
      "target_tab" => ''
   ), $atts));

   $social_link = ( isset( $social_link ) ) ? 'href="'. $social_link . '"' : '';
   $target_tab = ( $target_tab === '1' ) ? ' target="_blank"' : '';

   $result = '<a '. $social_link . $target_tab .' class="'. str_replace('fa ', 'icon-', $social_icon) .'"><i class="'. $social_icon .'"></i></a>';
   return $result;

}
add_shortcode("vt_social", "vt_social_function");

/* Download Button */
function vt_download_button_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "download_txt" => '',
    "download_link" => '',
    "download_icon" => '',
    // Colors
    "bg_color" => '',
    "bg_hover_color" => '',
    "border_color" => '',
    "icon_color" => '',
    "txt_color" => '',
    // Size
    "icon_size" => '',
    "text_size" => '',

    "custom_class" => '',
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $txt_color || $text_size ) {
    $inline_style .= '.download-buttons-'. $e_uniqid .' .lvsy-btn {';
    $inline_style .= ( $txt_color ) ? 'color:'. $txt_color .';' : '';
    $inline_style .= ( $text_size ) ? 'font-size:'. livesay_core_check_px($text_size).';' : '';
    $inline_style .= '}';
  }
  if ( $icon_color || $icon_size ) {
    $inline_style .= '.download-buttons-'. $e_uniqid .' .lvsy-btn .fa {';
    $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
    $inline_style .= ( $icon_size ) ? 'font-size:'.livesay_core_check_px($icon_size).';' : '';
    $inline_style .= '}';
  }
  if ( $bg_color ) {
    $inline_style .= '.download-buttons-'. $e_uniqid .' .lvsy-btn {';
    $inline_style .= ( $bg_color ) ? 'background-color:'. $bg_color .';' : '';
    $inline_style .= '}';
  }
  if ( $border_color ) {
    $inline_style .= '.download-buttons-'. $e_uniqid .' .lvsy-btn {';
    $inline_style .= ( $border_color ) ? 'border-color:'. $border_color .';' : '';
    $inline_style .= '}';
  }
  if ( $bg_hover_color ) {
    $inline_style .= '.download-buttons-'. $e_uniqid .' .lvsy-btn:hover {';
    $inline_style .= ( $bg_hover_color ) ? 'background-color:'. $bg_hover_color .';' : '';
    $inline_style .= '}';
  }

$download_icon = $download_icon ? '<i class="'.$download_icon.'" aria-hidden="true"></i>' : '';
if($download_link){
  $down_btn = '<a href="'.$download_link.'" class="lvsy-btn">'.$download_icon.$download_txt.'</a>';
} else {
  $down_btn = '<span class="lvsy-btn">'.$download_icon.$download_txt.'</span>' ;
}

  // add inline style
  livesay_add_inline_style( $inline_style );
  $styled_class  = ' download-buttons-'. $e_uniqid;

  $result = '<div class="download-btn '.$styled_class.' '.$custom_class.'"><div class="clearfix">'.$down_btn.'</div></div>';
  return $result;

}
add_shortcode("vt_download_button", "vt_download_button_function");

/* contact Lists */
function vt_contact_lists_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "custom_class" => '',
    // Colors
    "title_color" => '',
    "text_color" => '',
    "bullet_color" => '',
    // Size
    "title_size" => '',
    "text_size" => '',
    "bullet_top_space" => '',
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $title_color || $title_size ) {
    $inline_style .= '.lvsy-contact-'. $e_uniqid .'.lvsy-contact li strong {';
    $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
    $inline_style .= ( $title_size ) ? 'font-size:'. $title_size .';' : '';
    $inline_style .= '}';
  }
  if ( $text_color || $text_size ) {
    $inline_style .= '.lvsy-contact-'. $e_uniqid .'.lvsy-contact li, .lvsy-contact-'. $e_uniqid .'.lvsy-contact li a {';
    $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
    $inline_style .= ( $text_size ) ? 'font-size:'. $text_size .';' : '';
    $inline_style .= '}';
  }
  if ( $bullet_color || $bullet_top_space ) {
    $inline_style .= '.lvsy-contact-'. $e_uniqid .'.lvsy-contact li:before {';
    $inline_style .= ( $bullet_color ) ? 'background-color:'. $bullet_color .';' : '';
    $inline_style .= ( $bullet_top_space ) ? 'top:'. $bullet_top_space .';' : '';
    $inline_style .= '}';
  }

  // add inline style
  livesay_add_inline_style( $inline_style );
  $styled_class  = ' lvsy-contact-'. $e_uniqid;

  $result = '<div class="contact-info"><ul class="lvsy-contact '. $custom_class . $styled_class .'">'. do_shortcode($content) .'</ul></div>';
  return $result;

}
add_shortcode("vt_contact_lists", "vt_contact_lists_function");

/* contactal List */
function vt_contact_list_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "title" => '',
    "text" => '',
    "text_link" => ''
  ), $atts));

  // Atts
  $title = ($title) ? '<span>'. $title .'</span>' : '';
  if ($text_link) {
    $text_link_open = '<a href="'. $text_link .'" target="_blank">';
    $text_link_close = '</a>';
  } else {
    $text_link_open = '';
    $text_link_close = '';
  }

  $result = '<li>'. $title . $text_link_open . $text . $text_link_close .'</li>';
  return $result;

}
add_shortcode("vt_contact_list", "vt_contact_list_function");

/* Simple Images */
function vt_image_lists_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "custom_class" => '',
  ), $atts));

  $result = '<ul class="simple-fix '. $custom_class .'">'. do_shortcode($content) .'</ul>';
  return $result;

}
add_shortcode("vt_image_lists", "vt_image_lists_function");

/* Simple Image */
function vt_image_list_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "get_image" => '',
    "link" => '',
    "open_tab" => ''
  ), $atts));

  // Atts
  if ($get_image) {
    $my_image = ($get_image) ? '<img src="'. $get_image .'" alt=""/>' : '';
  } else {
    $my_image = '';
  }
  if ($link) {
    $open_tab = $open_tab ? 'target="_blank"' : '';
    $link_o = '<a href="'. $link .'" '. $open_tab .'>';
    $link_c = '</a>';
  } else {
    $link_o = '';
    $link_c = '';
  }

  $result = '<li>'. $link_o . $my_image . $link_c .'</li>';
  return $result;

}
add_shortcode("vt_image_list", "vt_image_list_function");

/* Simple Underline Link */
function vt_simple_link_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "link_style" => '',
    "link_icon" => '',
    "link_text" => '',
    "link" => '',
    "target_tab" => '',
    "custom_class" => '',
    // Normal
    "text_color" => '',
    "border_color" => '',
    // Hover
    "text_hover_color" => '',
    "border_hover_color" => '',
    // Size
    "text_size" => '',
  ), $atts));

  // Atts
  $target_tab = $target_tab ? 'target="_blank"' : '';
  if ($link_style === 'link-arrow-right') {
    $arrow_icon = $link_icon ? ' <i class="'. $link_icon .'"></i>' : ' <i class="fa fa-caret-right"></i>';
  } elseif ($link_style === 'link-arrow-left') {
    $arrow_icon = $link_icon ? ' <i class="'. $link_icon .'"></i>' : ' <i class="fa fa-caret-left"></i>';
  } else {
    $arrow_icon = '';
  }
  $link_style = $link_style ? $link_style. ' ' : 'link-underline ';

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $text_color || $text_size ) {
    $inline_style .= '.lvsy-simple-link-'. $e_uniqid .'.lvsy-'. $link_style .', .lvsy-simple-link-'. $e_uniqid .'.lvsy-link-arrow-left i, .lvsy-simple-link-'. $e_uniqid .'.lvsy-link-arrow-right i {';
    $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
    $inline_style .= ( $text_size ) ? 'font-size:'. livesay_core_check_px($text_size) .';' : '';
    $inline_style .= '}';
  }
  if ( $text_hover_color ) {
    $inline_style .= '.lvsy-simple-link-'. $e_uniqid .'.lvsy-'. $link_style .':hover, .lvsy-simple-link-'. $e_uniqid .'.lvsy-link-arrow-right:hover, .lvsy-simple-link-'. $e_uniqid .'.lvsy-link-arrow-left:hover, .lvsy-simple-link-'. $e_uniqid .'.lvsy-link-arrow-right:hover i, .lvsy-simple-link-'. $e_uniqid .'.lvsy-link-arrow-left:hover i, .lvsy-simple-link-'. $e_uniqid .'.lvsy-link-underline:hover {';
    $inline_style .= ( $text_hover_color ) ? 'color:'. $text_hover_color .';' : '';
    $inline_style .= ( $text_hover_color ) ? 'border-bottom-color:'. $text_hover_color .';' : '';
    $inline_style .= '}';
  }
  if ( $border_color ) {
    $inline_style .= '.lvsy-simple-link-'. $e_uniqid .'.lvsy-'. $link_style .':after, .lvsy-simple-link-'. $e_uniqid .'.lvsy-link-underline {';
    $inline_style .= ( $border_color ) ? 'border-bottom-color:'. $border_color .';' : '';
    $inline_style .= '}';
  }
  if ( $border_hover_color ) {
    $inline_style .= '.lvsy-simple-link-'. $e_uniqid .'.lvsy-link-underline:hover {';
    $inline_style .= ( $border_hover_color ) ? 'border-bottom-color:'. $border_hover_color .';' : '';
    $inline_style .= '}';
  }

  // add inline style
  livesay_add_inline_style( $inline_style );
  $styled_class  = ' lvsy-simple-link-'. $e_uniqid;

  $result = '<a href="'. $link .'" '. $target_tab .' class="lvsy-'. $link_style . $custom_class . $styled_class .'">'. $link_text . $arrow_icon .'</a>';
  return $result;

}
add_shortcode("vt_simple_link", "vt_simple_link_function");

/* Useful Links */
function vt_useful_links_function($atts, $content = true) {
   extract(shortcode_atts(array(
      "column_width" => '',
      "custom_class" => ''
   ), $atts));

   $result = '<ul class="lvsy-useful-links '. $custom_class .' '. $column_width .'">'. do_shortcode($content) .'</ul>';
   return $result;

}
add_shortcode("vt_useful_links", "vt_useful_links_function");

/* Useful Link */
function vt_useful_link_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "target_tab" => '',
      "title_link" => '',
      "link_title" => ''
   ), $atts));

   $title_link = ( isset( $title_link ) ) ? 'href="'. $title_link . '"' : '';
   $target_tab = ( $target_tab === '1' ) ? 'target="_blank"' : '';

   $result = '<li><a '. $title_link . $target_tab .'>'. $link_title .'</a></li>';
   return $result;

}
add_shortcode("vt_useful_link", "vt_useful_link_function");

/* Link With Titles */
function vt_link_with_titles_function($atts, $content = true) {
   extract(shortcode_atts(array(
      "links_title" => '',
      "custom_class" => ''
   ), $atts));

   $result = '<div class="speaker-events-link '. $custom_class .'"><span>'.$links_title.'</span>'. do_shortcode($content) .'</div>';
   return $result;

}
add_shortcode("vt_link_with_titles", "vt_link_with_titles_function");

/* Link With Title */
function vt_link_with_title_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "target_tab" => '',
      "title_link" => '',
      "link_title" => ''
   ), $atts));

   $title_linkk = $title_link  ? 'href="'. $title_link . '"' : '';
   $target_tab = ( $target_tab === '1' ) ? 'target="_blank"' : '';
   $tag = $title_link ? 'a' : 'span class="dhav-link"';

   $result = '<div class="lvsy-lnks"><'.$tag.' '. $title_linkk . $target_tab .'>'. $link_title .'</'.$tag.'></div>';
   return $result;

}
add_shortcode("vt_link_with_title", "vt_link_with_title_function");

/* Simple Text Link */
function livesay_simple_text_link_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "target_tab" => '',
      "title_link" => '',
      "link_text" => '',
      'custom_class' => ''
   ), $atts));

   $title_linkk = $title_link  ? 'href="'. $title_link . '"' : '';
   $target_tab = ( $target_tab === '1' ) ? 'target="_blank"' : '';
   $tag = $title_link ? 'a' : 'span class="dhav-link"';

   $result = '<div class="contact-sponsor"><'.$tag.' '. $title_linkk . $target_tab .'>'. $link_text .'</'.$tag.'></div>';
   return $result;

}
add_shortcode("livesay_simple_text_link", "livesay_simple_text_link_function");

/* Footer Heading */
function vt_footer_heading_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "footer_title" => '',
      "footer_sub_title" => '',

      // Styles
      "title_color" => '',
      "sub_title_color" => '',
      "title_size" => '',
      "sub_title_size" => ''
   ), $atts));

  // Shortcode Style CSS
  $e_uniqid        = uniqid();
  $inline_style  = '';

  // Text Color
  if ( $title_size || $title_color ) {
    $inline_style .= '.foot-heading'. $e_uniqid .' h2 {';
    $inline_style .= ( $title_size ) ? 'font-size:'. livesay_core_check_px($title_size) .';' : '';
    $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
    $inline_style .= '}';
  }
  if ( $sub_title_size || $sub_title_color ) {
    $inline_style .= '.foot-heading'. $e_uniqid .' h5 {';
    $inline_style .= ( $sub_title_size ) ? 'font-size:'. livesay_core_check_px($sub_title_size) .';' : '';
    $inline_style .= ( $sub_title_color ) ? 'color:'. $sub_title_color .';' : '';
    $inline_style .= '}';
  }

  // add inline style
  livesay_add_inline_style( $inline_style );
  $styled_class  = ' foot-heading-'. $e_uniqid;

  $footer_title = $footer_title ? '<h2>'.$footer_title.'</h2>' : '';
  $footer_sub_title = $footer_sub_title ? '<h5>'.$footer_sub_title.'</h5>' : '';

   $result = ''.$footer_sub_title . $footer_title .'';
   return $result;

}
add_shortcode("vt_footer_heading", "vt_footer_heading_function");

/* Blockquote */
function vt_blockquote_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "blockquote_style" => '',
    "text_size" => '',
    "custom_class" => '',
    "content_color" => '',
    "left_color" => '',
  ), $atts));

  // fix unclosed/unwanted paragraph tags in $content
  $content = wpb_js_remove_wpautop($content, true);

  // Shortcode Style CSS
  $e_uniqid        = uniqid();
  $inline_style  = '';

  // Text Color
  if ( $text_size || $content_color ) {
    $inline_style .= '.lvsy-blockquote-'. $e_uniqid .' p {';
    $inline_style .= ( $text_size ) ? 'font-size:'. livesay_core_check_px($text_size) .';' : '';
    $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
    $inline_style .= '}';
  }
  if ( $left_color ) {
    $inline_style .= '.lvsy-blockquote-'. $e_uniqid .' {';
    $inline_style .= ( $left_color ) ? 'border-left-color:'. $left_color .';' : '';
    $inline_style .= '}';
  }

  // add inline style
  livesay_add_inline_style( $inline_style );
  $styled_class  = ' lvsy-blockquote-'. $e_uniqid;

  // Style
  $blockquote_style = ($blockquote_style === 'style-two') ? 'blockquote-two ' : '';

  $result = '<blockquote class="'. $blockquote_style . $custom_class . $styled_class .'">'. do_shortcode($content) .'</blockquote>';
  return $result;

}
add_shortcode("vt_blockquote", "vt_blockquote_function");

/* Button */
function vt_button_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "btn_txt" => '',
    "btn_link" => '',
    "custom_class" => '',

    // Styles
    "btn_bg_color" => '',
    "btn_bg_hover_color" => '',
    "btn_border_color" => '',
    "btn_border_hover_color" => '',
    "btn_txt_color" => '',
    "txt_hover_color" => '',
    "txt_size"  => ''
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid        = uniqid();
  $inline_style  = '';

  // Text Color
  if ( $btn_txt_color || $txt_size ) {
    $inline_style .= '.lvsy-btn-'. $e_uniqid .' a {';
    $inline_style .= ( $txt_size ) ? 'font-size:'. livesay_core_check_px($txt_size) .';' : '';
    $inline_style .= ( $btn_txt_color ) ? 'color:'. $btn_txt_color .';' : '';
    $inline_style .= '}';
  }
  if ( $txt_hover_color ) {
    $inline_style .= '.lvsy-btn-'. $e_uniqid .':hover a {';
    $inline_style .= ( $txt_hover_color ) ? 'color:'. $txt_hover_color .';' : '';
    $inline_style .= '}';
  }
  if ( $btn_bg_color || $btn_border_color) {
    $inline_style .= '.lvsy-btn-'. $e_uniqid .' a {';
    $inline_style .= ( $btn_bg_color ) ? 'background-color:'. $btn_bg_color .';' : '';
    $inline_style .= ( $btn_border_color ) ? 'border-color:'. $btn_border_color .';' : '';
    $inline_style .= '}';
  }
  if ( $btn_bg_hover_color || $btn_border_hover_color ) {
    $inline_style .= '.lvsy-btn-'. $e_uniqid .':hover a {';
    $inline_style .= ( $btn_bg_hover_color ) ? 'background-color:'. $btn_bg_hover_color .';' : '';
    $inline_style .= ( $btn_border_hover_color ) ? 'border-color:'. $btn_border_hover_color .';' : '';
    $inline_style .= '}';
  }

  $btn_link = $btn_link ? '<a href="'.$btn_link.'" class="lvsy-btn" data-toggle="modal">'.$btn_txt.'</a>' : '<span class="lvsy-btn">'.$btn_txt.'</span>';
  $btn_actual = $btn_txt ? $btn_link : '';
  // add inline style
  livesay_add_inline_style( $inline_style );
  $styled_class  = ' lvsy-btn-'. $e_uniqid;

  $result = '<div class="clearfix'. $custom_class . $styled_class .'">'. $btn_actual .'</div>';
  return $result;

}
add_shortcode("vt_button", "vt_button_function");

/* Reserve Seat Button */
function vt_reserve_button_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "btn_txt" => '',
    "btn_target" => '',
    "custom_class" => '',

    // Styles
    "btn_bg_color" => '',
    "btn_bg_hover_color" => '',
    "btn_border_color" => '',
    "btn_border_hover_color" => '',
    "btn_txt_color" => '',
    "txt_hover_color" => '',
    "txt_size"  => ''
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid        = uniqid();
  $inline_style  = '';

  // Text Color
  if ( $btn_txt_color || $txt_size ) {
    $inline_style .= '.lvsy-btn-'. $e_uniqid .' a {';
    $inline_style .= ( $txt_size ) ? 'font-size:'. livesay_core_check_px($txt_size) .';' : '';
    $inline_style .= ( $btn_txt_color ) ? 'color:'. $btn_txt_color .';' : '';
    $inline_style .= '}';
  }
  if ( $txt_hover_color ) {
    $inline_style .= '.lvsy-btn-'. $e_uniqid .':hover a {';
    $inline_style .= ( $txt_hover_color ) ? 'color:'. $txt_hover_color .';' : '';
    $inline_style .= '}';
  }
  if ( $btn_bg_color || $btn_border_color) {
    $inline_style .= '.lvsy-btn-'. $e_uniqid .' a {';
    $inline_style .= ( $btn_bg_color ) ? 'background-color:'. $btn_bg_color .';' : '';
    $inline_style .= ( $btn_border_color ) ? 'border-color:'. $btn_border_color .';' : '';
    $inline_style .= '}';
  }
  if ( $btn_bg_hover_color || $btn_border_hover_color ) {
    $inline_style .= '.lvsy-btn-'. $e_uniqid .':hover a {';
    $inline_style .= ( $btn_bg_hover_color ) ? 'background-color:'. $btn_bg_hover_color .';' : '';
    $inline_style .= ( $btn_border_hover_color ) ? 'border-color:'. $btn_border_hover_color .';' : '';
    $inline_style .= '}';
  }

  $btn_target = $btn_target ? '<span class="lvsy-btn" data-toggle="modal" data-target="'.$btn_target.'">'.$btn_txt.'</span>' : '<span class="lvsy-btn" data-toggle="modal">'.$btn_txt.'</span>';
  $btn_actual = $btn_txt ? $btn_target : '';
  // add inline style
  livesay_add_inline_style( $inline_style );
  $styled_class  = ' lvsy-btn-'. $e_uniqid;

  $result = '<div class="clearfix '. $custom_class . $styled_class .'">'. $btn_actual .'</div>';
  return $result;

}
add_shortcode("vt_reserve_button", "vt_reserve_button_function");

/* List Styles Lists */
function vt_address_lists_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "custom_class" => '',
    // Colors
    "text_color" => '',
    "title_color" => '',
    // Size
    "text_size" => '',
    "title_size" => '',
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  if ( $text_color || $text_size ) {
    $inline_style .= '.lvsy-list-'. $e_uniqid .' li {';
    $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
    $inline_style .= ( $text_size ) ? 'font-size:'. livesay_core_check_px($text_size) .';' : '';
    $inline_style .= '}';
  }
  if ( $title_size || $title_color ) {
    $inline_style .= '.lvsy-list-'. $e_uniqid .'.lvsy-list-three li strong {';
    $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
    $inline_style .= ( $title_size ) ? 'font-size:'. livesay_core_check_px($title_size) .';' : '';
    $inline_style .= '}';
  }

  // add inline style
  livesay_add_inline_style( $inline_style );
  $styled_class  = ' lvsy-list-'. $e_uniqid;

  // Output
  $output = '';

  $output .= '<ul class="lvsy-list-three '. $custom_class . $styled_class .'">';
  $output .= do_shortcode($content);
  $output .= '</ul>';

  return $output;

}
add_shortcode("vt_address_lists", "vt_address_lists_function");

/* List Styles List */
function vt_address_list_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "list_title" => '',
    "list_text" => '',
  ), $atts));

  // Atts
  $list_title = $list_title ? '<strong>'. $list_title .' :</strong> ' : '';
  $list_text = $list_text ? $list_text : '';

  $result = '<li>'. $list_title . $list_text .'</li>';
  return $result;

}
add_shortcode("vt_address_list", "vt_address_list_function");

/* Current Year - Shortcode */
if( ! function_exists( 'vt_current_year' ) ) {
  function vt_current_year() {
    return date('Y');
  }
  add_shortcode( 'vt_current_year', 'vt_current_year' );
}

/* Get Home Page URL - Via Shortcode */
if( ! function_exists( 'vt_home_url' ) ) {
  function vt_home_url() {
    return esc_url( home_url( '/' ) );
  }
  add_shortcode( 'vt_home_url', 'vt_home_url' );
}