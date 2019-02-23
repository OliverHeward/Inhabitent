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
$args = array(
	'posts_per_page' => 4,
	'post_status' => 'publish',
	'post_type' => 'acme_product',
);

$posts_array = get_posts($args);
foreach ($posts_array as $post) {?>
            <div class="stuff-container" style="float:left; width: 18%;">
                <p class="do-text">
                    <?php echo $post->post_content ?>
                </p>
            </div>
            <?php }?>
        </div>
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
                    <?php echo get_the_post_thumbnail($post->ID, array(400, 400)); ?>
                </div>
                <div class="journal-info">
                    <p class="entry-meta">
                        <?php red_starter_posted_on();?> /
                        <?php comments_number('0 Comments', '1 Comment', '% Comments');?>
                    </p>
                    <h2 class="entry-title">
                        <?php echo $post->post_name ?>
                    </h2>
                    <?php echo '<a class="black-btn" href="'.get_the_permalink().'">Read Entry</a>'; ?>
                </div>
            </div> 
            <?php }?>
        </section>
            <section class="adventures container">
            <h1>Adventure Journal</h1>
<ul>
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
                    <?php the_title(sprintf('<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>');?>
                </h3>

              <?php echo '<a class="white-btn" href="'.get_the_permalink().'">Read More</a>'; ?>
            </div>
            </div>
            <?php }?>
            <?php else: ?>

            <?php endif;?>
        </li>
    </ul>
        </section>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();?>