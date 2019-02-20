<?php
/**
 * Created by PhpStorm.
 * User: PhanLong
 * Date: 10/10/2015
 * Time: 5:26 PM
 */
if ( !defined( 'ABSPATH' ) ) {
	die( '-1' );
}
if ( !class_exists( 'g5plusFramework_Shortcode_Gallery' ) ) {
	class g5plusFramework_Shortcode_Gallery {
		function __construct() {
			add_shortcode( 'cortana_gallery', array( $this, 'gallery_shortcode' ) );
		}

		function gallery_shortcode( $atts ) {
			$images_gallery = $gallery_class = $column_number = $layout_style = $html = $el_class = $g5plus_animation
				= $css_animation = $duration = $delay = $styles_animation = '';
			extract( shortcode_atts( array(
				'layout_style'   => 'style1',
				'images_gallery' => '',
				'column_number'  => '3',
				'el_class'       => '',
				'css_animation'  => '',
				'duration'       => '',
				'delay'          => ''
			), $atts ) );
			$g5plus_animation .= ' ' . esc_attr( $el_class );
			$g5plus_animation .= g5plusFramework_Shortcodes::g5plus_get_css_animation( $css_animation );
			if ( $column_number != '' ) {
				$gallery_class = 'col-' . $column_number . '';
			}
			ob_start(); ?>
			<div class="cortana-gallery <?php echo esc_attr( $gallery_class ) ?> <?php echo esc_attr( $layout_style ) ?><?php echo esc_attr
			( $g5plus_animation )
			?>">
				<?php
				$image_array = explode( ",", $images_gallery );
				if ( $image_array ) :
					foreach ( $image_array as $image ) :
						$thumbnail_url = '';
						$width         = 390;
						$height        = 260;
						if ( !empty( $image ) ) {
							$images_attr = wp_get_attachment_image_src( $image, "full" );
							if ( isset( $images_attr ) ) {
								$resize = matthewruddy_image_resize( $images_attr[0], $width, $height );
								if ( $resize != null ) {
									$thumbnail_url = $resize['url'];
								}
							}
						}
						?>

						<div class="cortana-gallary-thumb">
							<div class="gallery-inner-thumb">
								<img alt="" src="<?php echo esc_url( $thumbnail_url ); ?>">

								<div class="gallery-hover">
									<a data-rel="prettyPhoto[feature]" href="<?php echo esc_url( $images_attr[0] ); ?>">
										<i class="fa fa-search"></i>
									</a>
								</div>
							</div>
						</div>
						<?php
					endforeach;
				endif;
				?>
			</div>
			<?php
			$content = ob_get_clean();

			return $content;
		}
	}

	new g5plusFramework_Shortcode_Gallery();
}