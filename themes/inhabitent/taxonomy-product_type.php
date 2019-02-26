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
        	<?php $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy') ) ; ?>
        <header class="page-header">
            <h1 class="entry-title">
               <?php echo $term->name; ?></h1>
               <p><?php the_archive_description(); ?> </p>
           </header>
<div class="grid-container">

			<?php /* Start the Loop */?>
                <?php while (have_posts()): the_post();?>
                <div class="product-grid-item">
                    <a href="<?php echo the_permalink() ?>">
                        <div class="thumbnail-wrapper">
                            <?php if (has_post_thumbnail()): ?>
                            <?php the_post_thumbnail('large');?>
                            <?php endif;?>
                        </div>
                    </a>
                    <div class="product-info">
                        <?php the_title(sprintf('<h2 class="product-title">'), '</h2>');?>
                        <span class="product-price">
                            <?php echo CFS()->get('price'); ?>
                        </span>
                    </div>
                </div>
                <?php endwhile;?>
                <?php endif;?>
</div>
</main><!-- #main -->
</div><!-- #primary -->
<?php get_footer();?>