<?php

/**
 * Created by PhpStorm.
 * User: phuongth
 * Date: 3/26/15
 * Time: 5:24 PM
 */
class Cortana_Recent_Portfolio extends G5Plus_Widget {
	public function __construct() {
		$this->widget_cssclass    = 'widget-recent-portfolio';
		$this->widget_description = __( "Recent Portfolio", 'cortana' );
		$this->widget_id          = 'cortana-recent-portfolio';
		$this->widget_name        = __( 'G5Plus: Recent Projects', 'cortana' );
		$this->settings           = array(
			'title'  => array(
				'type'  => 'text',
				'std'   => 'Recent Projects',
				'label' => __( 'Enter title ', 'cortana' ),
			),
			'column' => array(
				'type'  => 'text',
				'std'   => '4',
				'label' => __( 'Enter column ', 'cortana' ),
			),
			'row'    => array(
				'type'  => 'text',
				'std'   => '2',
				'label' => __( 'Enter row ', 'cortana' ),
			)
		);
		parent::__construct();
	}

	function widget( $args, $instance ) {
		extract( $args, EXTR_SKIP );
		$class_custom = empty( $instance['class_custom'] ) ? '' : apply_filters( 'widget_class_custom', $instance['class_custom'] );
		$title        = empty( $instance['title'] ) ? '' : apply_filters( 'widget_title', $instance['title'] );
		$column       = empty( $instance['column'] ) ? '' : apply_filters( 'widget_column', $instance['column'] );
		$row          = empty( $instance['row'] ) ? '' : apply_filters( 'row', $instance['row'] );
		$widget_id    = $args['widget_id'];
		echo wp_kses_post( $before_widget );

		if ( class_exists( 'G5PlusFramework_Portfolio' ) ) {
			$post_per_page = $column * $row;
			$args          = array(
				'posts_per_page' => $post_per_page,
				'orderby'        => 'post_date',
				'order'          => 'DESC',
				'post_type'      => 'portfolio',
				'post_status'    => 'publish' );

			$posts_array = new WP_Query( $args );
			?>
			<div>
				<h4><?php echo wp_kses_post( $title ) ?></h4>
				<ul>
					<?php
					while ( $posts_array->have_posts() ) : $posts_array->the_post();
						$permalink         = get_permalink();
						$title_post        = get_the_title();
						$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
						$arrImages         = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
						$thumbnail_url     = '';
						if ( count( $arrImages ) > 0 ) {
							$resize = matthewruddy_image_resize( $arrImages[0], 270, 270 );
							if ( $resize != null ) {
								$thumbnail_url = $resize['url'];
							}
						}

						?>
						<li>
							<a href="<?php echo esc_url( $permalink ) ?>">
								<img src="<?php echo esc_url( $thumbnail_url ) ?>" alt="<?php echo esc_attr( $title_post ) ?>">
							</a>
						</li>
						<?php
					endwhile;
					wp_reset_postdata(); ?>
				</ul>
			</div>
			<?php
		}
		echo wp_kses_post( $after_widget );
	}
}

if ( !function_exists( 'cortana_register_widget_recent_portfolio' ) ) {
	function cortana_register_widget_recent_portfolio() {
		register_widget( 'Cortana_Recent_Portfolio' );
	}

	add_action( 'widgets_init', 'cortana_register_widget_recent_portfolio', 1 );
}