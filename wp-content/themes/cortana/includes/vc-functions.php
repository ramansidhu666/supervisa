<?php
add_action( 'vc_before_init', 'g5plus_vcSetAsTheme' );
function g5plus_vcSetAsTheme() {
	vc_set_as_theme();
}

function g5plus_vc_remove_frontend_links() {
	vc_disable_frontend();
}
if (function_exists('vc_add_' . 'shortcode_param')) {
	call_user_func('vc_add_' . 'shortcode_param', 'number', 'g5plus_number_settings_field');
	call_user_func('vc_add_' . 'shortcode_param', 'icon_text', 'g5plus_icon_text_settings_field');
	call_user_func('vc_add_' . 'shortcode_param', 'multi-select', 'g5plus_multi_select_settings_field_shortcode_param');
	call_user_func('vc_add_' . 'shortcode_param', 'tags', 'g5plus_tags_settings_field_shortcode_param');
}

add_action( 'vc_after_init', 'g5plus_vc_remove_frontend_links' );

function g5plus_number_settings_field( $settings, $value ) {
	$dependency = vc_generate_dependencies_attributes( $settings );
	$param_name = isset( $settings['param_name'] ) ? $settings['param_name'] : '';
	$type       = isset( $settings['type'] ) ? $settings['type'] : '';
	$min        = isset( $settings['min'] ) ? $settings['min'] : '';
	$max        = isset( $settings['max'] ) ? $settings['max'] : '';
	$suffix     = isset( $settings['suffix'] ) ? $settings['suffix'] : '';
	$class      = isset( $settings['class'] ) ? $settings['class'] : '';
	$output     = '<input type="number" min="' . esc_attr( $min ) . '" max="' . esc_attr( $max ) . '" class="wpb_vc_param_value ' . esc_attr( $param_name ) . ' ' . esc_attr( $type ) . ' ' . esc_attr( $class ) . '" name="' . esc_attr( $param_name ) . '" value="' . esc_attr( $value ) . '" style="max-width:100px; margin-right: 10px;" />' . esc_attr( $suffix );

	return $output;
}

function g5plus_icon_text_settings_field( $settings, $value ) {
	$dependency = vc_generate_dependencies_attributes( $settings );

	return '<div class="vc-text-icon">'
	. '<input  name="' . $settings['param_name'] . '" style="width:80%;" class="wpb_vc_param_value wpb-textinput widefat input-icon ' . esc_attr( $settings['param_name'] ) . ' ' . esc_attr( $settings['type'] ) . '_field" type="text" value="' . esc_attr( $value ) . '" ' . $dependency . '/>'
	. '<input title="' . esc_html__( 'Click to browse icon', 'cortana' ) . '" style="width:20%; height:34px;" class="browse-icon button-secondary" type="button" value="' . esc_html__( 'Browse Icon', 'cortana' ) . '" >'
	. '<span class="icon-preview"><i class="' . esc_attr( $value ) . '"></i></span>'
	. '</div>';
}

function g5plus_multi_select_settings_field_shortcode_param( $settings, $value ) {
	$param_name   = isset( $settings['param_name'] ) ? $settings['param_name'] : '';
	$param_option = isset( $settings['options'] ) ? $settings['options'] : '';
	$dependency   = vc_generate_dependencies_attributes( $settings );
	$output       = '<input type="hidden" name="' . $param_name . '" id="' . $param_name . '" class="wpb_vc_param_value ' . $param_name . '" value="' . $value . '"  ' . $dependency . ' />';
	$output .= '<select multiple id="' . $param_name . '_select2" name="' . $param_name . '_select2" class="multi-select">';
	if ( $param_option != '' && is_array( $param_option ) ) {
		foreach ( $param_option as $text_val => $val ) {
			if ( is_numeric( $text_val ) && ( is_string( $val ) || is_numeric( $val ) ) ) {
				$text_val = $val;
			}
			$output .= '<option id="' . $val . '" value="' . $val . '">' . htmlspecialchars( $text_val ) . '</option>';
		}
	}

	$output .= '</select><input type="checkbox" id="' . $param_name . '_select_all" >' . esc_html__( 'Select All', 'cortana' );
	$output .= '<script type="text/javascript">
		        jQuery(document).ready(function($){

					$("#' . $param_name . '_select2").select2();

					var order = $("#' . $param_name . '").val()
					if (order != "") {
						order = order.split(",");
						var choices = [];
						for (var i = 0; i < order.length; i++) {
							var option = $("#' . $param_name . '_select2 option[value="+ order[i]  + "]");
							choices[i] = {id:order[i], text:option[0].label, element: option};
						}
						$("#' . $param_name . '_select2").select2("data", choices);

					}

			        $("#' . $param_name . '_select2").on("select2-selecting", function(e) {
			            var ids = $("#' . $param_name . '").val();
			            if (ids != "") {
			                ids +=",";
			            }
			            ids += e.val;
			            $("#' . $param_name . '").val(ids);
                    }).on("select2-removed", function(e) {
				          var ids = $("#' . $param_name . '").val();
				          var arr_ids = ids.split(",");
				          var newIds = "";
				          for(var i = 0 ; i < arr_ids.length; i++) {
				            if (arr_ids[i] != e.val){
				                if (newIds != "") {
			                        newIds +=",";
					            }
					            newIds += arr_ids[i];
				            }
				          }
				          $("#' . $param_name . '").val(newIds);
		             });

		            $("#' . $param_name . '_select_all").click(function(){
		                if($("#' . $param_name . '_select_all").is(":checked") ){
		                    $("#' . $param_name . '_select2 > option").prop("selected","selected");
		                    $("#' . $param_name . '_select2").trigger("change");
		                    var arr_ids =  $("#' . $param_name . '_select2").select2("val");
		                    var ids = "";
                            for (var i = 0; i < arr_ids.length; i++ ) {
                                if (ids != "") {
                                    ids +=",";
                                }
                                ids += arr_ids[i];
                            }
                            $("#' . $param_name . '").val(ids);

		                }else{
		                    $("#' . $param_name . '_select2 > option").removeAttr("selected");
		                    $("#' . $param_name . '_select2").trigger("change");
		                    $("#' . $param_name . '").val("");
		                }
		            });
		        });
		        </script>
		        <style>
		            .multi-select
		            {
		              width: 100%;
		            }
		            .select2-drop
		            {
		                z-index: 100000;
		            }
		        </style>';

	return $output;
}

function g5plus_tags_settings_field_shortcode_param( $settings, $value ) {
	$param_name = isset( $settings['param_name'] ) ? $settings['param_name'] : '';
	$dependency = vc_generate_dependencies_attributes( $settings );
	$output     = '<input  name="' . $settings['param_name']
		. '" class="wpb_vc_param_value wpb-textinput '
		. $settings['param_name'] . ' ' . $settings['type']
		. '" type="hidden" value="' . $value . '"/>';
	$output .= '<input type="text" name="' . $param_name . '_tagsinput" id="' . $param_name . '_tagsinput" value="' . $value . '" data-role="tagsinput" ' . $dependency . ' />';
	$output .= '<script type="text/javascript">
							jQuery(document).ready(function($){
								$("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();

								$("#' . $param_name . '_tagsinput").on("itemAdded", function(event) {
		                             $("input[name=' . $param_name . ']").val($(this).val());
								});

								$("#' . $param_name . '_tagsinput").on("itemRemoved", function(event) {
		                             $("input[name=' . $param_name . ']").val($(this).val());
								});
							});
						</script>';

	return $output;
}



function g5plus_get_css_animation( $css_animation ) {
	$output = '';
	if ( $css_animation != '' ) {
		wp_enqueue_script( 'waypoints' );
		$output = ' wpb_animate_when_almost_visible g5plus-css-animation ' . $css_animation;
	}

	return $output;
}

function g5plus_get_style_animation( $duration, $delay ) {
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

function  g5plus_convert_hex_to_rgba( $hex, $opacity = 1 ) {
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

if ( !function_exists( 'vc_map_get_attributes' ) ) {
	function g5plus_add_vc_param() {
		if ( function_exists( 'vc_remove_param' ) ) {
			vc_remove_param( 'vc_row', 'full_width' );
			vc_remove_param( 'vc_row', 'parallax' );
			vc_remove_param( 'vc_row', 'parallax_image' );
		}
		if ( function_exists( 'vc_add_param' ) ) {

			$add_css_animation = array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'CSS Animation', 'cortana' ),
				'param_name'  => 'css_animation',
				'value'       => array( esc_html__( 'No', 'cortana' ) => '', esc_html__( 'Fade In', 'cortana' ) => 'wpb_fadeIn', esc_html__( 'Fade Top to Bottom', 'cortana' ) => 'wpb_fadeInDown', esc_html__( 'Fade Bottom to Top', 'cortana' ) => 'wpb_fadeInUp', esc_html__( 'Fade Left to Right', 'cortana' ) => 'wpb_fadeInLeft', esc_html__( 'Fade Right to Left', 'cortana' ) => 'wpb_fadeInRight', esc_html__( 'Bounce In', 'cortana' ) => 'wpb_bounceIn', esc_html__( 'Bounce Top to Bottom', 'cortana' ) => 'wpb_bounceInDown', esc_html__( 'Bounce Bottom to Top', 'cortana' ) => 'wpb_bounceInUp', esc_html__( 'Bounce Left to Right', 'cortana' ) => 'wpb_bounceInLeft', esc_html__( 'Bounce Right to Left', 'cortana' ) => 'wpb_bounceInRight', esc_html__( 'Zoom In', 'cortana' ) => 'wpb_zoomIn', esc_html__( 'Flip Vertical', 'cortana' ) => 'wpb_flipInX', esc_html__( 'Flip Horizontal', 'cortana' ) => 'wpb_flipInY', esc_html__( 'Bounce', 'cortana' ) => 'wpb_bounce', esc_html__( 'Flash', 'cortana' ) => 'wpb_flash', esc_html__( 'Shake', 'cortana' ) => 'wpb_shake', esc_html__( 'Pulse', 'cortana' ) => 'wpb_pulse', esc_html__( 'Swing', 'cortana' ) => 'wpb_swing', esc_html__( 'Rubber band', 'cortana' ) => 'wpb_rubberBand', esc_html__( 'Wobble', 'cortana' ) => 'wpb_wobble', esc_html__( 'Tada', 'cortana' ) => 'wpb_tada' ),
				'description' => esc_html__( 'Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'cortana' ),
				'group'       => esc_html__( 'Animation Settings', 'cortana' )
			);

			$add_duration_animation = array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Animation Duration', 'cortana' ),
				'param_name'  => 'duration',
				'value'       => '',
				'description' => esc_html__( 'Duration in seconds. You can use decimal points in the value. Use this field to specify the amount of time the animation plays. <em>The default value depends on the animation, leave blank to use the default.</em>', 'cortana' ),
				'dependency'  => Array( 'element' => 'css_animation', 'value' => array( 'wpb_fadeIn', 'wpb_fadeInDown', 'wpb_fadeInUp', 'wpb_fadeInLeft', 'wpb_fadeInRight', 'wpb_bounceIn', 'wpb_bounceInDown', 'wpb_bounceInUp', 'wpb_bounceInLeft', 'wpb_bounceInRight', 'wpb_zoomIn', 'wpb_flipInX', 'wpb_flipInY', 'wpb_bounce', 'wpb_flash', 'wpb_shake', 'wpb_pulse', 'wpb_swing', 'wpb_rubberBand', 'wpb_wobble', 'wpb_tada' ) ),
				'group'       => esc_html__( 'Animation Settings', 'cortana' )
			);

			$add_delay_animation = array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Animation Delay', 'cortana' ),
				'param_name'  => 'delay',
				'value'       => '',
				'description' => esc_html__( 'Delay in seconds. You can use decimal points in the value. Use this field to delay the animation for a few seconds, this is helpful if you want to chain different effects one after another above the fold.', 'cortana' ),
				'dependency'  => Array( 'element' => 'css_animation', 'value' => array( 'wpb_fadeIn', 'wpb_fadeInDown', 'wpb_fadeInUp', 'wpb_fadeInLeft', 'wpb_fadeInRight', 'wpb_bounceIn', 'wpb_bounceInDown', 'wpb_bounceInUp', 'wpb_bounceInLeft', 'wpb_bounceInRight', 'wpb_zoomIn', 'wpb_flipInX', 'wpb_flipInY', 'wpb_bounce', 'wpb_flash', 'wpb_shake', 'wpb_pulse', 'wpb_swing', 'wpb_rubberBand', 'wpb_wobble', 'wpb_tada' ) ),
				'group'       => esc_html__( 'Animation Settings', 'cortana' )
			);

			vc_add_param( 'vc_row',
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Layout', 'wpb' ),
					'param_name' => 'layout',
					'value'      => array(
						esc_html__( 'Full Width', 'wpb' )      => 'wide',
						esc_html__( 'Container', 'wpb' )       => 'boxed',
						esc_html__( 'Container Fluid', 'wpb' ) => 'container-fluid',
					),
				)
			);
			vc_add_param( 'vc_row',
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Parallax Type', 'cortana' ),
					'param_name'  => 'parallax_style',
					'value'       => array(
						esc_html__( 'None', 'cortana' )                          => 'none',
						esc_html__( 'Vertical Parallax On Scroll', 'cortana' )   => 'vertical-parallax',
						esc_html__( 'Horizontal Parallax On Scroll', 'cortana' ) => 'horizontal-parallax',
						esc_html__( 'Video Background', 'cortana' )              => 'video-background',
					),
					'description' => esc_html__( 'Select the kind of style you like for the background image of this row.', 'cortana' ),
				)
			);
			vc_add_param( 'vc_row',
				array(
					'type'       => 'textarea',
					'heading'    => esc_html__( 'Link Video (.mp4 or .ogg)', 'cortana' ),
					'param_name' => 'video_link',
					'value'      => '',
					'dependency' => Array( 'element' => 'parallax_style', 'value' => array( 'video-background' ) ),
				)
			);
			vc_add_param( 'vc_row',
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Scroll effect', 'cortana' ),
					'param_name'  => 'parallax_scroll_effect',
					'value'       => array(
						esc_html__( 'Fixed at its position', 'cortana' ) => 'fixed',
						esc_html__( 'Move with the content', 'cortana' ) => 'scroll',
					),
					'description' => esc_html__( 'Options to set whether a background image is fixed or scroll with the rest of the page.', 'cortana' ),
					'dependency'  => Array( 'element' => 'parallax_style', 'value' => array( 'vertical-parallax', 'horizontal-parallax' ) ),
				)
			);
			vc_add_param( 'vc_row',
				array(
					'type'        => 'number',
					'heading'     => esc_html__( 'Parallax speed', 'cortana' ),
					'param_name'  => 'parallax_speed',
					'value'       => '1',
					'min'         => '1',
					'max'         => '100',
					'description' => esc_html__( 'Control speed of parallax. Enter value between 0 to 100', 'cortana' ),
					'dependency'  => Array( 'element' => 'parallax_style', 'value' => array( 'vertical-parallax', 'horizontal-parallax' ) ),
				)
			);
			vc_add_param( 'vc_row',
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Show background overlay', 'cortana' ),
					'param_name'  => 'overlay_set',
					'description' => esc_html__( 'Hide or Show overlay on background images.', 'cortana' ),
					'value'       => array(
						esc_html__( 'Hide, please', 'cortana' )       => 'hide_overlay',
						esc_html__( 'Show Overlay Color', 'cortana' ) => 'show_overlay_color',
						esc_html__( 'Show Overlay Image', 'cortana' ) => 'show_overlay_image',
					)
				)
			);
			vc_add_param( 'vc_row',
				array(
					'type'        => 'attach_image',
					'heading'     => esc_html__( 'Upload image:', 'cortana' ),
					'param_name'  => 'overlay_image',
					'value'       => '',
					'description' => esc_html__( 'Upload image overlay.', 'cortana' ),
					'dependency'  => Array( 'element' => 'overlay_set', 'value' => array( 'show_overlay_image' ) ),
				)
			);
			vc_add_param( 'vc_row',
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Overlay color', 'cortana' ),
					'param_name'  => 'overlay_color',
					'description' => esc_html__( 'Select color for background overlay.', 'cortana' ),
					'value'       => '',
					'dependency'  => Array( 'element' => 'overlay_set', 'value' => array( 'show_overlay_color' ) ),
				)
			);
			vc_add_param( 'vc_row', array(
					'type'        => 'number',
					'class'       => '',
					'heading'     => esc_html__( 'Overlay opacity', 'cortana' ),
					'param_name'  => 'overlay_opacity',
					'value'       => '50',
					'min'         => '1',
					'max'         => '100',
					'suffix'      => '%',
					'description' => esc_html__( 'Select opacity for overlay.', 'cortana' ),
					'dependency'  => Array( 'element' => 'overlay_set', 'value' => array( 'show_overlay_color', 'show_overlay_image' ) ),
				)
			);
			vc_add_param( 'vc_row', $add_css_animation );

			vc_add_param( 'vc_row', $add_duration_animation );

			vc_add_param( 'vc_row', $add_delay_animation );

			vc_add_param( 'vc_row_inner',
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Layout', 'cortana' ),
					'param_name' => 'layout',
					'value'      => array(
						esc_html__( 'Full Width', 'cortana' )      => 'wide',
						esc_html__( 'Container', 'cortana' )       => 'boxed',
						esc_html__( 'Container Fluid', 'cortana' ) => 'container-fluid',
					),
				)
			);
			vc_add_param( 'vc_row_inner',
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Parallax Type', 'cortana' ),
					'param_name'  => 'parallax_style',
					'value'       => array(
						esc_html__( 'None', 'cortana' )                          => 'none',
						esc_html__( 'Vertical Parallax On Scroll', 'cortana' )   => 'vertical-parallax',
						esc_html__( 'Horizontal Parallax On Scroll', 'cortana' ) => 'horizontal-parallax',
						esc_html__( 'Video Background', 'cortana' )              => 'video-background',
					),
					'description' => esc_html__( 'Select the kind of style you like for the background image of this row.', 'cortana' ),
				)
			);
			vc_add_param( 'vc_row_inner',
				array(
					'type'       => 'textarea',
					'heading'    => esc_html__( 'Link Video (.mp4 or .ogg)', 'cortana' ),
					'param_name' => 'video_link',
					'value'      => '',
					'dependency' => Array( 'element' => 'parallax_style', 'value' => array( 'video-background' ) ),
				)
			);
			vc_add_param( 'vc_row_inner',
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Scroll effect', 'cortana' ),
					'param_name'  => 'parallax_scroll_effect',
					'value'       => array(
						esc_html__( 'Fixed at its position', 'cortana' ) => 'fixed',
						esc_html__( 'Move with the content', 'cortana' ) => 'scroll',
					),
					'description' => esc_html__( 'Options to set whether a background image is fixed or scroll with the rest of the page.', 'cortana' ),
					'dependency'  => Array( 'element' => 'parallax_style', 'value' => array( 'vertical-parallax', 'horizontal-parallax' ) ),
				)
			);
			vc_add_param( 'vc_row_inner',
				array(
					'type'        => 'number',
					'heading'     => esc_html__( 'Parallax speed', 'cortana' ),
					'param_name'  => 'parallax_speed',
					'value'       => '1',
					'min'         => '1',
					'max'         => '100',
					'description' => esc_html__( 'Control speed of parallax. Enter value between 1 to 100', 'cortana' ),
					'dependency'  => Array( 'element' => 'parallax_style', 'value' => array( 'vertical-parallax', 'horizontal-parallax' ) ),
				)
			);
			vc_add_param( 'vc_row_inner',
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Show background overlay', 'cortana' ),
					'param_name'  => 'overlay_set',
					'description' => esc_html__( 'Hide or Show overlay on background images.', 'cortana' ),
					'value'       => array(
						esc_html__( 'Hide, please', 'cortana' )       => 'hide_overlay',
						esc_html__( 'Show Overlay Color', 'cortana' ) => 'show_overlay_color',
						esc_html__( 'Show Overlay Image', 'cortana' ) => 'show_overlay_image',
					)
				)
			);
			vc_add_param( 'vc_row_inner',
				array(
					'type'        => 'attach_image',
					'heading'     => esc_html__( 'Upload image:', 'cortana' ),
					'param_name'  => 'overlay_image',
					'value'       => '',
					'description' => esc_html__( 'Upload image overlay.', 'cortana' ),
					'dependency'  => Array( 'element' => 'overlay_set', 'value' => array( 'show_overlay_image' ) ),
				)
			);
			vc_add_param( 'vc_row_inner',
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Overlay color', 'cortana' ),
					'param_name'  => 'overlay_color',
					'description' => esc_html__( 'Select color for background overlay.', 'cortana' ),
					'value'       => '',
					'dependency'  => Array( 'element' => 'overlay_set', 'value' => array( 'show_overlay_color' ) ),
				)
			);
			vc_add_param( 'vc_row_inner', array(
					'type'        => 'number',
					'class'       => '',
					'heading'     => esc_html__( 'Overlay opacity', 'cortana' ),
					'param_name'  => 'overlay_opacity',
					'value'       => '50',
					'min'         => '1',
					'max'         => '100',
					'suffix'      => '%',
					'description' => esc_html__( 'Select opacity for overlay.', 'cortana' ),
					'dependency'  => Array( 'element' => 'overlay_set', 'value' => array( 'show_overlay_color', 'show_overlay_image' ) ),
				)
			);
			vc_add_param( 'vc_row_inner', $add_css_animation );

			vc_add_param( 'vc_row_inner', $add_duration_animation );

			vc_add_param( 'vc_row_inner', $add_delay_animation );

			vc_add_param( 'vc_accordion', array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Layout Style', 'cortana' ),
					'param_name'  => 'layout_style',
					'admin_label' => true,
					'value'       => array( esc_html__( 'style 1', 'cortana' ) => 'style1' ),
					'description' => esc_html__( 'Select Layout Style.', 'cortana' ),
					'weight'      => 1
				)
			);
			vc_add_param( 'vc_accordion_tab', array(
					'type'        => 'icon_text',
					'heading'     => esc_html__( 'Select Icon:', 'cortana' ),
					'param_name'  => 'icon',
					'value'       => '',
					'description' => esc_html__( 'Select the icon from the list.', 'cortana' ),
				)
			);
			vc_add_param( 'vc_tab', array(
					'type'        => 'icon_text',
					'heading'     => esc_html__( 'Select Icon:', 'cortana' ),
					'param_name'  => 'icon',
					'value'       => '',
					'description' => esc_html__( 'Select the icon from the list.', 'cortana' ),
				)
			);
			vc_add_param( 'vc_tabs', array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Layout Style', 'cortana' ),
					'param_name'  => 'layout_style',
					'admin_label' => true,
					'value'       => array( __( 'style 1', 'cortana' ) => 'style1' ),
					'description' => esc_html__( 'Select Layout Style.', 'cortana' ),
					'weight'      => 2
				)
			);
			vc_add_param( 'vc_tabs', array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Type', 'cortana' ),
					'param_name'  => 'type',
					'admin_label' => true,
					'value'       => array( esc_html__( 'Left', 'cortana' ) => 'left', esc_html__( 'Right', 'cortana' ) => 'right' ),
					'weight'      => 1
				)
			);
			$settings_vc_map = array(
				'category' => esc_html__( 'Cortana Shortcodes', 'cortana' )
			);
			vc_map_update( 'vc_tabs', $settings_vc_map );
			vc_map_update( 'vc_accordion', $settings_vc_map );
		}
	}

	g5plus_add_vc_param();
} else {
	vc_add_param( 'vc_tta_accordion', array(
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'value'       => array(
				esc_html__( 'Cortana', 'cortana' ) => 'accordion_style1',
				esc_html__( 'Classic', 'cortana' ) => 'classic',
				esc_html__( 'Modern', 'cortana' )  => 'modern',
				esc_html__( 'Flat', 'cortana' )    => 'flat',
				esc_html__( 'Outline', 'cortana' ) => 'outline',
			),
			'heading'     => esc_html__( 'Style', 'cortana' ),
			'description' => esc_html__( 'Select accordion display style.', 'cortana' ),
			'weight'      => 1,
		)
	);
	vc_add_param( 'vc_tta_tabs', array(
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'value'       => array(
				esc_html__( 'Cortana', 'js_composer' )         => 'tab_style1',
				esc_html__( 'Cortana Style 2', 'js_composer' ) => 'tab_style2',
				esc_html__( 'Classic', 'js_composer' )         => 'classic',
				esc_html__( 'Modern', 'js_composer' )          => 'modern',
				esc_html__( 'Flat', 'js_composer' )            => 'flat',
				esc_html__( 'Outline', 'js_composer' )         => 'outline',
			),
			'heading'     => esc_html__( 'Style', 'js_composer' ),
			'description' => esc_html__( 'Select tabs display style.', 'js_composer' ),
			'weight'      => 1,
		)
	);
	$settings_vc_map = array(
		'category' => esc_html__( 'Cortana Shortcodes', 'cortana' )
	);
	vc_map_update( 'vc_tta_tabs', $settings_vc_map );
	vc_map_update( 'vc_tta_accordion', $settings_vc_map );
	function register_vc_map() {
		$add_css_animation = array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'CSS Animation', 'cortana' ),
			'param_name'  => 'css_animation',
			'value'       => array( esc_html__( 'No', 'cortana' ) => '', esc_html__( 'Fade In', 'cortana' ) => 'wpb_fadeIn', esc_html__( 'Fade Top to Bottom', 'cortana' ) => 'wpb_fadeInDown', esc_html__( 'Fade Bottom to Top', 'cortana' ) => 'wpb_fadeInUp', esc_html__( 'Fade Left to Right', 'cortana' ) => 'wpb_fadeInLeft', esc_html__( 'Fade Right to Left', 'cortana' ) => 'wpb_fadeInRight', esc_html__( 'Bounce In', 'cortana' ) => 'wpb_bounceIn', esc_html__( 'Bounce Top to Bottom', 'cortana' ) => 'wpb_bounceInDown', esc_html__( 'Bounce Bottom to Top', 'cortana' ) => 'wpb_bounceInUp', esc_html__( 'Bounce Left to Right', 'cortana' ) => 'wpb_bounceInLeft', esc_html__( 'Bounce Right to Left', 'cortana' ) => 'wpb_bounceInRight', esc_html__( 'Zoom In', 'cortana' ) => 'wpb_zoomIn', esc_html__( 'Flip Vertical', 'cortana' ) => 'wpb_flipInX', esc_html__( 'Flip Horizontal', 'cortana' ) => 'wpb_flipInY', esc_html__( 'Bounce', 'cortana' ) => 'wpb_bounce', esc_html__( 'Flash', 'cortana' ) => 'wpb_flash', esc_html__( 'Shake', 'cortana' ) => 'wpb_shake', esc_html__( 'Pulse', 'cortana' ) => 'wpb_pulse', esc_html__( 'Swing', 'cortana' ) => 'wpb_swing', esc_html__( 'Rubber band', 'cortana' ) => 'wpb_rubberBand', esc_html__( 'Wobble', 'cortana' ) => 'wpb_wobble', esc_html__( 'Tada', 'cortana' ) => 'wpb_tada' ),
			'description' => esc_html__( 'Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'cortana' ),
			'group'       => esc_html__( 'Animation Settings', 'cortana' )
		);

		$add_duration_animation = array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Animation Duration', 'cortana' ),
			'param_name'  => 'duration',
			'value'       => '',
			'description' => esc_html__( 'Duration in seconds. You can use decimal points in the value. Use this field to specify the amount of time the animation plays. <em>The default value depends on the animation, leave blank to use the default.</em>', 'cortana' ),
			'dependency'  => Array( 'element' => 'css_animation', 'value' => array( 'wpb_fadeIn', 'wpb_fadeInDown', 'wpb_fadeInUp', 'wpb_fadeInLeft', 'wpb_fadeInRight', 'wpb_bounceIn', 'wpb_bounceInDown', 'wpb_bounceInUp', 'wpb_bounceInLeft', 'wpb_bounceInRight', 'wpb_zoomIn', 'wpb_flipInX', 'wpb_flipInY', 'wpb_bounce', 'wpb_flash', 'wpb_shake', 'wpb_pulse', 'wpb_swing', 'wpb_rubberBand', 'wpb_wobble', 'wpb_tada' ) ),
			'group'       => esc_html__( 'Animation Settings', 'cortana' )
		);

		$add_delay_animation = array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Animation Delay', 'cortana' ),
			'param_name'  => 'delay',
			'value'       => '',
			'description' => esc_html__( 'Delay in seconds. You can use decimal points in the value. Use this field to delay the animation for a few seconds, this is helpful if you want to chain different effects one after another above the fold.', 'cortana' ),
			'dependency'  => Array( 'element' => 'css_animation', 'value' => array( 'wpb_fadeIn', 'wpb_fadeInDown', 'wpb_fadeInUp', 'wpb_fadeInLeft', 'wpb_fadeInRight', 'wpb_bounceIn', 'wpb_bounceInDown', 'wpb_bounceInUp', 'wpb_bounceInLeft', 'wpb_bounceInRight', 'wpb_zoomIn', 'wpb_flipInX', 'wpb_flipInY', 'wpb_bounce', 'wpb_flash', 'wpb_shake', 'wpb_pulse', 'wpb_swing', 'wpb_rubberBand', 'wpb_wobble', 'wpb_tada' ) ),
			'group'       => esc_html__( 'Animation Settings', 'cortana' )
		);
		$params_row          = array(
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Layout', 'cortana' ),
				'param_name' => 'layout',
				'value'      => array(
					esc_html__( 'Full Width', 'cortana' )      => 'wide',
					esc_html__( 'Container', 'cortana' )       => 'boxed',
					esc_html__( 'Container Fluid', 'cortana' ) => 'container-fluid',
				),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Full height row?', 'js_composer' ),
				'param_name'  => 'full_height',
				'description' => esc_html__( 'If checked row will be set to full height.', 'js_composer' ),
				'value'       => array( esc_html__( 'Yes', 'js_composer' ) => 'yes' )
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Content position', 'js_composer' ),
				'param_name'  => 'content_placement',
				'value'       => array(
					esc_html__( 'Middle', 'js_composer' ) => 'middle',
					esc_html__( 'Top', 'js_composer' )    => 'top',
				),
				'description' => esc_html__( 'Select content position within row.', 'js_composer' ),
				'dependency'  => array(
					'element'   => 'full_height',
					'not_empty' => true,
				),
			),
			array(
				'type'        => 'checkbox',
				'heading'     => esc_html__( 'Use video background?', 'js_composer' ),
				'param_name'  => 'video_bg',
				'description' => esc_html__( 'If checked, video will be used as row background.', 'js_composer' ),
				'value'       => array( esc_html__( 'Yes', 'js_composer' ) => 'yes' )
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'YouTube link', 'js_composer' ),
				'param_name'  => 'video_bg_url',
				'value'       => 'https://www.youtube.com/watch?v=lMJXxhRFO1k', // default video url
				'description' => esc_html__( 'Add YouTube link.', 'js_composer' ),
				'dependency'  => array(
					'element'   => 'video_bg',
					'not_empty' => true,
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Parallax', 'js_composer' ),
				'param_name'  => 'video_bg_parallax',
				'value'       => array(
					esc_html__( 'None', 'js_composer' )      => '',
					esc_html__( 'Simple', 'js_composer' )    => 'content-moving',
					esc_html__( 'With fade', 'js_composer' ) => 'content-moving-fade',
				),
				'description' => esc_html__( 'Add parallax type background for row.', 'js_composer' ),
				'dependency'  => array(
					'element'   => 'video_bg',
					'not_empty' => true,
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Parallax', 'js_composer' ),
				'param_name'  => 'parallax',
				'value'       => array(
					esc_html__( 'None', 'js_composer' )      => '',
					esc_html__( 'Simple', 'js_composer' )    => 'content-moving',
					esc_html__( 'With fade', 'js_composer' ) => 'content-moving-fade',
				),
				'description' => esc_html__( 'Add parallax type background for row (Note: If no image is specified, parallax will use background image from Design Options).', 'js_composer' ),
				'dependency'  => array(
					'element'  => 'video_bg',
					'is_empty' => true,
				),
			),
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Image', 'js_composer' ),
				'param_name'  => 'parallax_image',
				'value'       => '',
				'description' => esc_html__( 'Select image from media library.', 'js_composer' ),
				'dependency'  => array(
					'element'   => 'parallax',
					'not_empty' => true,
				),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Parallax speed', 'cortana' ),
				'param_name' => 'parallax_speed',
				'value'      => '1.5',
				'dependency' => Array( 'element' => 'parallax', 'value' => array( 'content-moving', 'content-moving-fade' ) ),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Show background overlay', 'cortana' ),
				'param_name'  => 'overlay_set',
				'description' => esc_html__( 'Hide or Show overlay on background images.', 'cortana' ),
				'value'       => array(
					esc_html__( 'Hide, please', 'cortana' )       => 'hide_overlay',
					esc_html__( 'Show Overlay Color', 'cortana' ) => 'show_overlay_color',
					esc_html__( 'Show Overlay Image', 'cortana' ) => 'show_overlay_image',
				)
			),
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Image Overlay:', 'cortana' ),
				'param_name'  => 'overlay_image',
				'value'       => '',
				'description' => esc_html__( 'Upload image overlay.', 'cortana' ),
				'dependency'  => Array( 'element' => 'overlay_set', 'value' => array( 'show_overlay_image' ) ),
			),
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Overlay color', 'cortana' ),
				'param_name'  => 'overlay_color',
				'description' => esc_html__( 'Select color for background overlay.', 'cortana' ),
				'value'       => '',
				'dependency'  => Array( 'element' => 'overlay_set', 'value' => array( 'show_overlay_color' ) ),
			),
			array(
				'type'        => 'number',
				'class'       => '',
				'heading'     => esc_html__( 'Overlay opacity', 'cortana' ),
				'param_name'  => 'overlay_opacity',
				'value'       => '50',
				'min'         => '1',
				'max'         => '100',
				'suffix'      => '%',
				'description' => esc_html__( 'Select opacity for overlay.', 'cortana' ),
				'dependency'  => Array( 'element' => 'overlay_set', 'value' => array( 'show_overlay_color', 'show_overlay_image' ) ),
			),
			array(
				'type'        => 'el_id',
				'heading'     => esc_html__( 'Row ID', 'js_composer' ),
				'param_name'  => 'el_id',
				'description' => sprintf( esc_html__( 'Enter row ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'js_composer' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
				'param_name'  => 'el_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' ),
			),
			array(
				'type'       => 'css_editor',
				'heading'    => esc_html__( 'CSS box', 'js_composer' ),
				'param_name' => 'css',
				'group'      => esc_html__( 'Design Options', 'js_composer' )
			),
			$add_css_animation,
			$add_duration_animation,
			$add_delay_animation,
		);
		vc_map( array(
			'name'                    => esc_html__( 'Row', 'cortana' ),
			'base'                    => 'vc_row',
			'is_container'            => true,
			'icon'                    => 'icon-wpb-row',
			'show_settings_on_create' => false,
			'category'                => esc_html__( 'Content', 'cortana' ),
			'description'             => esc_html__( 'Place content elements inside the row', 'cortana' ),
			'params'                  => $params_row,
			'js_view'                 => 'VcRowView'
		) );
		vc_map( array(
			'name'                    => esc_html__( 'Row', 'cortana' ), //Inner Row
			'base'                    => 'vc_row_inner',
			'content_element'         => false,
			'is_container'            => true,
			'icon'                    => 'icon-wpb-row',
			'weight'                  => 1000,
			'show_settings_on_create' => false,
			'description'             => esc_html__( 'Place content elements inside the row', 'cortana' ),
			'params'                  => $params_row,
			'js_view'                 => 'VcRowView'
		) );
	}

	add_action( 'vc_after_init', 'register_vc_map' );
}