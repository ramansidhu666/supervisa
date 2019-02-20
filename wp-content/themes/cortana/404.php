<?php
/**
 * @hooked - g5plus_page_above_header - 10
 * @hooked - g5plus_page_top_bar - 15
 * @hooked - g5plus_page_header - 20
 **/
remove_action( 'g5plus_before_page_wrapper_content', 'g5plus_page_top_bar', 15 );

$body_class[]            = 'header-overlay';
$header_bg               = 'rgba(0,0,0,0)';
$header_border_color     = 'rgba(0,0,0,0)';
$header_background_color = '#222';
$header_margin_top       = '0';
$menu_background_color   = 'rgba(0,0,0,0)';
$menu_text_color         = '#fff';
$g5plus_header_layout    = 'header-1';

if ( isset( $topbar_bg_color ) && $topbar_bg_color != '' ) {
	$custom_style[] = '.top-bar{background-color: ' . $topbar_bg_color . ' !important}';
}
if ( isset( $topbar_color ) && $topbar_color != '' ) {
	$custom_style[] = '.top-bar .sidebar{color: ' . $topbar_color . ' !important}';
}
if ( isset( $header_border_color ) && $header_border_color != '' ) {
	$custom_style[] = 'header.main-header{border-bottom: 1px solid ' . $header_border_color . ' !important}';
}

if ( isset( $header_background_color ) && $header_background_color != '' ) {
	$custom_style[] = 'body.header-overlay header.main-header{background-color: ' . $header_bg . ' !important}';
	$custom_style[] = 'header.header-2 .header-menu{background-color: ' . $header_bg . ' !important}';
	$custom_style[] = 'header.main-header{background-color: ' . $header_bg . ' !important}';
	$custom_style[] = '.sticky-wrapper.is-sticky header.main-header{background-color: ' . $header_background_color . ' !important}';
	$custom_style[] = 'header.header-2 .sticky-wrapper.is-sticky .header-menu{background-color: ' . $header_background_color . ' !important}';
}
if ( isset( $header_margin_top ) && $header_margin_top != '' ) {
	$custom_style[] = 'header.main-header{margin-top: ' . $header_margin_top . 'px !important}';
}
if ( isset( $menu_background_color ) && $menu_background_color != '' ) {
	$custom_style[] = 'header.main-header .menu-wrapper{background-color: ' . $menu_background_color . ' !important}';
	$custom_style[] = 'header.header-2 .header-menu{background-color: ' . $menu_background_color . ' !important}';
	$custom_style[] = 'header.header-3 .header-3-menu-wrapper{background-color: ' . $menu_background_color . ' !important}';
}
if ( isset( $menu_text_color ) && $menu_text_color != '' ) {
	$custom_style[] = 'header.main-header .menu-wrapper .x-nav-menu>li>a{color: ' . $menu_text_color . ' !important}';
	$custom_style[] = 'header.header-3 .menu-wrapper .x-nav-menu>li.x-menu-item>a{color: ' . $menu_text_color . ' !important}';
	$custom_style[] = 'header.header-2 .menu-wrapper .x-nav-menu>li.x-menu-item>a{color: ' . $menu_text_color . ' !important}';
	$custom_style[] = 'header.main-header .menu-wrapper .x-nav-menu>li.x-menu-item>a>b.x-caret:before{color: ' . $menu_text_color . ' !important}';
}
//var_dump($custom_style);
if ( $custom_style ) {
	$custom_css = join( ' ', $custom_style );
	echo g5plus_style_schemes_output( $custom_css );
}

$logo_url =  get_template_directory_uri()  . '/assets/images/theme-options/logo-light.png';
get_header();
$custom_style_wrapper = array();
$style_wrapper = '';
$custom_style_wrapper[] = 'height: 512px';

$g5plus_options = g5plus_option();
$page_404_bg     = $g5plus_options['page_404_bg_image'];
$page_404_bg_url = '';
if ( isset( $page_404_bg ) && array_key_exists( 'url', $page_404_bg ) ) {
	$page_404_bg_url = $page_404_bg['url'];
}
if( $page_404_bg_url != '' ){
	$custom_style_wrapper[] = 'background-image: url('. esc_url( $page_404_bg_url ) .'';
}
if( $custom_style_wrapper ){
	$style_wrapper = 'style="' . join( ';', $custom_style_wrapper ) . '"';
}
?>
<section class="page-title-wrap page-title-wrap-bg" <?php echo wp_kses_post($style_wrapper) ?>>
	<div class="page-title-overlay"></div>
</section>
<div class="page404">
	<div class="container content-404">
		<?php $img_404 = get_template_directory_uri() . '/assets/images/404-img.png'; ?>
		<img src="<?php echo esc_attr( $img_404 ) ?>" alt="<?php echo wp_kses_post( $g5plus_options['subtitle_404'] ); ?>" />

		<h2><?php echo esc_html__('404 OOPS!','cortana') ?></h2>

		<div class="description"><?php echo wp_kses_post( $g5plus_options['subtitle_404'] ); ?></div>
		<div class="button">
			<a class="cortana-button size-lg style1" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__('BACK TO HOMEPAGE','cortana') ?></a>
		</div>
	</div>
</div>
<?php
get_footer();
?>

