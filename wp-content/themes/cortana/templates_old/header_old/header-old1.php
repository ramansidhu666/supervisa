<?php
$g5plus_options = g5plus_option();

$prefix = 'g5plus_';

$header_class   = array( 'main-header' );
$header_class[] = 'header-1';

$header_sticky = rwmb_meta( $prefix . 'header_sticky' );
if ( ( $header_sticky === '' ) || ( $header_sticky == '-1' ) ) {
	$header_sticky = $g5plus_options['header_sticky'];
}
if ( $header_sticky == '1' ) {
	$header_class[] = 'header-sticky';
}

//$header_overlay = rwmb_meta($prefix . 'header_positon');
//if (($header_overlay === '') || ($header_overlay == '-1')) {
//	$header_overlay = $g5plus_options['header_positon'];
//}
//if ($header_overlay == '1') {
//	$header_class[] = 'header-overlay';
//}
$header_layout_style = rwmb_meta( $prefix . 'header_layout_style' );
if ( ( $header_layout_style === '' ) || ( $header_layout_style == '-1' ) ) {
	$header_layout_style = $g5plus_options['header_layout_style'];
}
if ( $header_layout_style == 'boxed' ) {
	$header_class[] = 'container';
}

if ( isset( $g5plus_options['mobile_header_stick'] ) && ( $g5plus_options['mobile_header_stick'] == '1' ) ) {
	$header_class[] = 'header-mobile-sticky';
}

// get header mobile layout
$mobile_header_layout = 'header-mobile-1';
if ( isset( $g5plus_options['mobile_header_layout'] ) && !empty( $g5plus_options['mobile_header_layout'] ) ) {
	$mobile_header_layout = $g5plus_options['mobile_header_layout'];
}
$header_class[] = $mobile_header_layout;

$page_menu = rwmb_meta( $prefix . 'page_menu' );

$mobile_header_menu_drop = 'drop';
if ( isset( $g5plus_options['mobile_header_menu_drop'] ) && !empty( $g5plus_options['mobile_header_menu_drop'] ) ) {
	$mobile_header_menu_drop = $g5plus_options['mobile_header_menu_drop'];
}

$header_class[] = 'menu-drop-' . $mobile_header_menu_drop;
?>
<header id="header" class="<?php echo join( ' ', $header_class ) ?>">
	<?php g5plus_get_template( 'header/header-mobile-template' ); ?>
	<div class="container header-desktop-wrapper">
		<div class="header-left">
			<?php g5plus_get_template( 'header/header', 'logo' ); ?>
		</div>
		<div class="header-right">
			<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<div id="primary-menu" class="menu-wrapper">
					<?php
					$arg_menu = array(
						'menu_id'        => 'main-menu',
						'container'      => '',
						'theme_location' => 'primary',
						'menu_class'     => 'main-menu ' . 'menu-drop-' . $mobile_header_menu_drop
					);
					if ( !empty( $page_menu ) ) {
						$arg_menu['menu'] = $page_menu;
					}
					wp_nav_menu( $arg_menu );
					echo apply_filters( 'g5plus_header_customize_filter', '' );
					do_action( 'g5plus_main_menu_after' );
					?>
				</div>
			<?php else : ?>
				<div id="primary-menu" class="menu-wrapper">
					<?php
					echo apply_filters( 'g5plus_header_customize_filter', '' );
					//do_action('g5plus_main_menu_after');
					?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</header>