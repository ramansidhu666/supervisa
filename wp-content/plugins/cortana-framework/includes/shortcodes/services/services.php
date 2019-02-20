<?php
if ( !defined( 'ABSPATH' ) ) {
	die( '-1' );
}

if ( !defined( 'G5PLUS_SERVICE_CATEGORY_TAXONOMY' ) ) {
	define( 'G5PLUS_SERVICE_CATEGORY_TAXONOMY', 'services-category' );
}

if ( !defined( 'G5PLUS_SERVICE_POST_TYPE' ) ) {
	define( 'G5PLUS_SERVICE_POST_TYPE', 'services' );
}

if ( !defined( 'CORTANA_SERVICE_DIR_PATH' ) ) {
	define( 'CORTANA_SERVICE_DIR_PATH', plugin_dir_path( __FILE__ ) );
}

if ( !class_exists( 'G5PlusFramework_Services' ) ) {
	class G5PlusFramework_Services {
		function __construct() {
			add_action( 'wp_enqueue_scripts', array( $this, 'front_scripts' ), 11 );
			add_action( 'init', array( $this, 'register_taxonomies' ), 5 );
			add_action( 'init', array( $this, 'register_post_types' ), 6 );
			add_shortcode( 'g5plusframework_services', array( $this, 'services_shortcode' ) );
			add_filter( 'rwmb_meta_boxes', array( $this, 'register_meta_boxes' ) );
			add_filter( 'single_template', array( $this, 'get_service_single_template' ) );
			add_filter( 'archive_template', array( $this, 'get_service_archive_template' ) );

			if ( is_admin() ) {
				add_filter( 'parse_query', array( $this, 'convert_taxonomy_term_in_query' ) );
				add_action( 'admin_menu', array( $this, 'addMenuSetting' ) );
			}
//            $this->includes();

		}

		function front_scripts() {
			global $g5plus_options;
			$min_suffix = ( isset( $g5plus_options['enable_minifile_js'] ) && $g5plus_options['enable_minifile_js'] == 1 ) ? '.min' : '';
			if ( is_singular( G5PLUS_SERVICE_POST_TYPE ) ) {
				wp_enqueue_style( 'cortana-flexslider-css', plugins_url() . '/cortana-framework/includes/shortcodes/services/assets/js/flexslider/flexslider.css', array() );
				wp_enqueue_script( 'cortana-flexslide-script', plugins_url() . '/cortana-framework/includes/shortcodes/services/assets/js/flexslider/jquery.flexslider-min.js', false, true );
			}
//            wp_enqueue_script('cortana-ladda',plugins_url() . '/cortana-framework/includes/shortcodes/portfolio/assets/js/ladda/dist/ladda.min.js', false, true);
//
//            wp_enqueue_script('cortana-modernizr',plugins_url() . '/cortana-framework/includes/shortcodes/portfolio/assets/js/hoverdir/modernizr.js', false, true);
//            wp_enqueue_script('cortana-hoverdir',plugins_url() . '/cortana-framework/includes/shortcodes/portfolio/assets/js/hoverdir/jquery.hoverdir.js', false, true);
//            wp_enqueue_script('cortana-portfolio-ajax-action',plugins_url() . '/cortana-framework/includes/shortcodes/portfolio/assets/js/ajax-action'.$min_suffix.'.js', false, true);
		}

		function register_post_types() {

			$post_type = G5PLUS_SERVICE_POST_TYPE;

			if ( post_type_exists( $post_type ) ) {
				return;
			}

			$post_type_slug = get_option( 'g5plus-cortana-' . $post_type . '-config' );
			if ( !isset( $post_type_slug ) || !is_array( $post_type_slug ) ) {
				$slug = 'services';
				$name = $singular_name = 'Services';
			} else {
				$slug          = $post_type_slug['slug'];
				$name          = $post_type_slug['name'];
				$singular_name = $post_type_slug['singular_name'];
			}

			register_post_type( $post_type,
				array(
					'label'       => __( 'Services', 'cortana' ),
					'description' => __( 'Services Description', 'cortana' ),
					'labels'      => array(
						'name'               => $name,
						'singular_name'      => $singular_name,
						'menu_name'          => __( $name, 'cortana' ),
						'parent_item_colon'  => __( 'Parent Item:', 'cortana' ),
						'all_items'          => __( sprintf( 'All %s', $name ), 'cortana' ),
						'view_item'          => __( 'View Item', 'cortana' ),
						'add_new_item'       => __( sprintf( 'Add New  %s', $name ), 'cortana' ),
						'add_new'            => __( 'Add New', 'cortana' ),
						'edit_item'          => __( 'Edit Item', 'cortana' ),
						'update_item'        => __( 'Update Item', 'cortana' ),
						'search_items'       => __( 'Search Item', 'cortana' ),
						'not_found'          => __( 'Not found', 'cortana' ),
						'not_found_in_trash' => __( 'Not found in Trash', 'cortana' ),
					),
					'supports'    => array( 'title', 'editor', 'thumbnail' ),
					'public'      => true,
					'show_ui'     => true,
					'_builtin'    => false,
					'has_archive' => true,
					'menu_icon'   => 'dashicons-share-alt',
					'rewrite'     => array( 'slug' => $slug, 'with_front' => true ),
				)
			);
			flush_rewrite_rules();

		}

		function register_taxonomies() {

			if ( taxonomy_exists( G5PLUS_SERVICE_CATEGORY_TAXONOMY ) ) {
				return;
			}

			$post_type     = G5PLUS_SERVICE_POST_TYPE;
			$taxonomy_slug = G5PLUS_SERVICE_CATEGORY_TAXONOMY;
			$taxonomy_name = 'Service Categories';

			$post_type_slug = get_option( 'g5plus-cortana-' . $post_type . '-config' );
			if ( isset( $post_type_slug ) && is_array( $post_type_slug ) &&
				array_key_exists( 'taxonomy_slug', $post_type_slug ) && $post_type_slug['taxonomy_slug'] != ''
			) {
				$taxonomy_slug = $post_type_slug['taxonomy_slug'];
				$taxonomy_name = $post_type_slug['taxonomy_name'];
			}
			register_taxonomy( G5PLUS_SERVICE_CATEGORY_TAXONOMY, G5PLUS_SERVICE_POST_TYPE,
				array( 'hierarchical' => true,
					   'label'        => $taxonomy_name,
					   'query_var'    => true,
					   'rewrite'      => array( 'slug' => $taxonomy_slug ) )
			);
			flush_rewrite_rules();
		}

		function register_meta_boxes( $meta_boxes ) {
			$meta_boxes[] = array(
				'title'  => __( 'Services Extra', 'cortana' ),
				'id'     => 'cortana-meta-box-service-format',
				'pages'  => array( G5PLUS_SERVICE_POST_TYPE ),
				'fields' => array(
					array(
						'name' => __( 'Short Description', 'cortana' ),
						'id'   => 'service_short_description',
						'type' => 'textarea',
					),
				)
			);

			return $meta_boxes;
		}

		function services_shortcode( $atts ) {
			$title = $title_style = $show_readmore = $class_col_wrap = $class_col = $title = $order = $overlay_style = $view_all_link = $style = $category_style = $offset = $overlay_style = $bg_title_float_style = $current_page = $show_pagging = $show_category = $category = $column = $item = $padding = $layout_type = $el_class = $g5plus_animation = $css_animation = $duration = $delay = $styles_animation = '';
			extract( shortcode_atts( array(
				'style'         => 'style_1',
				'title'         => '',
				'title_style'   => 'border-bottom',
				'style_header'  => 'dark',
				'category'      => '',
				'column'        => '2',
				'item'          => '3',
				'order'         => 'DESC',
				'schema_style'  => '',
				'show_readmore' => '',
				'el_class'      => '',
				'css_animation' => '',
				'duration'      => '',
				'delay'         => '',
				'current_page'  => '1'
			), $atts ) );

			$g5plus_animation .= ' ' . esc_attr( $el_class );
			$g5plus_animation .= g5plusFramework_Shortcodes::g5plus_get_css_animation( $css_animation );
			$styles_animation = g5plusFramework_Shortcodes::g5plus_get_style_animation( $duration, $delay );

			if ( $item == '' ) {
				$item = - 1;
			}
			$class_col_wrap          = 'col-' . $column . '';
			$query['posts_per_page'] = $item;
			$query['no_found_rows']  = true;
			$query['post_status']    = 'publish';
			$query['post_type']      = G5PLUS_SERVICE_POST_TYPE;
//			$query['tax_query'] = array(
//				array(
//					'taxonomy' => G5PLUS_SERVICE_CATEGORY_TAXONOMY,
//					'field' => 'slug',
//					'terms' =>  strtolower($category),
//					'operator' => 'LIKE'
//				)
//			);
			if ( $order == 'DESC' ) {
				$query['order'] = 'DESC';
			} elseif ( $order == 'ASC' ) {
				$query['order'] = 'ASC';
			}
			$r = new WP_Query( $query );
			if ( $title_style == 'border-bottom' ) {
				$style_header = 'title-border';
			} else {
				$style_header = 'title-no-border';
			}
			ob_start();
			$class_col = 'col-lg-' . ( 12 / esc_attr( $column ) ) . ' col-md-' . ( 12 / esc_attr( $column ) ) . ' col-sm-3  col-xs-12';
			if ( $r->have_posts() ) :?>
				<div class="cortana-service <?php echo esc_attr( $class_col_wrap ) ?> <?php echo esc_attr( $style_header ) ?> <?php echo esc_attr( $g5plus_animation ) ?>" <?php echo esc_attr( $styles_animation ) ?>>
					<?php if ( $title != '' ) { ?>
						<h3 class="cortana-title title-larger"><?php echo esc_html( $title ) ?></h3>
					<?php } ?>
					<div class="row">
						<?php while ( $r->have_posts() ) : $r->the_post(); ?>

							<div class="<?php echo esc_attr( $class_col ); ?>">
								<div class="cortana-service-item">
									<h4 class="cortana-title">sadasdsa<?php echo esc_html( the_title() ) ?></h4>
									<?php
									$thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
									$img           = '';
									if ( count( $thumbnail_url ) > 0 ) {
										$resize = matthewruddy_image_resize( $thumbnail_url, 370, 247 );
										if ( $resize != null ) {
											$img = $resize['url'];
										}
									}
									if ( $img ) { ?>
										<div class="cortana-service-thumb">
											<img src="<?php echo esc_attr( $img ) ?>" alt="service" />

											<div class="hover-action">
												<a href="<?php the_permalink() ?>"><i class="fa fa-link"></i></a>
											</div>
										</div>
									<?php }
									?>
									<div class="cortana-service-content">
										<div class="service-excerpt">
											<?php echo esc_html( get_post_meta( get_the_ID(), 'service_short_description', true ) ); ?>
										</div>
										<?php if ( $show_readmore == 'yes' ) : ?>
											<a class="service-readmore" href="<?php the_permalink() ?>">
												<?php echo __( 'Read More', 'cortana' ) ?>
											</a>
										<?php endif; ?>
									</div>
								</div>
							</div>

						<?php endwhile; ?>
					</div>
				</div>
				<?php
			endif;
			$ret = ob_get_contents();
			ob_end_clean();

			return $ret;
		}

		function get_service_single_template( $single ) {
			global $post;
			/* Checks for single template by post type */
			if ( $post->post_type == G5PLUS_SERVICE_POST_TYPE ) {
				$plugin_path   = untrailingslashit( CORTANA_SERVICE_DIR_PATH );
				$template_path = $plugin_path . '/templates/single/single-service.php';
				if ( file_exists( $template_path ) ) {
					return $template_path;
				}
			}

			return $single;
		}

		function get_service_archive_template( $archive_template ) {
			global $post;
			/* Checks for archive template by post type */
			if ( is_post_type_archive( G5PLUS_SERVICE_POST_TYPE ) ) {
				$plugin_path   = untrailingslashit( CORTANA_SERVICE_DIR_PATH );
				$template_path = $plugin_path . '/templates/archive/archive-portfolio.php';
				if ( file_exists( $template_path ) ) {
					return $template_path;
				}
			}

			return $archive_template;
		}


		function service_manage_posts() {
			global $typenow;
			if ( $typenow == G5PLUS_SERVICE_POST_TYPE ) {
				$selected = isset( $_GET[G5PLUS_SERVICE_CATEGORY_TAXONOMY] ) ? $_GET[G5PLUS_SERVICE_CATEGORY_TAXONOMY] : '';
				$args     = array(
					'show_count'      => true,
					'show_option_all' => __( 'Show All Categories', 'cortana' ),
					'taxonomy'        => G5PLUS_SERVICE_CATEGORY_TAXONOMY,
					'name'            => G5PLUS_SERVICE_CATEGORY_TAXONOMY,
					'selected'        => $selected,

				);
				wp_dropdown_categories( $args );
			}
		}

		function convert_taxonomy_term_in_query( $query ) {
			global $pagenow;
			$qv = &$query->query_vars;
			if ( $pagenow == 'edit.php' &&
				isset( $qv[G5PLUS_SERVICE_CATEGORY_TAXONOMY] ) &&
				is_numeric( $qv[G5PLUS_SERVICE_CATEGORY_TAXONOMY] )
			) {
				$term                                 = get_term_by( 'id', $qv[G5PLUS_SERVICE_CATEGORY_TAXONOMY], G5PLUS_SERVICE_CATEGORY_TAXONOMY );
				$qv[G5PLUS_SERVICE_CATEGORY_TAXONOMY] = $term->slug;
			}
		}

//        private function includes(){
//            include_once('utils/ajax-action.php');
//        }

		function addMenuSetting() {
			add_submenu_page( 'edit.php?post_type=' . G5PLUS_SERVICE_POST_TYPE, 'Setting', 'Settings', 'edit_posts', basename( __FILE__ ), array( $this, 'initPageSettings' ) );
		}

		function initPageSettings() {
			$template_path = ABSPATH . 'wp-content/plugins/cortana-framework/includes/shortcodes/posttype-settings/settings.php';
			if ( file_exists( $template_path ) ) {
				require_once $template_path;
			}
		}

	}

	new G5PlusFramework_Services();
}
