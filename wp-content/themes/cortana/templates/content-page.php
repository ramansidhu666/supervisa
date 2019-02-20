<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
	<?php wp_link_pages( array(
		'before'      => '<div class="g5plus-page-links"><span class="great-store-page-links-title">' . esc_html__( 'Pages:', 'cortana' ) . '</span>',
		'after'       => '</div>',
		'link_before' => '<span class="g5plus-page-link">',
		'link_after'  => '</span>',
	) ); ?>
	<!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', 'cortana' ), '<div class="entry-footer-edit"><span class="edit-link">', '</span></div>' ); ?>
</div>