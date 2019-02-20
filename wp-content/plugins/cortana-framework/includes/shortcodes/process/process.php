<?php
// don't load directly
if ( !defined( 'ABSPATH' ) ) {
	die( '-1' );
}
if ( !class_exists( 'g5plusFramework_Shortcode_Progress' ) ) {
	class g5plusFramework_Shortcode_Progress {
		function __construct() {
			add_shortcode( 'cortana_process', array( $this, 'progress_shortcode' ) );
		}

		function progress_shortcode( $atts ) {
			$bg_progress = $css = $style = $value = $last_step = $step = $layout_style = $description = $title = $link
				= $html =
			$el_class =
			$title_style = $g5plus_animation = $css_animation = $duration = $delay = $styles_animation = '';
			extract( shortcode_atts( array(
				'layout_style'  => 'style1',
				'value'         => '',
				'title'         => '',
				'title_layout'  => 'no-border',
				'bg_progress'   => '',
				'el_class'      => '',
				'css_animation' => '',
				'duration'      => '',
				'delay'         => ''
			), $atts ) );
			$custom_styles = array();
			$g5plus_animation .= ' ' . esc_attr( $el_class );
			$g5plus_animation .= g5plusFramework_Shortcodes::g5plus_get_css_animation( $css_animation );
			wp_enqueue_script( 'cortana_process', plugins_url( 'cortana-framework/includes/shortcodes/process/process.js' ),
				array(), false, true );
			if ( $title_style == 'border-bottom' ) {
				$title_class = 'cortana-title';
			} else {
				$title_class = 'no-border';
			}
			if ( $value != '' ) {
				$custom_styles[] = 'width:' . $value . '%';
			}
			if ( $bg_progress != '' ) {
				$custom_styles[] = 'background-color:' . $bg_progress;
			}
			$style = '';
			if ( $custom_styles ) {
				$style = 'style="' . join( ';', $custom_styles ) . '"';
			}
			ob_start(); ?>
			<div class="cortana-process <?php echo esc_attr( $layout_style ) ?> <?php echo esc_attr( $g5plus_animation )
			?>" <?php echo g5plusFramework_Shortcodes::g5plus_get_style_animation( $duration, $delay ); ?>>
				<h3 class="process-title <?php echo esc_attr( $title_class ) ?>"><?= esc_html( $title ) ?></h3>

				<div class="process-wrap">
					<span <?php echo wp_kses_post( $style ); ?>></span>
				</div>

			</div>
			<?php
			$content = ob_get_clean();

			return $content;
		}
	}

	new g5plusFramework_Shortcode_Progress();
}