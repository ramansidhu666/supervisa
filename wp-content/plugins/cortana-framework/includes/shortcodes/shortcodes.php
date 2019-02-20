<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 5/28/2015
 * Time: 5:44 PM
 */
if ( !class_exists( 'g5plusFramework_Shortcodes' ) ) {
	class g5plusFramework_Shortcodes {

		private static $instance;

		public static function init() {
			if ( !isset( self::$instance ) ) {
				self::$instance = new g5plusFramework_Shortcodes;
				add_action( 'init', array( self::$instance, 'includes' ), 0 );
				add_action( 'init', array( self::$instance, 'register_vc_map' ), 10 );
			}

			return self::$instance;
		}

		public function includes() {
			include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
			if ( !is_plugin_active( 'js_composer/js_composer.php' ) ) {
				return;
			}
			global $g5plus_options;
			$cpt_disable = $g5plus_options['cpt-disable'];
			include_once( PLUGIN_G5PLUS_FRAMEWORK_DIR . 'includes/shortcodes/slider-container/slider-container.php' );
			include_once( PLUGIN_G5PLUS_FRAMEWORK_DIR . 'includes/shortcodes/heading/heading.php' );
			include_once( PLUGIN_G5PLUS_FRAMEWORK_DIR . 'includes/shortcodes/button/button.php' );
			include_once( PLUGIN_G5PLUS_FRAMEWORK_DIR . 'includes/shortcodes/icon-box/icon-box.php' );
			include_once( PLUGIN_G5PLUS_FRAMEWORK_DIR . 'includes/shortcodes/partner-carousel/partner-carousel.php' );
			include_once( PLUGIN_G5PLUS_FRAMEWORK_DIR . 'includes/shortcodes/post/post.php' );
			include_once( PLUGIN_G5PLUS_FRAMEWORK_DIR . 'includes/shortcodes/feature/feature.php' );
			include_once( PLUGIN_G5PLUS_FRAMEWORK_DIR . 'includes/shortcodes/testimonial/testimonial.php' );
			include_once( PLUGIN_G5PLUS_FRAMEWORK_DIR . 'includes/shortcodes/counter/counter.php' );
			include_once( PLUGIN_G5PLUS_FRAMEWORK_DIR . 'includes/shortcodes/process/process.php' );
			include_once( PLUGIN_G5PLUS_FRAMEWORK_DIR . 'includes/shortcodes/video-bg/video-bg.php' );
			include_once( PLUGIN_G5PLUS_FRAMEWORK_DIR . 'includes/shortcodes/notification/notification.php' );
			include_once( PLUGIN_G5PLUS_FRAMEWORK_DIR . 'includes/shortcodes/gallery/gallery.php' );
			include_once( PLUGIN_G5PLUS_FRAMEWORK_DIR . 'includes/shortcodes/download/download.php' );

			if ( !isset( $cpt_disable ) || $cpt_disable['ourteam'] == '0' || $cpt_disable['ourteam'] == '' ) {
				include_once( PLUGIN_G5PLUS_FRAMEWORK_DIR . 'includes/shortcodes/ourteam/ourteam.php' );
			}
			if ( !isset( $cpt_disable ) || $cpt_disable['portfolio'] == '0' || $cpt_disable['portfolio'] == '' ) {
				include_once( PLUGIN_G5PLUS_FRAMEWORK_DIR . 'includes/shortcodes/portfolio/portfolio.php' );
			}
			if ( !isset( $cpt_disable ) || $cpt_disable['services'] == '0' || $cpt_disable['services'] == '' ) {
				include_once( PLUGIN_G5PLUS_FRAMEWORK_DIR . 'includes/shortcodes/services/services.php' );
			}
			include_once( PLUGIN_G5PLUS_FRAMEWORK_DIR . 'includes/shortcodes/product/product.php' );
			include_once( PLUGIN_G5PLUS_FRAMEWORK_DIR . 'includes/shortcodes/product/product-categories.php' );
			include_once( PLUGIN_G5PLUS_FRAMEWORK_DIR . 'includes/shortcodes/countdown/countdown.php' );
		}

		public static function g5plus_get_css_animation( $css_animation ) {
			$output = '';
			if ( $css_animation != '' ) {
				wp_enqueue_script( 'waypoints' );
				$output = ' wpb_animate_when_almost_visible g5plus-css-animation ' . $css_animation;
			}

			return $output;
		}

		public static function g5plus_get_style_animation( $duration, $delay ) {
			$styles = array();
			if ( $duration != '0' && !empty( $duration ) ) {
				$duration = (float) trim( $duration, "\n\ts" );
				$styles[] = "-webkit-animation-duration: {$duration}s";
				$styles[] = "-moz-animation-duration: {$duration}s";
				$styles[] = "-ms-animation-duration: {$duration}s";
				$styles[] = "-o-animation-duration: {$duration}s";
				$styles[] = "animation-duration: {$duration}s";
			}
			if ( $delay != '0' && !empty( $delay ) ) {
				$delay    = (float) trim( $delay, "\n\ts" );
				$styles[] = "opacity: 0";
				$styles[] = "-webkit-animation-delay: {$delay}s";
				$styles[] = "-moz-animation-delay: {$delay}s";
				$styles[] = "-ms-animation-delay: {$delay}s";
				$styles[] = "-o-animation-delay: {$delay}s";
				$styles[] = "animation-delay: {$delay}s";
			}
			if ( count( $styles ) > 1 ) {
				return 'style="' . implode( ';', $styles ) . '"';
			}

			return implode( ';', $styles );
		}

		public static function  g5plus_convert_hex_to_rgba( $hex, $opacity = 1 ) {
			$hex = str_replace( "#", "", $hex );
			if ( strlen( $hex ) == 3 ) {
				$r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
				$g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
				$b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
			} else {
				$r = hexdec( substr( $hex, 0, 2 ) );
				$g = hexdec( substr( $hex, 2, 2 ) );
				$b = hexdec( substr( $hex, 4, 2 ) );
			}
			$rgba = 'rgba(' . $r . ',' . $g . ',' . $b . ',' . $opacity . ')';

			return $rgba;
		}

		public static function  substr( $str, $txt_len, $end_txt = '...' ) {
			if ( empty( $str ) ) {
				return '';
			}
			if ( strlen( $str ) <= $txt_len ) {
				return $str;
			}

			$i = $txt_len;
			while ( $str[$i] != ' ' ) {
				$i --;
				if ( $i == - 1 ) {
					break;
				}
			}
			while ( $str[$i] == ' ' ) {
				$i --;
				if ( $i == - 1 ) {
					break;
				}
			}

			return substr( $str, 0, $i + 1 ) . $end_txt;
		}


		public function register_vc_map() {

			global $g5plus_options;
			$cpt_disable = $g5plus_options['cpt-disable'];

			if ( function_exists( 'vc_map' ) ) {
				$title_style       = array(
					'type'        => 'dropdown',
					'heading'     => __( 'Title Style', 'cortana' ),
					'param_name'  => 'title_style',
					'value'       => array( __( 'Border Bottom', 'cortana' ) => 'border-bottom',
											__( 'No Border', 'cortana' )     => 'no-border' ),
					'description' => __( 'Select title style', 'cortana' ),
				);
				$add_css_animation = array(
					'type'        => 'dropdown',
					'heading'     => __( 'CSS Animation', 'cortana' ),
					'param_name'  => 'css_animation',
					'value'       => array( __( 'No', 'cortana' ) => '', __( 'Fade In', 'cortana' ) => 'wpb_fadeIn', __( 'Fade Top to Bottom', 'cortana' ) => 'wpb_fadeInDown', __( 'Fade Bottom to Top', 'cortana' ) => 'wpb_fadeInUp', __( 'Fade Left to Right', 'cortana' ) => 'wpb_fadeInLeft', __( 'Fade Right to Left', 'cortana' ) => 'wpb_fadeInRight', __( 'Bounce In', 'cortana' ) => 'wpb_bounceIn', __( 'Bounce Top to Bottom', 'cortana' ) => 'wpb_bounceInDown', __( 'Bounce Bottom to Top', 'cortana' ) => 'wpb_bounceInUp', __( 'Bounce Left to Right', 'cortana' ) => 'wpb_bounceInLeft', __( 'Bounce Right to Left', 'cortana' ) => 'wpb_bounceInRight', __( 'Zoom In', 'cortana' ) => 'wpb_zoomIn', __( 'Flip Vertical', 'cortana' ) => 'wpb_flipInX', __( 'Flip Horizontal', 'cortana' ) => 'wpb_flipInY', __( 'Bounce', 'cortana' ) => 'wpb_bounce', __( 'Flash', 'cortana' ) => 'wpb_flash', __( 'Shake', 'cortana' ) => 'wpb_shake', __( 'Pulse', 'cortana' ) => 'wpb_pulse', __( 'Swing', 'cortana' ) => 'wpb_swing', __( 'Rubber band', 'cortana' ) => 'wpb_rubberBand', __( 'Wobble', 'cortana' ) => 'wpb_wobble', __( 'Tada', 'cortana' ) => 'wpb_tada' ),
					'description' => __( 'Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'cortana' ),
					'group'       => __( 'Animation Settings', 'cortana' )
				);

				$add_duration_animation = array(
					'type'        => 'textfield',
					'heading'     => __( 'Animation Duration', 'cortana' ),
					'param_name'  => 'duration',
					'value'       => '',
					'description' => __( 'Duration in seconds. You can use decimal points in the value. Use this field to specify the amount of time the animation plays. <em>The default value depends on the animation, leave blank to use the default.</em>', 'cortana' ),
					'dependency'  => Array( 'element' => 'css_animation', 'value' => array( 'wpb_fadeIn', 'wpb_fadeInDown', 'wpb_fadeInUp', 'wpb_fadeInLeft', 'wpb_fadeInRight', 'wpb_bounceIn', 'wpb_bounceInDown', 'wpb_bounceInUp', 'wpb_bounceInLeft', 'wpb_bounceInRight', 'wpb_zoomIn', 'wpb_flipInX', 'wpb_flipInY', 'wpb_bounce', 'wpb_flash', 'wpb_shake', 'wpb_pulse', 'wpb_swing', 'wpb_rubberBand', 'wpb_wobble', 'wpb_tada' ) ),
					'group'       => __( 'Animation Settings', 'cortana' )
				);

				$add_delay_animation = array(
					'type'        => 'textfield',
					'heading'     => __( 'Animation Delay', 'cortana' ),
					'param_name'  => 'delay',
					'value'       => '',
					'description' => __( 'Delay in seconds. You can use decimal points in the value. Use this field to delay the animation for a few seconds, this is helpful if you want to chain different effects one after another above the fold.', 'cortana' ),
					'dependency'  => Array( 'element' => 'css_animation', 'value' => array( 'wpb_fadeIn', 'wpb_fadeInDown', 'wpb_fadeInUp', 'wpb_fadeInLeft', 'wpb_fadeInRight', 'wpb_bounceIn', 'wpb_bounceInDown', 'wpb_bounceInUp', 'wpb_bounceInLeft', 'wpb_bounceInRight', 'wpb_zoomIn', 'wpb_flipInX', 'wpb_flipInY', 'wpb_bounce', 'wpb_flash', 'wpb_shake', 'wpb_pulse', 'wpb_swing', 'wpb_rubberBand', 'wpb_wobble', 'wpb_tada' ) ),
					'group'       => __( 'Animation Settings', 'cortana' )
				);

				$add_el_class = array(
					'type'        => 'textfield',
					'heading'     => __( 'Extra class name', 'cortana' ),
					'param_name'  => 'el_class',
					'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'cortana' ),
				);

				$target_arr = array(
					__( 'Same window', 'cortana' ) => '_self',
					__( 'New window', 'cortana' )  => '_blank'
				);
				$colors_arr = array(
					__( 'Cortana Color', 'cortana' ) => 'cortana_color',
					__( 'Grey', 'cortana' )          => 'wpb_button',
					__( 'Blue', 'cortana' )          => 'btn-primary',
					__( 'Turquoise', 'cortana' )     => 'btn-info',
					__( 'Green', 'cortana' )         => 'btn-success',
					__( 'Orange', 'cortana' )        => 'btn-warning',
					__( 'Red', 'cortana' )           => 'btn-danger',
					__( 'Black', 'cortana' )         => "btn-inverse"
				);
				vc_map( array(
					'name'                    => __( 'Slider Container', 'cortana' ),
					'base'                    => 'cortana_slider_container',
					'class'                   => '',
					'icon'                    => 'fa fa-ellipsis-h',
					'category'                => G5PLUS_FRAMEWORK_SHORTCODE_CATEGORY,
					'as_parent'               => array( 'except' => 'cortana_slider_container' ),
					'content_element'         => true,
					'show_settings_on_create' => true,
					'params'                  => array(
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Navigation', 'cortana' ),
							'param_name'       => 'navigation',
							'description'      => __( 'Show navigation.', 'cortana' ),
							'value'            => array( __( 'Yes, please', 'cortana' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6 vc_column'
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Pagination', 'cortana' ),
							'param_name'       => 'pagination',
							'description'      => __( 'Show pagination.', 'cortana' ),
							'value'            => array( __( 'Yes, please', 'cortana' ) => 'yes' ),
							'std'              => 'yes',
							'edit_field_class' => 'vc_col-sm-6 vc_column'
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Single Item', 'cortana' ),
							'param_name'       => 'singleitem',
							'description'      => __( 'Display only one item.', 'cortana' ),
							'value'            => array( __( 'Yes, please', 'cortana' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6 vc_column'
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Stop On Hover', 'cortana' ),
							'param_name'       => 'stoponhover',
							'description'      => __( 'Stop autoplay on mouse hover.', 'cortana' ),
							'value'            => array( __( 'Yes, please', 'cortana' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6 vc_column'
						),
						array(
							'type'        => 'textfield',
							'heading'     => __( 'Auto Play', 'cortana' ),
							'param_name'  => 'autoplay',
							'description' => __( 'Change to any integer for example autoPlay : 5000 to play every 5 seconds. If you set autoPlay: true default speed will be 5 seconds.', 'cortana' ),
							'value'       => '',
							'std'         => 'true'
						),
						array(
							'type'        => 'textfield',
							'heading'     => __( 'Items', 'cortana' ),
							'param_name'  => 'items',
							'description' => __( 'This variable allows you to set the maximum amount of items displayed at a time with the widest browser width', 'cortana' ),
							'value'       => '',
							'std'         => 4
						),
						array(
							'type'        => 'textfield',
							'heading'     => __( 'Items Desktop', 'cortana' ),
							'param_name'  => 'itemsdesktop',
							'description' => __( 'This allows you to preset the number of slides visible with a particular browser width. The format is [x,y] whereby x=browser width and y=number of slides displayed. For example [1199,4] means that if(window<=1199){ show 4 slides per page} Alternatively use itemsDesktop: false to override these settings.', 'cortana' ),
							'value'       => '',
							'std'         => '1199,4'
						),
						array(
							'type'       => 'textfield',
							'heading'    => __( 'Items Desktop Small', 'cortana' ),
							'param_name' => 'itemsdesktopsmall',
							'value'      => '',
							'std'        => '979,3'
						),
						array(
							'type'       => 'textfield',
							'heading'    => __( 'Items Tablet', 'cortana' ),
							'param_name' => 'itemstablet',
							'value'      => '',
							'std'        => '768,2'
						),
						array(
							'type'       => 'textfield',
							'heading'    => __( 'Items Tablet Small', 'cortana' ),
							'param_name' => 'itemstabletsmall',
							'value'      => '',
							'std'        => 'false'
						),
						array(
							'type'       => 'textfield',
							'heading'    => __( 'Items Mobile', 'cortana' ),
							'param_name' => 'itemsmobile',
							'value'      => '',
							'std'        => '479,1'
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Items Scale Up', 'cortana' ),
							'param_name'       => 'itemsscaleup',
							'description'      => __( 'Option to not stretch items when it is less than the supplied items.', 'cortana' ),
							'value'            => array( __( 'Yes, please', 'cortana' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6 vc_column'
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Auto Height', 'cortana' ),
							'param_name'       => 'autoheight',
							'description'      => __( 'You can use different heights on slides.', 'cortana' ),
							'value'            => array( __( 'Yes, please', 'cortana' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6 vc_column'
						),
						array(
							'type'        => 'textfield',
							'heading'     => __( 'Slide Speed', 'cortana' ),
							'param_name'  => 'slidespeed',
							'description' => __( 'Slide speed in milliseconds. Ex 200', 'cortana' ),
							'value'       => '',
							'std'         => '200',
						),
						array(
							'type'        => 'textfield',
							'heading'     => __( 'Pagination Speed', 'cortana' ),
							'param_name'  => 'paginationspeed',
							'description' => __( 'Pagination speed in milliseconds. Ex 800', 'cortana' ),
							'value'       => '',
							'std'         => '800',
						),
						array(
							'type'        => 'textfield',
							'heading'     => __( 'Rewind Speed', 'cortana' ),
							'param_name'  => 'rewindspeed',
							'description' => __( 'Rewind speed in milliseconds. Ex 1000', 'cortana' ),
							'value'       => '',
							'std'         => '1000',
						),
						$add_el_class,
						$add_css_animation,
						$add_duration_animation,
						$add_delay_animation
					),
					'js_view'                 => 'VcColumnView'
				) );
//				vc_map( array(
//					'name'     => __( 'Testimonials', 'cortana' ),
//					'base'     => 'cortana_testimonial',
//					'class'    => '',
//					'icon'     => 'fa fa-quote-left',
//					'category' => G5PLUS_FRAMEWORK_SHORTCODE_CATEGORY,
//					'params'   => array(
//						array(
//							'type'        => 'dropdown',
//							'heading'     => __( 'Layout Style', 'cortana' ),
//							'param_name'  => 'layout_style',
//							'admin_label' => true,
//							'value'       => array( __( 'style 1', 'cortana' ) => 'style1' ),
//							'description' => __( 'Select Layout Style.', 'cortana' )
//						),
//						array(
//							'type'        => 'textfield',
//							'heading'     => __( 'Title', 'cortana' ),
//							'param_name'  => 'title',
//							'description' => __( 'Enter title.', 'cortana' )
//						),
//						$title_style,
//						array(
//							'type'       => 'colorpicker',
//							'heading'    => __( 'Background', 'cortana' ),
//							'param_name' => 'bg_testimonials',
//							'value'      => '',
//						),
//						array(
//							'type'        => 'textfield',
//							'heading'     => __( 'Author name', 'cortana' ),
//							'param_name'  => 'author',
//							'admin_label' => true,
//							'description' => __( 'Enter Author name.', 'cortana' )
//						),
//						array(
//							'type'        => 'textfield',
//							'heading'     => __( 'Author information', 'cortana' ),
//							'param_name'  => 'author_info',
//							'description' => __( 'Enter author information.', 'cortana' )
//						),
//						array(
//							'type'        => 'attach_image',
//							'heading'     => __( 'Author Avata', 'cortana' ),
//							'param_name'  => 'author_avata',
//							'description' => __( 'Select image from library.', 'cortana' )
//						),
//						array(
//							'type'       => 'textarea',
//							'heading'    => __( 'Quote from author', 'cortana' ),
//							'param_name' => 'content',
//							'value'      => ''
//						),
//						array(
//							'type'       => 'colorpicker',
//							'heading'    => __( 'Quote Color', 'cortana' ),
//							'param_name' => 'quote_color',
//							'value'      => '',
//						),
//						$add_el_class,
//						$add_css_animation,
//						$add_duration_animation,
//						$add_delay_animation
//					)
//				) );
				vc_map( array(
					'name'                    => __( 'Testimonials', 'cortana' ),
					'base'                    => 'cortana_testimonial_ctn',
					'class'                   => '',
					'icon'                    => 'fa fa-quote-left',
					'category'                => G5PLUS_FRAMEWORK_SHORTCODE_CATEGORY,
					'as_parent'               => array( 'only' => 'cortana_testimonial_sc' ),
					'content_element'         => true,
					'show_settings_on_create' => true,
					'params'                  => array(
						array(
							'type'        => 'dropdown',
							'heading'     => __( 'Layout Style', 'cortana' ),
							'param_name'  => 'layout_style',
							'admin_label' => true,
							'value'       => array( __( 'style 1', 'cortana' ) => 'style1',
													__( 'style 2', 'cortana' ) => 'style2' ),
							'description' => __( 'Select Layout Style.', 'cortana' )
						),
						array(
							'type'        => 'textfield',
							'heading'     => __( 'Auto Play', 'cortana' ),
							'param_name'  => 'autoplay',
							'description' => __( 'Change to any integer for example autoPlay : 5000 to play every 5 seconds. If you set autoPlay: true default speed will be 5 seconds.', 'cortana' ),
							'value'       => '',
							'std'         => 'true'
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Stop On Hover', 'cortana' ),
							'param_name'       => 'stoponhover',
							'description'      => __( 'Stop autoplay on mouse hover.', 'cortana' ),
							'value'            => array( __( 'Yes, please', 'cortana' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6 vc_column'
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Auto Height', 'cortana' ),
							'param_name'       => 'autoheight',
							'description'      => __( 'You can use different heights on slides.', 'cortana' ),
							'value'            => array( __( 'Yes, please', 'cortana' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6 vc_column'
						),
						array(
							'type'        => 'textfield',
							'heading'     => __( 'Slide Speed', 'cortana' ),
							'param_name'  => 'slidespeed',
							'description' => __( 'Slide speed in milliseconds. Ex 200', 'cortana' ),
							'value'       => '',
							'std'         => '200',
						),
						array(
							'type'        => 'textfield',
							'heading'     => __( 'Pagination Speed', 'cortana' ),
							'param_name'  => 'paginationspeed',
							'description' => __( 'Pagination speed in milliseconds. Ex 800', 'cortana' ),
							'value'       => '',
							'std'         => '800',
						),
						array(
							'type'        => 'textfield',
							'heading'     => __( 'Rewind Speed', 'cortana' ),
							'param_name'  => 'rewindspeed',
							'description' => __( 'Rewind speed in milliseconds. Ex 1000', 'cortana' ),
							'value'       => '',
							'std'         => '1000',
						),
						array(
							'type'       => 'textfield',
							'heading'    => __( 'Number of item', 'cortana' ),
							'param_name' => 'number_item',
							'value'      => '2',
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Show navigation control', 'cortana' ),
							'param_name'       => 'navigation',
							'value'            => array( __( 'Yes, please', 'cortana' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6 vc_column'
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Show pagination control', 'cortana' ),
							'param_name'       => 'pagination',
							'value'            => array( __( 'Yes, please', 'cortana' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6 vc_column'
						),
						$add_el_class,
						$add_css_animation,
						$add_duration_animation,
						$add_delay_animation
					),
					'js_view'                 => 'VcColumnView'
				) );
				vc_map( array(
					'name'     => __( 'Testimonial', 'cortana' ),
					'base'     => 'cortana_testimonial_sc',
					'class'    => '',
					'icon'     => 'fa fa-user',
					'category' => G5PLUS_FRAMEWORK_SHORTCODE_CATEGORY,
					'as_child' => array( 'only' => 'cortana_testimonial_ctn', 'cortana_slider_container' ),
					'params'   => array(
						array(
							'type'        => 'textfield',
							'heading'     => __( 'Title', 'cortana' ),
							'param_name'  => 'title',
							'description' => __( 'Enter title.', 'cortana' )
						),
						$title_style,
						array(
							'type'       => 'colorpicker',
							'heading'    => __( 'Background', 'cortana' ),
							'param_name' => 'bg_testimonials',
							'value'      => '',
						),
						array(
							'type'        => 'textfield',
							'heading'     => __( 'Author name', 'cortana' ),
							'param_name'  => 'author',
							'admin_label' => true,
							'description' => __( 'Enter Author name.', 'cortana' )
						),
						array(
							'type'        => 'textfield',
							'heading'     => __( 'Author information', 'cortana' ),
							'param_name'  => 'author_info',
							'description' => __( 'Enter author information.', 'cortana' )
						),
						array(
							'type'        => 'attach_image',
							'heading'     => __( 'Author Avata', 'cortana' ),
							'param_name'  => 'author_avata',
							'description' => __( 'Select image from library.', 'cortana' )
						),
						array(
							'type'       => 'textarea',
							'heading'    => __( 'Quote from author', 'cortana' ),
							'param_name' => 'content',
							'value'      => ''
						),
						array(
							'type'       => 'colorpicker',
							'heading'    => __( 'Quote Color', 'cortana' ),
							'param_name' => 'quote_color',
							'value'      => '',
						),
					)
				) );
				vc_map( array(
					'name'     => __( 'Video Background', 'cortana' ),
					'base'     => 'cortana_video_bg',
					'class'    => '',
					'icon'     => 'fa fa-video-camera',
					'category' => G5PLUS_FRAMEWORK_SHORTCODE_CATEGORY,
					'params'   => array(
						array(
							'type'        => 'dropdown',
							'heading'     => __( 'Layout Style', 'cortana' ),
							'param_name'  => 'layout_style',
							'admin_label' => true,
							'value'       => array( __( 'style 1', 'cortana' ) => 'style1' ),
							'description' => __( 'Select Layout Style.', 'cortana' )
						),
						array(
							'type'       => 'textarea',
							'heading'    => __( 'Link Video (.mp4 or .ogg)', 'cortana' ),
							'param_name' => 'video_link',
							'value'      => '',
						),
						array(
							'type'        => 'attach_image',
							'heading'     => __( 'Upload Image:', 'cortana' ),
							'param_name'  => 'image',
							'value'       => '',
							'description' => __( 'Image show on mobile device and when not autoplay mode.', 'cortana' ),
						),
						array(
							'type'       => 'textfield',
							'heading'    => __( 'Title', 'cortana' ),
							'param_name' => 'title',
							'value'      => '',
						),
						array(
							'type'       => 'textarea',
							'heading'    => __( 'Description', 'cortana' ),
							'param_name' => 'description',
							'value'      => '',
						),
						array(
							'type'        => 'checkbox',
							'heading'     => __( 'Video Autoplay', 'cortana' ),
							'param_name'  => 'autoplay',
							'description' => __( 'Enables autoplay mode.', 'cortana' ),
							'value'       => array( __( 'Yes, please', 'cortana' ) => 'yes' )
						),
						$add_el_class,
						$add_css_animation,
						$add_duration_animation,
						$add_delay_animation
					)
				) );
				//Counter Shortcode
				vc_map( array(
					'name'     => __( 'Counter', 'cortana' ),
					'base'     => 'cortana_counter',
					'class'    => '',
					'icon'     => 'fa fa-tachometer',
					'category' => G5PLUS_FRAMEWORK_SHORTCODE_CATEGORY,
					'params'   => array(
						array(
							'type'        => 'dropdown',
							'heading'     => __( 'Layout Style', 'cortana' ),
							'param_name'  => 'layout_style',
							'admin_label' => true,
							'value'       => array( __( 'style 1', 'cortana' ) => 'style1' ),
							'description' => __( 'Select Layout Style.', 'cortana' )
						),
						array(
							'type'        => 'textfield',
							'heading'     => __( 'Title', 'cortana' ),
							'param_name'  => 'title',
							'admin_label' => true,
							'value'       => '',
						),
						array(
							'type'       => 'textfield',
							'heading'    => __( 'Value', 'cortana' ),
							'param_name' => 'value',
							'value'      => '',
						),

						array(
							'type'       => 'colorpicker',
							'heading'    => __( 'Text Color', 'cortana' ),
							'param_name' => 'text_color',
							'value'      => '#444444',
						),

						array(
							'type'       => 'textfield',
							'heading'    => __( 'Padding top', 'cortana' ),
							'param_name' => 'padding_top',
							'value'      => '97',
						),
						array(
							'type'       => 'textfield',
							'heading'    => __( 'Padding bottom', 'cortana' ),
							'param_name' => 'padding_bottom',
							'value'      => '115',
						),
						$add_el_class
					)
				) );
				vc_map( array(
					'name'        => __( 'Pie chart', 'cortana' ),
					'base'        => 'vc_pie',
					'class'       => '',
					'icon'        => 'icon-wpb-vc_pie',
					"category"    => G5PLUS_FRAMEWORK_SHORTCODE_CATEGORY,
					'description' => __( 'Animated pie chart', 'cortana' ),
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => __( 'Layout Style', 'cortana' ),
							'param_name'  => 'layout_style',
							'admin_label' => true,
							'value'       => array( __( 'style 1', 'cortana' ) => 'style1', __( 'style 2', 'cortana' ) => 'style2' ),
							'description' => __( 'Select Layout Style.', 'cortana' )
						),
						array(
							'type'        => 'textfield',
							'heading'     => __( 'Pie value', 'cortana' ),
							'param_name'  => 'value',
							'description' => __( 'Input graph value here. Choose range between 0 and 100.', 'cortana' ),
							'value'       => '50',
							'admin_label' => true
						),
						array(
							'type'        => 'textfield',
							'heading'     => __( 'Pie label value', 'cortana' ),
							'param_name'  => 'label_value',
							'description' => __( 'Input integer value for label. If empty "Pie value" will be used.', 'cortana' ),
							'value'       => ''
						),
						array(
							'type'        => 'textfield',
							'heading'     => __( 'Units', 'cortana' ),
							'param_name'  => 'units',
							'description' => __( 'Enter measurement units (if needed) Eg. %, px, points, etc. Graph value and unit will be appended to the graph title.', 'cortana' )
						),
						array(
							'type'               => 'dropdown',
							'heading'            => __( 'Bar color', 'cortana' ),
							'param_name'         => 'color',
							'value'              => $colors_arr, //$pie_colors,
							'description'        => __( 'Select pie chart color.', 'cortana' ),
							'admin_label'        => true,
							'param_holder_class' => 'vc_colored-dropdown'
						),
						array(
							'type'       => 'textfield',
							'heading'    => __( 'Title', 'cortana' ),
							'param_name' => 'title',
							'value'      => ''
						),
						$add_el_class
					)
				) );

				if ( !isset( $cpt_disable ) || $cpt_disable['portfolio'] == '0' || $cpt_disable['portfolio'] == '' ) {
					$portfolio_categories = get_terms( G5PLUS_PORTFOLIO_CATEGORY_TAXONOMY, array( 'hide_empty' => 0, 'orderby' => 'ASC' ) );
					$portfolio_cat        = array();
					if ( is_array( $portfolio_categories ) ) {
						foreach ( $portfolio_categories as $cat ) {
							$portfolio_cat[$cat->name] = $cat->slug;
						}
					}
//					vc_map( array(
//						'name'     => __( 'Portfolio', 'cortana' ),
//						'base'     => 'g5plusframework_portfolio',
//						'class'    => '',
//						'icon'     => 'fa fa-th-large',
//						'category' => G5PLUS_FRAMEWORK_SHORTCODE_CATEGORY,
//						'params'   => array(
//							array(
//								'type'        => 'dropdown',
//								'heading'     => __( 'Layout', 'cortana' ),
//								'param_name'  => 'style',
//								'admin_label' => true,
//								'value'       => array( __( 'Grid', 'cortana' ) => 'style_1',
//														__( 'Slider', 'cortana' ) => 'style_2' )
//							),
//							array(
//								'type'       => 'textfield',
//								'heading'    => __( 'Title', 'cortana' ),
//								'param_name' => 'title',
//								'value'      => ''
//							),
//							$title_style,
//							array(
//								'type'       => 'dropdown',
//								'heading'    => __( 'Color Style', 'cortana' ),
//								'param_name' => 'style_header',
//								'admin_label' => true,
//								'value'       => array( __( 'light', 'cortana' ) => 'light',
//														__( 'dark', 'cortana' ) => 'dark' )
//							),
//							array(
//								'type'       => 'multi-select',
//								'heading'    => __( 'Portfolio Category', 'cortana' ),
//								'param_name' => 'category',
//								'options'    => $portfolio_cat
//							),
//							array(
//								'type' => 'checkbox',
//								'heading' => __('Show Category', 'cortana'),
//								'param_name' => 'show_category',
//								'admin_label' => true,
//								'value'       => array( __( 'Yes, please', 'cortana' ) => 'yes' )
//							),
//							array(
//								'type'       => 'dropdown',
//								'heading'    => __( 'Number of column', 'cortana' ),
//								'param_name' => 'column',
//								'value'      => array( '2' => '2', '3' => '3', '4' => '4' )
//							),
//							array(
//								'type'       => 'textfield',
//								'heading'    => __( 'Number of item (or number of item per page if choose show paging)', 'cortana' ),
//								'param_name' => 'item',
//								'value'      => ''
//							),
//							array(
//								'type'       => 'dropdown',
//								'heading'    => __( 'Order Post Date By', 'cortana' ),
//								'param_name' => 'order',
//								'value'      => array( __( 'Descending', 'cortana' ) => 'DESC', __( 'Ascending', 'cortana' ) => 'ASC' )
//							),
//							array(
//								'type'       => 'dropdown',
//								'heading'    => __( 'Padding', 'cortana' ),
//								'param_name' => 'padding',
//								'value'      => array( __( 'No padding', 'cortana' ) => '',
//													   '10 px' => 'col-padding-10',
//													   '15 px' => 'col-padding-15',
//													   '20 px' => 'col-padding-20')
//							),
//							$add_el_class,
//							$add_css_animation,
//							$add_duration_animation,
//							$add_delay_animation
//
//						)
//					) );
					vc_map( array(
						'name'     => __( 'Portfolio', 'cortana' ),
						'base'     => 'g5plusframework_portfolio',
						'class'    => '',
						'icon'     => 'fa fa-th-large',
						'category' => G5PLUS_FRAMEWORK_SHORTCODE_CATEGORY,
						'params'   => array(
							array(
								'type'        => 'dropdown',
								'heading'     => __( 'Style', 'cortana' ),
								'param_name'  => 'style',
								'admin_label' => true,
								'value'       => array( __( 'Dark', 'cortana' )  => '',
														__( 'Light', 'cortana' ) => 'style_2' )
							),
							array(
								'type'       => 'textfield',
								'heading'    => __( 'Title', 'cortana' ),
								'param_name' => 'title',
								'value'      => ''
							),
							array(
								'type'       => 'dropdown',
								'heading'    => __( 'Layout Style', 'cortana' ),
								'param_name' => 'show_pagging',
								'value'      => array(
									__( 'Grid', 'cortana' )   => '1',
									__( 'Slider', 'cortana' ) => '2' )
							),
							array(
								'type'       => 'multi-select',
								'heading'    => __( 'Portfolio Category', 'cortana' ),
								'param_name' => 'category',
								'options'    => $portfolio_cat
							),
							array(
								'type'        => 'checkbox',
								'heading'     => __( 'Show Category', 'cortana' ),
								'param_name'  => 'show_category',
								'admin_label' => true,
								'value'       => array( __( 'Yes, please', 'cortana' ) => 'yes' )
							),
							array(

								'type'        => 'dropdown',
								'heading'     => __( 'Category Style', 'cortana' ),
								'param_name'  => 'category_style',
								'admin_label' => true,
								'value'       => array( __( 'Normal', 'cortana' )         => 'cat-style-normal',
														__( 'Has background', 'cortana' ) => 'background-cat' )
							),
							array(
								'type'       => 'dropdown',
								'heading'    => __( 'Number of column', 'cortana' ),
								'param_name' => 'column',
								'value'      => array( '2' => '2',
													   '3' => '3',
													   '4' => '4' )
							),
							array(
								'type'       => 'textfield',
								'heading'    => __( 'Number of item (or number of item per page if choose show paging)', 'cortana' ),
								'param_name' => 'item',
								'value'      => ''
							),
							array(
								'type'       => 'dropdown',
								'heading'    => __( 'Order Post Date By', 'cortana' ),
								'param_name' => 'order',
								'value'      => array( __( 'Descending', 'cortana' ) => 'DESC', __( 'Ascending', 'cortana' ) => 'ASC' )
							),
							array(
								'type'       => 'dropdown',
								'heading'    => __( 'Padding', 'cortana' ),
								'param_name' => 'padding',
								'value'      => array( __( '15px', 'cortana' ) => 'col-padding-15', __( 'No padding', 'cortana' ) => 'col-no-padding' )
							),

							$add_el_class,
							$add_css_animation,
							$add_duration_animation,
							$add_delay_animation

						)
					) );
				}
//Service
				if ( !isset( $cpt_disable ) || $cpt_disable['services'] == '0' || $cpt_disable['services'] == '' ) {
					$service_categories = get_terms( G5PLUS_SERVICE_CATEGORY_TAXONOMY, array( 'hide_empty' => 0, 'orderby' => 'ASC' ) );
					$service_cat        = array();
					if ( is_array( $service_categories ) ) {
						foreach ( $service_categories as $cat ) {
							$service_cat[$cat->name] = $cat->slug;
						}
					}
					vc_map( array(
						'name'     => __( 'Services', 'cortana' ),
						'base'     => 'g5plusframework_services',
						'class'    => '',
						'icon'     => 'fa fa-th-large',
						'category' => G5PLUS_FRAMEWORK_SHORTCODE_CATEGORY,
						'params'   => array(
							array(
								'type'        => 'dropdown',
								'heading'     => __( 'Layout', 'cortana' ),
								'param_name'  => 'style',
								'admin_label' => true,
								'value'       => array( __( 'Grid', 'cortana' ) => 'style_1' )
							),
							array(
								'type'       => 'textfield',
								'heading'    => __( 'Title', 'cortana' ),
								'param_name' => 'title',
								'value'      => ''
							),
							$title_style,
							array(
								'type'        => 'dropdown',
								'heading'     => __( 'Color Style', 'cortana' ),
								'param_name'  => 'style_header',
								'admin_label' => true,
								'value'       => array( __( 'light', 'cortana' ) => 'light',
														__( 'dark', 'cortana' )  => 'dark' )
							),
							array(
								'type'       => 'multi-select',
								'heading'    => __( 'Portfolio Category', 'cortana' ),
								'param_name' => 'category',
								'options'    => $service_cat
							),
							array(
								'type'       => 'dropdown',
								'heading'    => __( 'Number of column', 'cortana' ),
								'param_name' => 'column',
								'value'      => array( '2' => '2', '3' => '3', '4' => '4' )
							),
							array(
								'type'       => 'textfield',
								'heading'    => __( 'Number of item ', 'cortana' ),
								'param_name' => 'item',
								'value'      => ''
							),
							array(
								'type'       => 'dropdown',
								'heading'    => __( 'Order Post Date By', 'cortana' ),
								'param_name' => 'order',
								'value'      => array( __( 'Descending', 'cortana' ) => 'DESC', __( 'Ascending', 'cortana' ) => 'ASC' )
							),
							array(
								'type'        => 'checkbox',
								'heading'     => __( 'Show Read More button', 'cortana' ),
								'param_name'  => 'show_readmore',
								'admin_label' => false,
								'value'       => array( __( 'Yes, please', 'cortana' ) => 'yes' )
							),
							$add_el_class,
							$add_css_animation,
							$add_duration_animation,
							$add_delay_animation
						)
					) );
				}


				if ( !isset( $cpt_disable ) || $cpt_disable['ourteam'] == '0' || $cpt_disable['ourteam'] == '' ) {
					$ourteam_cat        = array();
					$ourteam_categories = get_terms( 'ourteam_category', array( 'hide_empty' => 0, 'orderby' => 'ASC' ) );
					if ( is_array( $ourteam_categories ) ) {
						foreach ( $ourteam_categories as $cat ) {
							$ourteam_cat[$cat->name] = $cat->slug;
						}
					}
					vc_map( array(
						'name'     => __( 'Our Team', 'cortana' ),
						'base'     => 'cortana_ourteam',
						'class'    => '',
						'icon'     => 'fa fa-users',
						'category' => G5PLUS_FRAMEWORK_SHORTCODE_CATEGORY,
						'params'   => array(
							array(
								'type'        => 'dropdown',
								'heading'     => __( 'Layout Style', 'cortana' ),
								'param_name'  => 'layout_style',
								'admin_label' => true,
								'value'       => array( __( 'style 1', 'cortana' ) => 'style1',
														__( 'style 2', 'cortana' ) => 'style2' ),
								'description' => __( 'Select Layout Style.', 'cortana' )
							),
							array(
								'type'       => 'textfield',
								'heading'    => __( 'Item Amount', 'cortana' ),
								'param_name' => 'item_amount',
								'value'      => '8'
							),
							array(
								'type'       => 'textfield',
								'heading'    => __( 'Column', 'cortana' ),
								'param_name' => 'column',
								'value'      => '4'
							),
							array(
								'type'        => 'checkbox',
								'heading'     => __( 'Slider Style', 'cortana' ),
								'param_name'  => 'is_slider',
								'admin_label' => false,
								'value'       => array( __( 'Yes, please', 'cortana' ) => 'yes' )
							),
							array(
								'type'       => 'multi-select',
								'heading'    => __( 'Category', 'cortana' ),
								'param_name' => 'category',
								'options'    => $ourteam_cat
							),
							$add_el_class,
							$add_css_animation,
							$add_duration_animation,
							$add_delay_animation
						)
					) );
				}

				vc_map( array(
					'name'     => __( 'Button', 'cortana' ),
					'base'     => 'cortana_button',
					'class'    => '',
					'icon'     => 'fa fa-bold',
					'category' => G5PLUS_FRAMEWORK_SHORTCODE_CATEGORY,
					'params'   => array(
						array(
							'type'        => 'dropdown',
							'heading'     => __( 'Layout Style', 'cortana' ),
							'param_name'  => 'layout_style',
							'admin_label' => true,
							'value'       => array(
								__( 'style 1', 'cortana' ) => 'style1',
								__( 'style 2', 'cortana' ) => 'style2',
								__( 'style 3', 'cortana' ) => 'style3',
								__( 'style 4', 'cortana' ) => 'style4'
							),
							'description' => __( 'Select Layout Style.', 'cortana' )
						),
						array(
							'type'        => 'vc_link',
							'heading'     => __( 'URL (Link)', 'cortana' ),
							'param_name'  => 'link',
							'description' => __( 'Add link to button.', 'cortana' ),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => __( 'Size', 'cortana' ),
							'param_name'  => 'size',
							'description' => __( 'Select button display size.', 'cortana' ),
							'std'         => 'md',
							'value'       => array(
								__( 'Mini', 'cortana' )   => 'xs',
								__( 'Small', 'cortana' )  => 'sm',
								__( 'Medium', 'cortana' ) => 'md',
								__( 'Large', 'cortana' )  => 'lg',
							)
						),
						array(
							'type'       => 'checkbox',
							'heading'    => __( 'Add icon?', 'cortana' ),
							'param_name' => 'add_icon',
						),
						array(
							'type'        => 'icon_text',
							'heading'     => __( 'Select Icon:', 'cortana' ),
							'param_name'  => 'icon',
							'value'       => '',
							'description' => __( 'Select the icon from the list.', 'cortana' ),
							'dependency'  => array(
								'element' => 'add_icon',
								'value'   => 'true',
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => __( 'Icon Alignment', 'cortana' ),
							'description' => __( 'Select icon alignment.', 'cortana' ),
							'param_name'  => 'i_align',
							'value'       => array(
								__( 'Left', 'cortana' )  => 'left',
								__( 'Right', 'cortana' ) => 'right',
							),
							'dependency'  => array(
								'element' => 'add_icon',
								'value'   => 'true',
							),
						),
						$add_el_class,
						$add_css_animation,
						$add_duration_animation,
						$add_delay_animation
					)
				) );
				vc_map( array(
					'name'     => __( 'Progress bar', 'cortana' ),
					'base'     => 'cortana_process',
					'class'    => '',
					'icon'     => 'fa fa-long-arrow-right',
					'category' => G5PLUS_FRAMEWORK_SHORTCODE_CATEGORY,
					'params'   => array(
						array(
							'type'        => 'dropdown',
							'heading'     => __( 'Layout Style', 'cortana' ),
							'param_name'  => 'layout_style',
							'admin_label' => true,
							'value'       => array( __( 'style 1', 'cortana' ) => 'style1', __( 'style 2', 'cortana' ) => 'style2' ),
							'description' => __( 'Select Layout Style.', 'cortana' )
						),
						array(
							'type'       => 'textfield',
							'heading'    => __( 'Title', 'cortana' ),
							'param_name' => 'title',
							'value'      => '',
						),
						$title_style,
						array(
							'type'        => 'textfield',
							'heading'     => __( 'Value (%)', 'cortana' ),
							'param_name'  => 'value',
							'description' => __( 'Enter from 0 to 100.', 'cortana' ),
							'value'       => '',
						),

						array(
							'type'       => 'colorpicker',
							'heading'    => __( 'Background progress bar', 'cortana' ),
							'param_name' => 'bg_progress',
							'value'      => '',
						),
						$add_el_class,
						$add_css_animation,
						$add_duration_animation,
						$add_delay_animation
					)
				) );
				vc_map( array(
					'name'     => __( 'Feature Box', 'cortana' ),
					'base'     => 'cortana_feature',
					'class'    => '',
					'icon'     => 'fa fa-th-list',
					'category' => G5PLUS_FRAMEWORK_SHORTCODE_CATEGORY,
					'params'   => array(
						array(
							'type'        => 'dropdown',
							'heading'     => __( 'Layout Style', 'cortana' ),
							'param_name'  => 'layout_style',
							'admin_label' => true,
							'value'       => array( __( 'style 1', 'cortana' ) => 'style1' ),
							'description' => __( 'Select Layout Style.', 'cortana' )
						),
						array(
							'type'       => 'attach_image',
							'heading'    => __( 'Image:', 'cortana' ),
							'param_name' => 'image',
							'value'      => '',
						),
						array(
							'type'       => 'textfield',
							'heading'    => __( 'Video Url', 'cortana' ),
							'param_name' => 'video_url',
							'value'      => '',
						),
						array(
							'type'       => 'textfield',
							'heading'    => __( 'Title', 'cortana' ),
							'param_name' => 'title',
							'value'      => '',
						),
						$title_style,
						array(
							'type'        => 'icon_text',
							'heading'     => __( 'Select Icon:', 'cortana' ),
							'param_name'  => 'icon',
							'value'       => '',
							'description' => __( 'Select the icon from the list.', 'cortana' ),
						),
						array(
							'type'       => 'textarea',
							'heading'    => __( 'Description', 'cortana' ),
							'param_name' => 'description',
							'value'      => '',
						),
						array(
							'type'       => 'vc_link',
							'heading'    => __( 'Link (url)', 'cortana' ),
							'param_name' => 'link',
							'value'      => '',
						),
						$add_el_class,
						$add_css_animation,
						$add_duration_animation,
						$add_delay_animation
					)
				) );
				vc_map( array(
					'name'        => __( 'Posts', 'cortana' ),
					'base'        => 'cortana_post',
					'icon'        => 'fa fa-file-text-o',
					'category'    => G5PLUS_FRAMEWORK_SHORTCODE_CATEGORY,
					'description' => __( 'Posts', 'cortana' ),
					'params'      => array(
						array(
							'type'       => 'textfield',
							'heading'    => __( 'Title', 'cortana' ),
							'param_name' => 'title',
							'value'      => '',
						),
						$title_style,
						array(
							'type'        => 'dropdown',
							'heading'     => __( 'Display', 'cortana' ),
							'param_name'  => 'display',
							'admin_label' => true,
							'value'       => array( __( 'Random', '' ) => 'random', __( 'Popular', 'cortana' ) => 'popular', __( 'Recent', 'cortana' ) => 'recent', __( 'Oldest', 'cortana' ) => 'oldest' ),
							'description' => __( 'Select Orderby.', 'cortana' ),
							'std'         => 'recent'
						),
						array(
							'type'       => 'textfield',
							'heading'    => __( 'Item Amount', 'cortana' ),
							'param_name' => 'item_amount',
							'value'      => '10'
						),
						array(
							'type'       => 'textfield',
							'heading'    => __( 'Column', 'cortana' ),
							'param_name' => 'column',
							'value'      => '3'
						),
						array(
							'type'        => 'checkbox',
							'heading'     => __( 'Slider Style', 'cortana' ),
							'param_name'  => 'is_slider',
							'admin_label' => false,
							'value'       => array( __( 'Yes, please', 'cortana' ) => 'yes' )
						),
						$add_el_class,
						$add_css_animation,
						$add_duration_animation,
						$add_delay_animation
					)
				) );
				vc_map( array(
					'name'        => __( 'Client', 'cortana' ),
					'base'        => 'cortana_partner_carousel',
					'icon'        => 'fa fa-user-plus',
					'category'    => G5PLUS_FRAMEWORK_SHORTCODE_CATEGORY,
					'description' => __( 'Animated carousel with images', 'cortana' ),
					'params'      => array(
						array(
							'type'        => 'dropdown',
							'heading'     => __( 'Layout Style', 'cortana' ),
							'param_name'  => 'layout_style',
							'admin_label' => true,
							'value'       => array( __( 'Grid Layout', 'cortana' )   => 'style1',
													__( 'Slider Layout', 'cortana' ) => 'style2' ),
							'description' => __( 'Select Layout Style.', 'cortana' )
						),
						array(
							'type'       => 'textfield',
							'heading'    => __( 'Title', 'cortana' ),
							'param_name' => 'title',
						),
						$title_style,
						array(
							'type'        => 'attach_images',
							'heading'     => __( 'Images', 'cortana' ),
							'param_name'  => 'images',
							'value'       => '',
							'description' => __( 'Select images from media library.', 'cortana' )
						),
						array(
							'type'        => 'textfield',
							'heading'     => __( 'Image size', 'cortana' ),
							'param_name'  => 'img_size',
							'description' => __( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'cortana' )
						),
						array(
							'type'       => 'dropdown',
							'heading'    => __( 'Image Opacity', 'cortana' ),
							'param_name' => 'opacity',
							'value'      => array(
								__( '10%', 'cortana' )  => '10',
								__( '20%', 'cortana' )  => '20',
								__( '30%', 'cortana' )  => '30',
								__( '40%', 'cortana' )  => '40',
								__( '50%', 'cortana' )  => '50',
								__( '60%', 'cortana' )  => '60',
								__( '70%', 'cortana' )  => '70',
								__( '80%', 'cortana' )  => '80',
								__( '90%', 'cortana' )  => '90',
								__( '100%', 'cortana' ) => '100'
							),
							'std'        => '80'
						),
						array(
							'type'        => 'exploded_textarea',
							'heading'     => __( 'Custom links', 'cortana' ),
							'param_name'  => 'custom_links',
							'description' => __( 'Enter links for each slide here. Divide links with linebreaks (Enter) . ', 'cortana' ),
//							'dependency'  => array(
//								'element' => 'onclick',
//								'value'   => array( 'custom_link' )
//							)
						),
						array(
							'type'        => 'dropdown',
							'heading'     => __( 'Custom link target', 'cortana' ),
							'param_name'  => 'custom_links_target',
							'description' => __( 'Select where to open  custom links.', 'cortana' ),
//							'dependency'  => array(
//								'element' => 'onclick',
//								'value'   => array( 'custom_link' )
//							),
							'value'       => $target_arr
						),
						array(
							'type'        => 'textfield',
							'heading'     => __( 'Client per view', 'cortana' ),
							'param_name'  => 'column',
							'value'       => '5',
							'description' => __( 'Set numbers of slides you want to display', 'cortana' )
						),
						array(
							'type'        => 'checkbox',
							'heading'     => __( 'Slider autoplay', 'cortana' ),
							'param_name'  => 'autoplay',
							'description' => __( 'Enables autoplay mode.', 'cortana' ),
							'value'       => array( __( 'Yes, please', 'cortana' ) => 'yes' ),
							'dependency'  => Array( 'element' => 'layout_style', 'value' => array( 'style2' ) ),
						),
						array(
							'type'       => 'checkbox',
							'heading'    => __( 'Show pagination control', 'cortana' ),
							'param_name' => 'pagination',
							'value'      => array( __( 'Yes, please', 'cortana' ) => 'yes' ),
							'dependency' => Array( 'element' => 'layout_style', 'value' => array( 'style2' ) ),
						),
						array(
							'type'       => 'checkbox',
							'heading'    => __( 'Show navigation control', 'cortana' ),
							'param_name' => 'navigation',
							'value'      => array( __( 'Yes, please', 'cortana' ) => 'yes' ),
							'dependency' => Array( 'element' => 'layout_style', 'value' => array( 'style2' ) ),
						),
						$add_el_class,
						$add_css_animation,
						$add_duration_animation,
						$add_delay_animation
					)
				) );
				vc_map( array(
					'name'     => __( 'Headings', 'cortana' ),
					'base'     => 'cortana_heading',
					'icon'     => 'fa fa-header',
					'category' => G5PLUS_FRAMEWORK_SHORTCODE_CATEGORY,
					'params'   => array(
						array(
							'type'        => 'dropdown',
							'heading'     => __( 'Layout Style', 'cortana' ),
							'param_name'  => 'layout_style',
							'admin_label' => true,
							'value'       => array( __( 'Dark', 'cortana' )  => 'style1',
													__( 'Light', 'cortana' ) => 'style2' ),
							'description' => __( 'Select Layout Style.', 'cortana' )
						),
						array(
							'type'        => 'textfield',
							'heading'     => __( 'Title', 'cortana' ),
							'param_name'  => 'title',
							'value'       => '',
							'admin_label' => true
						),
						$title_style,
						array(
							'type'        => 'textfield',
							'heading'     => __( 'Font sie Title (no unit)', 'cortana' ),
							'param_name'  => 'font_size_title',
							'value'       => '20',
							'admin_label' => true
						),
						array(
							'type'       => 'dropdown',
							'heading'    => __( 'Heading Align', 'cortana' ),
							'param_name' => 'font_size_title',
							'value'      => array(
								__( 'Left', 'cortana' )   => 'left',
								__( 'Center', 'cortana' ) => 'center',
								__( 'right', 'cortana' )  => 'Right'
							),
						),
						$add_el_class,
						$add_css_animation,
						$add_duration_animation,
						$add_delay_animation
					)
				) );
				vc_map( array(
					'name'     => __( 'Notifications', 'cortana' ),
					'base'     => 'cortana_notification',
					'icon'     => 'fa fa-exclamation-triangle',
					'category' => G5PLUS_FRAMEWORK_SHORTCODE_CATEGORY,
					'params'   => array(
						array(
							'type'        => 'dropdown',
							'heading'     => __( 'Layout Style', 'cortana' ),
							'param_name'  => 'layout_style',
							'admin_label' => true,
							'value'       => array( __( 'Small style', 'cortana' )  => 'style1',
													__( 'Larger style', 'cortana' ) => 'style2' ),
							'description' => __( 'Select Layout Style.', 'cortana' )
						),
						array(
							'type'        => 'dropdown',
							'heading'     => __( 'Message type', 'cortana' ),
							'param_name'  => 'message_type',
							'admin_label' => true,
							'value'       => array( __( 'Notice message', 'cortana' )  => 'type-1',
													__( 'Error message', 'cortana' )   => 'type-2',
													__( 'Warning message', 'cortana' ) => 'type-3',
													__( 'Success message', 'cortana' ) => 'type-4',
													__( 'Info message', 'cortana' )    => 'type-5' ),
							'description' => __( 'Select Message type.', 'cortana' ),
							'admin_label' => true
						),
						array(
							'type'       => 'textfield',
							'heading'    => __( 'Title', 'cortana' ),
							'param_name' => 'title',
							'value'      => '',
							'dependency' => Array( 'element' => 'layout_style', 'value' => array( 'style2' ) ),
						),
						array(
							'type'       => 'textfield',
							'heading'    => __( 'Descriptions', 'cortana' ),
							'param_name' => 'description',
							'value'      => '',
						),
						$add_el_class,
						$add_css_animation,
						$add_duration_animation,
						$add_delay_animation
					)
				) );

				vc_map(
					array(
						'name'        => __( 'Icon Box', 'cortana' ),
						'base'        => 'cortana_icon_box',
						'icon'        => 'fa fa-diamond',
						'category'    => G5PLUS_FRAMEWORK_SHORTCODE_CATEGORY,
						'description' => 'Adds icon box with font icons',
						'params'      => array(
							array(
								'type'        => 'dropdown',
								'heading'     => __( 'Layout Style', 'cortana' ),
								'param_name'  => 'layout_style',
								'admin_label' => true,
								'value'       => array( __( 'Icon Left', 'cortana' )  => 'style1',
														__( 'Icon Top', 'cortana' )   => 'style2',
														__( 'Icon Right', 'cortana' ) => 'style3' ),
								'description' => __( 'Select Layout Style.', 'cortana' )
							),
							array(
								'type'        => 'dropdown',
								'heading'     => __( 'Icon to display:', 'cortana' ),
								'param_name'  => 'icon_type',
								'value'       => array(
									__( 'Font Icon', 'cortana' )         => 'font-icon',
									__( 'Custom Image Icon', 'cortana' ) => 'custom',
								),
								'description' => __( 'Select which icon you would like to use', 'cortana' )
							),
							// Play with icon selector
							array(
								'type'        => 'icon_text',
								'heading'     => __( 'Select Icon:', 'cortana' ),
								'param_name'  => 'icon',
								'value'       => '',
								'description' => __( 'Select the icon from the list.', 'cortana' ),
								'dependency'  => Array( 'element' => 'icon_type', 'value' => array( 'font-icon' ) ),
							),
							array(
								'type'        => 'colorpicker',
								'heading'     => __( 'Icon Background :', 'cortana' ),
								'param_name'  => 'icon_bg',
								'value'       => '#FFBF00',
								'description' => __( 'Set Background for icon.', 'cortana' ),
								'dependency'  => Array( 'element' => 'icon_type', 'value' => array( 'font-icon' ) ),
							),
							array(
								'type'        => 'colorpicker',
								'heading'     => __( 'Icon Color :', 'cortana' ),
								'param_name'  => 'icon_color',
								'value'       => '#FFF',
								'description' => __( 'Set color for icon.', 'cortana' ),
								'dependency'  => Array( 'element' => 'icon_type', 'value' => array( 'font-icon' ) ),
							),
							array(
								'type'        => 'colorpicker',
								'heading'     => __( 'Icon border color:', 'cortana' ),
								'param_name'  => 'icon_border_color',
								'value'       => '#FFBF00',
								'description' => __( 'Set border color for icon.', 'cortana' ),
								'dependency'  => Array( 'element' => 'icon_type', 'value' => array( 'font-icon' ) ),
							),

							// Play with icon selector
							array(
								'type'        => 'attach_image',
								'heading'     => __( 'Upload Image Icon:', 'cortana' ),
								'param_name'  => 'image',
								'value'       => '',
								'description' => __( 'Upload the custom image icon.', 'cortana' ),
								'dependency'  => Array( 'element' => 'icon_type', 'value' => array( 'custom' ) ),
							),
							array(
								'type'       => 'vc_link',
								'heading'    => __( 'Link (url)', 'cortana' ),
								'param_name' => 'link',
								'value'      => '',
							),
							array(
								'type'        => 'textfield',
								'heading'     => __( 'Title', 'cortana' ),
								'param_name'  => 'title',
								'value'       => '',
								'description' => __( 'Provide the title for this icon box.', 'cortana' ),
							),
							$title_style,
							array(
								'type'        => 'textarea',
								'heading'     => __( 'Description', 'cortana' ),
								'param_name'  => 'description',
								'value'       => '',
								'description' => __( 'Provide the description for this icon box.', 'cortana' ),
							),
							$add_el_class,
							$add_css_animation,
							$add_duration_animation,
							$add_delay_animation
						)
					)
				);

				vc_map(
					array(
						'name'     => __( 'Gallery', 'cortana' ),
						'base'     => 'cortana_gallery',
						'icon'     => 'fa fa-file-image-o',
						'category' => G5PLUS_FRAMEWORK_SHORTCODE_CATEGORY,
						'params'   => array(
							array(
								'type'        => 'dropdown',
								'heading'     => __( 'Layout Style', 'cortana' ),
								'param_name'  => 'layout_style',
								'admin_label' => true,
								'value'       => array( __( 'Has padding', 'cortana' ) => 'style1',
														__( 'No Padding', 'cortana' )  => 'style2' ),
								'description' => __( 'Select Layout Style.', 'cortana' )
							),
							array(
								'type'        => 'attach_images',
								'heading'     => __( 'Select Images:', 'cortana' ),
								'param_name'  => 'images_gallery',
								'description' => __( 'Upload images to gallery.', 'cortana' ),
							),
							// Play with icon selector
							array(
								'type'        => 'dropdown',
								'heading'     => __( 'Column number:', 'cortana' ),
								'param_name'  => 'column_number',
								'admin_label' => true,
								'value'       => array( __( '3', 'cortana' ) => '3',
														__( '4', 'cortana' ) => '4',
														__( '5', 'cortana' ) => '5' ),
								'description' => __( 'Select Column number.', 'cortana' )
							),

							$add_el_class,
							$add_css_animation,
							$add_duration_animation,
							$add_delay_animation
						)
					)
				);
				vc_map(
					array(
						'name'     => __( 'Download', 'cortana' ),
						'base'     => 'cortana_download',
						'icon'     => 'fa fa-download',
						'category' => G5PLUS_FRAMEWORK_SHORTCODE_CATEGORY,
						'params'   => array(
							array(
								'type'       => 'textfield',
								'heading'    => __( 'Title', 'cortana' ),
								'param_name' => 'title',
							),
							array(
								'type'        => 'dropdown',
								'heading'     => __( 'File Type', 'cortana' ),
								'param_name'  => 'file_type',
								'admin_label' => true,
								'value'       => array(
									__( 'DOC', 'cortana' ) => 'doc',
									__( 'XLS', 'cortana' ) => 'xls',
									__( 'PDF', 'cortana' ) => 'pdf',
									__( 'PPT', 'cortana' ) => 'ppt' ),
								'description' => __( 'Select Layout Style.', 'cortana' )
							),
							array(
								'type'        => 'attach_images',
								'heading'     => __( 'Select File:', 'cortana' ),
								'param_name'  => 'file_download',
								'description' => __( 'Upload images to gallery.', 'cortana' ),
							),
							$add_el_class,
							$add_css_animation,
							$add_duration_animation,
							$add_delay_animation
						)
					)
				);
				$product_cat = array();
				if ( class_exists( 'WooCommerce' ) ) {
					$args               = array(
						'number' => '',
					);
					$product_categories = get_terms( 'product_cat', $args );
					if ( is_array( $product_categories ) ) {
						foreach ( $product_categories as $cat ) {
							$product_cat[$cat->name] = $cat->slug;
						}
					}


					vc_map(
						array(
							'name'     => __( 'Product', 'cortana' ),
							'base'     => 'cortana_product',
							'icon'     => 'fa fa-shopping-cart',
							'category' => G5PLUS_FRAMEWORK_SHORTCODE_CATEGORY,
							'params'   => array(
								array(
									"type"        => "textfield",
									"heading"     => __( "Title", 'cortana' ),
									"param_name"  => "title",
									"admin_label" => true,
									"value"       => ''
								),
								$title_style,
								array(
									'type'       => 'dropdown',
									'heading'    => __( 'Select product source', 'cortana' ),
									'param_name' => 'source',
									'value'      => array( __( 'From feature', 'cortana' )  => 'feature',
														   __( 'From category', 'cortana' ) => 'category',
									),
								),
								array(
									'type'       => 'dropdown',
									'heading'    => __( 'Feature', 'cortana' ),
									'param_name' => 'filter',
									'value'      => array( __( 'Sale Off', 'cortana' )      => 'sale',
														   __( 'New In', 'cortana' )        => 'new-in',
														   __( 'Featured', 'cortana' )      => 'featured',
														   __( 'Top rated', 'cortana' )     => 'top-rated',
														   __( 'Recent review', 'cortana' ) => 'recent-review',
														   __( 'Best Selling', 'cortana' )  => 'best-selling'
									),
									'dependency' => Array( 'element' => 'source', 'value' => array( 'feature' ) )

								),
								array(
									'type'       => 'multi-select',
									'heading'    => __( 'Category', 'cortana' ),
									'param_name' => 'category',
									'options'    => $product_cat,
									'dependency' => Array( 'element' => 'source', 'value' => array( 'category' ) )
								),
								array(
									"type"        => "textfield",
									"heading"     => __( "Per Page", 'cortana' ),
									"param_name"  => "per_page",
									"admin_label" => true,
									"value"       => '8',
									"description" => __( 'How much items per page to show', 'cortana' )
								),
								array(
									"type"        => "textfield",
									"heading"     => __( "Columns", 'cortana' ),
									"param_name"  => "columns",
									"value"       => '4',
									"description" => __( "How much columns grid", 'cortana' ),
								),
								array(
									'type'       => 'dropdown',
									'heading'    => __( 'Display Slider', 'cortana' ),
									'param_name' => 'slider',
									'value'      => array( __( 'No', 'cortana' ) => '', __( 'Yes', 'cortana' ) => 'slider' ),
								),


								array(
									'type'        => 'dropdown',
									'heading'     => __( 'Order by', 'cortana' ),
									'param_name'  => 'orderby',
									'value'       => array( __( 'Date', 'cortana' )       => 'date', __( 'ID', 'cortana' ) => 'ID',
															__( 'Author', 'cortana' )     => 'author', __( 'Modified', 'cortana' ) => 'modified',
															__( 'Random', 'cortana' )     => 'rand', __( 'Comment count', 'cortana' ) => 'comment_count',
															__( 'Menu Order', 'cortana' ) => 'menu_order'
									),
									'description' => __( 'Select how to sort retrieved products.', 'cortana' ),
								),
								array(
									'type'        => 'dropdown',
									'heading'     => __( 'Order way', 'cortana' ),
									'param_name'  => 'order',
									'value'       => array( __( 'Descending', 'cortana' ) => 'DESC', __( 'Ascending', 'cortana' ) => 'ASC' ),
									'description' => __( 'Designates the ascending or descending order.', 'cortana' ),
								),
								$add_el_class,
								$add_css_animation,
								$add_duration_animation,
								$add_delay_animation
							)
						)
					);

					vc_map( array(
						'name'     => __( 'Product Categories', 'cortana' ),
						'base'     => 'cortana_product_categories',
						'class'    => '',
						'icon'     => 'fa fa-cart-plus',
						'category' => G5PLUS_FRAMEWORK_SHORTCODE_CATEGORY,
						'params'   => array(
							array(
								"type"        => "textfield",
								"heading"     => __( "Title", 'cortana' ),
								"param_name"  => "title",
								"admin_label" => true,
								"value"       => ''
							),
							$title_style,
							array(
								'type'       => 'multi-select',
								'heading'    => __( 'Product Category', 'cortana' ),
								'param_name' => 'category',
								'options'    => $product_cat
							),
							array(
								"type"        => "textfield",
								"heading"     => __( "Columns", 'cortana' ),
								"param_name"  => "columns",
								"value"       => '4',
								"description" => __( "How much columns grid", 'cortana' ),
							),

							array(
								'type'       => 'dropdown',
								'heading'    => __( 'Slider', 'cortana' ),
								'param_name' => 'slider',
								'value'      => array( __( 'No', 'cortana' )  => '',
													   __( 'Yes', 'cortana' ) => 'slider'
								),
							),
							array(
								'type'       => 'dropdown',
								'heading'    => __( 'Hide empty', 'cortana' ),
								'param_name' => 'hide_empty',
								'value'      => array( __( 'No', 'cortana' )  => '0',
													   __( 'Yes', 'cortana' ) => '1'
								),
							),
							array(
								'type'        => 'dropdown',
								'heading'     => __( 'Order by', 'cortana' ),
								'param_name'  => 'orderby',
								'value'       => array( __( 'Date', 'cortana' )       => 'date', __( 'ID', 'cortana' ) => 'ID',
														__( 'Author', 'cortana' )     => 'author', __( 'Modified', 'cortana' ) => 'modified',
														__( 'Random', 'cortana' )     => 'rand', __( 'Comment count', 'cortana' ) => 'comment_count',
														__( 'Menu Order', 'cortana' ) => 'menu_order'
								),
								'description' => __( 'Select how to sort retrieved products.', 'cortana' )
							),
							array(
								'type'        => 'dropdown',
								'heading'     => __( 'Order way', 'cortana' ),
								'param_name'  => 'order',
								'value'       => array( __( 'Descending', 'cortana' ) => 'DESC', __( 'Ascending', 'cortana' ) => 'ASC' ),
								'description' => __( 'Designates the ascending or descending orde.', 'cortana' )
							),
							$add_el_class,
							$add_css_animation,
							$add_duration_animation,
							$add_delay_animation
						)
					) );


				}


			}
		}

	}

	if ( !function_exists( 'init_g5plus_framework_shortcodes' ) ) {
		function init_g5plus_framework_shortcodes() {
			return g5plusFramework_Shortcodes::init();
		}

		init_g5plus_framework_shortcodes();
	}
}
