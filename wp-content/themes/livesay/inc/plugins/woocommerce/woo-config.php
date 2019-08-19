<?php
/*
 * All WooCommerce Related Functions
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

if ( class_exists( 'WooCommerce' ) ) {

	/**
	 * Remove each style one by one
	 * https://docs.woothemes.com/document/disable-the-default-stylesheet/
	 */
	add_filter( 'woocommerce_enqueue_styles', 'livesay_dequeue_styles' );
	function livesay_dequeue_styles( $enqueue_styles ) {
		unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
		unset( $enqueue_styles['woocommerce-layout'] ); // Remove the layout
		return $enqueue_styles;
	}

	add_filter('woocommerce_variable_price_html','livesay_custom_from',10);
	add_filter('woocommerce_grouped_price_html','livesay_custom_from',10);
	add_filter('woocommerce_variable_sale_price_html','livesay_custom_from',10);
	function livesay_custom_from($price){
		return false;
	}

	// Rearrange rating, product title & price
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
	remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

  // Removed product image function and wrap image and add to cart button in a div class named woo-prdt-img
	remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
	function livesay_woocommerce_template_loop_product_link_open() {
		echo '<div class="woo-prdt-img"><a href="' . esc_url(get_the_permalink()) . '" class="woocommerce-LoopProduct-link">';
	}
	add_action( 'woocommerce_before_shop_loop_item', 'livesay_woocommerce_template_loop_product_link_open', 10 );

	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
	function livesay_woocommerce_template_loop_product_link_close($args = array()) {

			global $product;
				if ( $product ) {
					$defaults = array(
						'quantity' => 1,
						'class'    => implode( ' ', array_filter( array(
								'button',
								'product_type_' . $product->get_type(),
								$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
								$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
						) ) ),
						'attributes' => array(
							'data-product_id'  => $product->get_id(),
							'data-product_sku' => $product->get_sku(),
							'aria-label'       => $product->add_to_cart_description(),
							'rel'              => 'nofollow',
						),
					);

					$args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );

					wc_get_template( 'loop/add-to-cart.php', $args );
				}
				echo '</a>';
				echo '</div>';
				echo '<h3><a href="' . esc_url(get_the_permalink()) . '">' . esc_attr(get_the_title()) . '</a>';
				echo '</h3>';
				wc_get_template( 'loop/price.php' );
	}
	add_action( 'woocommerce_after_shop_loop_item', 'livesay_woocommerce_template_loop_product_link_close', 5 );

  // Removed add to cart
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

	// Remove WooCommerce Default Pagination & Add our Own Pagination
	remove_action('woocommerce_pagination', 'woocommerce_pagination', 10);
	function livesay_woocommerce_pagination() {
		echo '<div class="lvsy-pagination">';
		livesay_paging_nav();
		echo '</div>';
	}
	add_action( 'woocommerce_pagination', 'livesay_woocommerce_pagination', 10);

	// Payment Method Title
	function livesay_checkout_payment_method_title() {
	  echo '<h3 id="order_review_heading">'. esc_html__('Payment method', 'livesay') .'</h3>';
	}
	add_action('woocommerce_checkout_order_review','livesay_checkout_payment_method_title');

	// Rename Additional Information tab in product detail page
	function livesay_woo_rename_tabs( $tabs ) {
		global $product;
		if ( $product && ( $product->has_attributes() || apply_filters( 'wc_product_enable_dimensions_display', $product->has_weight() || $product->has_dimensions() ) ) ) {
				$tabs['additional_information']['title'] = esc_html__( 'Product Info', 'livesay' );	// Rename the additional information tab
		}
			return $tabs;
	}
	add_filter( 'woocommerce_product_tabs', 'livesay_woo_rename_tabs', 98 );

	// WooCommerce Products per Page Limit
	add_filter( 'loop_shop_per_page', 'livesay_product_limit', 20 );
	if ( ! function_exists('livesay_product_limit') ) {
		function livesay_product_limit() {
			$woo_limit = cs_get_option('theme_woo_limit');
			$woo_limit = $woo_limit ? $woo_limit : '9';
			return $woo_limit;
		}
	}

	// Remove Shop Page Title
	add_filter( 'woocommerce_show_page_title' , 'livesay_hide_page_title' );
	function livesay_hide_page_title() {
		return false;
	}

	// Single Product Single/Gallery Script
	add_action( 'after_setup_theme', 'livesay_single_product_gallery_image' );
	function livesay_single_product_gallery_image() {
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}

	// Remove Breadcrumbs
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

	// Product Column
	add_filter('loop_shop_columns', 'livesay_loop_columns');
	if ( ! function_exists('livesay_loop_columns') ) {
		function livesay_loop_columns() {
			return cs_get_option('woo_product_columns', '3');
		}
	}

	// Remove Cross Sells => "You may be interested in" from Cart Page
	remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );

	// Remove the Product Description Title
	add_filter('woocommerce_product_description_heading', 'livesay_product_description_heading');
	function livesay_product_description_heading() {
	return '';
	}

	// Single Product Page - Related Products Limit
	add_filter( 'woocommerce_output_related_products_args', 'livesay_related_products_args' );
  function livesay_related_products_args( $args ) {
  	$woo_related_limit = cs_get_option('woo_related_limit');
		$args['posts_per_page'] = (int)$woo_related_limit; // 4 related products
		return $args;
	}

	// Remove Related Products - Single Page
  $woo_single_related = cs_get_option('woo_single_related');
  if (isset($woo_single_related) ) {
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
	}

	// Remove "You May Also Like..." Products - Single Page
  $woo_single_upsell = cs_get_option('woo_single_upsell');
  if ($woo_single_upsell) {
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
	}

	// Define image sizes
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 270,
		'single_image_width' => 440,
	) );

	update_option( 'woocommerce_thumbnail_cropping', 'custom' );
	update_option( 'woocommerce_thumbnail_cropping_custom_width', '7' );
	update_option( 'woocommerce_thumbnail_cropping_custom_height', '9' );

	// Change the gravator image size in review authors - Single Product Page - Use Same function name of : woocommerce_review_display_gravatar
	if ( ! function_exists( 'woocommerce_review_display_gravatar' ) ) {
		function woocommerce_review_display_gravatar( $comment ) {
			echo get_avatar( $comment, apply_filters( 'woocommerce_review_gravatar_size', '80' ), '' );
		}
	}

	// Add to cart text
	function livesay_add_to_cart_text_change() {

		// Add To Cart Change Text
		add_filter( 'woocommerce_product_single_add_to_cart_text', 'livesay_woo_add_cart_button' );    // 2.1 +
		function livesay_woo_add_cart_button() {
			$woo_cart_text = cs_get_option('add_to_cart_text');
			if ($woo_cart_text) {
				$woo_cart = $woo_cart_text;
			} else {
				$woo_cart = esc_html__('Add To Bag', 'livesay');
			}
			return $woo_cart;
		}

		add_filter( 'woocommerce_product_add_to_cart_text' , 'livesay_product_add_to_cart' );
		function livesay_product_add_to_cart() {
			$woo_cart_text = cs_get_option('add_to_cart_text');
			if ($woo_cart_text) {
				$woo_cart = $woo_cart_text;
			} else {
				$woo_cart = esc_html__('Add To Bag', 'livesay');
			}
			global $product;
			$grouped = $product->is_type( 'grouped' );
			$variable = $product->is_type( 'variable' );
			if ($grouped) {
				$button_text = esc_html__( 'View', 'livesay' );
			} elseif($variable) {
				$button_text = esc_html__( 'Select Option', 'livesay' );
			} else {
				$button_text = $woo_cart;
			}
			return $button_text;
		}

	} // Function OT
	add_action( 'after_setup_theme', 'livesay_add_to_cart_text_change' );

} // class_exists => WooCommerce