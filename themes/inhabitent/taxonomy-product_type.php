<?php
    /**
     * The template for displaying archive pages.
     *
     * @package RED_Starter_Theme
     */
    
    get_header();?> <!-- Calling Header -->
<!-- START OF SITE CONTENT -->
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <!-- Conditional IF have posts, get term and taxonomy -->
        <?php if (have_posts()): ?>
        <?php $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy') ) ; ?>
        <!-- Start of Page Header, Calling Term Name -->
        <header class="page-header">
            <h1 class="entry-title">
                <?php echo $term->name; ?>
            </h1>
            <!-- Calling Description of Specific Term -->
            <p><?php the_archive_description(); ?> </p>
        </header>
        <!-- End of Page Header -->
        <!-- Product Grid Container -->
        <div class="grid-container">
            <!-- Start of WordPress Loop -->
            <?php while (have_posts()): the_post();?>
            <!-- Start of Product Grid Item Container, Wrapped In Permalink to Item -->
            <div class="product-grid-item">
                <a href="<?php echo the_permalink() ?>">
                    <!-- Start of Thumbnail Wrapper -->
                    <div class="thumbnail-wrapper">
                        <!-- Conditional Start -->
                        <?php if (has_post_thumbnail()): ?>
                        <?php the_post_thumbnail('large');?>
                        <?php endif;?> <!-- End of Conditional -->
                    </div>
                    <!-- End of Thumbnail Wrapper -->
                </a>
                <!-- End of Permalink -->
                <!-- Start of Product Info, Title + Price -->
                <div class="product-info">
                    <?php the_title(sprintf('<h2 class="product-title">'), '</h2>');?>
                    <span class="product-price">
                    <?php echo CFS()->get('price'); ?>
                    </span>
                </div>
                <!-- End of Product Info -->
            </div>
            <!-- End of Product Grid Item -->
            <?php endwhile;?>
            <?php endif;?>
            <!-- End of Loop and Conditional -->
        </div>
        <!-- End of Grid Container -->
    </main>
    <!-- End of Site Main -->
</div>
<!-- End of Primary -->
<?php get_footer();?>
<!-- Calling Footer -->