<?php
    /**
     * The template for displaying 404 pages (not found).
     *
     * @link https://codex.wordpress.org/Creating_an_Error_404_Page
     *
     * @package RED_Starter_Theme
     */
    
    get_header(); ?> <!-- Calling Header -->
<!-- START OF CONTENT -->
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <!-- 404 Section -->
        <section class="error-404 not-found">
            <!-- Page Header -->
            <header class="page-header">
                <h1 class="page-title"><?php echo esc_html( 'Oops! That page can&rsquo;t be found.' ); ?></h1>
            </header>
            <!-- End of Page Header -->
            <!-- Page Content -->
            <div class="page-content">
                <p><?php echo esc_html( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?' ); ?></p>
                <!-- Search Form Call -->
                <div class="404-search">
                    <?php get_search_form(); ?>
                </div>
                <!-- End of Search Form Call -->
                <!-- Start of Recent Posts Widget -->
                <?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
                <!-- Start of Conditional -->
                <?php if ( red_starter_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
                <!-- Start of Posts Categories Widget -->
                <div class="widget widget_categories">
                    <h2 class="widget-title"><?php echo esc_html( 'Most Used Categories' ); ?></h2>
                    <!-- Start of WordPress Category List -->
                    <ul>
                        <?php
                            wp_list_categories( array(
                            	'orderby'    => 'count',
                            	'order'      => 'DESC',
                            	'show_count' => 1,
                            	'title_li'   => '',
                            	'number'     => 10,
                            ) );
                            ?>
                    </ul>
                    <!-- End of List -->
                </div>
                <!-- End of Post Category Widget -->
                <?php endif; ?> 
                <!-- End of Conditional -->
                <!-- Start of Archives Widget -->
                <?php
                    $archive_content = '<p>' . sprintf( esc_html( 'Try looking in the monthly archives. %1$s' ), convert_smilies( ':)' ) ) . '</p>';
                    the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
                    ?>
                <!-- End of Archives Widget -->
            </div>
            <!-- End of Page Content -->
        </section>
        <!-- End of 404 Section -->
    </main>
    <!-- End of Main -->
</div>
<!-- End of Primary -->
<!-- WordPress Sidebar Call -->
<div class="sidebar">
    <?php get_sidebar();?>
</div>
<!-- End of WordPress Sidebar Call -->
<?php get_footer(); ?> <!-- Calling Footer -->