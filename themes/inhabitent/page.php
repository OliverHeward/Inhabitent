<?php
    /**
     * The template for displaying Find Us page.
     *
     * @package RED_Starter_Theme
     */
    
    get_header(); ?> <!-- Calling Header -->
<!-- START OF SITE CONTENT -->
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <!-- Start of WordPress Loop -->
        <?php while (have_posts()): the_post();?>
        <!-- Start of Post -->
        <article id="post-<?php the_ID();?>" <?php post_class();?>>
            <!-- Calling Title -->
            <?php the_title('<h1 class="entry-title">', '</h1>');?>
            <!-- Start of Entry Content -->
            <div class="entry-content">
                <?php the_content();?>
                <?php
                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html('Pages:'),
                        'after' => '</div>',
                    ));
                    ?>
                <?php endwhile;?>
                <!-- End of Loop -->
            </div>
            <!-- End of Entry Content -->
        </article>
        <!-- End of Post -->
    </main>
    <!-- End of Main -->
</div>
<!-- End of Primary -->
<?php get_sidebar(); ?>
<!-- Calling Sidebar -->
<?php get_footer(); ?>
<!-- Calling Footer -->