<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area col-xs-12 col-sm-6 col-sm-push-2 mt-xs-4 mt-sm-6  center-block">
	<main id="main" class="site-main row" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the single post content template.
			get_template_part( 'template-parts/content', 'single' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			if ( is_singular( 'attachment' ) ) {
				// Parent post navigation.
				the_post_navigation( array(
					'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'twentysixteen' ),
				) );
			} elseif ( is_singular( 'post' ) ) {
				 // Previous/next post navigation.
			    $next_post = get_next_post();
			    $previous_post = get_previous_post();
			    the_post_navigation( array('div class="col-xs-6">' .
		        'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentyfifteen' ) . '</span> ' .
		            '<span class="screen-reader-text">' . __( 'Next post:', 'twentyfifteen' ) . '</span>' .
		            '<span class="post-title">%title</span>' . get_the_post_thumbnail($next_post->ID,'thumbnail'), '</div><div class="col-xs-6">' .
		        'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentyfifteen' ) . '</span> ' .
		            '<span class="screen-reader-text">' . __( 'Previous post:', 'twentyfifteen' ) . '</span> ' .
		            '<span class="post-title">%title</span>' . get_the_post_thumbnail($previous_post->ID,'thumbnail'), '</div>'
    ) );
			}

			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
