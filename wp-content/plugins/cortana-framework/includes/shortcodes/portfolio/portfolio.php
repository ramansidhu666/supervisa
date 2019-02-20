<?php
if ( !defined( 'ABSPATH' ) ) {
	die( '-1' );
}

if ( !defined( 'G5PLUS_PORTFOLIO_CATEGORY_TAXONOMY' ) ) {
	define( 'G5PLUS_PORTFOLIO_CATEGORY_TAXONOMY', 'portfolio-category' );
}

if ( !defined( 'G5PLUS_PORTFOLIO_POST_TYPE' ) ) {
	define( 'G5PLUS_PORTFOLIO_POST_TYPE', 'portfolio' );
}

if ( !defined( 'CORTANA_PORTFOLIO_DIR_PATH' ) ) {
	define( 'CORTANA_PORTFOLIO_DIR_PATH', plugin_dir_path( __FILE__ ) );
}

if ( !class_exists( 'G5PlusFramework_Portfolio' ) ) {
	class G5PlusFramework_Portfolio {
		function __construct() {
			add_action( 'wp_enqueue_scripts', array( $this, 'front_scripts' ), 11 );
			add_action( 'init', array( $this, 'register_taxonomies' ), 5 );
			add_action( 'init', array( $this, 'register_post_types' ), 6 );
			add_shortcode( 'g5plusframework_portfolio', array( $this, 'portfolio_shortcode' ) );
			add_filter( 'rwmb_meta_boxes', array( $this, 'register_meta_boxes' ) );
			add_filter( 'single_template', array( $this, 'get_portfolio_single_template' ) );
			add_filter( 'archive_template', array( $this, 'get_portfolio_archive_template' ) );

			if ( is_admin() ) {
				add_filter( 'manage_edit-' . G5PLUS_PORTFOLIO_POST_TYPE . '_columns', array( $this, 'add_portfolios_columns' ) );
				add_action( 'manage_' . G5PLUS_PORTFOLIO_POST_TYPE . '_posts_custom_column', array( $this, 'set_portfolios_columns_value' ), 10, 2 );
				add_action( 'restrict_manage_posts', array( $this, 'portfolio_manage_posts' ) );
				add_filter( 'parse_query', array( $this, 'convert_taxonomy_term_in_query' ) );
				add_action( 'admin_menu', array( $this, 'addMenuSetting' ) );
			}
			$this->includes();

		}

		function front_scripts() {
			global $g5plus_options;
			$min_suffix = ( isset( $g5plus_options['enable_minifile_js'] ) && $g5plus_options['enable_minifile_js'] == 1 ) ? '.min' : '';
			wp_enqueue_style( 'cortana-ladda-css', plugins_url() . '/cortana-framework/includes/shortcodes/portfolio/assets/js/ladda/dist/ladda-themeless.min.css', array() );
			wp_enqueue_script( 'cortana-ladda-spin', plugins_url() . '/cortana-framework/includes/shortcodes/portfolio/assets/js/ladda/dist/spin.min.js', false, true );
			wp_enqueue_script( 'cortana-ladda', plugins_url() . '/cortana-framework/includes/shortcodes/portfolio/assets/js/ladda/dist/ladda.min.js', false, true );

			wp_enqueue_script( 'cortana-modernizr', plugins_url() . '/cortana-framework/includes/shortcodes/portfolio/assets/js/hoverdir/modernizr.js', false, true );
			wp_enqueue_script( 'cortana-hoverdir', plugins_url() . '/cortana-framework/includes/shortcodes/portfolio/assets/js/hoverdir/jquery.hoverdir.js', false, true );
			wp_enqueue_script( 'cortana-portfolio-ajax-action', plugins_url() . '/cortana-framework/includes/shortcodes/portfolio/assets/js/ajax-action' . $min_suffix . '.js', false, true );

			if ( is_singular( G5PLUS_PORTFOLIO_POST_TYPE ) ) {
				wp_enqueue_style( 'cortana-flexslider-css', plugins_url() . '/cortana-framework/includes/shortcodes/services/assets/js/flexslider/flexslider.css', array() );
				wp_enqueue_script( 'cortana-flexslide-script', plugins_url() . '/cortana-framework/includes/shortcodes/services/assets/js/flexslider/jquery.flexslider-min.js', false, true );
			}
		}

		function register_post_types() {

			$post_type = G5PLUS_PORTFOLIO_POST_TYPE;

			if ( post_type_exists( $post_type ) ) {
				return;
			}

			$post_type_slug = get_option( 'g5plus-cortana-' . $post_type . '-config' );
			if ( !isset( $post_type_slug ) || !is_array( $post_type_slug ) ) {
				$slug = 'portfolio';
				$name = $singular_name = 'Portfolio';
			} else {
				$slug          = $post_type_slug['slug'];
				$name          = $post_type_slug['name'];
				$singular_name = $post_type_slug['singular_name'];
			}

			register_post_type( $post_type,
				array(
					'label'       => __( 'Portfolio', 'cortana' ),
					'description' => __( 'Portfolio Description', 'cortana' ),
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
					'menu_icon'   => 'dashicons-screenoptions',
					'rewrite'     => array( 'slug' => $slug, 'with_front' => true ),
				)
			);
			flush_rewrite_rules();

		}

		function register_taxonomies() {

			if ( taxonomy_exists( G5PLUS_PORTFOLIO_CATEGORY_TAXONOMY ) ) {
				return;
			}

			$post_type     = G5PLUS_PORTFOLIO_POST_TYPE;
			$taxonomy_slug = G5PLUS_PORTFOLIO_CATEGORY_TAXONOMY;
			$taxonomy_name = 'Portfolio Categories';

			$post_type_slug = get_option( 'g5plus-cortana-' . $post_type . '-config' );
			if ( isset( $post_type_slug ) && is_array( $post_type_slug ) &&
				array_key_exists( 'taxonomy_slug', $post_type_slug ) && $post_type_slug['taxonomy_slug'] != ''
			) {
				$taxonomy_slug = $post_type_slug['taxonomy_slug'];
				$taxonomy_name = $post_type_slug['taxonomy_name'];
			}
			register_taxonomy( G5PLUS_PORTFOLIO_CATEGORY_TAXONOMY, G5PLUS_PORTFOLIO_POST_TYPE,
				array( 'hierarchical' => true,
					   'label'        => $taxonomy_name,
					   'query_var'    => true,
					   'rewrite'      => array( 'slug' => $taxonomy_slug ) )
			);
			flush_rewrite_rules();
		}

		function portfolio_shortcode( $atts ) {
			$title = $order = $overlay_style = $view_all_link = $style = $category_style = $offset = $overlay_style = $bg_title_float_style = $current_page = $show_pagging = $show_category = $category = $column = $item = $padding = $layout_type = $el_class = $g5plus_animation = $css_animation = $duration = $delay = $styles_animation = '';
			extract( shortcode_atts( array(
				'style'          => '',
				'title'          => '',
				'category_style' => 'cat-style-normal',
				'show_pagging'   => '1',
				'show_category'  => '',
				'category'       => '',
				'column'         => '2',
				'item'           => '',
				'order'          => 'DESC',
				'padding'        => 'col-padding-15',
				'schema_style'   => '',
				'el_class'       => '',
				'css_animation'  => '',
				'duration'       => '',
				'delay'          => '',
				'current_page'   => '1'
			), $atts ) );
			$overlay_style = 'title-float';
			$layout_type   = 'grid';
			if ( $show_pagging == '2' ) {
				$offset        = 0;
				$post_per_page = - 1;
			} else {
				$post_per_page = $item;
				$offset        = ( $current_page - 1 ) * $item;
			}

			$g5plus_animation .= ' ' . esc_attr( $el_class );
			$g5plus_animation .= g5plusFramework_Shortcodes::g5plus_get_css_animation( $css_animation );
			$styles_animation = g5plusFramework_Shortcodes::g5plus_get_style_animation( $duration, $delay );

			$plugin_path   = untrailingslashit( plugin_dir_path( __FILE__ ) );
			$template_path = $plugin_path . '/templates/listing.php';

			ob_start();
			include( $template_path );
			$ret = ob_get_contents();
			ob_end_clean();

			return $ret;
		}

		function register_meta_boxes( $meta_boxes ) {
			$meta_boxes[] = array(
				'title'  => __( 'Portfolio Extra', 'cortana' ),
				'id'     => 'cortana-meta-box-portfolio-format-gallery',
				'pages'  => array( G5PLUS_PORTFOLIO_POST_TYPE ),
				'fields' => array(
					array(
						'name' => __( 'Short Description', 'cortana' ),
						'id'   => 'portfolio-short-description',
						'type' => 'textarea',
					),
					array(
						'name' => __( 'Client Name', 'cortana' ),
						'id'   => 'portfolio-client',
						'type' => 'text',
					),
					array(
						'name' => __( 'Location', 'cortana' ),
						'id'   => 'portfolio-location',
						'type' => 'text',
					),
					array(
						'name' => __( 'Year Completed', 'cortana' ),
						'id'   => 'portfolio-date',
						'type' => 'text',
					),
					array(
						'name' => __( 'Surface Area', 'cortana' ),
						'id'   => 'portfolio-area',
						'type' => 'text',
					),
					array(
						'name' => __( 'Value', 'cortana' ),
						'id'   => 'portfolio-value',
						'type' => 'text',
					),
					array(
						'name' => __( 'Gallery', 'cortana' ),
						'id'   => 'portfolio-format-gallery',
						'type' => 'image_advanced',
					)
				)
			);

			return $meta_boxes;
		}

		function get_portfolio_single_template( $single ) {
			global $post;
			/* Checks for single template by post type */
			if ( $post->post_type == G5PLUS_PORTFOLIO_POST_TYPE ) {
				$plugin_path   = untrailingslashit( CORTANA_PORTFOLIO_DIR_PATH );
				$template_path = $plugin_path . '/templates/single/single-portfolio.php';
				if ( file_exists( $template_path ) ) {
					return $template_path;
				}
			}

			return $single;
		}

		function get_portfolio_archive_template( $archive_template ) {
			global $post;
			/* Checks for archive template by post type */
			if ( is_post_type_archive( G5PLUS_PORTFOLIO_POST_TYPE ) ) {
				$plugin_path   = untrailingslashit( CORTANA_PORTFOLIO_DIR_PATH );
				$template_path = $plugin_path . '/templates/archive/archive-portfolio.php';
				if ( file_exists( $template_path ) ) {
					return $template_path;
				}
			}

			return $archive_template;
		}

		function add_portfolios_columns( $columns ) {
			unset(
				$columns['cb'],
				$columns['title'],
				$columns['date']
			);
			$cols = array_merge( array( 'cb' => ( '' ) ), $columns );
			$cols = array_merge( $cols, array( 'title' => __( 'Porfolio Name', 'cortana' ) ) );
			$cols = array_merge( $cols, array( 'thumbnail' => __( 'Thumbnail', 'cortana' ) ) );
			$cols = array_merge( $cols, array( G5PLUS_PORTFOLIO_CATEGORY_TAXONOMY => __( 'Categories', 'cortana' ) ) );
			$cols = array_merge( $cols, array( 'date' => __( 'Date', 'cortana' ) ) );

			return $cols;
		}

		function set_portfolios_columns_value( $column, $post_id ) {
			switch ( $column ) {
				case 'id': {
					echo wp_kses_post( $post_id );
					break;
				}
				case 'thumbnail': {
					echo get_the_post_thumbnail( $post_id, 'thumbnail' );
					break;
				}
				case G5PLUS_PORTFOLIO_CATEGORY_TAXONOMY: {
					$terms = wp_get_post_terms( get_the_ID(), array( G5PLUS_PORTFOLIO_CATEGORY_TAXONOMY ) );
					$cat   = '<ul>';
					foreach ( $terms as $term ) {
						$cat .= '<li><a href="' . get_term_link( $term, G5PLUS_PORTFOLIO_CATEGORY_TAXONOMY ) . '">' . $term->name . '<a/></li>';
					}
					$cat .= '</ul>';
					echo wp_kses_post( $cat );
					break;
				}
			}
		}

		function portfolio_manage_posts() {
			global $typenow;
			if ( $typenow == G5PLUS_PORTFOLIO_POST_TYPE ) {
				$selected = isset( $_GET[G5PLUS_PORTFOLIO_CATEGORY_TAXONOMY] ) ? $_GET[G5PLUS_PORTFOLIO_CATEGORY_TAXONOMY] : '';
				$args     = array(
					'show_count'      => true,
					'show_option_all' => __( 'Show All Categories', 'cortana' ),
					'taxonomy'        => G5PLUS_PORTFOLIO_CATEGORY_TAXONOMY,
					'name'            => G5PLUS_PORTFOLIO_CATEGORY_TAXONOMY,
					'selected'        => $selected,

				);
				wp_dropdown_categories( $args );
			}
		}

		function convert_taxonomy_term_in_query( $query ) {
			global $pagenow;
			$qv = &$query->query_vars;
			if ( $pagenow == 'edit.php' &&
				isset( $qv[G5PLUS_PORTFOLIO_CATEGORY_TAXONOMY] ) &&
				is_numeric( $qv[G5PLUS_PORTFOLIO_CATEGORY_TAXONOMY] )
			) {
				$term                                   = get_term_by( 'id', $qv[G5PLUS_PORTFOLIO_CATEGORY_TAXONOMY], G5PLUS_PORTFOLIO_CATEGORY_TAXONOMY );
				$qv[G5PLUS_PORTFOLIO_CATEGORY_TAXONOMY] = $term->slug;
			}
		}

		private function includes() {
			include_once( 'utils/ajax-action.php' );
		}

		function addMenuSetting() {
			add_submenu_page( 'edit.php?post_type=' . G5PLUS_PORTFOLIO_POST_TYPE, 'Setting', 'Settings', 'edit_posts', basename( __FILE__ ), array( $this, 'initPageSettings' ) );
		}

		function initPageSettings() {
			$template_path = ABSPATH . 'wp-content/plugins/cortana-framework/includes/shortcodes/posttype-settings/settings.php';
			if ( file_exists( $template_path ) ) {
				require_once $template_path;
			}
		}

	}

	new G5PlusFramework_Portfolio();
}
