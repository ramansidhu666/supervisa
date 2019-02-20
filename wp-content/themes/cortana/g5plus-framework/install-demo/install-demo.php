<?php
if ( !class_exists( 'G5Plus_Install_Demo' ) ) {
	class G5Plus_Install_Demo {
		function __construct() {
			add_filter( 'admin_enqueue_scripts', array( $this, 'setting_assets' ) );
			add_action( 'admin_menu', array( $this, 'install_demo_menu' ) );
			add_action( 'wp_ajax_g5plus_install_demo', array( $this, 'install_demo' ) );
		}

		function setting_assets( $hook ) {
			if ( $hook == 'appearance_page_install-demo' ) {
				wp_enqueue_style( 'g5plus-install-demo-data',  get_template_directory_uri()  . '/g5plus-framework/install-demo/assets/css/admin.css' );
				wp_enqueue_script( 'g5plus-install-demo-data',  get_template_directory_uri()  . '/g5plus-framework/install-demo/assets/js/app.js', false, true );
				wp_localize_script( 'g5plus-install-demo-data', 'g5plus_install_demo_meta', array(
					'ajax_url' => admin_url( 'admin-ajax.php?activate-multi=true' )
				) );
			}
		}

		function install_demo_menu() {
			add_theme_page( 'Install Demo Data', 'Install Demo Data', 'manage_options', 'install-demo', array( $this, 'control_panel' ) );
		}

		function  install_demo() {
			if ( !( isset( $_REQUEST['security'] ) && current_user_can( 'manage_options' ) ) ) {
				ob_end_clean();
				$data_response = array(
					'code'    => 'error',
					'message' => esc_html__( "Permission error!", 'cortana' )
				);
				echo json_encode( $data_response );
				die();
			}
			set_time_limit( 1800 );
			if ( !defined( 'FS_METHOD' ) ) {
				define( 'FS_METHOD', 'direct' );
			}


			if ( !defined( 'WP_LOAD_IMPORTERS' ) ) {
				define( 'WP_LOAD_IMPORTERS', true );
			}

			// Load Importer API
			require_once ABSPATH . 'wp-admin/includes/import.php';

			if ( file_exists( ABSPATH . 'wp-content/plugins/revslider/revslider_admin.php' ) ) {
				require_once( ABSPATH . 'wp-content/plugins/revslider/revslider_admin.php' );
			}

			$importer_error      = false;
			$import_file_path    = trailingslashit( get_template_directory() ) . "assets" . DIRECTORY_SEPARATOR . "data-demo" . DIRECTORY_SEPARATOR . "demo-data.xml";
			$import_setting_path = trailingslashit( get_template_directory() ) . "assets" . DIRECTORY_SEPARATOR . "data-demo" . DIRECTORY_SEPARATOR . "setting.json";

			//check if wp_importer, the base importer class is available, otherwise include it
			if ( !class_exists( 'WP_Importer' ) ) {
				$class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
				if ( file_exists( $class_wp_importer ) ) {
					require_once( $class_wp_importer );
				} else {
					$importer_error = true;
				}
			}

			if ( !class_exists( 'G5_Import' ) ) {
				$class_wp_import = get_template_directory()  . '/g5plus-framework/install-demo/wordpress-importer.php';
				if ( file_exists( $class_wp_import ) ) {
					require_once( $class_wp_import );
				} else {
					$importer_error = true;
				}
			}

			if ( $importer_error !== false ) {
				ob_end_clean();
				$data_response = array(
					'code'    => 'fileNotFound',
					'message' => esc_html__( "The Auto importing script could not be loaded. please use the wordpress importer and import the XML file that is located in your themes folder manually.", 'cortana' )
				);
				echo json_encode( $data_response );
				die();
			} else {

				if ( class_exists( 'G5_Import' ) ) {
					include_once( get_template_directory() . '/g5plus-framework/install-demo/g5plus_import_class.php' );
				}

				$g5plus_import = new g5plus_import();
				$type          = $_REQUEST['type'];
				$other_data    = $_REQUEST['other_data'];
				ob_start();
				switch ( trim( $type ) ) {
					case 'init':
						$demo_data_directory = get_template_directory() . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'data-demo' . DIRECTORY_SEPARATOR;
						$arr_demo_file       = array(
							$demo_data_directory . 'demo-data.xml',
							$demo_data_directory . 'setting.json',
							$demo_data_directory . 'change-data.json',
						);
						foreach ( $arr_demo_file as $file_demo ) {
							if ( !file_exists( $file_demo ) ) {
								ob_end_clean();
								$data_response = array(
									'code'    => 'fileNotFound',
									'message' => esc_html__( "File not found! Please check file exists in directory:\n[your-theme]/assets/data-demo/", 'cortana' )
								);
								echo json_encode( $data_response );
								die();
							}
						}
						if ( $handle = opendir( trailingslashit( get_template_directory() ) . "assets" . DIRECTORY_SEPARATOR . "data-demo" . DIRECTORY_SEPARATOR . "log" ) ) {
							$arr_other_data = explode( '||', $other_data );
							while ( false !== ( $entry = readdir( $handle ) ) ) {
								if ( in_array( $entry, $arr_other_data ) ) {
									continue;
								}
								if ( $entry != "." && $entry != ".." ) {
									unlink( trailingslashit( get_template_directory() ) . "assets" . DIRECTORY_SEPARATOR . "data-demo" . DIRECTORY_SEPARATOR . "log" . DIRECTORY_SEPARATOR . $entry );
								}
							}
						}

						ob_end_clean();
						$data_response = array(
							'code'    => 'setting',
							'message' => ''
						);
						echo json_encode( $data_response );
						break;
					case 'setting':
						if ( !$g5plus_import->saveOptions( $import_setting_path ) ) {
							ob_end_clean();
							$data_response = array(
								'code'    => 'fileNotFound',
								'message' => esc_html__( "File not found! Please check file exists in directory:\n[your-theme]/assets/data-demo/", 'cortana' )
							);
							echo json_encode( $data_response );
							die();
						}

						ob_end_clean();
						$data_response = array(
							'code'    => 'core',
							'message' => ''
						);
						echo json_encode( $data_response );
						die();

					case 'core':
						$check_method = $_REQUEST['method'];
						if ( ( trim( $check_method ) == 'livesite' ) || ( trim( $check_method ) == 'no-get-image' ) ) {
							$g5plus_import->fetch_attachments = true;
						} else {
							$g5plus_import->fetch_attachments = false;
						}
						try {
							$import_return = $g5plus_import->import( $import_file_path );
							if ( $import_return !== true ) {
								ob_end_clean();
								$data_response = array(
									'code'    => 'core',
									'message' => $import_return
								);
								echo json_encode( $data_response );
								die();
							}
						} catch ( Exception $ex ) {
							ob_end_clean();
							$data_response = array(
								'code'    => 'core',
								'message' => $other_data
							);
							echo json_encode( $data_response );
							die();
						}

						ob_end_clean();
						$data_response = array(
							'code'    => 'slider',
							'message' => ''
						);
						echo json_encode( $data_response );
						die();
					case 'slider':
						$import_return = $g5plus_import->import_revslider( $other_data );
						if ( $import_return === false ) {
							ob_end_clean();
							$data_response = array(
								'code'    => 'fileNotFound',
								'message' => esc_html__( "File not found! Please check file exists in directory:\n[your-theme]/assets/data-demo/", 'cortana' )
							);
							echo json_encode( $data_response );
							die();
						} else {
							if ( $import_return !== 'done' ) {
								ob_end_clean();
								$data_response = array(
									'code'    => 'slider',
									'message' => $import_return
								);
								echo json_encode( $data_response );
								die();
							}
						}
						// update post id has changed after import
						$g5plus_import->update_post_id();

						// generate less to css
						get_template_part( 'g5plus-framework/core/generate-less' );
						$gen_css = g5plus_generate_less();
						if ( $gen_css['status'] == 'error' ) {
							ob_end_clean();

							$data_response = array(
								'code'    => 'done',
								'message' => $gen_css['message']
							);

							echo json_encode( $data_response );
							die();
						}


						ob_end_clean();

						$data_response = array(
							'code'    => 'done',
							'message' => ''
						);
						echo json_encode( $data_response );

						die();
					case 'fix-data':
						$demo_data_directory = get_template_directory() . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'data-demo' . DIRECTORY_SEPARATOR;
						$arr_demo_file       = array(
							$demo_data_directory . 'setting.json',
							$demo_data_directory . 'change-data.json',
						);
						foreach ( $arr_demo_file as $file_demo ) {
							if ( !file_exists( $file_demo ) ) {
								ob_end_clean();
								$data_response = array(
									'code'    => 'fileNotFound',
									'message' => esc_html__( "File not found! Please check file exists in directory:\n[your-theme]/assets/data-demo/", 'cortana' )
								);
								echo json_encode( $data_response );
								die();
							}
						}

						// update post id has changed after import
						$g5plus_import->update_post_id();

						// generate less to css
						get_template_part( 'g5plus-framework/core/generate-less' );
						$gen_css = g5plus_generate_less();
						if ( $gen_css['status'] == 'error' ) {
							ob_end_clean();

							$data_response = array(
								'code'    => 'done',
								'message' => $gen_css['message']
							);

							echo json_encode( $data_response );
							die();
						}


						ob_end_clean();

						$data_response = array(
							'code'    => 'done',
							'message' => ''
						);
						echo json_encode( $data_response );
						die();
				}
			}
			die();
		}

		// Control Panel for Install Demo Data
		function control_panel() {
			$hide_fix_class = 'hide';
			if ( isset( $_REQUEST['fix-demo-data'] ) && ( $_REQUEST['fix-demo-data'] == '1' ) ) {
				$hide_fix_class = '';
			}
			?>
			<div class="g5plus-demo-data-wrapper">
				<h1><?php echo esc_html__( 'OSThemes - Install Demo Data', 'cortana' ) ?></h1>

				<div class="install-message" data-success="<?php echo esc_html__( 'Install Done', 'cortana' ) ?>"></div>
				<div class="button-wrapper">
					<button type="button" data-method="livesite"><?php echo esc_html__( 'Install demo data get images from our demo site to your hosting', 'cortana' ) ?></button>
					<div><?php echo esc_html__( 'Take about 3-35 mins', 'cortana' ) ?></div>
				</div>
				<div class="button-wrapper">
					<button type="button" data-method="no-get-image"><?php echo esc_html__( 'Quick install demo data (ignore get image from demo site)', 'cortana' ) ?></button>
					<div>
						<?php echo esc_html__( 'Before Install: Extract Image to upload directory ([your-site/wp-content/uploads]). Download demo images ', 'cortana' ) ?>
						<a href="http://cortana.osthemes.biz/wp-content/uploads/wpallexport/uploads.zip">Here</a>
					</div>
				</div>
				<div class="button-wrapper <?php echo esc_attr( $hide_fix_class ) ?>">
					<input id="fix_install_demo_error" type="button" value="<?php echo esc_html__( 'Fix Data Error', 'cortana' ) ?>" />
				</div>
				<div class="install-progress-wrapper">
					<div class="title"><?php echo esc_html__( 'Reset theme options', 'cortana' ) ?></div>
					<div id="g5plus_reset_option" class="meter"><span style="width: 0%"></span></div>

					<div class="title"><?php echo esc_html__( 'Install Demo Data', 'cortana' ) ?></div>
					<div id="g5plus_install_demo" class="meter orange"><span style="width: 0%"></span></div>

					<div class="title"><?php echo esc_html__( 'Import slider', 'cortana' ) ?></div>
					<div id="g5plus_import_slider" class="meter red"><span style="width: 0%"></span></div>
				</div>

			</div>
			<?php
		}

	}

	new G5Plus_Install_Demo();
}