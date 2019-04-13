<?php
    /**
     * The template for displaying Product Archive pages.
     *
     * @package RED_Starter_Theme
     */
    
    get_header();?> <!-- Calling Header -->
<!-- START OF SITE CONTENT -->
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <!-- Start of Condition checking if have posts -->
        <?php if (have_posts()): ?>
        <!-- Start of Page Header -->
        <header class="page-header">
            <!-- Entry Title -->
            <h1 class="entry-title">
                Shop Stuff
            </h1>
            <!-- Start of Product Term List -->
            <ul class="product-type-list">
                <!-- PHP Object Retrieving Product Type Term (name) -->
                <?php
                    $terms = get_terms(array(
                    	'taxonomy' => 'courses',
                    	'hide_empty' => false,
                    ));
                    foreach ($terms as $term) {?> <!-- Start of Foreach Loop -->
                <!-- Start of List Echoing both Permalink & Term Name -->
                <li><a href="<?php echo get_term_link( $term ); ?>"> <?php echo $term->name; ?> </a></li>
                <?php
                    }?>
            </ul>
            <!-- End of Product Term List -->
        </header>
        <!-- End of Page Header -->
        <!-- Start of Product Grid -->
        <div class="grid-container">
            <!-- Start of the Loop -->
            <?php while (have_posts()): the_post();?>
            <!-- Start of Grid Items -->
            <div class="product-grid-item">
                <!-- Clickable Permalink for Product Image -->
                <a href="<?php echo the_permalink() ?>">
                    <!-- Start of Image Wrapper -->
                    <div class="thumbnail-wrapper">
                        <!-- Start of Conditional to check for WordPress Thumbnail -->
                        <?php if (has_post_thumbnail()): ?>
                        <?php the_post_thumbnail('large');?>
                        <?php endif;?>
                        <!-- End of Conditional -->
                    </div>
                    <!-- End of Image Wrapper -->
                </a>
                <!-- End of Permalink for Product Image --> 
                <!-- Start of Product Info -->
                <div class="product-info">
                    <!-- Product Title -->
                    <?php the_title(sprintf('<h2 class="product-title">'), '</h2>');?>
                    <!-- Product Price -->
                    <span class="product-price">
                    <?php echo CFS()->get('price'); ?>
                    </span>
                    <!-- End of Product Price -->
                </div>
                <!-- End of Product Info -->
            </div>
            <!-- End of Grid Item -->
            <?php endwhile;?> 
            <!-- End While -->
            <?php endif;?>
            <!-- End If -->
        </div>
        <!-- End of Product Grid -->
    </main>
    <!-- End of Main -->
</div>
<!-- End of Primary -->
<?php get_footer();?> <!-- Calling Footer -->