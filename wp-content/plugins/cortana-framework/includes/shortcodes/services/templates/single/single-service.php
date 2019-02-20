<?php
get_header();

if ( have_posts() ) {
    // Start the Loop.
    while ( have_posts() ) : the_post();
        $post_id = get_the_ID();

        $meta_values = g5plus_get_post_meta( get_the_ID(), 'g5plus_services_gallery', false );
        $imgThumbs = wp_get_attachment_image_src(get_post_thumbnail_id($post_id),'full');
        $cat = '';
        $arrCatId = array();
        if($categories){
            foreach($categories as $category) {
                $arrCatId[count($arrCatId)] = $category->term_id;
            }
        }

        $image_size = 'thumbnail-1170x730'; // image size for related

        include_once(plugin_dir_path( __FILE__ ).'/small-slider.php');

    endwhile;
    }
?>

<script type="text/javascript">
	(function ($) {
		"use strict";
		$(document).ready(function () {
			$("a[rel^='prettyPhoto']").prettyPhoto(
				{
					theme       : 'light_rounded',
					slideshow   : 5000,
					deeplinking : false,
					social_tools: false
				});
			$('.portfolio-item > div.entry-thumbnail').hoverdir();
		});


		$(window).load(function () {
			$('#portfolio-carousel').flexslider({
				animation    : "slide",
				controlNav   : false,
				animationLoop: false,
				slideshow    : false,
				itemWidth    : 170,
				itemMargin   : 15,
				rtl: true,
				asNavFor     : '#portfolio-slider'
			});
			$('#portfolio-slider').flexslider({
				animation    : "slide",
				directionNav : true,
				controlNav   : false,
				animationLoop: false,
				slideshow    : true,
				rtl: true,
				sync         : "#portfolio-carousel",
				start        : function (slider) {
					slider.removeClass('loading');
				}
			});
		});
		/* Property detail page slider variation two */


	})(jQuery);
</script>

<?php get_footer(); ?>
