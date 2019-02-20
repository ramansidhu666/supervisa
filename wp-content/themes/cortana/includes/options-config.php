<?php

/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */

if ( !class_exists( 'Redux_Framework_options_config' ) ) {

	class Redux_Framework_options_config {

		public $args = array();
		public $sections = array();
		public $theme;
		public $ReduxFramework;

		public function __construct() {
			if ( !class_exists( 'ReduxFramework' ) ) {
				return;
			}
			// This is needed. Bah WordPress bugs.  ;)
			/*if ( true == Redux_Helpers::isTheme( __FILE__ ) ) {
				$this->initSettings();
			} else {
				add_action( 'plugins_loaded', array( $this, 'initSettings' ), 10 );
			}*/

			$this->initSettings();
		}

		public function initSettings() {
			// Set the default arguments
			$this->setArguments();

			// Set a few help tabs so you can see how it's done
			$this->setHelpTabs();

			// Create the sections and fields
			$this->setSections();

			if ( !isset( $this->args['opt_name'] ) ) { // No errors please
				return;
			}

			$this->ReduxFramework = new ReduxFramework( $this->sections, $this->args );
		}

		/**
		 *
		 */
		public function setSections() {

			$page_title_bg_url         =  get_template_directory_uri()  . '/assets/images/bg-page-title.jpg';
			$page_404_bg_url           =  get_template_directory_uri()  . '/assets/images/bg-404.jpg';
			$archive_title_bg_url      =  get_template_directory_uri()  . '/assets/images/bg-archive-title.jpg';
			$archive_shop_title_bg_url =  get_template_directory_uri()  . '/assets/images/bg-shop-title.jpg';
			$portfolio_title_bg_url    =  get_template_directory_uri()  . '/assets/images/bg-portfolio-title.jpg';
			$services_title_bg_url     =  get_template_directory_uri()  . '/assets/images/bg-portfolio-title.jpg';


			// General Setting
			$this->sections[] = array(
				'title'  => esc_html__( 'General Setting', 'cortana' ),
				'desc'   => '',
				'icon'   => 'el el-wrench',
				'fields' => array(
					array(
						'id'       => 'home_preloader',
						'type'     => 'select',
						'title'    => esc_html__( 'Home Preloader', 'cortana' ),
						'subtitle' => esc_html__( 'Enable/Disable Home Preloader', 'cortana' ),
						'desc'     => '',
						'options'  => array(
							'none'       => 'None',
							'square-1'   => 'Square 01',
							'square-2'   => 'Square 02',
							'square-3'   => 'Square 03',
							'square-4'   => 'Square 04',
							'square-5'   => 'Square 05',
							'square-6'   => 'Square 06',
							'square-7'   => 'Square 07',
							'square-8'   => 'Square 08',
							'square-9'   => 'Square 09',
							'round-1'    => 'Round 01',
							'round-2'    => 'Round 02',
							'round-3'    => 'Round 03',
							'round-4'    => 'Round 04',
							'round-5'    => 'Round 05',
							'round-6'    => 'Round 06',
							'round-7'    => 'Round 07',
							'round-8'    => 'Round 08',
							'round-9'    => 'Round 09',
							'various-1'  => 'Various 01',
							'various-2'  => 'Various 02',
							'various-3'  => 'Various 03',
							'various-4'  => 'Various 04',
							'various-5'  => 'Various 05',
							'various-6'  => 'Various 06',
							'various-7'  => 'Various 07',
							'various-8'  => 'Various 08',
							'various-9'  => 'Various 09',
							'various-10' => 'Various 10',

						),
						'default'  => 'none'
					),

					array(
						'id'       => 'home_preloader_bg_color',
						'type'     => 'color_rgba',
						'title'    => esc_html__( 'Preloader background color', 'cortana' ),
						'subtitle' => esc_html__( 'Set Preloader background color.', 'cortana' ),
						'default'  => array(),
						'mode'     => 'background',
						'validate' => 'colorrgba',
						'required' => array( 'home_preloader', 'not_empty_and', array( 'none' ) ),
					),

					array(
						'id'       => 'home_preloader_spinner_color',
						'type'     => 'color',
						'title'    => esc_html__( 'Preloader spinner color', 'cortana' ),
						'subtitle' => esc_html__( 'Pick a preloader spinner color for the Top Bar', 'cortana' ),
						'default'  => '',
						'validate' => 'color',
						'required' => array( 'home_preloader', 'not_empty_and', array( 'none' ) ),
					),

					array(
						'id'       => 'smooth_scroll',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Smooth Scroll', 'cortana' ),
						'subtitle' => esc_html__( 'Enable/Disable Smooth Scroll', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'On', '0' => 'Off' ),
						'default'  => '0'
					),

					array(
						'id'       => 'custom_scroll',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Custom Scroll', 'cortana' ),
						'subtitle' => esc_html__( 'Enable/Disable Custom Scroll', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'On', '0' => 'Off' ),
						'default'  => '0'
					),

					array(
						'id'       => 'custom_scroll_width',
						'type'     => 'text',
						'title'    => esc_html__( 'Custom Scroll Width', 'cortana' ),
						'subtitle' => esc_html__( 'This must be numeric (no px) or empty.', 'cortana' ),
						'validate' => 'numeric',
						'default'  => '10',
						'required' => array( 'custom_scroll', '=', array( '1' ) ),
					),

					array(
						'id'       => 'custom_scroll_color',
						'type'     => 'color',
						'title'    => esc_html__( 'Custom Scroll Color', 'cortana' ),
						'subtitle' => esc_html__( 'Set Custom Scroll Color', 'cortana' ),
						'default'  => '#19394B',
						'validate' => 'color',
						'required' => array( 'custom_scroll', '=', array( '1' ) ),
					),

					array(
						'id'       => 'custom_scroll_thumb_color',
						'type'     => 'color',
						'title'    => esc_html__( 'Custom Scroll Thumb Color', 'cortana' ),
						'subtitle' => esc_html__( 'Set Custom Scroll Thumb Color', 'cortana' ),
						'default'  => '#e8aa00',
						'validate' => 'color',
						'required' => array( 'custom_scroll', '=', array( '1' ) ),
					),


					array(
						'id'       => 'panel_selector',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Panel Selector', 'cortana' ),
						'subtitle' => esc_html__( 'Enable/Disable Panel Selector', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'On', '0' => 'Off' ),
						'default'  => '0'
					),
					array(
						'id'       => 'back_to_top',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Back To Top', 'cortana' ),
						'subtitle' => esc_html__( 'Enable/Disable Back to top button', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'On', '0' => 'Off' ),
						'default'  => '1'
					),

					array(
						'id'       => 'enable_rtl_mode',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Enable RTL mode', 'cortana' ),
						'subtitle' => esc_html__( 'Enable/Disable RTL mode', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'On', '0' => 'Off' ),
						'default'  => '0'
					),


					array(
						'id'       => 'enable_social_meta',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Enable Social Meta Tags', 'cortana' ),
						'subtitle' => esc_html__( 'Enable the social meta head tag output.', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'On', '0' => 'Off' ),
						'default'  => '0'
					),

					array(
						'id'       => 'twitter_author_username',
						'type'     => 'text',
						'title'    => esc_html__( 'Twitter Publisher Username', 'cortana' ),
						'subtitle' => esc_html__( 'Enter your twitter username here, to be used for the Twitter Card date. Ensure that you do not include the @ symbol.', 'cortana' ),
						'desc'     => '',
						'default'  => "",
						'required' => array( 'enable_social_meta', '=', array( '1' ) ),
					),
					array(
						'id'       => 'googleplus_author',
						'type'     => 'text',
						'title'    => esc_html__( 'Google+ Username', 'cortana' ),
						'subtitle' => esc_html__( 'Enter your Google+ username here, to be used for the authorship meta.', 'cortana' ),
						'desc'     => '',
						'default'  => "",
						'required' => array( 'enable_social_meta', '=', array( '1' ) ),
					),


					array(
						'id'   => 'general_divide_2',
						'type' => 'divide'
					),
					array(
						'id'       => 'layout_style',
						'type'     => 'image_select',
						'title'    => esc_html__( 'Layout Style', 'cortana' ),
						'subtitle' => esc_html__( 'Select the layout style', 'cortana' ),
						'desc'     => '',
						'options'  => array(
							'boxed' => array( 'title' => 'Boxed', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/layout-boxed.png' ),
							'wide'  => array( 'title' => 'Wide', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/layout-wide.png' )
						),
						'default'  => 'wide'
					),


					array(
						'id'       => 'body_background_mode',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Body Background Mode', 'cortana' ),
						'subtitle' => esc_html__( 'Chose Background Mode', 'cortana' ),
						'desc'     => '',
						'options'  => array( 'background' => 'Background', 'pattern' => 'Pattern' ),
						'default'  => 'background',
						'required' => array( 'layout_style', '=', array( 'boxed' ) )
					),

					array(
						'id'       => 'body_background',
						'type'     => 'background',
						'output'   => array( 'body' ),
						'title'    => esc_html__( 'Body Background', 'cortana' ),
						'subtitle' => esc_html__( 'Body background (Apply for Boxed layout style).', 'cortana' ),
						'default'  => array(
							'background-color'      => '',
							'background-repeat'     => 'no-repeat',
							'background-position'   => 'center center',
							'background-attachment' => 'fixed',
							'background-size'       => 'cover'
						),
						'required' => array(
							array( 'layout_style', '=', array( 'boxed' ) ),
							array( 'body_background_mode', '=', array( 'background' ) )
						),
					),
					array(
						'id'       => 'body_background_pattern',
						'type'     => 'image_select',
						'title'    => esc_html__( 'Background Pattern', 'cortana' ),
						'subtitle' => esc_html__( 'Body background pattern(Apply for Boxed layout style)', 'cortana' ),
						'desc'     => '',
						'height'   => '40px',
						'options'  => array(
							'pattern-1.png' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/pattern-1.png' ),
							'pattern-2.png' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/pattern-2.png' ),
							'pattern-3.png' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/pattern-3.png' ),
							'pattern-4.png' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/pattern-4.png' ),
							'pattern-5.png' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/pattern-5.png' ),
							'pattern-6.png' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/pattern-6.png' ),
							'pattern-7.png' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/pattern-7.png' ),
							'pattern-8.png' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/pattern-8.png' ),
						),
						'default'  => 'pattern-1.png',
						'required' => array(
							array( 'layout_style', '=', array( 'boxed' ) ),
							array( 'body_background_mode', '=', array( 'pattern' ) )
						),
					),
				)
			);

			$this->sections[] = array(
				'title'      => esc_html__( 'Maintenance Mode', 'cortana' ),
				'desc'       => '',
				'subsection' => true,
				'icon'       => 'el-icon-eye-close',
				'fields'     => array(
					array(
						'id'       => 'enable_maintenance',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Enable Maintenance', 'cortana' ),
						'subtitle' => esc_html__( 'Enable the themes maintenance mode.', 'cortana' ),
						'desc'     => '',
						'options'  => array( '2' => 'On (Custom Page)', '1' => 'On (Standard)', '0' => 'Off', ),
						'default'  => '0'
					),
					array(
						'id'       => 'maintenance_mode_page',
						'type'     => 'select',
						'data'     => 'pages',
						'required' => array( 'enable_maintenance', '=', '2' ),
						'title'    => esc_html__( 'Custom Maintenance Mode Page', 'cortana' ),
						'subtitle' => esc_html__( 'Select the page that is your maintenace page, if you would like to show a custom page instead of the standard WordPress message. You should use the Holding Page template for this page.', 'cortana' ),
						'desc'     => '',
						'default'  => '',
						'args'     => array()
					),
				),
			);


			// Performance Options
			$this->sections[] = array(
				'title'      => esc_html__( 'Performance', 'cortana' ),
				'desc'       => '',
				'icon'       => 'el el-dashboard',
				'subsection' => true,
				'fields'     => array(
					array(
						'id'       => 'enable_minifile_js',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Enable Mini File JS', 'cortana' ),
						'subtitle' => esc_html__( 'Enable/Disable Mini File JS', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'On', '0' => 'Off' ),
						'default'  => '0'
					),
					array(
						'id'       => 'enable_minifile_css',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Enable Mini File CSS', 'cortana' ),
						'subtitle' => esc_html__( 'Enable/Disable Mini File CSS', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'On', '0' => 'Off' ),
						'default'  => '0'
					),
				)
			);

			// Custom Favicon
			$this->sections[] = array(
				'title'      => esc_html__( 'Custom Favicon', 'cortana' ),
				'desc'       => '',
				'icon'       => 'el el-eye-open',
				'subsection' => true,
				'fields'     => array(
					array(
						'id'       => 'custom_favicon',
						'type'     => 'media',
						'url'      => true,
						'title'    => esc_html__( 'Custom favicon', 'cortana' ),
						'subtitle' => esc_html__( 'Upload a 16px x 16px Png/Gif/ico image that will represent your website favicon', 'cortana' ),
						'desc'     => '',
						'default'  => array(
							'url' =>  get_template_directory_uri()  . '/assets/images/Cortana_Favicon.png'
						)
					),
					array(
						'id'       => 'custom_ios_title',
						'type'     => 'text',
						'title'    => esc_html__( 'Custom iOS Bookmark Title', 'cortana' ),
						'subtitle' => esc_html__( 'Enter a custom title for your site for when it is added as an iOS bookmark.', 'cortana' ),
						'desc'     => '',
						'default'  => ''
					),
					array(
						'id'       => 'custom_ios_icon57',
						'type'     => 'media',
						'url'      => true,
						'title'    => esc_html__( 'Custom iOS 57x57', 'cortana' ),
						'subtitle' => esc_html__( 'Upload a 57px x 57px Png image that will be your website bookmark on non-retina iOS devices.', 'cortana' ),
						'desc'     => ''
					),
					array(
						'id'       => 'custom_ios_icon72',
						'type'     => 'media',
						'url'      => true,
						'title'    => esc_html__( 'Custom iOS 72x72', 'cortana' ),
						'subtitle' => esc_html__( 'Upload a 72px x 72px Png image that will be your website bookmark on non-retina iOS devices.', 'cortana' ),
						'desc'     => ''
					),
					array(
						'id'       => 'custom_ios_icon114',
						'type'     => 'media',
						'url'      => true,
						'title'    => esc_html__( 'Custom iOS 114x114', 'cortana' ),
						'subtitle' => esc_html__( 'Upload a 114px x 114px Png image that will be your website bookmark on retina iOS devices.', 'cortana' ),
						'desc'     => ''
					),
					array(
						'id'       => 'custom_ios_icon144',
						'type'     => 'media',
						'url'      => true,
						'title'    => esc_html__( 'Custom iOS 144x144', 'cortana' ),
						'subtitle' => esc_html__( 'Upload a 144px x 144px Png image that will be your website bookmark on retina iOS devices.', 'cortana' ),
						'desc'     => ''
					),
				)
			);


			// 404
			$this->sections[] = array(
				'title'      => esc_html__( '404 Setting', 'cortana' ),
				'desc'       => '',
				'subsection' => true,
				'icon'       => 'el el-error',
				'fields'     => array(
					array(
						'id'       => 'page_404_bg_image',
						'type'     => 'media',
						'url'      => true,
						'title'    => esc_html__( 'Background page', 'cortana' ),
						'subtitle' => esc_html__( 'Upload your background image here.', 'cortana' ),
						'desc'     => '',
						'default'  => array(
							'url' => $page_404_bg_url
						)
					),
					array(
						'id'      => 'subtitle_404',
						'type'    => 'textarea',
						'title'   => esc_html__( 'Subtitle 404', 'cortana' ),
						'default' => '',
					),
					array(
						'id'       => 'copyright_404',
						'type'     => 'textarea',
						'title'    => esc_html__( 'Copyright', 'cortana' ),
						'subtitle' => esc_html__( 'Display copyright below page 404 footer', 'cortana' ),
						'default'  => 'Copyright 2015 Cortana  is proudly powered by  OSThemes'
					),

				)
			);


			// Page/Archive Setting
			$this->sections[] = array(
				'title'  => esc_html__( 'Page/Archive Setting', 'cortana' ),
				'desc'   => '',
				'icon'   => 'el el-th',
				'fields' => array(
					array(
						'id'     => 'section-page-start',
						'type'   => 'section',
						'title'  => esc_html__( 'Page Options', 'cortana' ),
						'indent' => true
					),

					array(
						'id'       => 'page_layout',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Layout', 'cortana' ),
						'subtitle' => esc_html__( 'Select Page Layout', 'cortana' ),
						'desc'     => '',
						'options'  => array( 'full' => 'Full Width', 'container' => 'Container', 'container-fluid' => 'Container Fluid' ),
						'default'  => 'container'
					),
							array(
									'id'       => 'page_sidebar',
									'type'     => 'image_select',
									'title'    => esc_html__( 'Sidebar', 'cortana' ),
									'subtitle' => esc_html__( 'Set Sidebar Style', 'cortana' ),
									'desc'     => '',
									'options'  => array(
											'none'  => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/sidebar-none.png' ),
											'left'  => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/sidebar-left.png' ),
											'right' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/sidebar-right.png' ),
											'both'  => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/sidebar-both.png' ),
									),
									'default'  => 'right'
							),
					array(
						'id'       => 'page_sidebar_width',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Sidebar Width', 'cortana' ),
						'subtitle' => esc_html__( 'Set Sidebar width', 'cortana' ),
						'desc'     => '',
						'options'  => array( 'small' => 'Small (1/4)', 'large' => 'Large (1/3)' ),
						'default'  => 'small',
						'required' => array( 'page_sidebar', '=', array( 'left', 'both', 'right' ) ),
					),


					array(
						'id'       => 'page_left_sidebar',
						'type'     => 'select',
						'title'    => esc_html__( 'Left Sidebar', 'cortana' ),
						'subtitle' => "Choose the default left sidebar",
						'data'     => 'sidebars',
						'desc'     => '',
						'default'  => 'sidebar-1',
						'required' => array( 'page_sidebar', '=', array( 'left', 'both' ) ),
					),
					array(
						'id'       => 'page_right_sidebar',
						'type'     => 'select',
						'title'    => esc_html__( 'Right Sidebar', 'cortana' ),
						'subtitle' => "Choose the default right sidebar",
						'data'     => 'sidebars',
						'desc'     => '',
						'default'  => 'sidebar-2',
						'required' => array( 'page_sidebar', '=', array( 'right', 'both' ) ),
					),

					array(
						'id'       => 'breadcrumbs_in_page_title',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Breadcrumbs', 'cortana' ),
						'subtitle' => esc_html__( 'Enable/Disable Breadcrumbs in Page Title', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'On', '0' => 'Off' ),
						'default'  => '1'
					),
					array(
						'id'       => 'breadcrumbs_position',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Breadcrumbs Positons', 'cortana' ),
						'subtitle' => esc_html__( 'Select Breadcrumbs Positons', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'Left', '0' => 'Right' ),
						'default'  => '1'
					),

					array(
						'id'       => 'show_page_title',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Show Page Title', 'cortana' ),
						'subtitle' => esc_html__( 'Enable/Disable Page Title', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'On', '0' => 'Off' ),
						'default'  => '1'
					),
					array(
						'id'       => 'page_title_height',
						'type'     => 'dimensions',
						'units'    => 'px',
						'width'    => false,
						'title'    => esc_html__( 'Page Title Height', 'cortana' ),
						'desc'     => esc_html__( 'You can set a height for the page title here', 'cortana' ),
						'required' => array( 'show_page_title', '=', array( '1' ) ),
						'default'  => array(
							'height' => '300'
						)
					),
					array(
						'id'       => 'page_title_bg_image',
						'type'     => 'media',
						'url'      => true,
						'title'    => esc_html__( 'Page Title Background', 'cortana' ),
						'subtitle' => esc_html__( 'Upload page title background.', 'cortana' ),
						'desc'     => '',
						'default'  => array(
							'url' => $page_title_bg_url
						)
					),
					array(
						'id'       => 'page_comment',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Page Comment', 'cortana' ),
						'subtitle' => esc_html__( 'Enable/Disable page comment', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'On', '0' => 'Off' ),
						'default'  => '1'
					),

					array(
						'id'     => 'section-page-end',
						'type'   => 'section',
						'indent' => false,
					),

					array(
						'id'     => 'section-archive-start',
						'type'   => 'section',
						'title'  => esc_html__( 'Archive Options', 'cortana' ),
						'indent' => true
					),

					array(
						'id'       => 'archive_layout',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Layout', 'cortana' ),
						'subtitle' => esc_html__( 'Select Archive Layout', 'cortana' ),
						'desc'     => '',
						'options'  => array( 'full' => 'Full Width', 'container' => 'Container', 'container-fluid' => 'Container Fluid' ),
						'default'  => 'container'
					),

					array(
						'id'       => 'archive_sidebar',
						'type'     => 'image_select',
						'title'    => esc_html__( 'Sidebar', 'cortana' ),
						'subtitle' => esc_html__( 'Set Sidebar Style', 'cortana' ),
						'desc'     => '',
						'options'  => array(
							'none'  => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/sidebar-none.png' ),
							'left'  => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/sidebar-left.png' ),
							'right' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/sidebar-right.png' ),
							'both'  => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/sidebar-both.png' ),
						),
						'default'  => 'right'
					),


					array(
						'id'       => 'archive_sidebar_width',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Sidebar Width', 'cortana' ),
						'subtitle' => esc_html__( 'Set Sidebar width', 'cortana' ),
						'desc'     => '',
						'options'  => array( 'small' => 'Small (1/4)', 'large' => 'Large (1/3)' ),
						'default'  => 'small',
						'required' => array( 'archive_sidebar', '=', array( 'left', 'both', 'right' ) ),
					),

					array(
						'id'       => 'archive_left_sidebar',
						'type'     => 'select',
						'title'    => esc_html__( 'Left Sidebar', 'cortana' ),
						'subtitle' => "Choose the default left sidebar",
						'data'     => 'sidebars',
						'desc'     => '',
						'default'  => 'sidebar-1',
						'required' => array( 'archive_sidebar', '=', array( 'left', 'both' ) ),
					),
					array(
						'id'       => 'archive_right_sidebar',
						'type'     => 'select',
						'title'    => esc_html__( 'Right Sidebar', 'cortana' ),
						'subtitle' => "Choose the default right sidebar",
						'data'     => 'sidebars',
						'desc'     => '',
						'default'  => 'sidebar-1',
						'required' => array( 'archive_sidebar', '=', array( 'right', 'both' ) ),
					),
					array(
						'id'       => 'archive_paging_style',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Paging Style', 'cortana' ),
						'subtitle' => esc_html__( 'Select archive paging style', 'cortana' ),
						'desc'     => '',
						'options'  => array( 'default' => 'Default', 'load-more' => 'Load More', 'infinity-scroll' => 'Infinity Scroll' ),
						'default'  => 'default'
					),
					array(
						'id'       => 'breadcrumbs_in_archive_title',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Breadcrumbs', 'cortana' ),
						'subtitle' => esc_html__( 'Enable/Disable Breadcrumbs in Archive Title', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'On', '0' => 'Off' ),
						'default'  => '1'
					),

					array(
						'id'       => 'show_archive_title',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Show Archive Title', 'cortana' ),
						'subtitle' => esc_html__( 'Enable/Disable Archive Title', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'On', '0' => 'Off' ),
						'default'  => '1'
					),
					array(
						'id'       => 'archive_title_height',
						'type'     => 'dimensions',
						'title'    => esc_html__( 'Archive Title Height', 'cortana' ),
						'desc'     => esc_html__( 'You can set a height for the archive title here', 'cortana' ),
						'required' => array( 'show_archive_title', '=', array( '1' ) ),
						'units'    => 'px',
						'width'    => false,
						'default'  => array(
							'height' => '300'
						)
					),

					array(
						'id'       => 'archive_title_bg_image',
						'type'     => 'media',
						'url'      => true,
						'title'    => esc_html__( 'Archive Title Background', 'cortana' ),
						'subtitle' => esc_html__( 'Upload archive title background.', 'cortana' ),
						'desc'     => '',
						'default'  => array(
							'url' => $archive_title_bg_url
						)
					),


					array(
						'id'     => 'section-archive-end',
						'type'   => 'section',
						'indent' => false,
					),

					array(
						'id'     => 'section-single-blog-start',
						'type'   => 'section',
						'title'  => esc_html__( 'Single Blog Options', 'cortana' ),
						'indent' => true
					),

					array(
						'id'       => 'single_blog_layout',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Layout', 'cortana' ),
						'subtitle' => esc_html__( 'Select Single Blog Layout', 'cortana' ),
						'desc'     => '',
						'options'  => array( 'full' => 'Full Width', 'container' => 'Container', 'container-fluid' => 'Container Fluid' ),
						'default'  => 'container'
					),

					array(
						'id'       => 'single_blog_sidebar',
						'type'     => 'image_select',
						'title'    => esc_html__( 'Sidebar', 'cortana' ),
						'subtitle' => esc_html__( 'Set Sidebar Style', 'cortana' ),
						'desc'     => '',
						'options'  => array(
							'none'  => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/sidebar-none.png' ),
							'left'  => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/sidebar-left.png' ),
							'right' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/sidebar-right.png' ),
							'both'  => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/sidebar-both.png' ),
						),
						'default'  => 'left'
					),

					array(
						'id'       => 'single_blog_sidebar_width',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Sidebar Width', 'cortana' ),
						'subtitle' => esc_html__( 'Set Sidebar width', 'cortana' ),
						'desc'     => '',
						'options'  => array( 'small' => 'Small (1/4)', 'large' => 'Large (1/3)' ),
						'default'  => 'small',
						'required' => array( 'single_blog_sidebar', '=', array( 'left', 'both', 'right' ) ),
					),


					array(
						'id'       => 'single_blog_left_sidebar',
						'type'     => 'select',
						'title'    => esc_html__( 'Left Sidebar', 'cortana' ),
						'subtitle' => "Choose the default left sidebar",
						'data'     => 'sidebars',
						'desc'     => '',
						'default'  => 'sidebar-1',
						'required' => array( 'single_blog_sidebar', '=', array( 'left', 'both' ) ),
					),

					array(
						'id'       => 'single_blog_right_sidebar',
						'type'     => 'select',
						'title'    => esc_html__( 'Right Sidebar', 'cortana' ),
						'subtitle' => "Choose the default right sidebar",
						'data'     => 'sidebars',
						'desc'     => '',
						'default'  => 'sidebar-2',
						'required' => array( 'single_blog_sidebar', '=', array( 'right', 'both' ) ),
					),


					array(
						'id'       => 'show_single_blog_title',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Show Single Blog Title', 'cortana' ),
						'subtitle' => esc_html__( 'Enable/Disable Single Blog Title', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'On', '0' => 'Off' ),
						'default'  => '1'
					),

					array(
						'id'       => 'breadcrumbs_in_single_blog_title',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Breadcrumbs', 'cortana' ),
						'subtitle' => esc_html__( 'Enable/Disable Breadcrumbs in Single Blog Title', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'On', '0' => 'Off' ),
						'default'  => '1'
					),

					array(
						'id'       => 'single_blog_title_height',
						'type'     => 'dimensions',
						'title'    => esc_html__( 'Single Blog Title Height', 'cortana' ),
						'desc'     => esc_html__( 'You can set a height for the single blog title here', 'cortana' ),
						'required' => array( 'show_single_blog_title', '=', array( '1' ) ),
						'units'    => 'px',
						'width'    => false,
						'default'  => array(
							'height' => '300'
						)
					),

					array(
						'id'       => 'single_blog_title_bg_image',
						'type'     => 'media',
						'url'      => true,
						'title'    => esc_html__( 'Single Blog Title Background', 'cortana' ),
						'subtitle' => esc_html__( 'Upload single blog title background.', 'cortana' ),
						'desc'     => '',
						'default'  => array(
							'url' => $archive_title_bg_url
						)
					),
					array(
						'id'     => 'section-single-blog-end',
						'type'   => 'section',
						'indent' => false,
					),
				)
			);

			// Logo
			$this->sections[] = array(
				'title'  => esc_html__( 'Logo', 'cortana' ),
				'desc'   => '',
				'icon'   => 'el el-leaf',
				'fields' => array(
					array(
						'id'       => 'logo',
						'type'     => 'media',
						'url'      => true,
						'title'    => esc_html__( 'Logo', 'cortana' ),
						'subtitle' => esc_html__( 'Upload your logo here.', 'cortana' ),
						'desc'     => '',
						'default'  => array(
							'url' =>  get_template_directory_uri()  . '/assets/images/theme-options/logo-dark.png'
						)
					),
					array(
						'id'       => 'light_logo',
						'type'     => 'media',
						'url'      => false,
						'title'    => esc_html__( 'Light Logo', 'cortana' ),
						'subtitle' => esc_html__( 'Upload a light version of your logo here', 'cortana' ),
						'desc'     => '',
						'default'  => array(
							'url' =>  get_template_directory_uri()  . '/assets/images/theme-options/logo-light.png'
						)
					),
					array(
						'id'       => 'dark_logo',
						'type'     => 'media',
						'url'      => false,
						'title'    => esc_html__( 'Dark Logo', 'cortana' ),
						'subtitle' => esc_html__( 'Upload a dark version of your logo here', 'cortana' ),
						'desc'     => '',
						'default'  => array(
							'url' =>  get_template_directory_uri()  . '/assets/images/theme-options/logo-dark.png'
						)
					),
					array(
						'id'      => 'logo_max_height',
						'type'    => 'dimensions',
						'title'   => esc_html__( 'Logo Max Height', 'cortana' ),
						'desc'    => esc_html__( 'You can set a max height for the logo here', 'cortana' ),
						'units'   => 'px',
						'width'   => false,
						'default' => array(
							'Height' => '80'
						)
					),

					array(
						'id'       => 'logo_padding',
						'type'     => 'text',
						'title'    => esc_html__( 'Logo Top/Bottom Padding', 'cortana' ),
						'subtitle' => esc_html__( 'This must be numeric (no px). Leave balnk for default.', 'cortana' ),
						'desc'     => esc_html__( 'If you would like to override the default logo top/bottom padding, then you can do so here.', 'cortana' ),
						'validate' => 'numeric',
						'default'  => '0',
					),
				)
			);

			// Header
			/* @todo: Config option header */
			$this->sections[] = array(
				'title'  => esc_html__( 'Header', 'cortana' ),
				'desc'   => '',
				'icon'   => 'el el-credit-card',
				'fields' => array(
//					Top drawer Setting
					array(
						'id'     => 'section-header-start',
						'type'   => 'section',
						'title'  => esc_html__( 'Top Drawer Setting', 'cortana' ),
						'indent' => true
					),
					array(
						'id'       => 'top_drawer_type',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Top Drawer Type', 'cortana' ),
						'subtitle' => esc_html__( 'Set top drawer type.', 'cortana' ),
						'desc'     => '',
						'options'  => array( 'none' => 'Disable', 'show' => 'Always Show', 'toggle' => 'Toggle' ),
						'default'  => 'none'
					),
					array(
						'id'       => 'top_drawer_sidebar',
						'type'     => 'select',
						'title'    => esc_html__( 'Top Drawer Sidebar', 'cortana' ),
						'subtitle' => "Choose the default top drawer sidebar",
						'data'     => 'sidebars',
						'desc'     => '',
						'default'  => 'top_drawer_sidebar',
						'required' => array( 'top_drawer_type', '=', array( 'show', 'toggle' ) ),
					),
					array(
						'id'       => 'top_drawer_layout',
						'type'     => 'image_select',
						'title'    => esc_html__( 'Top Drawer Layout', 'cortana' ),
						'subtitle' => esc_html__( 'Select the top drawer column layout.', 'cortana' ),
						'desc'     => '',
						'options'  => array(
							'top-drawer-1' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/footer-layout-1.jpg' ),
							'top-drawer-2' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/footer-layout-2.jpg' ),
							'top-drawer-3' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/footer-layout-3.jpg' ),
							'top-drawer-4' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/footer-layout-4.jpg' ),
							'top-drawer-5' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/footer-layout-5.jpg' ),
							'top-drawer-6' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/footer-layout-6.jpg' ),
							'top-drawer-7' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/footer-layout-7.jpg' ),
							'top-drawer-8' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/footer-layout-8.jpg' ),
							'top-drawer-9' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/footer-layout-9.jpg' ),
						),
						'default'  => 'top-drawer-9',
						'required' => array( 'top_drawer_type', '=', array( 'show', 'toggle' ) ),
					),
					array(
						'id'       => 'top_drawer_wrapper_layout',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Top Drawer Wrapper Layout', 'cortana' ),
						'subtitle' => esc_html__( 'Select top drawer wrapper layout', 'cortana' ),
						'desc'     => '',
						'options'  => array( 'full' => 'Full Width', 'container' => 'Container', 'container-fluid' => 'Container Fluid' ),
						'default'  => 'container',
						'required' => array( 'top_drawer_type', '=', array( 'show', 'toggle' ) ),
					),
//					Top bar setting
					array(
						'id'     => 'section-top-bar',
						'type'   => 'section',
						'title'  => esc_html__( 'Top bar Setting', 'cortana' ),
						'indent' => true
					),
					array(
						'id'       => 'top_bar',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Show/Hide Top Bar', 'cortana' ),
						'subtitle' => esc_html__( 'Show Hide Top Bar.', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'On', '0' => 'Off' ),
						'default'  => '0',
					),

					array(
						'id'       => 'top_bar_layout',
						'type'     => 'image_select',
						'title'    => esc_html__( 'Top bar Layout', 'cortana' ),
						'subtitle' => esc_html__( 'Select the top bar column layout.', 'cortana' ),
						'desc'     => '',
						'options'  => array(
							'top-bar-1' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/top-bar-layout-1.jpg' ),
							'top-bar-2' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/top-bar-layout-2.jpg' ),
							'top-bar-3' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/top-bar-layout-3.jpg' ),
							'top-bar-4' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/top-bar-layout-4.jpg' ),
						),
						'default'  => 'top-bar-1',
						'required' => array( 'top_bar', '=', '1' ),
					),

					array(
						'id'       => 'top_bar_left_sidebar',
						'type'     => 'select',
						'title'    => esc_html__( 'Top Left Sidebar', 'cortana' ),
						'subtitle' => "Choose the default top left sidebar",
						'data'     => 'sidebars',
						'desc'     => '',
						'default'  => 'top_bar_left',
						'required' => array( 'top_bar', '=', '1' ),
					),
					array(
						'id'       => 'top_bar_right_sidebar',
						'type'     => 'select',
						'title'    => esc_html__( 'Top Right Sidebar', 'cortana' ),
						'subtitle' => "Choose the default top right sidebar",
						'data'     => 'sidebars',
						'desc'     => '',
						'default'  => 'top_bar_right',
						'required' => array( 'top_bar', '=', '1' ),
					),
//					Header layout setting
					array(
						'id'     => 'section-header-layout',
						'type'   => 'section',
						'title'  => esc_html__( 'Header layout setting', 'cortana' ),
						'indent' => true
					),
					array(
						'id'       => 'header_layout_style',
						'type'     => 'image_select',
						'title'    => esc_html__( 'Header Layout Style', 'cortana' ),
						'subtitle' => esc_html__( 'Select the header layout style', 'cortana' ),
						'desc'     => '',
						'options'  => array(
							'boxed' => array( 'title' => 'Boxed', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/layout-boxed.png' ),
							'wide'  => array( 'title' => 'Wide', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/layout-wide.png' )
						),
						'default'  => 'wide'
					),
					array(
						'id'       => 'header_layout',
						'type'     => 'image_select',
						'title'    => esc_html__( 'Header Layout', 'cortana' ),
						'subtitle' => esc_html__( 'Select a header layout option from the examples.', 'cortana' ),
						'desc'     => '',
						'options'  => array(
							'header-1' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/header-1.jpg' ),
							'header-2' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/header-2.jpg' ),
							'header-3' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/header-3.jpg' ),
						),
						'default'  => 'header-1'
					),
					array(
						'id'       => 'header_positon',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Header Position', 'cortana' ),
						'subtitle' => esc_html__( 'Set header position.', 'cortana' ),
						'desc'     => '',
						'options'  => array( '0' => 'Default', '1' => 'Overlay' ),
						'default'  => '0',
					),
					array(
						'id'      => 'header_margin_top',
						'type'    => 'dimensions',
						'title'   => esc_html__( 'Header Margin top', 'cortana' ),
						'desc'    => esc_html__( 'You can set a margin top for the header here', 'cortana' ),
						'units'   => 'px',
						'width'   => false,
						'default' => array(
							'height' => '0'
						)
					),
//					Menu setting
					array(
						'id'     => 'section-menu-setting',
						'type'   => 'section',
						'title'  => esc_html__( 'Header Menu setting', 'cortana' ),
						'indent' => true
					),
					array(
						'id'       => 'main_menu_after_customize',
						'type'     => 'ace_editor',
						'mode'     => 'html',
						'theme'    => 'monokai',
						'title'    => esc_html__( 'Custom text for primary menu', 'cortana' ),
						'subtitle' => esc_html__( 'Add Content for primary menu after (header 3)', 'cortana' ),
						'desc'     => '',
						'default'  => '<ul class="header-custom-text">
	<li>
		<i class="fa fa-clock-o"></i>
		<p>
			Mon - Sat: 9:00 - 18:00
			<span>Sunday CLOSED</span>
		</p>
	</li>
	<li>
		<i class="fa fa-map-marker"></i>
		<p>
			1422 1st St. Santa Rosa
			<span>CA 94559. United States</span>
		</p>
	</li>
	<li>
		<i class="fa fa-phone"></i>
		<p>
			(123) 45678910
			<span>info@osthemes.com</span>
		</p>
	</li>
</ul>',
						'options'  => array( 'minLines' => 4, 'maxLines' => 60 ),
					),
//					Menu setting
					array(
						'id'     => 'section-header-customize',
						'type'   => 'section',
						'title'  => esc_html__( 'Header Customize setting', 'cortana' ),
						'indent' => true
					),
					array(
						'id'      => 'header_customize',
						'type'    => 'sorter',
						'title'   => 'Header customize',
						'desc'    => 'Organize how you want the layout to appear on the header',
						'options' => array(
							'enabled'  => array(
								'search'        => 'Search Box',
								'shopping-cart' => 'Shopping Cart',
							),
							'disabled' => array(
								'custom-text' => 'Custom Text',
								'get-a-quote' => 'Get a quote',
							)
						)
					),

					array(
						'id'       => 'header_customize_text',
						'type'     => 'ace_editor',
						'mode'     => 'html',
						'theme'    => 'monokai',
						'title'    => esc_html__( 'Custom Text Content', 'cortana' ),
						'subtitle' => esc_html__( 'Add Content for Custom Text', 'cortana' ),
						'desc'     => '',
						'default'  => '',
						'options'  => array( 'minLines' => 8, 'maxLines' => 60 ),
					),

					array(
						'id'       => 'header_sticky',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Show/Hide Header Sticky', 'cortana' ),
						'subtitle' => esc_html__( 'Show Hide header Sticky.', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'On', '0' => 'Off' ),
						'default'  => '1'
					),
					array(
						'id'       => 'header_sticky_border',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Show/Hide Header Sticky border bottom', 'cortana' ),
						'subtitle' => esc_html__( 'Show/Hide Header Sticky border bottom', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'Show', '0' => 'Hide' ),
						'default'  => '0',
						'required' => array( 'header_sticky', '=', '1' ),
					),
					array(
						'id'       => 'header_shopping_cart_button',
						'type'     => 'checkbox',
						'title'    => esc_html__( 'Shopping Cart Button', 'cortana' ),
						'subtitle' => esc_html__( 'Select header shopping cart button', 'cortana' ),
						'options'  => array(
							'view-cart' => 'View Cart',
							'checkout'  => 'Checkout',
						),
						'default'  => array(
							'view-cart' => '1',
							'checkout'  => '1',
						),
						//'required' => array( 'header_shopping_cart', '=', '1' ),
					),

					array(
						'id'       => 'search_box_type',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Search Box Type', 'cortana' ),
						'subtitle' => esc_html__( 'Select search box type.', 'cortana' ),
						'desc'     => '',
						'options'  => array( 'standard' => esc_html__( 'Standard', 'cortana' ), 'ajax' => esc_html__( 'Ajax Search', 'cortana' ) ),
						'default'  => 'standard'
					),

					array(
						'id'       => 'search_box_post_type',
						'type'     => 'checkbox',
						'title'    => esc_html__( 'Post type for Ajax Search', 'cortana' ),
						'subtitle' => esc_html__( 'Select post type for ajax search', 'cortana' ),
						'options'  => array(
							'post'      => 'Post',
							'page'      => 'Page',
							'product'   => 'Product',
							'portfolio' => 'Portfolio',
							'services'  => 'Our Services',
						),
						'default'  => array(
							'post'      => '1',
							'page'      => '1',
							'product'   => '1',
							'portfolio' => '1',
							'services'  => '1',
						),
						'required' => array( 'search_box_type', '=', 'ajax' ),
					),

					array(
						'id'       => 'search_box_result_amount',
						'type'     => 'text',
						'title'    => esc_html__( 'Amount Of Search Result', 'cortana' ),
						'subtitle' => esc_html__( 'This must be numeric (no px) or empty (default: 8).', 'cortana' ),
						'desc'     => esc_html__( 'Set mount of Search Result', 'cortana' ),
						'validate' => 'numeric',
						'default'  => '',
						'required' => array( 'search_box_type', '=', 'ajax' ),
					),
				)
			);
			//Mobile Header
			$this->sections[] = array(
				'title'  => esc_html__( 'Mobile Header', 'cortana' ),
				'desc'   => '',
				'icon'   => 'el el-th-list',
				'fields' => array(
					array(
						'id'       => 'mobile_header_layout',
						'type'     => 'image_select',
						'title'    => esc_html__( 'Header Layout', 'cortana' ),
						'subtitle' => esc_html__( 'Select header mobile layout', 'cortana' ),
						'desc'     => '',
						'options'  => array(
							'header-mobile-1' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/header-mobile-layout-1.png' ),
							'header-mobile-2' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/header-mobile-layout-2.png' ),
							'header-mobile-3' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/header-mobile-layout-3.png' ),

						),
						'default'  => 'header-mobile-1'
					),

					array(
						'id'       => 'mobile_header_menu_drop',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Menu Drop Type', 'cortana' ),
						'subtitle' => esc_html__( 'Set menu drop type for mobile header', 'cortana' ),
						'desc'     => '',
						'options'  => array(
							'dropdown' => esc_html__( 'Dropdown Menu', 'cortana' ),
							'fly'      => esc_html__( 'Fly Menu', 'cortana' )
						),
						'default'  => 'fly'
					),

					array(
						'id'       => 'mobile_header_logo',
						'type'     => 'media',
						'url'      => true,
						'title'    => esc_html__( 'Mobile Logo', 'cortana' ),
						'subtitle' => esc_html__( 'Upload your logo here.', 'cortana' ),
						'desc'     => '',
						'default'  => array(
							'url' =>  get_template_directory_uri()  . '/assets/images/theme-options/logo-dark.png'
						)
					),

					array(
						'id'      => 'logo_mobile_max_height',
						'type'    => 'dimensions',
						'title'   => esc_html__( 'Logo Mobile Max Height', 'cortana' ),
						'desc'    => esc_html__( 'You can set a max height for the logo mobile here', 'cortana' ),
						'units'   => 'px',
						'width'   => false,
						'default' => array(
							'height' => ''
						)
					),

					array(
						'id'      => 'logo_mobile_padding',
						'type'    => 'dimensions',
						'title'   => esc_html__( 'Logo Top/Bottom Padding', 'cortana' ),
						'desc'    => esc_html__( 'If you would like to override the default logo top/bottom padding, then you can do so here', 'cortana' ),
						'units'   => 'px',
						'width'   => false,
						'default' => array(
							'height' => ''
						)
					),

					array(
						'id'       => 'mobile_header_top_bar',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Top Bar', 'cortana' ),
						'subtitle' => esc_html__( 'Enable Top bar.', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'On', '0' => 'Off' ),
						'default'  => '0'
					),
					array(
						'id'       => 'mobile_header_stick',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Stick Mobile Header', 'cortana' ),
						'subtitle' => esc_html__( 'Enable Stick Mobile Header.', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'On', '0' => 'Off' ),
						'default'  => '1'
					),
					array(
						'id'       => 'mobile_header_search_box',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Search Box', 'cortana' ),
						'subtitle' => esc_html__( 'Enable Search Box.', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'On', '0' => 'Off' ),
						'default'  => '1'
					),
					array(
						'id'       => 'mobile_header_shopping_cart',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Shopping Cart', 'cortana' ),
						'subtitle' => esc_html__( 'Enable Shopping Cart', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'On', '0' => 'Off' ),
						'default'  => '1'
					),
				)
			);

			$this->sections[] = array(
				'title'  => esc_html__( 'Footer', 'cortana' ),
				'desc'   => '',
				'icon'   => 'el el-website',
				'fields' => array(
					array(
						'id'       => 'footer_layout',
						'type'     => 'image_select',
						'title'    => esc_html__( 'Footer Layout', 'cortana' ),
						'subtitle' => esc_html__( 'Select the footer column layout.', 'cortana' ),
						'desc'     => '',
						'options'  => array(
							'footer-1' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/footer-layout-1.jpg' ),
							'footer-2' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/footer-layout-2.jpg' ),
							'footer-3' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/footer-layout-3.jpg' ),
							'footer-4' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/footer-layout-4.jpg' ),
							'footer-5' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/footer-layout-5.jpg' ),
							'footer-6' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/footer-layout-6.jpg' ),
							'footer-7' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/footer-layout-7.jpg' ),
							'footer-8' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/footer-layout-8.jpg' ),
							'footer-9' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/footer-layout-9.jpg' ),
						),
						'default'  => 'footer-1'
					),

					array(
						'id'       => 'footer_bg_image',
						'type'     => 'media',
						'url'      => false,
						'title'    => esc_html__( 'Footer background image', 'cortana' ),
						'subtitle' => esc_html__( 'Upload footer background image here', 'cortana' ),
						'desc'     => '',
						'default'  => array(
							'url' =>  get_template_directory_uri()  . '/assets/images/theme-options/bg-footer.jpg'
						)
					),

					array(
						'id'       => 'footer_parallax',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Footer Parallax', 'cortana' ),
						'subtitle' => esc_html__( 'Enable Footer Parallax', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'On', '0' => 'Off' ),
						'default'  => '0'
					),

					array(
						'id'       => 'footer_above_layout',
						'type'     => 'select',
						'title'    => esc_html__( 'Footer above layout', 'cortana' ),
						'subtitle' => esc_html__( 'Select footer above layout', 'cortana' ),
						'desc'     => '',
						'options'  => array(
							'col-md-12'              => esc_html__( 'Large (full)', 'cortana' ),
							'col-md-6 col-md-push-3' => esc_html__( 'Medium (1/2)', 'cortana' ),
							'col-md-4 col-md-push-4' => esc_html__( 'Small (1/3)', 'cortana' )
						),
						'default'  => 'col-md-6 col-md-push-3'
					),


					array(
						'id'       => 'collapse_footer',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Collapse footer on mobile device', 'cortana' ),
						'subtitle' => esc_html__( 'Enable collapse footer', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'On', '0' => 'Off' ),
						'default'  => '0'
					),
					array(
						'id'       => 'bottom_bar',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Bottom Bar', 'cortana' ),
						'subtitle' => esc_html__( 'Enable Bottom Bar (below Footer)', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'On', '0' => 'Off' ),
						'default'  => '1'
					),

					array(
						'id'       => 'bottom_bar_layout',
						'type'     => 'image_select',
						'title'    => esc_html__( 'Bottom bar Layout', 'cortana' ),
						'subtitle' => esc_html__( 'Select the bottom bar column layout.', 'cortana' ),
						'desc'     => '',
						'options'  => array(
							'bottom-bar-1' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/bottom-bar-layout-1.jpg' ),
							'bottom-bar-2' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/bottom-bar-layout-2.jpg' ),
							'bottom-bar-3' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/bottom-bar-layout-3.jpg' ),
							'bottom-bar-4' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/bottom-bar-layout-4.jpg' ),
						),
						'default'  => 'bottom-bar-1',
						'required' => array( 'bottom_bar', '=', '1' ),
					),

					array(
						'id'       => 'bottom_bar_left_sidebar',
						'type'     => 'select',
						'title'    => esc_html__( 'Bottom Left Sidebar', 'cortana' ),
						'subtitle' => "Choose the default bottom left sidebar",
						'data'     => 'sidebars',
						'desc'     => '',
						'default'  => 'bottom_bar_left',
						'required' => array( 'bottom_bar', '=', '1' ),
					),
					array(
						'id'       => 'bottom_bar_right_sidebar',
						'type'     => 'select',
						'title'    => esc_html__( 'Bottom Right Sidebar', 'cortana' ),
						'subtitle' => "Choose the default bottom right sidebar",
						'data'     => 'sidebars',
						'desc'     => '',
						'default'  => 'bottom_bar_right',
						'required' => array( 'bottom_bar', '=', '1' ),
					),


				)
			);
			//Styling Options
			$this->sections[] = array(
				'title'  => esc_html__( 'Styling Options', 'cortana' ),
				'desc'   => esc_html__( 'If you change value in this section, you must "Save & Generate CSS"', 'cortana' ),
				'icon'   => 'el el-magic',
				'fields' => array(
					array(
						'id'       => 'primary_color',
						'type'     => 'color',
						'title'    => esc_html__( 'Primary Color', 'cortana' ),
						'subtitle' => esc_html__( 'Set Primary Color', 'cortana' ),
						'default'  => '#FFBF00',
						'validate' => 'color',
					),

					array(
						'id'       => 'secondary_color',
						'type'     => 'color',
						'title'    => esc_html__( 'Secondary Color', 'cortana' ),
						'subtitle' => esc_html__( 'Set Secondary Color', 'cortana' ),
						'default'  => '#222222',
						'validate' => 'color',
					),
					array(
						'id'       => 'header_bg',
						'type'     => 'color_rgba',
						'title'    => esc_html__( 'Header background color', 'cortana' ),
						'subtitle' => esc_html__( 'Set header background color.', 'cortana' ),
						'default'  => array(
							'color' => '#111',
							'alpha' => '1'
						),
						'mode'     => 'background',
						'validate' => 'colorrgba',
					),
					array(
						'id'       => 'header_border_color',
						'type'     => 'color_rgba',
						'title'    => esc_html__( 'Header Border Color', 'cortana' ),
						'subtitle' => esc_html__( 'Set Header Border Color.', 'cortana' ),
						'default'  => array(
							'color' => '#eee',
							'alpha' => '1'
						),
						'validate' => 'colorrgba',
					),
					array(
						'id'       => 'top_drawer_bg_color',
						'type'     => 'color',
						'title'    => esc_html__( 'Top drawer background color', 'cortana' ),
						'subtitle' => esc_html__( 'Set Top drawer background color.', 'cortana' ),
						'default'  => '#2f2f2f',
						'validate' => 'color',
					),

					array(
						'id'       => 'top_drawer_text_color',
						'type'     => 'color',
						'title'    => esc_html__( 'Top drawer text color', 'cortana' ),
						'subtitle' => esc_html__( 'Pick a text color for the Top drawer', 'cortana' ),
						'default'  => '#c5c5c5',
						'validate' => 'color',
					),

					array(
						'id'       => 'top_bar_bg_color',
						'type'     => 'color_rgba',
						'title'    => esc_html__( 'Top Bar background color', 'cortana' ),
						'subtitle' => esc_html__( 'Set Top Bar background color.', 'cortana' ),
						'default'  => array(
							'color' => '#F8F8F8',
							'alpha' => '1'
						),
						'mode'     => 'background',
						'validate' => 'colorrgba',
					),

					array(
						'id'       => 'top_bar_text_color',
						'type'     => 'color',
						'title'    => esc_html__( 'Top Bar text color', 'cortana' ),
						'subtitle' => esc_html__( 'Pick a text color for the Top Bar', 'cortana' ),
						'default'  => '#222',
						'validate' => 'color',
					),
					array(
						'id'       => 'top_bar_border_color',
						'type'     => 'color',
						'title'    => esc_html__( 'Top Bar border text color', 'cortana' ),
						'subtitle' => esc_html__( 'Pick a text border color for the Top Bar', 'cortana' ),
						'default'  => '#eee',
						'validate' => 'color',
					),

					array(
						'id'       => 'text_color',
						'type'     => 'color',
						'title'    => esc_html__( 'Text Color', 'cortana' ),
						'subtitle' => esc_html__( 'Set Text Color.', 'cortana' ),
						'default'  => '#8f8f8f',
						'validate' => 'color',
					),

					array(
						'id'       => 'bold_color',
						'type'     => 'color',
						'title'    => esc_html__( 'Bolder Color', 'cortana' ),
						'subtitle' => esc_html__( 'Set Bolder Color.', 'cortana' ),
						'default'  => '#222222',
						'validate' => 'color',
					),

					array(
						'id'       => 'border_color',
						'type'     => 'color_rgba',
						'title'    => esc_html__( 'Border color', 'cortana' ),
						'subtitle' => esc_html__( 'Set Border color.', 'cortana' ),
						'default'  => array(
							'color' => '#eee',
							'alpha' => '1'
						),
						'mode'     => 'background',
						'validate' => 'colorrgba',
					),

					array(
						'id'       => 'heading_color',
						'type'     => 'color',
						'title'    => esc_html__( 'Heading Color', 'cortana' ),
						'subtitle' => esc_html__( 'Set Heading Color.', 'cortana' ),
						'default'  => '#222222',
						'validate' => 'color',
					),

					array(
						'id'       => 'footer_bg_color',
						'type'     => 'color',
						'title'    => esc_html__( 'Footer Background Color', 'cortana' ),
						'subtitle' => esc_html__( 'Set Footer Background Color.', 'cortana' ),
						'default'  => '#2F2F2F',
						'validate' => 'color',
					),

					array(
						'id'       => 'footer_text_color',
						'type'     => 'color',
						'title'    => esc_html__( 'Footer Text Color', 'cortana' ),
						'subtitle' => esc_html__( 'Set Footer Text Color.', 'cortana' ),
						'default'  => '#8f8f8f',
						'validate' => 'color',
					),

					array(
						'id'       => 'footer_heading_text_color',
						'type'     => 'color',
						'title'    => esc_html__( 'Footer Heading Text Color', 'cortana' ),
						'subtitle' => esc_html__( 'Set Footer Heading Text Color.', 'cortana' ),
						'default'  => '#FFFFFF',
						'validate' => 'color',
					),

					array(
						'id'       => 'bottom_bar_bg_color',
						'type'     => 'color',
						'title'    => esc_html__( 'Bottom Bar Background Color', 'cortana' ),
						'subtitle' => esc_html__( 'Set Bottom Bar Background Color.', 'cortana' ),
						'default'  => '#191919',
						'validate' => 'color',
					),

					array(
						'id'       => 'bottom_bar_text_color',
						'type'     => 'color',
						'title'    => esc_html__( 'Bottom Bar Text Color', 'cortana' ),
						'subtitle' => esc_html__( 'Set Bottom Bar Text Color.', 'cortana' ),
						'default'  => '#828282',
						'validate' => 'color',
					),

					array(
						'id'       => 'link_color',
						'type'     => 'link_color',
						'title'    => esc_html__( 'Link Color', 'cortana' ),
						'subtitle' => esc_html__( 'Link Color.', 'cortana' ),
						'default'  => array(
							'regular' => '#ffb600', // blue
							'hover'   => '#ffb600', // red
							'active'  => '#ffb600',  // purple
						),
					),

					array(
						'id'   => 'styling-color-divide-0',
						'type' => 'divide'
					),

					array(
						'id'       => 'menu_text_color',
						'type'     => 'color',
						'title'    => esc_html__( 'Menu Text Color', 'cortana' ),
						'subtitle' => esc_html__( 'Set Menu Text Color.', 'cortana' ),
						'default'  => '#fff',
						'validate' => 'color',
					),
					array(
						'id'       => 'menu_bg_color',
						'type'     => 'color',
						'title'    => esc_html__( 'Menu Background Color', 'cortana' ),
						'subtitle' => esc_html__( 'Set Menu Background Color.', 'cortana' ),
						'default'  => '#111111',
						'validate' => 'color',
					),
					array(
						'id'       => 'menu_sub_bg_color',
						'type'     => 'color',
						'title'    => esc_html__( 'Sub Menu Background Color', 'cortana' ),
						'subtitle' => esc_html__( 'Set Sub Menu Background Color.', 'cortana' ),
						'default'  => '#111111',
						'validate' => 'color',
					),
					array(
						'id'       => 'menu_sub_bg_hover_color',
						'type'     => 'color',
						'title'    => esc_html__( 'Sub Menu Background Hover Color', 'cortana' ),
						'subtitle' => esc_html__( 'Set Sub Menu Background Hover Color.', 'cortana' ),
						'default'  => '#222222',
						'validate' => 'color',
					),
					array(
						'id'       => 'menu_sub_text_color',
						'type'     => 'color',
						'title'    => esc_html__( 'Sub Menu Text Color', 'cortana' ),
						'subtitle' => esc_html__( 'Set Sub Menu Text Color.', 'cortana' ),
						'default'  => '#AAAAAA',
						'validate' => 'color',
					),


					array(
						'id'   => 'styling-color-divide-1',
						'type' => 'divide'
					),

					array(
						'id'       => 'page_title_text_color',
						'type'     => 'color',
						'title'    => esc_html__( 'Page Title Text Color', 'cortana' ),
						'subtitle' => esc_html__( 'Pick a text color for page title.', 'cortana' ),
						'default'  => '#FFFFFF',
						'validate' => 'color',
					),
					array(
						'id'       => 'page_title_bg_color',
						'type'     => 'color',
						'title'    => esc_html__( 'Page Title Background Color', 'cortana' ),
						'subtitle' => esc_html__( 'Pick a background color for page title.', 'cortana' ),
						'default'  => '#2a2a2a',
						'validate' => 'color',
					),
					array(
						'id'       => 'page_title_overlay_color',
						'type'     => 'color',
						'title'    => esc_html__( 'Page Title Background Overlay Color', 'cortana' ),
						'subtitle' => esc_html__( 'Pick a background overlay color for page title.', 'cortana' ),
						'default'  => '#000',
						'validate' => 'color',
					),

					array(
						'id'       => 'page_title_overlay_opacity',
						'type'     => 'slider',
						'title'    => esc_html__( 'Page Title Background Overlay Opacity', 'cortana' ),
						'subtitle' => esc_html__( 'Set the opacity level of the overlay.', 'cortana' ),
						'default'  => '50',
						"min"      => 0,
						"step"     => 1,
						"max"      => 100
					),

				)
			);
			// Font Options
			$this->sections[] = array(
				'icon'   => 'el-icon-fontsize',
				'title'  => esc_html__( 'Font Options', 'cortana' ),
				'desc'   => esc_html__( 'If you change value in this section, you must "Save & Generate CSS"', 'cortana' ),
				'fields' => array(
					array(
						'id'             => 'body_font',
						'type'           => 'typography',
						'title'          => esc_html__( 'Body Font', 'cortana' ),
						'subtitle'       => esc_html__( 'Specify the body font properties.', 'cortana' ),
						'google'         => true,
						'text-align'     => false,
						'color'          => false,
						'letter-spacing' => false,
						'line-height'    => false,
						'all_styles'     => true, // Enable all Google Font style/weight variations to be added to the page
						'output'         => array( 'body' ), // An array of CSS selectors to apply this font style to dynamically
						'compiler'       => array( 'body' ), // An array of CSS selectors to apply this font style to dynamically
						'units'          => 'px', // Defaults to px
						'default'        => array(
							'font-size'   => '14px',
							'font-family' => 'Raleway',
							'font-weight' => '400',
						),
					),
					array(
						'id'             => 'h1_font',
						'type'           => 'typography',
						'title'          => esc_html__( 'H1 Font', 'cortana' ),
						'subtitle'       => esc_html__( 'Specify the H1 font properties.', 'cortana' ),
						'google'         => true,
						'text-align'     => false,
						'line-height'    => false,
						'color'          => false,
						'letter-spacing' => false,
						'all_styles'     => true, // Enable all Google Font style/weight variations to be added to the page
						'output'         => array( 'h1' ), // An array of CSS selectors to apply this font style to dynamically
						'compiler'       => array( 'h1' ), // An array of CSS selectors to apply this font style to dynamically
						'units'          => 'px', // Defaults to px
						'default'        => array(
							'font-size'   => '32px',
							'line-height' => '48px',
							'font-family' => 'Montserrat',
							'font-weight' => '400',
						),
					),
					array(
						'id'             => 'h2_font',
						'type'           => 'typography',
						'title'          => esc_html__( 'H2 Font', 'cortana' ),
						'subtitle'       => esc_html__( 'Specify the H2 font properties.', 'cortana' ),
						'google'         => true,
						'line-height'    => false,
						'text-align'     => false,
						'color'          => false,
						'letter-spacing' => false,
						'all_styles'     => true, // Enable all Google Font style/weight variations to be added to the page
						'output'         => array( 'h2' ), // An array of CSS selectors to apply this font style to dynamically
						'compiler'       => array( 'h2' ), // An array of CSS selectors to apply this font style to dynamically
						'units'          => 'px', // Defaults to px
						'default'        => array(
							'font-size'   => '24px',
							'line-height' => '36px',
							'font-family' => 'Montserrat',
							'font-weight' => '400',
						),
					),
					array(
						'id'             => 'h3_font',
						'type'           => 'typography',
						'title'          => esc_html__( 'H3 Font', 'cortana' ),
						'subtitle'       => esc_html__( 'Specify the H3 font properties.', 'cortana' ),
						'google'         => true,
						'text-align'     => false,
						'line-height'    => false,
						'color'          => false,
						'letter-spacing' => false,
						'all_styles'     => true, // Enable all Google Font style/weight variations to be added to the page
						'output'         => array( 'h3' ), // An array of CSS selectors to apply this font style to dynamically
						'compiler'       => array( 'h3' ), // An array of CSS selectors to apply this font style to dynamically
						'units'          => 'px', // Defaults to px
						'default'        => array(
							'font-size'   => '22px',
							'line-height' => '28px',
							'font-family' => 'Montserrat',
							'font-weight' => '400',
						),
					),
					array(
						'id'             => 'h4_font',
						'type'           => 'typography',
						'title'          => esc_html__( 'H4 Font', 'cortana' ),
						'subtitle'       => esc_html__( 'Specify the H4 font properties.', 'cortana' ),
						'google'         => true,
						'text-align'     => false,
						'line-height'    => false,
						'color'          => false,
						'letter-spacing' => false,
						'all_styles'     => true, // Enable all Google Font style/weight variations to be added to the page
						'output'         => array( 'h4' ), // An array of CSS selectors to apply this font style to dynamically
						'compiler'       => array( 'h4' ), // An array of CSS selectors to apply this font style to dynamically
						'units'          => 'px', // Defaults to px
						'default'        => array(
							'font-size'   => '18px',
							'line-height' => '24px',
							'font-family' => 'Montserrat',
							'font-weight' => '400',
						),
					),
					array(
						'id'             => 'h5_font',
						'type'           => 'typography',
						'title'          => esc_html__( 'H5 Font', 'cortana' ),
						'subtitle'       => esc_html__( 'Specify the H5 font properties.', 'cortana' ),
						'google'         => true,
						'line-height'    => false,
						'text-align'     => false,
						'color'          => false,
						'letter-spacing' => false,
						'all_styles'     => true, // Enable all Google Font style/weight variations to be added to the page
						'output'         => array( 'h5' ), // An array of CSS selectors to apply this font style to dynamically
						'compiler'       => array( 'h5' ), // An array of CSS selectors to apply this font style to dynamically
						'units'          => 'px', // Defaults to px
						'default'        => array(
							'font-size'   => '16px',
							'line-height' => '22px',
							'font-family' => 'Montserrat',
							'font-weight' => '400',
						),
					),
					array(
						'id'             => 'h6_font',
						'type'           => 'typography',
						'title'          => esc_html__( 'H6 Font', 'cortana' ),
						'subtitle'       => esc_html__( 'Specify the H6 font properties.', 'cortana' ),
						'google'         => true,
						'line-height'    => false,
						'text-align'     => false,
						'color'          => false,
						'letter-spacing' => false,
						'all_styles'     => true, // Enable all Google Font style/weight variations to be added to the page
						'output'         => array( 'h6' ), // An array of CSS selectors to apply this font style to dynamically
						'compiler'       => array( 'h6' ), // An array of CSS selectors to apply this font style to dynamically
						'units'          => 'px', // Defaults to px
						'default'        => array(
							'font-size'   => '12px',
							'line-height' => '16px',
							'font-family' => 'Montserrat',
							'font-weight' => '400',
						),
					),
					array(
						'id'          => 'menu_font',
						'type'        => 'typography',
						'title'       => esc_html__( 'Menu Font', 'cortana' ),
						'subtitle'    => esc_html__( 'Specify the Menu font properties.', 'cortana' ),
						'google'      => true,
						'all_styles'  => true, // Enable all Google Font style/weight variations to be added to the page
						'line-height' => false,
						'color'       => false,
						'text-align'  => false,
						'font-style'  => false,
						'subsets'     => false,
						'font-size'   => false,
						'font-weight' => false,
						'output'      => array( '' ), // An array of CSS selectors to apply this font style to dynamically
						'compiler'    => array( '' ), // An array of CSS selectors to apply this font style to dynamically
						'units'       => 'px', // Defaults to px
						'default'     => array(
							'font-family' => 'Montserrat',
						),
					),


					array(
						'id'          => 'primary_font',
						'type'        => 'typography',
						'title'       => esc_html__( 'Primary Font', 'cortana' ),
						'subtitle'    => esc_html__( 'Specify the Primary font properties.', 'cortana' ),
						'google'      => true,
						'all_styles'  => true, // Enable all Google Font style/weight variations to be added to the page
						'line-height' => false,
						'color'       => false,
						'text-align'  => false,
						'font-style'  => false,
						'subsets'     => false,
						'font-size'   => false,
						'font-weight' => false,
						'output'      => array( '' ), // An array of CSS selectors to apply this font style to dynamically
						'compiler'    => array( '' ), // An array of CSS selectors to apply this font style to dynamically
						'units'       => 'px', // Defaults to px
						'default'     => array(
							'font-family' => 'Raleway',
						),
					),

					array(
						'id'          => 'secondary_font',
						'type'        => 'typography',
						'title'       => esc_html__( 'Secondary Font', 'cortana' ),
						'subtitle'    => esc_html__( 'Specify the Secondary font properties.', 'cortana' ),
						'google'      => true,
						'all_styles'  => true, // Enable all Google Font style/weight variations to be added to the page
						'line-height' => false,
						'color'       => false,
						'text-align'  => false,
						'font-style'  => false,
						'subsets'     => false,
						'font-size'   => false,
						'font-weight' => false,
						'output'      => array( '' ), // An array of CSS selectors to apply this font style to dynamically
						'compiler'    => array( '' ), // An array of CSS selectors to apply this font style to dynamically
						'units'       => 'px', // Defaults to px
						'default'     => array(
							'font-family' => 'Montserrat',
						),
					),
					array(
						'id'          => 'third_font',
						'type'        => 'typography',
						'title'       => esc_html__( 'Third Font', 'cortana' ),
						'subtitle'    => esc_html__( 'Specify the Third font properties.', 'cortana' ),
						'google'      => true,
						'all_styles'  => true, // Enable all Google Font style/weight variations to be added to the page
						'line-height' => false,
						'color'       => false,
						'text-align'  => false,
						'font-style'  => false,
						'subsets'     => false,
						'font-size'   => false,
						'font-weight' => false,
						'output'      => array( '' ), // An array of CSS selectors to apply this font style to dynamically
						'compiler'    => array( '' ), // An array of CSS selectors to apply this font style to dynamically
						'units'       => 'px', // Defaults to px
						'default'     => array(
							'font-family' => 'Playfair Display',
						),
					),
				),
			);
			//Social Profiles
			$this->sections[] = array(
				'title'  => esc_html__( 'Social Profiles', 'cortana' ),
				'desc'   => '',
				'icon'   => 'el el-path',
				'fields' => array(
					array(
						'id'       => 'twitter_url',
						'type'     => 'text',
						'title'    => esc_html__( 'Twitter', 'cortana' ),
						'subtitle' => "Your Twitter",
						'desc'     => '',
						'default'  => ''
					),
					array(
						'id'       => 'facebook_url',
						'type'     => 'text',
						'title'    => esc_html__( 'Facebook', 'cortana' ),
						'subtitle' => "Your facebook page/profile url",
						'desc'     => '',
						'default'  => ''
					),
					array(
						'id'       => 'dribbble_url',
						'type'     => 'text',
						'title'    => esc_html__( 'Dribbble', 'cortana' ),
						'subtitle' => "Your Dribbble",
						'desc'     => '',
						'default'  => ''
					),
					array(
						'id'       => 'vimeo_url',
						'type'     => 'text',
						'title'    => esc_html__( 'Vimeo', 'cortana' ),
						'subtitle' => "Your Vimeo",
						'desc'     => '',
						'default'  => ''
					),
					array(
						'id'       => 'tumblr_url',
						'type'     => 'text',
						'title'    => esc_html__( 'Tumblr', 'cortana' ),
						'subtitle' => "Your Tumblr",
						'desc'     => '',
						'default'  => ''
					),
					array(
						'id'       => 'skype_username',
						'type'     => 'text',
						'title'    => esc_html__( 'Skype', 'cortana' ),
						'subtitle' => "Your Skype username",
						'desc'     => 'Your Skype username',
						'default'  => ''
					),
					array(
						'id'       => 'linkedin_url',
						'type'     => 'text',
						'title'    => esc_html__( 'LinkedIn', 'cortana' ),
						'subtitle' => "Your LinkedIn page/profile url",
						'desc'     => '',
						'default'  => ''
					),
					array(
						'id'       => 'googleplus_url',
						'type'     => 'text',
						'title'    => esc_html__( 'Google+', 'cortana' ),
						'subtitle' => "Your Google+ page/profile URL",
						'desc'     => '',
						'default'  => ''
					),
					array(
						'id'       => 'flickr_url',
						'type'     => 'text',
						'title'    => esc_html__( 'Flickr', 'cortana' ),
						'subtitle' => "Your Flickr page url",
						'desc'     => '',
						'default'  => ''
					),
					array(
						'id'       => 'youtube_url',
						'type'     => 'text',
						'title'    => esc_html__( 'YouTube', 'cortana' ),
						'subtitle' => "Your YouTube URL",
						'desc'     => '',
						'default'  => ''
					),
					array(
						'id'       => 'pinterest_url',
						'type'     => 'text',
						'title'    => esc_html__( 'Pinterest', 'cortana' ),
						'subtitle' => "Your Pinterest",
						'desc'     => '',
						'default'  => ''
					),
					array(
						'id'       => 'foursquare_url',
						'type'     => 'text',
						'title'    => esc_html__( 'Foursquare', 'cortana' ),
						'subtitle' => "Your Foursqaure URL",
						'desc'     => '',
						'default'  => ''
					),
					array(
						'id'       => 'instagram_url',
						'type'     => 'text',
						'title'    => esc_html__( 'Instagram', 'cortana' ),
						'subtitle' => "Your Instagram",
						'desc'     => '',
						'default'  => ''
					),
					array(
						'id'       => 'github_url',
						'type'     => 'text',
						'title'    => esc_html__( 'GitHub', 'cortana' ),
						'subtitle' => "Your GitHub URL",
						'desc'     => '',
						'default'  => ''
					),
					array(
						'id'       => 'xing_url',
						'type'     => 'text',
						'title'    => esc_html__( 'Xing', 'cortana' ),
						'subtitle' => "Your Xing URL",
						'desc'     => '',
						'default'  => ''
					),
					array(
						'id'       => 'behance_url',
						'type'     => 'text',
						'title'    => esc_html__( 'Behance', 'cortana' ),
						'subtitle' => "Your Behance URL",
						'desc'     => '',
						'default'  => ''
					),
					array(
						'id'       => 'deviantart_url',
						'type'     => 'text',
						'title'    => esc_html__( 'Deviantart', 'cortana' ),
						'subtitle' => "Your Deviantart URL",
						'desc'     => '',
						'default'  => ''
					),
					array(
						'id'       => 'soundcloud_url',
						'type'     => 'text',
						'title'    => esc_html__( 'SoundCloud', 'cortana' ),
						'subtitle' => "Your SoundCloud URL",
						'desc'     => '',
						'default'  => ''
					),
					array(
						'id'       => 'yelp_url',
						'type'     => 'text',
						'title'    => esc_html__( 'Yelp', 'cortana' ),
						'subtitle' => "Your Yelp URL",
						'desc'     => '',
						'default'  => ''
					),
					array(
						'id'       => 'rss_url',
						'type'     => 'text',
						'title'    => esc_html__( 'RSS Feed', 'cortana' ),
						'subtitle' => "Your RSS Feed URL",
						'desc'     => '',
						'default'  => ''
					),
					array(
						'id'       => 'email_address',
						'type'     => 'text',
						'title'    => esc_html__( 'Email address', 'cortana' ),
						'subtitle' => "Your email address",
						'desc'     => '',
						'default'  => ''
					),
					array(
						'id'   => 'social-profile-divide-0',
						'type' => 'divide'
					),
					array(
						'title'    => esc_html__( 'Social Share', 'cortana' ),
						'id'       => 'social_sharing',
						'type'     => 'checkbox',
						'subtitle' => esc_html__( 'Show the social sharing in blog posts', 'cortana' ),

						//Must provide key => value pairs for multi checkbox options
						'options'  => array(
							'facebook'  => 'Facebook',
							'twitter'   => 'Twitter',
							'google'    => 'Google',
							'linkedin'  => 'Linkedin',
							'tumblr'    => 'Tumblr',
							'pinterest' => 'Pinterest'
						),

						//See how default has changed? you also don't need to specify opts that are 0.
						'default'  => array(
							'facebook'  => '1',
							'twitter'   => '1',
							'google'    => '1',
							'linkedin'  => '1',
							'tumblr'    => '1',
							'pinterest' => '1'
						)
					),
					array(
						'title'    => esc_html__( 'Social share on page 404', 'cortana' ),
						'id'       => 'social_sharing_404',
						'type'     => 'checkbox',
						'subtitle' => esc_html__( 'Show the social sharing in page 404', 'cortana' ),

						//Must provide key => value pairs for multi checkbox options
						'options'  => array(
							'facebook' => 'Facebook',
							'twitter'  => 'Twitter',
							'google'   => 'Google',
							'behance'  => 'Behance',
							'skype'    => 'Skype'
						),

						//See how default has changed? you also don't need to specify opts that are 0.
						'default'  => array(
							'facebook' => '1',
							'twitter'  => '1',
							'google'   => '1',
							'behance'  => '1',
							'skype'    => '1'
						)
					)
				)
			);
			/*
			  //Woocommerce
			$this->sections[] = array(
				'title'  => esc_html__( 'Woocommerce', 'cortana' ),
				'desc'   => '',
				'icon'   => 'el el-shopping-cart',
				'fields' => array(
					array(
						'id'       => 'add_to_cart_animation',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Add To Cart Animation', 'cortana' ),
						'subtitle' => esc_html__( 'Enable Add To Cart Animation', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'On', '0' => 'Off' ),
						'default'  => '1'
					),
					array(
						'id'       => 'product_per_page',
						'type'     => 'text',
						'title'    => esc_html__( 'Products Per Page', 'cortana' ),
						'subtitle' => esc_html__( 'This must be numeric or empty (default 12).', 'cortana' ),
						'desc'     => esc_html__( 'Set Products Per Page in archive product', 'cortana' ),
						'validate' => 'numeric',
						'default'  => '12',
					),
					array(
						'id'       => 'product_display_columns',
						'type'     => 'select',
						'title'    => esc_html__( 'Product Display Columns', 'cortana' ),
						'subtitle' => esc_html__( 'Choose the number of columns to display on shop/category pages.', 'cortana' ),
						'options'  => array(
							'2' => '2',
							'3' => '3',
							'4' => '4',
							'5' => '5',
							'6' => '6',
						),
						'desc'     => '',
						'default'  => '3'
					),
					array(
						'id'       => 'product_show_rating',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Show Rating', 'cortana' ),
						'subtitle' => esc_html__( 'Show/Hide Rating product', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'On', '0' => 'Off' ),
						'default'  => '1'
					),


					array(
						'id'       => 'product_sale_flash_mode',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Sale Flash Mode', 'cortana' ),
						'subtitle' => esc_html__( 'Chose Sale Flash Mode', 'cortana' ),
						'desc'     => '',
						'options'  => array( 'text' => 'Text', 'percent' => 'Percent' ),
						'default'  => 'text'
					),

					array(
						'id'       => 'product_show_result_count',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Show Result Count', 'cortana' ),
						'subtitle' => esc_html__( 'Show/Hide Result Count In Archive Product', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'On', '0' => 'Off' ),
						'default'  => '1'
					),
					array(
						'id'       => 'product_show_catalog_ordering',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Show Catalog Ordering', 'cortana' ),
						'subtitle' => esc_html__( 'Show/Hide Catalog Ordering', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'On', '0' => 'Off' ),
						'default'  => '1'
					),
					array(
						'id'       => 'product_quick_view',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Quick View', 'cortana' ),
						'subtitle' => esc_html__( 'Enable/Disable Quick View', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'Enable', '0' => 'Disable' ),
						'default'  => '1'
					),
				)
			);
			*/
			// Archive Product Layout
			$this->sections[] = array(
				'title'      => esc_html__( 'Archive Product Layout', 'cortana' ),
				'desc'       => '',
				'icon'       => 'el el-shopping-cart',
				'subsection' => true,
				'fields'     => array(
					array(
						'id'       => 'archive_product_layout',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Archive Product Layout', 'cortana' ),
						'subtitle' => esc_html__( 'Select Archive Product Layout', 'cortana' ),
						'desc'     => '',
						'options'  => array( 'full' => 'Full Width', 'container' => 'Container', 'container-fluid' => 'Container Fluid' ),
						'default'  => 'container'
					),
					array(
						'id'       => 'archive_product_sidebar',
						'type'     => 'image_select',
						'title'    => esc_html__( 'Archive Product Sidebar', 'cortana' ),
						'subtitle' => esc_html__( 'Set Archive Product Sidebar', 'cortana' ),
						'desc'     => '',
						'options'  => array(
							'none'  => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/sidebar-none.png' ),
							'left'  => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/sidebar-left.png' ),
							'right' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/sidebar-right.png' ),
							'both'  => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/sidebar-both.png' ),
						),
						'default'  => 'right'
					),
					array(
						'id'       => 'archive_product_sidebar_width',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Sidebar Width', 'cortana' ),
						'subtitle' => esc_html__( 'Set Sidebar width', 'cortana' ),
						'desc'     => '',
						'options'  => array( 'small' => 'Small (1/4)', 'large' => 'Large (1/3)' ),
						'default'  => 'small',
						'required' => array( 'archive_product_sidebar', '=', array( 'left', 'both', 'right' ) ),
					),
					array(
						'id'       => 'archive_product_left_sidebar',
						'type'     => 'select',
						'title'    => esc_html__( 'Archive Product Left Sidebar', 'cortana' ),
						'subtitle' => "Choose the default Archive Product left sidebar",
						'data'     => 'sidebars',
						'desc'     => '',
						'default'  => 'woocommerce',
						'required' => array( 'archive_product_sidebar', '=', array( 'left', 'both' ) ),
					),
					array(
						'id'       => 'archive_product_right_sidebar',
						'type'     => 'select',
						'title'    => esc_html__( 'Archive Product Right Sidebar', 'cortana' ),
						'subtitle' => "Choose the default Archive Product right sidebar",
						'data'     => 'sidebars',
						'desc'     => '',
						'default'  => 'woocommerce',
						'required' => array( 'archive_product_sidebar', '=', array( 'right', 'both' ) ),
					),
					array(
						'id'       => 'show_archive_product_title',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Show Archive Title', 'cortana' ),
						'subtitle' => esc_html__( 'Enable/Disable Archive Product Title', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'On', '0' => 'Off' ),
						'default'  => '1'
					),
					array(
						'id'       => 'archive_product_title_height',
						'type'     => 'dimensions',
						'title'    => esc_html__( 'Archive Product Title Height', 'cortana' ),
						'desc'     => esc_html__( 'You can set a height for the archive product title here', 'cortana' ),
						'required' => array( 'show_archive_product_title', '=', array( '1' ) ),
						'units'    => 'px',
						'width'    => false,
						'default'  => array(
							'height' => ''
						)
					),

					array(
						'id'       => 'breadcrumbs_in_archive_product_title',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Breadcrumbs in Archive Product Title', 'cortana' ),
						'subtitle' => esc_html__( 'Enable/Disable Breadcrumbs in Archive Product Title', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'On', '0' => 'Off' ),
						'default'  => '1'
					),
					array(
						'id'       => 'archive_product_title_bg_image',
						'type'     => 'media',
						'url'      => false,
						'title'    => esc_html__( 'Archive Product Title Background', 'cortana' ),
						'subtitle' => esc_html__( 'Upload archive product title background.', 'cortana' ),
						'desc'     => '',
						'default'  => array(
							'url' => $archive_shop_title_bg_url
						)
					)
				)
			);

			// Single Product Layout
			$this->sections[] = array(
				'title'      => esc_html__( 'Single Product Layout', 'cortana' ),
				'desc'       => '',
				'icon'       => 'el el-shopping-cart',
				'subsection' => true,
				'fields'     => array(
					array(
						'id'       => 'single_product_layout',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Single Product Layout', 'cortana' ),
						'subtitle' => esc_html__( 'Select Single Product Layout', 'cortana' ),
						'desc'     => '',
						'options'  => array( 'full' => 'Full Width', 'container' => 'Container', 'container-fluid' => 'Container Fluid' ),
						'default'  => 'container'
					),
					array(
						'id'       => 'single_product_sidebar',
						'type'     => 'image_select',
						'title'    => esc_html__( 'Single Product Sidebar', 'cortana' ),
						'subtitle' => esc_html__( 'Set Single Product Sidebar', 'cortana' ),
						'desc'     => '',
						'options'  => array(
							'none'  => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/sidebar-none.png' ),
							'left'  => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/sidebar-left.png' ),
							'right' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/sidebar-right.png' ),
							'both'  => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/sidebar-both.png' ),
						),
						'default'  => 'none'
					),
					array(
						'id'       => 'single_product_sidebar_width',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Single Product Sidebar Width', 'cortana' ),
						'subtitle' => esc_html__( 'Set Sidebar width', 'cortana' ),
						'desc'     => '',
						'options'  => array( 'small' => 'Small (1/4)', 'large' => 'Large (1/3)' ),
						'default'  => 'small',
						'required' => array( 'single_product_sidebar', '=', array( 'left', 'both', 'right' ) ),
					),
					array(
						'id'       => 'single_product_left_sidebar',
						'type'     => 'select',
						'title'    => esc_html__( 'Single Product Left Sidebar', 'cortana' ),
						'subtitle' => "Choose the default Single Product left sidebar",
						'data'     => 'sidebars',
						'desc'     => '',
						'default'  => 'sidebar-1',
						'required' => array( 'single_product_sidebar', '=', array( 'left', 'both' ) ),
					),
					array(
						'id'       => 'single_product_right_sidebar',
						'type'     => 'select',
						'title'    => esc_html__( 'Single Product Right Sidebar', 'cortana' ),
						'subtitle' => "Choose the default Single Product right sidebar",
						'data'     => 'sidebars',
						'desc'     => '',
						'default'  => 'sidebar-2',
						'required' => array( 'single_product_sidebar', '=', array( 'right', 'both' ) ),
					),
					array(
						'id'       => 'show_single_product_title',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Show Single Title', 'cortana' ),
						'subtitle' => esc_html__( 'Enable/Disable Single Product Title', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'On', '0' => 'Off' ),
						'default'  => '1'
					),
					array(
						'id'       => 'single_product_title_height',
						'type'     => 'dimensions',
						'title'    => esc_html__( 'Single Product Title Height', 'cortana' ),
						'subtitle' => esc_html__( 'This must be numeric (no px) or empty.', 'cortana' ),
						'desc'     => esc_html__( 'You can set a height for the single product title here', 'cortana' ),
						'required' => array( 'show_single_product_title', '=', array( '1' ) ),
						'units'    => 'px',
						'width'    => false,
						'default'  => array(
							'height' => ''
						)
					),

					array(
						'id'       => 'breadcrumbs_in_single_product_title',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Breadcrumbs in Single Product Title', 'cortana' ),
						'subtitle' => esc_html__( 'Enable/Disable Breadcrumbs in Single Product Title', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'On', '0' => 'Off' ),
						'default'  => '1'
					),
					array(
						'id'       => 'single_product_title_bg_image',
						'type'     => 'media',
						'url'      => false,
						'title'    => esc_html__( 'Single Product Title Background', 'cortana' ),
						'subtitle' => esc_html__( 'Upload single product title background.', 'cortana' ),
						'desc'     => '',
						'default'  => array(
							'url' => $archive_shop_title_bg_url
						)
					),


					array(
						'id'       => 'related_product_count',
						'type'     => 'text',
						'title'    => esc_html__( 'Related Product Total Record', 'cortana' ),
						'subtitle' => esc_html__( 'Total Record Of Related Product.', 'cortana' ),
						'validate' => 'number',
						'default'  => '6',
					),

					array(
						'id'       => 'related_product_display_columns',
						'type'     => 'select',
						'title'    => esc_html__( 'Related Product Display Columns', 'cortana' ),
						'subtitle' => esc_html__( 'Choose the number of columns to display on related product.', 'cortana' ),
						'options'  => array(
							'3' => '3',
							'4' => '4',
						),
						'desc'     => '',
						'default'  => '4'
					),

					array(
						'id'      => 'related_product_condition',
						'type'    => 'checkbox',
						'title'   => esc_html__( 'Related Product Condition', 'cortana' ),
						'options' => array(
							'category' => esc_html__( 'Same Category', 'cortana' ),
							'tag'      => esc_html__( 'Same Tag', 'cortana' ),
						),
						'default' => array(
							'category' => '1',
							'tag'      => '1',
						),
					),
				)
			);

			//Custom Post Type
			$this->sections[] = array(
				'title'  => esc_html__( 'Custom Post Type', 'cortana' ),
				'desc'   => '',
				'icon'   => 'el el-screenshot',
				'fields' => array(
					array(
						'id'       => 'cpt-disable',
						'type'     => 'checkbox',
						'title'    => esc_html__( 'Disable Custom Post Types', 'cortana' ),
						'subtitle' => esc_html__( 'You can disable the custom post types used within the theme here, by checking the corresponding box. NOTE: If you do not want to disable any, then make sure none of the boxes are checked.', 'cortana' ),
						'options'  => array(
							'portfolio' => 'Portfolio',
							'services'  => 'Services',
							'ourteam'   => 'Our Team',
						),
						'default'  => array(
							'portfolio' => '0',
							'services'  => '0',
							'ourteam'   => '0',
						)
					),

					array(
						'id'   => 'custom-post-type-divide-0',
						'type' => 'divide'
					),


				)
			);
			// Portfolio Options
			$this->sections[] = array(
				'title'      => esc_html__( 'Portfolio', 'cortana' ),
				'desc'       => '',
				'icon'       => 'el el-dashboard',
				'subsection' => true,
				'fields'     => array(
					array(
						'id'       => 'show_portfolio_title',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Show Portfolio Title', 'cortana' ),
						'subtitle' => esc_html__( 'Enable/Disable Portfolio Title', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'On', '0' => 'Off' ),
						'default'  => '1'
					),
					array(
						'id'       => 'portfolio_title_height',
						'type'     => 'dimensions',
						'title'    => esc_html__( 'Portfolio Title Height', 'cortana' ),
						'subtitle' => esc_html__( 'This must be numeric (no px) or empty.', 'cortana' ),
						'desc'     => esc_html__( 'You can set a height for the Portfolio title here', 'cortana' ),
						'units'    => 'px',
						'width'    => false,
						'default'  => array(
							'height' => ''
						)
					),
					array(
						'id'       => 'breadcrumbs_in_portfolio_title',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Breadcrumbs in Portfolio Title', 'cortana' ),
						'subtitle' => esc_html__( 'Enable/Disable Breadcrumbs in Portfolio Title', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'On', '0' => 'Off' ),
						'default'  => '1'
					),

					array(
						'id'       => 'portfolio_title_bg_image',
						'type'     => 'media',
						'url'      => true,
						'title'    => esc_html__( 'Portfolio Title Background', 'cortana' ),
						'subtitle' => esc_html__( 'Upload portfolio title background.', 'cortana' ),
						'desc'     => '',
						'default'  => array(
							'url' => $portfolio_title_bg_url
						)
					),
//					array(
//						'id'    => 'portfolio_archive_link',
//						'type'  => 'text',
//						'title' => esc_html__( 'Portfolio Archive Link', 'cortana' ),
//						'desc'  => ''
//					),
				)
			);
			// Services Options
			$this->sections[] = array(
				'title'      => esc_html__( 'Services', 'cortana' ),
				'desc'       => '',
				'icon'       => 'el el-asterisk',
				'subsection' => true,
				'fields'     => array(
					array(
						'id'       => 'service_layout',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Layout', 'cortana' ),
						'subtitle' => esc_html__( 'Select Page Layout', 'cortana' ),
						'desc'     => '',
						'options'  => array( 'full' => 'Full Width', 'container' => 'Container', 'container-fluid' => 'Container Fluid' ),
						'default'  => 'container'
					),
					array(
						'id'       => 'service_sidebar',
						'type'     => 'image_select',
						'title'    => esc_html__( 'Sidebar', 'cortana' ),
						'subtitle' => esc_html__( 'Set Sidebar Style', 'cortana' ),
						'desc'     => '',
						'options'  => array(
							'none'  => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/sidebar-none.png' ),
							'left'  => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/sidebar-left.png' ),
							'right' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/sidebar-right.png' ),
							'both'  => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/sidebar-both.png' ),
						),
						'default'  => 'right'
					),

					array(
						'id'       => 'service_sidebar_width',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Sidebar Width', 'cortana' ),
						'subtitle' => esc_html__( 'Set Sidebar width', 'cortana' ),
						'desc'     => '',
						'options'  => array( 'small' => 'Small (1/4)', 'large' => 'Large (1/3)' ),
						'default'  => 'small',
						'required' => array( 'service_sidebar', '=', array( 'left', 'both', 'right' ) ),
					),


					array(
						'id'       => 'service_left_sidebar',
						'type'     => 'select',
						'title'    => esc_html__( 'Left Sidebar', 'cortana' ),
						'subtitle' => "Choose the default left sidebar",
						'data'     => 'sidebars',
						'desc'     => '',
						'default'  => 'sidebar-1',
						'required' => array( 'service_sidebar', '=', array( 'left', 'both' ) ),
					),
					array(
						'id'       => 'service_right_sidebar',
						'type'     => 'select',
						'title'    => esc_html__( 'Right Sidebar', 'cortana' ),
						'subtitle' => "Choose the default right sidebar",
						'data'     => 'sidebars',
						'desc'     => '',
						'default'  => 'sidebar-2',
						'required' => array( 'service_sidebar', '=', array( 'right', 'both' ) ),
					),
					array(
						'id'       => 'show_service_title',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Show Services Title', 'cortana' ),
						'subtitle' => esc_html__( 'Enable/Disable Services Title', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'On', '0' => 'Off' ),
						'default'  => '1'
					),
					array(
						'id'       => 'service_title_height',
						'type'     => 'dimensions',
						'title'    => esc_html__( 'Services Title Height', 'cortana' ),
						'subtitle' => esc_html__( 'This must be numeric (no px) or empty.', 'cortana' ),
						'desc'     => esc_html__( 'You can set a height for the Services title here', 'cortana' ),
						'units'    => 'px',
						'width'    => false,
						'default'  => array(
							'height' => ''
						)
					),
					array(
						'id'       => 'breadcrumbs_in_service_title',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Breadcrumbs in Services Title', 'cortana' ),
						'subtitle' => esc_html__( 'Enable/Disable Breadcrumbs in Services Title', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'On', '0' => 'Off' ),
						'default'  => '1'
					),

					array(
						'id'       => 'service_title_bg_image',
						'type'     => 'media',
						'url'      => true,
						'title'    => esc_html__( 'Services Title Background', 'cortana' ),
						'subtitle' => esc_html__( 'Upload services title background.', 'cortana' ),
						'desc'     => '',
						'default'  => array(
							'url' => $services_title_bg_url
						)
					),

				)
			);
			// Services Options
			$this->sections[] = array(
				'title'      => esc_html__( 'Our Team', 'cortana' ),
				'desc'       => '',
				'icon'       => 'el el-user',
				'subsection' => true,
				'fields'     => array(
					array(
						'id'       => 'our_team_layout',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Layout', 'cortana' ),
						'subtitle' => esc_html__( 'Select Our Team Layout', 'cortana' ),
						'desc'     => '',
						'options'  => array( 'full' => 'Full Width', 'container' => 'Container', 'container-fluid' => 'Container Fluid' ),
						'default'  => 'container'
					),
					array(
						'id'       => 'our_team_sidebar',
						'type'     => 'image_select',
						'title'    => esc_html__( 'Sidebar', 'cortana' ),
						'subtitle' => esc_html__( 'Set Sidebar Style', 'cortana' ),
						'desc'     => '',
						'options'  => array(
							'none'  => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/sidebar-none.png' ),
							'left'  => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/sidebar-left.png' ),
							'right' => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/sidebar-right.png' ),
							'both'  => array( 'title' => '', 'img' =>  get_template_directory_uri()  . '/assets/images/theme-options/sidebar-both.png' ),
						),
						'default'  => 'right'
					),

					array(
						'id'       => 'our_team_sidebar_width',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Sidebar Width', 'cortana' ),
						'subtitle' => esc_html__( 'Set Sidebar width', 'cortana' ),
						'desc'     => '',
						'options'  => array( 'small' => 'Small (1/4)', 'large' => 'Large (1/3)' ),
						'default'  => 'small',
						'required' => array( 'service_sidebar', '=', array( 'left', 'both', 'right' ) ),
					),


					array(
						'id'       => 'our_team_left_sidebar',
						'type'     => 'select',
						'title'    => esc_html__( 'Left Sidebar', 'cortana' ),
						'subtitle' => "Choose the default left sidebar",
						'data'     => 'sidebars',
						'desc'     => '',
						'default'  => 'sidebar-1',
						'required' => array( 'service_sidebar', '=', array( 'left', 'both' ) ),
					),
					array(
						'id'       => 'our_team_right_sidebar',
						'type'     => 'select',
						'title'    => esc_html__( 'Right Sidebar', 'cortana' ),
						'subtitle' => "Choose the default right sidebar",
						'data'     => 'sidebars',
						'desc'     => '',
						'default'  => 'sidebar-2',
						'required' => array( 'service_sidebar', '=', array( 'right', 'both' ) ),
					),
					array(
						'id'       => 'show_our_team_title',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Show Our Team Title', 'cortana' ),
						'subtitle' => esc_html__( 'Enable/Disable Services Title', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'On', '0' => 'Off' ),
						'default'  => '1'
					),
					array(
						'id'       => 'our_team_title_height',
						'type'     => 'dimensions',
						'title'    => esc_html__( 'Services Our Team Height', 'cortana' ),
						'subtitle' => esc_html__( 'This must be numeric (no px) or empty.', 'cortana' ),
						'desc'     => esc_html__( 'You can set a height for the Services title here', 'cortana' ),
						'units'    => 'px',
						'width'    => false,
						'default'  => array(
							'height' => ''
						)
					),
					array(
						'id'       => 'breadcrumbs_in_our_team_title',
						'type'     => 'button_set',
						'title'    => esc_html__( 'Breadcrumbs in Our Team Title', 'cortana' ),
						'subtitle' => esc_html__( 'Enable/Disable Breadcrumbs in Our Team Title', 'cortana' ),
						'desc'     => '',
						'options'  => array( '1' => 'On', '0' => 'Off' ),
						'default'  => '1'
					),

					array(
						'id'       => 'our_team_title_bg_image',
						'type'     => 'media',
						'url'      => true,
						'title'    => esc_html__( 'Our Team Title Background', 'cortana' ),
						'subtitle' => esc_html__( 'Upload Our Team title background.', 'cortana' ),
						'desc'     => '',
						'default'  => array(
							'url' => $services_title_bg_url
						)
					),

				)
			);

			$this->sections[] = array(
				'title'  => esc_html__( 'Resources Options', 'cortana' ),
				'desc'   => '',
				'icon'   => 'el el-random',
				'fields' => array(
					array(
						'id'       => 'cdn_bootstrap_js',
						'type'     => 'text',
						'title'    => esc_html__( 'CDN Bootstrap Script', 'cortana' ),
						'subtitle' => esc_html__( 'Url CDN Bootstrap Script', 'cortana' ),
						'desc'     => '',
						'default'  => '',
					),

					array(
						'id'       => 'cdn_bootstrap_css',
						'type'     => 'text',
						'title'    => esc_html__( 'CDN Bootstrap Stylesheet', 'cortana' ),
						'subtitle' => esc_html__( 'Url CDN Bootstrap Stylesheet', 'cortana' ),
						'desc'     => '',
						'default'  => '',
					),

					array(
						'id'       => 'cdn_font_awesome',
						'type'     => 'text',
						'title'    => esc_html__( 'CDN Font Awesome', 'cortana' ),
						'subtitle' => esc_html__( 'Url CDN Font Awesome', 'cortana' ),
						'desc'     => '',
						'default'  => '',
					),

				)
			);
			$this->sections[] = array(
				'title'  => esc_html__( 'Custom CSS & Script', 'cortana' ),
				'desc'   => esc_html__( 'If you change Custom CSS, you must "Save & Generate CSS"', 'cortana' ),
				'icon'   => 'el el-edit',
				'fields' => array(
					array(
						'id'       => 'custom_css',
						'type'     => 'ace_editor',
						'mode'     => 'css',
						'theme'    => 'monokai',
						'title'    => esc_html__( 'Custom CSS', 'cortana' ),
						'subtitle' => esc_html__( 'Add some CSS to your theme by adding it to this textarea. Please do not include any style tags.', 'cortana' ),
						'desc'     => '',
						'default'  => '',
						'options'  => array( 'minLines' => 20, 'maxLines' => 60 )
					),
					array(
						'id'       => 'custom_js',
						'type'     => 'ace_editor',
						'mode'     => 'javascript',
						'theme'    => 'chrome',
						'title'    => esc_html__( 'Custom JS', 'cortana' ),
						'subtitle' => esc_html__( 'Add some custom JavaScript to your theme by adding it to this textarea. Please do not include any script tags.', 'cortana' ),
						'desc'     => '',
						'default'  => '',
						'options'  => array( 'minLines' => 20, 'maxLines' => 60 )
					),

				)
			);
		}

		public function setHelpTabs() {
		}

		/**
		 * All the possible arguments for Redux.
		 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
		 * */
		public function setArguments() {

			$theme = wp_get_theme(); // For use with some settings. Not necessary.

			$this->args = array(
				// TYPICAL -> Change these values as you need/desire
				'opt_name'        => 'g5plus_cortana_options',
				// This is where your data is stored in the database and also becomes your global variable name.
				'display_name'    => $theme->get( 'Name' ),
				// Name that appears at the top of your panel
				'display_version' => $theme->get( 'Version' ),
				// Version that appears at the top of your panel
				'menu_type'       => 'menu',
				//Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
				'allow_sub_menu'  => true,
				// Show the sections below the admin menu item or not
				'menu_title'      => esc_html__( 'Theme Options', 'cortana' ),
				'page_title'      => esc_html__( 'Theme Options', 'cortana' ),
				// You will need to generate a Google API key to use this feature.
				// Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
				'google_api_key'  => '',
				// Must be defined to add google fonts to the typography module

				'async_typography'   => false,
				// Use a asynchronous font on the front end or font string
				'admin_bar'          => true,
				// Show the panel pages on the admin bar
				'global_variable'    => '',
				// Set a different name for your global variable other than the opt_name
				'dev_mode'           => false,
				// Show the time the page took to load, etc
				'customizer'         => true,
				// Enable basic customizer support

				// OPTIONAL -> Give you extra features
				'page_priority'      => null,
				// Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
				'page_parent'        => 'themes.php',
				// For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_theme_page#Parameters
				'page_permissions'   => 'manage_options',
				// Permissions needed to access the options panel.
				'menu_icon'          => '',
				// Specify a custom URL to an icon
				'last_tab'           => '',
				// Force your panel to always open to a specific tab (by id)
				'page_icon'          => 'icon-themes',
				// Icon displayed in the admin panel next to your menu_title
				'page_slug'          => '_options',
				// Page slug used to denote the panel
				'save_defaults'      => true,
				// On load save the defaults to DB before user clicks save or not
				'default_show'       => false,
				// If true, shows the default value next to each field that is not the default value.
				'default_mark'       => '',
				// What to print by the field's title if the value shown is default. Suggested: *
				'show_import_export' => true,
				// Shows the Import/Export panel when not used as a field.

				// CAREFUL -> These options are for advanced use only
				'transient_time'     => 60 * MINUTE_IN_SECONDS,
				'output'             => true,
				// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
				'output_tag'         => true,
				// Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
				// 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

				// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
				'database'           => '',
				// possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
				'system_info'        => false,
				// REMOVE

				// HINTS
				'hints'              => array(
					'icon'          => 'icon-question-sign',
					'icon_position' => 'right',
					'icon_color'    => 'lightgray',
					'icon_size'     => 'normal',
					'tip_style'     => array(
						'color'   => 'light',
						'shadow'  => true,
						'rounded' => false,
						'style'   => '',
					),
					'tip_position'  => array(
						'my' => 'top left',
						'at' => 'bottom right',
					),
					'tip_effect'    => array(
						'show' => array(
							'effect'   => 'slide',
							'duration' => '500',
							'event'    => 'mouseover',
						),
						'hide' => array(
							'effect'   => 'slide',
							'duration' => '500',
							'event'    => 'click mouseleave',
						),
					),
				)
			);


			// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
			$this->args['share_icons'][] = array(
				'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
				'title' => 'Visit us on GitHub',
				'icon'  => 'el el-github'
				//'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
			);
			$this->args['share_icons'][] = array(
				'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
				'title' => 'Like us on Facebook',
				'icon'  => 'el el-facebook'
			);
			$this->args['share_icons'][] = array(
				'url'   => 'http://twitter.com/reduxframework',
				'title' => 'Follow us on Twitter',
				'icon'  => 'el el-twitter'
			);
			$this->args['share_icons'][] = array(
				'url'   => 'http://www.linkedin.com/company/redux-framework',
				'title' => 'Find us on LinkedIn',
				'icon'  => 'el el-linkedin'
			);

			// Panel Intro text -> before the form
			if ( !isset( $this->args['global_variable'] ) || $this->args['global_variable'] !== false ) {
				if ( !empty( $this->args['global_variable'] ) ) {
					$v = $this->args['global_variable'];
				} else {
					$v = str_replace( '-', '_', $this->args['opt_name'] );
				}
				//$this->args['intro_text'] = sprintf( esc_html__( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'cortana' ), $v );
			} else {
				//$this->args['intro_text'] = esc_html__( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'cortana' );
			}

			// Add content after the form.
			$allowed_html              = array(
				'i'  => array(
					'class' => array(),
				),
				'p'  => array(),
				'em' => array(),
			);
			$this->args['footer_text'] = wp_kses( __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'cortana' ), $allowed_html );
		}

	}

	global $reduxConfig;
	$reduxConfig = new Redux_Framework_options_config();
}
