<?php
/**
 * Created by PhpStorm.
 * User: PhanLong
 * Date: 10/9/2015
 * Time: 3:00 PM
 */
// don't load directly
if ( !defined( 'ABSPATH' ) ) {
	die( '-1' );
}
if ( !class_exists( 'g5plusFramework_Shortcode_Notification' ) ) {
	class g5plusFramework_Shortcode_Notification {
		function __construct() {
			add_shortcode( 'cortana_notification', array( $this, 'notification_shortcode' ) );
		}

		function notification_shortcode( $atts ) {
			$message_type = $description = $title = $layout_style = $html = $el_class = $g5plus_animation =
			$css_animation = $class_message = $icon_alert =
			$duration = $delay = $styles_animation = '';
			extract( shortcode_atts( array(
				'layout_style'  => 'style1',
				'message_type'  => 'type-1',
				'title'         => '',
				'description'   => '',
				'el_class'      => '',
				'css_animation' => '',
				'duration'      => '',
				'delay'         => ''
			), $atts ) );
			$g5plus_animation .= ' ' . esc_attr( $el_class );
			$g5plus_animation .= g5plusFramework_Shortcodes::g5plus_get_css_animation( $css_animation );
			if ( $message_type == 'type-1' ) {
				$class_message = 'alert-notice';
				$icon_alert    = '<i class="fa fa-volume-up"></i>';
			} elseif ( $message_type == 'type-2' ) {
				$class_message = 'alert-error';
				$icon_alert    = '<i class="fa fa-times-circle"></i>';
			} elseif ( $message_type == 'type-3' ) {
				$class_message = 'alert-wairning';
				$icon_alert    = '<i class="fa fa-exclamation-triangle"></i>';
			} elseif ( $message_type == 'type-4' ) {
				$class_message = 'alert-success';
				$icon_alert    = '<i class="fa fa-check"></i>';
			} else {
				$class_message = 'alert-info';
				$icon_alert    = '<i class="fa fa-info-circle"></i>';
			}
			ob_start(); ?>
			<div class="cortana-notification <?php echo esc_attr( $layout_style ) ?><?php echo esc_attr( $g5plus_animation )
			?>">
				<div class="alert fade in <?php echo esc_attr( $class_message ) ?>">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<?php echo wp_kses_post( $icon_alert ); ?>
					<div class="alert-content">
						<?php if ( $title != '' ) { ?>
							<strong><?php echo esc_html( $title ); ?></strong>
						<?php } ?>
						<?php echo wp_kses_post( $description ) ?>
					</div>
				</div>
			</div>
			<?php
			$content = ob_get_clean();

			return $content;
		}
	}

	new g5plusFramework_Shortcode_Notification();
}