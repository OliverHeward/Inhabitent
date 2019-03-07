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
            <!-- Start of Entry Header with container class -->
            <header class="entry-header container">
                <!-- Conditional for post thumbnail -->
                <?php if (has_post_thumbnail()): the_post_thumbnail('full');
                    endif;?> <!-- End of Conditional -->
                <?php the_title('<h1 class="entry-title">', '</h1>');?>
                <!-- Entry Meta -->
                <div class="entry-meta">
                    <?php red_starter_posted_on();?> / <?php red_starter_comment_count();?> / <?php red_starter_posted_by();?>
                </div>
                <!-- End of Entry Meta -->
            </header>
            <!-- End of Entry Header -->
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
                <!-- End of WordPress Loop -->
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
        </article>
        <!-- End of Post -->
        <!-- Start of Comments Conditional checking if Comments are open - get comments - get the template -->
        <div class="comments">
            <?php
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
                ?>
            <!-- End of Conditional -->
        </div>
        <!-- End of Comments -->
    </main>
    <!-- End of Site Main -->
</div>
<!-- End of Primary -->
<!-- Sidebar Container / Calling Sidebar -->
<div class="sidebar">
    <?php get_sidebar();?>
</div>
<?php get_footer();?>
<!-- Calling Footer -->