<?php
$g5plus_options       = g5plus_option();
$g5plus_header_layout = $header_search_box = '';
$prefix               = 'g5plus_';
$g5plus_header_layout = rwmb_meta( $prefix . 'header_layout' );
if ( ( $g5plus_header_layout === '' ) || ( $g5plus_header_layout == '-1' ) ) {
	$g5plus_header_layout = $g5plus_options['header_layout'];
}

$mobile_header_search_box = $g5plus_options['mobile_header_search_box'];

// SHOW HEADER
$header_show_hide = rwmb_meta( $prefix . 'header_show_hide' );
if ( ( $header_show_hide === '' ) ) {
	$header_show_hide = '1';
}
?>
<?php if ( ( $header_show_hide == '1' ) ): ?>
	<?php g5plus_get_template( 'header/header-mobile-before' ); ?>
	<?php g5plus_get_template( 'header/' . $g5plus_header_layout ); ?>
	<?php if ( ( $header_search_box == '1' ) || ( $mobile_header_search_box == '1' ) ): ?>
		<?php g5plus_get_template( 'header/search', 'popup' ); ?>
	<?php endif; ?>
	<?php g5plus_get_template( 'header/get-quote-popup' ); ?>

<?php endif; ?>