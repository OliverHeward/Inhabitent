<?php
/**
 * The template for displaying archive pages.
 *
 * @package RED_Starter_Theme
 */

get_header();?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php if (have_posts()): ?>
        <header class="page-header">
            <h1 class="entry-title">
                Latest Adventures
            </h1>
        </header>
        <!-- .page-header -->
        <div class="adventure-grid">
            <?php /* Start the Loop */?>
            <?php $posts_array = get_posts(
				array(
					'posts_per_page' => 4,
					'post_type' => 'adventures',
					'post_status' => 'publish',
				)
			); 
foreach ($posts_array as $post) { ?>
            <div class="adventure-grid-item">
                <?php if (has_post_thumbnail()):?>
                <?php the_post_thumbnail('full');?>
                <?php endif; ?>
                <div class="adventure-info">
                    <?php the_title(sprintf('<h3 class="adventure-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>');?>
                    <?php echo '<a class="white-btn" href="'.get_the_permalink().'">Read More</a>'; ?>
                </div>
            </div>
        <?php } ?>
        <?php else: ?>
                    <?php endif;?>

        </div>
    </main><!-- #main -->
</div><!-- #primary -->
<?php get_footer();?>