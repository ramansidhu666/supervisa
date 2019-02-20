<?php

do_action( 'g5plus_before_page' );

$data_section_id = uniqid();

$terms = wp_get_post_terms( get_the_ID(), array( G5PLUS_PORTFOLIO_CATEGORY_TAXONOMY ) );
$cat   = $cat_filter = '';
foreach ( $terms as $term ) {
	$cat_filter .= preg_replace( '/\s+/', '', $term->name ) . ' ';
	$cat .= $term->name . ', ';
}
$cat = rtrim( $cat, ', ' );

?>
<div class="portfolio-full small-slider" id="content">
	<div class="container">
		<div class="row top-portfolio">
			<div class="col-md-6">
				<?php if ( isset( $meta_values ) && !empty( $meta_values ) ) { ?>
					<div class="post-slideshow" id="post_slideshow_<?php echo esc_attr( $data_section_id ) ?>">
						<div id="portfolio-slider" class="portfolio-single-slider">
							<ul class="slides">
								<?php
								$index = 0;
								foreach ( $meta_values as $image ) {
									$urls = wp_get_attachment_image_src( $image, 'full' );
									$img  = '';
									if ( $urls ) {
										$resize = matthewruddy_image_resize( $urls[0], 870, 434 );
										if ( $resize != null ) {
											$img = $resize['url'];
										}
									}
									?>
									<li>
										<img alt="portfolio" src="<?php echo esc_url( $img ) ?>" />
									</li>
								<?php } ?>
							</ul>
						</div>
						<div id="portfolio-carousel" class="portfolio-single-slider">
							<ul class="slides">
								<?php
								foreach ( $meta_values as $image ) {
									$urls = wp_get_attachment_image_src( $image, 'full' );
									$img  = '';
									if ( $urls ) {
										$resize = matthewruddy_image_resize( $urls[0], 170, 133 );
										if ( $resize != null ) {
											$img = $resize['url'];
										}
									}
									?>
									<li>
										<img alt="portfolio" src="<?php echo esc_url( $img ) ?>" />
									</li>
								<?php } ?>
							</ul>
						</div>
					</div>
					<?php
				} elseif ( $imgThumbs ) { ?>
					<div class="item"><img alt="portfolio" src="<?php echo esc_url( $imgThumbs[0] ) ?>" /></div>
					<?php
				}
				?>


			</div>
			<div class="col-md-6 portfolio-attribute">
				<h3 class="cortana-title">
					<?php echo __( 'Project info:', 'cortana' ) ?>
				</h3>

				<div class="portfolio-info border-primary-color">
					<div class="portfolio-short-descripton">
						<p><?php echo esc_html( $short_description ) ?></p>
					</div>
					<!--<div class="portfolio-info-box">
						<h6 class="heading-font"><?php echo __( 'Client', 'cortana' ) ?></h6>

						<div class="portfolio-term bold-color"><?php echo esc_html( $client ) ?></div>
					</div>

					<div class="portfolio-info-box">
						<h6 class="heading-font"><?php echo __( 'Categories', 'cortana' ) ?></h6>

						<div class="portfolio-term bold-color"><?php echo esc_html( $cat ); ?></div>
					</div>

					<div class="portfolio-info-box">
						<h6 class="heading-font"><?php echo __( 'Location', 'cortana' ) ?></h6>

						<div class="portfolio-term bold-color"><?php echo esc_html( $location ) ?></div>
					</div>
					<div class="portfolio-info-box">
						<h6 class="heading-font"><?php echo __( 'Surface Area:', 'cortana' ) ?></h6>

						<div class="portfolio-term bold-color"><?php echo wp_kses_post( $area ); ?></div>
					</div>
					<div class="portfolio-info-box">
						<h6 class="heading-font"><?php echo __( 'Year Completed:', 'cortana' ) ?></h6>

						<div class="portfolio-term bold-color"><?php echo wp_kses_post( $date ); ?></div>
					</div>
					<div class="portfolio-info-box">
						<h6 class="heading-font"><?php echo __( 'Value:', 'cortana' ) ?></h6>

						<div class="portfolio-term bold-color"><?php echo wp_kses_post( $value ); ?></div>
					</div> -->

				</div>
			</div>
		</div>
		<div class="row content-wrap">
			<?php
			$class_col = 'col-md-12';
			?>
			<div class="<?php echo esc_attr( $class_col ) ?> portfolio-content">
				<div class="portfolio-info">
					<?php the_content() ?>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	(function ($) {
		"use strict";
		$(document).ready(function () {
			$('a', '.portfolio-full .share').each(function () {
				$(this).click(function () {
					var href = $(this).attr('data-href');
					var leftPosition, topPosition;
					var width = 400;
					var height = 300;
					var leftPosition = (window.screen.width / 2) - ((width / 2) + 10);
					var topPosition = (window.screen.height / 2) - ((height / 2) + 50);
					//Open the window.
					window.open(href, "", "width=300, height=200,left=" + leftPosition + ",top=" + topPosition);
				})
			})
		})
	})(jQuery)
</script>
