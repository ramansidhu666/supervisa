<?php
if ( !defined( 'ABSPATH' ) ) {
	die( '-1' );
}
if ( !class_exists( 'Cortana_Countdown' ) ) {
	class Cortana_Countdown {
		function __construct() {
			// add_action( 'init', array($this, 'register_post_types' ), 6 );
			//add_shortcode('cortana_countdown_shortcode', array($this, 'cortana_countdown_shortcode' ));
			//add_filter( 'rwmb_meta_boxes', array($this,'cortana_register_meta_boxes' ));
		}

		function register_post_types() {
			if ( post_type_exists( 'countdown' ) ) {
				return;
			}
			register_post_type( 'countdown',
				array(
					'label'       => __( 'Countdown', 'cortana' ),
					'description' => __( 'Countdown Description', 'cortana' ),
					'labels'      => array(
						'name'               => 'Countdown',
						'singular_name'      => 'Countdown',
						'menu_name'          => __( 'Countdown', 'cortana' ),
						'parent_item_colon'  => __( 'Parent Item:', 'cortana' ),
						'all_items'          => __( 'All Countdown', 'cortana' ),
						'view_item'          => __( 'View Item', 'cortana' ),
						'add_new_item'       => __( 'Add New Countdown', 'cortana' ),
						'add_new'            => __( 'Add New', 'cortana' ),
						'edit_item'          => __( 'Edit Item', 'cortana' ),
						'update_item'        => __( 'Update Item', 'cortana' ),
						'search_items'       => __( 'Search Item', 'cortana' ),
						'not_found'          => __( 'Not found', 'cortana' ),
						'not_found_in_trash' => __( 'Not found in Trash', 'cortana' ),
					),
					'supports'    => array( 'title', 'editor', 'comments', 'thumbnail' ),
					'public'      => true,
					'has_archive' => true
				)
			);
		}

		function cortana_countdown_shortcode( $atts ) {
			$type = $css = '';
			extract( shortcode_atts( array(
				'type' => '',
				'css'  => ''
			), $atts ) );

			$plugin_path   = untrailingslashit( plugin_dir_path( __FILE__ ) );
			$template_path = $plugin_path . '/templates/' . $type . '.php';
			ob_start();
			include( $template_path );
			$ret = ob_get_contents();
			ob_end_clean();

			return $ret;
		}

		function cortana_register_meta_boxes( $meta_boxes ) {
			$meta_boxes[] = array(
				'title'  => __( 'Countdown Option', 'cortana' ),
				'id'     => 'cortana-meta-box-countdown-opening',
				'pages'  => array( 'countdown' ),
				'fields' => array(
					array(
						'name' => __( 'Opening hours', 'cortana' ),
						'id'   => 'countdown-opening',
						'type' => 'datetime',
					),
					array(
						'name'    => __( 'Type', 'cortana' ),
						'id'      => 'countdown-type',
						'type'    => 'select',
						'options' => array(
							'comming-soon'       => __( 'Coming Soon', 'cortana' ),
							'under-construction' => __( 'Under Construction', 'cortana' )
						)
					),
					array(
						'name' => __( 'Url redirect (after countdown completed)', 'cortana' ),
						'id'   => 'countdown-url',
						'type' => 'textarea',
					),
					array(
						'name' => __( 'Footer text', 'cortana' ),
						'id'   => 'footer_text',
						'type' => 'textarea',
					)
				)
			);

			return $meta_boxes;
		}
	}

	new Cortana_Countdown();
}