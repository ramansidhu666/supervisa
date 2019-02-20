<?php
/**
 * Created by PhpStorm.
 * User: phuongth
 * Date: 7/23/15
 * Time: 9:28 PM
 */

get_header();
//do_action('g5plus_before_archive');
?>
<section class="page-title-wrap page-title-wrap-bg" style="background-image: url(http://shukraan.amebasoftware.com/wp-content/themes/cortana/assets/images/bg-archive-title.jpg);height:300px">
	<div class="page-title-overlay"></div>
	<div class="container">
		<div class="page-title-inner block-center">
			<div class="block-center-inner">
				<h1>Products</h1>
        <p></p>
									<ul class="breadcrumbs "><li class="first">YOU ARE HERE: </li><li class="home"><a rel="v:url" href="http://shukraan.amebasoftware.com/" class="home">Home</a></li><li><span>products</span></li></ul>
			</div>
		</div>
	</div>
</section>
<?php
echo do_shortcode('[g5plusframework_portfolio show_category="yes" category_style="cat-style-normal" column="4" item="8" order="DESC" show_pagging="1" ]');
get_footer();
?>
