<?php
    /**
     * This is the Journal Page
     * @package RED_Starter_Theme
     */
    
    get_header();?> <!-- Calling Header -->
<!-- START OF SITE CONTENT -->
<div id="primary" class="content-area-home">
    <main id="main" class="site-main" role="main">
        <!-- Start of Conditional checking if Have Posts - Is Home / Front Page -->
        <?php if (have_posts()): ?>
        <?php if (is_home() && !is_front_page()): ?>
        <!-- Start of Screen Reader -->
        <header>
            <h1 class="page-title screen-reader-text"><?php single_post_title();?></h1>
        </header>
        <!-- End of Screen Reader -->
        <?php endif;?>
        <!-- End of Conditional -->
        <!-- Start of WordPress Loop -->
        <?php while (have_posts()): the_post();?>
        <!-- Start of Post -->
        <article id="post-<?php the_ID();?>" <?php post_class();?>>
            <!-- Start of Header -->
            <header class="entry-header">
                <!-- Conditional checking for Post Thumbnail 'Large' -->
                <?php if (has_post_thumbnail()): ?>
                <?php the_post_thumbnail('large');?>
                <?php endif;?>
                <!-- End of Conditional -->
                <!-- WordPress Call for Post Title -->
                <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');?>
                <!-- Start of Conditional for post type -->
                <?php if ('post' === get_post_type()): ?>
                <!-- Start of Entry-Meta -->
                <div class="entry-meta">
                    <?php red_starter_posted_on();?> / <?php comments_number('0 Comments', '1 Comment', '% Comments');?> / <?php red_starter_posted_by();?>
                </div>
                <!-- End of Entry-Meta -->
                <?php endif;?>
                <!-- End of Conditional -->
            </header>
            <!-- end of Header -->
            <!-- Start of Entry Content -->
            <div class="entry-content">
                <!-- WordPress call for shortened version of page content (exerpt) along with a button -->
                <?php the_excerpt();?>
                <?php echo '<a class="black-btn" href="'.get_the_permalink().'">READ MORE →</a>'; ?>
            </div>
            <!-- End of Entry Content -->
        </article>
        <!-- End of Post -->
        <?php endwhile;?>
        <?php the_posts_navigation();?>
        <?php else: ?>
        <?php get_template_part('template-parts/content', 'none');?>
        <?php endif;?>
        <!-- End of Loop & Conditionals -->
    </main>
    <!-- End of Site Main -->
</div>
<!-- End of Primary -->
<?php get_sidebar();?>
<!-- Calling Sidebar -->
<?php get_footer();?>
<!-- Calling Footer -->