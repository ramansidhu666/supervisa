<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 7/9/2015
 * Time: 8:55 AM
 */
?>
<ul class="entry-meta">
	<li class="entry-meta-author">
		<?php printf( '<a href="%1$s">Posted by <span>%2$s</span></a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), esc_html( get_the_author() ) ); ?>
	</li>
	<li class="entry-meta-date">
		<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"> <?php echo human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) . ' ago'; ?> </a>
	</li>
	<?php if ( has_category() ): ?>
		<li class="entry-meta-category">
			<?php echo esc_html__( 'Posted in', 'cortana' ) ?><?php echo get_the_category_list( ', ' ); ?>
		</li>
	<?php endif; ?>

	<?php edit_post_link( esc_html__( 'Edit', 'cortana' ), '<li class="edit-link">', '</li>' ); ?>
</ul>
