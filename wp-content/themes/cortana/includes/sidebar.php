<?php
if ( !function_exists( 'g5plus_register_sidebar' ) ) {
	function g5plus_register_sidebar() {
		register_sidebar( array(
			'name'          => esc_html__( "Sidebar 1", 'cortana' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( "Widget Area 1", 'cortana' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		) );
		register_sidebar( array(
			'name'          => esc_html__( "Sidebar 2", 'cortana' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( "Widget Area 2", 'cortana' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( "Top Drawer", 'cortana' ),
			'id'            => 'top_drawer_sidebar',
			'description'   => esc_html__( "Top Drawer", 'cortana' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( "Footer Above", 'cortana' ),
			'id'            => 'footer-above',
			'description'   => esc_html__( "Footer above", 'cortana' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( "Footer 1", 'cortana' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( "Footer 1", 'cortana' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( "Footer 2", 'cortana' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( "Footer 2", 'cortana' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( "Footer 3", 'cortana' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( "Footer 3", 'cortana' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( "Footer 4", 'cortana' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( "Footer 4", 'cortana' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( "Bottom Bar Left", 'cortana' ),
			'id'            => 'bottom_bar_left',
			'description'   => esc_html__( "Bottom Bar Left", 'cortana' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( "Bottom Bar Right", 'cortana' ),
			'id'            => 'bottom_bar_right',
			'description'   => esc_html__( "Bottom Bar Right", 'cortana' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		) );

		/*register_sidebar( array(
			'name'          => esc_html__( 'Woocommerce', 'cortana' ),
			'id'            => 'woocommerce',
			'description'   => esc_html__( 'Woocommerce', 'cortana' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		) );*/

		register_sidebar( array(
			'name'          => esc_html__( "Top Bar Left", 'cortana' ),
			'id'            => 'top_bar_left',
			'description'   => esc_html__( "Top Bar Left", 'cortana' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( "Top Bar Right", 'cortana' ),
			'id'            => 'top_bar_right',
			'description'   => esc_html__( "Top Bar Right", 'cortana' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( "Portfolito", 'cortana' ),
			'id'            => 'portfolio',
			'description'   => esc_html__( "Portfolito Sidebar", 'cortana' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		) );
		register_sidebar( array(
			'name'          => esc_html__( "Sidebar Page", 'cortana' ),
			'id'            => 'sidebar-page',
			'description'   => esc_html__( "Page Sidebar", 'cortana' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		) );
		register_sidebar( array(
			'name'          => esc_html__( "Sidebar Services", 'cortana' ),
			'id'            => 'sidebar-services',
			'description'   => esc_html__( "Page Services", 'cortana' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		) );
		register_sidebar( array(
			'name'          => esc_html__( "Sidebar Bottom Services", 'cortana' ),
			'id'            => 'sidebar-services-bottom',
			'description'   => esc_html__( "Page Bottom Services", 'cortana' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title"><span>',
			'after_title'   => '</span></h4>',
		) );
	}

	add_action( 'widgets_init', 'g5plus_register_sidebar' );
}

if ( !function_exists( 'g5plus_redux_custom_widget_area_filter' ) ) {
	function g5plus_redux_custom_widget_area_filter( $arg ) {
		return array(
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>'
		);
	}

	add_filter( 'redux_custom_widget_args', 'g5plus_redux_custom_widget_area_filter' );
}

