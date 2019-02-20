<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="text" class="search-field" placeholder="<?php echo esc_attr__( 'Search Products', 'cortana' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr__( 'Search for:', 'cortana' ); ?>" />
	<button type="submit"><i class="fa fa-search"></i></button>
	<input type="hidden" name="post_type" value="product" />
</form>
