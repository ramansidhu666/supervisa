<?php

do_action('g5plus_before_page');

$data_section_id = uniqid();

$terms = wp_get_post_terms( get_the_ID(), array( G5PLUS_PORTFOLIO_CATEGORY_TAXONOMY));
$cat = $cat_filter = '';
foreach ( $terms as $term ){
	$cat_filter .= preg_replace('/\s+/', '', $term->name) .' ';
	$cat .= $term->name.', ';
}
$cat = rtrim($cat,', ');

?>
<?php
global $g5plus_options;

$layout_style = g5plus_get_post_meta($post->ID, 'g5plus_page_layout', true);
if (($layout_style === '') || ($layout_style == '-1')) {
	$layout_style = $g5plus_options['service_layout'];
}

$sidebar = g5plus_get_post_meta($post->ID, 'g5plus_page_sidebar', true);
if (($sidebar === '') || ($sidebar == '-1')) {
	$sidebar = $g5plus_options['service_sidebar'];
}

$left_sidebar = g5plus_get_post_meta($post->ID, 'g5plus_page_left_sidebar', true);
if (($left_sidebar === '') || ($left_sidebar == '-1')) {
	$left_sidebar = $g5plus_options['service_left_sidebar'];

}

$right_sidebar = g5plus_get_post_meta($post->ID, 'g5plus_page_right_sidebar', true);
if (($right_sidebar === '') || ($right_sidebar == '-1')) {
	$right_sidebar = $g5plus_options['service_right_sidebar'];
}

$sidebar_width = g5plus_get_post_meta($post->ID, 'g5plus_sidebar_width', true);
if (($sidebar_width === '') || ($sidebar_width == '-1')) {
	$sidebar_width = $g5plus_options['service_sidebar_width'];
}

// Calculate sidebar column & content column
$sidebar_col = 'col-md-3';
if ($sidebar_width == 'large') {
	$sidebar_col = 'col-md-4';
}

$content_col_number = 12;
if (is_active_sidebar($left_sidebar) && (($sidebar == 'both') || ($sidebar == 'left'))) {
	if ($sidebar_width == 'large') {
		$content_col_number -= 4;
	} else {
		$content_col_number -= 3;
	}
}
if (is_active_sidebar($right_sidebar) && (($sidebar == 'both') || ($sidebar == 'right'))) {
	if ($sidebar_width == 'large') {
		$content_col_number -= 4;
	} else {
		$content_col_number -= 3;
	}
}

$content_col = 'col-md-' . $content_col_number;
if (($content_col_number == 12) && ($layout_style == 'full')) {
	$content_col = '';
}
$main_class = array('site-content-page');

if ($content_col_number < 12) {
	$main_class[] = 'has-sidebar';
}
?>
<main class="<?php echo join(' ',$main_class) ?>">
	<?php if ($layout_style != 'full'): ?>
	<div class="<?php echo esc_attr($layout_style) ?> clearfix">
		<?php endif;?>
		<?php if (($content_col_number != 12) || ($layout_style != 'full')): ?>
		<div class="row clearfix">
			<?php endif;?>
			<?php if (is_active_sidebar( $left_sidebar ) && (($sidebar == 'left') || ($sidebar == 'both'))): ?>
				<div class="sidebar left-sidebar <?php echo esc_attr($sidebar_col) ?>">
					<?php dynamic_sidebar( $left_sidebar );?>
				</div>
			<?php endif;?>
			<div class="site-content-page-inner <?php echo esc_attr($content_col) ?>">
				<div class="page-content">
					<h3 class="cortana-title"><?php the_title(); ?></h3>
					<div class="services-slideshow" id="services_slideshow_<?php echo esc_attr($data_section_id) ?>">
						<div id="portfolio-slider" class="portfolio-single-slider">
							<ul class="slides">
								<?php if(count($meta_values) > 0){
								$index = 0;
								foreach($meta_values as $image){
									$urls = wp_get_attachment_image_src($image,'full');
									$img = '';
									if(count($urls)>0){
										$resize = matthewruddy_image_resize($urls[0],870,434);
										if($resize!=null )
											$img = $resize['url'];
									}
									?>
									<li>
										<img alt="portfolio" src="<?php echo esc_url($img) ?>" />
									</li>
								<?php } ?>
							</ul>
						</div>
						<div id="portfolio-carousel" class="portfolio-single-slider">
							<ul class="slides">
								<?php
								foreach($meta_values as $image){
									$urls = wp_get_attachment_image_src($image,'full');
									$img = '';
									if(count($urls)>0){
										$resize = matthewruddy_image_resize($urls[0],170,133);
										if($resize!=null )
											$img = $resize['url'];
									}
									?>
									<li>
										<img alt="portfolio" src="<?php echo esc_url($img) ?>" />
									</li>
								<?php } ?>
							</ul>
						</div>
						<?php
						}else { if(count($imgThumbs)>0) {?>
							<div class="item"><img alt="portfolio" src="<?php echo esc_url($imgThumbs[0])?>" /></div>
						<?php }
						}
						?>
					</div>
					<div class="service-content">
						<?php the_content() ?>
					</div>
				</div>
			</div></div>
			<?php if (is_active_sidebar( $right_sidebar ) && (($sidebar == 'right') || ($sidebar == 'both'))): ?>
				<div class="sidebar right-sidebar <?php echo esc_attr($sidebar_col) ?>">
					<?php dynamic_sidebar( $right_sidebar );?>
				</div>
			<?php endif;?>
			<?php if (($content_col_number != 12) || ($layout_style != 'full')): ?>
		</div>
			<?php endif;?>
		<?php if ($layout_style != 'full'): ?>
	</div>
<?php endif;?>

</main>
<?php
if( is_active_sidebar('sidebar-services-bottom') ){
	?>
	<div class="bottom-single-service sidebar">
		<?php dynamic_sidebar('sidebar-services-bottom'); ?>
	</div>
<?php
}
?>


