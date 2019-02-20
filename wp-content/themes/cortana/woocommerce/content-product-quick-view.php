<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 7/22/2015
 * Time: 10:40 AM
 */
$g5plus_options = g5plus_option();
$classes   = array( 'product' );
$classes[] = 'add-to-cart-animation-visible';

$suffix                    = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
$assets_path               = str_replace( array( 'http:', 'https:' ), '', WC()->plugin_url() ) . '/assets/';
$frontend_script_path      = $assets_path . 'js/frontend/';
$add_to_cart_url           = $frontend_script_path . 'add-to-cart' . $suffix . '.js';
$add_to_cart_variation_url = $frontend_script_path . 'add-to-cart-variation' . $suffix . '.js';
?>
<div id="popup-product-quick-view-wrapper" class="site-content-single-product modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
	 aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<a class="popup-close" data-dismiss="modal" href="javascript:"><i class="fa fa-close"></i></a>

			<div class="modal-body">
				<div class="woocommerce">
					<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>
						<div class="single-product-info clearfix">
							<div class="single-product-image-wrap">
								<div class="single-product-image">
									<?php
									/**
									 * woocommerce_before_single_product_summary hook
									 *
									 * @hooked woocommerce_show_product_sale_flash - 10
									 * @hooked g5plus_quick_view_product_images - 20
									 */
									do_action( 'g5plus_before_quick_view_product_summary' );
									?>
								</div>
							</div>
							<div class="summary-product-wrap">
								<div class="summary-product entry-summary">
									<?php
									/**
									 * woocommerce_single_product_summary hook
									 *
									 * @hooked g5plus_template_quick_view_product_title - 5
									 * @hooked woocommerce_template_single_price - 10
									 * @hooked g5plus_template_quick_view_product_rating - 15
									 * @hooked woocommerce_template_single_excerpt - 20
									 * @hooked woocommerce_template_single_add_to_cart - 30
									 * @hooked woocommerce_template_single_meta - 40
									 * @hooked woocommerce_template_single_sharing - 50
									 */
									do_action( 'g5plus_quick_view_product_summary' );
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript"
			src="<?php echo esc_url( $add_to_cart_url ); ?>"></script>
	<script type="text/javascript"
			src="<?php echo esc_url( $add_to_cart_variation_url ); ?>"></script>
	<script>
		(function ($) {
			"use strict";
			$('.variations_form').wc_variation_form();
			$('.variations_form .variations select').change();
		})(jQuery);
	</script>
</div>