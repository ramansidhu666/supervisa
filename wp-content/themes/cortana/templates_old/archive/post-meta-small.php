<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 7/9/2015
 * Time: 8:56 AM
 */
?>


<ul class="entry-meta-small">
	<li class="entry-meta-author">
		<?php echo esc_html__( 'By', 'cortana' ) ?> : <?php printf( '<a href="%1$s">%2$s</a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), esc_html( get_the_author() ) ); ?>
	</li>
	<li class="entry-meta-read-more">
		<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php echo esc_html__( 'Read more', 'cortana' ) ?></a>
	</li>
</ul>