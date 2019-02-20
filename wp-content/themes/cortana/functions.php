<?php

if ( !function_exists( 'g5plus_include_theme_options' ) ) {
	function g5plus_include_theme_options() {

		if ( !class_exists( 'ReduxFramework' ) ) {
			require_once(  get_template_directory()  . '/g5plus-framework/options/framework.php' );
		}
		require_once(  get_template_directory()  . '/g5plus-framework/option-extensions/loader.php' );
		require_once(  get_template_directory()  . '/includes/options-config.php' );

		global $g5plus_cortana_options, $g5plus_options;
		$g5plus_options = $g5plus_cortana_options;
	}

	g5plus_include_theme_options();
}

function g5plus_check_vc_status() {
	if ( function_exists( 'vc_is_as_theme' ) ) {
		return true;
	} else {
		return false;
	}
}

if ( !function_exists( 'g5plus_include_library' ) ) {
	function g5plus_include_library() {
		require_once(  get_template_directory()  . '/g5plus-framework/g5plus-framework.php' );
		require_once(  get_template_directory()  . '/includes/register-require-plugin.php' );
		require_once(  get_template_directory()  . '/includes/theme-setup.php' );
		require_once(  get_template_directory()  . '/includes/sidebar.php' );
		require_once(  get_template_directory()  . '/includes/meta-boxes.php' );
		require_once(  get_template_directory()  . '/includes/admin-enqueue.php' );
		require_once(  get_template_directory()  . '/includes/theme-functions.php' );
		require_once(  get_template_directory()  . '/includes/theme-action.php' );
		require_once(  get_template_directory()  . '/includes/theme-filter.php' );
		require_once(  get_template_directory()  . '/includes/frontend-enqueue.php' );
		require_once(  get_template_directory()  . '/includes/tax-meta.php' );

		if ( g5plus_check_vc_status() == true ) {
			require_once(  get_template_directory()  . '/includes/vc-functions.php' );
		}
	}

	g5plus_include_library();
}

if ( !function_exists( 'g5plus_style_schemes_output' ) ) {
	function g5plus_style_schemes_output( $custom_style = '' ) {
		ob_start();
		echo( '<style>' . $custom_style . '</style>' );
		$content = ob_get_clean();

		return $content;
	}

	add_action( 'wp_head', 'g5plus_style_schemes_output', 10000000 );
}

if ( !function_exists( 'g5plus_hex2rgba' ) ) {
	function g5plus_hex2rgba( $hex, $alpha = '' ) {
		$hex = str_replace( "#", "", $hex );
		if ( strlen( $hex ) == 3 ) {
			$r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
			$g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
			$b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
		} else {
			$r = hexdec( substr( $hex, 0, 2 ) );
			$g = hexdec( substr( $hex, 2, 2 ) );
			$b = hexdec( substr( $hex, 4, 2 ) );
		}
		$rgb = $r . ',' . $g . ',' . $b;

		if ( '' == $alpha ) {
			return 'rgb(' . $rgb . ')';
		} else {
			$alpha = floatval( $alpha );

			return 'rgba(' . $rgb . ',' . $alpha . ')';
		}
	}
}
if ( !function_exists( 'woocommerce_clear_cart_url' ) ) {
	// check for empty-cart get param to clear the cart
	add_action( 'init', 'woocommerce_clear_cart_url' );
	function woocommerce_clear_cart_url() {
		global $woocommerce;
		if ( isset( $_GET['empty-cart'] ) ) {
			$woocommerce->cart->empty_cart();

		}
	}
}


