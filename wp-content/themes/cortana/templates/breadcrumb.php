<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 6/3/2015
 * Time: 10:20 AM
 */
$g5plus_options = g5plus_option();
$g5plus_archive_loop = g5plus_archive_loop();
$g5plus_breadcrumbs_position = $class_breadcrumbs = '';
$prefix                      = 'g5plus_';
$g5plus_breadcrumbs_position = rwmb_meta( $prefix . 'breadcrumbs_position' );
if ( ( $g5plus_breadcrumbs_position === '' ) || ( $g5plus_breadcrumbs_position == '-1' ) ) {
	$g5plus_breadcrumbs_position = $g5plus_options['breadcrumbs_position'];
}
if ( $g5plus_breadcrumbs_position == '1' ) {
	$class_breadcrumbs = 'breadcrumbs-left';
} else {
	$class_breadcrumbs = 'breadcrumbs-right';
}
?>
<?php if ( !is_front_page() ) : ?>
	<?php g5plus_get_breadcrumb(); ?>
<?php else: ?>
	<ul class="breadcrumbs <?php echo esc_attr( $class_breadcrumbs ) ?>">
		<li class="first" typeof="v:Breadcrumb"><?php echo esc_html__( 'YOU ARE HERE: ', 'cortana' ) ?></li>
		<li class="home">
			<a rel="v:url" href="<?php echo esc_html( home_url( '/' ) ) ?>" class="home"><?php echo esc_html__( 'Home', 'cortana' ) ?></a>
		</li>
		<li><span><?php echo esc_html__( 'Blog', 'cortana' ); ?></span></li>
	</ul>
<?php endif; ?>

