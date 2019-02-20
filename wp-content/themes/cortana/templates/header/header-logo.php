<?php
$g5plus_options = g5plus_option();

$prefix        = 'g5plus_';
$header_layout = rwmb_meta( $prefix . 'header_layout' );
if ( ( $header_layout === '' ) || ( $header_layout == '-1' ) ) {
	$header_layout = $g5plus_options['header_layout'];
}

$logo_meta = rwmb_meta( $prefix . 'custom_logo', 'type=image_advanced' );
$logo_url  = '';
if ( $logo_meta !== array() ) {
	foreach ( $logo_meta as $item ) {
		if ( isset( $item['full_url'] ) & !empty( $item['full_url'] ) ) {
			//$logo_url = $item['full_url'];
			$logo_url =  '/wp-content/uploads/2016/02/logo_img.png';
			break;
		}

	}
}

if ( $logo_url === '' ) {
	$logo_url =  get_template_directory_uri()  . '/assets/images/theme-options/logo.png';

	if ( isset( $g5plus_options['logo']['url'] ) && !empty( $g5plus_options['logo']['url'] ) ) {
		$logo_url = $g5plus_options['logo']['url'];
	}
}
if ( is_404() ) {
	$logo_url =  get_template_directory_uri()  . '/assets/images/theme-options/logo-light.png';
}

?>
<div class="header-logo">
	<a href="<?php echo esc_url( trailingslashit( home_url() ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - <?php bloginfo( 'description' ); ?>" rel="home">
		<img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - <?php bloginfo( 'description' ); ?>" />
	</a>
	
</div>
