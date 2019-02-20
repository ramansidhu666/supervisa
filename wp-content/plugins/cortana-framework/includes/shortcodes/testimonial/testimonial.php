<?php
// don't load directly
if ( !defined( 'ABSPATH' ) ) {
	die( '-1' );
}
if ( !class_exists( 'g5plusFramework_Shortcode_Testimonial' ) ) {
	class g5plusFramework_Shortcode_Testimonial {
		function __construct() {
			add_shortcode( 'cortana_testimonial_ctn', array( $this, 'testimonial_ctn_shortcode' ) );
			add_shortcode( 'cortana_testimonial_sc', array( $this, 'testimonial_sc_shortcode' ) );
		}

		function testimonial_ctn_shortcode( $atts, $content ) {
			$navigation = $pagination = $number_item = $layout_style = $rewindspeed = $paginationspeed = $slidespeed = $autoheight = $autoplay = $stoponhover = $el_class = $g5plus_animation = $css_animation = $duration = $delay = '';
			extract( shortcode_atts( array(
				'layout_style'    => 'style1',
				'stoponhover'     => 'false',
				'autoplay'        => 'true',
				'autoheight'      => 'true',
				'slidespeed'      => '',
				'paginationspeed' => '',
				'rewindspeed'     => '',
				'number_item'     => '2',
				'navigation'      => 'false',
				'pagination'      => 'false',
				'el_class'        => '',
				'css_animation'   => '',
				'duration'        => '',
				'delay'           => ''
			), $atts ) );
			$g5plus_animation .= ' ' . esc_attr( $el_class );
			$g5plus_animation .= g5plusFramework_Shortcodes::g5plus_get_css_animation( $css_animation );
			if ( $layout_style == 'style2' ) {
				$data_carousel = '"navigation":false,"pagination":true,"singleItem":true';
			} else {
				$data_carousel = '"navigation":true,"pagination":false,"singleItem":true';
			}
			$stoponhover = ( $stoponhover == 'yes' ) ? 'true' : 'false';
			$autoheight  = ( $autoheight == 'yes' ) ? 'true' : 'false';
			$pagination  = ( $pagination == 'yes' ) ? 'true' : 'false';
			$navigation  = ( $navigation == 'yes' ) ? 'true' : 'false';

			$data_carousel .= ',"navigation":' . $navigation;
			$data_carousel .= ',"pagination":' . $pagination;
			$data_carousel .= ',"stopOnHover":' . $stoponhover;
			$data_carousel .= ',"autoHeight":' . $autoheight;
			if ( $autoplay != '' ) {
				$data_carousel .= ',"autoPlay":' . $autoplay;
			}
			$data_carousel .= ',"itemsDesktop":' . $number_item;
			$data_carousel .= ',"itemsDesktopSmall":' . $number_item;
			$data_carousel .= ',"itemsTablet": [768, 1]';
			if ( $number_item != '' ) {
				$data_carousel .= ',"items":' . $number_item;
			}
			if ( $number_item > 1 ) {
				$data_carousel .= ',"singleItem":false';
			}
			if ( $slidespeed != '' ) {
				$data_carousel .= ',"slideSpeed":' . $slidespeed;
			}
			if ( $paginationspeed != '' ) {
				$data_carousel .= ',"paginationSpeed":' . $paginationspeed;
			}
			if ( $rewindspeed != '' ) {
				$data_carousel .= ',"rewindSpeed":' . $rewindspeed;
			}
			ob_start(); ?>
			<div data-plugin-options='{<?php echo esc_attr( $data_carousel ) ?>}'
				 class="cortana-testimonials <?php echo esc_attr( $layout_style ) ?> owl-carousel <?php echo esc_attr( $g5plus_animation ) ?>" <?php echo g5plusFramework_Shortcodes::g5plus_get_style_animation( $duration, $delay ); ?>>
				<?php echo do_shortcode( $content ) ?>
			</div>
			<?php
			$output = ob_get_clean();

			return $output;
		}

		function testimonial_sc_shortcode( $atts, $content = null ) {
			$bg_testimonials = $author_avata = $title_style = $title = $title_style = $quote_color = $author = $author_info = '';
			extract( shortcode_atts( array(
				'title'           => '',
				'title_style'     => 'border-bottom',
				'bg_testimonials' => '',
				'author'          => '',
				'author_info'     => '',
				'author_avata'    => '',
				'quote_color'     => '',
			), $atts ) );
			$custom_css       = array();
			$custom_css_arrow = array();
			$custom_css_quote = array();
			if ( $bg_testimonials != '' ) {
				$custom_css[]       = 'background-color: ' . $bg_testimonials . '';
				$custom_css_arrow[] = 'border-color: ' . $bg_testimonials . ' transparent transparent transparent';
			}
			if ( $quote_color != '' ) {
				$custom_css_quote[] = 'color: ' . $quote_color . '';
			}
			if ( $custom_css ) {
				$custom_style       = 'style="' . join( ';', $custom_css ) . '"';
				$custom_style_arrow = 'style="' . join( ';', $custom_css_arrow ) . '"';
			}
			if ( $custom_css_quote ) {
				$custom_style_quote = 'style="' . join( ';', $custom_css_quote ) . '"';
			}
			if ( $title_style == 'border-bottom' ) {
				$title_class = 'border-bottom';
			} else {
				$title_class = 'no-border';
			}

			ob_start(); ?>
			<div class="cortana-testimonial-item">
				<?php if ( $title != '' ) {
					echo '<h3 class="cortana-title ' . esc_attr( $title_class ) . '">' . esc_html( $title ) . '</h3>';
				} ?>
				<div class="entry-content" <?php echo wp_kses_post( $custom_style ); ?> >
					<p <?php echo wp_kses_post( $custom_style_quote ); ?>><?php echo wp_strip_all_tags( $content ) ?></p>
					<span class="arrow" <?php echo wp_kses_post( $custom_style_arrow ); ?>></span>
				</div>
				<div class="entry-footer">
					<?php if ( $author_avata != '' ):
						$thumbnail_url = '';
						$width         = 64;
						$height        = 64;
						$images_attr   = wp_get_attachment_image_src( $author_avata, "full" );
						if ( $images_attr ) {
							$resize = matthewruddy_image_resize( $images_attr[0], $width, $height );
							if ( $resize ) {
								$thumbnail_url = $resize['url'];
							}
						}
						?>
						<figure>
							<img src="<?php echo $thumbnail_url ?>" alt="" />
						</figure>

					<?php endif; ?>
					<div class="author-info">
						<?php if ( $author != '' ): ?>
							<h6><?php echo esc_attr( $author ) ?></h6>
						<?php endif;
						if ( $author_info != '' ):?>
							<span><?php echo esc_attr( $author_info ) ?></span>
						<?php endif; ?>
					</div>

				</div>
			</div>
			<?php
			$output = ob_get_clean();

			return $output;
		}
	}

	new g5plusFramework_Shortcode_Testimonial();
}
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_cortana_testimonial_ctn extends WPBakeryShortCodesContainer {
	}
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_cortana_testimonial_sc extends WPBakeryShortCode {
	}
}
?>
