<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 7/17/2015
 * Time: 4:26 PM
 */
$g5plus_options = g5plus_option();
$product_quick_view = $g5plus_options['product_quick_view'];
if ( $product_quick_view == 0 ) {
	return;
}
?>
<div class="product-actions">
	<a title="<?php echo esc_html__( 'Quick view', 'cortana' ) ?>" class="product-quick-view cortana-button style1 size-xs" data-product_id="<?php the_ID(); ?>" href="<?php the_permalink(); ?>"><?php echo esc_html__( 'Quick view', 'cortana' ) ?></a>
</div>
