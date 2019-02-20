<!DOCTYPE html>
<!-- Open Html -->
<html <?php language_attributes(); ?>>
<!-- Open Head -->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<?php
	$g5plus_options = g5plus_option();
	$prefix = 'g5plus_';

	$enable_header_customize = rwmb_meta( $prefix . 'enable_header_customize' );
	$header_search_box       = '0';
	if ( $enable_header_customize == '1' ) {
		$page_header_customize = rwmb_meta( $prefix . 'header_customize' );
		if ( isset( $page_header_customize['enable'] ) && !empty( $page_header_customize['enable'] ) ) {
			$header_customize = explode( '||', $page_header_customize['enable'] );
		}
		if ( isset( $header_customize ) ) {
			if ( in_array( 'search', $header_customize ) ) {
				$header_search_box = '1';
			}
		}
	} else {
		if ( isset( $g5plus_options['header_customize'] ) && isset( $g5plus_options['header_customize']['enabled'] ) && is_array( $g5plus_options['header_customize']['enabled'] ) ) {
			if ( in_array( 'search', $g5plus_options['header_customize']['enabled'] ) ) {
				$header_search_box = '1';
			}
		}
	}
	//SET header color
	$custom_style              = array();
	$header_bg                 = '';
	$header_background_color   = rwmb_meta( $prefix . 'header_bg_color' );
	$header_background_opacity = rwmb_meta( $prefix . 'header_bg_opacity' );
	$header_show_border        = rwmb_meta( $prefix . 'header_show_border' );
	$topbar_show_border        = rwmb_meta( $prefix . 'show_top_bar_border' );
	$top_bar_border_color      = rwmb_meta( $prefix . 'topbar_border_color' );

	if ( !isset( $top_bar_border_color ) || $top_bar_border_color == '' ) {
		$top_bar_border_color = $g5plus_options['top_bar_border_color'];
	}
	$header_sticky_border = rwmb_meta( $prefix . 'header_sticky_border' );
	if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) :
		if ( is_woocommerce() ) {
			$header_sticky_border = '-1';
		}
	endif;
	if ( !isset( $header_sticky_border ) || $header_sticky_border == '-1' ) {
		$header_sticky_border = $g5plus_options['header_sticky_border'];
	}
	$custom_opacity = rwmb_meta( $prefix . 'header_custom_overlay_opacity' );
	if ( $header_background_color ) {
		if ( $custom_opacity == '1' ) {
			$alpha = $header_background_opacity / 100;
			if ( $alpha == 0 ) {
				$header_bg = g5plus_hex2rgba( $header_background_color, '0' );
			} else {
				$header_bg = g5plus_hex2rgba( $header_background_color, $alpha );
			}
		} else {
			$header_bg = $header_background_color;
		}
	}
	$header_border_color   = rwmb_meta( $prefix . 'header_border_color' );
	$header_border_opacity = rwmb_meta( $prefix . 'header_border_opacity' );
	$menu_background_color = rwmb_meta( $prefix . 'menu_bg_color' );
	$menu_text_color       = rwmb_meta( $prefix . 'menu_text_color' );
	$header_margin_top     = rwmb_meta( $prefix . 'header_margin_top' );

	$topbar_bg_color = rwmb_meta( $prefix . 'topbar_bg_color' );
	$topbar_color    = rwmb_meta( $prefix . 'topbar_color' );
	if ( !isset( $header_border_color ) || $header_border_color == '' ) {
		if ( isset( $g5plus_options['header_border_color']['rgba'] ) ) {
			$header_border_color = $g5plus_options['header_border_color']['rgba'];
		} elseif ( isset( $g5plus_options['header_border_color']['color'] ) ) {
			$header_border_color = $g5plus_options['header_border_color']['color'];
		}
	} else {
		if ( $header_border_color ) {
			$alpha = $header_border_opacity / 100;
			if ( $alpha == 0 ) {
				$header_border_color = g5plus_hex2rgba( $header_border_color, '0' );
			} else {
				$header_border_color = g5plus_hex2rgba( $header_border_color, $alpha );
			}
		}
	}
	if ( $topbar_show_border == '1' ) {
		$custom_style[] = '.top-bar{border-bottom: 1px solid ' . $top_bar_border_color . ' !important;}';
		$custom_style[] = '.top-bar{border-top: 1px solid ' . $top_bar_border_color . ' !important;}';
	} else {
		$custom_style[] = '.top-bar{border-bottom: 0px solid ' . $top_bar_border_color . ' !important;}';
		$custom_style[] = '.top-bar{border-top: 0px solid ' . $top_bar_border_color . ' !important;}';
	}
	if ( $header_sticky_border == '1' ) {
		$custom_style[] = '.sticky-wrapper.is-sticky header.main-header{border-bottom: 1px solid ' . $header_border_color . ' !important;}';
		$custom_style[] = 'header.header-2 .sticky-wrapper.is-sticky .header-menu{border-bottom: 1px solid ' . $header_border_color . ' !important;}';
		$custom_style[] = '.sticky-wrapper.is-sticky .header-3-menu-wrapper{border-bottom: 1px solid ' . $header_border_color . ' !important;}';
	}
	if ( isset( $topbar_bg_color ) && $topbar_bg_color != '' ) {
		$custom_style[] = '.top-bar{background-color: ' . $topbar_bg_color . ' !important;}';
	}
	if ( isset( $topbar_color ) && $topbar_color != '' ) {
		$custom_style[] = '.top-bar .sidebar{color: ' . $topbar_color . ' !important;}';
	}
	if ( isset( $header_show_border ) && $header_show_border == '1' ) {
		if ( isset( $header_border_color ) && $header_border_color != '' ) {
			$custom_style[] = 'header.main-header{border-bottom: 1px solid ' . $header_border_color . ' !important;}';
		}
	}
	if ( isset( $header_background_color ) && $header_background_color != '' ) {
		$custom_style[] = 'body.header-overlay header.main-header{background-color: ' . $header_bg . ' !important;} ';
		$custom_style[] = 'header.header-2 .header-menu{background-color: ' . $header_bg . ' !important;} ';
		$custom_style[] = 'header.main-header{background-color: ' . $header_bg . ' !important} ';
		$custom_style[] = '.sticky-wrapper.is-sticky header.main-header{background-color: ' . $header_background_color . ' !important;} ';
		$custom_style[] = 'header.header-2 .sticky-wrapper.is-sticky .header-menu{background-color: ' . $header_background_color . ' !important;} ';
		$custom_style[] = '@media screen and (max-width: 991px){ body.header-overlay header.main-header.header-mobile-1{background-color: #111 !important;} } ';
		$custom_style[] = '@media screen and (max-width: 991px){ body.header-overlay header.main-header.header-mobile-2{background-color: #fff !important;} }';
		$custom_style[] = '@media screen and (max-width: 991px){ body.header-overlay header.main-header.header-mobile-3{background-color: #111 !important;} }';
	}
	if ( isset( $header_margin_top ) && $header_margin_top != '' ) {
		$custom_style[] = 'header.main-header{margin-top: ' . $header_margin_top . 'px;}';
	}
	if ( isset( $menu_background_color ) && $menu_background_color != '' ) {
		$custom_style[] = 'header.main-header .menu-wrapper{background-color: ' . $menu_background_color . ' !important;}';
		$custom_style[] = 'header.header-2 .header-menu{background-color: ' . $menu_background_color . ' !important;}';
		$custom_style[] = 'header.header-3 .header-3-menu-wrapper{background-color: ' . $menu_background_color . ' !important;}';
	}
	if ( isset( $menu_text_color ) && $menu_text_color != '' ) {
		$custom_style[] = 'header.main-header .menu-wrapper .x-nav-menu>li>a{color: ' . $menu_text_color . ' !important;}';
		$custom_style[] = 'header.header-3 .menu-wrapper .x-nav-menu>li.x-menu-item>a{color: ' . $menu_text_color . ' !important;}';
		$custom_style[] = 'header.header-2 .menu-wrapper .x-nav-menu>li.x-menu-item>a{color: ' . $menu_text_color . ' !important;}';
		$custom_style[] = 'header.main-header .menu-wrapper .x-nav-menu>li.x-menu-item>a>b.x-caret:before{color: ' . $menu_text_color . ' !important;}';
	}
	if ( $custom_style ) {
		$custom_css = join( ' ', $custom_style );
		echo g5plus_style_schemes_output( $custom_css );
	}
	?>
	<?php wp_head(); ?>
</head>
<!-- Close Head -->
<body <?php body_class(); ?>>
<?php

?>
<?php
/**
 * @hooked  - g5plus_site_loading - 5
 **/
do_action( 'g5plus_before_page_wrapper' );
?>

<!-- Open Wrapper -->

<div id="wrapper">

	<?php
	/**
	 * @hooked - g5plus_page_above_header - 10
	 * @hooked - g5plus_page_top_bar - 15
	 * @hooked - g5plus_page_header - 20
	 **/
	do_action( 'g5plus_before_page_wrapper_content' );
	?>


</center>
</div>
</div>


	<!-- Open Wrapper Content -->
	<div id="wrapper-content" class="clearfix">

<?php
/**
 **/
do_action( 'g5plus_main_wrapper_content_start' );
?>
