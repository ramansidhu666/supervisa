<?php
// don't load directly
if ( !defined( 'ABSPATH' ) ) {
	die( '-1' );
}
if ( !class_exists( 'g5plusFramework_Shortcode_Partner_Carousel' ) ) {
	class g5plusFramework_Shortcode_Partner_Carousel {
		function __construct() {
			add_shortcode( 'cortana_partner_carousel', array( $this, 'partner_carousel_shortcode' ) );
		}

		function partner_carousel_shortcode( $atts ) {
			$title_style = $title = $class_col = $layout_style = $opacity = $navigation = $pagination = $img_size = $autoplay =
			$column =
			$custom_links_target
				= $custom_links = $images = $html = $el_class = $g5plus_animation = $css_animation = $duration = $delay = $styles_animation = '';
			extract( shortcode_atts( array(
				'layout_style'        => 'style1',
				'title'               => '',
				'title_style'         => 'border-bottom',
				'images'              => '',
				'opacity'             => '80',
				'custom_links'        => '',
				'custom_links_target' => '_blank',
				'img_size'            => 'thumbnail',
				'column'              => '5',
				'autoplay'            => 'false',
				'pagination'          => 'false',
				'navigation'          => 'false',
				'el_class'            => '',
				'css_animation'       => '',
				'duration'            => '',
				'delay'               => ''
			), $atts ) );
			$g5plus_animation .= ' ' . esc_attr( $el_class );
			$g5plus_animation .= g5plusFramework_Shortcodes::g5plus_get_css_animation( $css_animation );
			if ( $images == '' ) {
				$images = '-1,-2,-3';
			}

			$custom_links = explode( ',', $custom_links );

			$images = explode( ',', $images );
			$i      = - 1;
			if ( $title_style == 'border-bottom' ) {
				$title_class = 'border-bottom';
			} else {
				$title_class = 'no-border';
			}
			$autoplay            = ( $autoplay == 'yes' ) ? 'true' : 'false';
			$pagination          = ( $pagination == 'yes' ) ? 'true' : 'false';
			$navigation          = ( $navigation == 'yes' ) ? 'true' : 'false';
			$data_plugin_options = 'data-plugin-options=\'{"items" : ' . esc_attr( $column ) . ', "autoPlay": ' . esc_attr( $autoplay ) . ',"pagination": ' . esc_attr( $pagination ) . ',"navigation": ' . esc_attr( $navigation ) . '}\'';
			if ( $opacity != '' ) {
				$opacity = ' opacity' . $opacity;
			}
			$class_col = 'col-' . $column . '';
			ob_start(); ?>
			<div class="cortana-client<?php echo esc_attr( $opacity ) ?> <?php echo esc_attr( $layout_style ) ?>

			<?php echo
			esc_attr
			( $g5plus_animation ) ?>" <?php echo g5plusFramework_Shortcodes::g5plus_get_style_animation( $duration, $delay ); ?>>
				<?php if ( $title != '' ) : ?>
					<h3 class="cortana-title <?php echo esc_attr( $title_class ) ?>"><?php echo esc_html( $title ) ?></h3>
				<?php endif; ?>
				<?php
				if ( $layout_style == 'style2' ) :
					?>
					<div class="owl-carousel" <?php echo wp_kses_post( $data_plugin_options ); ?>>
						<?php foreach ( $images as $attach_id ):
							$i ++;
							if ( $attach_id > 0 ) {
								$post_thumbnail = wpb_getImageBySize( array( 'attach_id' => $attach_id, 'thumb_size' => $img_size ) );
							} else {
								$post_thumbnail                   = array();
								$post_thumbnail['thumbnail']      = '<img src="' . vc_asset_url( 'vc/no_image.png' ) . '" />';
								$post_thumbnail['p_img_large'][0] = vc_asset_url( 'vc/no_image.png' );
							}
							$thumbnail = $post_thumbnail['thumbnail'];
							if ( isset( $custom_links[$i] ) && $custom_links[$i] != '' ):?>
								<div class="content-middle-inner">
									<a href="<?php echo esc_url( $custom_links[$i] ) ?>" target="<?php echo esc_attr( $custom_links_target ) ?>">
										<?php echo wp_kses_post( $thumbnail ) ?>
									</a>
								</div>
							<?php else: ?>
								<div class="content-middle-inner"><?php echo wp_kses_post( $thumbnail ) ?></div>
							<?php endif;
						endforeach; ?>
					</div>
				<?php else : ?>
					<div class="client-grid <?php echo esc_attr( $class_col ); ?>">
						<?php foreach ( $images as $attach_id ):
							$i ++;
							if ( $attach_id > 0 ) {
								$post_thumbnail = wpb_getImageBySize( array( 'attach_id' => $attach_id, 'thumb_size' => $img_size ) );
							} else {
								$post_thumbnail                   = array();
								$post_thumbnail['thumbnail']      = '<img src="' . vc_asset_url( 'vc/no_image.png' ) . '" />';
								$post_thumbnail['p_img_large'][0] = vc_asset_url( 'vc/no_image.png' );
							}
							$thumbnail = $post_thumbnail['thumbnail'];
							if ( isset( $custom_links[$i] ) && $custom_links[$i] != '' ):?>
								<div class="content-middle-inner">
									<a href="<?php echo esc_url( $custom_links[$i] ) ?>" target="<?php echo esc_attr( $custom_links_target ) ?>">
										<?php echo wp_kses_post( $thumbnail ) ?>
									</a>
								</div>
							<?php else: ?>
								<div class="content-middle-inner"><?php echo wp_kses_post( $thumbnail ) ?></div>
							<?php endif;
						endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
			<?php
			$content = ob_get_clean();

			return $content;
		}
	}

	new g5plusFramework_Shortcode_Partner_Carousel();
}