<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 6/1/2015
 * Time: 5:50 PM
 */
/*================================================
SITE LOADING
================================================== */
if ( !function_exists( 'g5plus_site_loading' ) ) {
	function g5plus_site_loading() {
		g5plus_get_template( 'site-loading' );
	}

	add_action( 'g5plus_before_page_wrapper', 'g5plus_site_loading', 5 );
}
/*================================================
G5plus Option
================================================== */
if ( !function_exists( 'g5plus_option' ) ) {
	function g5plus_option() {
		global $g5plus_options;
		return $g5plus_options;
	}
}/*================================================
g5plus_archive_loop
================================================== */
if ( !function_exists( 'g5plus_archive_loop' ) ) {
	function g5plus_archive_loop() {
		global $g5plus_archive_loop;
		return $g5plus_archive_loop;
	}
}
/*================================================
MOBILE FLY BODY OVERLAY
================================================== */
if ( !function_exists( 'g5plus_main_menu_overlay' ) ) {
	function g5plus_main_menu_overlay() {
		g5plus_get_template( 'main-menu-overlay' );
	}

	add_action( 'g5plus_main_menu_after', 'g5plus_main_menu_overlay', 10 );
}


/*================================================
BODY CLASS
================================================== */
if ( !function_exists( 'g5plus_body_class_name' ) ) {
	function g5plus_body_class_name( $classes ) {
		global $g5plus_options;
		$prefix = 'g5plus_';

		$classes[] = 'footer-static';
		if ( $g5plus_options['home_preloader'] != 'none' && !empty( $g5plus_options['home_preloader'] ) ) {
			$classes[] = 'site-loading';
		}

		$layout_style = rwmb_meta( $prefix . 'layout_style' );
		if ( ( $layout_style == '' ) || ( $layout_style == "-1" ) ) {
			$layout_style = $g5plus_options['layout_style'];
		}
		if ( $layout_style == 'boxed' ) {
			$classes[] = 'boxed';
		}

		$page_class_extra = rwmb_meta( $prefix . 'page_class_extra', 'type=text', get_the_ID() );

		if ( !empty( $page_class_extra ) ) {
			$classes[] = $page_class_extra;
		}
		//Header position class

		$header_overlay = rwmb_meta( $prefix . 'header_positon' );
		if ( ( $header_overlay === '' ) || ( $header_overlay == '-1' ) ) {
			$header_overlay = $g5plus_options['header_positon'];
		}
		if ( $header_overlay == '1' ) {
			$classes[] = 'header-overlay';
		}
		if ( is_404() ) {
			$classes[] = 'header-overlay';
		}
		$header_layout = rwmb_meta( $prefix . 'header_layout' );
		if ( ( $header_layout === '' ) || ( $header_layout == '-1' ) ) {
			$header_layout = $g5plus_options['header_layout'];
		}
		$classes[] = $header_layout;


		return $classes;
	}

	add_filter( 'body_class', 'g5plus_body_class_name' );
}

/*================================================
PAGE HEADING
================================================== */
if ( !function_exists( 'g5plus_page_heading' ) ) {
	function g5plus_page_heading() {
		g5plus_get_template( 'page-heading' );
	}

	add_action( 'g5plus_before_page', 'g5plus_page_heading', 5 );
}
/*================================================
ARCHIVE HEADING
================================================== */
if ( !function_exists( 'g5plus_archive_heading' ) ) {
	function g5plus_archive_heading() {
		g5plus_get_template( 'archive-heading' );
	}

	add_action( 'g5plus_before_archive', 'g5plus_archive_heading', 5 );
}

if ( !function_exists( 'g5plus_archive_product_heading' ) ) {
	function g5plus_archive_product_heading() {
		g5plus_get_template( 'archive-product-heading' );
	}

	add_action( 'g5plus_before_archive_product', 'g5plus_archive_product_heading', 5 );
}
/*================================================
SEARCH HEADER
================================================== */
//if (!function_exists('g5plus_page_top_drawer')) {
//	function g5plus_search_drawer() {
//		g5plus_get_template('header/search','popup');
//	}
//	add_action('g5plus_before_page_wrapper_content','g5plus_search_drawer',5);
//}
/*================================================
ABOVE HEADER
================================================== */
if ( !function_exists( 'g5plus_page_top_drawer' ) ) {
	function g5plus_page_top_drawer() {
		g5plus_get_template( 'top-drawer-template' );
	}

	add_action( 'g5plus_before_page_wrapper_content', 'g5plus_page_top_drawer', 10 );
}

/*================================================
TOP BAR
================================================== */
if ( !function_exists( 'g5plus_page_top_bar' ) ) {
	function g5plus_page_top_bar() {
		g5plus_get_template( 'top-bar-template' );
	}

	add_action( 'g5plus_before_page_wrapper_content', 'g5plus_page_top_bar', 10 );
}

/*================================================
HEADER
================================================== */
if ( !function_exists( 'g5plus_page_header' ) ) {
	function g5plus_page_header() {
		g5plus_get_template( 'header-template' );
	}

	add_action( 'g5plus_before_page_wrapper_content', 'g5plus_page_header', 15 );
}