<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 6/5/2015
 * Time: 2:29 PM
 */
$g5plus_options = g5plus_option();
$g5plus_archive_loop = g5plus_archive_loop();

$archive_style = 'classic';
if ( isset( $g5plus_archive_loop['style'] ) && !empty( $g5plus_archive_loop['style'] ) ) {
	$archive_style = $g5plus_archive_loop['style'];
}
$prefix = 'g5plus_';

$url  = g5plus_get_post_meta( get_the_ID(), $prefix . 'post_format_link_url', true );
$text = g5plus_get_post_meta( get_the_ID(), $prefix . 'post_format_link_text', true );

$class   = array();
$class[] = "clearfix";
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>
	<div class="entry-wrap clearfix">
		<?php if ( !empty( $url ) && !empty( $text ) ) : ?>
			<div class="entry-thumbnail-wrap">
				<div class="entry-content-link">
					<a href="<?php echo esc_url( $url ); ?>" rel="bookmark">
						<?php echo esc_html( $text ); ?>
					</a>
				</div>
			</div>
		<?php endif; ?>
		<div class="entry-content-wrap">
			<div class="entry-content-top-wrap clearfix">
				<div class="entry-content-top-right">
					<h3 class="entry-title">
						<?php the_title(); ?>
					</h3>

					<div class="entry-post-meta-wrap">
						<?php g5plus_post_meta(); ?>
					</div>
				</div>
			</div>
			<div class="entry-content clearfix">
				<?php the_content(); ?>
			</div>
			<div class="entry-footer-blog clearfix">
				<?php
				/**
				 * @hooked - g5plus_link_pages - 5
				 * @hooked - g5plus_post_tags - 10
				 * @hooked - g5plus_post_nav - 20
				 *
				 **/
				do_action( 'g5plus_after_single_post_content' );
				?>
			</div>
			<?php g5plus_author(); ?>
		</div>
	</div>
</article>