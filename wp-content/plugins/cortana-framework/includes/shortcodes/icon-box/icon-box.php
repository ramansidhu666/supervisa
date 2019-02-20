<?php
// don't load directly
if ( !defined( 'ABSPATH' ) ) {
	die( '-1' );
}
if ( !class_exists( 'g5plusFramework_Shortcode_Icon_Box' ) ) {
	class g5plusFramework_Shortcode_Icon_Box {
		function __construct() {
			add_shortcode( 'cortana_icon_box', array( $this, 'icon_box_shortcode' ) );
		}

		function icon_box_shortcode( $atts ) {
			$title_style = $icon_type = $image = $layout_style = $link = $description = $title = $icon_bg = $icon_color =
			$icon_border_color =
			$icon = $html = $el_class = $style_icon =
			$g5plus_animation = $css_animation = $duration = $delay = $styles_animation = '';
			extract( shortcode_atts( array(
				'layout_style'      => 'style1',
				'icon_type'         => 'font-icon',
				'icon'              => '',
				'icon_bg'           => '',
				'icon_color'        => '',
				'icon_border_color' => '',
				'image'             => '',
				'link'              => '',
				'title'             => '',
				'title_style'       => 'no-border',
				'description'       => '',
				'el_class'          => '',
				'css_animation'     => '',
				'duration'          => '',
				'delay'             => ''
			), $atts ) );
			$custom_styles = array();
			$custom_data   = array();
			$g5plus_animation .= ' ' . esc_attr( $el_class );
			$g5plus_animation .= g5plusFramework_Shortcodes::g5plus_get_css_animation( $css_animation );
			//parse link
			$link = ( $link == '||' ) ? '' : $link;
			$link = vc_build_link( $link );

			$a_title  = '';
			$a_target = '_self';
			$a_href   = '#';
			if ( $title_style == 'border-bottom' ) {
				$title_class = 'border-bottom';
			} else {
				$title_class = 'no-border';
			}
			if ( strlen( $link['url'] ) > 0 ) {
				$a_href   = $link['url'];
				$a_title  = $link['title'];
				$a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
			}
			if ( $icon_bg != '' ) {
				$custom_styles[] = 'background-color:' . $icon_bg;
			} else {
				$custom_styles[] = 'background-color: transparent';
			}
			if ( $icon_color != '' ) {
				$custom_styles[] = 'color:' . $icon_color;
			}
			if ( $icon_border_color != '' ) {
				$custom_styles[] = 'border-color:' . $icon_border_color;
			} else {
				$custom_styles[] = 'border-color: transparent';
			}
			if ( $custom_styles ) {
				$style_icon = 'style="' . join( ';', $custom_styles ) . '"';
			}
			ob_start(); ?>
			<div
				class="cortana-icon-box clearfix <?php echo esc_attr( $layout_style ) ?><?php echo esc_attr
				( $g5plus_animation ) ?>"
				<?php echo g5plusFramework_Shortcodes::g5plus_get_style_animation( $duration, $delay ); ?>>
				<a class="ibox-icon" title="<?php echo esc_attr( $a_title ); ?>" <?php echo wp_kses_post( $style_icon ); ?>
				   target="<?php echo trim( esc_attr( $a_target ) ); ?>" href="<?php echo esc_url( $a_href ) ?>">
					<?php if ( $icon_type == 'font-icon' ) : ?>
						<i class="<?php echo esc_attr( $icon ) ?>"></i>
						<?php
					else :
						$img = wp_get_attachment_image_src( $image, 'large' );
						?>
						<img src="<?php echo esc_attr( $img[0] ) ?>" />
					<?php endif; ?>
				</a>

				<div class="icon-entry-content">
					<?php if ( $title != '' ): ?>
						<h3 class="<?php echo esc_attr( $title_class ); ?>">
							<a title="<?php echo esc_attr( $a_title ); ?>" target="<?php echo trim( esc_attr( $a_target ) ); ?>"
							   href="<?php echo esc_url( $a_href ) ?>"><?php echo esc_html( $title ) ?></a></h3>
					<?php endif;
					if ( $description != '' ):?>
						<p><?php echo wp_kses_post( $description ) ?></p>
					<?php endif; ?>
				</div>
			</div>
			<?php
			$content = ob_get_clean();

			return $content;
		}
	}

	new g5plusFramework_Shortcode_Icon_Box();
}