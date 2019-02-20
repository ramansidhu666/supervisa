<?php
/**
 * Thankyou page
 *
 * @author        WooThemes
 * @package       WooCommerce/Templates
 * @version       2.2.0
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( $order ) : ?>
	<div class="checkout-confirmation">
		<?php if ( $order->has_status( 'failed' ) ) : ?>

			<p><?php echo esc_html__( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction.', 'woocommerce' ); ?></p>

			<p><?php
				if ( is_user_logged_in() ) {
					echo esc_html__( 'Please attempt your purchase again or go to your account page.', 'woocommerce' );
				} else {
					echo esc_html__( 'Please attempt your purchase again.', 'woocommerce' );
				}
				?></p>

			<p>
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php echo esc_html__( 'Pay', 'woocommerce' ) ?></a>
				<?php if ( is_user_logged_in() ) : ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php echo esc_html__( 'My Account', 'woocommerce' ); ?></a>
				<?php endif; ?>
			</p>

		<?php else : ?>
			<p><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); ?></p>

			<ul class="order_details">
				<li class="order">
					<?php echo esc_html__( 'Order Number:', 'woocommerce' ); ?>
					<strong><?php echo esc_html( $order->get_order_number() ); ?></strong>
				</li>
				<li class="date">
					<?php echo esc_html__( 'Date:', 'woocommerce' ); ?>
					<strong><?php echo date_i18n( get_option( 'date_format' ), strtotime( $order->order_date ) ); ?></strong>
				</li>
				<li class="total">
					<?php echo esc_html__( 'Total:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_formatted_order_total(); ?></strong>
				</li>
				<?php if ( $order->payment_method_title ) : ?>
					<li class="method">
						<?php echo esc_html__( 'Payment Method:', 'woocommerce' ); ?>
						<strong><?php echo esc_html( $order->payment_method_title ); ?></strong>
					</li>
				<?php endif; ?>
			</ul>
			<div class="clear"></div>

		<?php endif; ?>

		<?php do_action( 'woocommerce_thankyou_' . $order->payment_method, $order->id ); ?>
		<?php do_action( 'woocommerce_thankyou', $order->id ); ?>
	</div>
<?php else : ?>

	<p><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), null ); ?></p>

<?php endif; ?>
