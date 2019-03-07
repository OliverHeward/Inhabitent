<?php
    /**
     * The template for displaying search results pages.
     *
     * @package RED_Starter_Theme
     */
    
    get_header(); ?> <!-- Calling Header -->
<!-- START OF SITE CONTENT -->
<section id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <!-- Conditional checking if have posts -->
        <?php if ( have_posts() ) : ?>
        <!-- Start of Header -->
        <header class="page-header">
            <h1 class="page-title">
                <?php printf( esc_html( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>' ); ?>
            </h1>
        </header>
        <!-- End of Header -->
        <!-- Start of WordPress Loop -->
        <?php while ( have_posts() ) : the_post(); ?>
        <!-- Start of Post -->
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <!-- Start of Entry Header with Title call -->
            <header class="entry-header">
                <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
            </header>
            <!-- End of Entry Header -->
            <!-- Start of Entry Summary pulling Excerpt Description -->
            <div class="entry-summary">
                <?php the_excerpt(); ?>
            </div>
            <!-- End of Entry Summary -->
            <!-- Read More Button with Permalink anchor -->
            <?php echo '<a class="black-btn" href="'.get_the_permalink().'">READ MORE →</a>'; ?>
        </article>
        <!-- End of Post -->
        <?php endwhile; ?>
        <?php red_starter_numbered_pagination(); ?>
        <?php else : ?>
        <?php get_template_part( 'template-parts/content', 'none' ); ?>
        <?php endif; ?>
        <!-- End of Loop and Conditional -->
    </main>
    <!-- End of Main -->
</section>
<!-- End of Primary -->
<?php get_sidebar(); ?>
<!-- Calling Siderbar -->
<?php get_footer(); ?>
<!-- Calling Footer -->