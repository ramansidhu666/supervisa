<?php
/**
 * Created by PhpStorm.
 * User: phuongth
 * Date: 7/23/15
 * Time: 9:28 PM
 */

get_header();
do_action('g5plus_before_archive');
echo do_shortcode('[vc_row layout="boxed"][vc_column][g5plusframework_services style_header="dark" column="4" item="8" show_readmore="yes"][/vc_column][/vc_row]');
get_footer();
?>