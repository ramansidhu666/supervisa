<?php
// don't load directly
if ( !defined( 'ABSPATH' ) ) {
	die( '-1' );
}
if ( !class_exists( 'g5plusFramework_ShortCode_Counter' ) ) {
	class g5plusFramework_ShortCode_Counter {
		function __construct() {
			add_shortcode( 'cortana_counter', array( $this, 'counter_shortcode' ) );
		}

		function counter_shortcode( $atts ) {
			$text_color = $layout_style = $value = $title = $padding_top = $padding_bottom = $html = $el_class = $css = $style = '';
			extract( shortcode_atts( array(
				'layout_style'   => 'style1',
				'value'          => '',
				'title'          => '',
				'text_color'     => '',
				'padding_top'    => '97',
				'padding_bottom' => '115',
				'el_class'       => ''
			), $atts ) );
			wp_enqueue_script( 'waypoints' );
			$custom_styles = array();
			if ( $padding_top != '' ) {
				$custom_styles[] = 'padding-top: ' . $padding_top . 'px';
			}
			if ( $padding_bottom != '' ) {
				$custom_styles[] = 'padding-bottom: ' . $padding_bottom . 'px';
			}
			if ( $text_color != '' ) {
				$custom_styles[] = 'color: ' . $text_color . '';
			}
			if ( $custom_styles ) {
				$style = 'style="' . join( ';', $custom_styles ) . '"';
			}
			wp_enqueue_script( 'cortana_counter', plugins_url( 'cortana-framework/includes/shortcodes/counter/jquery.countTo.js' ), array( 'jquery' ), false, true );
			ob_start(); ?>
			<div class="cortana-counter <?php echo esc_attr( $layout_style ) ?> <?php echo esc_attr( $el_class ) ?>"
				<?php echo wp_kses_post( $style ); ?> >
				<?php if ( $value != '' ): ?>
					<span class="display-percentage" data-percentage="<?php echo esc_attr( $value ) ?>"><?php echo esc_html( $value ) ?></span>
					<?php if ( $title != '' ): ?>
						<p class="counter-title"><?php echo wp_kses_post( $title ) ?></p>
					<?php endif;
				endif; ?>
			</div>
			<?php
			$content = ob_get_clean();

			return $content;
		}
	}

	new g5plusFramework_ShortCode_Counter();
}