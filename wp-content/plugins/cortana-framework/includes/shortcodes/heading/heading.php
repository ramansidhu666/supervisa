<?php
// don't load directly
if ( !defined( 'ABSPATH' ) ) {
	die( '-1' );
}
if ( !class_exists( 'g5plusFramework_Shortcode_Heading' ) ) {
	class g5plusFramework_Shortcode_Heading {
		function __construct() {
			add_shortcode( 'cortana_heading', array( $this, 'heading_shortcode' ) );
		}

		function heading_shortcode( $atts ) {
			$align = $title_style = $font_size_title = $title = $layout_style = $title = $html = $el_class = $g5plus_animation = $css_animation = $duration = $delay = $styles_animation = '';
			extract( shortcode_atts( array(
				'layout_style'    => 'style1',
				'title'           => '',
				'title_style'     => 'border-bottom',
				'font_size_title' => '20',
				'align'           => 'left',
				'el_class'        => '',
				'css_animation'   => '',
				'duration'        => '',
				'delay'           => ''
			), $atts ) );
			$custom_styles = array();
			$g5plus_animation .= ' ' . esc_attr( $el_class );
			$g5plus_animation .= g5plusFramework_Shortcodes::g5plus_get_css_animation( $css_animation );
			if ( $font_size_title != '' ) {
				$custom_styles[] = 'font-size:' . $font_size_title . 'px';
			}
			$style = '';
			if ( $custom_styles ) {
				$style = 'style="' . join( ';', $custom_styles ) . '"';
			}
			if ( $title_style == 'border-bottom' ) {
				$title_class = 'border-bottom';
			} else {
				$title_class = 'no-border';
			}
			ob_start(); ?>
			<div class="cortana-heading <?php echo esc_attr( $title_class ); ?> <?php echo esc_attr( $align ) ?> <?php echo esc_attr( $layout_style ) ?><?php echo esc_attr( $g5plus_animation ) ?>" <?php echo g5plusFramework_Shortcodes::g5plus_get_style_animation( $duration, $delay ); ?>>
				<?php if ( $title != '' ): ?>
					<h2 <?php echo wp_kses_post( $style ); ?>><?php echo wp_kses_post( $title ) ?></h2>
				<?php endif; ?>
			</div>
			<?php
			$content = ob_get_clean();

			return $content;
		}
	}

	new g5plusFramework_Shortcode_Heading();
}