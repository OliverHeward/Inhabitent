<?php
/**
 * The template for displaying archive pages.
 *
 * @package RED_Starter_Theme
 */

get_header();?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if (have_posts()): ?>

			<header class="page-header">
				<h1 class="entry-title">
					Shop Stuff
				</h1>

				<ul class="product-type-list">
<?php
$terms = get_terms(array(
	'taxonomy' => 'product_type',
	'hide_empty' => false,
));
foreach ($terms as $term) {?>
	<li> <?php echo $term->name; ?> </li> <?php
}?>
</ul>
			</header><!-- .page-header -->

<div class="grid-container">

			<?php /* Start the Loop */?>
			<?php while (have_posts()): the_post();?>
								<div class="product-grid-item">
								<div class="thumbnail-wrapper">

								<?php if (has_post_thumbnail()): ?>
								<?php the_post_thumbnail('large');?>
								<?php endif;?>
				</div>
				<div class="product-info">
				<?php the_title(sprintf('<h2 class="product-title">'), '</h2>');?>
				<span class="product-price">
					<?php echo CFS()->get('price'); ?>
				</span>

			</div>
</div>
	<?php endwhile;?>


		<?php endif;?>
</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();?>
