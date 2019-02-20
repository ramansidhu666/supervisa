<?php
/**
 * Empty cart page
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.0.0
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<div class="container">
	<?php wc_print_notices(); ?>

	<p class="cart-empty"><?php echo esc_html__( 'Your cart is currently empty.', 'woocommerce' ) ?></p>

	<?php do_action( 'woocommerce_cart_is_empty' ); ?>

	<p class="return-to-shop">
		<a class="cortana-button style3 size-md" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>"><?php echo esc_html__( 'Return To Shop', 'woocommerce' ) ?></a>
	</p>
</div>
