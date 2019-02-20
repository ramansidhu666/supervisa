<div class="portfolio-item <?php echo esc_attr( $cat_filter ) ?>">

	<?php
	$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
	$arrImages         = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
	$width             = 480;
	$height            = 267;
	$thumbnail_url     = '';
	if ( count( $arrImages ) > 0 ) {
		$resize = matthewruddy_image_resize( $arrImages[0], $width, $height );
		if ( $resize != null && is_array( $resize ) ) {
			$thumbnail_url = $resize['url'];
		}
	}

	$url_origin = $arrImages[0];

	//        include(plugin_dir_path( __FILE__ ).'/overlay/title-float.php');
	?>
	<figure>
		<img width="<?php echo esc_attr( $width ) ?>" height="<?php echo esc_attr( $height ) ?>" src="<?php echo esc_url( $thumbnail_url ) ?>" alt="<?php echo get_the_title() ?>" />

		<div class="hover-action">
			<a href="<?php echo get_permalink( get_the_ID() ) ?>" class="ico-view-detail">
				<i class="fa fa-link"></i>
				<?php if ( $padding == 'col-no-padding' ) : ?>
					<h3 class="fig-title">
						<?php the_title() ?>
					</h3>
				<?php endif; ?>
			</a>
		</div>
	</figure>
	<?php if ( $padding == 'col-padding-15' ) : ?>
		<figure>
			<figcaption class="portfolio-title <?php echo esc_attr( $style_header ) ?>">
				<h3 class="fig-title">
					<a href="<?php echo get_permalink( get_the_ID() ) ?>">
						<?php the_title() ?>
					</a>
				</h3>
			</figcaption>
		</figure>
	<?php endif; ?>


</div>
