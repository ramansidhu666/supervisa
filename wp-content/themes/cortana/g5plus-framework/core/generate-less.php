<?php
/**
 * Created by PhpStorm.
 * User: duonglh
 * Date: 8/23/14
 * Time: 3:01 PM
 */

function g5plus_generate_less() {
	try {
		//global $g5plus_options;
		$g5plus_options = get_option( 'g5plus_cortana_options' );
		if ( !defined( 'FS_METHOD' ) ) {
			define( 'FS_METHOD', 'direct' );
		}

		$regex = array(
			"`(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+`ism" => "\n"
		);

		$home_preloader = $g5plus_options['home_preloader'];
		$css_variable   = g5plus_custom_css_variable();
		$custom_css     = g5plus_custom_css();

		if ( !class_exists( 'Less_Parser' ) ) {
			require_once get_template_directory() . '/g5plus-framework/less/Autoloader.php';
			Less_Autoloader::register();
		}
		$parser = new Less_Parser( array( 'compress' => true ) );

		$parser->parse( $css_variable );
		$parser->parseFile( get_template_directory()  . '/assets/css/less/style.less' );
		//$fileout = trailingslashit( get_template_directory() ) . "assets/css/less/config.less";
//		if ( !file_put_contents( $fileout, $css_variable, LOCK_EX ) ) {
//			@chmod( $fileout, 0777 );
//			file_put_contents( $fileout, $css_variable, LOCK_EX );
//		}
		if ( $home_preloader != 'none' && !empty( $home_preloader ) ) {
			$parser->parseFile( get_template_directory()  . '/assets/css/less/loading/' . $home_preloader . '.less' );
		}

		if ( isset( $g5plus_options['panel_selector'] ) && ( $g5plus_options['panel_selector'] == 1 ) ) {
			$parser->parseFile( get_template_directory()  . '/assets/css/less/panel-style-selector.less' );
		}

		$parser->parse( $custom_css );
		$css = $parser->getCss();

		$css = preg_replace( array_keys( $regex ), $regex, $css );

		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		WP_Filesystem();
		global $wp_filesystem;


		if ( !$wp_filesystem->put_contents( trailingslashit( get_template_directory() ) . "style.min.css", $css, FS_CHMOD_FILE ) ) {
			return array(
				'status'  => 'error',
				'message' => esc_html__( 'Could not save file', 'cortana' )
			);
		}

		$theme_info = $wp_filesystem->get_contents( trailingslashit( get_template_directory() ) . "theme-info.txt" );

		$parser = new Less_Parser();
		$parser->parse( $css_variable );
		$parser->parseFile( get_template_directory()  . '/assets/css/less/style.less' );
		if ( $home_preloader != 'none' && !empty( $home_preloader ) ) {
			$parser->parseFile( get_template_directory()  . '/assets/css/less/loading/' . $home_preloader . '.less' );
		}

		if ( isset( $g5plus_options['panel_selector'] ) && ( $g5plus_options['panel_selector'] == 1 ) ) {
			$parser->parseFile( get_template_directory()  . '/assets/css/less/panel-style-selector.less' );
		}


		$parser->parse( $custom_css );
		$css = $parser->getCss();

		$css = $theme_info . "\n" . $css;

		$css = preg_replace( array_keys( $regex ), $regex, $css );

		if ( !$wp_filesystem->put_contents( trailingslashit( get_template_directory() ) . "style.css", $css, FS_CHMOD_FILE ) ) {
			return array(
				'status'  => 'error',
				'message' => esc_html__( 'Could not save file', 'cortana' )
			);
		}

		return array(
			'status'  => 'success',
			'message' => ''
		);

	} catch ( Exception $e ) {
		$error_message = $e->getMessage();

		return array(
			'status'  => 'error',
			'message' => $error_message
		);
	}
}