<?php
/**
 * The main template file.
 *
 * @package RED_Starter_Theme
 */

get_header();?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php if (have_posts()): ?>
        <?php if (is_home() && !is_front_page()): ?>
        <header>
            <h1 class="page-title screen-reader-text">
                <?php single_post_title();?>
            </h1>
        </header>
        <?php endif;?>
        <?php /* Start the Loop */?>
        <?php

get_header();
?>
        <section class="hero">
            <img class="hero-logo" src="<?php the_post_thumbnail_url('full');?>">
        </section>

        <section class="shop container">
            <h1 class="shop-title">Shop Stuff</h1>
             <div class="product-type-blocks">
            <?php

               $terms = get_terms( array(
                   'taxonomy' => 'product_type',
                   'hide_empty' => 0,
               ) );
               if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
            ?>
                  <?php foreach ( $terms as $term ) : ?>
                     <div class="stuff-container">
                        <img class="stuff-svg"src="<?php echo get_template_directory_uri() . '/images/' . $term->slug; ?>.svg" alt="<?php echo $term->name; ?>" />
                        <p><?php echo $term->description; ?></p>
                        <p><a href="<?php echo get_term_link( $term ); ?>" class="btn"><?php echo $term->name; ?> Stuff</a></p>
                     </div>
                  <?php endforeach; ?>
               </div>
            <?php endif; ?>
         </section>

        <section class="journal container">
            <h1>Inhabitent Journal</h1>
            <?php

$args = array(
    'posts_per_page' => 3,
    'post_type' => 'post',
    'post_status' => 'publish',
);
$posts_array = get_posts($args);

foreach ($posts_array as $post) {?>
            <div class="journal-wrapper">
                <div class="journal-home">
                    <img class="journal-img" src="<?php the_post_thumbnail_url('large');?>">
                </div>
                <div class="journal-info">
                    <p class="entry-meta">
                        <?php red_starter_posted_on();?> /
                        <?php comments_number('0 Comments', '1 Comment', '% Comments');?>
                    </p>
                    <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                    <?php echo '<a class="black-btn" href="'.get_the_permalink().'">Read Entry</a>'; ?>
                </div>
            </div>
            <?php }?>
        </section>
        <section class="adventures container">
            <h1>Adventure Journal</h1>
            <ul class="adventure-ul">
                <?php
$posts_array = get_posts(
    array(
        'posts_per_page' => 4,
        'post_type' => 'adventures',
        'post_status' => 'publish',
        )
    );
foreach ($posts_array as $post) {?>
                <li>
                    <div class="adventure-wrapper">
                        <?php if (has_post_thumbnail()): ?>
                        <?php the_post_thumbnail('full');?>
                        <?php endif;?>
                        <div class="adventure-info">
                            <?php the_title(sprintf('<h3 class="adventure-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>');?>
                            <?php echo '<a class="white-btn" href="'.get_the_permalink().'">Read More</a>'; ?>
                        </div>
                    </div>
                    <?php }?>
                    <?php else: ?>
                    <?php endif;?>
                </li>
            </ul>
            <?php echo '<a class="green-btn" href="'.get_post_type_archive_link('adventures').'">More Adventures</a>'; ?>
        </section>
    </main><!-- #main -->
</div><!-- #primary -->
<?php get_footer();?>