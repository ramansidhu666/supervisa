<?phpget_header();if ( have_posts() ) {	// Start the Loop.	do_action( 'g5plus_before_page' );	$data_section_id = uniqid();	?>	<?php	global $g5plus_options;	$layout_style = g5plus_get_post_meta( $post->ID, 'g5plus_page_layout', true );	if ( ( $layout_style === '' ) || ( $layout_style == '-1' ) ) {		$layout_style = $g5plus_options['our_team_layout'];	}	$sidebar = g5plus_get_post_meta( $post->ID, 'g5plus_page_sidebar', true );	if ( ( $sidebar === '' ) || ( $sidebar == '-1' ) ) {		$sidebar = $g5plus_options['our_team_sidebar'];	}	$left_sidebar = g5plus_get_post_meta( $post->ID, 'g5plus_page_left_sidebar', true );	if ( ( $left_sidebar === '' ) || ( $left_sidebar == '-1' ) ) {		$left_sidebar = $g5plus_options['our_team_left_sidebar'];	}	$right_sidebar = g5plus_get_post_meta( $post->ID, 'g5plus_page_right_sidebar', true );	if ( ( $right_sidebar === '' ) || ( $right_sidebar == '-1' ) ) {		$right_sidebar = $g5plus_options['our_team_right_sidebar'];	}	$sidebar_width = g5plus_get_post_meta( $post->ID, 'g5plus_sidebar_width', true );	if ( ( $sidebar_width === '' ) || ( $sidebar_width == '-1' ) ) {		$sidebar_width = $g5plus_options['our_team_sidebar_width'];	}// Calculate sidebar column & content column	$sidebar_col = 'col-md-3';	if ( $sidebar_width == 'large' ) {		$sidebar_col = 'col-md-4';	}	$content_col_number = 12;	if ( is_active_sidebar( $left_sidebar ) && ( ( $sidebar == 'both' ) || ( $sidebar == 'left' ) ) ) {		if ( $sidebar_width == 'large' ) {			$content_col_number -= 4;		} else {			$content_col_number -= 3;		}	}	if ( is_active_sidebar( $right_sidebar ) && ( ( $sidebar == 'both' ) || ( $sidebar == 'right' ) ) ) {		if ( $sidebar_width == 'large' ) {			$content_col_number -= 4;		} else {			$content_col_number -= 3;		}	}	$content_col = 'col-md-' . $content_col_number;	if ( ( $content_col_number == 12 ) && ( $layout_style == 'full' ) ) {		$content_col = '';	}	$main_class = array( 'site-content-page' );	if ( $content_col_number < 12 ) {		$main_class[] = 'has-sidebar';	}	?>	<main class="<?php echo join( ' ', $main_class ) ?>">		<?php if ( $layout_style != 'full' ): ?>		<div class="<?php echo esc_attr( $layout_style ) ?> clearfix">			<?php endif; ?>			<?php if ( ( $content_col_number != 12 ) || ( $layout_style != 'full' ) ): ?>			<div class="row clearfix">				<?php endif; ?>				<?php if ( is_active_sidebar( $left_sidebar ) && ( ( $sidebar == 'left' ) || ( $sidebar == 'both' ) ) ): ?>					<div class="sidebar left-sidebar <?php echo esc_attr( $sidebar_col ) ?>">						<?php dynamic_sidebar( $left_sidebar ); ?>					</div>				<?php endif; ?>				<div class="site-content-page-inner <?php echo esc_attr( $content_col ) ?>">					<div class="page-content">						<?php while ( have_posts() ): the_post();							?>							<div class="cortana-ourteam style2">								<?php								global $ourteam_metabox;								global $meta;								$job               = get_post_meta( get_the_ID(), 'info', true );								$excerpt           = get_post_meta( get_the_ID(), 'description', true );								$post_thumbnail_id = get_post_thumbnail_id();								$arrImages         = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );								$thumbnail_url     = '';								if ( is_array( $arrImages ) && count( $arrImages ) > 0 ) {									$resize = matthewruddy_image_resize( $arrImages[0], 370, 370 );									if ( $resize != null ) {										$thumbnail_url = $resize['url'];									}								}								?>								<div class="ourteam-item row">									<div class="ourteam-avatar col-md-5 col-sm-6 col-xs-12">										<figure>											<img src="<?php echo esc_url( $thumbnail_url ) ?>" alt="<?php echo get_the_title() ?>" />										</figure>									</div>									<div class="ourteam-info col-md-7 col-sm-6 col-xs-12">										<h4 class="cortana-title">											<a href="<?php the_permalink() ?>" title="<?php echo get_the_title() ?>"><?php echo get_the_title() ?></a>										</h4>										<span><?php echo esc_html( $job ) ?></span>										<p class="excerpt">											<?php echo esc_html( $excerpt ) ?>										</p>										<ul class="ourteam-social">											<?php											$meta = get_post_meta( get_the_id(), $ourteam_metabox->get_the_id(), true );											foreach ( $meta['ourteam'] as $col ) {												$socialName = isset( $col['socialName'] ) ? $col['socialName'] : '';												$socialLink = isset( $col['socialLink'] ) ? $col['socialLink'] : '';												$socialIcon = isset( $col['socialIcon'] ) ? $col['socialIcon'] : '';												?>												<li>													<a href="<?php echo esc_url( $socialLink ) ?>" title="<?php echo esc_attr( $socialName ) ?>"><i class="<?php echo esc_attr( $socialIcon ) ?>"></i></a>												</li>												<?php											}											?>										</ul>									</div><!--end ourteam-info -->								</div><!--end ourteam-item -->								<?php echo do_shortcode( '[cortana_ourteam item_amount="6" column="3"]' ); ?>							</div><!--end cortana-ourteam -->						<?php endwhile; ?>					</div>				</div>				<?php if ( is_active_sidebar( $right_sidebar ) && ( ( $sidebar == 'right' ) || ( $sidebar == 'both' ) ) ): ?>					<div class="sidebar right-sidebar <?php echo esc_attr( $sidebar_col ) ?>">						<?php dynamic_sidebar( $right_sidebar ); ?>					</div>				<?php endif; ?>				<?php if ( ( $content_col_number != 12 ) || ( $layout_style != 'full' ) ): ?>				<?php endif; ?>				<?php if ( $layout_style != 'full' ): ?>			</div>		<?php endif; ?>	</main>	<?php}?><?php get_footer(); ?>