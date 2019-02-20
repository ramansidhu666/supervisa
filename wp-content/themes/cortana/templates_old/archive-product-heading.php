<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 6/8/2015
 * Time: 2:44 PM
 */
$g5plus_options = g5plus_option();
$show_page_title = $g5plus_options['show_archive_product_title'];
if ( $show_page_title == 0 ) {
	return;
}
$prefix = 'g5plus_';

//archive
$page_title_bg_image = '';
$page_title_height   = '';
$cat                 = get_queried_object();
if ( $cat && property_exists( $cat, 'term_id' ) ) {
	$page_title_bg_image = get_tax_meta( $cat, $prefix . 'page_title_background' );
	$page_title_height   = get_tax_meta( $cat, $prefix . 'page_title_height' );
}

if ( !$page_title_bg_image || $page_title_bg_image === '' ) {
	$page_title_bg_image = $g5plus_options['archive_product_title_bg_image'];
}

if ( isset( $page_title_bg_image ) && isset( $page_title_bg_image['url'] ) ) {
	$page_title_bg_image_url = $page_title_bg_image['url'];
}

if ( ( $page_title_height === '' ) || $page_title_height <= 0 ) {
	$page_title_height = isset($g5plus_options['archive_product_title_height']['height']) ? $g5plus_options['archive_product_title_height']['height']: '';
}

$breadcrumbs_in_page_title = $g5plus_options['breadcrumbs_in_archive_product_title'];

$class   = array();
$class[] = 'page-title-wrap';

$custom_styles = array();

if ( $page_title_bg_image_url != '' ) {
	$class[]         = 'page-title-wrap-bg';
	$custom_styles[] = 'background-image: url(' . $page_title_bg_image_url . ');';
}

if ( ( $page_title_height != '' ) && ( $page_title_height > 0 ) ) {
	$custom_styles[] = 'height:' . $page_title_height . 'px';
}

$class_name = join( ' ', $class );

$custom_style = '';
if ( $custom_styles ) {
	$custom_style = 'style="' . join( ';', $custom_styles ) . '"';
}
?>
<section class="<?php echo esc_attr( $class_name ) ?>" <?php echo wp_kses_post( $custom_style ); ?>>
	<div class="page-title-overlay"></div>
	<div class="container">
		<div class="page-title-inner block-center">
			<div class="block-center-inner">
				<h1><?php woocommerce_page_title(); ?></h1>
				<?php if ( $breadcrumbs_in_page_title == 1 ) {
					g5plus_the_breadcrumb();
				} ?>
			</div>
		</div>
	</div>
</section>