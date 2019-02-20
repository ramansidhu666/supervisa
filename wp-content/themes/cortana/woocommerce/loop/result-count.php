<?php
/**
 * Result Count
 *
 * Shows text: Showing x - x of x results
 *
 * @author        WooThemes
 * @package       WooCommerce/Templates
 * @version       2.0.0
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $wp_query;

if ( !woocommerce_products_will_display() ) {
	return;
}
?>
<p class="woocommerce-result-count">
	<?php
	$paged        = max( 1, $wp_query->get( 'paged' ) );
	$per_page     = $wp_query->get( 'posts_per_page' );
	$total        = $wp_query->found_posts;
	$first        = ( $per_page * $paged ) - $per_page + 1;
	$last         = min( $total, $wp_query->get( 'posts_per_page' ) * $paged );
	$allowed_html = array(
		'i'  => array(
			'class' => array(),
		),
		'b'  => array(),
		'em' => array(),
	);
	if ( 1 == $total ) {
		echo esc_html__( 'Showing the single result', 'woocommerce' );
	} elseif ( $total <= $per_page || - 1 == $per_page ) {
		printf( wp_kses( __( 'Showing all <b>%d</b> results', 'woocommerce' ), $allowed_html ), $total );
	} else {
		printf( _x( 'Showing <b>%1$d&ndash;%2$d</b> of <b>%3$d</b> results', '%1$d = first, %2$d = last, %3$d = total', 'woocommerce' ), $first, $last, $total );
	}
	?>
</p>