<?php
/**
 * The template for displaying all single posts.
 *
 * @package RED_Starter_Theme
 */

get_header();?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php while (have_posts()): the_post();?>
						<article id="post-<?php the_ID();?>" <?php post_class();?>>
						<header class="entry-header">



							<?php if (has_post_thumbnail()): the_post_thumbnail('full');
	endif;?>

							<?php the_title('<h1 class="entry-title">', '</h1>');?>

							<div class="entry-meta">
								<?php red_starter_posted_on();?> / <?php red_starter_comment_count();?> / <?php red_starter_posted_by();?>
							</div>
						</header>

						<div class="entry-content">
							<?php the_content();?>
					<?php
	wp_link_pages(array(
		'before' => '<div class="page-links">' . esc_html('Pages:'),
		'after' => '</div>',
	));
	?>
						<?php endwhile;?>
			</div>
		</article>

		</main><!-- #main -->
	</div><!-- #primary -->

<div class="sidebar">
<?php get_sidebar();?>
</div>

<?php get_footer();?>
