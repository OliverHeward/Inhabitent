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
						<header class="entry-header container">



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
						<div class="social-buttons">
			<button type="button" class="black-btn">
				<i class="fab fa-facebook-f"> Like</i>
			</button>
			<button type="button" class="black-btn">
				<i class="fab fa-twitter"> Tweet</i>
			</button>
			<button type="button" class="black-btn">
				<i class="fab fa-pinterest"> Pin</i>
			</button>
		</div>

			</div>
		</article>
				<div class="comments">
			<?php
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
            ?>
		</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<div class="sidebar">
<?php get_sidebar();?>
</div>

<?php get_footer();?>
