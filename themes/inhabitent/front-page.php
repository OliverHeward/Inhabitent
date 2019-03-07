<?php
    /**
     * The Landing / Front Page Template.
     *
     * @package RED_Starter_Theme
     */
    
    get_header();?><!-- Calling Header -->
<!-- START OF SITE CONTENT -->
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <!-- Conditional checking if have_posts and is_home / is_front_page() to display content -->
        <?php if (have_posts()): ?>
        <?php if (is_home() && !is_front_page()): ?>
        <!-- Screen Reader -->
        <header>
            <h1 class="page-title screen-reader-text">
                <?php single_post_title();?>
            </h1>
        </header>
        <!-- End of Screen Reader -->
        <?php endif;?>
        <!-- End of If -->
        <!-- Hero Element -->
        <section class="hero">
            <!-- Calling the Page thumbnail which is the logo attached too the page -->
            <img class="hero-logo" src="<?php the_post_thumbnail_url('full');?>">
        </section>
        <!-- End of Hero -->

        <!-- Shop Section -->
        <section class="shop container">
            <!-- Shop Title -->
            <h1 class="shop-title">Shop Stuff</h1>
            <!-- Start of Product Type Blocks -->
            <div class="product-type-blocks">
                <!-- Creating PHP object -->
                <?php
                    $terms = get_terms( array(
                        'taxonomy' => 'product_type',
                        'hide_empty' => 0,
                    ) );
                    /* Start of Conditional */
                    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
                    ?>
                <!-- For Each Term (Taxonomy => Product Type(name) -->
                <?php foreach ( $terms as $term ) : ?>
                    <!-- Start of Stuff Containers -->
                <div class="stuff-container">
                    <!--  Calling the SVG Logos by their Term Slug -->
                    <img class="stuff-svg"src="<?php echo get_template_directory_uri() . '/images/' . $term->slug; ?>.svg" alt="<?php echo $term->name; ?>" />
                    <!-- Calling Term's Description -->
                    <p><?php echo $term->description; ?></p>
                    <!-- Button Permalink too Shop Term Archive -->
                    <p><a href="<?php echo get_term_link( $term ); ?>" class="btn"><?php echo $term->name; ?> Stuff</a></p>
                </div>
                <!-- End of Stuff Containers -->
                <?php endforeach; ?>
            </div>
            <!-- End of Product Type Blocks -->
            <?php endif; ?>
            <!-- End If Conditional -->
        </section>
        <!-- End of Shop Section -->

        <!-- Journal Section -->
        <section class="journal container">
            <h1>Inhabitent Journal</h1>
            <!-- Creating PHP Object --> 
            <?php
                $args = array(
                    'posts_per_page' => 3,
                    'post_type' => 'post',
                    'post_status' => 'publish',
                );

                /* Start of Loop */
                $posts_array = get_posts($args);
                foreach ($posts_array as $post) {?>
            <!-- Journal Wrapper -->
            <div class="journal-wrapper">
                <!-- Journal Image from Post Thumbnail-->
                <div class="journal-home">
                    <img class="journal-img" src="<?php the_post_thumbnail_url('large');?>">
                </div>
                <!-- End of Journal Image -->
                <!-- Journal Info -->
                <div class="journal-info">
                    <!-- Meta Data of Date and Comment Number -->
                    <p class="entry-meta">
                        <?php red_starter_posted_on();?> /
                        <?php comments_number('0 Comments', '1 Comment', '% Comments');?>
                    </p>
                    <!-- Post Title and Anchor Permalink -->
                    <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                    <!-- Creating Button to Page -->
                    <?php echo '<a class="black-btn" href="'.get_the_permalink().'">Read Entry</a>'; ?>
                </div>
                <!-- End of Journal Info -->
            </div>
            <!-- End of Journal Wrapper -->
            <?php }?>
        </section>
        <!-- End of Journal Section -->

        <!-- Adventures Section -->
        <section class="adventures container">
            <h1>Adventure Journal</h1>
            <!-- Start of Adventure Blocks as <ul> -->
            <ul class="adventure-ul">
                <!-- Creating PHP object for posts -->
                <?php
                    $posts_array = get_posts(
                        array(
                            'posts_per_page' => 4,
                            'post_type' => 'adventures',
                            'post_status' => 'publish',
                            )
                        );
                    // Start of loop
                    foreach ($posts_array as $post) {?>
                <!-- Adventure list item -->
                <li>
                    <!-- Adventure Wrapper -->
                    <div class="adventure-wrapper">
                        <!-- Start of Thumbnail Conditional -->
                        <?php if (has_post_thumbnail()): ?>
                        <?php the_post_thumbnail('full');?>
                        <?php endif;?>
                        <!-- End of Conditional -->
                        <!-- Adventure Info -->
                        <div class="adventure-info">
                            <!-- Post Title and Anchor Permalink -->
                            <?php the_title(sprintf('<h3 class="adventure-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>');?>
                            <!-- Creating Button to Page -->
                            <?php echo '<a class="white-btn" href="'.get_the_permalink().'">Read More</a>'; ?>
                        </div>
                        <!-- End of Adventure Info -->
                    </div>
                    <!-- End of Adventure Wrapper -->
                    <?php }?>
                    <?php else: ?>
                    <?php endif;?>
                    <!-- End of Conditional -->
                </li>
            </ul>
            <!-- End of Adventure List and List Items -->
            <!-- Floating 'More Adventures' Button -->
            <?php echo '<a class="green-btn" href="'.get_post_type_archive_link('adventures').'">More Adventures</a>'; ?>
        </section>
        <!-- End of Adventures Section -->
    </main>
    <!-- End of Main -->
</div>
<!-- End of Primary -->
<?php get_footer();?>
<!-- End of Footer -->