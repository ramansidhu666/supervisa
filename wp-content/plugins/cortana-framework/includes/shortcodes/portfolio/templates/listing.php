<?php
/**
 * Created by PhpStorm.
 * User: phuongth
 * Date: 3/19/15
 * Time: 5:31 PM
 */
global $g5plus_options;
if ( !is_front_page() ) {
	$post_per_page = 100;
    }
$primary_color = $g5plus_options['primary_color'];
$args          = array(
	'offset'                           => $offset,
	'posts_per_page'                   => $post_per_page,
	'orderby'                          => 'post_date',
	'order'                            => $order,
	'post_type'                        => G5PLUS_PORTFOLIO_POST_TYPE,
	G5PLUS_PORTFOLIO_CATEGORY_TAXONOMY => strtolower( $category ),
	'post_status'                      => 'publish' );

$posts_array     = new WP_Query( $args );
$total_post      = $posts_array->found_posts;
$col_class       = '';
$col_class       = 'cortana-col-md-' . $column;
$data_section_id = uniqid();
$paging_style    = $show_pagging == 2 ? 'slider' : 'grid';
?>
<div class="portfolio container <?php echo esc_attr( $g5plus_animation . ' ' . $styles_animation . ' ' . $style . ' ' . $paging_style ) ?>" id="portfolio-<?php echo esc_attr( $data_section_id ) ?>">
	<div class="portfolio-entry-header clearfix container <?php echo esc_attr( $style_header ) ?>">
		<?php if ( $title != '' ) { ?>
			<h3 class="cortana-title title-larger"><?php echo esc_html( $title ) ?></h3>
		<?php }
		?>
		<?php if ( $show_category == 'yes' ) { ?>
			<div class="portfolio-tabs">
				<?php
				$arr_terms = array();
				$terms     = get_terms( G5PLUS_PORTFOLIO_CATEGORY_TAXONOMY );
				$catSelect = explode( ',', $category );
				foreach ( $terms as $term ) {
					if ( ( in_array( $term->slug, $catSelect ) || $category == '' ) && !array_key_exists( $term->slug, $arr_terms ) ) {
						$arr_terms[$term->slug] = $term->name;
					}
				}

				wp_reset_postdata();

				if ( count( $arr_terms ) > 0 ) {
					$index = 1;
					if ( $show_pagging == '1' ) {

						?>
						<div class="tab-wrapper <?php if ( $category_style == 'background-cat' ) {
							echo 'container bg-category-wrap';
						} ?>  <?php echo esc_attr( $show_category ) ?> <?php if ( $show_title == $show_category ) {
							echo esc_attr( 'isolation' );
						} ?>">
							<ul class="<?php echo esc_attr( $category_style ); ?> primary-color">
								<li class="active">
									<a class="isotope-portfolio active" data-section-id="<?php echo esc_attr( $data_section_id ) ?>"
									   data-group="all" data-filter="*" href="javascript:;">
										<?php echo __( 'All', 'cortana' ) ?>
									</a>
								</li>

								<?php
								foreach ( $arr_terms as $slug => $term_name ) { ?>
									<li class="<?php if ( $index == count( $arr_terms ) ) {
										echo "last";
									} ?>">
										<a class="isotope-portfolio ladda-button" href="javascript:;" data-section-id="<?php echo esc_attr( $data_section_id ) ?>"
										   data-filter=".<?php echo preg_replace( '/\s+/', '', $term_name ) ?>">
											<?php echo wp_kses_post( $term_name ) ?>
										</a>
									</li>
								<?php } ?>
							</ul>
						</div>
						<?php
					} else {
						if ( $total_post / $item > 1 ) {
							$items = $item;
						} else {
							$items = $column;
						}
						?>
						<div class="tab-wrapper <?php if ( $category_style == 'background-cat' ) {
							echo 'container bg-category-wrap';
						} ?>  <?php echo esc_attr( $show_category ) ?> <?php if ( $show_title == $show_category ) {
							echo esc_attr( 'isolation' );
						} ?>">
							<ul class="<?php echo esc_attr( $category_style ); ?> primary-color">
								<li class="active">
									<a class="active ladda-button" data-section-id="<?php echo esc_attr( $data_section_id ) ?>"
									   data-group="all" data-filter="*" data-layout-type="<?php echo esc_attr( $layout_type ) ?>" data-order="<?php echo esc_attr( $order ) ?>"
									   data-column="<?php echo esc_attr( $items ) ?>" data-padding="<?php echo esc_attr( $padding ) ?>" data-overlay-style="<?php echo esc_attr( $overlay_style ) ?>"
									   data-style="zoom-out" data-spinner-color="<?php echo esc_attr( $primary_color ) ?>" href="javascript:;">
										<?php echo __( 'All', 'cortana' ) ?>
									</a>
								</li>

								<?php
								foreach ( $arr_terms as $slug => $term_name ) { ?>
									<li class="<?php if ( $index == count( $arr_terms ) ) {
										echo "last";
									} ?>">
										<a class="ladda-button" href="javascript:;" data-section-id="<?php echo esc_attr( $data_section_id ) ?>"
										   data-layout-type="<?php echo esc_attr( $layout_type ) ?>" data-padding="<?php echo esc_attr( $padding ) ?>" data-column="<?php echo esc_attr( $items ) ?>" data-order="<?php echo esc_attr( $order ) ?>"
										   data-group="<?php echo preg_replace( '/\s+/', '', $slug ) ?>" data-filter=".<?php echo preg_replace( '/\s+/', '', $term_name ) ?>"
										   data-overlay-style="<?php echo esc_attr( $overlay_style ) ?>" data-style="zoom-out" data-spinner-color="<?php echo esc_attr( $primary_color ) ?>">
											<?php echo wp_kses_post( $term_name ) ?>
										</a>
									</li>
								<?php } ?>

							</ul>
						</div>
						<?php
					}
					?>
				<?php } ?>
			</div>

		<?php } ?>
	</div><!--end entry-header-->
	<?php
	$data_plugin_options = $owl_carousel_class = '';
	if ( $show_pagging == '2' && $total_post / $item > 1 ) {
		$data_plugin_options = 'data-plugin-options=\'{ "items" : ' . $item . ',"pagination": false, "navigation": true, "autoPlay": false}\'';
		$owl_carousel_class  = 'owl-carousel';
	}
	?>
	<div class="portfolio-wrapper <?php echo sprintf( '%s %s %s %s', $col_class, $padding, $layout_type, $owl_carousel_class ) ?>" <?php echo wp_kses_post( $data_plugin_options ) ?> data-section-id="<?php echo esc_attr( $data_section_id ) ?>" id="portfolio-container-<?php echo esc_attr( $data_section_id ) ?>" data-columns="<?php echo esc_attr( $column ) ?>">
		<?php
		$index = 0;
		while ( $posts_array->have_posts() ) : $posts_array->the_post();
			$index ++;
			$permalink  = get_permalink();
			$title_post = get_the_title();
			$terms      = wp_get_post_terms( get_the_ID(), array( G5PLUS_PORTFOLIO_CATEGORY_TAXONOMY ) );
			$cat        = $cat_filter = '';
			foreach ( $terms as $term ) {
				$cat_filter .= preg_replace( '/\s+/', '', $term->name ) . ' ';
				$cat .= $term->name . ', ';
			}
			$cat = rtrim( $cat, ', ' );
			?>
			<?php include( plugin_dir_path( __FILE__ ) . '/' . $layout_type . '-item.php' ); ?>
			<?php
		endwhile;
		wp_reset_postdata();
		?>

	</div>

</div>

<script type="text/javascript">
	(function ($) {
		"use strict";
		<?php if( $show_pagging == '1' ){ ?>
		var $container = jQuery('div[data-section-id="<?php echo esc_attr($data_section_id); ?>"]');
		$($container).css('opacity', 0);
		$(window).load(function () {
			$('.isotope-portfolio', '.portfolio-tabs').off();
			$('.isotope-portfolio', '.portfolio-tabs').click(function () {
				$('.isotope-portfolio', '.portfolio-tabs').removeClass('active');
				$('li', '.portfolio-tabs').removeClass('active');
				$(this).addClass('active');
				$(this).parent().addClass('active');
				var dataSectionId = $(this).attr('data-section-id');
				var filter = $(this).attr('data-filter');
				var $container = jQuery('div[data-section-id="' + dataSectionId + '"]').isotope({filter: filter});
				$container.imagesLoaded(function () {
					$container.isotope('layout');
				});
			});
			var $container = jQuery('div[data-section-id="<?php echo esc_attr($data_section_id); ?>"]');

			$container.imagesLoaded(function () {
				$container.isotope({
					itemSelector: '.portfolio-item'
				}).isotope('layout');
			});

			$($container).css('opacity', 1);
		});
		<?php } ?>
		$(document).ready(function () {

			PortfolioAjaxAction.init('<?php echo esc_url(get_site_url() . '/wp-admin/admin-ajax.php') ?>');
			var $container = $('div[data-section-id="<?php echo esc_attr($data_section_id); ?>"]');

			$($container).bind('afterOwlInit', function () {
				setTimeout(function () {
					var figureHeight = $container.find('figure').height() / 2;
					var buttonHeight = $container.find('.owl-prev').height() / 2;
					$('.owl-controls', '.portfolio-wrapper').addClass('container');
					$container.find('.owl-prev').css('top', figureHeight - buttonHeight);
					$container.find('.owl-next').css('top', figureHeight - buttonHeight);
				}, 3000);
			});
		})
	})(jQuery);
</script>
