<?php
    /**
     * The template for displaying Adventure Archive page.
     *
     * @package RED_Starter_Theme
     */
    
    get_header();?> <!-- Calling Header -->

<!-- START OF SITE CONTENT -->
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <!-- Start of Conditional checking if have_posts -->
        <?php if (have_posts()): ?>
        <!-- Start of Page Header -->
        <header class="page-header">
            <h1 class="entry-title">
                Latest Adventures
            </h1>
        </header>
        <!-- End of Page Header -->
        <!-- Start of Adventure Grid -->
        <div class="adventure-grid">
            <!-- PHP Object for Loop - Grabbing Adventure Post Type -->
            <?php $posts_array = get_posts(
                array(
                    'posts_per_page' => 4,
                    'post_type' => 'adventures',
                    'post_status' => 'publish',
                )
                ); 
                foreach ($posts_array as $post) { ?> <!-- Start of Foreach Loop -->
            <!-- Start of Adventure Grid -->
            <div class="adventure-grid-item">
                <!-- Start of Conditional checking if WordPress post has Thumbnail Image -->
                <?php if (has_post_thumbnail()):?>
                <?php the_post_thumbnail('full');?>
                <?php endif; ?>
                <!-- End if Conditional -->

                <!-- Start of Adventure Info grabbing Title and Creating Link Button -->
                <div class="adventure-info">
                    <?php the_title(sprintf('<h3 class="adventure-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>');?>
                    <?php echo '<a class="white-btn" href="'.get_the_permalink().'">Read More</a>'; ?>
                </div>
                <!-- End of Adventure Info -->
            </div>
            <!-- End of Adventure Grid -->
            <?php } ?>
            <?php else: ?>
            <!-- End Else -->
            <?php endif;?>
            <!-- End If Conditional -->
        </div>
        <!-- End of Adventure Grid -->
    </main>
    <!-- End of Main -->
</div>
<!-- End of Primary -->
<?php get_footer();?> <!-- Calling Footer -->