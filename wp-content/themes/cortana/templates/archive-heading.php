<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 6/3/2015
 * Time: 9:16 AM
 */
$g5plus_options = g5plus_option();
$prefix                  = 'g5plus_';
$custom_text_color_style = '';
$show_page_title         = $g5plus_options['show_archive_title'];
if ( $show_page_title == 0 ) {
	return;
}
$page_description = '';
$on_front         = get_option( 'show_on_front' );
$page_title       = '';
if ( !have_posts() ) {
	$page_title = esc_html__( "Nothing Found", 'cortana' );
} elseif ( is_home() ) {
	if ( ( $on_front == 'page' && get_queried_object_id() == get_post( get_option( 'page_for_posts' ) )->ID ) || ( $on_front == 'posts' ) ) {
		$page_title = esc_html__( "News", 'cortana' );
	} else {
		$page_title = '';
	}
} elseif ( is_category() ) {
	$page_title = single_cat_title( '', false );
} elseif ( is_tag() ) {
	$page_title = single_tag_title( esc_html__( "Tags: ", 'cortana' ), false );
} elseif ( is_author() ) {
	$page_title = sprintf( esc_html__( 'Author: %s', 'cortana' ), get_the_author() );
} elseif ( is_day() ) {
	$page_title = sprintf( esc_html__( 'Daily Archives: %s', 'cortana' ), get_the_date() );
} elseif ( is_month() ) {
	$page_title = sprintf( esc_html__( 'Monthly Archives: %s', 'cortana' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'cortana' ) ) );
} elseif ( is_year() ) {
	$page_title = sprintf( esc_html__( 'Yearly Archives: %s', 'cortana' ), get_the_date( _x( 'Y', 'yearly archives date format', 'cortana' ) ) );
} elseif ( is_search() ) {
	$page_title = sprintf( esc_html__( 'Search Results for: %s', 'cortana' ), get_search_query() );
} elseif ( is_tax( 'post_format', 'post-format-aside' ) ) {
	$page_title = esc_html__( 'Asides', 'cortana' );
} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
	$page_title = esc_html__( 'Galleries', 'cortana' );
} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
	$page_title = esc_html__( 'Images', 'cortana' );
} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
	$page_title = esc_html__( 'Videos', 'cortana' );
} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
	$page_title = esc_html__( 'Quotes', 'cortana' );
} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
	$page_title = esc_html__( 'Links', 'cortana' );
} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
	$page_title = esc_html__( 'Statuses', 'cortana' );
} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
	$page_title = esc_html__( 'Audios', 'cortana' );
} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
	$page_title = esc_html__( "Chats", 'cortana' );
} else {
	$page_title = esc_html__( "Archives", 'cortana' );
}
$page_description = rwmb_meta( $prefix . 'page_description', 'type=text', get_the_ID() );

if ( is_category() ) {
	$category         = get_category( get_query_var( 'cat' ) );
	$cat_id           = $category->cat_ID;
	$page_description = category_description( $cat_id );
} elseif ( taxonomy_exists( 'portfolio-category' ) ) {
	$taxonomy = get_queried_object();
	if ( $taxonomy ) {
		$term_id          = $taxonomy->term_id;
		$page_description = term_description( $term_id, 'portfolio-category' );
	}
} elseif ( taxonomy_exists( 'ourteam_category' ) ) {
	$taxonomy = get_queried_object();
	if ( $taxonomy ) {
		$term_id          = $taxonomy->term_id;
		$page_description = term_description( $term_id, 'ourteam_category' );
	}
} elseif ( taxonomy_exists( 'services-category' ) ) {
	$taxonomy = get_queried_object();
	if ( $taxonomy ) {
		$term_id          = $taxonomy->term_id;
		$page_description = term_description( $term_id, 'services-category' );
	}
}


//archive
$page_title_bg_image = '';
$page_title_height   = '';
$cat                 = get_queried_object();
if ( $cat && property_exists( $cat, 'term_id' ) ) {
	$page_title_bg_image = get_tax_meta( $cat, $prefix . 'page_title_background' );
	$page_title_height   = get_tax_meta( $cat, $prefix . 'page_title_height' );
}


if ( !$page_title_bg_image || ( $page_title_bg_image === '' ) ) {
	$page_title_bg_image = $g5plus_options['archive_title_bg_image'];
}


if ( isset( $page_title_bg_image ) && isset( $page_title_bg_image['url'] ) ) {
	$page_title_bg_image_url = $page_title_bg_image['url'];
}

if ( ( $page_title_height === '' ) || $page_title_height <= 0 ) {
	$page_title_height = isset($g5plus_options['archive_title_height']['height']) ? $g5plus_options['archive_title_height']['height'] : '';
}


$breadcrumbs_in_page_title = $g5plus_options['breadcrumbs_in_archive_title'];

$class   = array();
$class[] = 'page-title-wrap';

$custom_styles = array();


if ( $page_title_bg_image_url != '' ) {
	$class[]         = 'page-title-wrap-bg';
	$custom_styles[] = 'background-image: url(' . $page_title_bg_image_url . ')';
}

if ( ( $page_title_height != '' ) && ( $page_title_height > 0 ) ) {
	$custom_styles[] = 'height:' . $page_title_height . 'px';
}
$class_name = join( ' ', $class );

$custom_style = '';
if ( $custom_styles ) {
	$custom_style = 'style="' . join( ';', $custom_styles ) . '"';
}
if ( $page_title_bg_image_url != '' ) {
	$class[]         = 'page-title-wrap-bg';
	$custom_styles[] = 'background-image: url(' . $page_title_bg_image_url . ');';
}
/*if (!empty($page_title_bg_image_url)) {
    $custom_style.= ' data-stellar-background-ratio="0.5"';
}*/
$allowed_html = array(
	'i'  => array(
		'class' => array(),
	),
	'p'  => array(),
	'em' => array(),
);
?>


<section class="<?php echo esc_attr( $class_name ) ?>" <?php echo wp_kses_post( $custom_style ); ?>>
	<div class="page-title-overlay"></div>
	<div class="container">
		<div class="page-title-inner block-center">
			<div class="block-center-inner">
				<h1><?php echo esc_html( $page_title ); ?></h1>
				<?php if ( $page_description != '' ) : ?>
					<?php echo wp_kses( ( $page_description ), $allowed_html ) ?>
				<?php endif; ?>
				<?php if ( $breadcrumbs_in_page_title == 1 ) {
					g5plus_the_breadcrumb();
				} ?>
			</div>
		</div>
	</div>
</section>