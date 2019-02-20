<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/4/15
 * Time: 2:41 PM
 */
if ( !defined( 'ABSPATH' ) ) {
	die( '-1' );
}
if ( !class_exists( 'g5plusFramework_Shortcode_Post' ) ):
	class g5plusFramework_Shortcode_Post {
		function __construct() {
			add_shortcode( 'cortana_post', array( $this, 'post_shortcode' ) );
		}

		function post_shortcode( $atts ) {
			$title = $title_style = $display = $column = $is_slider = $item_amount = $html = $el_class = $g5plus_animation = $css_animation = $duration = $delay = $styles_animation = '';
			extract( shortcode_atts( array(
				'title'         => '',
				'title_style'   => 'border-bottom',
				'display'       => 'recent',
				'item_amount'   => '10',
				'is_slider'     => false,
				'column'        => '3',
				'el_class'      => '',
				'css_animation' => '',
				'duration'      => '',
				'delay'         => ''
			), $atts ) );

			$g5plus_animation .= ' ' . esc_attr( $el_class );
			$g5plus_animation .= g5plusFramework_Shortcodes::g5plus_get_css_animation( $css_animation );

			$query['posts_per_page']      = $item_amount;
			$query['no_found_rows']       = true;
			$query['post_status']         = 'publish';
			$query['ignore_sticky_posts'] = true;
			$query['post_type']           = 'post';
			$query['tax_query']           = array(
				array(
					'taxonomy' => 'post_format',
					'field'    => 'slug',
					'terms'    => array( 'post-format-quote', 'post-format-link', 'post-format-audio' ),
					'operator' => 'NOT IN'
				)
			);
			if ( $display == 'random' ) {
				$query['orderby'] = 'rand';
			} elseif ( $display == 'popular' ) {
				$query['orderby'] = 'comment_count';
			} elseif ( $display == 'recent' ) {
				$query['orderby'] = 'post_date';
				$query['order']   = 'DESC';
			} else {
				$query['orderby'] = 'post_date';
				$query['order']   = 'ASC';
			}
			$r = new WP_Query( $query );
			ob_start();
			$class_col = 'col-lg-' . ( 12 / esc_attr( $column ) ) . ' col-md-' . ( 12 / esc_attr( $column ) ) . ' col-sm-4  col-xs-12';
			if ( $r->have_posts() ) :
				?>
				<div class="cortana-post <?php echo esc_attr( $g5plus_animation ) ?>" <?php echo g5plusFramework_Shortcodes::g5plus_get_style_animation( $duration, $delay ); ?>>
					<?php if ( $title ) : ?>
						<h3 class="cortana-title <?php echo esc_attr( $title_style ) ?>"><?php echo esc_html( $title ) ?></h3>
					<?php endif; ?>
					<?php if ( $is_slider ) : ?>
						<div class="cortana-post-slider">
							<div
								data-plugin-options='{"items" : <?php echo esc_attr( $column ) ?>,"itemsDesktop":[1199, 3],"itemsDesktopSmall":[980, 2],"itemsTablet":[768, 1],"pagination":true,"navigation":false, "autoPlay": true }'
								class="owl-carousel">
								<?php while ( $r->have_posts() ) : $r->the_post(); ?>
									<div class="cortana-post-item">
										<?php
										$thumbnail = g5plus_post_thumbnail( 'blog-thumbnail' );
										if ( !empty( $thumbnail ) ) : ?>
											<div class="cortana-post-image">
												<?php echo wp_kses_post( $thumbnail ); ?>
												<!--												<div class="hover-action">-->
												<!--													<a href="--><?php //the_permalink() ?><!--" class="ico-view-detail"><i class="fa fa-link"></i></a>-->
												<!--												</div>-->
											</div>
										<?php endif; ?>
										<div class="cortana-post-content">
											<a class="cortana-post-title" href="<?php the_permalink(); ?>"
											   rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
											<?php
											$excerpt = get_the_excerpt();
											$excerpt = g5plusFramework_Shortcodes::substr( $excerpt, 150, ' [...]' );
											?>
											<p><?php echo( $excerpt ); ?></p>
										</div>
										<div class="entry-meta">
											<i class="fa fa-calendar"><span><?php echo get_the_date( get_option( 'date_format' ) ); ?></span></i>
											<?php comments_popup_link( __( '<i class="fa fa-comments-o"></i> No Comment', 'cortana' ), __( '<i class="fa fa-comments-o"></i> 1 Comment', 'cortana' ), __( '<i class="fa fa-comments-o"></i> % Comments', 'cortana' ) ); ?>
										</div>
									</div>
								<?php endwhile; ?>
							</div>
						</div>
					<?php else: ?>
						<div class="row">
							<?php
							$class = array( 'cortana-post-item', 'margin-bottom-30' );
							?>
							<?php while ( $r->have_posts() ) : $r->the_post(); ?>
								<div class="<?php echo esc_attr( $class_col ); ?>">
									<div <?php echo post_class( $class ); ?>>
										<?php
										$thumbnail = g5plus_post_thumbnail( 'blog-thumbnail' );
										if ( !empty( $thumbnail ) ) : ?>
											<div class="cortana-post-image">
												<?php echo wp_kses_post( $thumbnail ); ?>
												<!--												<div class="hover-action">-->
												<!--													<a href="--><?php //the_permalink() ?><!--" class="ico-view-detail"><i class="fa fa-link"></i></a>-->
												<!--												</div>-->
											</div>
										<?php endif; ?>
										<div class="cortana-post-content">
											<a class="cortana-post-title" href="<?php the_permalink(); ?>"
											   rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
											<?php
											$excerpt = get_the_excerpt();
											$excerpt = g5plusFramework_Shortcodes::substr( $excerpt, 150, ' [...]' );
											?>
											<p><?php echo( $excerpt ); ?></p>
										</div>
										<div class="entry-meta">
											<i class="fa fa-calendar"><span><?php echo get_the_date( get_option( 'date_format' ) ); ?></span></i>
											<?php comments_popup_link( __( '<i class="fa fa-comments-o"></i> No Comment', 'cortana' ), __( '<i class="fa fa-comments-o"></i> 1 Comment', 'cortana' ), __( '<i class="fa fa-comments-o"></i> % Comments', 'cortana' ) ); ?>
										</div>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>
				<?php
			endif;
			wp_reset_postdata();
			g5plus_archive_loop_reset();
			$content = ob_get_clean();

			return $content;
		}
	}

	new g5plusFramework_Shortcode_Post();
endif;