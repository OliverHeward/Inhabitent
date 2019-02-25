<?php
/**
 * The template for displaying all pages.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php while (have_posts()): the_post();?>
        	<div class="entry-content">
        <article id="post-<?php the_ID();?>" <?php post_class();?>>
                <?php the_title('<h1 class="entry-title">', '</h1>');?>
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
            </div>
        </article>
    </main><!-- #main -->
</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>