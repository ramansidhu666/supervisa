<?php// don't load directlyif ( !defined( 'ABSPATH' ) ) {	die( '-1' );}if ( !class_exists( 'g5plusFramework_Shortcode_Download' ) ) {	class g5plusFramework_Shortcode_Download {		function __construct() {			add_shortcode( 'cortana_download', array( $this, 'dowload_shortcode' ) );		}		function dowload_shortcode( $atts ) {			$title = $file_type = $file_download = $html = $el_class = $style_icon = $g5plus_animation = $css_animation = $duration = $delay = $styles_animation = '';			extract( shortcode_atts( array(				'title'         => '',				'file_type'     => 'doc',				'file_download' => '',				'el_class'      => '',				'css_animation' => '',				'duration'      => '',				'delay'         => ''			), $atts ) );			$g5plus_animation .= ' ' . esc_attr( $el_class );			$g5plus_animation .= g5plusFramework_Shortcodes::g5plus_get_css_animation( $css_animation );			if ( $file_type == 'doc' ) {				$icon_type = 'icon icon-doc2';			} elseif ( $file_type == 'xls' ) {				$icon_type = 'fa fa-file-excel-o';			} elseif ( $file_type = 'pdf' ) {				$icon_type = 'icon icon-pdf19';			} else {				$icon_type = 'icon icon-ppt';			}			if ( $title != '' ) {			} else {				$title = 'Download.' . $file_type . '';			}//			require_once(plugin_dir_url( __FILE__ ) .'includes/widgets/download/download.php');			include_once( PLUGIN_G5PLUS_FRAMEWORK_DIR . 'includes/widgets/download/download.php' );			$download = new g5plus_download();			ob_start(); ?>			<div class="cortana-download <?php echo esc_attr( $g5plus_animation ) ?>" <?php echo g5plusFramework_Shortcodes::g5plus_get_style_animation( $duration, $delay ); ?>>				<?php				if ( $file_download != '' ) {				?>				<div class="widget-download-wrap">					<?php $download_link = $download->get_media_downloader( $file_download ) ?>					<a href="<?php echo wp_kses_post( $download_link ) ?>"><i class="<?php echo esc_attr( $icon_type ) ?>"></i><?php echo esc_html( $title ) ?>					</a>					<?php					}					?>				</div>			</div>			<?php			$content = ob_get_clean();			return $content;		}	}	new g5plusFramework_Shortcode_Download();}