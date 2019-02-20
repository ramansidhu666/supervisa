<?php
function xmenu_get_transition() {
	return array(
		'none' => esc_html__('None','cortana'),
		'x-animate-slide-up' => esc_html__('Slide Up','cortana'),
		'x-animate-slide-down' => esc_html__('Slide Down','cortana'),
		'x-animate-slide-left' => esc_html__('Slide Left','cortana'),
		'x-animate-slide-right' => esc_html__('Slide Right','cortana'),
		'x-animate-sign-flip' => esc_html__('Sign Flip','cortana'),
	);
}

function xmenu_get_grid () {
	return array(
		'basic' => array(
			'text' => esc_html__('Basic','cortana'),
			'options' => array(
				'auto' => esc_html__('Automatic','cortana'),
				'x-col x-col-12-12' => esc_html__('Full Width','cortana'),
			)
		),
		'halves' => array(
			'text' => esc_html__('Halves','cortana'),
			'options' => array(
				'x-col x-col-6-12' => esc_html__('1/2','cortana'),
			)
		),
		'thirds' => array(
			'text' => esc_html__('Thirds','cortana'),
			'options' => array(
				'x-col x-col-4-12' => esc_html__('1/3','cortana'),
				'x-col x-col-8-12' => esc_html__('2/3','cortana'),
			)
		),
		'quarters' => array(
			'text' => __('Quarters','cortana'),
			'options' => array(
				'x-col x-col-3-12' => esc_html__('1/4','cortana'),
				'x-col x-col-9-12' => esc_html__('3/4','cortana'),
			)
		),
		'fifths' => array(
			'text' => esc_html__('Fifths','cortana'),
			'options' => array(
				'x-col x-col-2-10' => esc_html__('1/5','cortana'),
				'x-col x-col-4-10' => esc_html__('2/5','cortana'),
				'x-col x-col-6-10' => esc_html__('3/5','cortana'),
				'x-col x-col-8-10' => esc_html__('4/5','cortana'),
			)
		),
		'sixths' => array(
			'text' => esc_html__('Sixths','cortana'),
			'options' => array(
				'x-col x-col-2-12' => esc_html__('1/6','cortana'),
				'x-col x-col-10-12' => esc_html__('5/6','cortana'),
			)
		),
		'sevenths' => array(
			'text' => __('Sevenths','cortana'),
			'options' => array(
				'x-col x-col-1-7' => esc_html__('1/7','cortana'),
				'x-col x-col-2-7' => esc_html__('2/7','cortana'),
				'x-col x-col-3-7' => esc_html__('3/7','cortana'),
				'x-col x-col-4-7' => esc_html__('4/7','cortana'),
				'x-col x-col-5-7' => esc_html__('5/7','cortana'),
				'x-col x-col-6-7' => esc_html__('6/7','cortana'),
			)
		),
		'eighths' => array(
			'text' => esc_html__('Eighths','cortana'),
			'options' => array(
				'x-col x-col-1-8' => esc_html__('1/8','cortana'),
				'x-col x-col-3-8' => esc_html__('3/8','cortana'),
				'x-col x-col-5-8' => esc_html__('5/8','cortana'),
				'x-col x-col-7-8' => esc_html__('7/8','cortana'),
			)
		),
		'ninths' => array(
			'text' => esc_html__('Ninths','cortana'),
			'options' => array(
				'x-col x-col-1-9' => esc_html__('1/9','cortana'),
				'x-col x-col-2-9' => esc_html__('2/9','cortana'),
				'x-col x-col-4-9' => esc_html__('4/9','cortana'),
				'x-col x-col-5-9' => esc_html__('5/9','cortana'),
				'x-col x-col-7-9' => esc_html__('7/9','cortana'),
				'x-col x-col-8-9' => esc_html__('8/9','cortana'),
			)
		),
		'tenths' => array(
			'text' => esc_html__('Tenths','cortana'),
			'options' => array(
				'x-col x-col-1-10' => esc_html__('1/10','cortana'),
				'x-col x-col-3-10' => esc_html__('3/10','cortana'),
				'x-col x-col-7-10' => esc_html__('7/10','cortana'),
				'x-col x-col-9-10' => esc_html__('9/10','cortana'),
			)
		),
		'elevenths' => array(
			'text' => __('Elevenths','cortana'),
			'options' => array(
				'x-col x-col-1-11' => esc_html__('1/11','cortana'),
				'x-col x-col-2-11' => esc_html__('2/11','cortana'),
				'x-col x-col-3-11' => esc_html__('3/11','cortana'),
				'x-col x-col-4-11' => esc_html__('4/11','cortana'),
				'x-col x-col-5-11' => esc_html__('5/11','cortana'),
				'x-col x-col-6-11' => esc_html__('6/11','cortana'),
				'x-col x-col-7-11' => esc_html__('7/11','cortana'),
				'x-col x-col-8-11' => esc_html__('8/11','cortana'),
				'x-col x-col-9-11' => esc_html__('9/11','cortana'),
				'x-col x-col-10-11' => esc_html__('10/11','cortana'),
			)
		),
		'twelfths' => array(
			'text' => esc_html__('Twelfths','cortana'),
			'options' => array(
				'x-col x-col-1-12' => esc_html__('1/12','cortana'),
				'x-col x-col-5-12' => esc_html__('5/12','cortana'),
				'x-col x-col-7-12' => esc_html__('7/12','cortana'),
				'x-col x-col-11-12' => esc_html__('11/12','cortana'),
			)
		),
	);
}


global $xmenu_item_settings;
$xmenu_item_settings = array(
	'general' => array(
		'text' => esc_html__('General','cortana'),
		'icon' => 'fa fa-cogs',
		'config' => array(
			'general-heading' => array(
				'text' => esc_html__('General','cortana'),
				'type' => 'heading'
			),
			'general-url' => array(
				'text' => esc_html__('URL','cortana'),
				'type' => 'text',
				'std'  => '',
			),
			'general-title' => array(
				'text' => esc_html__('Navigation Label','cortana'),
				'type' => 'text',
				'std'  => '',
			),
			'general-attr-title' => array(
				'text' => esc_html__('Title Attribute','cortana'),
				'type' => 'text',
				'std'  => '',
			),
			'general-target' => array(
				'text' => esc_html__('Open link in a new window/tab','cortana'),
				'type' => 'checkbox',
				'std'  => '',
				'value' => '_blank',
			),
			'general-classes' => array(
				'text' => esc_html__('CSS Classes (optional)','cortana'),
				'type' => 'array',
				'std'  => '',
			),
			'general-xfn' => array(
				'text' => esc_html__('Link Relationship (XFN)','cortana'),
				'type' => 'text',
				'std'  => '',
			),
			'general-description' => array(
				'text' => esc_html__('Description','cortana'),
				'type' => 'textarea',
				'std'  => '',
			),
			'general-other-heading' => array(
				'text' => esc_html__('Other','cortana'),
				'type' => 'heading'
			),
			'other-disable-text' => array(
				'text' => esc_html__('Disable Text','cortana'),
				'type' => 'checkbox',
				'std' => ''
			),
			'other-disable-menu-item' => array(
				'text' => esc_html__('Disable Menu Item','cortana'),
				'type' => 'checkbox',
				'std' => ''
			),
			'other-disable-link' => array(
				'text' => esc_html__('Disable Link','cortana'),
				'type' => 'checkbox',
				'std' => ''
			),
			'other-display-header-column' => array(
				'text' => esc_html__('Display as a Sub Menu column header','cortana'),
				'type' => 'checkbox',
				'std' => ''
			),
			'other-feature-text' => array(
				'text' => esc_html__('Menu Feature Text','cortana'),
				'type' => 'text',
				'std' => ''
			),
		)
	),
	'icon' => array(
		'text' => esc_html__('Icon','cortana'),
		'icon' => 'fa fa-qrcode',
		'config' => array(
			'icon-heading' => array(
				'text' => esc_html__('Icon','cortana'),
				'type' => 'heading'
			),
			'icon-value' => array(
				'text' => esc_html__('Set Icon','cortana'),
				'type' => 'icon',
				'std'  => '',
			),
			'icon-position' => array(
				'text' => esc_html__('Icon Position','cortana'),
				'type' => 'select',
				'std'  => 'left',
				'options' => array(
					'left' => esc_html__('Left of Menu Text','cortana'),
					'right' => esc_html__('Right of Menu Text','cortana'),
				)
			),
			'icon-padding' => array(
				'text' => esc_html__('Padding Icon and Text Menu','cortana'),
				'type' => 'text',
				'std'  => '',
				'des' => esc_html__('Padding between Icon and Text Menu (px). Do not include units','cortana')
			)
		)
	),
	'image' => array(
		'text' => esc_html__('Image','cortana'),
		'icon' => 'fa fa-picture-o',
		'config' => array(
			'image-heading' => array(
				'text' => esc_html__('Image','cortana'),
				'type' => 'heading'
			),
			'image-url' => array(
				'text' => esc_html__('Image Url','cortana'),
				'type' => 'image',
				'std'  => '',
			),
			'image-size' => array(
				'text' => esc_html__('Image Size','cortana'),
				'type' => 'select',
				'std'  => 'inherit',
				'options' => xmenu_get_image_size()
			),
			'image-dimensions' => array(
				'text' => esc_html__('Image Dimensions','cortana'),
				'type' => 'select',
				'std'  => 'inherit',
				'options' => array(
					'inherit' => 'Inherit from Menu Settings',
					'custom' => 'Custom',
				)
			),
			'image-width' => array(
				'text' => esc_html__('Image Width','cortana'),
				'type' => 'text',
				'std'  => '',
				'des' => esc_html__('Image width attribute (px). Do not include units. Only valid if "Image Dimension" is set to "Custom" above','cortana')
			),
			'image-height' => array(
				'text' => esc_html__('Image Height','cortana'),
				'type' => 'text',
				'std'  => '',
				'des' => esc_html__('Image width attribute (px). Do not include units. Only valid if "Image Dimension" is set to "Custom" above','cortana')
			),
			'image-layout' => array(
				'text' => esc_html__('Image Layout','cortana'),
				'type' => 'select',
				'std'  => 'image-only',
				'options' => array(
					'image-only' => esc_html__('Image Only','cortana'),
					'left' => esc_html__('Image Left','cortana'),
					'right' => esc_html__('Image Right','cortana'),
					'above' => esc_html__('Image Above','cortana'),
					'below' => esc_html__('Image Below','cortana'),
				)
			),
			'image-feature' => array(
				'text' => esc_html__('Use Feature Image','cortana'),
				'type' => 'checkbox',
				'std'  => '',
				'des' => 'Use Feature Image from Post/Page Menu Item',
			),
		)
	),

	'layout' => array(
		'text' => esc_html__('Layout','cortana'),
		'icon' => 'fa fa-columns',
		'config' => array(
			'layout-heading' => array(
				'text' => esc_html__('Layout','cortana'),
				'type' => 'heading'
			),
			'layout-width' => array(
				'text' => esc_html__('Menu Item Width','cortana'),
				'type' => 'select-group',
				'std'  => 'auto',
				'options' => xmenu_get_grid()
			),
			'layout-text-align' => array(
				'text' => esc_html__('Item Content Alignment','cortana'),
				'type' => 'select',
				'std'  => 'none',
				'options' => array(
					'none' => esc_html__('Default','cortana'),
					'left' => esc_html__('Text Left','cortana'),
					'center' => esc_html__('Text Center','cortana'),
					'right' => esc_html__('Text Right','cortana'),
				)
			),
			'layout-padding' => array(
				'text' => esc_html__('Padding','cortana'),
				'type' => 'text',
				'std'  => '',
				'des' => esc_html__('Set padding for menu item. Include the units.','cortana'),
			),
			'layout-margin' => array(
				'text' => esc_html__('Margin','cortana'),
				'type' => 'text',
				'std'  => '',
				'des' => esc_html__('Set margin for menu item. Include the units.','cortana'),
			),
			'layout-new-row' => array(
				'text' => esc_html__('New Row','cortana'),
				'type' => 'checkbox',
				'std'  => ''
			),
		)
	),
	'submenu' => array(
		'text' => esc_html__('Sub Menu','cortana'),
		'icon' => 'fa fa-list-alt',
		'config' => array(
			'submenu-heading' => array(
				'text' => esc_html__('Sub Menu','cortana'),
				'type' => 'heading'
			),
			'submenu-type' => array(
				'text' => esc_html__('Sub Menu Type','cortana'),
				'type' => 'select',
				'std'  => 'standard',
				'options' => array(
					'standard' => esc_html__('Standard','cortana'),
					'multi-column' => esc_html__('Multi Column','cortana'),
					/*'stack' => esc_html__('Stack','cortana'),*/
					'tab' => esc_html__('Tab','cortana'),
				)
			),
			'submenu-position' => array(
				'text' => esc_html__('Sub Menu Position','cortana'),
				'type' => 'select',
				'std'  => '',
				'options' => array(
					'' => esc_html__('Automatic','cortana'),
					'pos-left-menu-parent' => esc_html__('Left of Menu Parent','cortana'),
					'pos-right-menu-parent' => esc_html__('Right of Menu Parent','cortana'),
					'pos-center-menu-parent' => esc_html__('Center of Menu Parent','cortana'),
					'pos-left-menu-bar' => esc_html__('Left of Menu Bar','cortana'),
					'pos-right-menu-bar' => esc_html__('Right of Menu Bar','cortana'),
					'pos-full' => esc_html__('Full Size','cortana'),
				)
			),
			'submenu-width-custom' => array(
				'text' => esc_html__('Sub Menu Width Custom','cortana'),
				'type' => 'text',
				'std'  => '',
				'des' => esc_html__('Set custom Sub Menu Width. Include the units (px/em/%).','cortana'),
			),
			'submenu-col-width-default' => array(
				'text' => esc_html__('Sub Menu Column Width Default','cortana'),
				'type' => 'select-group',
				'std'  => 'auto',
				'options' => xmenu_get_grid()
			),
			'submenu-col-spacing-default' => array(
				'text' => esc_html__('Sub Menu Column Spacing Default','cortana'),
				'type' => 'text',
				'std'  => '',
				'des' => esc_html__('Set sub menu column spacing default. Do not include unit.','cortana'),
			),
			'submenu-list-style' => array(
				'text' => esc_html__('Sub Menu List Style','cortana'),
				'type' => 'select',
				'std'  => 'none',
				'options' => array(
					'none' => esc_html__('None','cortana'),
					'disc' => esc_html__('Disc','cortana'),
					'square' => esc_html__('Square','cortana'),
					'circle' => esc_html__('Circle','cortana'),
				)
			),
			'submenu-tab-position' => array(
				'text' => esc_html__('Tab Position','cortana'),
				'type' => 'select',
				'std'  => 'left',
				'des' => esc_html__('Tab Position set to "Sub Menu Type" is "TAB".','cortana'),
				'options' => array(
					'left' => esc_html__('Left','cortana'),
					'right' => esc_html__('Right','cortana'),
				)
			),
			'submenu-animation' => array(
				'text' => esc_html__('Sub Menu Animation','cortana'),
				'type' => 'select',
				'std'  => 'x-animate-sign-flip',
				'options' => xmenu_get_transition()
			),
		)
	),
	'custom-content' => array(
		'text' => esc_html__('Custom Content','cortana'),
		'icon' => 'fa fa-code',
		'config' => array(
			'custom-content-heading' => array(
				'text' => esc_html__('Custom Content','cortana'),
				'type' => 'heading'
			),
			'custom-content-value' => array(
				'text' => esc_html__('Custom Content','cortana'),
				'type' => 'textarea',
				'std'  => '',
				'des' => esc_html__('Can contain HTML and shortcodes','cortana'),
				'height' => '300px'
			),
		)
	),
	'widget' => array(
		'text' => esc_html__('Widget Area','cortana'),
		'icon' => 'fa-puzzle-piece',
		'config' => array(
			'widget-heading' => array(
				'text' => esc_html__('Widget Area','cortana'),
				'type' => 'heading'
			),
			'widget-area' => array(
				'text' => esc_html__('Widget Area','cortana'),
				'type' => 'text',
				'std'  => '',
				'des' => esc_html__('Enter a name for your Widget Area, and a widget area specifically for this menu item will be automatically be created in the <a href="widgets.php" target="_blank">Widgets Screen</a>','cortana'),
			),
		)
	),
	'customize-style' => array(
		'text' => esc_html__('Customize Style','cortana'),
		'icon' => 'fa-paint-brush',
		'config' => array(
			'custom-style-menu-heading' => array(
				'text' => esc_html__('Menu Item','cortana'),
				'type' => 'heading'
			),
			'custom-style-menu-bg-color' => array(
				'text' => esc_html__('Background Color','cortana'),
				'type' => 'color',
				'std'  => '',
			),
			'custom-style-menu-text-color' => array(
				'text' => esc_html__('Text Color','cortana'),
				'type' => 'color',
				'std'  => '',
			),
			'custom-style-menu-bg-color-active' => array(
				'text' => esc_html__('Background Color [Active]','cortana'),
				'type' => 'color',
				'std'  => '',
			),
			'custom-style-menu-text-color-active' => array(
				'text' => esc_html__('Text Color [Active]','cortana'),
				'type' => 'color',
				'std'  => '',
			),
			'custom-style-menu-bg-image' => array(
				'text' => esc_html__('Background Image','cortana'),
				'type' => 'image',
				'std'  => '',
			),
			'custom-style-menu-bg-image-repeat' => array(
				'text' => esc_html__('Background Image Repeat','cortana'),
				'type' => 'select',
				'std' => 'no-repeat',
				'hide-label' => 'true',
				'options' => array(
					'no-repeat' => 'no-repeat',
					'repeat' => 'repeat',
					'repeat-x' => 'repeat-x',
					'repeat-y' => 'repeat-y'
				)
			),
			'custom-style-menu-bg-image-attachment' => array(
				'text' => esc_html__('Background Image Attachment','cortana'),
				'type' => 'select',
				'std' => 'scroll',
				'hide-label' => 'true',
				'options' => array(
					'scroll' => 'scroll',
					'fixed' => 'fixed'
				)
			),
			'custom-style-menu-bg-image-position' => array(
				'text' => esc_html__('Background Image Position','cortana'),
				'type' => 'select',
				'std' => 'center',
				'hide-label' => 'true',
				'options' => array(
					'center' => 'center',
					'center left' => 'center left',
					'center right' => 'center right',
					'top left' => 'top left',
					'top center' => 'top center',
					'top right' => 'top right',
					'bottom left' => 'bottom left',
					'bottom center' => 'bottom center',
					'bottom right' => 'bottom right'
				)
			),
			'custom-style-menu-bg-image-size' => array(
				'text' => esc_html__('Background Image Size','cortana'),
				'type' => 'select',
				'std' => 'auto',
				'hide-label' => 'true',
				'options' => array(
					'auto' => 'Keep original',
					'100% auto' => 'Stretch to width',
					'auto 100%' => 'Stretch to height',
					'cover' => 'Cover',
					'contain' => 'Contain'
				)
			),
			'custom-style-sub-menu-heading' => array(
				'text' => esc_html__('Sub Menu','cortana'),
				'type' => 'heading'
			),
			'custom-style-sub-menu-bg-color' => array(
				'text' => esc_html__('Background Color','cortana'),
				'type' => 'color',
				'std'  => '',
			),
			'custom-style-sub-menu-text-color' => array(
				'text' => esc_html__('Text Color','cortana'),
				'type' => 'color',
				'std'  => '',
			),
			'custom-style-sub-menu-bg-image' => array(
				'text' => esc_html__('Background Image','cortana'),
				'type' => 'image',
				'std'  => '',
			),
			'custom-style-sub-menu-bg-image-repeat' => array(
				'text' => esc_html__('Background Image Repeat','cortana'),
				'type' => 'select',
				'std' => 'no-repeat',
				'hide-label' => 'true',
				'options' => array(
					'no-repeat' => 'no-repeat',
					'repeat' => 'repeat',
					'repeat-x' => 'repeat-x',
					'repeat-y' => 'repeat-y'
				)
			),
			'custom-style-sub-menu-bg-image-attachment' => array(
				'text' => esc_html__('Background Image Attachment','cortana'),
				'type' => 'select',
				'std' => 'scroll',
				'hide-label' => 'true',
				'options' => array(
					'scroll' => 'scroll',
					'fixed' => 'fixed'
				)
			),
			'custom-style-sub-menu-bg-image-position' => array(
				'text' => esc_html__('Background Image Position','cortana'),
				'type' => 'select',
				'std' => 'center',
				'hide-label' => 'true',
				'options' => array(
					'center' => 'center',
					'center left' => 'center left',
					'center right' => 'center right',
					'top left' => 'top left',
					'top center' => 'top center',
					'top right' => 'top right',
					'bottom left' => 'bottom left',
					'bottom center' => 'bottom center',
					'bottom right' => 'bottom right'
				)
			),
			'custom-style-sub-menu-bg-image-size' => array(
				'text' => esc_html__('Background Image Size','cortana'),
				'type' => 'select',
				'std' => 'auto',
				'hide-label' => 'true',
				'options' => array(
					'auto' => 'Keep original',
					'100% auto' => 'Stretch to width',
					'auto 100%' => 'Stretch to height',
					'cover' => 'Cover',
					'contain' => 'Contain'
				)
			),
			'custom-style-col-min-width' => array(
				'text' => esc_html__('Column Min Width','cortana'),
				'type' => 'text',
				'std'  => '',
				'des' => esc_html__('Set min-width for Sub Menu Column (px). Not include the units.','cortana'),
			),
			'custom-style-padding' => array(
				'text' => esc_html__('Padding','cortana'),
				'type' => 'text',
				'std'  => '',
				'des' => esc_html__('Set padding for Sub Menu. Include the units.','cortana'),
			),

			'custom-style-feature-menu-text-heading' => array(
				'text' => esc_html__('Menu Feature Text','cortana'),
				'type' => 'heading'
			),
			'custom-style-feature-menu-text-type' => array(
				'text' => esc_html__('Feature Menu Type','cortana'),
				'type' => 'select',
				'std'  => '',
				'options' => array(
					'' => esc_html__('Standard','cortana'),
					'x-feature-menu-not-float' => esc_html__('Not Float','cortana')
				)
			),
			'custom-style-feature-menu-text-bg-color' => array(
				'text' => esc_html__('Background Color','cortana'),
				'type' => 'color',
				'std'  => '',
			),
			'custom-style-feature-menu-text-color' => array(
				'text' => esc_html__('Text Color','cortana'),
				'type' => 'color',
				'std'  => '',
			),
			'custom-style-feature-menu-text-top' => array(
				'text' => esc_html__('Position Top','cortana'),
				'type' => 'text',
				'std'  => '',
				'des'  => 'Position Top (px) Feature Menu Text. Do not include units.',
			),
			'custom-style-feature-menu-text-left' => array(
				'text' => esc_html__('Position Left','cortana'),
				'type' => 'text',
				'std'  => '',
				'des'  => 'Position Left (px) Feature Menu Text. Do not include units.',
			),
		)
	),
	'responsive' => array(
		'text' => esc_html__('Responsive','cortana'),
		'icon' => 'fa-desktop',
		'config' => array(
			'responsive-heading' => array(
				'text' => esc_html__('Responsive','cortana'),
				'type' => 'heading'
			),
			'responsive-hide-mobile-css' => array(
				'text' => esc_html__('Hide item on mobile via CSS','cortana'),
				'type' => 'checkbox',
				'std' => ''
			),
			'responsive-hide-desktop-css' => array(
				'text' => esc_html__('Hide item on desktop via CSS','cortana'),
				'type' => 'checkbox',
				'std' => ''
			),
			'responsive-hide-mobile-css-submenu' => array(
				'text' => esc_html__('Hide sub menu on mobile via CSS','cortana'),
				'type' => 'checkbox',
				'std' => ''
			),
			'responsive-remove-mobile' => array(
				'text' => esc_html__('Remove this item when mobile device is detected via wp_is_mobile()','cortana'),
				'type' => 'checkbox',
				'std' => ''
			),
			'responsive-remove-desktop' => array(
				'text' => esc_html__('Remove this item when desktop device is NOT detected via wp_is_mobile()','cortana'),
				'type' => 'checkbox',
				'std' => ''
			),
			'responsive-remove-mobile-submenu' => array(
				'text' => esc_html__('Remove sub menu when desktop device is NOT detected via wp_is_mobile()','cortana'),
				'type' => 'checkbox',
				'std' => ''
			),
		),
	),
	'responsive' => array(
		'text' => esc_html__('Responsive','cortana'),
		'icon' => 'fa-desktop',
		'config' => array(
			'responsive-heading' => array(
				'text' => esc_html__('Responsive','cortana'),
				'type' => 'heading'
			),
			'responsive-hide-mobile-css' => array(
				'text' => esc_html__('Hide item on mobile via CSS','cortana'),
				'type' => 'checkbox',
				'std' => ''
			),
			'responsive-hide-desktop-css' => array(
				'text' => esc_html__('Hide item on desktop via CSS','cortana'),
				'type' => 'checkbox',
				'std' => ''
			),
			'responsive-hide-mobile-css-submenu' => array(
				'text' => esc_html__('Hide sub menu on mobile via CSS','cortana'),
				'type' => 'checkbox',
				'std' => ''
			),
			'responsive-hide-desktop-css-submenu' => array(
				'text' => esc_html__('Hide sub menu on desktop via CSS','cortana'),
				'type' => 'checkbox',
				'std' => ''
			),
			/*'responsive-remove-mobile' => array(
				'text' => __('Remove this item when mobile device is detected via wp_is_mobile()','cortana'),
				'type' => 'checkbox',
				'std' => ''
			),
			'responsive-remove-desktop' => array(
				'text' => __('Remove this item when desktop device is NOT detected via wp_is_mobile()','cortana'),
				'type' => 'checkbox',
				'std' => ''
			),
			'responsive-remove-mobile-submenu' => array(
				'text' => __('Remove sub menu when desktop device is NOT detected via wp_is_mobile()','cortana'),
				'type' => 'checkbox',
				'std' => ''
			),*/
		),
	)
);

global $xmenu_item_defaults;
$xmenu_item_defaults = xmenu_get_item_defaults($xmenu_item_settings);

function xmenu_get_item_defaults($items_setting, $defaults = array()) {
	if (!$defaults) {
		$defaults = array(
			'nosave-type_label' => '',
			'nosave-type' => '',
			'nosave-change' => 0
		);
	}

	foreach ($items_setting as $seting_key => $setting) {
		foreach ($setting['config'] as $key => $value) {
			if (isset($value['config']) && $value['config']) {

			}
			else {
				if ($value['type'] != 'heading') {
					$defaults[$key] = $value['std'];
				}
			}

		}
	}
	return $defaults;
}
function xmenu_get_image_size($is_setting = 0) {
	global $_wp_additional_image_sizes;

	$sizes = array();
	$get_intermediate_image_sizes = get_intermediate_image_sizes();

	// Create the full array with sizes and crop info
	foreach( $get_intermediate_image_sizes as $_size ) {

		if ( in_array( $_size, array( 'thumbnail', 'medium', 'large' ) ) ) {

			$sizes[ $_size ]['width'] = get_option( $_size . '_size_w' );
			$sizes[ $_size ]['height'] = get_option( $_size . '_size_h' );
			$sizes[ $_size ]['crop'] = (bool) get_option( $_size . '_crop' );

		} elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {

			$sizes[ $_size ] = array(
				'width' => $_wp_additional_image_sizes[ $_size ]['width'],
				'height' => $_wp_additional_image_sizes[ $_size ]['height'],
				'crop' =>  $_wp_additional_image_sizes[ $_size ]['crop']
			);

		}

	}
	$image_size = array();
	if (!$is_setting) {
		$image_size ['inherit'] = esc_html__('Inherit from Menu Setting','cortana');
	}
	$image_size ['full'] = esc_html__('Full Size','cortana');
	foreach ($sizes as $key => $value) {
		$image_size[$key] = ucfirst($key) . ' (' . $value['width'] . ' x ' . $value['height'] .')' . ($value['crop'] ? '[cropped]' : '') ;
	}
	return $image_size;
}