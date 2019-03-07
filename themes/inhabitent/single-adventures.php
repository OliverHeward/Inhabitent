<?php
    /**
     * The template for displaying Single Adventure Posts.
     *
     * @package RED_Starter_Theme
     */
    
    get_header();?> <!-- Calling Header -->
<!-- START OF SITE CONTENT -->
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <!-- Start of WordPress Loop -->
        <?php while (have_posts()): the_post();?>
        <!-- Start of Post -->
        <article id="post-<?php the_ID();?>" 
            <?php post_class();?>>
            <!-- Start of Hero Section -->
            <section class="hero">
                <?php
                    if ( has_post_thumbnail() ) {
                    the_post_thumbnail();
                    }?>
            </section>
            <!-- End of Hero -->
            <!-- Start of Entry Content, pulling Title + Author of post -->
            <div class="entry-content">
                <?php the_title('<h1 class="entry-title">', '</h1>');?>
                <div class="entry-meta">
                    <?php red_starter_posted_by(); ?>
                </div>
                <!-- End of Entry Meta -->
                <?php the_content();?>
                <?php
                    wp_link_pages(array(
                    	'before' => '<div class="page-links">' . esc_html('Pages:'),
                    	'after' => '</div>',
                    ));
                    ?>
                <!-- Social Buttons Container -->
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
                <!-- End of Social Buttons Container -->
            </div>
            <!-- End of Entry Content -->
        </article>
        <!-- End of Post -->
        <?php endwhile; // End of the loop. ?>
    </main>
    <!-- End of Site Main -->
</div>
<!-- End of Primary -->
<?php get_footer();?>
<!-- Calling Footer -->