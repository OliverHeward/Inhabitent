<?php

get_header();
?>

<?php $backgroundImg = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');?>

  <div class="header-wrap" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat; background-size: cover; background-position: center;">
  </div>
<section class="container">
<h1 class="shop">Shop Stuff</h1>
<?php
$args = array(
	'posts_per_page' => 4,
	'post_status' => 'publish',
	'post_type' => 'acme_product',
);

$posts_array = get_posts($args);
foreach ($posts_array as $post) {?>
	<div class="do-container" style="float:left; width: 20%;">
		<p class="do-text"><?php echo $post->post_content ?></p>
	</div>
<?php }?>
</section>


<h1>Inhabitent Journal</h1>

<?php

$args = array(
	'posts_per_page' => 3,
	'category_name' => 'ollie',
	'post_status' => 'publish',
);
$posts_array = get_posts($args);
// print_r($posts_array);
foreach ($posts_array as $post) {?>
	<div class="ollie-blog" style="float:left; width: 33%; border:1px solid blue; display: flex; flex-flow: row wrap; ">
		<h2 class="ollie-title"><?php echo $post->post_name ?></h2>
		<div>
		<?php echo get_the_post_thumbnail($post->ID, array(100, 100)); ?>
		</div>
		<p><?php echo $post->post_content ?></p>
	</div>
<?php }?>

<h1>Inhabitent Journal</h1>

<?php
$posts_array = get_posts(
	array(
		'posts_per_page' => 3,
		'post_type' => 'acme_product',
		'tax_query' => array(
			array(
				'taxonomy' => 'manufacturer',
				'field' => 'term_id',
				'terms' => 'bmw',
			),
		),
	)
);
foreach ($posts_array as $post) {?>
	<div class="ollie-blog" style="float:left; width: 33%; border:1px solid blue; display: flex; flex-flow: row wrap; ">
		<h2 class="ollie-title"><?php echo $post->post_name ?></h2>
		<p><?php echo $post->post_content ?></p>
	</div>
<?php }?>