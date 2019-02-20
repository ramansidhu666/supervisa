<?php
// Paging Load More
//--------------------------------------------------------------
if ( !function_exists( 'g5plus_paging_load_more' ) ) {
	function g5plus_paging_load_more() {
		global $wp_query;
		// Don't print empty markup if there's only one page.
		if ( $wp_query->max_num_pages < 2 ) {
			return;
		}
		$link = get_next_posts_page_link( $wp_query->max_num_pages );
		if ( !empty( $link ) ):
			?>
			<div class="blog-load-more-wrapper">
				<button data-href="<?php echo esc_url( $link ); ?>" type="button" data-loading-text="<i class='fa fa-refresh fa-spin'></i> <?php echo esc_html__( "Loading...", 'cortana' ); ?>" class="blog-load-more cortana-button style4 size-lg" autocomplete="off">
					<i class="fa fa-plus"></i> <?php echo esc_html__( "Load More", 'cortana' ); ?>
				</button>
			</div>
			<?php
		endif;
	}
}

// Paging Infinite Scroll
//--------------------------------------------------------------
if ( !function_exists( 'g5plus_paging_infinitescroll' ) ) {
	function g5plus_paging_infinitescroll() {
		global $wp_query;
		// Don't print empty markup if there's only one page.
		if ( $wp_query->max_num_pages < 2 ) {
			return;
		}
		$link = get_next_posts_page_link( $wp_query->max_num_pages );
		if ( !empty( $link ) ):
			?>
			<nav id="infinite_scroll_button">
				<a href="<?php echo esc_url( $link ); ?>"></a>
			</nav>
			<div id="infinite_scroll_loading" class="text-center infinite-scroll-loading"></div>
			<?php
		endif;
	}
}

// Paging Infinite Scroll
//--------------------------------------------------------------
if ( !function_exists( 'g5plus_paging_nav' ) ) {
	function g5plus_paging_nav() {
		global $wp_query, $wp_rewrite;
		// Don't print empty markup if there's only one page.
		if ( $wp_query->max_num_pages < 2 ) {
			return;
		}

		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );

		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}

		$pagenum_link = esc_url( remove_query_arg( array_keys( $query_args ), $pagenum_link ) );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

		$format = $wp_rewrite->using_index_permalinks() && !strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

		// Set up paginated links.
		$page_links = paginate_links( array(
			'base'      => $pagenum_link,
			'format'    => $format,
			'total'     => $wp_query->max_num_pages,
			'current'   => $paged,
			'mid_size'  => 1,
			'add_args'  => array_map( 'urlencode', $query_args ),
			'prev_text' => '<i class="fa fa-angle-double-left"></i>',
			'next_text' => '<i class="fa fa-angle-double-right"></i>',
			'type'      => 'array',
		) );

		if ( count( $page_links ) == 0 ) {
			return;
		}

		$links = "<ul class='pagination'>\n\t<li>";
		$links .= join( "</li>\n\t<li>", $page_links );
		$links .= "</li>\n</ul>\n";

		return $links;
	}
}

/*================================================
GET POST THUMBNAIL
================================================== */
if ( !function_exists( 'g5plus_post_thumbnail' ) ) {
	function g5plus_post_thumbnail( $size ) {
		$html   = '';
		$prefix = 'g5plus_';

		$width  = '';
		$height = '';
		global $g5plus_image_size;
		if ( isset( $g5plus_image_size[$size] ) ) {
			$width  = $g5plus_image_size[$size]['width'];
			$height = $g5plus_image_size[$size]['height'];
		}

		switch ( get_post_format() ) {
			case 'image':
				$args  = array(
					'size'     => $size,
					'meta_key' => $prefix . 'post_format_image',
				);
				$image = g5plus_get_image( $args );
				if ( !$image ) {
					break;
				}
				$html = g5plus_get_image_hover( $image, $size, get_permalink(), the_title_attribute( 'echo=0' ), get_the_ID() );
				break;
			case 'gallery':
				$images = g5plus_get_post_meta( get_the_ID(), $prefix . 'post_format_gallery' );
				if ( count( $images ) > 0 ) {
					$data_plugin_options = "data-plugin-options='{\"singleItem\" : true, \"pagination\" : false, \"navigation\" : true, \"autoHeight\" : true, \"autoPlay\" : true}'";
					$html                = "<div class='owl-carousel' $data_plugin_options>";
					foreach ( $images as $image ) {

						if ( empty( $width ) || empty( $height ) ) {
							$image_src_arr = wp_get_attachment_image_src( $image, $size );
							if ( $image_src_arr ) {
								$image_src = $image_src_arr[0];
							}
						} else {
							$image_src = matthewruddy_image_resize_id( $image, $width, $height );
						}

						if ( !empty( $image_src ) ) {
							$html .= g5plus_get_image_hover( $image_src, $size, get_permalink(), the_title_attribute( 'echo=0' ), get_the_ID(), 1 );
						}
					}
					$html .= '</div>';
				} else {
					$args  = array(
						'size'     => $size,
						'meta_key' => '',
					);
					$image = g5plus_get_image( $args );
					if ( !$image ) {
						break;
					}
					$html = g5plus_get_image_hover( $image, $size, get_permalink(), the_title_attribute( 'echo=0' ), get_the_ID() );
				}
				break;
			case 'video':
				$video = g5plus_get_post_meta( get_the_ID(), $prefix . 'post_format_video' );
				if ( count( $video ) > 0 ) {
					$html .= '<div class="embed-responsive embed-responsive-16by9 embed-responsive-' . $size . '">';
					$video = $video[0];
					// If URL: show oEmbed HTML
					if ( filter_var( $video, FILTER_VALIDATE_URL ) ) {
						$args = array(
							'wmode' => 'transparent',
						);
						$html .= wp_oembed_get( $video, $args );
					}// If embed code: just display
					else {
						$html .= $video;
					}
					$html .= '</div>';
				}
				break;
			case 'audio':
				$audio = g5plus_get_post_meta( get_the_ID(), $prefix . 'post_format_audio' );
				if ( count( $audio ) > 0 ) {
					$audio = $audio[0];
					if ( filter_var( $audio, FILTER_VALIDATE_URL ) ) {
						$html .= wp_oembed_get( $audio );
						$title = esc_attr( get_the_title() );
						$audio = esc_url( $audio );
						if ( empty( $html ) ) {
							$id = uniqid();
							$html .= "<div data-player='$id' class='jp-jplayer' data-audio='$audio' data-title='$title'></div>";
							$html .= g5plus_jplayer( $id );
						}
					} else {
						$html .= $audio;
					}
					$html .= '<div style="clear:both;"></div>';
				}
				break;
			default:
				$args  = array(
					'size'     => $size,
					'meta_key' => '',
				);
				$image = g5plus_get_image( $args );
				if ( !$image ) {
					break;
				}
				$html = g5plus_get_image_hover( $image, $size, get_permalink(), the_title_attribute( 'echo=0' ), get_the_ID() );
				break;
		}

		return $html;
	}
}

/*================================================
GET POST IMAGE
================================================== */
if ( !function_exists( 'g5plus_get_image' ) ) {
	function g5plus_get_image( $args ) {
		$default = apply_filters(
			'g5plus_get_image_default_args',
			array(
				'post_id'  => get_the_ID(),
				'size'     => '',
				'width'    => '',
				'height'   => '',
				'attr'     => '',
				'meta_key' => '',
				'scan'     => false,
				'default'  => ''
			)
		);

		$args = wp_parse_args( $args, $default );
		$size = $args['size'];

		$width  = '';
		$height = '';

		global $g5plus_image_size;
		if ( isset( $g5plus_image_size[$size] ) ) {
			$width  = $g5plus_image_size[$size]['width'];
			$height = $g5plus_image_size[$size]['height'];
		}

		if ( !$args['post_id'] ) {
			$args['post_id'] = get_the_ID();
		}

		// Get image from cache
		$key         = md5( serialize( $args ) );
		$image_cache = wp_cache_get( $args['post_id'], 'g5plus_get_image' );

		if ( !is_array( $image_cache ) ) {
			$image_cache = array();
		}

		if ( empty( $image_cache[$key] ) ) {

			$image_src = '';

			// Get post thumbnail
			if ( has_post_thumbnail( $args['post_id'] ) ) {
				$post_thumbnail_id = get_post_thumbnail_id( $args['post_id'] );

				if ( empty( $width ) || empty( $height ) ) {
					$image_src_arr = wp_get_attachment_image_src( $post_thumbnail_id, $size );
					if ( $image_src_arr ) {
						$image_src = $image_src_arr[0];
					}
				} else {
					$image_src = matthewruddy_image_resize_id( $post_thumbnail_id, $width, $height );
				}
			}

			// Get the first image in the custom field
			if ( ( !isset( $image_src ) || empty( $image_src ) ) && $args['meta_key'] ) {
				$post_thumbnail_id = g5plus_get_post_meta( $args['post_id'], $args['meta_key'], true );
				if ( $post_thumbnail_id ) {

					if ( empty( $width ) || empty( $height ) ) {
						$image_src_arr = wp_get_attachment_image_src( $post_thumbnail_id, $size );
						if ( $image_src_arr ) {
							$image_src = $image_src_arr[0];
						}
					} else {
						$image_src = matthewruddy_image_resize_id( $post_thumbnail_id, $width, $height );
					}
				}
			}

			// Get the first image in the post content
			if ( ( !isset( $image_src ) || empty( $image_src ) ) && ( $args['scan'] ) ) {
				preg_match( '|<img.*?src=[\'"](.*?)[\'"].*?>|i', get_post_field( 'post_content', $args['post_id'] ), $matches );
				if ( !empty( $matches ) ) {
					$image_src = $matches[1];
				}
			}

			// Use default when nothing found
			if ( ( !isset( $image_src ) || empty( $image_src ) ) && !empty( $args['default'] ) ) {
				if ( is_array( $args['default'] ) ) {
					$image_src = @$args['src'];
				} else {
					$image_src = $args['default'];
				}
			}

			if ( !isset( $image_src ) || empty( $image_src ) ) {
				return false;
			}
			$image_cache[$key] = $image_src;
			wp_cache_set( $args['post_id'], $image_cache, 'g5plus_get_image' );
		} else {
			$image_src = $image_cache[$key];
		}
		$image_src = apply_filters( 'g5plus_get_image', $image_src, $args );

		return $image_src;
	}
}

/*================================================
GET IMAGE HOVER
================================================== */
if ( !function_exists( 'g5plus_get_image_hover' ) ) {
	function g5plus_get_image_hover( $image, $size, $url, $title, $post_id, $gallery = 0 ) {
		$attachment_id = g5plus_get_attachment_id_from_url( $image );

		$image_full_arr = wp_get_attachment_image_src( $attachment_id, 'full' );

		$image_full = $image;

		if ( isset( $image_full_arr ) ) {
			$image_full = $image_full_arr[0];
		}

		$width  = '';
		$height = '';

		global $g5plus_image_size;
		if ( isset( $g5plus_image_size[$size] ) ) {
			$width  = $g5plus_image_size[$size]['width'];
			$height = $g5plus_image_size[$size]['height'];
		} else {
			global $_wp_additional_image_sizes;
			if ( in_array( $size, array( 'thumbnail', 'medium', 'large' ) ) ) {
				$width  = get_option( $size . '_size_w' );
				$height = get_option( $size . '_size_h' );

			} elseif ( isset( $_wp_additional_image_sizes[$size] ) ) {
				$width  = $_wp_additional_image_sizes[$size]['width'];
				$height = $_wp_additional_image_sizes[$size]['height'];
			}
		}

		$prettyPhoto = 'prettyPhoto';
		if ( $gallery == 1 ) {
			$prettyPhoto = 'prettyPhoto[blog_' . $post_id . ']';
		}
		if ( empty( $width ) || empty( $height ) ) {
			return sprintf( '<div class="entry-thumbnail">
                        <a href="%1$s" title="%2$s" class="entry-thumbnail_overlay">
                            <img class="img-responsive" src="%3$s" alt="%2$s"/>
                        </a>
                        <a data-rel="%5$s" href="%4$s" class="prettyPhoto"><i class="fa fa-expand"></i></a>
                      </div>',
				$url,
				$title,
				$image,
				$image_full,
				$prettyPhoto
			);
		} else {
			return sprintf( '<div class="entry-thumbnail">
                        <a href="%1$s" title="%2$s" class="entry-thumbnail_overlay">
                            <img width="%6$s" height="%7$s" class="img-responsive" src="%3$s" alt="%2$s"/>
                        </a>
                        <a data-rel="%5$s" href="%4$s" class="prettyPhoto"><i class="fa fa-expand"></i></a>
                      </div>',
				$url,
				$title,
				$image,
				$image_full,
				$prettyPhoto,
				$width,
				$height
			);
		}

	}
}

/*================================================
GET ATTACHMENT ID FROM URL
================================================== */
if ( !function_exists( 'g5plus_get_attachment_id_from_url' ) ) {
	function g5plus_get_attachment_id_from_url( $attachment_url = '' ) {
		global $wpdb;
		$attachment_id = false;

		// If there is no url, return.
		if ( '' == $attachment_url ) {
			return;
		}

		// Get the upload directory paths
		$upload_dir_paths = wp_upload_dir();

		// Make sure the upload path base directory exists in the attachment URL, to verify that we're working with a media library image
		if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {

			// If this is the URL of an auto-generated thumbnail, get the URL of the original image
			$attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );

			// Remove the upload path base directory from the attachment URL
			$attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );

			// Finally, run a custom database query to get the attachment ID from the modified attachment URL
			$attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );

		}

		return $attachment_id;
	}
}

/*================================================
GET JPLAYER
================================================== */
if ( !function_exists( 'g5plus_jplayer' ) ) {
	function g5plus_jplayer( $id = 'jp_container_1' ) {
		?>
		<div id="<?php echo esc_attr( $id ); ?>" class="jp-audio">
			<div class="jp-type-playlist">
				<div class="jp-gui jp-interface">
					<ul class="jp-controls jp-play-pause">
						<li><a href="javascript:" class="jp-play" tabindex="1"><i
									class="fa fa-play"></i> <?php echo esc_html__( 'play', 'cortana' ); ?></a></li>
						<li><a href="javascript:" class="jp-pause" tabindex="1"><i
									class="fa fa-pause"></i> <?php echo esc_html__( 'pause', 'cortana' ); ?></a></li>
					</ul>

					<div class="jp-progress">
						<div class="jp-seek-bar">
							<div class="jp-play-bar"></div>
						</div>
					</div>

					<ul class="jp-controls jp-volume">
						<li>
							<a href="javascript:;" class="jp-mute" tabindex="1" title="mute"><i
									class="fa  fa-volume-up"></i> <?php echo esc_html__( 'mute', 'cortana' ); ?></a>
						</li>
						<li>
							<a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute"><i
									class="fa fa-volume-off"></i><?php echo esc_html__( 'unmute', 'cortana' ); ?></a>
						</li>
						<li>
							<div class="jp-volume-bar">
								<div class="jp-volume-bar-value"></div>
							</div>
						</li>

					</ul>

					<div class="jp-time-holder">
						<div class="jp-current-time"></div>
						<div class="jp-duration"></div>
					</div>
					<ul class="jp-toggles">
						<li>
							<a href="javascript:;" class="jp-shuffle" tabindex="1"
							   title="shuffle"><?php echo esc_html__( 'shuffle', 'cortana' ); ?></a>
						</li>
						<li>
							<a href="javascript:" class="jp-shuffle-off" tabindex="1"
							   title="shuffle off"><?php echo esc_html__( 'shuffle off', 'cortana' ); ?></a>
						</li>
						<li>
							<a href="javascript:;" class="jp-repeat" tabindex="1"
							   title="repeat"><?php echo esc_html__( 'repeat', 'cortana' ); ?></a>
						</li>
						<li>
							<a href="javascript:;" class="jp-repeat-off" tabindex="1"
							   title="repeat off"><?php echo esc_html__( 'repeat off', 'cortana' ); ?></a>
						</li>
					</ul>
				</div>

				<div class="jp-no-solution">
					<?php printf( __( '<span>Update Required</span> To play the media you will need to either update your browser to a recent version or update your <a href="%s" target="_blank">Flash plugin</a>.', 'cortana' ), 'http://get.adobe.com/flashplayer/' ); ?>
				</div>
			</div>
		</div>
		<?php
	}
}

/*================================================
GET POST DATE
================================================== */
if ( !function_exists( 'g5plus_post_date' ) ) {
	function g5plus_post_date() {
		g5plus_get_template( 'archive/post-date' );
	}
}

/*================================================
GET POST META
================================================== */
if ( !function_exists( 'g5plus_post_meta' ) ) {
	function g5plus_post_meta() {
		g5plus_get_template( 'archive/post-meta' );
	}
}

/*================================================
GET POST META FOOTER
================================================== */
if ( !function_exists( 'g5plus_post_meta_footer' ) ) {
	function g5plus_post_meta_footer() {
		g5plus_get_template( 'archive/post-meta-footer' );
	}
}
/*================================================
GET POST META SMALL
================================================== */
if ( !function_exists( 'g5plus_post_meta_small' ) ) {
	function g5plus_post_meta_small() {
		g5plus_get_template( 'archive/post-meta-small' );
	}
}

/*================================================
ARCHIVE LOOP RESET
================================================== */
if ( !function_exists( 'g5plus_archive_loop_reset' ) ) {
	function g5plus_archive_loop_reset() {
		global $g5plus_archive_loop;
		$g5plus_archive_loop['image-size'] = '';
		$g5plus_archive_loop['style']      = '';
	}
}

/*================================================
POST NAV
================================================== */
if ( !function_exists( 'g5plus_post_nav' ) ) {
	function g5plus_post_nav() {
		g5plus_get_template( 'single-blog/post-nav' );
	}

	add_action( 'g5plus_after_single_post_content', 'g5plus_post_nav', 20 );
}

/*================================================
LINK PAGES
================================================== */
if ( !function_exists( 'g5plus_link_pages' ) ) {
	function g5plus_link_pages() {
		wp_link_pages( array(
			'before'      => '<div class="g5plus-page-links"><span class="g5plus-page-links-title">' . esc_html__( 'Pages:', 'cortana' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span class="g5plus-page-link">',
			'link_after'  => '</span>',
		) );
	}

	add_action( 'g5plus_after_single_post_content', 'g5plus_link_pages', 5 );
}

/*================================================
POST TAGS
================================================== */
if ( !function_exists( 'g5plus_post_tags' ) ) {
	function g5plus_post_tags() {
		g5plus_get_template( 'single-blog/post-tags' );
	}

	add_action( 'g5plus_after_single_post_content', 'g5plus_post_tags', 10 );
}

/*================================================
SHARE
================================================== */
if ( !function_exists( 'g5plus_share' ) ) {
	function g5plus_share() {
		g5plus_get_template( 'social-share' );
	}

	add_action( 'g5plus_after_single_post_content', 'g5plus_share', 15 );
}
/*================================================
Author
================================================== */
if ( !function_exists( 'g5plus_author' ) ) {
	function g5plus_author() {
		g5plus_get_template( 'single-blog/post-author' );
	}

	add_action( 'g5plus_after_single_post_content', 'g5plus_share', 15 );
}

/*================================================
RENDER COMMENTS
================================================== */
if ( !function_exists( 'g5plus_render_comments' ) ) {
	function g5plus_render_comments( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment; ?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment-body clearfix">
			<div class="comment-avatar-wrap">
				<?php echo get_avatar( $comment, $args['avatar_size'] ); ?>

			</div>
			<div class="comment-text">
				<div class="author">
					<div class="author-name"><?php printf( __( '%s', 'cortana' ), get_comment_author_link() ) ?></div>
				</div>
				<div class="comment-meta">
														                            <span class="comment-meta-date">
		<?php echo get_comment_date( 'M d, Y \a\t g:i a' ); ?>
		</span>
					<?php edit_comment_link( esc_html__( 'Edit', 'cortana' ), '<span class="comment-meta-edit">', '</span>' ) ?>
				</div>
				<div class="text"><?php comment_text() ?></div>
				<div class="comment-footer">
					<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => esc_html__( 'Reply', 'cortana' ) ) ) ) ?>
				</div>
				<?php if ( $comment->comment_approved == '0' ): ?>
					<em><?php echo esc_html__( 'Your comment is awaiting moderation.', 'cortana' ) ?></em>
				<?php endif; ?>
			</div>
		</div>
		<?php
	}
}

/*================================================
COMMENTS FORM
================================================== */
if ( !function_exists( 'g5plus_comment_form' ) ) {
	function g5plus_comment_form() {
		$commenter = wp_get_current_commenter();
		$req       = get_option( 'require_name_email' );
		$aria_req  = ( $req ? " aria-required='true'" : '' );
		$html5     = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';;
		$fields            = array(
			'author' => '<div class="form-group col-md-12">' .
				'<label for="author">' . esc_html__( 'Name', 'cortana' ) . '</label>' .
				'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" placeholder="' . esc_html__( 'Name', 'cortana' ) . '" ' . $aria_req . '>' .
				'</div>',
			'email'  => '<div class="form-group col-md-12">' .
				'<label for="email">' . esc_html__( 'Email', 'cortana' ) . '</label>' .
				'<input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_email'] ) . '" placeholder="' . esc_html__( 'Email', 'cortana' ) . '" ' . $aria_req . '>' .
				'</div>',
			'url'    => '<div class="form-group col-md-12">' .
				'<label for="url">' . esc_html__( "Website", "cortana" ) . '</label>' .
				'<input id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="' . esc_html__( 'Website', 'cortana' ) . '" />' .
				'</div>'
		);
		$fields            = apply_filters( 'g5plus_comment_fields', $fields );
		$comment_form_args = array(
			'fields'               => $fields,
			'comment_field'        => '<div class="form-group col-md-12">' .
				'<label for="comment">' . esc_html__( 'Message', 'cortana' ) . '</label>' .
				'<textarea rows="6" id="comment" name="comment"  placeholder="' . esc_html__( 'Message', 'cortana' ) . '" ' . $aria_req . '>' . esc_attr( $commenter['comment_author_url'] ) . '</textarea>' .
				'</div>',
			'comment_notes_before' => '<p class="comment-notes">' .
				esc_html__( 'Your email address will not be published.', 'cortana' )/* . ( $req ? $required_text : '' ) */ .
				'</p>',
			'comment_notes_after'  => '',
			'id_submit'            => 'btnComment',
			'class_submit'         => 'button-comment',
			'title_reply'          => esc_html__( 'POST YOUR COMMENT', 'cortana' ),
			'title_reply_to'       => esc_html__( 'POST YOUR COMMENT to %s', 'cortana' ),
			'cancel_reply_link'    => esc_html__( 'Cancel reply', 'cortana' ),
			'label_submit'         => esc_html__( 'SEND MESSAGE', 'cortana' )
		);

		$comment_form_args = apply_filters( 'g5plus_comment_form_args', $comment_form_args );

		comment_form( $comment_form_args );
	}
}
/*================================================
Post view Count
================================================== */
if ( !function_exists( 'g5plus_set_post_views' ) ) {
	function g5plus_set_post_views( $postID ) {
		$count_key = 'wpb_post_views_count';
		$count     = get_post_meta( $postID, $count_key, true );
		if ( $count == '' ) {
			$count = 0;
			delete_post_meta( $postID, $count_key );
			add_post_meta( $postID, $count_key, '0' );
		} else {
			$count ++;
			update_post_meta( $postID, $count_key, $count );
		}
	}
}

if ( !function_exists( 'g5plus_track_post_views' ) ) {
	function g5plus_track_post_views( $post_id ) {
		if ( !is_single() ) {
			return;
		}
		if ( empty( $post_id ) ) {
			global $post;
			$post_id = $post->ID;
		}
		g5plus_set_post_views( $post_id );
	}

	add_action( 'wp_head', 'g5plus_track_post_views' );
}
if ( !function_exists( 'g5plus_get_post_views' ) ) {
	function g5plus_get_post_views( $postID ) {
		$count_key = 'wpb_post_views_count';
		$count     = get_post_meta( $postID, $count_key, true );
		if ( $count == '' ) {
			delete_post_meta( $postID, $count_key );
			add_post_meta( $postID, $count_key, '0' );

			return "0";
		}

		return $count;
	}
}
/*================================================
new_excerpt_more
================================================== */
function new_excerpt_more( $more ) {
	global $post;

	return '... <a class="read-more own_read_more" href="' . get_permalink( $post->ID ) . '"> READ MORE</a>';
}

add_filter( 'excerpt_more', 'new_excerpt_more' );

/*================================================
new_excerpt_more
================================================== */
add_action( 'show_user_profile', 'g5plus_extra_profile_fields' );
add_action( 'edit_user_profile', 'g5plus_extra_profile_fields' );

function g5plus_extra_profile_fields( $user ) { ?>

	<h3>Extra profile information</h3>

	<table class="form-table">

		<tr>
			<th><label for="facebook">Facebook</label></th>

			<td>
				<input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your facebook.</span>
			</td>
		</tr>

		<tr>
			<th><label for="twitter">Twitter</label></th>

			<td>
				<input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Twitter.</span>
			</td>
		</tr>

		<tr>
			<th><label for="flickr">Flickr</label></th>

			<td>
				<input type="text" name="flickr" id="flickr" value="<?php echo esc_attr( get_the_author_meta( 'flickr', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Flickr.</span>
			</td>
		</tr>
		<tr>
			<th><label for="linkedin">Linkedin</label></th>

			<td>
				<input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Linkedin.</span>
			</td>
		</tr>

	</table>
<?php }

add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) ) {
		return false;
	}

	/* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
	update_user_meta( $user_id, 'facebook', $_POST['facebook'] );
	update_user_meta( $user_id, 'twitter', $_POST['twitter'] );
	update_user_meta( $user_id, 'flickr', $_POST['flickr'] );
	update_user_meta( $user_id, 'linkedin', $_POST['linkedin'] );
}

if ( !function_exists( 'excerpt' ) ) {
	function excerpt( $limit ) {
		$content = get_the_excerpt();
		$content = apply_filters( 'the_content', $content );
		$content = str_replace( ']]>', ']]&gt;', $content );
		$content = explode( ' ', $content, $limit );
		array_pop( $content );
		$content = implode( " ", $content );

		return $content;
	}
}
