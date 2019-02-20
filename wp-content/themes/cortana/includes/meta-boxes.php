<?php
/*
*
*	Meta Box Functions
*	------------------------------------------------
*	G5Plus Framework
* 	Copyright Swift Ideas 2015 - http://www.g5plus.net
*
*/
global $meta_boxes;

/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function g5plus_register_meta_boxes() {
	global $meta_boxes;
	$prefix = 'g5plus_';
	/* PAGE MENU */
	$menu_list = array();
	if ( function_exists( 'g5plus_get_menu_list' ) ) {
		$menu_list = g5plus_get_menu_list();
	}

// POST FORMAT: Image
//--------------------------------------------------
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Post Format: Image', 'cortana' ),
		'id'     => $prefix . 'meta_box_post_format_image',
		'pages'  => array( 'post' ),
		'format' => 'post-format',
		'fields' => array(
			array(
				'name'             => esc_html__( 'Image', 'cortana' ),
				'id'               => $prefix . 'post_format_image',
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
				'desc'             => esc_html__( 'Select a image for post', 'cortana' )
			),
		),
	);

// POST FORMAT: Gallery
//--------------------------------------------------
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Post Format: Gallery', 'cortana' ),
		'format' => 'post-format',
		'id'     => $prefix . 'meta_box_post_format_gallery',
		'pages'  => array( 'post' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Images', 'cortana' ),
				'id'   => $prefix . 'post_format_gallery',
				'type' => 'image_advanced',
				'desc' => esc_html__( 'Select images gallery for post', 'cortana' )
			),
		),
	);

// POST FORMAT: Video
//--------------------------------------------------
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Post Format: Video', 'cortana' ),
		'format' => 'post-format',
		'id'     => $prefix . 'meta_box_post_format_video',
		'pages'  => array( 'post' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Video URL or Embeded Code', 'cortana' ),
				'id'   => $prefix . 'post_format_video',
				'type' => 'textarea',
			),
		),
	);

// POST FORMAT: Audio
//--------------------------------------------------
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Post Format: Audio', 'cortana' ),
		'format' => 'post-format',
		'id'     => $prefix . 'meta_box_post_format_audio',
		'pages'  => array( 'post' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Audio URL or Embeded Code', 'cortana' ),
				'id'   => $prefix . 'post_format_audio',
				'type' => 'textarea',
			),
		),
	);

// POST FORMAT: QUOTE
//--------------------------------------------------
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Post Format: Quote', 'cortana' ),
		'format' => 'post-format',
		'id'     => $prefix . 'meta_box_post_format_quote',
		'pages'  => array( 'post' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Quote', 'cortana' ),
				'id'   => $prefix . 'post_format_quote',
				'type' => 'textarea',
			),
			array(
				'name' => esc_html__( 'Author', 'cortana' ),
				'id'   => $prefix . 'post_format_quote_author',
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Author Url', 'cortana' ),
				'id'   => $prefix . 'post_format_quote_author_url',
				'type' => 'url',
			),
		),
	);
	// POST FORMAT: LINK
//--------------------------------------------------
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Post Format: Link', 'cortana' ),
		'format' => 'post-format',
		'id'     => $prefix . 'meta_box_post_format_link',
		'pages'  => array( 'post' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Url', 'cortana' ),
				'id'   => $prefix . 'post_format_link_url',
				'type' => 'url',
			),
			array(
				'name' => esc_html__( 'Text', 'cortana' ),
				'id'   => $prefix . 'post_format_link_text',
				'type' => 'text',
			),
		),
	);
//GALLERY
	$meta_boxes[] = array(
		'id'     => $prefix . 'serives_gallery_meta_box',
		'title'  => esc_html__( 'Gallery', 'cortana' ),
		'pages'  => array( 'services' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Images', 'cortana' ),
				'id'   => $prefix . 'services_gallery',
				'type' => 'image_advanced',
				'desc' => esc_html__( 'Select images gallery for post', 'cortana' )
			),
		)
	);
// PAGE TITLE
//--------------------------------------------------
	$meta_boxes[] = array(
		'id'     => $prefix . 'page_title_meta_box',
		'title'  => esc_html__( 'Page Title', 'cortana' ),
		'pages'  => array( 'post', 'page', 'portfolio', 'services', 'ourteam' ),
		'fields' => array(
			array(
				'name'    => esc_html__( 'Show/Hide Page Title?', 'cortana' ),
				'id'      => $prefix . 'show_page_title',
				'type'    => 'button_set',
				'std'     => '-1',
				'options' => array(
					'-1' => esc_html__( 'Default', 'cortana' ),
					'1'  => esc_html__( 'Show Page Title', 'cortana' ),
					'0'  => esc_html__( 'Hide Page Title', 'cortana' ),
				)
			),

			// PAGE TITLE LINE 1
			array(
				'name'           => esc_html__( 'Custom Page Title', 'cortana' ),
				'id'             => $prefix . 'page_title_custom',
				'desc'           => esc_html__( "Enter a custom page title if you'd like.", 'cortana' ),
				'type'           => 'text',
				'std'            => '',
				'required-field' => array( $prefix . 'show_page_title', '<>', '0' ),
			),
			array(
				'name'           => esc_html__( 'Page Description', 'cortana' ),
				'id'             => $prefix . 'page_description',
				'desc'           => esc_html__( "Enter a page description if you'd like.", 'cortana' ),
				'type'           => 'textarea',
				'std'            => '',
				'required-field' => array( $prefix . 'show_page_title', '<>', '0' ),
			),
			// PAGE TITLE TEXT COLOR
			array(
				'name'           => esc_html__( 'Page Title Text Color', 'cortana' ),
				'id'             => $prefix . 'page_title_text_color',
				'desc'           => esc_html__( "Optionally set a text color for the page title.", 'cortana' ),
				'type'           => 'color',
				'std'            => '',
				'required-field' => array( $prefix . 'show_page_title', '<>', '0' ),
			),

			// PAGE TITLE BACKGROUND COLOR
			array(
				'name'           => esc_html__( 'Page Title Background Color', 'cortana' ),
				'id'             => $prefix . 'page_title_bg_color',
				'desc'           => esc_html__( "Optionally set a background color for the page title.", 'cortana' ),
				'type'           => 'color',
				'std'            => '',
				'required-field' => array( $prefix . 'show_page_title', '<>', '0' ),
			),

			// BACKGROUND IMAGE
			array(
				'id'               => $prefix . 'page_title_bg_image',
				'name'             => esc_html__( 'Background Image', 'cortana' ),
				'desc'             => esc_html__( 'Background Image for page title.', 'cortana' ),
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
				'required-field'   => array( $prefix . 'show_page_title', '<>', '0' ),
			),

			// PAGE TITLE OVERLAY COLOR
			array(
				'id'             => $prefix . 'page_title_overlay_color',
				'name'           => esc_html__( 'Page Title Overlay Color', 'cortana' ),
				'desc'           => esc_html__( "Set an overlay color for page title image.", 'cortana' ),
				'type'           => 'color',
				'std'            => '',
				'required-field' => array( $prefix . 'show_page_title', '<>', '0' ),
			),

			array(
				'name'           => esc_html__( 'Custom Overlay Opacity?', 'cortana' ),
				'id'             => $prefix . 'enable_custom_overlay_opacity',
				'type'           => 'checkbox',
				'std'            => 0,
				'required-field' => array( $prefix . 'show_page_title', '<>', '0' ),
			),


			// Overlay Opacity Value
			array(
				'name'           => esc_html__( 'Overlay Opacity', 'cortana' ),
				'id'             => $prefix . 'page_title_overlay_opacity',
				'desc'           => esc_html__( 'Set the opacity level of the overlay. This will lighten or darken the image depening on the color selected.', 'cortana' ),
				'clone'          => false,
				'type'           => 'slider',
				'prefix'         => '',
				'js_options'     => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
				'required-field' => array( $prefix . 'enable_custom_overlay_opacity', '=', '1' ),
			),

			// PAGE TITLE Height
			array(
				'name'           => esc_html__( 'Page Title Height', 'cortana' ),
				'id'             => $prefix . 'page_title_height',
				'desc'           => esc_html__( "Enter a page title height value (not include unit).", 'cortana' ),
				'type'           => 'number',
				'std'            => '',
				'required-field' => array( $prefix . 'show_page_title', '<>', '0' ),
			),
			// Breadcrumbs in Page Title
			array(
				'name'           => esc_html__( 'Breadcrumbs in Page Title', 'cortana' ),
				'id'             => $prefix . 'breadcrumbs_in_page_title',
				'desc'           => esc_html__( "Show/Hide Breadcrumbs in Page Title", 'cortana' ),
				'type'           => 'button_set',
				'options'        => array(
					'-1' => esc_html__( 'Default', 'cortana' ),
					'1'  => esc_html__( 'Show Breadcrumbs', 'cortana' ),
					'0'  => esc_html__( 'Hide Breadcrumbs', 'cortana' ),
				),
				'std'            => '-1',
				'required-field' => array( $prefix . 'show_page_title', '<>', '0' ),
			),
			array(
				'name'           => esc_html__( 'Breadcrumbs Align', 'cortana' ),
				'id'             => $prefix . 'breadcrumbs_position',
				'desc'           => esc_html__( "Breadcrumbs Align", 'cortana' ),
				'type'           => 'button_set',
				'options'        => array(
					'-1' => esc_html__( 'Default', 'cortana' ),
					'1'  => esc_html__( 'Left', 'cortana' ),
					'0'  => esc_html__( 'Right', 'cortana' )
				),
				'std'            => '-1',
				'required-field' => array( $prefix . 'show_page_title', '<>', '0' ),
			),
			array(
				'name'           => esc_html__( 'Remove Margin Bottom', 'cortana' ),
				'id'             => $prefix . 'page_title_remove_margin_bottom',
				'type'           => 'checkbox',
				'std'            => 0,
				'required-field' => array( $prefix . 'show_page_title', '<>', '0' )
			),
		)
	);

// PAGE HEADER
//--------------------------------------------------
	$meta_boxes[] = array(
		'id'     => $prefix . 'page_header_meta_box',
		'title'  => esc_html__( 'Page Header', 'cortana' ),
		'pages'  => array( 'post', 'page', 'portfolio', 'services', 'ourteam' ),
		'fields' => array(
			array(
				'name'        => esc_html__( 'Page Menu', 'cortana' ),
				'id'          => $prefix . 'page_menu',
				'type'        => 'select_advanced',
				'options'     => $menu_list,
				'placeholder' => esc_html__( 'Select Menu', 'cortana' ),
				'std'         => '',
				'multiple'    => false,
				'desc'        => esc_html__( 'Optionally you can choose to override the menu that is used on the page', 'cortana' ),
			),

			array(
				'name' => esc_html__( 'Is One Page', 'cortana' ),
				'id'   => $prefix . 'is_one_page',
				'type' => 'checkbox',
				'std'  => 0,
				'desc' => esc_html__( 'Set page style is One Page', 'cortana' ),
			),

			array(
				'name'        => esc_html__( 'Above Header Sidebar', 'cortana' ),
				'id'          => $prefix . 'above_header_sidebar',
				'type'        => 'sidebars',
				'placeholder' => esc_html__( 'Select Sidebar', 'cortana' ),
				'std'         => ''
			),

			array(
				'name'    => esc_html__( 'Show/Hide Top Bar', 'cortana' ),
				'id'      => $prefix . 'top_bar',
				'type'    => 'button_set',
				'std'     => '-1',
				'options' => array(
					'-1' => esc_html__( 'Default', 'cortana' ),
					'1'  => esc_html__( 'Show Top Bar', 'cortana' ),
					'0'  => esc_html__( 'Hide Top Bar', 'cortana' )
				),
				'desc'    => esc_html__( 'Show Hide Top Bar.', 'cortana' ),
			),

			array(
				'name'           => esc_html__( 'Top Bar Layout', 'cortana' ),
				'id'             => $prefix . 'top_bar_layout',
				'type'           => 'image_set',
				'allowClear'     => true,
				'width'          => '80px',
				'std'            => '',
				'options'        => array(
					'top-bar-1' =>  get_template_directory_uri()  . '/assets/images/theme-options/top-bar-layout-1.jpg',
					'top-bar-2' =>  get_template_directory_uri()  . '/assets/images/theme-options/top-bar-layout-2.jpg',
					'top-bar-3' =>  get_template_directory_uri()  . '/assets/images/theme-options/top-bar-layout-3.jpg',
					'top-bar-4' =>  get_template_directory_uri()  . '/assets/images/theme-options/top-bar-layout-4.jpg',
				),
				'required-field' => array( $prefix . 'top_bar', '<>', '0' ),
			),

			array(
				'name'           => esc_html__( 'Top Left Sidebar', 'cortana' ),
				'id'             => $prefix . 'top_left_sidebar',
				'type'           => 'sidebars',
				'std'            => '',
				'placeholder'    => esc_html__( 'Select Sidebar', 'cortana' ),
				'required-field' => array( $prefix . 'top_bar', '<>', '0' ),
			),

			array(
				'name'           => esc_html__( 'Top Right Sidebar', 'cortana' ),
				'id'             => $prefix . 'top_right_sidebar',
				'type'           => 'sidebars',
				'std'            => '',
				'placeholder'    => esc_html__( 'Select Sidebar', 'cortana' ),
				'required-field' => array( $prefix . 'top_bar', '<>', '0' ),
			),
			array(
				'name'           => esc_html__( 'Top Bar Background Color', 'cortana' ),
				'id'             => $prefix . 'topbar_bg_color',
				'desc'           => esc_html__( "Optionally set a background color for the Top bar.", 'cortana' ),
				'type'           => 'color',
				'std'            => '',
				'required-field' => array( $prefix . 'top_bar', '<>', '0' ),
			),
			array(
				'name'           => esc_html__( 'Top Bar Color', 'cortana' ),
				'id'             => $prefix . 'topbar_color',
				'desc'           => esc_html__( "Optionally set a color for the Top bar.", 'cortana' ),
				'type'           => 'color',
				'std'            => '',
				'required-field' => array( $prefix . 'top_bar', '<>', '0' ),
			),
			//opacity header
			array(
				'name'           => esc_html__( 'Show/hide Top Bar border', 'cortana' ),
				'id'             => $prefix . 'show_top_bar_border',
				'type'           => 'checkbox',
				'std'            => 0,
				'required-field' => array( $prefix . 'top_bar', '<>', '0' ),
			),
			array(
				'name'           => esc_html__( 'Top Bar Border Color', 'cortana' ),
				'id'             => $prefix . 'topbar_border_color',
				'desc'           => esc_html__( "Optionally set a border color for the Top bar.", 'cortana' ),
				'type'           => 'color',
				'std'            => '',
				'required-field' => array( $prefix . 'show_top_bar_border', '=', '1' ),
			),
			array(
				'name'    => esc_html__( 'Show/Hide Header', 'cortana' ),
				'id'      => $prefix . 'header_show_hide',
				'type'    => 'button_set',
				'std'     => '1',
				'options' => array(
					'1' => esc_html__( 'Show Header', 'cortana' ),
					'0' => esc_html__( 'Hide Header', 'cortana' )
				),
				'desc'    => esc_html__( 'Show/hide header', 'cortana' ),
			),
			array(
				'name'           => esc_html__( 'Header Layout Style', 'cortana' ),
				'id'             => $prefix . 'header_layout_style',
				'type'           => 'button_set',
				'allowClear'     => true,
				'std'            => '-1',
				'options'        => array(
					'-1'    => esc_html__( 'Default', 'cortana' ),
					'boxed' => esc_html__( 'Boxed', 'cortana' ),
					'wide'  => esc_html__( 'Wide', 'cortana' ),
				),
				'required-field' => array( $prefix . 'header_show_hide', '<>', '0' ),
			),
			array(
				'name'           => esc_html__( 'Header Layout', 'cortana' ),
				'id'             => $prefix . 'header_layout',
				'type'           => 'image_set',
				'allowClear'     => true,
				'std'            => '',
				'options'        => array(
					'header-1' =>  get_template_directory_uri()  . '/assets/images/theme-options/header-1.jpg',
					'header-2' =>  get_template_directory_uri()  . '/assets/images/theme-options/header-2.jpg',
					'header-3' =>  get_template_directory_uri()  . '/assets/images/theme-options/header-3.jpg',
				),
				'required-field' => array( $prefix . 'header_show_hide', '<>', '0' ),
			),
			array(
				'name'           => esc_html__( 'Header Position', 'cortana' ),
				'id'             => $prefix . 'header_positon',
				'type'           => 'button_set',
				'allowClear'     => true,
				'std'            => '-1',
				'options'        => array(
					'-1' => esc_html__( 'Default', 'cortana' ),
					'1'  => esc_html__( 'Enable Header Overlay', 'cortana' ),
					'0'  => esc_html__( 'Disable Header Overlay', 'cortana' ),
				),
				'required-field' => array( $prefix . 'header_show_hide', '<>', '0' ),
			),
			array(
				'name'           => esc_html__( 'Header Background Color', 'cortana' ),
				'id'             => $prefix . 'header_bg_color',
				'desc'           => esc_html__( "Optionally set a background color for the Header.", 'cortana' ),
				'type'           => 'color',
				'std'            => '',
				'required-field' => array( $prefix . 'header_show_hide', '<>', '0' ),
			),
			//opacity header
			array(
				'name'           => esc_html__( 'Custom Overlay Opacity?', 'cortana' ),
				'id'             => $prefix . 'header_custom_overlay_opacity',
				'type'           => 'checkbox',
				'std'            => 0,
				'required-field' => array( $prefix . 'header_show_hide', '<>', '0' ),
			),

			// Overlay Opacity Value
			array(
				'name'           => esc_html__( 'Header Background Overlay Opacity', 'cortana' ),
				'id'             => $prefix . 'header_bg_opacity',
				'desc'           => esc_html__( 'Set the opacity level of the overlay. This will lighten or darken the image depening on the color selected.', 'cortana' ),
				'clone'          => false,
				'type'           => 'slider',
				'prefix'         => '',
				'js_options'     => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
				'required-field' => array( $prefix . 'header_custom_overlay_opacity', '=', '1' ),
			),
			array(
				'name'           => esc_html__( 'Show Border', 'cortana' ),
				'id'             => $prefix . 'header_show_border',
				'type'           => 'checkbox',
				'std'            => 0,
				'required-field' => array( $prefix . 'header_show_hide', '<>', '0' ),
			),
			array(
				'name'           => esc_html__( 'Header Border Color', 'cortana' ),
				'id'             => $prefix . 'header_border_color',
				'desc'           => esc_html__( "Optionally set a border color for the Header.", 'cortana' ),
				'type'           => 'color',
				'std'            => '',
				'required-field' => array( $prefix . 'header_show_border', '=', '1' ),
			),
			// Overlay Opacity Value
			array(
				'name'           => esc_html__( 'Header Border Opacity', 'cortana' ),
				'id'             => $prefix . 'header_border_opacity',
				'desc'           => esc_html__( 'Set the opacity level of the overlay. This will lighten or darken the image depening on the color selected.', 'cortana' ),
				'clone'          => false,
				'type'           => 'slider',
				'prefix'         => '',
				'js_options'     => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
				'required-field' => array( $prefix . 'header_show_border', '=', '1' ),
			),
			array(
				'name'           => esc_html__( 'Menu Background Color', 'cortana' ),
				'id'             => $prefix . 'menu_bg_color',
				'desc'           => esc_html__( "Optionally set a background color for the Menu.", 'cortana' ),
				'type'           => 'color',
				'std'            => '',
				'default'        => '',
				'required-field' => array( $prefix . 'header_show_hide', '<>', '0' ),
			),
			array(
				'name'           => esc_html__( 'Menu text Color', 'cortana' ),
				'id'             => $prefix . 'menu_text_color',
				'desc'           => esc_html__( "Optionally set a text color for the Menu.", 'cortana' ),
				'type'           => 'color',
				'std'            => '',
				'default'        => '',
				'required-field' => array( $prefix . 'header_show_hide', '<>', '0' ),
			),
			array(
				'name'           => esc_html__( 'Header margin Top', 'cortana' ),
				'id'             => $prefix . 'header_margin_top',
				'desc'           => esc_html__( "Optionally set Margintop for Header.", 'cortana' ),
				'type'           => 'number',
				'std'            => '',
				'default'        => '0',
				'required-field' => array( $prefix . 'header_show_hide', '<>', '0' ),
			),
			array(
				'name' => esc_html__( 'Set header customize?', 'cortana' ),
				'id'   => $prefix . 'enable_header_customize',
				'type' => 'checkbox',
				'std'  => 0,
			),
			array(
				'name'           => esc_html__( 'Header Customize', 'cortana' ),
				'id'             => $prefix . 'header_customize',
				'type'           => 'sorter',
				'std'            => '',
				'desc'           => esc_html__( 'Select element for header customize. Drag to change element order', 'cortana' ),
				'options'        => array(
					'get-a-quote'   => 'Get a quote',
					'shopping-cart' => 'Shopping Cart',
					'search'        => 'Search Box',
					'custom-text'   => 'Custom Text',
				),
				'required-field' => array( $prefix . 'enable_header_customize', '=', '1' ),
			),

			array(
				'name'           => esc_html__( 'Custom text content?', 'cortana' ),
				'id'             => $prefix . 'header_customize_text',
				'type'           => 'textarea',
				'std'            => '',
				'required-field' => array( $prefix . 'enable_header_customize', '=', '1' ),
			),

			array(
				'name'    => esc_html__( 'Header Sticky', 'cortana' ),
				'id'      => $prefix . 'header_sticky',
				'type'    => 'button_set',
				'std'     => '-1',
				'options' => array(
					'-1' => esc_html__( 'Default', 'cortana' ),
					'1'  => esc_html__( 'Enable Header Sticky', 'cortana' ),
					'0'  => esc_html__( 'Disable Header Sticky', 'cortana' ),
				),
			),
			array(
				'name'           => esc_html__( 'Header Sticky Border Bottom', 'cortana' ),
				'id'             => $prefix . 'header_sticky_border',
				'type'           => 'button_set',
				'std'            => '-1',
				'options'        => array(
					'-1' => esc_html__( 'Default', 'cortana' ),
					'1'  => esc_html__( 'Show Border', 'cortana' ),
					'0'  => esc_html__( 'Hide Border', 'cortana' ),
				),
				'required-field' => array( $prefix . 'header_sticky', '<>', '0' ),
			),

			array(
				'name'    => esc_html__( 'Mobile Header Search Box', 'cortana' ),
				'id'      => $prefix . 'mobile_header_search_box',
				'type'    => 'button_set',
				'std'     => '-1',
				'options' => array(
					'-1' => esc_html__( 'Default', 'cortana' ),
					'1'  => esc_html__( 'Show', 'cortana' ),
					'0'  => esc_html__( 'Hide', 'cortana' )
				),
			),

			array(
				'name'    => esc_html__( 'Mobile Header Shopping Cart', 'cortana' ),
				'id'      => $prefix . 'mobile_header_shopping_cart',
				'type'    => 'button_set',
				'std'     => '-1',
				'options' => array(
					'-1' => esc_html__( 'Default', 'cortana' ),
					'1'  => esc_html__( 'Show', 'cortana' ),
					'0'  => esc_html__( 'Hide', 'cortana' )
				),

			),

			array(
				'id'               => $prefix . 'custom_logo',
				'name'             => esc_html__( 'Custom Logo', 'cortana' ),
				'desc'             => esc_html__( 'Upload custom logo in header.', 'cortana' ),
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
			),

		)
	);


// PAGE FOOTER
//--------------------------------------------------
	$meta_boxes[] = array(
		'id'     => $prefix . 'page_footer_meta_box',
		'title'  => esc_html__( 'Page Footer', 'cortana' ),
		'pages'  => array( 'post', 'page', 'portfolio', 'services', 'ourteam' ),
		'fields' => array(
			array(
				'name'    => esc_html__( 'Show/Hide Footer', 'cortana' ),
				'id'      => $prefix . 'footer_show_hide',
				'type'    => 'button_set',
				'std'     => '1',
				'options' => array(
					'1' => esc_html__( 'Show Footer', 'cortana' ),
					'0' => esc_html__( 'Hide Footer', 'cortana' )
				),
				'desc'    => esc_html__( 'Show/hide footer', 'cortana' ),
			),

			array(
				'name'       => esc_html__( 'Footer Layout', 'cortana' ),
				'id'         => $prefix . 'footer_layout',
				'type'       => 'image_set',
				'allowClear' => true,
				'width'      => '80px',
				'std'        => '',
				'options'    => array(
					'footer-1' =>  get_template_directory_uri()  . '/assets/images/theme-options/footer-layout-1.jpg',
					'footer-2' =>  get_template_directory_uri()  . '/assets/images/theme-options/footer-layout-2.jpg',
					'footer-3' =>  get_template_directory_uri()  . '/assets/images/theme-options/footer-layout-3.jpg',
					'footer-4' =>  get_template_directory_uri()  . '/assets/images/theme-options/footer-layout-4.jpg',
					'footer-5' =>  get_template_directory_uri()  . '/assets/images/theme-options/footer-layout-5.jpg',
					'footer-6' =>  get_template_directory_uri()  . '/assets/images/theme-options/footer-layout-6.jpg',
					'footer-7' =>  get_template_directory_uri()  . '/assets/images/theme-options/footer-layout-7.jpg',
					'footer-8' =>  get_template_directory_uri()  . '/assets/images/theme-options/footer-layout-8.jpg',
					'footer-9' =>  get_template_directory_uri()  . '/assets/images/theme-options/footer-layout-9.jpg',
				),
				'desc'       => esc_html__( 'Select Footer Layout (Not set to default).', 'cortana' ),
			),

			array(
				'name'    => esc_html__( 'Show/Hide Bottom Bar', 'cortana' ),
				'id'      => $prefix . 'bottom_bar',
				'type'    => 'button_set',
				'std'     => '-1',
				'options' => array(
					'-1' => 'Default',
					'1'  => 'Show Bottom Bar',
					'0'  => 'Hide Bottom Bar'
				),
				'desc'    => esc_html__( 'Show Hide Bottom Bar.', 'cortana' ),
			),

			array(
				'name'           => esc_html__( 'Bottom Bar Layout', 'cortana' ),
				'id'             => $prefix . 'bottom_bar_layout',
				'type'           => 'image_set',
				'allowClear'     => true,
				'width'          => '80px',
				'std'            => '',
				'options'        => array(
					'bottom-bar-1' =>  get_template_directory_uri()  . '/assets/images/theme-options/bottom-bar-layout-1.jpg',
					'bottom-bar-2' =>  get_template_directory_uri()  . '/assets/images/theme-options/bottom-bar-layout-2.jpg',
					'bottom-bar-3' =>  get_template_directory_uri()  . '/assets/images/theme-options/bottom-bar-layout-3.jpg',
					'bottom-bar-4' =>  get_template_directory_uri()  . '/assets/images/theme-options/bottom-bar-layout-4.jpg',
				),
				'desc'           => esc_html__( 'Bottom bar layout.', 'cortana' ),
				'required-field' => array( $prefix . 'bottom_bar', '<>', '0' ),
			),

			array(
				'name'           => esc_html__( 'Bottom Bar Left Sidebar', 'cortana' ),
				'id'             => $prefix . 'bottom_bar_left_sidebar',
				'type'           => 'sidebars',
				'placeholder'    => esc_html__( 'Select Sidebar', 'cortana' ),
				'std'            => '',
				'required-field' => array( $prefix . 'bottom_bar', '<>', '0' ),
			),

			array(
				'name'           => esc_html__( 'Bottom Bar Right Sidebar', 'cortana' ),
				'id'             => $prefix . 'bottom_bar_right_sidebar',
				'type'           => 'sidebars',
				'placeholder'    => esc_html__( 'Select Sidebar', 'cortana' ),
				'std'            => '',
				'required-field' => array( $prefix . 'bottom_bar', '<>', '0' ),
			),

		)
	);

// PAGE LAYOUT
	$meta_boxes[] = array(
		'id'     => $prefix . 'page_layout_meta_box',
		'title'  => esc_html__( 'Page Layout', 'cortana' ),
		'pages'  => array( 'post', 'page', 'services', 'ourteam' ),
		'fields' => array(
			array(
				'name'     => esc_html__( 'Layout Style', 'cortana' ),
				'id'       => $prefix . 'layout_style',
				'type'     => 'button_set',
				'options'  => array(
					'-1'    => esc_html__( 'Default', 'cortana' ),
					'boxed' => esc_html__( 'Boxed', 'cortana' ),
					'wide'  => esc_html__( 'Wide', 'cortana' )
				),
				'std'      => '-1',
				'multiple' => false,
			),
			array(
				'name'     => esc_html__( 'Page Layout', 'cortana' ),
				'id'       => $prefix . 'page_layout',
				'type'     => 'button_set',
				'options'  => array(
					'-1'              => esc_html__( 'Default', 'cortana' ),
					'full'            => esc_html__( 'Full Width', 'cortana' ),
					'container'       => esc_html__( 'Container', 'cortana' ),
					'container-fluid' => esc_html__( 'Container Fluid', 'cortana' ),
				),
				'std'      => '-1',
				'multiple' => false,
			),
			array(
				'name'       => esc_html__( 'Page Sidebar', 'cortana' ),
				'id'         => $prefix . 'page_sidebar',
				'type'       => 'image_set',
				'allowClear' => true,
				'options'    => array(
					'none'  =>  get_template_directory_uri()  . '/assets/images/theme-options/sidebar-none.png',
					'left'  =>  get_template_directory_uri()  . '/assets/images/theme-options/sidebar-left.png',
					'right' =>  get_template_directory_uri()  . '/assets/images/theme-options/sidebar-right.png',
					'both'  =>  get_template_directory_uri()  . '/assets/images/theme-options/sidebar-both.png'
				),
				'std'        => '',
				'multiple'   => false,

			),
			array(
				'name'           => esc_html__( 'Left Sidebar', 'cortana' ),
				'id'             => $prefix . 'page_left_sidebar',
				'placeholder'    => esc_html__( 'Select Sidebar', 'cortana' ),
				'type'           => 'sidebars',
				'std'            => '',
				'required-field' => array( $prefix . 'page_sidebar', '=', array( '', 'left', 'both' ) ),
			),

			array(
				'name'           => esc_html__( 'Right Sidebar', 'cortana' ),
				'id'             => $prefix . 'page_right_sidebar',
				'type'           => 'sidebars',
				'placeholder'    => esc_html__( 'Select Sidebar', 'cortana' ),
				'std'            => '',
				'required-field' => array( $prefix . 'page_sidebar', '=', array( '', 'right', 'both' ) ),
			),

			array(
				'name'           => esc_html__( 'Sidebar Width', 'cortana' ),
				'id'             => $prefix . 'sidebar_width',
				'type'           => 'button_set',
				'options'        => array(
					'-1'     => esc_html__( 'Default', 'cortana' ),
					'small'  => esc_html__( 'Small (1/4)', 'cortana' ),
					'larger' => esc_html__( 'Large (1/3)', 'cortana' )
				),
				'std'            => '-1',
				'multiple'       => false,
				'required-field' => array( $prefix . 'page_sidebar', '<>', 'none' ),
			),

			array(
				'name' => esc_html__( 'Page Class Extra', 'cortana' ),
				'id'   => $prefix . 'page_class_extra',
				'type' => 'text',
				'std'  => ''
			),
		)
	);

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) ) {
		foreach ( $meta_boxes as $meta_box ) {
			new RW_Meta_Box( $meta_box );
		}
	}
}

// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'g5plus_register_meta_boxes' );
