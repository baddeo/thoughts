<?php
/**
 * @package Independent Publisher
 * @since   Independent Publisher 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
	
	<?php if ( has_post_thumbnail() && ! independent_publisher_has_full_width_featured_image() ) : ?>
		<?php the_post_thumbnail( 'independent_publisher_post_thumbnail', array( 'itemprop' => 'image' ) ); ?>
	<?php endif; ?>

	<footer class="entry-meta">

		<?php independent_publisher_posted_author_cats() ?>

		<?php 
			echo independent_publisher_get_post_date();
			/* Show post date when show post date option enabled */
			/*if ( independent_publisher_show_date_entry_meta() )
			{
				echo independent_publisher_get_post_date();
			}*/ 
		?>

	</footer>
	
	<header class="entry-header">
		<h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1>
	</header>
	
	<div class="entry-content" itemprop="mainContentOfPage">
		<?php the_content(); ?>
		<?php wp_link_pages(
			array(
				'before'           => '<div class="page-links-next-prev">',
				'after'            => '</div>',
				'nextpagelink'     => '<button class="next-page-nav">' . __( 'Next page &rarr;', 'independent-publisher' ) . '</button>',
				'previouspagelink' => '<button class="previous-page-nav">' . __( '&larr; Previous page', 'independent-publisher' ) . '</button>',
				'next_or_number'   => 'next'
			)
		); ?>
		<?php wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'independent-publisher' ),
				'after'  => '</div>'
			)
		); ?>
	</div>

	<?php // independent_publisher_posted_author_bottom_card() ?>



</article><!-- #post-<?php the_ID(); ?> -->
