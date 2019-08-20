<?php
/*
 * Codestar Framework - Custom Style
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/* All Dynamic CSS Styles */
if ( ! function_exists( 'livesay_dynamic_styles' ) ) {
  function livesay_dynamic_styles() {

    // Typography
    $livesay_vt_get_typography  = livesay_vt_get_typography();

    $all_element_color  = cs_get_customize_option( 'all_element_colors' );

    // Logo
    $brand_logo_top     = cs_get_option( 'brand_logo_top' );
    $brand_logo_bottom  = cs_get_option( 'brand_logo_bottom' );

    // Layout
    $bg_type = cs_get_option('theme_layout_bg_type');
    $bg_pattern = cs_get_option('theme_layout_bg_pattern');
    $bg_image = cs_get_option('theme_layout_bg');
    $bg_overlay_color = cs_get_option('theme_bg_overlay_color');

    // Footer
    $footer_bg_color  = cs_get_customize_option( 'footer_bg_color' );
    $footer_heading_color  = cs_get_customize_option( 'footer_heading_color' );
    $footer_text_color  = cs_get_customize_option( 'footer_text_color' );
    $footer_link_color  = cs_get_customize_option( 'footer_link_color' );
    $footer_link_hover_color  = cs_get_customize_option( 'footer_link_hover_color' );

  ob_start();

$livesay_id    = ( isset( $post ) ) ? $post->ID : 0;
$livesay_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $livesay_id;
$livesay_id    = ( livesay_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $livesay_id;
$livesay_meta  = get_post_meta( $livesay_id, 'page_type_metabox', true );

/* Layout - Theme Options - Background */
if ($bg_type === 'bg-image') {

  $layout_boxed = ( ! empty( $bg_image['image'] ) ) ? 'background-image: url('. $bg_image['image'] .');' : '';
  $layout_boxed .= ( ! empty( $bg_image['repeat'] ) ) ? 'background-repeat: '. $bg_image['repeat'] .';' : '';
  $layout_boxed .= ( ! empty( $bg_image['position'] ) ) ? 'background-position: '. $bg_image['position'] .';' : '';
  $layout_boxed .= ( ! empty( $bg_image['attachment'] ) ) ? 'background-attachment: '. $bg_image['attachment'] .';' : '';
  $layout_boxed .= ( ! empty( $bg_image['size'] ) ) ? 'background-size: '. $bg_image['size'] .';' : '';
  $layout_boxed .= ( ! empty( $bg_image['color'] ) ) ? 'background-color: '. $bg_image['color'] .';' : '';

echo <<<CSS
  .no-class {}
  .layout-boxed {
    {$layout_boxed}
  }
CSS;
}
if ($bg_type === 'bg-pattern') {
$custom_bg_pattern = cs_get_option('custom_bg_pattern');
$layout_boxed = ( $bg_pattern === 'custom-pattern' ) ? 'background-image: url('. $custom_bg_pattern .');' : 'background-image: url('. esc_url(LIVESAY_IMAGES) . '/patterns/'. $bg_pattern .'.png);';

echo <<<CSS
  .no-class {}
  .layout-boxed {
    {$layout_boxed}
  }
CSS;
}

/* Top Bar - Customizer - Background */
$topbar_bg_color  = cs_get_customize_option( 'topbar_bg_color' );
if ($topbar_bg_color) {
echo <<<CSS
  .no-class {}
  .lvsy-topbar {
    background-color: {$topbar_bg_color};
  }
CSS;
}
if ($livesay_meta) {
  $topbar_border_color  = $livesay_meta['topbar_border'];
} else {
  $topbar_border_color  = cs_get_customize_option( 'topbar_border_color' );
}
$topbar_border_color = ( $topbar_border_color ) ? $livesay_meta['topbar_border'] : cs_get_customize_option( 'topbar_border_color' );
if ($topbar_border_color) {
echo <<<CSS
  .no-class {}
  .lvsy-topbar-right .lvsy-tr-element,
  .lvsy-topbar-left .lvsy-tr-element {
    border-color: {$topbar_border_color};
  }
CSS;
}
$topbar_text_color  = cs_get_customize_option( 'topbar_text_color' );
if ($topbar_text_color) {
echo <<<CSS
  .no-class {}
  .lvsy-topbar-left, .lvsy-top-active, .lvsy-top-active i {
    color: {$topbar_text_color};
  }
CSS;
}
$topbar_link_color  = cs_get_customize_option( 'topbar_link_color' );
if ($topbar_link_color) {
echo <<<CSS
  .no-class {}
  .lvsy-topbar a, .lvsy-top-active, .lvsy-top-active i {
    color: {$topbar_link_color};
  }
CSS;
}
$topbar_link_hover_color  = cs_get_customize_option( 'topbar_link_hover_color' );
if ($topbar_link_hover_color) {
echo <<<CSS
  .no-class {}
  .lvsy-topbar a:hover, .lvsy-top-active:hover, .lvsy-top-active:focus, .lvsy-top-active:hover i, .lvsy-top-active:focus i {
    color: {$topbar_link_hover_color};
  }
CSS;
}
$topbar_social_color  = cs_get_customize_option( 'topbar_social_color' );
if ($topbar_social_color) {
echo <<<CSS
  .no-class {}
  .lvsy-tr-element .lvsy-social a {
    color: {$topbar_social_color};
  }
CSS;
}
$topbar_social_hover_color  = cs_get_customize_option( 'topbar_social_hover_color' );
if ($topbar_social_hover_color) {
echo <<<CSS
  .no-class {}
  .lvsy-tr-element .lvsy-social a:hover {
    color: {$topbar_social_hover_color};
  }
CSS;
}

/* Title Area - Theme Options - Background */
$titlebar_bg = cs_get_option('titlebar_bg');
$title_heading_color  = cs_get_customize_option( 'titlebar_title_color' );
if ($titlebar_bg) {

  $title_area = ( ! empty( $titlebar_bg['image'] ) ) ? 'background-image: url('. $titlebar_bg['image'] .');' : '';
  $title_area .= ( ! empty( $titlebar_bg['repeat'] ) ) ? 'background-repeat: '. $titlebar_bg['repeat'] .';' : '';
  $title_area .= ( ! empty( $titlebar_bg['position'] ) ) ? 'background-position: '. $titlebar_bg['position'] .';' : '';
  $title_area .= ( ! empty( $titlebar_bg['attachment'] ) ) ? 'background-attachment: '. $titlebar_bg['attachment'] .';' : '';
  $title_area .= ( ! empty( $titlebar_bg['size'] ) ) ? 'background-size: '. $titlebar_bg['size'] .';' : '';
  $title_area .= ( ! empty( $titlebar_bg['color'] ) ) ? 'background-color: '. $titlebar_bg['color'] .';' : '';

echo <<<CSS
  .no-class {}
  .lvsy-title-area {
    {$title_area}
  }
CSS;
}
if ($title_heading_color) {
echo <<<CSS
  .no-class {}
  .lvsy-page-title .page-title {
    color: {$title_heading_color};
  }
CSS;
}

// Heading Colors
$content_heading_color  = cs_get_customize_option( 'content_heading_color' );
if ($content_heading_color) {
echo <<<CSS
  .no-class {}
  .lvsy-primary h1,
  .lvsy-primary h2,
  .lvsy-primary h3,
  .lvsy-primary h4,
  .lvsy-primary h5,
  .lvsy-primary h6,
  .lvsy-content-side h1,
  .lvsy-content-side h2,
  .lvsy-content-side h3,
  .lvsy-content-side h4,
  .lvsy-content-side h5,
  .lvsy-content-side h6,
  .lvsy-donor-info h5,
  .lvsy-donor-title,
  .service-title,
  .facility-title,
  .news-title,
  .accommodation-title,
  .section-title, h3.blog-title a, .conference-title {color: {$content_heading_color};}
CSS;
}
$sidebar_heading_color  = cs_get_customize_option( 'sidebar_heading_color' );
if ($sidebar_heading_color) {
echo <<<CSS
  .no-class {}
  .lvsy-secondary h1,
  .lvsy-secondary h2,
  .lvsy-secondary h3,
  .lvsy-secondary h4,
  .lvsy-secondary h5,
  .lvsy-secondary h6,
  .lvsy-widget .widget-title {color: {$sidebar_heading_color};}
CSS;
}

// Breadcrubms
$breadcrumbs_text_color  = cs_get_customize_option( 'breadcrumbs_text_color' );
$breadcrumbs_link_color  = cs_get_customize_option( 'breadcrumbs_link_color' );
$breadcrumbs_link_hover_color  = cs_get_customize_option( 'breadcrumbs_link_hover_color' );
$breadcrumbs_bg_color  = cs_get_customize_option( 'breadcrumbs_bg_color' );
if ($breadcrumbs_text_color) {
echo <<<CSS
  .no-class {}
  .lvsy-breadcrumbs ol, .breadcrumb > .active, .breadcrumb > li + li:before {
    color: {$breadcrumbs_text_color};
  }
CSS;
}
if ($breadcrumbs_link_color) {
echo <<<CSS
  .no-class {}
  .lvsy-breadcrumbs a, .error404 .lvsy-page-title a {
    color: {$breadcrumbs_link_color};
  }
CSS;
}
if ($breadcrumbs_link_hover_color) {
echo <<<CSS
  .no-class {}
  .lvsy-breadcrumbs ol.breadcrumb a:hover {
    color: {$breadcrumbs_link_hover_color};
  }
CSS;
}

/* Footer */
if ($footer_bg_color) {
echo <<<CSS
  .no-class {}
  .lvsy-footer {background-color: {$footer_bg_color};}
CSS;
}
if ($footer_heading_color) {
echo <<<CSS
  .no-class {}
  .lvsy-footer .lvsy-widget .widget-title {color: {$footer_heading_color};}
CSS;
}
if ($footer_text_color) {
echo <<<CSS
  .no-class {}
  .lvsy-footer .lvsy-widget p,
  .lvsy-footer .widget_rss .rssSummary, .lvsy-footer span.rss-date, .lvsy-footer .widget_rss cite,
  .lvsy-footer .widget_recent_comments li.recentcomments,
  .lvsy-footer .lvsy-widget.widget_calendar table td,
  .lvsy-footer .lvsy-widget.widget_calendar caption,
  .lvsy-footer .lvsy-widget.woocommerce.widget_product_categories .count,
  .lvsy-footer .lvsy-widget.woocommerce.widget_products ul.product_list_widget span.woocommerce-Price-amount,
  .lvsy-footer .lvsy-widget.woocommerce.widget_recent_reviews .reviewer,
  .lvsy-footer .lvsy-widget.woocommerce.widget_top_rated_products .woocommerce-Price-amount,
  .lvsy-footer .lvsy-widget.widget_archive select,
  .lvsy-footer .lvsy-widget.widget_calendar table th,
  .lvsy-footer .lvsy-widget.widget_archive li,
  .lvsy-footer .lvsy-widget.widget_categories li,
  .lvsy-footer .lvsy-widget.widget_categories select,
  .lvsy-footer .lvsy-widget.widget_search form input,
  .lvsy-footer .lvsy-widget.widget_calendar table tbody tr td {color: {$footer_text_color};}
CSS;
}
if ($footer_link_color) {
echo <<<CSS
  .no-class {}
  .lvsy-footer a,
  .lvsy-footer .lvsy-widget a, .lvsy-footer .lvsy-widget ul li a,
  .lvsy-footer .lvsy-widget.woocommerce.widget_products ul.product_list_widget li a .product-title,
  .lvsy-footer .lvsy-widget.woocommerce a, .lvsy-footer .lvsy-widget.woocommerce ul li a,
  .lvsy-footer .lvsy-widget.woocommerce.widget_recent_reviews ul.product_list_widget li a,
  .lvsy-footer .lvsy-widget.widget_rss ul li a,
  .lvsy-footer .lvsy-widget.widget_nav_menu ul li a,
  .lvsy-footer .lvsy-widget.widget_recent_entries ul li a,
  .lvsy-footer .lvsy-widget.widget_recent_comments ul li a,
  .lvsy-footer .lvsy-widget.widget_meta ul li a,
  .lvsy-footer .lvsy-widget.widget_pages ul li a,
  .lvsy-footer .lvsy-widget.widget_categories ul li a,
  .lvsy-footer .tagcloud a,
  .lvsy-footer .lvsy-widget.widget_archive ul li a {color: {$footer_link_color};}

  .lvsy-footer .tagcloud a { border-color: {$footer_link_color};}
CSS;
}
if ($footer_link_hover_color) {
echo <<<CSS
  .no-class {}
  .lvsy-footer a:hover,
  .lvsy-footer .lvsy-widget a:hover, .lvsy-footer .lvsy-widget ul li a:hover,
  .lvsy-footer .lvsy-widget.woocommerce.widget_products ul.product_list_widget li a .product-title:hover,
  .lvsy-footer .lvsy-widget.woocommerce a:hover, .lvsy-footer .lvsy-widget.woocommerce ul li a:hover,
  .lvsy-footer .lvsy-widget.woocommerce.widget_recent_reviews ul.product_list_widget li a:hover,
  .lvsy-footer .lvsy-widget.widget_rss ul li a:hover,
  .lvsy-footer .lvsy-widget.widget_nav_menu ul li a:hover,
  .lvsy-footer .lvsy-widget.widget_recent_entries ul li a:hover,
  .lvsy-footer .lvsy-widget.widget_recent_comments ul li a:hover,
  .lvsy-footer .lvsy-widget.widget_meta ul li a:hover,
  .lvsy-footer .lvsy-widget.widget_pages ul li a:hover,
  .lvsy-footer .lvsy-widget.widget_categories ul li a:hover,
  .lvsy-footer .tagcloud a:hover,
  .lvsy-footer .lvsy-widget.widget_archive ul li a:hover {color: {$footer_link_hover_color};}

  .lvsy-footer .tagcloud a:hover { border-color: {$footer_link_hover_color};}
CSS;
}

/* Primary Colors */
if ($all_element_color) {
echo <<<CSS
  .no-class {}
  .lvsy-btn, .lvsy-btn-white:hover, .lvsy-btn-white:focus, input[type="submit"],
  .swiper-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active,
  .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover,
  .owl-drag .owl-dot.active,
  .vertical-handle, .horizontal-handle,
  .lvsy-nav .dropdown-menu,
  .shopping-handbag > a > span.shopping-counter,
  .event-info .speaker-name .speaker-designation:before,
  .lvsy-event-schedule.schedule-style-two .event-info:before,
  .lvsy-event-schedule.schedule-style-two .event-info .event-title:before,
  .lvsy-join-event.join-style-two, .widget_shopping_cart .buttons a,
  .woocommerce .widget_price_filter .ui-slider .ui-slider-range,
  .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
  .widget_price_filter .price_slider_amount .button:hover, .rangeSlider__fill,
  .woocommerce .price-filter button:hover, .woocommerce .price-filter button:focus,
  .lvsy-footer .widget_price_filter .price_slider_amount .button, .woocommerce span.onsale,
  .woocommerce ul.products li.product .button, .woocommerce ul.products li.product a.added_to_cart.wc-forward,
  .woocommerce div.product form.cart .button, .woocommerce #review_form #respond .form-submit input,
  .woocommerce a.remove:hover:before, .woocommerce a.remove:hover:after,
  .woocommerce .wc-proceed-to-checkout .button.alt, .woocommerce form .form-row input.button,
  .woocommerce-account .woocommerce input.button,
  .woocommerce-account .woocommerce a.button, .lvsy-back-top a:hover,
  .woocommerce ul.products li.product.lvsy-hover a.added_to_cart.wc-forward, .woocommerce ul.products li.product.lvsy-hover a.added_to_cart.wc-forward {background-color: {$all_element_color};}
  .lvsy-btn {border-color: {$all_element_color};}

  a:hover, a:focus, .checkbox-icon-wrap input[type="checkbox"]:checked + .checkbox-icon:before,
  .swiper-button-prev:hover:before, .swiper-button-next:hover:before,
  .owl-drag .owl-prev:hover:before, .owl-drag .owl-next:hover:before,
  .lvsy-header.header-style-two .shopping-handbag > a:hover, .speaker-info a:hover,
  .event-address a:hover, .gallery-info a:hover, .lvsy-footer .lvsy-social a:hover,
  .lvsy-copyright a:hover, .news-info .news-meta a:hover, .lvsy-speakers.speakers-style-three .speaker-info a:hover,
  .lvsy-speakers.speakers-style-three .lvsy-social a:hover, .lvsy-page-title a:hover, .event-author ul li a:hover,
  .event-author ul li .lvsy-social a:hover, .venus-info p a:hover, table a:hover, .lvsy-donor-profile ul li a:hover,
  .lvsy-donor-profile ul li .lvsy-social a:hover, .speaker-link a:hover, .speaker-link .lvsy-social a:hover,
  .blog-meta a:hover, .lvsy-widget ul li a:hover, .lvsy-page-title.title-style-two a:hover,
  .contact-info ul li a:hover, .woocommerce table.shop_table td.product-thumbnail a:hover,
  .lvsy-header.header-style-two .lvsy-nav > ul > li.active > a, .lvsy-header.header-style-two .lvsy-nav > ul > li:hover > a,
  .lvsy-header .lvsy-nav > ul > li.active > a, .lvsy-header .lvsy-nav > ul > li:hover > a,
  .lvsy-nav > ul > li.active > a, .lvsy-nav > ul > li:hover > a, .conference-sub-title, .event-info .speaker-name, .travel-time span,
  .additional-pricing p a, .buy-ticket-link a, .speaker-detail-wrap .speaker-designation, .speaker-events-link a:hover,
  .woocommerce a.remove:hover, .lvsy-footer .woocommerce a.remove:hover, .lvsy-footer .lvsy-widget ul li a:hover,
  .woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
  .continue-reading a, .lvsy-widget a:hover, .lvsy-footer .tagcloud a:hover, .lvsy-footer .tagcloud a:focus {color: {$all_element_color};}

  ::selection {background: {$all_element_color};}
  ::-webkit-selection {background: {$all_element_color};}
  ::-moz-selection {background: {$all_element_color};}
  ::-o-selection {background: {$all_element_color};}
  ::-ms-selection {background: {$all_element_color};}

  .lvsy-btn-white:hover, .lvsy-btn-white:focus,
  .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover,
  .owl-drag .owl-prev:hover:before, .owl-drag .owl-next:hover:before,
  .event-speaker:before, .lvsy-event-schedule.schedule-tab-style-two .nav-tabs > li.active > a,
  .lvsy-event-schedule.schedule-tab-style-two .nav-tabs > li.active > a:focus,
  .lvsy-event-schedule.schedule-tab-style-two .nav-tabs > li.active > a:hover, .tagcloud a:hover, .tagcloud a:focus,
  .lvsy-back-top a:hover, .lvsy-footer .tagcloud a:hover, .lvsy-footer .tagcloud a:focus {border-color: {$all_element_color};}

  body.wpb-js-composer .vc_tta-tabs:not([class*=vc_tta-gap]):not(.vc_tta-o-no-fill).vc_tta-tabs-position-top .vc_tta-tab.vc_active>a {border-bottom-color: {$all_element_color};}
  blockquote {border-left-color: {$all_element_color};}
CSS;
}
// Button Hover Colors
$botton_hover_color  = cs_get_customize_option( 'button_hover_colors' );
if ($botton_hover_color) {
echo <<<CSS
  .no-class {}
  .lvsy-btn:hover, .lvsy-btn:focus,
  input[type="submit"]:hover, input[type="submit"]:focus,
  .pricing-item.lvsy-hover .lvsy-btn,
  .lvsy-btn-black:hover, .lvsy-btn-black:focus, .woocommerce ul.products li.product .button:hover,
  .woocommerce ul.products li.product .button:focus,
  .woocommerce .cart .actions input[type="submit"]:hover,
  .woocommerce .cart .actions input[type="submit"]:focus,
  .woocommerce .wc-proceed-to-checkout .button.alt:hover,
  .woocommerce .wc-proceed-to-checkout .button.alt:focus,
  .woocommerce form .form-row input.button:hover,
  .woocommerce form .form-row input.button:focus {background-color: {$botton_hover_color};}

  .pricing-item.lvsy-hover .lvsy-btn, .lvsy-btn:hover,
  .lvsy-btn-black:hover, .lvsy-btn-black:focus {border-color: {$botton_hover_color};}
CSS;
}

/* Header - Customizer */
$cart_widget_bg_color  = cs_get_customize_option( 'cart_widget_bg_color' );
if ($cart_widget_bg_color) {
echo <<<CSS
  .no-class {}
  .shopping-handbag > a > span.shopping-counter {
    background-color: {$cart_widget_bg_color};
  }
CSS;
}
$header_bg_color  = cs_get_customize_option( 'header_bg_color' );
if ($header_bg_color) {
echo <<<CSS
  .no-class {}
  .lvsy-header {
    background-color: {$header_bg_color};
  }
  .lvsy-header {
    border-bottom-color: {$header_bg_color};
  }
CSS;
}
$header_link_color  = cs_get_customize_option( 'header_link_color' );
$header_link_hover_color  = cs_get_customize_option( 'header_link_hover_color' );
if($header_link_color || $header_link_hover_color) {
echo <<<CSS
  .no-class {}
  .lvsy-nav .navbar-nav > li > a {
    color: {$header_link_color};
  }
  .mean-container a.meanmenu-reveal span {
    background-color: {$header_link_color};
  }
  .header-right .lvsy-nav .navbar-nav li a:hover, .header-right .lvsy-nav .navbar-nav li a:active,
  .navbar-nav li a:focus {
    color: {$header_link_hover_color};
  }
CSS;
}
// Metabox - Header Transparent
if ($livesay_meta) {
  $transparent_header = $livesay_meta['transparency_header'];
  $transparent_menu_color = $livesay_meta['transparent_menu_color'];
  $transparent_menu_hover = $livesay_meta['transparent_menu_hover_color'];
} else {
  $transparent_header = '';
  $transparent_menu_color = '';
  $transparent_menu_hover = '';
}
if ($transparent_header) {
echo <<<CSS
  .no-class {}
  .lvsy-header.header-style-two .lvsy-nav > ul > li > a {
    color: {$transparent_menu_color};
  }

  .lvsy-header.header-style-two .lvsy-nav > ul > li > a:hover {
    color: {$transparent_menu_hover};
  }
CSS;
}

$submenu_bg_color  = cs_get_customize_option( 'submenu_bg_color' );
$submenu_border_color  = cs_get_customize_option( 'submenu_border_color' );
$submenu_link_color  = cs_get_customize_option( 'submenu_link_color' );
$submenu_link_hover_color  = cs_get_customize_option( 'submenu_link_hover_color' );
if ($submenu_bg_color || $submenu_border_color || $submenu_link_color || $submenu_link_hover_color) {
echo <<<CSS
  .no-class {}
  .lvsy-nav .navbar-nav .dropdown-menu li a {
    border-bottom-color: {$submenu_border_color};
    color: {$submenu_link_color};
  }
  .lvsy-nav .navbar-nav .dropdown-menu li a:hover {
    color: {$submenu_link_hover_color};
  }
  .lvsy-nav .dropdown-menu {
    background-color: {$submenu_bg_color};
  }
  .mean-container .mean-nav ul.sub-menu li a {
    color: {$submenu_link_color};
  }
  .mean-container .mean-nav ul li li a,
  .mean-container .mean-nav ul li li li a,
  .mean-container .mean-nav ul li li li li a,
  .mean-container .mean-nav ul li li li li li a {
    border-bottom-color: {$submenu_border_color};
  }
CSS;
}

// Content Colors
$body_color  = cs_get_customize_option( 'body_color' );
if ($body_color) {
echo <<<CSS
  .no-class {}
  body,
  p,
  input[type="text"],
  input[type="email"],
  input[type="password"],
  input[type="tel"],
  input[type="search"],
  input[type="date"],
  input[type="time"],
  input[type="datetime-local"],
  input[type="month"],
  input[type="url"],
  input[type="number"],
  textarea, select,
  .share-blog span,
  .woocommerce-Price-amount,
  .blog-link.share.hover .link-inner > .link-title,
  .woocommerce .product_meta,
  .woocommerce .woocommerce-result-count,
  .woocommerce-page .woocommerce-result-count,
  .woocommerce .woocommerce-ordering select,
  .woocommerce .cart_totals table.shop_table th,
  .woocommerce form .form-row input.input-text,
  .woocommerce form .form-row select,
  .woocommerce form .form-row textarea,
  .lvsy-widget select,
  .woocommerce form.woocommerce-checkout .form-row label,
  form label,
  .woocommerce .woocommerce-checkout-review-order table.shop_table th,
  .woocommerce-error, .woocommerce-info, .woocommerce-message,
  .woocommerce .woocommerce-table--order-details tfoot tr th,
  .woocommerce .woocommerce-table--order-details tfoot tr td,
  table.woocommerce-table.woocommerce-table--customer-details.shop_table.customer_details tbody tr th,
  table.woocommerce-table.woocommerce-table--customer-details.shop_table.customer_details tbody tr td,
  .lvsy-conference .conference-location, .lvsy-conference .lvsy-countdown,
  .lvsy-conference.conference-style-three .conference-location,
  .lvsy-conference.conference-style-three p, .event-address span, .event-address,
  .woocommerce table.shop_table .product-subtotal, table td,
  .section-title-wrap .section-sub-title, .pricing-info ul, .news-info .news-meta,
  .lvsy-travel-info span, .lvsy-travel-info .nav-tabs > li.active > a,
  .lvsy-conference.conference-style-three, .speaker-info .speaker-designation,
  span.vc_tta-title-text, .lvsy-join-event, .lvsy-join-event .section-title-wrap .section-sub-title,
  .speaker-link span, .speaker-events-link span,
  .lvsy-donor-profile ul li .lvsy-donor-lable, .lvsy-donor-profile ul,
  span.tribe-address, .lvsy-event-contact-info, .lvsy-blog-meta, .blog-meta,
  .lvsy-comments-area .lvsy-comments-meta .comments-date, .contact-info ul, .event-address span i,
  .lvsy-event-files p {color: {$body_color};}
CSS;
}
$body_links_color  = cs_get_customize_option( 'body_links_color' );
if ($body_links_color) {
echo <<<CSS
  .no-class {}
  body a,
  .blog-meta a,
  .lvsy-blog-one .bp-top-meta > div a,
  .widget_list_style ul a,
  .widget_categories ul a,
  .widget_archive ul a,
  .widget_recent_comments ul a,
  .widget_recent_entries ul a,
  .widget_meta ul a,
  .widget_pages ul a,
  .widget_rss ul a,
  .widget_nav_menu ul a,
  .widget_layered_nav ul a,
  .widget_product_categories ul a,
  .woocommerce ul.product_list_widget a,
  .event-address a,
  .woocommerce table.shop_table td.product-thumbnail a, .gallery-info a, .speaker-info a,
  .news-info .news-meta a, .speaker-link a, .speaker-link .lvsy-social a,
  .lvsy-donor-profile ul li a, .lvsy-donor-profile ul li .lvsy-social a,
  .lvsy-donor-profile ul li .lvsy-social span, .lvsy-event-contact-info span a,
  .lvsy-blog-tags ul li a, .contact-info ul li a, .lvsy-link-underline,
  .nav-tabs > li > a {color: {$body_links_color};}
CSS;
}
$body_link_hover_color  = cs_get_customize_option( 'body_link_hover_color' );
if ($body_link_hover_color) {
echo <<<CSS
  .no-class {}
  body a:hover,
  body a:focus,
  .lvsy-blog-one .bp-top-meta > div a:hover,
  .widget_list_style ul a:hover,
  .widget_categories ul a:hover,
  .widget_archive ul a:hover,
  .widget_recent_comments ul a:hover,
  .widget_recent_entries ul a:hover,
  .widget_meta ul a:hover,
  .widget_pages ul a:hover,
  .widget_rss ul a:hover,
  .widget_nav_menu ul a:hover,
  .widget_layered_nav ul a:hover,
  .widget_product_categories ul a:hover,
  .woocommerce ul.product_list_widget a:hover,
  .event-address a:hover,
  .blog-info .blog-meta a:hover,
  .woocommerce table.shop_table td.product-thumbnail a:hover,
  .gallery-info a:hover, .speaker-info a:hover,
  .news-info .news-meta a:hover, .speaker-link a:hover, .speaker-link .lvsy-social a:hover,
  .lvsy-donor-profile ul li a:hover, .lvsy-donor-profile ul li .lvsy-social a:hover,
  .lvsy-blog-tags ul li a:hover, .contact-info ul li a:hover,
  .lvsy-travel-info .nav-tabs > li.active > a, .lvsy-travel-info .nav-tabs > li.active > a:focus, .lvsy-travel-info .nav-tabs > li.active > a:hover {color: {$body_link_hover_color};}
CSS;
}
$sidebar_content_color  = cs_get_customize_option( 'sidebar_content_color' );
if ($sidebar_content_color) {
echo <<<CSS
  .no-class {}
  .lvsy-secondary .lvsy-widget p,
  .lvsy-widget,
  .lvsy-secondary .widget_rss .rssSummary, .lvsy-secondary span.rss-date, .lvsy-secondary .widget_rss cite,
  .lvsy-secondary .widget_recent_comments li.recentcomments,
  .lvsy-secondary .lvsy-widget.widget_calendar table td,
  .lvsy-secondary .lvsy-widget.widget_calendar caption,
  .lvsy-secondary .lvsy-widget.woocommerce.widget_product_categories .count,
  .lvsy-secondary .lvsy-widget.woocommerce.widget_products ul.product_list_widget span.woocommerce-Price-amount,
  .lvsy-secondary .lvsy-widget.woocommerce.widget_recent_reviews .reviewer,
  .lvsy-secondary .lvsy-widget.woocommerce.widget_top_rated_products .woocommerce-Price-amount,
  .lvsy-secondary .lvsy-widget.widget_archive select,
  .lvsy-secondary .lvsy-widget.widget_archive li,
  .lvsy-secondary .lvsy-widget.widget_categories li,
  .lvsy-secondary .lvsy-widget.widget_calendar table th,
  .lvsy-secondary .lvsy-widget.widget_categories select,
  .lvsy-secondary .lvsy-widget.widget_search form input,
  .lvsy-secondary .lvsy-widget.widget_calendar table tbody tr td, .lvsy-widget.vt-text-widget,
  .lvsy-widget ul, .lvsy-widget input[type="search"] {color: {$sidebar_content_color};}
CSS;
}
$sidebar_link_color  = cs_get_customize_option( 'sidebar_link_color' );
if ($sidebar_link_color) {
echo <<<CSS
  .no-class {}
  .lvsy-secondary .lvsy-widget a, .lvsy-secondary .lvsy-widget ul li a,
  .lvsy-secondary .lvsy-widget.woocommerce.widget_products ul.product_list_widget a,
  .lvsy-secondary .lvsy-widget.woocommerce a, .lvsy-secondary .lvsy-widget.woocommerce ul li a,
  .lvsy-secondary .lvsy-widget.widget_rss ul li a,
  .lvsy-secondary .lvsy-widget.widget_nav_menu ul li a,
  .lvsy-secondary .lvsy-widget.widget_recent_entries ul li a,
  .lvsy-secondary .lvsy-widget.widget_recent_comments ul li a,
  .lvsy-secondary .lvsy-widget.widget_meta ul li a,
  .lvsy-secondary .lvsy-widget.widget_pages ul li a,
  .lvsy-secondary .lvsy-widget.widget_categories ul li a,
  .lvsy-secondary .lvsy-widget.widget_archive ul li a {color: {$sidebar_link_color};}
CSS;
}
$sidebar_link_hover_color  = cs_get_customize_option( 'sidebar_link_hover_color' );
if ($sidebar_link_hover_color) {
echo <<<CSS
  .no-class {}
  .lvsy-secondary .lvsy-widget a:hover, .lvsy-secondary .lvsy-widget ul li a:hover,
  .lvsy-secondary .lvsy-widget .tagcloud a:hover,
  .lvsy-secondary .lvsy-widget.woocommerce.widget_products ul.product_list_widget a:hover {color: {$sidebar_link_hover_color};}
  .tagcloud a:hover,
  .lvsy-secondary .lvsy-widget.widget_rss ul li a:hover,
  .lvsy-secondary .lvsy-widget.widget_nav_menu ul li a:hover,
  .lvsy-secondary .lvsy-widget.widget_recent_entries ul li a:hover,
  .lvsy-secondary .lvsy-widget.widget_recent_comments ul li a:hover,
  .lvsy-secondary .lvsy-widget.widget_meta ul li a:hover,
  .lvsy-secondary .lvsy-widget.widget_pages ul li a:hover,
  .lvsy-secondary .lvsy-widget.widget_categories ul li a:hover,
  .lvsy-secondary .lvsy-widget.widget_archive ul li a:hover {border-color: {$sidebar_link_hover_color};}
CSS;
}

/* Copyright */
$copyright_text_color  = cs_get_customize_option( 'copyright_text_color' );
$copyright_link_color  = cs_get_customize_option( 'copyright_link_color' );
$copyright_link_hover_color  = cs_get_customize_option( 'copyright_link_hover_color' );
$copyright_bg_color  = cs_get_customize_option( 'copyright_bg_color' );
$copyright_border_color  = cs_get_customize_option( 'copyright_border_color' );
if ($copyright_bg_color || $copyright_border_color) {
echo <<<CSS
  .no-class {}
  .lvsy-copyright {background: {$copyright_bg_color};border-color: {$copyright_border_color};}
CSS;
}
if ($copyright_text_color) {
echo <<<CSS
  .no-class {}
  .lvsy-copyright,
  .lvsy-copyright p {color: {$copyright_text_color};}
CSS;
}
if ($copyright_link_color) {
echo <<<CSS
  .no-class {}
  .lvsy-copyright a {color: {$copyright_link_color};}
CSS;
}
if ($copyright_link_hover_color) {
echo <<<CSS
  .no-class {}
  .lvsy-copyright a:hover {color: {$copyright_link_hover_color};}
CSS;
}

// Maintenance Mode
$maintenance_mode_bg  = cs_get_option( 'maintenance_mode_bg' );
if ($maintenance_mode_bg) {
  $maintenance_css = ( ! empty( $maintenance_mode_bg['image'] ) ) ? 'background-image: url('. $maintenance_mode_bg['image'] .');' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['repeat'] ) ) ? 'background-repeat: '. $maintenance_mode_bg['repeat'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['position'] ) ) ? 'background-position: '. $maintenance_mode_bg['position'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['attachment'] ) ) ? 'background-attachment: '. $maintenance_mode_bg['attachment'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['size'] ) ) ? 'background-size: '. $maintenance_mode_bg['size'] .';' : '';
  $maintenance_css .= ( ! empty( $maintenance_mode_bg['color'] ) ) ? 'background-color: '. $maintenance_mode_bg['color'] .';' : '';
echo <<<CSS
  .no-class {}
  .vt-maintenance-mode {
    {$maintenance_css}
  }
CSS;
}

// Mobile Menu Breakpoint
$mobile_breakpoint = cs_get_option('mobile_breakpoint');
$breakpoint = $mobile_breakpoint ? $mobile_breakpoint : '767';

echo <<<CSS
  .no-class {}
@media (max-width: {$breakpoint}px) {
  .lvsy-brand {background-color: #fff !important;}
  .navigation-bar,
  .top-nav-icons,
  .lvsy-nav-search,
  .hav-mobile-logo.lvsy-logo img.default-logo,
  .hav-mobile-logo.lvsy-logo img.retina-logo,
  .is-sticky .hav-mobile-logo.lvsy-logo img.default-logo.sticky-logo,
  .is-sticky .hav-mobile-logo.lvsy-logo img.retina-logo.sticky-logo,
  .header-transparent .is-sticky .lvsy-logo.hav-mobile-logo img.transparent-default-logo.sticky-logo,
  .lvsy-logo.hav-mobile-logo img.transparent-default-logo.sticky-logo {display: none;}
  .mean-container .top-nav-icons,
  .mean-container .lvsy-logo,
  .mean-container .lvsy-nav-search,
  .hav-mobile-logo.lvsy-logo img.mobile-logo,
  .header-transparent .lvsy-logo.hav-mobile-logo img.transparent-default-logo.transparent-logo {display: block;}
  .mean-container .container,
  .lvsy-nav ul {width: 100%;}

  .dhve-mobile-logo.lvsy-logo img.default-logo,
  .dhve-mobile-logo.lvsy-logo img.retina-logo,
  .is-sticky .dhve-mobile-logo.lvsy-logo img.default-logo.sticky-logo,
  .is-sticky .dhve-mobile-logo.lvsy-logo img.retina-logo.sticky-logo,
  .header-transparent .dhve-mobile-logo.lvsy-logo img.transparent-default-logo.transparent-logo,
  .header-transparent .is-sticky .dhve-mobile-logo.lvsy-logo img.transparent-default-logo.sticky-logo,
  .lvsy-logo..dhve-mobile-logo img.transparent-default-logo.sticky-logo {
    display: block;
  }

  .lvsy-header-two .mean-container .lvsy-logo {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 99999;
    padding: 0 20px;
  }
  .lvsy-header-two .mean-container .lvsy-navigation {
    position: absolute;
    right: 73px;
    top: 0;
    z-index: 9999;
  }
  .mean-container .lvsy-nav-search {
    float: left;
    left: 0;right: auto;
    background-color: rgba(0,0,0,0.4);
  }
  .mean-container .lvsy-search-three {
    position: absolute;
    width: 100%;
    left: 0;top: 0;
    z-index: 9999;
  }
  .mean-container .lvsy-search-three input {
    position: absolute;
    left: 0;top: 0;
    background: rgba(0,0,0,0.4);
  }
  .lvsy-header-two .mean-container .top-nav-icons {
    position: absolute;
    left: 0;
    z-index: 999999;
  }
  .lvsy-header-two .lvsy-brand {padding-top: 20px;padding-bottom: 0;}
  .lvsy-header {
    padding: 20px 0;
  }
  .lvsy-header.header-style-two .lvsy-nav > ul > li > a {
    color: #222222;
  }
  .lvsy-logo {
    padding-top: 0;
  }
  .lvsy-nav {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    width: 95%;
    height: 50vh;
    margin: 0 auto;
    overflow: auto;
    background: #ffffff;
    -webkit-box-shadow: 0 5px 5px rgba(0, 0, 0, 0.1);
    -ms-box-shadow: 0 5px 5px rgba(0, 0, 0, 0.1);
    box-shadow: 0 5px 5px rgba(0, 0, 0, 0.1);
    z-index: 1;
  }
  .lvsy-nav > ul > li {
    display: block;
    padding: 0;
    border-bottom: 1px solid rgba(0, 0, 0, 0.06);
    width: 100%;
  }
  .lvsy-nav > ul > li > a {
    padding: 13px 40px 13px 20px;
  }
  .lvsy-nav > ul > li.dropdown > a:after {
    position: absolute;
    top: 50%;
    right: 15px;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: 17px;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    content: "\\f107";
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    z-index: 1;
  }
  .navbar-nav > li > .dropdown-menu {
    position: static;
    width: 100%;
  }
  .lvsy-nav .dropdown-menu .dropdown-menu {
    top: 0;
    left: 0;
    position: relative;
    box-shadow: none;
    border: none;
    width: 100%;
    padding-top: 0;
  }
  .lvsy-nav .dropdown {
    position: static;
    min-width: 100%;
  }
  .lvsy-nav .dropdown-menu > li.dropdown > a:after {
    content: "\\f107";
  }
  .lvsy-toggle {
    display: inline-block;
  }
  .shopping-handbag {
    padding-left: 25px;
  }
}
CSS;

  echo $livesay_vt_get_typography;

  $output = ob_get_clean();
  return $output;

  }

}

/**
 * Custom Font Family
 */
if ( ! function_exists( 'livesay_custom_font_load' ) ) {
  function livesay_custom_font_load() {

    $font_family       = cs_get_option( 'font_family' );

    ob_start();

    if( ! empty( $font_family ) ) {

      foreach ( $font_family as $font ) {
        echo '@font-face{';

        echo 'font-family: "'. $font['name'] .'";';

        if( empty( $font['css'] ) ) {
          echo 'font-style: normal;';
          echo 'font-weight: normal;';
        } else {
          echo $font['css'];
        }

        echo ( ! empty( $font['ttf']  ) ) ? 'src: url('. esc_url($font['ttf']) .');' : '';
        echo ( ! empty( $font['eot']  ) ) ? 'src: url('. esc_url($font['eot']) .');' : '';
        echo ( ! empty( $font['woff'] ) ) ? 'src: url('. esc_url($font['woff']) .');' : '';
        echo ( ! empty( $font['otf']  ) ) ? 'src: url('. esc_url($font['otf']) .');' : '';

        echo '}';
      }

    }

    // Typography
    $output = ob_get_clean();
    return $output;
  }
}

/* Custom Styles */
if( ! function_exists( 'livesay_vt_custom_css' ) ) {
  function livesay_vt_custom_css() {
    wp_enqueue_style('livesay-default-style', get_template_directory_uri() . '/style.css');
    $output  = livesay_custom_font_load();
    $output .= livesay_dynamic_styles();
    $output .= cs_get_option( 'theme_custom_css' );
    $custom_css = livesay_compress_css_lines( $output );
    wp_add_inline_style( 'livesay-default-style', $custom_css );
  }
}

/* Custom JS */
if( ! function_exists( 'livesay_vt_custom_js' ) ) {
  function livesay_vt_custom_js() {
    $output = cs_get_option( 'theme_custom_js' );
    wp_add_inline_script( 'jquery-migrate', $output );
  }
  add_action( 'wp_enqueue_scripts', 'livesay_vt_custom_js' );
}