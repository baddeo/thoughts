<?php

if ( ! function_exists( 'independent_baddeo_content_nav' ) ) :
	/**
	 * Display navigation to next/previous pages when applicable
	 */
	function independent_baddeo_content_nav( $nav_id ) {
		global $wp_query, $post;

		// Don't print empty markup on single pages if there's nowhere to navigate.
		if ( is_single() ) {
			$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
			$next     = get_adjacent_post( false, '', false );

			if ( ! $next && ! $previous ) {
				return;
			}
		}

		// Don't print empty markup in archives if there's only one page.
		if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) ) {
			return;
		}

		$nav_class = 'site-navigation paging-navigation';
		if ( is_single() )
			$nav_class = 'site-navigation post-navigation';

		?>
		<nav role="navigation" id="<?php echo $nav_id; ?>" class="<?php echo $nav_class; ?>">
			<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'independent-publisher' ); ?></h1>

			<?php if ( is_single() ) : // navigation links for single posts ?>

				<?php previous_post_link( '<div class="nav-previous"><button>%link</button></div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'independent-publisher' ) . '</span> %title' ); ?>
				<?php next_post_link( '<div class="nav-next"><button>%link</button></div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'independent-publisher' ) . '</span>' ); ?>

			<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

				<?php if ( get_next_posts_link() ) : ?>
					<div class="nav-previous"><?php next_posts_link( '<button>' . __( '<span class="meta-nav">&larr;</span> ' . independent_baddeo_previous_posts_text(), 'independent-publisher' ) . '</button>' ); ?></div>
				<?php endif; ?>

				<?php if ( get_previous_posts_link() ) : ?>
					<div class="nav-next"><?php previous_posts_link( '<button>' . __( independent_baddeo_next_posts_text() . ' <span class="meta-nav">&rarr;</span>', 'independent-publisher' ) . '</button>' ); ?></div>
				<?php endif; ?>

			<?php endif; ?>

		</nav><!-- #<?php echo $nav_id; ?> -->
	<?php
	}
endif; // independent_baddeo_content_nav


function independent_baddeo_previous_posts_text() {
	$previous_posts_text = get_theme_mod( 'previous_posts_text' );
	if ( isset( $previous_posts_text ) && trim( $previous_posts_text ) !== '' ) {
		return esc_attr( $previous_posts_text );
	} else {
		return __( 'Previous', 'independent-baddeo' );
	}
}

function independent_baddeo_next_posts_text() {
	$next_posts_text = get_theme_mod( 'next_posts_text' );
	if ( isset( $next_posts_text ) && trim( $next_posts_text ) !== '' ) {
		return esc_attr( $next_posts_text );
	} else {
		return __( 'Next', 'independent-baddeo' );
	}
}

function independent_baddeo_show_comments() {
	// TODO 
	return false;
}

function independent_baddeo_show_reading_time() {
	$independent_publisher_general_options = get_option( 'independent_publisher_general_options' );
	if ( isset( $independent_publisher_general_options['show_post_reading_time'] ) && $independent_publisher_general_options['show_post_reading_time'] ) {
		return true;
	} 
	else return false;
}

function independent_baddeo_get_reading_time() {

	global $post;

	$content = get_post_field( 'post_content', $post->ID );
	$word_count = number_format( str_word_count( strip_tags( $content ) ) );
	$words_per_minute = 200; // see https://en.wikipedia.org/wiki/Words_per_minute
	$reading_time = number_format($word_count / $words_per_minute);
	$reading_time_string = 'About ' . $reading_time . ' minute';
	if ($reading_time > 2) $reading_time_string .= 's';
	if ($reading_time < 1) $reading_time_string = 'Less than a minute';
	$reading_time_string .= ' to read'; 
	
	// TODO
	$separator = '';

	return sprintf( '<span>' . __( '%1$s', 'independent-baddeo' ) . '</span>%2$s', $reading_time_string, $separator );
}