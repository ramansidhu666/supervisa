<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/4/15
 * Time: 11:33 AM
 */
?>
<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

	<p><?php printf( esc_html__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'cortana' ), admin_url( 'post-new.php' ) ); ?></p>

<?php elseif ( is_search() ) : ?>

	<p><?php echo esc_html__( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'cortana' ); ?></p>
	<?php get_search_form(); ?>
	<?php
else : ?>
	<p><?php echo esc_html__( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'cortana' ); ?></p>
	<?php get_search_form(); ?>
<?php endif; ?>