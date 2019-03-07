<?php
    /**
     * The template for displaying all single posts.
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
        <article id="post-<?php the_ID();?>" <?php post_class();?>>
            <!-- Product Image Wrapper with Conditional -->
            <div class="product-image-wrapper">
                <?php if (has_post_thumbnail()): the_post_thumbnail('full');
                    endif;?> <!-- End of Conditional -->
            </div>
            <!-- End of Image Wrapper -->
            <!-- Product Content Wrapper, Title + Price -->
            <div class="product-content-wrapper">
                <?php the_title('<h1 class="entry-title">', '</h1>');?>
                <p class="price-tag">
                    <?php echo CFS()->get('price'); ?>
                </p>
                <!-- Entry Content -->
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
                    <!-- Social Buttons -->
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
                    <!-- End of Social Buttons -->
                </div>
                <!-- End of Entry Content -->
            </div>
            <!-- End of Product Content Wrapper -->
        </article>
        <!-- End of Post -->
    </main>
    <!-- End of Site Main -->
</div>
<!-- End of Primary -->
<?php get_footer();?>
<!-- Calling Footer -->